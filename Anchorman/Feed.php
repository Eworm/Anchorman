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
            'active'                => true,
            'mapping_title'         => ['source' => 'field', 'value' => 'title'],
            'publish'               => $request->publish,
            'scheduling'            => '60',
            'status'                => 'publish',
            'url'                   => $request->url
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
            'active'                => $request->fields['active'],
            'mapping_title'         => $request->fields['mapping_title'],
            'mapping_content'       => $request->fields['mapping_content'],
            'mapping_author'        => $request->fields['mapping_author'],
            'mapping_thumbnail'     => $request->fields['mapping_thumbnail'],
            'mapping_taxonomies'    => $request->fields['mapping_taxonomies'],
            'mapping_permalink'     => $request->fields['mapping_permalink'],
            'publish'               => $request->fields['publish'],
            'scheduling'            => $request->fields['scheduling'],
            'status'                => $request->fields['status'],
            'url'                   => $request->fields['url']
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
