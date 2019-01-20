var gulp = require('gulp'),
    elixir = require('laravel-elixir'),
    plugins = require('gulp-load-plugins')();

require('laravel-elixir-vue');

elixir(function(mix) {
    mix.webpack([
        './Anchorman/resources/assets/js/main.js'
    ], './Anchorman/resources/assets/js/scripts.js');
});
