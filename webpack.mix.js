const mix = require('laravel-mix');
require('laravel-vue-lang/mix');

mix.webpackConfig({
    output: {
        chunkFilename: 'js/admin/[name].bundle.js',
        publicPath: '/',
    },
});





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
