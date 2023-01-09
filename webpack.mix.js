const mix = require('laravel-mix');
let webpack = require('webpack');
let path = require('path');
const CKEditorWebpackPlugin = require('@ckeditor/ckeditor5-dev-webpack-plugin');
const CKEditorStyles = require('@ckeditor/ckeditor5-dev-utils').styles;
//Includes SVGs and CSS files from "node_modules/ckeditor5-*" and any other custom directories
const CKEditorRegex = {
    svg: /ckeditor5-[^/\\]+[/\\]theme[/\\]icons[/\\][^/\\]+\.svg$/, //If you have any custom plugins in your project with SVG icons, include their path in this regex as well.
    css: /ckeditor5-[^/\\]+[/\\].+\.css$/,
};

//Exclude CKEditor regex from mix's default rules
Mix.listen('configReady', config => {
    const rules = config.module.rules;
    const targetSVG = (/(\.(png|jpe?g|gif|webp|avif)$|^((?!font).)*\.svg$)/).toString();
    const targetFont = (/(\.(woff2?|ttf|eot|otf)$|font.*\.svg$)/).toString();
    const targetCSS = (/\.p?css$/).toString();

    rules.forEach(rule => {
        let test = rule.test.toString();
        if ([targetSVG, targetFont].includes(rule.test.toString())) {
            rule.exclude = CKEditorRegex.svg;
        } else if (test === targetCSS) {
            rule.exclude = CKEditorRegex.css;
        }
    });
});
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
    module: {
        rules: [
            {
                test: CKEditorRegex.svg,
                use: ['raw-loader']
            },
            {
                test: CKEditorRegex.css,
                use: [
                    {
                        loader: 'style-loader',
                        options: {
                            injectType: 'singletonStyleTag',
                            attributes: {
                                'data-cke': true
                            }
                        }
                    },
                    'css-loader',
                    {
                        loader: 'postcss-loader',
                        options: {
                            postcssOptions: CKEditorStyles.getPostCssConfig({
                                themeImporter: {
                                    themePath: require.resolve('@ckeditor/ckeditor5-theme-lark')
                                },
                                minify: true
                            })
                        }
                    }
                ]
            }
        ]
    },
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
        new CKEditorWebpackPlugin({
            language: 'en',
            addMainLanguageTranslationsToAllAssets: true
        }),
        new webpack.ProvidePlugin({
            $: 'jquery',
            jQuery: 'jquery',
            Quill: "Quill",
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
