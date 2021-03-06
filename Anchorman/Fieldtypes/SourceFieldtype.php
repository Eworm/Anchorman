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
        if (is_string($data) && Str::startsWith($data, '@ron:')) {
            return ['source' => 'field', 'value' => explode('@ron:', $data)[1]];
        }

        if ($data === false && $this->getFieldConfig('disableable') === true) {
            return ['source' => 'disable', 'value' => null];
        }

        return ['source' => 'custom', 'value' => $this->fieldtype()->preProcess($data)];
    }

    public function process($data)
    {
        if ($data['source'] === 'field') {
            return '@ron:' . $data['value'];
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
