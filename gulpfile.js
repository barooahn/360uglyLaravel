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
	    	'bootstrap.min.css', 
	    	'default.css', 
	    	'font-awesome.min.css', 
	    	'main.css'
	    	])
    	.scripts([
    		'jquery-1.11.2.min.js',
    		'bootstrap.min.js', 
    		'rotate.min.js', 
    		'rollover.js', 
    		'icons.js',
    		'header.js' 
    		])
    	.copy(
    		'resources/assets/images', 'public/images')
    	.copy(
    		'resources/assets/fonts', 'public/fonts');
       
});