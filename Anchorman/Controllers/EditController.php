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

            $ignore = array( 'cgi-bin', '.', '..','._' );
            if (!in_array($rem, $ignore) and substr($rem, 0, 1) != '.') {

                $info   = $this->storage->getYaml($rem);

                $feeds[] = (object) [
                    'active'    => $info['active'],
                    'collection'=> $info['publish_to'][0],
                    'name'      => slugify($info['feed_title']),
                    'title'     => $info['feed_title'],
                    'url'       => $info['url']
                ];

            }

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
            $this->storage->getYaml($request->feed)
        );

        return $this->view('edit', [
            'data'         => $data,
            'fieldset'     => $fieldset->toPublishArray(),
            'submitUrl'    => route('addons.anchorman.update'),
            'suggestions'  => $this->getSuggestions($fieldset),
            'title'        => $data['feed_title'],
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
            'data'         => $fieldset->toPublishArray(),
            'fieldset'     => $fieldset->toPublishArray(),
            'submitUrl'    => route('addons.anchorman.store'),
            'title'        => 'Create feed',
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
     * Stores a new feed
     *
     * @return mixed
     */
    public function store(Request $request)
    {

        $feed = new SimplePie();
        $feed->set_cache_location(Feed::cache_location());
        $feed->set_feed_url($request['fields']['url']);

        $success = $feed->init();
        $feed->handle_content_type();
        $feed_title = slugify($feed->get_title());

        if ($success)
        {
            $this->storage->putYAML($feed_title, [
                'active'                => true,
                'item_title'            => ['source' => 'field', 'value' => 'title'],
                'feed_copyright'        => $feed->get_copyright(),
                'feed_language'         => $feed->get_language(),
                'feed_permalink'        => $feed->get_permalink(),
                'feed_title'            => $feed->get_title(),
                'publish_to'            => $request['fields']['publish_to'],
                'scheduling'            => 60,
                'status'                => 'publish',
                'url'                   => $request['fields']['url']
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
        $feed = new SimplePie();
        $feed->set_cache_location(Feed::cache_location());
        $feed->set_feed_url($request->fields['url']);

        $success = $feed->init();
        $feed->handle_content_type();
        $feed_title = slugify($feed->get_title());

        if ($success)
        {
            $feed_params = [
                $request->fields,
                'feed_copyright' => $feed->get_copyright(),
                'feed_permalink' => $feed->get_permalink(),
                'feed_language' => $feed->get_language(),
                'feed_title' => $feed->get_title()
            ];
            $this->storage->putYAML($feed_title, $feed_params[0]);
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
