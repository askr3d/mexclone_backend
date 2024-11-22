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

mix.js('resources/js/app.js', 'public/js')
    .scripts([
        'node_modules/datatables.net/js/dataTables.js',
    ], 'public/js/datatable.js')
    .scripts(['node_modules/sweetalert2/dist/sweetalert2.all.js'], 'public/js/sweetalert.js')
    .scripts(['node_modules/egalink-toasty.js/dist/toasty.min.js', 'resources/js/toasty-config.js'], 'public/js/toasty.js')
    .styles(['node_modules/sweetalert2/dist/sweetalert2.css'], 'public/css/sweetalert.css')
    .styles(['node_modules/datatables.net-dt/css/dataTables.dataTables.css'], 'public/css/datatable.css')
    .styles(['node_modules/egalink-toasty.js/dist/toasty.min.css'], 'public/css/toasty.css')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);

mix.js('resources/js/app/home/**/*.js', 'public/js/app/home');
mix.postCss('resources/css/app/home/style.css', 'public/css/app/home');

mix.sass('resources/sass/app.scss', 'public/css');
mix.sass('resources/sass/bicons.scss', 'public/css/bicons.css');
