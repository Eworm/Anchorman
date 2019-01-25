<?php namespace Statamic\Addons\Anchorman;

use Statamic\Addons\Suggest\Modes\AbstractMode;

class AnchormanSuggestMode extends AbstractMode
{
    public function suggestions()
    {
        // return collect(Fieldset::all())->flatMap(function ($fieldset) {
        //     return collect($fieldset->inlinedFields())->map(function ($config, $name) {
        //         $type = array_get($config, 'type', 'text');
        //         return ['value' => $name, 'text' => $name, 'type' => $type];
        //     })->filter();
        // })->sortBy('text')->values()->all();
    }
}
