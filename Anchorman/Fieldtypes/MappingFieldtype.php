<?php

namespace Statamic\Addons\Anchorman\Fieldtypes;

use Statamic\API\Str;
use Statamic\Extend\Fieldtype;
use Statamic\CP\FieldtypeFactory;

class MappingFieldtype extends Fieldtype
{
    public $selectable = false;

    public function blank()
    {
        return null;
    }

    public function preProcess($data)
    {

        // $feed = new SimplePie();
        // $feed->set_cache_location('local/cache');
        // $feed->set_feed_url();
        // $feed->init();

        // if (is_string($data) && Str::startsWith($data, '@seo:')) {
        //     return ['source' => 'field', 'value' => explode('@seo:', $data)[1]];
        // }
        //
        // if ($data === false && $this->getFieldConfig('disableable') === true) {
        //     return ['source' => 'disable', 'value' => null];
        // }
        //
        // if (! $data && $this->getFieldConfig('inherit') !== false) {
        //     return ['source' => 'inherit', 'value' => null];
        // }
        //
        // return ['source' => 'custom', 'value' => $this->fieldtype()->preProcess($data)];
    }

    public function process($data)
    {
        // if ($data['source'] === 'field') {
        //     return '@seo:' . $data['value'];
        // }
        //
        // if ($data['source'] === 'inherit') {
        //     return null;
        // }
        //
        // if ($data['source'] === 'disable') {
        //     return false;
        // }
        //
        // return $this->fieldtype()->process($data['value']);
    }

    protected function fieldtype()
    {
        $config = $this->getFieldConfig('field');

        return FieldtypeFactory::create(array_get($config, 'type'), $config);
    }
}
