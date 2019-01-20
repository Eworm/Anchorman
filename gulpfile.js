var gulp = require('gulp'),
    elixir = require('laravel-elixir'),
    plugins = require('gulp-load-plugins')();

require('laravel-elixir-vue');

elixir(function(mix) {
    mix.webpack([
        './RonBurgundy/resources/assets/js/main.js'
    ], './RonBurgundy/resources/assets/js/scripts.js');
});
