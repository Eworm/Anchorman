<?php

namespace Statamic\Addons\RonBurgundy\Commands;

use SimplePie;
use Statamic\API\Entry;
use Statamic\Extend\Command;

class UpdateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ronburgundy:update';

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

        //
        $url = 'https://woutmager.nl/dvhn.rss';

        $feed = new SimplePie();
        $feed->set_cache_location('local/cache');
        $feed->set_feed_url(array(
            $url
        ));
        $feed->init();

        $bar = $this->output->createProgressBar($feed->get_item_quantity());
        $bar->start();

        foreach ($feed->get_items() as $item):

            $slugged = slugify($item->get_title());

            if (Entry::slugExists($slugged, 'feed')) {

                // $this->info($item->get_title() . " <fg=red>already exists</>");

            } else {

                Entry::create($slugged)
                    ->collection('feed')
                    ->with(['title' => $item->get_title()])
                    ->date($item->get_date('Y-m-d'))
                    ->save();

                $bar->advance();
                // $this->info($item->get_title() . ' <fg=red>created</>');

            }

        endforeach;

        $bar->finish();
        $this->info("\nUpdate of " . $url . " complete.");

    }
}
