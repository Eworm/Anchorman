@extends('layout')

@section('content')

    <anchorman-feed-list inline-template>

        <div class="flex items-center mb-3">
            <h1 class="flex-1">All feeds</h1>
            <div class="controls flex flex-wrap justify-center md:block items-center w-full md:w-auto">
                <a href="#" @click="refresh()" class="btn btn-default">Refresh all</a>
                <a href="{{ route('addons.anchorman.create') }}" class="btn btn-primary ml-1 mt-1 md:mt-0">Add a feed</a>
            </div>
        </div>

        <div class="card flush dossier">

            <div class="dossier-table-wrapper">

                <table class="dossier">

                    <thead>
                        <tr>
                            <th class="column-title">Title</th>
                            <th class="column-slug">Url</th>
                            <th class="column-slug">Publishes to</th>
                            <th class="column-date">Last Update</th>
                            <th class="column-enabled">Status</th>
                            <th class="column-actions"></th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($feeds as $feed)

                            <tr>

                                <td class="cell-title first-cell">
                                    <a href="{{ route('addons.anchorman.edit', $feed->name) }}">
                                        {{ $feed->title }}
                                    </a>
                                </td>

                                <td class="cell-permalink">
                                    <a href="{{ $feed->url }}" rel="external" target="_blank">
                                        {{ $feed->url }}
                                    </a>
                                </td>

                                <td class="cell-collection">
                                    {{ $feed->collection }}
                                </td>

                                <td class="cell-updated">
                                    {{ $feed->updated }}
                                </td>

                                <td class="cell-status">
                                    @if ($feed->enabled)
                                        Enabled
                                    @else
                                        <span class="red">Disabled</span>
                                    @endif
                                </td>

                                <td class="column-actions">

                                    <div class="btn-group action-more">

                                        <button type="button" class="btn-more dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="icon icon-dots-three-vertical"></i>
                                        </button>

                                        <ul class="dropdown-menu">
                                            <li class="warning" @click="deleteFeed('{{ $feed->name }}')">
                                                <a href="#" title="Delete this feed">Delete</a>
                                            </li>
                                        </ul>

                                    </div>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </anchorman-feed-list>

@endsection
