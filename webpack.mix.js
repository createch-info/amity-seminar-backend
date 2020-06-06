// const mix = require('laravel-mix');
//
// /*
//  |--------------------------------------------------------------------------
//  | Mix Asset Management
//  |--------------------------------------------------------------------------
//  |
//  | Mix provides a clean, fluent API for defining some Webpack build steps
//  | for your Laravel application. By default, we are compiling the Sass
//  | file for the application as well as bundling up all the JS files.
//  |
//  */
//
// mix.js('resources/js/app.js', 'public/js')
//     .sass('resources/sass/app.scss', 'public/css');


const mix = require('laravel-mix');
// const tailwindcss = require('tailwindcss');
const path = require('path');
const paths = {
    js: path.join(__dirname, 'resources/js'),
    css: path.join(__dirname, 'resources/css/'),
};

require('laravel-mix-purgecss');

mix.webpackConfig({
    resolve: {
        alias: {
            'core': paths.js + '/core',
            '@': paths.js + '/components',
            'services': paths.js + '/services',
        },
    },
});

mix
    .js(paths.js + '/app.js', 'public/js')
    .postCss(paths.css + 'app.css', 'public/css', [

    ])
    .purgeCss();

if (mix.inProduction()) {
    mix.version();
}
