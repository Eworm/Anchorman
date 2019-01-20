<?php

namespace Statamic\Addons\RonBurgundy;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Statamic\Extend\Controller;

class RonBurgundyController extends Controller
{
    /**
     * Maps to the index
     *
     * @return mixed
     */
    public function index()
    {
        $feeds_storage  = Storage::files('/site/storage/addons/RonBurgundy');
        $feeds          = [];

        if (!$feeds_storage) {
            return redirect()->route('addons.menu_editor.new');
        }

        foreach ($feeds_storage as $feed) {
            $add = str_replace('site/storage/addons/RonBurgundy/', '', $feed);
            $add = str_replace('.json', '', $add);
            $feeds[] = $add;
        }

        return $this->view('index', [
            'feeds' => $feeds
        ]);

        // return $this->view('index');
    }

    /**
     * Maps to the edit screen
     *
     * @return mixed
     */
    public function edit(Request $request)
    {
        return $this->view('edit', [
            'items' => $this->getItems($request),
            'feed' => $request->feed
        ]);
    }

    /**
     * Maps to the new feed screen
     *
     * @return mixed
     */
    public function new()
    {
        return $this->view('new');
    }

    /**
     * Maps to your route definition in routes.yaml
     *
     * @return mixed
     */
    public function store(Request $request)
    {
        $feed_name = str_slug($request->menu_name);

        $this->storage->putJSON($feed_name, []);

        return [
            'success' => true,
            'message' => 'Pages updated successfully.',
            'menu'    => $feed_name
        ];
    }
}
