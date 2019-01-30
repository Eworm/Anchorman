<?php

namespace Statamic\Addons\Anchorman;

use Statamic\API\Collection;
use Statamic\API\Fieldset;

class FieldSuggestions
{
    public function suggestions()
    {

        // fieldSuggestions: [{"value":"amazon_id","text":"amazon_id","type":"text"},{"value":"array","text":"array","type":"array"}
        // fieldSuggestions: [{"value":"feed","text":"text","type":"type"},{
        // dd(collect(Fieldset::all()));
        return collect(Fieldset::all())->flatMap(function ($fieldset) {
            // dd($fieldset);
            return collect($fieldset->inlinedFields())->map(function ($config, $name) {
                $type = array_get($config, 'type', 'text');
                return ['value' => $name, 'text' => $name, 'type' => $type];
            })->filter();
        })->sortBy('text')->values()->all();

        // $test = Collection::whereHandle('blog');
        // $newtest = $test->data();
        // $fieldtypes = [];
        //
        // foreach ($newtest as $item) {
        //
        //     $fieldtypes[] = (object) [
        //         'value'     => $item,
        //         'text'      => $item,
        //         'type'      => 'text'
        //     ];
        //
        // }
        // return $fieldtypes;

        // return collect($test)->flatMap(function ($fieldset) {
        //     return collect($fieldset->inlinedFields())->map(function ($config, $name) {
        //         $type = array_get($config, 'type', 'text');
        //         return ['value' => $name, 'text' => $name, 'type' => $type];
        //     })->filter();
        // })->sortBy('text')->values()->all();


    }
}
