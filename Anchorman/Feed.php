<?php

namespace Statamic\Addons\Anchorman;

use SimplePie;
use Illuminate\Http\Request;

class Feed
{
    /**
     * Sets the Simplepie Cache location
     *
     * @return string
     */
    public static function cache_location()
    {
        return 'local/cache';
    }
}
