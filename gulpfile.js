var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    //bower components
    var bower_folder = "vendor/bower_dl/";

    //bower css
    mix.copy(bower_folder + 'bootstrap/dist/css/bootstrap.css', 'public/css/bootstrap.css');

    //bower js
    mix.copy(bower_folder + 'jquery/dist/jquery.js', 'public/js/jquery.js');
    mix.copy(bower_folder + 'bootstrap/dist/js/bootstrap.js', 'public/js/bootstrap.js');

    //mix css
    mix.styles([
        'bootstrap.css',
        'app.css'
    ], 'public/output/front.css', 'public/css');

    //mix sass
    mix.sass('app.scss');

    //mix scripts
    mix.scripts([
        'jquery.js',
        'bootstrap.js',
        'front_main.js'
    ], 'public/output/front.js', 'public/js');

    mix.version(["public/output/front.css", "public/output/front.js"]);
});