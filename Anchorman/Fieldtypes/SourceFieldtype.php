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

        // if (is_string($data) && Str::startsWith($data, 'anchorman:')) {
        //     return ['source' => 'field', 'value' => explode('anchorman:', $data)[1]];
        // }
        if (! $data && $this->getFieldConfig('inherit') === false) {
            // dd($this);
            return ['source' => 'field', 'value' => $this->getFieldConfig('field')['value']];
        }

        if ($data === false && $this->getFieldConfig('disableable') === true) {
            return ['source' => 'disable', 'value' => null];
        }

        if (! $data && $this->getFieldConfig('inherit') !== false) {
            return ['source' => 'inherit', 'value' => null];
        }

        return ['source' => 'custom', 'value' => $this->fieldtype()->preProcess($data)];
    }

    public function process($data)
    {
        if ($data['source'] === 'field') {
            return 'anchorman:' . $data['value'];
        }

        if ($data['source'] === 'inherit') {
            return null;
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
