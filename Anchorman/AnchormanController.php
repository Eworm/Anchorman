<?php

namespace Statamic\Addons\Anchorman;

use SimplePie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Statamic\Extend\Controller;

class AnchormanController extends Controller
{
    /**
     * Maps to the index
     *
     * @return mixed
     */
    public function index()
    {
        $feeds_storage  = Storage::files('/site/storage/addons/Anchorman');
        $feeds          = [];

        if (!$feeds_storage) {
            return redirect()->route('addons.menu_editor.new');
        }

        foreach ($feeds_storage as $feed) {
            $add = str_replace('site/storage/addons/Anchorman/', '', $feed);
            $add = str_replace('.json', '', $add);
            $feeds[] = $add;

            // $feeds[] = (object) [
            //     'title' => 'test'
            // ];

        }

        return $this->view('index', [
            'feeds' => $feeds
        ]);
    }

    /**
     * Maps to the edit screen
     *
     * @return mixed
     */
    public function edit(Request $request)
    {
        return $this->view('edit', [
            // 'items' => $this->getItems($request),
            // 'feed' => $request->feed
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
        $feed_url = str_slug($request->feed_url);

        $feed = new SimplePie();
        $feed->set_cache_location('local/cache');
        $feed->set_feed_url($request->feed_url);
        $feed->init();
        $feed->handle_content_type();

        $feed_title = slugify($feed->get_title());

        $this->storage->putJSON($feed_title, [
            'title'         => $feed->get_title(),
            'description'   => $feed->get_description(),
            'permalink'     => $feed->get_permalink(),
        ]);

        return [
            'success' => true,
            'message' => 'Pages updated successfully.',
            'feed'    => $feed_title
        ];
    }
}
