<?php

namespace Statamic\Addons\Anchorman;

use Statamic\API\Collection;
use Statamic\API\Fieldset;

class FieldSuggestions
{
    public function suggestions()
    {
        // return collect(Fieldset::all())->flatMap(function ($fieldset) {
        //     return collect($fieldset->inlinedFields())->map(function ($config, $name) {
        //         $type = array_get($config, 'type', 'text');
        //         return ['value' => $name, 'text' => $name, 'type' => $type];
        //     })->filter();
        // })->sortBy('text')->values()->all();

        $test = Collection::whereHandle('feed');
        return $test->data();
        // $test = Fieldset::all();
        // $test = Collection::handles();
        // dd($test->data());

        // return collect(Collection::whereHandle('feed'))->flatMap(function ($fieldset) {
            // return collect($fieldset->inlinedFields())->map(function ($config, $name) {
            //     $type = array_get($config, 'type', 'text');
            //     return ['value' => $name, 'text' => $name, 'type' => $type];
            // })->filter();
        // })->sortBy('text')->values()->all();


    }
}
