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

            $st_feed = str_replace('site/storage/addons/Anchorman/', '', $feed);
            $ignore = array( 'cgi-bin', '.', '..','._' );

            if (!in_array($st_feed, $ignore) and substr($st_feed, 0, 1) != '.') {

                $settings   = $this->storage->getYaml($st_feed);
                $url        = $settings['url'];
                $enabled    = $settings['enabled'];

                // Add the last updated time to the feed info
                $settings['updated'] = time();
                $this->storage->putYAML($st_feed, $settings);

                if (isset($settings['item_author'])) {
                    $author = $settings['item_author'];
                }

                if (isset($settings['images_container'])) {
                    $assetcontainer = $settings['images_container'];
                }

                if (isset($settings['save_images'])) {
                    $save_images = $settings['save_images'];
                }

                $feed = new SimplePie();
                $feed->set_cache_location(Feed::cache_location());
                $feed->set_feed_url($url);
                $feed->init();
                $this->info('Updating ' . $feed->get_title());
                $i = 0;

                // Saves custom terms to the chosen taxonomy
                if (isset($settings['custom_terms']) && isset($settings['custom_taxonomies'])) {
                    $taxonomy = $settings['custom_taxonomies'];
                    $this->save_custom_terms($settings['custom_terms'], $taxonomy);
                }

                // Adds custom queries to the url
                if (isset($settings['query_grid'])) {
                    $url = $this->add_custom_queries($url, $settings['query_grid']);
                }

                // Add items to the chosen collection
                foreach ($feed->get_items() as $item) {

                    if ($enabled == true) {

                        $item_title = $item->get_title();
                        $with = [];
                        $with['collection'] = $settings['publish_to'];
                        $with['entry'][Str::removeLeft($settings['item_title'], '@ron:')] = $item_title; // Add the title
                        $with['entry']['item_pubdate'] = $item->get_date(); // Add the pubdate
                        $with['create'] = true;

                        // Item description
                        if (isset($settings['item_description']) && $item->get_description()) {
                            if ($settings['item_description'] != false) {
                                $with['entry'][Str::removeLeft($settings['item_description'], '@ron:')] = $item->get_description();
                            }
                        }

                        // Item content
                        if (isset($settings['item_content']) && $item->get_content()) {
                            if ($settings['item_content'] != false) {
                                $with['entry'][Str::removeLeft($settings['item_content'], '@ron:')] = $item->get_content();
                            }
                        }

                        // Item permalink
                        if (isset($settings['item_permalink']) && $item->get_permalink()) {
                            if ($settings['item_permalink'] != false) {
                                $with['entry'][Str::removeLeft($settings['item_permalink'], '@ron:')] = $item->get_permalink();
                            }
                        }

                        // Item authors
                        if (isset($settings['author_options'])) {
                            $author_options = $settings['author_options'];

                            if (isset($settings['item_authors'])) {
                                if ($settings['item_authors'] != false) {
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

                                                $with['entry'][Str::removeLeft($settings['item_authors'], '@ron:')] = User::whereUsername(slugify($authorname))->get('id');
                                                $this->info('Adding '. $authorname);

                                            } else {

                                                $this->info($authorname . "<fg=red>I can't find a username for this author</>");

                                            }

                                        }
                                    } else {
                                        // Assign to an existing user
                                        $with['entry'][Str::removeLeft($settings['item_authors'], '@ron:')] = $author;
                                    }
                                }
                            }
                        }

                        // Item categories
                        if (isset($settings['item_taxonomies']) && $item->get_categories()) {
                            if ($settings['item_taxonomies'] != false) {
                                $with['entry'][Str::removeLeft($settings['item_taxonomies'], '@ron:')] = $this->add_item_categories($item);
                            }
                        }

                        // Item thumbnails
                        if ($enclosure = $item->get_enclosure()) {
                            $enclosure_type = $enclosure->get_type();
                            $enclosure_link = $enclosure->get_link();

                            if (isset($settings['item_thumbnail'])) {
                                if ($settings['item_thumbnail'] != false) {
                                    if ($enclosure_type == 'image/jpeg' || $enclosure_type == 'image/png' || $enclosure_type == 'image/gif') {
                                        if ($save_images) {
                                            $with['entry'][Str::removeLeft($settings['item_thumbnail'], '@ron:')] = $this->grab_image($enclosure_link, $assetcontainer);
                                        } else {
                                            $with['entry'][Str::removeLeft($settings['item_thumbnail'], '@ron:')] = $enclosure_link;
                                        }
                                    }
                                }
                            }
                        }

                        // Custom terms
                        if (isset($settings['custom_terms']) && isset($settings['custom_taxonomies'])) {
                            $with['entry'][$taxonomy] = $this->add_custom_terms($settings['custom_terms']);
                        }

                        // Allow addons to modify the entry.
                        $with = $this->runBeforeCreateEvent(array($with));

                        if ($with['create'] == true) {

                            // Create an entry
                            if (Entry::slugExists(slugify($with['entry']['title']), $with['collection'])) {

                                $this->info($item_title . " <fg=red>already exists</>");

                            } else {

                                // Checks the status
                                if ($settings['status'] == 'publish') {

                                    $this->info('Adding "' . $item_title . '"');

                                    Entry::create(slugify($with['entry']['title']))
                                        ->collection($with['collection'])
                                        ->with($with['entry'])
                                        ->date($item->get_date('Y-m-d'))
                                        ->save();

                                } else {

                                    $this->info('Adding "' . $item_title . '" <fg=red>(draft)</>');

                                    Entry::create(slugify($with['entry']['title']))
                                        ->collection($with['collection'])
                                        ->published(false)
                                        ->with($with['entry'])
                                        ->date($item->get_date('Y-m-d'))
                                        ->save();

                                }

                                $i++;

                            }

                        }

                    }

                }

                if ($i == 0) {

                    $this->info("No new articles.");

                } else {

                    $this->info("Update complete. I found " . $i . " new articles and added them to " . $with['collection'] . ".");

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
    public function grab_image($url, $path)
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
     * Saves custom terms
     *
     * @return info
     */
    private function save_custom_terms($tags, $taxonomy)
    {
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


    /**
     * Adds custom queries to the feed url
     *
     * @return url
     */
    private function add_custom_queries($url, $queries)
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
    private function add_custom_terms($tags)
    {
        $newtags = [];
        foreach ($tags as $term) {
            array_push($newtags, $term);
        }
        return $newtags;
    }


    /**
     * Adds item categories to an entry
     *
     * @return array
     */
    private function add_item_categories($item)
    {
        $itemcategories = [];
        foreach ($item->get_categories() as $category) {
            array_push($itemcategories, $category->get_label());
        }
        return $itemcategories;
    }


    /**
     * Run the `Anchorman:beforecreate` event.
     *
     * This allows the entry to be short-circuited right before it's being created.
     * Or, the entry may be modified. Lastly, an addon could just 'do something'
     * here without modifying/stopping the entry.
     *
     * Expects an array of event responses (multiple listeners can listen for the same event).
     * Each response in the array should be another array with an `entry` key.
     *
     * @param  Entry $entry
     * @return array
     */
    private function runBeforeCreateEvent($entry)
    {
        $responses = $this->emitEvent('beforecreate', $entry);

        foreach ($responses as $response) {
            // Ignore any non-arrays
            if (! is_array($response)) {
                continue;
            }

            // If the event returned a response, we'll replace it with that.
            $entry = $response;
        }

        return $entry;
    }
}
