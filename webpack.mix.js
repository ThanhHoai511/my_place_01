let mix = require('laravel-mix');

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

mix.js(['resources/assets/js/app.js',
	'public/assets/modernizr/modernizr.js',
	'public/assets/jquery/dist/jquery.js',
	'public/assets/foundation/js/foundation/foundation.js',
], 'public/js/allscript.js')
   .sass('resources/assets/sass/app.scss', 'public/css');
mix.styles([
	'public/assets/foundation/css/foundation.css',
	'public/css/style.css',
], 'public/css/login.css');
mix.styles([
    'public/assets/foundation/css/foundation.css',
    'public/assets/foundation-icon-fonts/foundation-icons.css',
    'public/css/style.css',
    'public/css/flat-icon/flaticon.css',
], 'public/css/all.css');
