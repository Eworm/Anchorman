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
            $info   = $this->storage->getYaml($rem);

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
        // dd($fieldset);

        $data = $this->preProcessWithBlankFields(
            $fieldset,
            $this->storage->getYaml($request->feed)
        );

        $data = $this->getItemStructure($data);
        // dd($data);

        // dd($fieldset);
        return $this->view('edit', [
            'title'        => $data['title'],
            'data'         => $data,
            'fieldset'     => $fieldset->toPublishArray(),
            'suggestions'  => $this->getSuggestions($fieldset),
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
            'data'         => $fieldset->toPublishArray(),
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
    public function getItemStructure($data)
    {
        $feed = new SimplePie();
        $feed->set_cache_location(Feed::cache_location());

        $feed->set_feed_url($data['url']);
        $success = $feed->init();
        $feed->handle_content_type();

        // dd($data);

        if ($success)
        {
            if ($item = $feed->get_item(0))
            {

                if (!$item->get_content() || !$item->get_description())
                {
                    $data['mapping_content']['source'] = 'unavailable';
                    $data['mapping_content']['disabled'] = true;
                }

                if (!$item->get_category())
                {
                    $data['mapping_taxonomies']['source'] = 'unavailable';
                    $data['mapping_taxonomies']['disabled'] = true;
                }

                if ($enclosure = $item->get_enclosure())
                {
                    // $enclosure->get_medium();
                    // $enclosure->get_thumbnail();
                }

            }
            return $data;
        }
        else
        {
        	return $feed->error();
        }
    }


    /**
     * Stores a new feed
     *
     * @return mixed
     */
    public function store(Request $request)
    {

        $feed = new SimplePie();
        $feed->set_cache_location(Feed::cache_location());

        $feed->set_feed_url($request['fields']['url']);
        $feed_vars = Feed::feed_vars($request);

        $success = $feed->init();
        $feed->handle_content_type();
        $feed_title = slugify($feed->get_title());

        if ($success)
        {
            $this->storage->putYAML($feed_title, [
                'url'                   => $request['fields']['url'],
                'publish'               => $request['fields']['publish'],
                'scheduling'            => $feed_vars['scheduling'],
                'active'                => $feed_vars['active'],
                'status'                => $feed_vars['status'],
                'title'                 => $feed->get_title(),
                'language'              => $feed->get_language(),
                'copyright'             => $feed->get_copyright(),
                'permalink'             => $feed->get_permalink(),
                'mapping_title'         => $feed_vars['mapping_title']
            ]);

            return [
                'success' => true,
                'message' => 'Feed created successfully.',
                'feed'    => $feed_title
            ];
        }


    }


    /**
     * Saves data when updating a feed
     *
     * @return mixed
     */
    public function update(Request $request)
    {
        // dd($request);
        $feed = new SimplePie();
        $feed->set_cache_location(Feed::cache_location());

        $feed->set_feed_url($request->fields['url']);
        $feed_vars = Feed::feed_vars_edit($request);

        $success = $feed->init();
        $feed->handle_content_type();
        $feed_title = slugify($feed->get_title());

        if ($success)
        {
            $this->storage->putYAML($feed_title, [
                'url'                   => $feed_vars['url'],
                'publish'               => $feed_vars['publish'],
                'scheduling'            => $feed_vars['scheduling'],
                'active'                => $feed_vars['active'],
                'status'                => $feed_vars['status'],
                'title'                 => $feed->get_title(),
                'description'           => $feed->get_content(),
                'language'              => $feed->get_language(),
                'copyright'             => $feed->get_copyright(),
                'permalink'             => $feed->get_permalink(),
                'mapping_title'         => $feed_vars['mapping_title'],
                // 'mapping_author'        => $feed_vars['mapping_author'],
                'mapping_content'       => $feed_vars['mapping_content'],
                'mapping_thumbnail'     => $feed_vars['mapping_thumbnail'],
                'mapping_taxonomies'    => $feed_vars['mapping_taxonomies'],
                'mapping_permalink'     => $feed_vars['mapping_permalink']
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
