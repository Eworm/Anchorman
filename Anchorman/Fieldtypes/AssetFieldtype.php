<?php

namespace Statamic\Addons\Anchorman\Fieldtypes;

use Statamic\Addons\Assets\AssetsFieldtype;

class AssetFieldtype extends AssetsFieldtype
{
    public $selectable = false;

    protected function maxFiles()
    {
        return 1;
    }
}
