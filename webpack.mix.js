const mix = require('laravel-mix');
require('laravel-vue-lang/mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .js('resources/admin/js/app.js', 'public/js/admin')
    .vue()
    .postCss('resources/css/app.css', 'public/css', [
        //
    ])
    .postCss('resources/admin/css/app.css', 'public/css/admin', [
        //
    ])
    .sass('resources/scss/custom.scss', 'public/css', [
        //
    ])
    .version().lang();
