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
            $publish    = $info['publish'][0];
            $enabled    = $info['active'];
            if (isset($info['images_container'])) {
                $assetcontainer = $info['images_container'][0];
            }

            $feed = new SimplePie();
            $feed->set_cache_location(Feed::cache_location());
            $feed->set_feed_url($url);
            $feed->init();
            $this->info('Updating ' . $feed->get_title());
            $i = 0;

            // Get the chosen taxonomy
            if (isset($info['add_taxonomies'])) {
                $taxonomy = $info['add_taxonomies'][0];
            }

            // Add custom terms to the chosen taxonomy
            if (isset($info['add_tags'])) {
                $tags = $info['add_tags'];
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
                    $with[$info['mapping_title']['value']] = $item->get_title();
                    $slugged = slugify($item->get_title());

                    if (isset($info['mapping_description']) && $item->get_description()) {
                        if ($info['mapping_description']['source'] != 'disable' && $info['mapping_description']['value'] != null) {
                            $with[$info['mapping_description']['value']] = $item->get_description();
                        }
                    }

                    if (isset($info['mapping_content']) && $item->get_content()) {
                        if ($info['mapping_content']['source'] != 'disable' && $info['mapping_content']['value'] != null) {
                            $with[$info['mapping_content']['value']] = $item->get_content();
                        }
                    }

                    if (isset($info['mapping_permalink']) && $item->get_permalink()) {
                        if ($info['mapping_permalink']['source'] != 'disable' && $info['mapping_permalink']['value'] != null) {
                            $with[$info['mapping_permalink']['value']] = $item->get_permalink();
                        }
                    }

                    if (isset($info['mapping_author']) && $item->get_author()) {
                        if ($info['mapping_author']['source'] != 'disable' && $info['mapping_author']['value'] != null) {
                            $with[$info['mapping_author']['value']] = $item->get_author();
                        }
                    }

                    if ($enclosure = $item->get_enclosure()) {
                        $enclosure_type = $enclosure->get_type();
                        $enclosure_link = $enclosure->get_link();

                        if ($enclosure_type == 'image/jpeg') {
                            $with[$info['mapping_thumbnail']['value']] = $this->grabImage($enclosure_link, $assetcontainer);
                        }

                        if ($info['mapping_thumbnail']['source'] != 'disable' && $info['mapping_thumbnail']['value'] != null) {
                            if (isset($info['mapping_thumbnail']) && $enclosure->get_thumbnail()) {
                            }
                        }
                    }

                    if (isset($info['add_tags']) && isset($info['add_taxonomies'])) {
                        $tags = $info['add_tags'];
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
