@extends('layout')

@section('content')

    <div class="flex items-center mb-3">
        <h1 class="w-full text-center mb-2 md:mb-0 md:text-left md:w-auto md:flex-1">Eigen Standaard Artikelen</h1>

        <div class="controls flex flex-wrap items-center w-full lg:w-auto justify-center">
            <div class="mr-2 my-1">
            <a href="" class="btn btn-default">Refresh now</a>
        </div>
        <a href="" class="btn btn-primary">Save</a>
    </div>

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
                                <input type="number" class="form-control type-number">
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

            <div class="publish-sidebar ml-32" style="">
                <div class="card p-0">
                    <div class="card-body">
                            <div class="form-group w-full">
                                <div class="field-inner">

                                    <table class="mt-0 dossier">
                                        <tbody>

                                        <tr>
                                            <td>Homepage:</td>
                                            <td><a href="https://www.dvhn.nl/">https://www.dvhn.nl/</a></td>
                                        </tr>
                                        <tr>
                                            <td>Description:</td>
                                            <td>RSS Feed</td>
                                        </tr>
                                        <tr>
                                            <td>Language:</td>
                                            <td>NL</td>
                                        </tr>
                                        <tr>
                                            <td>Last build:</td>
                                            <td>Sun, 20 Jan 2019 19:32:36 +0100</td>
                                        </tr>

                                    </tbody>

                                    </table>

                                </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection
