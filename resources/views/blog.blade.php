<!DOCTYPE html>
<head lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Svyatoslav Svitlychnyi</title>
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" >
    
    {!! Html::style('css/bootstrap.min.css') !!}
    {!! Html::style('css/blog/main.css') !!}
    {!! Html::style('css/landing/preloader.css') !!}
	<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
@inject ('tags', 'App\Models\Tag')
@inject ('categories', 'App\Models\Category')
@include('partials.landing.success')
@include('partials.landing.preloader')
@include('partials.landing.popup')
@include('partials.navbar')
@include('partials.blog.blog')
@include('partials.write-to-me')
@include('partials.footer')

{!! HTML::script('js/jquery.min.js') !!}
{!! HTML::script('js/bootstrap.min.js') !!}
{!! HTML::script('js/landing/js/main.js') !!}
</body>
</html>