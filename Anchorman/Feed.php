<?php

namespace Statamic\Addons\Anchorman;

use SimplePie;
use Illuminate\Http\Request;

class Feed
{

    /**
     * Returns feed variables for creating a new feed
     *
     * @return array
     */
    public static function feed_vars(Request $request)
    {
        return array(
            'url'           => $request->url,
            'publish'       => $request->publish,
            'scheduling'    => '60',
            'active'        => true,
            'status'        => 'publish'
        );
    }

    /**
     * Returns feed variables for editing a feed
     *
     * @return array
     */
    public static function feed_vars_edit(Request $request)
    {
        return array(
            'url'           => $request->fields['url'],
            'publish'       => $request->fields['publish'],
            'scheduling'    => $request->fields['scheduling'],
            'active'        => $request->fields['active'],
            'status'        => $request->fields['status'],
            'mapping_title'     => $request->fields['mapping_title'],
            'mapping_description'     => $request->fields['mapping_description'],
            'mapping_content'     => $request->fields['mapping_content'],
            'mapping_author'     => $request->fields['mapping_author'],
        );
    }

    /**
     * Sets a Simplepie Cache location
     *
     * @return string
     */
    public static function cache_location()
    {
        return 'local/cache';
    }
}
