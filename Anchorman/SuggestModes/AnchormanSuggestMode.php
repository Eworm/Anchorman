<?php namespace Statamic\Addons\Anchorman\SuggestModes;

use Statamic\API\Taxonomy;
use Statamic\Addons\Suggest\Modes\AbstractMode;

class AnchormanSuggestMode extends AbstractMode
{
    public function suggestions()
    {

        $taxonomies = Taxonomy::handles();
        $taxonomies_suggest = [];

        foreach ($taxonomies as $tax) {
            $taxonomies_suggest[] = [
                'value' => $tax,
                'text' => $tax
            ];
        }
        return $taxonomies_suggest;

    }
}
