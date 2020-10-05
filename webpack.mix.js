const mix = require('laravel-mix');

// Main resources

mix.js([
  'resources/js/app.js',
  'resources/js/custom/lazysizes.min.js',
  ], 'public/js/app.min.js').sourceMaps();
