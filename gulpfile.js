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
	'jquery' : './vendor/bower_components/jquery/dist/jquery.min.js',
    'bootstrap': './vendor/bower_components/bootstrap-sass/assets/'
}


elixir(function(mix) {
    mix.sass('app.scss')
    .copy(paths.bootstrap + 'fonts/bootstrap/**', 'public/fonts');
    mix.sass('dashboard.scss');

});

elixir(function(mix) {
    mix.styles([
        './vendor/bower_components/select2/dist/css/select2.min.css'

        ],'public/css/vendor.dashboard.css');
});




elixir(function(mix){
	mix.scripts([
            paths.jquery,
            paths.bootstrap + "javascripts/bootstrap.min.js",
            './vendor/bower_components/select2/dist/js/select2.min.js'
        ],'public/js/vendor.js');
});


elixir(function(mix){

    mix.scripts(['dashboard/**/*.js'],'public/js/dashboard.js');
	mix.scripts(['app.js'],'public/js/app.js');

});


// For userapp

var vendorUserAppLibs = [
    './vendor/bower_components/jquery/dist/jquery.min.js',
    './vendor/bower_components/bootstrap-sass/assets/javascripts/bootstrap.min.js',
    './vendor/bower_components/angular/angular.min.js',
    './vendor/bower_components/angular-route/angular-route.min.js',
    './vendor/bower_components/angular-animate/angular-animate.min.js',
    './vendor/bower_components/angular-messages/angular-messages.min.js',
    './vendor/bower_components/spin.js/spin.min.js',
    './vendor/bower_components/angular-spinner/angular-spinner.min.js',
    './vendor/bower_components/angular-toastr/dist/angular-toastr.tpls.min.js',
    './vendor/bower_components/ng-file-upload/ng-file-upload.min.js',
    './vendor/bower_components/select2/dist/js/select2.min.js',
    './vendor/bower_components/angular-select2/dist/angular-select2.js'
];

var vendorAppStyles = [
    './vendor/bower_components/angular-toastr/dist/angular-toastr.min.css',
    './vendor/bower_components/select2/dist/css/select2.min.css'
];

elixir(function(mix){
    mix.scripts(vendorUserAppLibs,'public/js/vendor.userapp.js');
    mix.scripts(['userapp/**/*.js'],'public/js/userapp.js');
    
});

elixir(function(mix) {
    mix.styles(vendorAppStyles,'public/css/vendor.userapp.css');
});


// For Front end
// FrontEnd Css
elixir(function(mix) {
    mix.styles([
        './vendor/bower_components/select2/dist/css/select2.min.css'

        ],'public/css/vendor.style.css');
});
// FrontEnd Js
elixir(function(mix) {
    mix.scripts([
        './vendor/bower_components/select2/dist/js/select2.min.js'
        ],'public/js/vendor.scripts.js');
});