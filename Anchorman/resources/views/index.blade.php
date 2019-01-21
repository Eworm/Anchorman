@extends('layout')

@section('content')

    <amlist inline-template>

    <div class="flex items-center mb-3">
        <h1 class="w-full text-center mb-2 md:mb-0 md:text-left md:w-auto md:flex-1">Syndication</h1>
        <a href="{{ route('addons.menu_editor.new') }}" class="btn btn-primary">New feed</a>
    </div>

    <div class="card flush dossier-for-mobile">
    <div class="dossier-table-wrapper">
        <table class="dossier has-checkboxes">
            <thead>
                <tr>
                    <th class="column-title active column-sortable">
                        Name
                    </th>
                    <th class="column-slug column-sortable">
                        Feed
                    </th>
                    <th class="column-date column-sortable">
                        Updated
                        <i class="icon icon-chevron-down"></i>
                    </th>
                    <th class="column-actions"></th>
                </tr>
            </thead>
            <tbody>

                @foreach ($feeds as $feed)

                    <tr>

                        <td class="cell-title first-cell">
                            <span class="column-label">Title</span>
                            <a href="{{ route('addons.menu_editor.edit', $feed->name) }}" title="Edit {{ $feed->title }}">
                                {{ $feed->title }}
                            </a>
                        </td>

                        <td>
                            <span class="column-label">Feed</span>
                            <span>{{ $feed->permalink }}</span>
                        </td>

                        <td>
                            <span class="column-label">Updated</span>
                            <span>
                                Last checked 1 uur ago
                            </span>
                        </td>

                        <td class="column-actions">
                            <div class="btn-group action-more">
                                <button type="button" class="btn-more dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="icon icon-dots-three-vertical"></i> </button>
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

</amlist>

@endsection
