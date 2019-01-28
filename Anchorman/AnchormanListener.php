<?php

namespace Statamic\Addons\Anchorman;

use Statamic\API\Nav;
use Statamic\Extend\Listener;

class AnchormanListener extends Listener
{
    /**
     * The events to be listened for, and the methods to call.
     *
     * @var array
     */
     public $events = [
         'cp.nav.created' => 'addNavItems',
         'cp.add_to_head' => 'addToHead'
     ];

     public function addNavItems($nav)
    {
        $syndication = Nav::item('Syndication')->route('addons.anchorman')->icon('rss');
        $nav->addTo('tools', $syndication);
    }

    public function addToHead()
    {
        // $assetContainer = $this->getConfig('asset_container');
        //
        // $suggestions = json_encode((new FieldSuggestions)->suggestions());
        //
        // return "<script>var Anchorman = { assetContainer: '{$assetContainer}', fieldSuggestions: {$suggestions} };</script>";
    }
}
