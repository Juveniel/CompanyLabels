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
    //mix css
    mix.styles([
        'fonts.css',
        'font-awesome.min.css',
        'bootstrap.css',
        'revslider.css',
        'style.css',
        'app.css'
    ], 'public/output/front.css', 'public/css');

    //mix sass
    mix.sass('admin.scss', 'public/css');

    mix.styles([
        'fonts.css',
        'font-awesome.min.css',
        'bootstrap.css',
        'admin.css',
        'dataTables.bootstrap.css',
        'backend.css'
    ], 'public/output/backend.css', 'public/css');

    //mix scripts
    mix.scripts([
        'jquery.js',
        'bootstrap.js',
        'jquery.themepunch.plugins.min.js',
        'jquery.themepunch.revolution.min.js',
        'front_main.js'
    ], 'public/output/front.js', 'public/js');

    mix.scripts([
        'jquery.js',
        'jquery-ui.js',
        'bootstrap.js',
        'jquery.dataTables.js',
        'dataTables.bootstrap.js',
        'jquery.sessionTimeout.js',
        'backend_main.js'
    ], 'public/output/backend.js', 'public/js');

    mix.version(["public/output/front.css", "public/output/front.js", "public/output/backend.css", "public/output/backend.js"]);
});