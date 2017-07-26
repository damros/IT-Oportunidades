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
 
elixir.config.sourcemaps = false;

elixir(function(mix) {
    //mix.sass('app.scss');
	
	mix.styles([
        'base.css',
        'responsive.css',		
        'font-awesome.css',
        'fonts.css',
        'itoportunidades.css',		
	    'style.css',		
        'green.css',
        'tooltipster.css',		
        'pikaday.css'
    ]);
	
	mix.scripts([
        'custom.js',		
        'jquery.superfish.js',
        'jquery.jpanelmenu.js',
        'stacktable.js',
        'jquery.blockUI.js',
        'pikaday.js',
        'pikaday.jquery.js',
        'jquery.sceditor.js',
        'jquery.sceditor.xhtml.min.js',
        'itoportunidades.js'
    ], 'public/js/app.js')
	.scripts([
        'jquery-2.1.3.min.js',
        'chosen.jquery.min.js',
        'jquery.counterup.min.js',
        'jquery.themepunch.tools.min.js',
        'jquery.themepunch.revolution.min.js',
        'jquery.flexslider-min.js',
        'jquery.magnific-popup.min.js',
        'waypoints.min.js',
        'jquery.tooltipster.min.js',
        'moment.min.js',
        'jquery.themepunch.showbizpro.min.js'
    ], 'public/js/vendor.js');
	
	mix.version(['public/css/all.css','public/js/app.js','public/js/vendor.js'],'public');
	
});
