@extends('layout')

@section('content')

    <div class="flex items-center mb-3">
        <h1 class="w-full text-center mb-2 md:mb-0 md:text-left md:w-auto md:flex-1">Syndication</h1>
        <a href="" class="btn btn-primary">New source</a>
    </div>

    <div class="card flush dossier-for-mobile">
    <div class="dossier-table-wrapper">
        <table class="dossier has-checkboxes">
            <thead>
                <tr>
                    <th class="column-title active column-sortable"> Name  </th>
                    <th class="column-slug column-sortable"> Feed  </th>
                    <th class="column-date column-sortable"> Updated <i class="icon icon-chevron-down"></i> </th>
                    <th class="column-actions"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="cell-title first-cell"> <span class="column-label">Title</span> <span class="has-status-icon">
                        <a class="has-status-icon" href="{{ route('addons.menu_editor.edit') }}">
                        Feed 1
                        </a>
                        </span>
                    </td>
                    <td class="cell-slug"> <span class="column-label">Feed</span> <span>
                        https://woutmager.nl/dvhn.rss
                        </span>
                    </td>
                    <td class="cell-date"> <span class="column-label">Updated</span> <span>
                        Last checked 1 uur ago
                        </span>
                    </td>
                    <td class="column-actions">
                        <div class="btn-group action-more">
                            <button type="button" class="btn-more dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="icon icon-dots-three-vertical"></i> </button>
                            <ul class="dropdown-menu">
                                <li class="warning">
                                    <a href="#">Delete</a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
