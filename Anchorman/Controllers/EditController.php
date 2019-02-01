<?php

namespace Statamic\Addons\Anchorman\Controllers;

use SimplePie;
use Statamic\Addons\Anchorman\Feed;
use Illuminate\Support\Facades\Storage;
use Statamic\Console\Please;
use Statamic\API\Path;
use Statamic\API\File;
use Statamic\API\YAML;
use Statamic\API\Parse;
use Statamic\Addons\Anchorman\Settings;
use Statamic\API\Fieldset;
use Illuminate\Http\Request;
use Statamic\Addons\Anchorman\TranslatesFieldsets;
use Statamic\CP\Publish\ProcessesFields;
use Statamic\CP\Publish\ValidationBuilder;
use Statamic\CP\Publish\PreloadsSuggestions;

class EditController extends Controller
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
            return redirect()->route('addons.anchorman.create');
        }

        foreach ($feeds_storage as $feed) {

            $rem    = str_replace('site/storage/addons/Anchorman/', '', $feed);
            $info   = $this->storage->getJson($rem);

            $feeds[] = (object) [
                'name'      => slugify($info['title']),
                'title'     => $info['title'],
                'url'       => $info['url'],
                'active'    => $info['active'],
                'collection'=> $info['publish'][0]
            ];

        }

        return $this->view('index', [
            'feeds' => $feeds
        ]);
    }

    /**
     * Maps to the edit page
     *
     * @return mixed
     */
     public function edit(Request $request)
     {
        $fieldset  = $this->fieldset('edit');

        $data = $this->preProcessWithBlankFields(
            $fieldset,
            $this->storage->getJson($request->feed)
        );

        return $this->view('edit', [
            'title'        => $data['title'],
            'data'         => $data,
            'fieldset'     => $fieldset->toPublishArray(),
            'suggestions'  => $this->getSuggestions($fieldset),
            'mapping'      => $data['mapping'],
            'submitUrl'    => route('addons.anchorman.update'),
        ]);
     }


    /**
     * Maps to the create page
     *
     * @return mixed
     */
    public function create()
    {
        $fieldset  = $this->fieldset('create');

        return $this->view('create', [
            'title'        => 'Create feed',
            'data'         => '$info',
            'fieldset'     => $fieldset->toPublishArray(),
            'submitUrl'    => route('addons.anchorman.store'),
        ]);
    }


    /**
     * Maps to the refresh all command
     *
     * @return mixed
     */
    public function refreshAll()
    {
        Please::call('anchorman:update');
    }


    /**
     * Get a feed structure
     *
     * @return mixed
     */
    public function getItemStructure($url)
    {

        $feed = new SimplePie();
        $feed->set_cache_location(Feed::cache_location());
        $feed->set_feed_url($url);
        $success = $feed->init();
        $feed->handle_content_type();
        $structure = [];

        if ($success)
        {
            if ($item = $feed->get_item(0))
            {

                if ($item->get_title())
                {
                    $structure[] = (object) [
                        'title' => 'title',
                        'source' => 'field',
                        'value' => ['title']
                    ];
                }

                if ($item->get_description())
                {
                    $structure[] = (object) [
                        'title' => 'description',
                        'source' => 'custom',
                        'value' => null
                    ];
                }

                if ($item->get_content())
                {
                    $structure[] = (object) [
                        'title' => 'content',
                        'source' => 'field',
                        'value' => ['content']
                    ];
                }

                if ($item->get_author())
                {
                    $structure[] = (object) [
                        'title' => 'author',
                        'source' => 'custom',
                        'value' => null
                    ];
                }

            }

            return $structure;
        }
        else
        {
        	return $feed->error();
        }
    }


    /**
     * Maps to your route definition in routes.yaml
     *
     * @return mixed
     */
    public function store(Request $request)
    {

        // dd($request);
        $feed = new SimplePie();
        $feed->set_cache_location(Feed::cache_location());

        if ($request->url) {
            $feed->set_feed_url($request->url);
            $feed_vars = Feed::feed_vars($request);
        } else {
            $feed->set_feed_url($request->fields['url']);
            $feed_vars = Feed::feed_vars_edit($request);
        }

        $success = $feed->init();
        $feed->handle_content_type();
        $feed_title = slugify($feed->get_title());

        if ($success)
        {
            $this->storage->putJSON($feed_title, [
                'url'           => $feed_vars['url'],
                'publish'       => $feed_vars['publish'],
                'scheduling'    => $feed_vars['scheduling'],
                'active'        => $feed_vars['active'],
                'status'        => $feed_vars['status'],
                'title'         => $feed->get_title(),
                'description'   => $feed->get_description(),
                'language'      => $feed->get_language(),
                'copyright'     => $feed->get_copyright(),
                'permalink'     => $feed->get_permalink(),
                'mapping'       => $this->getItemStructure($feed_vars['url'])
            ]);

        }

        return [
            'success' => true,
            'message' => 'Feed updated successfully.',
            'feed'    => $feed_title
        ];
    }


    /**
     * Maps to your route definition in routes.yaml
     *
     * @return mixed
     */
    public function update(Request $request)
    {

        $feed = new SimplePie();
        $feed->set_cache_location(Feed::cache_location());

        if ($request->url) {
            $feed->set_feed_url($request->url);
            $feed_vars = Feed::feed_vars($request);
        } else {
            $feed->set_feed_url($request->fields['url']);
            $feed_vars = Feed::feed_vars_edit($request);
        }

        $success = $feed->init();
        $feed->handle_content_type();
        $feed_title = slugify($feed->get_title());

        if ($success)
        {
            // dd($feed_vars);
            $this->storage->putJSON($feed_title, [
                'url'           => $feed_vars['url'],
                'publish'       => $feed_vars['publish'],
                'scheduling'    => $feed_vars['scheduling'],
                'active'        => $feed_vars['active'],
                'status'        => $feed_vars['status'],
                'title'         => $feed->get_title(),
                'description'   => $feed->get_description(),
                'language'      => $feed->get_language(),
                'copyright'     => $feed->get_copyright(),
                'permalink'     => $feed->get_permalink(),
                'mapping'       => $feed_vars['mapping']
            ]);

        }

        return [
            'success' => true,
            'message' => 'Feed updated successfully.',
            'feed'    => $feed_title
        ];
    }


    protected function fieldset($fieldset)
    {
        return $this->translateFieldset(Fieldset::create(
            $fieldset,
            YAML::parse(File::get($this->getDirectory() . '/resources/fieldsets/' . $fieldset . '.yaml'))
        ));
    }
}
