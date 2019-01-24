<?php

namespace Statamic\Addons\Anchorman;

use Illuminate\Support\Facades\Storage;
use Statamic\Extend\Tasks;
use Illuminate\Console\Scheduling\Schedule;

class AnchormanTasks extends Tasks
{
    /**
     * Define the task schedule
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     */
    public function schedule(Schedule $schedule)
    {

        $schedule->command('anchorman:update')->everyMinute()->sendOutputTo('/Users/wout/Sites/statamic-rss/site/storage/addons/Anchorman/log.txt')->emailOutputTo('wout@woutmager.nl');
        file_get_contents("https://cronhub.io/ping/20ea29f0-0c79-11e9-bad3-65985bc7f86f");

        // $feeds_storage  = Storage::files('/site/storage/addons/Anchorman');
        //
        // foreach ($feeds_storage as $feed) {
        //
        //     $rem = str_replace('site/storage/addons/Anchorman/', '', $feed);
        //     $info = $this->storage->getJson($rem);
        //     $int = intval($info['scheduling']);
        //
        //     $schedule->command('anchorman:update')->cron('*/' . $int . ' * * * * *');
        //
        // }
    }
}
