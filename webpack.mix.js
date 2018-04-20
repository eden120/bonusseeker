const { mix, config } = require('laravel-mix');

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

mix.js(['resources/assets/js/app.js'], 'public/js')
	 .extract([
		//  'jquery',
		 'jquery-match-height',
		//  'bootstrap',
		 'bootstrap-select'
	 ]);

mix.styles([
			'resources/assets/css/themify-icons.css',
			'resources/assets/css/font-awesome.css',
			'resources/assets/css/bootstrap-datetimepicker.min.css',
			'resources/assets/css/bootstrap-select.min.css',
			'resources/assets/css/star-rating.min.css'
		], 'public/css/vendor.css');

mix.sass('resources/assets/sass/app.scss', 'public/css')
	 .options({
		 processCssUrls: false
	 });
mix.sass('resources/assets/sass/admin-assets.scss', 'public/css');

if (config.inProduction) {
	mix.version();
}
