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
        'cp.add_to_head' => 'addToHead'
    ];

    public function addNavItems($nav)
    {
        $syndication = Nav::item('Syndication')->route('addons.anchorman')->icon('rss');
        $nav->addTo('tools', $syndication);
    }

    protected function getPlaceholder($key, $field, $data)
    {
        if (! $data) {
            return;
        }

        $vars = (new TagData)
            ->with(Settings::load()->get('defaults'))
            ->with($data->getWithCascade('anchorman', []))
            ->withCurrent($data)
            ->get();

        return array_get($vars, $key);
    }

    public function addToHead()
    {
        $assetContainer = $this->getConfig('asset_container');

        $suggestions = json_encode((new FieldSuggestions)->suggestions());

        return "<script>var Anchorman = { assetContainer: '{$assetContainer}', fieldSuggestions: {$suggestions} };</script>";
    }
}
