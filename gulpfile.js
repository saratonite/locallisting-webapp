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
