var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

var paths = {
	'jquery' : './vendor/bower_components/jquery/dist/jquery.js',
    'bootstrap': './vendor/bower_components/bootstrap-sass/assets/'
}


elixir(function(mix) {
    mix.sass('app.scss')
    .copy(paths.bootstrap + 'fonts/bootstrap/**', 'public/fonts');
    mix.sass('dashboard.scss');
});


elixir(function(mix){
	mix.scripts([
            paths.jquery,
            paths.bootstrap + "javascripts/bootstrap.js"
        ],'public/js/vendor.js');
});


elixir(function(mix){

    mix.scripts(['dashboard/**/*.js'],'public/js/dashboard.js');
	mix.scripts(['app.js'],'public/js/app.js');

});


// For userapp

var vendorAppLibs = [
    './vendor/bower_components/jquery/dist/jquery.js',
    './vendor/bower_components/bootstrap-sass/assets/javascripts/bootstrap.js',
    './vendor/bower_components/spin.js/spin.js',
    './vendor/bower_components/angular/angular.js',
    './vendor/bower_components/angular-route/angular-route.js',
    './vendor/bower_components/angular-spinner/angular-spinner.js',
    './vendor/bower_components/angular-toastr/dist/angular-toastr.tpls.js'
];

var vendorAppStyles = [
    './vendor/bower_components/angular-toastr/dist/angular-toastr.css'
];

elixir(function(mix){
    mix.scripts(['userapp/**/*.js'],'public/js/userapp.js');
    mix.scripts(vendorAppLibs,'public/js/vendor.userapp.js');
});

elixir(function(mix) {
    mix.styles(vendorAppStyles,'public/css/vendor.userapp.css');
});
