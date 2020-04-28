const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js').sourceMaps();

//Application scripts
mix.js([
    'resources/js/custom/main.js',
    'resources/js/custom/lazysizes.min.js',
    ], 'public/js/custom.js');

//Application styles
mix.styles([
    'resources/css/lightseed.css'
    //'resources/css/main.css'
], 'public/css/app.css');
