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
//
mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');

// mix.styles([
//     'resources/admin/assets/bootstrap/css/bootstrap.min.css',
//     'resources/admin/assets/font-awesome/4.5.0/css/font-awesome.min.css',
//     'resources/admin/assets/ionicons/2.0.1/css/ionicons.min.css',
//     'resources/admin/assets/dist/css/AdminLTE.min.css',
//     'resources/admin/assets/dist/css/skins/_all-skins.min.css',
//     'resources/admin/assets/plugins/datatables/dataTables.bootstrap.css',
//     'resources/admin/assets/plugins/iCheck/all.css',
//     'resources/admin/assets/plugins/datepicker/datepicker3.css',
//     'resources/admin/assets/plugins/select2/select2.min.css',
//
// ], 'public/css/admin.css');

mix.styles([
    'resources/public/assets/css/bootstrap.css',
    'resources/public/assets/css/component.css',
    'resources/public/assets/css/style.css',
    'resources/public/assets/css/touchTouch.css',

], 'public/css/public.css');

// mix.scripts([
//     'resources/admin/assets/plugins/jQuery/jquery-2.2.3.min.js',
//     'resources/admin/assets/bootstrap/js/bootstrap.min.js',
//     'resources/admin/assets/plugins/datatables/jquery.dataTables.min.js',
//     'resources/admin/assets/plugins/datatables/dataTables.bootstrap.min.js',
//     'resources/admin/assets/plugins/select2/select2.full.min.js',
//     'resources/admin/assets/plugins/datepicker/bootstrap-datepicker.js',
//     'resources/admin/assets/plugins/slimScroll/jquery.slimscroll.min.js',
//     'resources/admin/assets/plugins/fastclick/fastclick.js',
//     'resources/admin/assets/plugins/iCheck/icheck.min.js',
//     'resources/admin/assets/dist/js/app.min.js',
//     'resources/admin/assets/dist/js/demo.js',
//     'resources/admin/scripts.js'
//
// ], 'public/js/admin.js');

mix.scripts([
    'resources/public/assets/js/bootstrap.js',
    'resources/public/assets/js/grid.js',
    'resources/public/assets/js/jquery.flexisel.js',
    'resources/public/assets/js/jquery.min.js',
    'resources/public/assets/js/modernizr.custom.js',
    'resources/public/assets/js/responsiveslides.min.js',
    'resources/public/assets/js/script.js'

], 'public/js/public.js');

// mix.copy('resources/admin/assets/bootstrap/fonts', 'public/fonts');
// mix.copy('resources/admin/assets/dist/fonts', 'public/fonts');
// mix.copy('resources/public/assets/fonts', 'public/fonts');
// mix.copy('resources/admin/assets/dist/img', 'public/img');
// mix.copy('resources/public/assets/images', 'public/images');