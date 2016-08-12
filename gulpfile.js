process.env.DISABLE_NOTIFIER = true;
var elixir = require('laravel-elixir');

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
mix 
.less('landing/main.less', 'public/css/landing') 
.less('blog/main.less', 'public/css/blog') 
.less('portfolio/main.less', 'public/css/portfolio') 
.less('post/main.less', 'public/css/post') 
; 
});