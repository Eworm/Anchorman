<?php

namespace Statamic\Addons\Anchorman\Commands;

use SimplePie;
use Statamic\API\Str;
use Statamic\Addons\Anchorman\Feed;
use Illuminate\Support\Facades\Storage;
use Statamic\API\Entry;
use Statamic\API\Term;
use Statamic\API\Taxonomy;
use Statamic\API\AssetContainer;
use Statamic\API\File;
use Statamic\API\User;
use Statamic\Extend\Command;

class UpdateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'anchorman:refresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updates all feeds';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $feeds_storage  = Storage::files('/site/storage/addons/Anchorman');

        foreach ($feeds_storage as $feed) {

            $rem        = str_replace('site/storage/addons/Anchorman/', '', $feed);
            $ignore = array( 'cgi-bin', '.', '..','._' );

            if (!in_array($rem, $ignore) and substr($rem, 0, 1) != '.') {

                $info       = $this->storage->getYaml($rem);
                $url        = $info['url'];
                $publish_to = $info['publish_to'];
                $enabled    = $info['enabled'];

                // Add the last updated time to the feed info
                $info['updated'] = time();
                $this->storage->putYAML($rem, $info);

                if (isset($info['item_author'])) {
                    $author = $info['item_author'];
                }

                if (isset($info['images_container'])) {
                    $assetcontainer = $info['images_container'];
                }

                if (isset($info['save_images'])) {
                    $save_images = $info['save_images'];
                }

                $feed = new SimplePie();
                $feed->set_cache_location(Feed::cache_location());
                $feed->set_feed_url($url);
                $feed->init();
                $this->info('Updating ' . $feed->get_title());
                $i = 0;

                // Get the chosen taxonomy for custom terms
                if (isset($info['custom_taxonomies'])) {
                    $taxonomy = $info['custom_taxonomies'];
                }

                // Add custom terms to the chosen taxonomy
                if (isset($info['custom_terms'])) {
                    $tags = $info['custom_terms'];
                    foreach ($tags as $term) {

                        if (!Term::slugExists(slugify($term), $taxonomy)) {

                            $this->info('Adding "' . $term . '" to "' . $taxonomy . '".');
                            Term::create(slugify($term))
                                ->taxonomy($taxonomy)
                                ->save();

                        } else {

                            $this->info('"' . $term . '" <fg=red>already exists</>');

                        }
                    }
                }

                // Custom queries
                if (isset($info['query_grid'])) {
                    $url = $this->custom_queries($url, $info['query_grid']);
                }

                // Add items to the chosen collection
                foreach ($feed->get_items() as $item) {

                    if ($enabled == true) {

                        $with = [];
                        $with[Str::removeLeft($info['item_title'], '@ron:')] = $item->get_title(); // Add the title
                        $with['item_pubdate'] = $item->get_date(); // Add the pubdate
                        $slugged = slugify($item->get_title());

                        // Item description
                        if (isset($info['item_description']) && $item->get_description()) {
                            if ($info['item_description'] != false) {
                                $with[Str::removeLeft($info['item_description'], '@ron:')] = $item->get_description();
                            }
                        }

                        // Item content
                        if (isset($info['item_content']) && $item->get_content()) {
                            if ($info['item_content'] != false) {
                                $with[Str::removeLeft($info['item_content'], '@ron:')] = $item->get_content();
                            }
                        }

                        // Item permalink
                        if (isset($info['item_permalink']) && $item->get_permalink()) {
                            if ($info['item_permalink'] != false) {
                                $with[Str::removeLeft($info['item_permalink'], '@ron:')] = $item->get_permalink();
                            }
                        }

                        // Item authors
                        if (isset($info['author_options'])) {
                            $author_options = $info['author_options'];

                            if (isset($info['item_authors'])) {
                                if ($info['item_authors'] != false) {
                                    if ($author_options == 'create') {
                                        if ($author = $item->get_author()) {

                                            // Create new user
                                            $authorname = $author->get_name();
                                            $authoremail = $author->get_email();

                                            if ($authorname != null) {

                                                if (!User::whereUsername(slugify($authorname))) {

                                                    User::create($authorname)
                                                        ->username(slugify($authorname))
                                                        ->email($authoremail)
                                                        ->save();

                                                } else {

                                                    $this->info($authorname . ' <fg=red>already exists</>');

                                                }

                                                $with[Str::removeLeft($info['item_authors'], '@ron:')] = User::whereUsername(slugify($authorname))->get('id');
                                                $this->info('Adding '. $authorname);

                                            } else {

                                                $this->info($authorname . "<fg=red>I can't find a username for this author</>");

                                            }

                                        }
                                    } else {
                                        // Assign to an existing user
                                        $with[Str::removeLeft($info['item_authors'], '@ron:')] = $author;
                                    }
                                }
                            }
                        }

                        // Item categories
                        if (isset($info['item_taxonomies']) && $item->get_categories()) {
                            if ($info['item_taxonomies'] != false) {
                                $itemcategories = [];
                                foreach ($item->get_categories() as $category) {
                                    array_push($itemcategories, $category->get_label());
                                }
                                $with[Str::removeLeft($info['item_taxonomies'], '@ron:')] = $itemcategories;
                            }
                        }

                        // Item thumbnails
                        if ($enclosure = $item->get_enclosure()) {
                            $enclosure_type = $enclosure->get_type();
                            $enclosure_link = $enclosure->get_link();

                            if (isset($info['item_thumbnail'])) {
                                if ($info['item_thumbnail'] != false) {
                                    if ($enclosure_type == 'image/jpeg' || $enclosure_type == 'image/png' || $enclosure_type == 'image/gif') {
                                        if ($save_images) {
                                            $with[Str::removeLeft($info['item_thumbnail'], '@ron:')] = $this->grabImage($enclosure_link, $assetcontainer);
                                        } else {
                                            $with[Str::removeLeft($info['item_thumbnail'], '@ron:')] = $enclosure_link;
                                        }
                                    }
                                }
                            }
                        }

                        // Custom terms
                        if (isset($info['custom_terms']) && isset($info['custom_taxonomies'])) {
                            $with[$taxonomy] = $this->custom_terms($info['custom_terms']);
                        }

                        // Create an entry
                        if (Entry::slugExists($slugged, $publish_to)) {

                            $this->info($item->get_title() . " <fg=red>already exists</>");

                        } else {

                            if ($info['status'] == 'publish') {

                                $this->info('Adding "' . $item->get_title() . '"');

                                Entry::create($slugged)
                                    ->collection($publish_to)
                                    ->with($with)
                                    ->date($item->get_date('Y-m-d'))
                                    ->save();

                            } else {

                                $this->info('Adding "' . $item->get_title() . '" <fg=red>(draft)</>');

                                Entry::create($slugged)
                                    ->collection($publish_to)
                                    ->published(false)
                                    ->with($with)
                                    ->date($item->get_date('Y-m-d'))
                                    ->save();

                            }

                            $i++;

                        }

                    }

                }

                if ($i == 0) {

                    $this->info("No new articles.");

                } else {

                    $this->info("Update complete. I found " . $i . " new articles and added them to " . $publish_to . ".");

                }
                $this->info("\n");

            }
        }
    }


    /**
     * Downloads an image to an asset container
     *
     * @return info
     */
    public function grabImage($url, $path)
    {
        $container = AssetContainer::wherePath($path);
        $url = str_replace(' ', '+', $url);
        $basename = basename($url);
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        // Required to be false
        curl_setopt($ch, CURLOPT_HEADER, 0);
        //Required for http(s)
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
        // Required to be true
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
        $data = curl_exec($ch);

        if (!File::disk('local')->exists($container->data()['path'] . '/' . $basename, $data)) {

            $this->info('Saving "' . $basename . '"');
            File::disk('local')->put($container->data()['path'] . '/' . $basename, $data);
            return $container->data()['url'] . '/' . $basename;

        } else {

            $this->info('"' . $basename . '" <fg=red>already exists</>');

        }
        curl_close ($ch);
    }


    /**
     * Adds custom queries to the feed url
     *
     * @return url
     */
    private function custom_queries($url, $queries)
    {
        $newquery = [];
        foreach ($queries as $query) {
            $newquery[$query['name']] = $query['value'];
        }
        if (strpos($url, '?') !== false) {
            $url = $url . '&amp;' . http_build_query($newquery, '', '&amp;');
        } else {
            $url = $url . '?' . http_build_query($newquery, '', '&amp;');
        }
        return $url;
    }


    /**
     * Adds custom terms to an entry
     *
     * @return variable
     */
    private function custom_terms($tags)
    {
        $newtags = [];
        foreach ($tags as $term) {
            array_push($newtags, $term);
        }
        return $newtags;
    }
}
