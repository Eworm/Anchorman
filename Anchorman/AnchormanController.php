<?php

namespace Statamic\Addons\Anchorman;

use SimplePie;
use Statamic\Addons\Anchorman\Pie;
// use SimplePie\Api;
use Illuminate\Support\Facades\Storage;
use Statamic\Console\Please;
use Statamic\API\Path;
use Statamic\API\File;
use Statamic\API\YAML;
use Statamic\API\Parse;
use Statamic\API\Fieldset;
use Illuminate\Http\Request;
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

            $rem    = str_replace('site/storage/addons/Anchorman/', '', $feed);
            $info   = $this->storage->getJson($rem);

            $feeds[] = (object) [
                'name'      => slugify($info['title']),
                'title'     => $info['title'],
                'url'       => $info['url'],
                'active'    => $info['active']
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
         $info      = $this->storage->getJson($request->feed);
         $fieldset  = $this->fieldset();

         return $this->view('edit', [
             'title'        => $info['title'],
             'data'         => $info,
             'fieldset'     => $fieldset->toPublishArray(),
             'submitUrl'    => route('addons.menu_editor.store'),
         ]);
     }

     protected function fieldset()
     {
         return $this->translateFieldset(Fieldset::create(
             'edit',
             YAML::parse(File::get($this->getDirectory() . '/resources/fieldsets/edit.yaml'))
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
     * Maps to the refresh all command
     *
     * @return mixed
     */
    public function refresh_all()
    {
        Please::call('anchorman:update');
    }


    /**
     * Get a feed
     *
     * @return mixed
     */
    public function get_item_structure(Request $request)
    {
        $feed = new SimplePie();
        $feed->set_cache_location(Pie::cache_location());
        $feed->set_feed_url($request->url);
        $success = $feed->init();
        $feed->handle_content_type();

        if ($success)
        {
            echo 'Title: ' . $feed->get_title();
            echo '<br>';
            echo 'Type: ' . $feed->get_type();
            echo '<br>';

            foreach ($feed->get_items() as $item):

                if ($enclosure = $item->get_enclosure())
            	{
            		echo $enclosure->get_thumbnail();
                    echo '<br>';
            	}

            endforeach;
        }
        else
        {
        	echo $feed->error();
        }
    }


    /**
     * Maps to your route definition in routes.yaml
     *
     * @return mixed
     */
    public function store(Request $request)
    {

        $feed = new SimplePie();
        $feed->set_cache_location(Pie::cache_location());

        if ($request->url) {
            $feed->set_feed_url($request->url);
            $url        = $request->url;
            $scheduling = '60';
            $active     = true;
            $status     = 'publish';
        } else {
            $feed->set_feed_url($request->fields['url']);
            $url        = $request->fields['url'];
            $scheduling = $request->fields['scheduling'];
            $active     = $request->fields['active'];
            $status     = $request->fields['status'];
        }

        $feed->init();
        $feed->handle_content_type();

        $feed_title = slugify($feed->get_title());

        $this->storage->putJSON($feed_title, [
            'url'           => $url,
            'scheduling'    => $scheduling,
            'status'        => $status,
            'active'        => $active,
            'publish'       => $request->fields['publish'],
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
