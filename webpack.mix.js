const mix = require('laravel-mix');

// Main resources
mix.js('resources/js/app.js', 'public/js/app.min.js').sourceMaps()
    .sass('resources/sass/app.scss', 'public/css/app.min.css');
    
// Lightseed
mix.styles('resources/css/lightseed.css', 'public/css/lightseed.min.css');

// Custom scripts
mix.scripts([
  'resources/js/custom/lazysizes.min.js'
], 'public/js/lazysizes.min.js');
  
