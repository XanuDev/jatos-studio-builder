const mix = require('laravel-mix');
let webpack = require('webpack');
let path = require('path');

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

mix.webpackConfig({
    resolve: {
        alias: {
            jQuery: path.resolve(
                __dirname,
                'node_modules/jquery/dist/jquery.js'
            ),
        },
    },
    plugins: [
        // ProvidePlugin helps to recognize $ and jQuery words in code
        // And replace it with require('jquery')
        new webpack.ProvidePlugin({
            $: 'jquery',
            jQuery: 'jquery',
        }),
    ],
});

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();

mix.copyDirectory('resources/assets/img', 'public/img');

if (mix.inProduction()) {
    mix.version();
}
