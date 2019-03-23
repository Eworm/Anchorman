<?php

namespace Statamic\Addons\Anchorman;

trait TranslatesFieldsets
{
    protected function translateFieldset($fieldset)
    {
        $contents = $fieldset->contents();
        // dd($contents);

        $contents['sections'] = collect($contents['sections'])->map(function ($section) use ($fieldset) {
            $section['fields'] = $this->translateFieldsetFields($section['fields'], $fieldset->name());
            return $section;
        })->all();

        // dd($contents);
        $fieldset->contents($contents);

        return $fieldset;
    }

    protected function translateFieldsetFields($fields, $fieldset)
    {
        return collect($fields)->map(function ($field, $name) use ($fieldset) {
            $key = 'addons.Anchorman::fieldsets/' . $fieldset . '.' . $name;
            $field['display'] = $this->translateFieldsetKey($key);
            $field['instructions'] = $this->translateFieldsetKey($key.'_instruct');
            return $field;
        })->all();
    }

    private function translateFieldsetKey($key)
    {
        $trans = trans($key);

        if ($trans !== $key) {
            return $trans;
        }
    }
}
