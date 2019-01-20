@extends('layout')

@section('content')

    <rbnewfeed inline-template>

        <div class="flex items-center mb-3">
            <h1 class="w-full text-center mb-2 md:mb-0 md:text-left md:w-auto md:flex-1">New feed</h1>
        </div>

        <div class="card p-1">
            <div class="fieldset-builder">
                <div class="form-group">
                    <label class="block">Feed url</label>
                    <input type="text" class="form-control mb-2" autofocus="autofocus" v-model="feedName">
                    <button type="button" class="btn btn-primary" v-on:click="saveFeed">
                        Save Menu
                    </button>
                </div>
            </div>
        </div>

    </rbnewfeed>

@endsection
