@extends('layout')

@section('content')

    <div class="flex items-center mb-3">
        <h1 class="w-full text-center mb-2 md:mb-0 md:text-left md:w-auto md:flex-1">New feed</h1>
        <a href="" class="btn btn-primary">Save</a>
    </div>

    <div class="w-full">

        <div class="flex justify-between">

            <div class="w-full">

                <div class="card p-0">

                    <div class="card-body">

                        <div class="form-group">

                            <div class="field-inner">
                                <label class="block">
                                    Feed url
                                </label>
                                <input type="url" class="form-control type-url">
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection
