<?php

namespace Statamic\Addons\RonBurgundy\Commands;

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
        $feed = new SimplePie();
        $feed->set_cache_location('local/cache');
        $feed->set_feed_url(array(
            'https://woutmager.nl/dvhn.rss'
        ));
        $feed->init();

        foreach ($feed->get_items() as $item):
            Entry::create(slugify($item->get_title()))
                ->collection('feed')
                ->with(['title' => $item->get_title()])
                ->date($item->get_date('Y-m-d'))
                ->save();
        endforeach;
        echo 'Update of https://woutmager.nl/dvhn.rss complete. ' . $itemCount=$feed->get_item_quantity() . ' articles created';

    }
}
