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

mix.js('resources/assets/frontend/js/app.js', 'public/frontend/js')
    .sass('resources/assets/frontend/sass/app.scss', 'public/frontend/css');

mix.js('resources/assets/frontend/js/home.js', 'public/frontend/js');
mix.js('resources/assets/frontend/js/detail_category.js', 'public/frontend/js');
mix.js('resources/assets/admin/js/app.js', 'public/admin/js');
mix.js('resources/assets/admin/js/category.js', 'public/admin/js');
