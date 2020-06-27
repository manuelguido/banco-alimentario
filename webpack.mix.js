const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js/app.min.js').sourceMaps()
    .sass('resources/sass/app.scss', 'public/css/app.min.css');
    
mix.styles('resources/css/lightseed.css', 'public/css/lightseed.min.css');


// mix.js([
//     'resources/js/app.js',
//     'resources/js/all.min.js',
    
//     ], 'public/js/app2.min.js').sourceMaps()
//     .sass('resources/sass/app.scss', 'public/css/app2.min.css');

// // mix.js('resources/js/app.js', 'public/js')
// //     .sass('resources/sass/app.scss', 'public/css');

// mix.styles('resources/css/lightseed.css', 'public/css/lightseed2.min.css');
    