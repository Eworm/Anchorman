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
        \Statamic\Events\Data\PublishFieldsetFound::class => 'addFieldsetTab',
        \Statamic\Events\Data\FindingFieldset::class => 'addFieldsetTab',
        'cp.add_to_head' => 'addToHead'
    ];

    public function addNavItems($nav)
    {
        $syndication = Nav::item('Syndication')->route('addons.anchorman')->icon('rss');
        $nav->addTo('tools', $syndication);
    }

    public function addFieldsetTab($event)
    {
        if (! in_array($event->type, ['page', 'entry', 'term'])) {
            return;
        }

        $fieldset = $event->fieldset;
        $sections = $fieldset->sections();

        $fields = YAML::parse(File::get($this->getDirectory().'/resources/fieldsets/content.yaml'))['fields'];

        $seoFields = collect($fields['anchorman']['fields'])->map(function ($field, $key) use ($event) {
            $field['placeholder'] = $this->getPlaceholder($key, $field, $event->data);
            return $field;
        })->all();

        $fields['anchorman']['fields'] = $this->translateFieldsetFields($seoFields, 'content');

        $sections['anchorman'] = [
            'display' => 'SEO',
            'fields' => $fields
        ];

        $contents = $fieldset->contents();
        $contents['sections'] = $sections;
        $fieldset->contents($contents);
    }

    public function addToHead()
    {
        $assetContainer = $this->getConfig('asset_container');

        $suggestions = json_encode((new FieldSuggestions)->suggestions());

        return "<script>var Anchorman = { assetContainer: '{$assetContainer}', fieldSuggestions: {$suggestions} };</script>";
    }
}
