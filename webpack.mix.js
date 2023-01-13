const mix = require('laravel-mix');

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

mix.copy('resources/js/adminlte.min.js', 'public/js')
    .js('resources/js/app.js', 'js/app.js')
    .postCss('resources/css/adminlte.css', 'public/css')
    .copy('resources/plugins/fontawesome-free', 'public/plugins/fontawesome-free')
    .copy('resources/plugins/fontawesome-free/css/all.min.css', 'public/plugins/fontawesome-free/css/all.min.css')
    .copy('resources/images', 'public/images')
    .copy('resources/plugins', 'public/plugins')
    .sourceMaps();

    if (mix.inProduction()) {
        mix.version();
    } else {
        // Uses inline source-maps on development
        mix.webpackConfig({
            devtool: 'inline-source-map'
        });
    }