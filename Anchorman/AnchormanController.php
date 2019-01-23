<?php

namespace Statamic\Addons\Anchorman;

use SimplePie;

use Illuminate\Support\Facades\Storage;
use Statamic\API\Path;
use Statamic\API\File;
use Statamic\API\YAML;
use Statamic\API\Parse;
use Statamic\API\Fieldset;
use Illuminate\Http\Request;
use Statamic\Addons\Anchorman\Settings;
use Statamic\Addons\Anchorman\TranslatesFieldsets;
use Statamic\Extend\Controller;

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
                'url' => $info['url']
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

         $info = $this->storage->getJson($request->feed);
         $fieldset = $this->fieldset();

         if ($info['url'] !== NULL) {

             return $this->view('edit', [
                 'title' => $info['title'],
                 'data' => $info,
                 'fieldset' => $fieldset->toPublishArray(),
                 'submitUrl' => route('addons.menu_editor.store'),
             ]);

         } else {

             return $this->view('edit', [
                 'title' => 'Create feed',
                 'data' => Settings::load()->get('edit'),
                 'fieldset' => $fieldset->toPublishArray(),
                 'submitUrl' => route('addons.menu_editor.store'),
             ]);

         }


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

        $feed = new SimplePie();
        $feed->set_cache_location('local/cache');
        $feed->set_feed_url($request->fields['url']);
        $feed->init();
        $feed->handle_content_type();

        $feed_title = slugify($feed->get_title());

        $this->storage->putJSON($feed_title, [
            'url'           => $request->fields['url'],
            'collection'    => $request->fields['collection'][0],
            'scheduling'    => $request->fields['scheduling'],
            'status'        => $request->fields['status'],
            'title'         => $feed->get_title(),
            'description'   => $feed->get_description(),
            'language'      => $feed->get_language(),
            'copyright'     => $feed->get_copyright(),
            'permalink'     => $feed->get_permalink(),
        ]);

        return [
            'success' => true,
            'message' => 'Feed updated successfully.',
            'feed'    => $feed_title
        ];
    }
}
