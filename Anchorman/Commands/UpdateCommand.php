<?php

namespace Statamic\Addons\Anchorman\Commands;

use SimplePie;
use Statamic\Addons\Anchorman\Feed;
use Illuminate\Support\Facades\Storage;
use Statamic\API\Entry;
use Statamic\API\Term;
use Statamic\API\Taxonomy;
use Statamic\API\AssetContainer;
// use Statamic\API\Asset;
use Statamic\API\File;
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
            $info       = $this->storage->getYaml($rem);
            $url        = $info['url'];
            $publish    = $info['publish_to'][0];
            $enabled    = $info['active'];

            if (isset($info['content_author'])) {
                $author = $info['content_author'][0];
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
            if (isset($info['custom_tags'])) {
                $tags = $info['custom_tags'];
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
            foreach ($feed->get_items() as $item):

                if ($enabled === true) {

                    $with = [];
                    $with[$info['content_title']['value']] = $item->get_title();
                    $slugged = slugify($item->get_title());

                    if (isset($info['content_description']) && $item->get_description()) {
                        if ($info['content_description']['source'] != 'disable' && $info['content_description']['value'] != null) {
                            $with[$info['content_description']['value']] = $item->get_description();
                        }
                    }

                    if (isset($info['content_content']) && $item->get_content()) {
                        if ($info['content_content']['source'] != 'disable' && $info['content_content']['value'] != null) {
                            $with[$info['content_content']['value']] = $item->get_content();
                        }
                    }

                    if (isset($info['content_permalink']) && $item->get_permalink()) {
                        if ($info['content_permalink']['source'] != 'disable' && $info['content_permalink']['value'] != null) {
                            $with[$info['content_permalink']['value']] = $item->get_permalink();
                        }
                    }

                    if (isset($info['content_authors'])) {
                        if ($info['content_authors']['source'] != 'disable' && $info['content_authors']['value'] != null) {
                            $with[$info['content_authors']['value']] = $author;
                        }
                    }

                    if ($enclosure = $item->get_enclosure()) {
                        $enclosure_type = $enclosure->get_type();
                        $enclosure_link = $enclosure->get_link();

                        if (isset($info['content_thumbnail']) && $enclosure->get_thumbnail()) {
                            if ($info['content_thumbnail']['source'] != 'disable' && $info['content_thumbnail']['value'] != null) {
                                if ($enclosure_type == 'image/jpeg') {
                                    if ($save_images == true) {
                                        $with[$info['content_thumbnail']['value']] = $this->grabImage($enclosure_link, $assetcontainer);
                                    } else {
                                        $with[$info['content_thumbnail']['value']] = $enclosure_link;
                                    }
                                }
                            }
                        }
                    }

                    if (isset($info['custom_tags']) && isset($info['custom_taxonomies'])) {
                        $tags = $info['custom_tags'];
                        $newtags = [];
                        foreach ($tags as $term) {
                            array_push($newtags, $term);
                        }
                        $with[$taxonomy] = $newtags;
                    }

                    if (Entry::slugExists($slugged, $publish)) {

                        $this->info($item->get_title() . " <fg=red>already exists</>");

                    } else {

                        if ($info['status'] == 'publish') :

                            $this->info('Adding "' . $item->get_title() . '"');

                            Entry::create($slugged)
                                ->collection($publish)
                                ->with($with)
                                ->date($item->get_date('Y-m-d'))
                                ->save();

                        else :

                            $this->info('Adding "' . $item->get_title() . '" <fg=red>(draft)</>');

                            Entry::create($slugged)
                                ->collection($publish)
                                ->published(false)
                                ->with($with)
                                ->date($item->get_date('Y-m-d'))
                                ->save();

                        endif;

                        $i++;

                    }

                }

            endforeach;

            if ($i == 0) :

                $this->info("No new articles.");

            else :

                $this->info("Update complete. I found " . $i . " new articles and added them to " . $publish . ".");

            endif;
            $this->info("\n");
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

        $this->info('Adding "' . $basename . '"');
        File::disk('local')->put($container->data()['path'] . '/' . $basename, $data);
        curl_close ($ch);
        return $container->data()['url'] . '/' . $basename;
    }
}
