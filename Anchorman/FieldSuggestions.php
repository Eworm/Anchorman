<?php

namespace Statamic\Addons\Anchorman;

use Statamic\API\Fieldset;

class FieldSuggestions
{
    public function suggestions()
    {
        return collect(Fieldset::all())->flatMap(function ($fieldset) {
            return collect($fieldset->inlinedFields())->map(function ($config, $name) {
                $type = array_get($config, 'type', 'text');
                return ['value' => $name, 'text' => $name, 'type' => $type];
            })->filter();
        })->sortBy('text')->values()->all();
    }
}
