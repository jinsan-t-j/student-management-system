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

mix
    /* CSS */
    .sass('resources/sass/main.scss', 'public/css/codebase.css')
    .sass('resources/sass/codebase/themes/corporate.scss', 'public/css/themes/')
    .sass('resources/sass/codebase/themes/earth.scss', 'public/css/themes/')
    .sass('resources/sass/codebase/themes/elegance.scss', 'public/css/themes/')
    .sass('resources/sass/codebase/themes/flat.scss', 'public/css/themes/')
    .sass('resources/sass/codebase/themes/pulse.scss', 'public/css/themes/')

    /* JS */
    .js('resources/js/app.js', 'public/js/laravel.app.js')
    .js('resources/js/codebase/app.js', 'public/js/codebase.app.js')

    /* Page JS */
    .js('resources/js/pages/tables_datatables.js', 'public/js/pages/tables_datatables.js')

    /* Teacher */
    .js('resources/js/teacher/index.js', 'public/js/teacher')

    /* Student */
    .js('resources/js/student/index.js', 'public/js/student')

    /* Mark */
    .js('resources/js/mark/index.js', 'public/js/mark')

    /* Options */
    .options({
        processCssUrls: false
    });