const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js/app.min.js').sourceMaps()
    .sass('resources/sass/app.scss', 'public/css/app.min.css');
    
mix.styles('resources/css/lightseed.css', 'public/css/lightseed.min.css');

// webpack.config.js

module.exports = {
    rules: [
      {
        test: /\.s(c|a)ss$/,
        use: [
          'vue-style-loader',
          'css-loader',
          {
            loader: 'sass-loader',
            // Requires sass-loader@^7.0.0
            options: {
              implementation: require('sass'),
              fiber: require('fibers'),
              indentedSyntax: true // optional
            },
            // Requires sass-loader@^8.0.0
            options: {
              implementation: require('sass'),
              sassOptions: {
                fiber: require('fibers'),
                indentedSyntax: true // optional
              },
            },
          },
        ],
      },
    ],
  }