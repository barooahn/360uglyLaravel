const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

elixir((mix) => {
    mix.styles([
	    	'bootstrap.css', 
	    	'default.css', 
	    	'font-awesome.css', 
            'flaticon.css',
	    	'main.css'
	    	])
    	.scripts([
    		'jquery-3.2.1.js',
    		'bootstrap.js', 
            'rotate.js', 
            'jquery.scrollify.js',
            'icons.js',
            'header.js',
            'jquery.scrollto.js',
            'smooth-scroll.js',
            'general.js',
            'rollover.js', 
            'ourwork.js'
            ], 'public/js/all.js')
        .scripts([
            'jquery-3.2.1.js',
            'bootstrap.js', 
            'rotate.js',  
            'general.js' 
            ], 'public/js/general.js')
        .scripts([
            'jquery-3.2.1.js',
            'bootstrap.js', 
            'rotate.js',  
            'general.js' 
            ], 'public/js/options.js')
        .scripts([
            'jquery-3.2.1.js',
            'bootstrap.js', 
            'rotate.js',  
            'download.js',
            'general.js' 
            ], 'public/js/download.js')
        .scripts([
            'jquery-3.2.1.js',
            'bootstrap.js', 
            'general.js' 
            ], 'public/js/form.js')
    	.copy(
    		'resources/assets/images', 'public/images')
    	.copy(
    		'resources/assets/fonts', 'public/fonts');     
});