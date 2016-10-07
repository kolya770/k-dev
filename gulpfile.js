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
    .styles([
        'libraries/bootstrap.min.css',
        'libraries/slick.css',
        'libraries/slick-theme.css',
        'libraries/some-stuff.css',
        'libraries/preloader.css',
        'landing/main.css'
    ], 'public/css/landing')
    .styles([
        'libraries/bootstrap.min.css',
        'libraries/preloader.css',
        'blog/main.css'
    ], 'public/css/blog')
    .styles([
        'libraries/bootstrap.min.css',
        'libraries/lightgallery.css',
        'portfolio/main.css'
    ], 'public/css/portfolio')
    .styles([
        'libraries/bootstrap.min.css',
        'post/main.css'
    ], 'public/css/post')
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
    ], 'public/admin/css');
});