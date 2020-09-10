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

mix.setPublicPath('public')
    .setResourceRoot('../') // Turns assets paths in css relative to css file
    // .options({
    //     processCssUrls: false,
    // })
    .styles([
        'resources/lib/bootstrap/css/bootstrap.css',
        'resources/css/frontend/style.css',
        'resources/lib/font-awesome/css/font-awesome.min.css',
        'resources/lib/animate/animate.css',
        'resources/lib/venobox/venobox.css',
        'resources/lib/owlcarousel/assets/owl.carousel.css',
    ], 'css/frontend.css')

    //.sass('resources/sass/frontend/app.scss', 'css/frontend.css')
    .sass('resources/sass/backend/app.scss', 'css/backend.css')
    .js([

        'resources/js/frontend/app.js',
        'resources/lib/easing/easing.min.js',
        'resources/lib/superfish/hoverIntent.js',
        'resources/lib/superfish/superfish.min.js',
        'resources/lib/wow/wow.min.js',
        'resources/lib/venobox/venobox.min.js',
        'resources/lib/owlcarousel/owl.carousel.min.js',
        'resources/js/frontend/main.js',
    ], 'js/frontend.js')
    .js([
        'resources/js/backend/before.js',
        'resources/js/backend/app.js',
        'resources/js/backend/after.js'
    ], 'js/backend.js')
    .extract([
        // Extract packages from node_modules to vendor.js
        'jquery',
        'bootstrap',
        'popper.js',
        'axios',
        'sweetalert2',
        'lodash'
    ])
    .sourceMaps();

if (mix.inProduction()) {
    mix.version()
        .options({
            // Optimize JS minification process
            terser: {
                cache: true,
                parallel: true,
                sourceMap: true
            }
        });
} else {
    // Uses inline source-maps on development
    mix.webpackConfig({
        devtool: 'inline-source-map'
    });
}
