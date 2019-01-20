@extends('layout')

@section('content')

    <div class="flex items-center mb-3">
        <h1 class="w-full text-center mb-2 md:mb-0 md:text-left md:w-auto md:flex-1">Syndication</h1>
        <a href="" class="btn btn-primary">Save</a>
    </div>

    <div class="w-full">

        <div class="flex justify-between">

            <div class="w-full">

                <div class="card p-0">

                    <div class="card-body">

                        <div class="form-group title-meta-fieldtype w-2/3">

                            <ul>
                                <li>Choose a collection</li>
                                <li>Add a url</li>
                                <li>Refresh now</li>
                                <li>Scheduling (manually add minutes)</li>
                                <li>Publish or draft new articles</li>
                                <li>Permalinks point to</li>
                            </ul>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection
