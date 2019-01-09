const { mix } = require('laravel-mix');

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

//mix.js('resources/assets/js/app.js', 'public/js')
//   .sass('resources/assets/sass/app.scss', 'public/css');
var pathJS = 'resources/assets/js/front/';
var pathJSDestination = 'public/js/jsresources.js';
var arJsResources =
[
    pathJS + 'jquery.min.js',
    pathJS + 'jquery-migrate-3.0.1.min.js',
    pathJS + 'popper.min.js',
    pathJS + 'bootstrap.min.js',
    pathJS + 'jquery.easing.1.3.js',
    pathJS + 'jquery.waypoints.min.js',
    pathJS + 'jquery.stellar.min.js',
    pathJS + 'owl.carousel.min.js',
    pathJS + 'jquery.magnific-popup.min.js',
    pathJS + 'aos.js',
    pathJS + 'jquery.animateNumber.min.js',
    pathJS + 'scrollax.min.js',
    pathJS + 'bootstrap-datepicker.js',
    pathJS + 'jquery.timepicker.min.js',
    pathJS + 'main.js'

  ];

  var pathCSS = 'resources/assets/css/front/';
  var pathCSSDestination = 'public/css/cssresources.css';
  var arCSSResources =
  [
      pathCSS + 'open-iconic-bootstrap.min.css',
      pathCSS + 'animate.css',
      pathCSS + 'owl.carousel.min.css',
      pathCSS + 'owl.theme.default.min.css',
      pathCSS + 'magnific-popup.css',
      pathCSS + 'aos.css',
      pathCSS + 'ionicons.min.css',
      pathCSS + 'bootstrap-datepicker.css',
      pathCSS + 'jquery.timepicker.css',
      pathCSS + 'flaticon.css',
      pathCSS + 'icomoon.css',
      pathCSS + 'style.css'
   ];

  mix.scripts(arJsResources, pathJSDestination);
  mix.styles(arCSSResources, pathCSSDestination);
