var elixir = require('laravel-elixir');
elixir.config.sourcemaps = false;

require('laravel-elixir-vue-2');

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

elixir(mix => {
    mix.sass('app.scss')
       .webpack('app.js');

    mix.sass([
        'back/back.scss',
        'font-awesome-4.6.3/scss/font-awesome.scss',
        'sweetalert.css'
    ],'public/css/back.css');

     mix.copy('resources/assets/sass/font-awesome-4.6.3/fonts', 'public/fonts');
});
