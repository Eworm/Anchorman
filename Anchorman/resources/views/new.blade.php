@extends('layout')

@section('content')

    <amnewfeed inline-template>

        <div class="flex items-center mb-3">
            <h1 class="w-full text-center mb-2 md:mb-0 md:text-left md:w-auto md:flex-1">New feed</h1>
            <a href="#" class="btn btn-primary" v-on:click="saveFeed">Save</a>
        </div>

        <div class="flex justify-between">

            <div class="w-full">

                <div class="card p-0">

                    <div class="card-body">

                        <div class="form-group">

                            <div class="field-inner">
                                <label class="block">
                                    Feed url
                                </label>
                                <input type="url" class="form-control type-url" v-model="feedUrl">
                            </div>

                        </div>

                        <div class="form-group">

                            <div class="field-inner">
                                <label class="block">
                                    Choose a collection
                                </label>
                                <div>
                                    <div class="select select-full" data-content="Feed">
                                        <select tabindex="0" name="fields[template]">
                                            <option></option>
                                            <option value="about">Feed</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="form-group">

                            <div class="field-inner">
                                <label class="block">
                                    Scheduling
                                </label>
                                <div class="help-block">Time in minutes</div>
                                <input type="number" class="form-control type-number" value="60">
                            </div>

                        </div>

                        <div class="form-group">

                            <div class="field-inner">
                                <label class="block">
                                    Publish or draft new articles
                                </label>

                                <div class="radio-fieldtype-wrapper">
                                    <ul class="list-unstyled">
                                        <li>
                                            <input type="radio" value="gd" id="image_manipulation_driver-0">
                                            <label for="image_manipulation_driver-0">Publish</label>
                                        </li>
                                        <li>
                                            <input type="radio" value="imagick" id="image_manipulation_driver-1">
                                            <label for="image_manipulation_driver-1">Draft</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

    </amnewfeed>

@endsection
