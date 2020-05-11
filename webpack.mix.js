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

mix
  // dashboard
  .js('resources/js/dashboard/app.js', 'public/dashboard/js')
  .sass('resources/sass/dashboard/app.scss', 'public/dashboard/css')
  .options({
    fileLoaderDirs: {
      images: 'dashboard/images',
      fonts: 'dashboard/fonts'
    }
  });
