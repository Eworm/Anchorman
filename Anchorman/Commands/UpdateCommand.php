<?php

namespace Statamic\Addons\Anchorman\Commands;

use SimplePie;
use Statamic\Addons\Anchorman\Feed;
use Illuminate\Support\Facades\Storage;
use Statamic\API\Entry;
use Statamic\API\Term;
use Statamic\API\Taxonomy;
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

            if (isset($info['add_taxonomies'])) {
                $taxonomy = $info['add_taxonomies'][0];
            }

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
                // $this->info($url);
            }

            $feed = new SimplePie();
            $feed->set_cache_location(Feed::cache_location());
            $feed->set_feed_url($url);
            $feed->init();
            $this->info('Updating ' . $feed->get_title());
            $i = 0;

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

            // Add items to the chosen collection
            foreach ($feed->get_items() as $item):

                if ($enabled === true) {

                    $with = [];
                    $with[$info['mapping_title']['value']] = $item->get_title();

                    if (isset($info['mapping_content'])) {
                        $with[$info['mapping_content']['value']] = $item->get_content();
                    }

                    if (isset($info['mapping_taxonomies'])) {
                        $with[$info['mapping_taxonomies']['value']] = $item->get_category();
                    }

                    if (isset($info['add_tags']) && isset($info['add_taxonomies'])) {
                        $tags = $info['add_tags'];
                        $newtags = [];
                        foreach ($tags as $term) {
                            array_push($newtags, $term);
                        }
                        $with[$taxonomy] = $newtags;
                    }

                    $this->info(var_dump($with));

                    $slugged = slugify($item->get_title());

                    if (Entry::slugExists($slugged, $publish)) {

                        $this->info($item->get_title() . " <fg=red>already exists</>");

                    } else {

                        if ($info['status'] == 'publish') :

                            Entry::create($slugged)
                                ->collection($publish)
                                ->with($with)
                                ->date($item->get_date('Y-m-d'))
                                ->save();

                        else :

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

                $this->info("\nUpdate complete. I found " . $i . " new articles and added them to " . $publish . ".");

            endif;
            $this->info("\n");
        }
    }
}
