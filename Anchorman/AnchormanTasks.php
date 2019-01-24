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

        $feeds_storage  = Storage::files('/site/storage/addons/Anchorman');

        foreach ($feeds_storage as $feed) {

            $rem = str_replace('site/storage/addons/Anchorman/', '', $feed);
            $info = $this->storage->getJson($rem);
            $int = intval($info['scheduling']);

            $schedule->command('anchorman:update')->cron('*/' . $int . ' * * * * *');

        }
    }
}
