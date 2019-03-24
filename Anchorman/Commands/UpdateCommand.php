<?php

namespace Statamic\Addons\Anchorman\Commands;

use SimplePie;
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
    protected $signature = 'anchorman:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update all feeds';

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
                $publish_to = $info['publish_to'][0];
                $active     = $info['active'];

                // Add the last updated time to the feed info
                $info['updated'] = time();
                $this->storage->putYAML($rem, $info);

                if (isset($info['author_options'])) {
                    $author_options = $info['author_options'];
                }

                if (isset($info['item_author'])) {
                    $author = $info['item_author'][0];
                }

                if (isset($info['images_container'])) {
                    $assetcontainer = $info['images_container'][0];
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

                // Get the chosen taxonomy
                if (isset($info['custom_taxonomies'])) {
                    $taxonomy = $info['custom_taxonomies'][0];
                }

                // Add custom terms to the chosen taxonomy
                if (isset($info['custom_terms'])) {
                    $tags = $info['custom_terms'];
                    foreach ($tags as $term) {
                        $this->info('Adding "' . $term . '" to "' . $taxonomy . '".');
                        Term::create(slugify($term))
                            ->taxonomy($taxonomy)
                            ->save();
                    }
                }

                // Add custom queries
                if (isset($info['query_grid'])) {
                    $queries = $info['query_grid'];
                    $newquery = [];
                    foreach ($queries as $query) {
                        $newquery[$query['name']] = $query['value'];
                    }
                    if (strpos($url, '?') !== false) {
                        $url = $url . '&amp;' . http_build_query($newquery, '', '&amp;');
                    } else {
                        $url = $url . '?' . http_build_query($newquery, '', '&amp;');
                    }
                }

                // Add items to the chosen collection
                foreach ($feed->get_items() as $item) {

                    if ($active === true) {

                        $with = [];
                        $with[$info['item_title']['value']] = $item->get_title();
                        $slugged = slugify($item->get_title());

                        if (isset($info['item_description']) && $item->get_description()) {
                            if ($info['item_description']['source'] != 'disable' && $info['item_description']['value'] != null) {
                                $with[$info['item_description']['value']] = $item->get_description();
                            }
                        }

                        if (isset($info['item_content']) && $item->get_content()) {
                            if ($info['item_content']['source'] != 'disable' && $info['item_content']['value'] != null) {
                                $with[$info['item_content']['value']] = $item->get_content();
                            }
                        }

                        if (isset($info['item_permalink']) && $item->get_permalink()) {
                            if ($info['item_permalink']['source'] != 'disable' && $info['item_permalink']['value'] != null) {
                                $with[$info['item_permalink']['value']] = $item->get_permalink();
                            }
                        }

                        if (isset($info['item_authors'])) {
                            if ($info['item_authors']['source'] != 'disable' && $info['item_authors']['value'] != null) {
                                if ($author_options == 'create') {
                                    if ($author = $feed->get_author()) {
                                        // Create new user
                                        User::create($author->get_name())
                                            ->username(slugify($author->get_name()))
                                            ->save();
                                    }
                                } else {
                                    // Assign to existing user
                                    $with[$info['item_authors']['value']] = $author;
                                }
                            }
                        }

                        if ($enclosure = $item->get_enclosure()) {
                            $enclosure_type = $enclosure->get_type();
                            $enclosure_link = $enclosure->get_link();

                            if (isset($info['item_thumbnail'])) {
                                if ($info['item_thumbnail']['source'] != 'disable' && $info['item_thumbnail']['value'] != null) {
                                    if ($enclosure_type == 'image/jpeg' || $enclosure_type == 'image/png' || $enclosure_type == 'image/gif') {
                                        if ($save_images) {
                                            $with[$info['item_thumbnail']['value']] = $this->grabImage($enclosure_link, $assetcontainer);
                                        } else {
                                            $with[$info['item_thumbnail']['value']] = $enclosure_link;
                                        }
                                    }
                                }
                            }
                        }

                        if (isset($info['custom_terms']) && isset($info['custom_taxonomies'])) {
                            $tags = $info['custom_terms'];
                            $newtags = [];
                            foreach ($tags as $term) {
                                array_push($newtags, $term);
                            }
                            $with[$taxonomy] = $newtags;
                        }

                        if (Entry::slugExists($slugged, $publish_to)) {

                            $this->info($item->get_title() . " <fg=red>already exists</>");

                        } else {

                            if ($info['status'] == 'publish') :

                                $this->info('Adding "' . $item->get_title() . '"');

                                Entry::create($slugged)
                                    ->collection($publish_to)
                                    ->with($with)
                                    ->date($item->get_date('Y-m-d'))
                                    ->save();

                            else :

                                $this->info('Adding "' . $item->get_title() . '" <fg=red>(draft)</>');

                                Entry::create($slugged)
                                    ->collection($publish_to)
                                    ->published(false)
                                    ->with($with)
                                    ->date($item->get_date('Y-m-d'))
                                    ->save();

                            endif;

                            $i++;

                        }

                    }

                    sleep(3);

                }

                if ($i == 0) :

                    $this->info("No new articles.");

                else :

                    $this->info("Update complete. I found " . $i . " new articles and added them to " . $publish_to . ".");

                endif;
                $this->info("\n");

            }
        }
    }

    public function grabImage($url, $path)
    {
        $container = AssetContainer::wherePath($path);
        $basename = basename($url);
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        // Required to be false
        curl_setopt($ch, CURLOPT_HEADER, 0);
        //Required for http(s)
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
        // curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
        // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        // Required to be true
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
        $data = curl_exec($ch);

        $this->info('Saving "' . $basename . '"');
        File::disk('local')->put($container->data()['path'] . '/' . $basename, $data);
        curl_close ($ch);
        return $container->data()['url'] . '/' . $basename;
    }
}
