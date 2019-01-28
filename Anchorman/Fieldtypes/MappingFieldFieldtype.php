<?php

namespace Statamic\Addons\Anchorman\Fieldtypes;

class MappingFieldFieldtype extends FieldsFieldtype
{
    public $selectable = false;

    public function preProcess($config)
    {
        return $config ? $this->preProcessField($config) : $config;
    }
}
