<?php

namespace Statamic\Addons\Anchorman\Commands;

use SimplePie;
use Illuminate\Support\Facades\Storage;
use Statamic\API\Entry;
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
            $rem = str_replace('site/storage/addons/Anchorman/', '', $feed);
            $info = $this->storage->getJson($rem);
            $url = $info['url'];
            $publish = $info['publish'][0];

            $feed = new SimplePie();
            $feed->set_cache_location('local/cache');
            $feed->set_feed_url($url);
            $feed->init();
            $this->info('Updating ' . $feed->get_title());
            $i = 0;

            foreach ($feed->get_items() as $item):

                $slugged = slugify($item->get_title());

                if (Entry::slugExists($slugged, $publish)) {

                    // $this->info($item->get_title() . " <fg=red>already exists</>");

                } else {

                    $bar = $this->output->createProgressBar($feed->get_item_quantity());
                    $bar->start();

                    if ($info['status'] == 'publish') :

                        Entry::create($slugged)
                            ->collection($publish)
                            ->with(['title' => $item->get_title()])
                            ->date($item->get_date('Y-m-d'))
                            ->save();

                    else :

                        Entry::create($slugged)
                            ->collection($publish)
                            ->published(false)
                            ->with(['title' => $item->get_title()])
                            ->date($item->get_date('Y-m-d'))
                            ->save();

                    endif;

                    $i++;
                    $bar->advance();
                    $bar->finish();

                }

            endforeach;

            if ($i == 0) :

                $this->info("Update complete. I found no new articles");

            else :

                $this->info("\nUpdate complete. I found " . $i . " new articles and added them to " . $publish);

            endif;
            $this->info("\n");
        }
    }
}
