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

                $info = $this->storage->getYaml($rem);
                if (isset($info['updated'])) {
                    $timediff = (time() - $info['updated']) / 60;
                    $updated = number_format($timediff, 0);

                    if ($updated == 1) {
                        $updated = $updated . ' minute ago';
                    } else {
                        $updated = $updated . ' minutes ago';
                    }
                } else {
                    $updated = 'No updates yet';
                }

                $feeds[] = (object) [
                    'enabled'   => $info['enabled'],
                    'collection'=> $info['publish_to'],
                    'name'      => slugify($info['feed_title']),
                    'title'     => $info['feed_title'],
                    'updated'   => $updated,
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
            'data'         => $this->prepareData([]),
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
        return redirect()->route('addons.anchorman');
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

            $data = $this->processFields($this->fieldset('create'), $request->fields);
            $data['enabled'] = true;
            $data['feed_copyright'] = $feed->get_copyright();
            $data['feed_language'] = $feed->get_language();
            $data['feed_permalink'] = $feed->get_permalink();
            $data['feed_title'] = $feed->get_title();
            $data['item_authors'] = '@ron:author';
            $data['item_content'] = '@ron:content';
            $data['item_content'] = '@ron:content';
            $data['item_description'] = '@ron:sub_title';
            $data['item_title'] = '@ron:title';
            $data['scheduling'] = 60;
            $data['status'] = 'publish';
            $this->storage->putYAML($feed_title, $data);

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

        $data = $this->processFields($this->fieldset('edit'), $request->fields);
        $this->storage->putYAML(slugify($data['feed_title']), $data);

        return [
            'success' => true,
            'message' => 'Feed updated successfully.',
            'feed'    => $request->feed
        ];
    }


    /**
     * Maps to your route definition in routes.yaml
     *
     * @return mixed
     */
    public function destroy(Request $request)
    {
        Storage::delete('site/storage/addons/anchorman/' . $request->feed . '.yaml');

        return [
            'success' => true,
            'message' => 'Menu deleted successfully'
        ];
    }


    protected function fieldset($fieldset)
    {
        return $this->translateFieldset(Fieldset::create(
            $fieldset,
            YAML::parse(File::get($this->getDirectory() . '/resources/fieldsets/' . $fieldset . '.yaml'))
        ));
    }

    private function prepareData($data)
    {
        return $this->preProcessWithBlankFields(Fieldset::get('post'), $data);
    }
}
