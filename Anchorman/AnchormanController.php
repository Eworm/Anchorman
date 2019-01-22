<?php

namespace Statamic\Addons\Anchorman;

use SimplePie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Statamic\API\YAML;
use Statamic\API\Path;
use Statamic\API\File;
use Statamic\API\Fieldset;
use Statamic\Extend\Controller;

class AnchormanController extends Controller
{

    /**
     * @var bool
     */
    private $isFirstParty = false;


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
            return redirect()->route('addons.menu_editor.create');
        }

        foreach ($feeds_storage as $feed) {

            $rem = str_replace('site/storage/addons/Anchorman/', '', $feed);
            $info = $this->storage->getJson($rem);

            $feeds[] = (object) [
                'name' => slugify($info['title']),
                'title' => $info['title'],
                'permalink' => $info['permalink']
            ];

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

        $fieldset = Fieldset::create('edit');
        $fieldset->type('addon');

        $contents = [
            'fields' => []
        ];

        $contents = array_merge_recursive($contents, YAML::parse($this->getFile('/edit.yaml')));

        $fieldset->contents($contents);

        return $this->view('edit', [
            'feed' => $this->storage->getJson($request->feed)
        ]);
    }

    /**
     * Maps to the new feed screen
     *
     * @return mixed
     */
    public function create()
    {
        return $this->view('create');
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
            'feed'          => $request->feed_url,
            'title'         => $feed->get_title(),
            'description'   => $feed->get_description(),
            'language'      => $feed->get_language(),
            'copyright'     => $feed->get_copyright(),
            'permalink'     => $feed->get_permalink(),
        ]);

        return [
            'success' => true,
            'message' => 'Pages updated successfully.',
            'feed'    => $feed_title
        ];
    }


    public function isFirstParty($firstParty = null)
    {
        if (is_null($firstParty)) {
            return $this->isFirstParty;
        }

        $this->isFirstParty = $firstParty;

        return $this;
    }


    /**
     * Get the contents of a given file in the addon's directory.
     *
     * @param string $path
     * @return string
     */
    public function getFile($path)
    {
        return File::get($this->getDirectory() . $path);
    }


    /**
     * The path to the directory.
     *
     * @return string
     */
    public function directory()
    {
        // return $this->isFirstParty() ? bundles_path($this->id) : addons_path($this->id);
    }
}
