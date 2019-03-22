<?php

namespace Statamic\Addons\Anchorman\Fieldtypes;

use Statamic\API\Str;
use Statamic\Extend\Fieldtype;
use Statamic\CP\FieldtypeFactory;

class SourceFieldtype extends Fieldtype
{
    public $selectable = false;

    public function preProcess($data)
    {

        if ($data['source'] === 'field') {
            return ['source' => 'field', 'value' => $data['value']];
        }

        if ($data['source'] === 'disable') {
            return ['source' => 'disable', 'value' => $data['value']];
        }

        if ($data === false && $this->getFieldConfig('disableable') === true) {
            return ['source' => 'disable', 'value' => null];
        }

        return ['source' => 'custom', 'value' => $data['value']];
    }

    public function process($data)
    {
        if ($data['source'] === 'field') {
            return $data['value'];
        }

        if ($data['source'] === 'custom') {
            return $data['value'];
        }

        if ($data['source'] === 'disable') {
            return false;
        }

        return $this->fieldtype()->process($data['value']);
    }

    protected function fieldtype()
    {
        $config = $this->getFieldConfig('field');

        return FieldtypeFactory::create(array_get($config, 'type'), $config);
    }
}
