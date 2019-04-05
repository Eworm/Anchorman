<?php

namespace Statamic\Addons\Anchorman;

use Statamic\API\Str;
use Statamic\API\Nav;
use Statamic\API\File;
use Statamic\API\YAML;
use Statamic\API\Collection;
use Statamic\Extend\Listener;
use Illuminate\Support\Facades\Cache;

class AnchormanListener extends Listener
{

    use TranslatesFieldsets;

    /**
    * The events to be listened for, and the methods to call.
    *
    * @var array
    */
    public $events = [
        'cp.nav.created' => 'addNavItems',
        'Anchorman.creating' => 'changeEntry',
        'cp.add_to_head' => 'addToHead'
    ];

    public function addNavItems($nav)
    {
        $syndication = Nav::item('Syndication')->route('addons.anchorman')->icon('rss');
        $nav->addTo('tools', $syndication);
    }

    public function changeEntry($item)
    {
        return $item;
        // return [
        //     'entry' => $entry
        // ];
    }

    public function addToHead()
    {
        $assetContainer = $this->getConfig('asset_container');
        $suggestions = json_encode((new FieldSuggestions)->suggestions());
        return "<script>var Anchorman = { assetContainer: '{$assetContainer}', fieldSuggestions: {$suggestions} };</script>";
    }
}
