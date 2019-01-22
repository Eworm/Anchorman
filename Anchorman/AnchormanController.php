<?php

namespace Statamic\Addons\Anchorman;

use SimplePie;
use Statamic\Extend\Controller;
use Statamic\API\File;
use Statamic\API\YAML;
use Statamic\API\Parse;
use Statamic\API\Fieldset;
use Illuminate\Http\Request;
// use Statamic\Addons\SeoPro\TagData;
use Statamic\Addons\Anchorman\Settings;
use Statamic\Addons\Anchorman\TranslatesFieldsets;

class AnchormanController extends Controller
{

    use TranslatesFieldsets;

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
         $fieldset = $this->fieldset();

         return $this->view('edit', [
             'title' => $request->feed,
             'data' => Settings::load()->get('edit'),
             'fieldset' => $fieldset->toPublishArray(),
             'suggestions' => [],
             'submitUrl' => route('seopro.humans.update'),
         ]);
     }

     protected function fieldset()
     {
         return $this->translateFieldset(Fieldset::create(
             'edit',
             YAML::parse(File::get($this->getDirectory().'/resources/fieldsets/edit.yaml'))
         ));
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
}
