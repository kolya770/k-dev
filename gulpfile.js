process.env.DISABLE_NOTIFIER = true;
var elixir = require('laravel-elixir');

require('laravel-elixir-images');
/* 
|------------------------------------------------------------------------— 
| Elixir Asset Management 
|------------------------------------------------------------------------— 
| 
| Elixir provides a clean, fluent API for defining some basic Gulp tasks 
| for your Laravel application. By default, we are compiling the Sass 
| file for our application, as well as publishing vendor resources. 
| 
*/ 

elixir(function(mix) { 
 mix.less('landing/main.less', 'resources/assets/css/landing')
    .less('blog/main.less', 'resources/assets/css/blog')
    .less('portfolio/main.less', 'resources/assets/css/portfolio')
    .less('post/main.less', 'resources/assets/css/post')
    .images
    (
        null,
        null,
        {
         sizes: [[]],
         webp: false
        }
    )
    //Landing
    .styles([
        'libraries/bootstrap.min.css',
        'libraries/swiper.min.css',
        'libraries/slick.css',
        'libraries/slick-theme.css',
        'libraries/preloader.css',
        'libraries/swiper.min.css',
        'libraries/scrolling-nav.css',
        'libraries/some-stuff.css',
        'landing/main.css'
    ], 'public/css/landing')

    // Blog
    .styles([
        'libraries/bootstrap.min.css',
        'libraries/preloader.css',
        'blog/main.css'
    ], 'public/css/blog')

    // Portfolio
    .styles([
        'libraries/bootstrap.min.css',
        'libraries/lightgallery.css',
        'portfolio/main.css'
    ], 'public/css/portfolio')

    // Post
    .styles([
        'libraries/bootstrap.min.css',
        'post/main.css'
    ], 'public/css/post')

    // Admin
    .styles([
        'libraries/bootstrap.min.css',
        'libraries/font-awesome.css',
        'libraries/lightgallery.css',
        'libraries/summernote.css',
        'admin/codemirror.css',
        'admin/ambiance.css',
        'admin/custom.css',
        'admin/toastr.min.css',
        'admin/animate.css',
        'admin/style.css'
    ], 'public/admin/css')

    // Landing
    .scripts([
        'libraries/slick.min.js',
        'libraries/swiper.min.js',
        'landing/jquery.easing.min.js',
        'landing/scrolling-nav.js',
        'landing/backgroundVideo.min.js',
        'landing/main.js'
    ], 'public/js/landing/all.js')

    //Portfolio-item
    .scripts([
        'libraries/lightgallery.js',
        'libraries/lg-thumbnail.js',
        'libraries/lg-fullscreen.js',
        'portfolio-item/main.js'
    ], 'public/js/portfolio-item/all.js')
});