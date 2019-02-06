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
            'url'                   => $request->url,
            'publish'               => $request->publish,
            'scheduling'            => '60',
            'active'                => true,
            'status'                => 'publish',
            'mapping_title'         => ['source' => 'field', 'value' => 'title'],
            'mapping_description'   => ['source' => 'custom', 'value' => ''],
            'mapping_content'       => ['source' => 'custom', 'value' => ''],
            'mapping_author'        => ['source' => 'custom', 'value' => ''],
            'mapping_thumbnail'     => ['source' => 'field', 'value' => ''],
            'mapping_taxonomies'    => ['source' => 'field', 'value' => '']
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
            'url'                   => $request->fields['url'],
            'publish'               => $request->fields['publish'],
            'scheduling'            => $request->fields['scheduling'],
            'active'                => $request->fields['active'],
            'status'                => $request->fields['status'],
            'mapping_title'         => $request->fields['mapping_title'],
            'mapping_description'   => $request->fields['mapping_description'],
            'mapping_content'       => $request->fields['mapping_content'],
            'mapping_author'        => $request->fields['mapping_author'],
            'mapping_thumbnail'     => $request->fields['mapping_thumbnail'],
            'mapping_taxonomies'    => $request->fields['mapping_taxonomies']
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
