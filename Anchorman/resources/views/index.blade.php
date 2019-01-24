@extends('layout')

@section('content')

    <div class="flex items-center mb-3">
        <h1 class="flex-1">Your feeds</h1>
        <div class="controls flex flex-wrap justify-center md:block items-center w-full md:w-auto">
            <a href="#" @click="refreshAll" class="btn btn-default">Refresh all</a>
            <a href="{{ route('addons.menu_editor.create') }}" class="btn btn-primary ml-1 mt-1 md:mt-0">Create feed</a>
        </div>
    </div>

    <div class="card flush dossier">

        <div class="dossier-table-wrapper">

            <table class="dossier">

                <thead>
                    <tr>
                        <th class="column-title">Name</th>
                        <th class="column-slug">Url</th>
                        <th class="column-date">Updated</th>
                        <th class="column-active">Status</th>
                        <th class="column-actions"></th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($feeds as $feed)

                        <tr>

                            <td class="cell-title first-cell">
                                <a href="{{ route('addons.menu_editor.edit', $feed->name) }}" title="Edit {{ $feed->title }}">
                                    {{ $feed->title }}
                                </a>
                            </td>

                            <td class="cell-permalink">
                                {{ $feed->url }}
                            </td>

                            <td class="cell-updated">
                                Last checked 1 uur ago
                            </td>

                            <td class="cell-status">
                                @if ($feed->active)
                                    Active
                                @else
                                    Disabled
                                @endif
                            </td>

                            <td class="column-actions">

                                <div class="btn-group action-more">

                                    <button type="button" class="btn-more dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="icon icon-dots-three-vertical"></i>
                                    </button>

                                    <ul class="dropdown-menu">
                                        <li class="warning" @click="deleteFeed('{{ $feed->title }}')">
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

@endsection
