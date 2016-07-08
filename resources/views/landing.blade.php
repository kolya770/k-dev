<!DOCTYPE html>
<head lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Svyatoslav Svitlychnyi</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    {!! Html::style('css/landing/app.css') !!}
	{!! Html::style('css/landing/some-stuff.css') !!}
	{!! Html::style('css/landing/preloader.css') !!}

	<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body  data-spy="scroll" data-target=".navbar" data-offset="50">

    @include('partials.landing.preloader')
    @include('partials.landing.popup')
    @include('partials.navbar')
    @include('partials.landing.intro')
    @include('partials.landing.how-i-work')
    @include('partials.landing.my-works')
    @include('partials.landing.project-1')
    @include('partials.landing.project-2')
    @include('partials.landing.skills')
    @include('partials.landing.about-me')
    @include('partials.landing.what-people-say')
    @include('partials.write-to-me')
    @include('partials.footer')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

{!! HTML::script('js/landing/js/backgroundVideo.min.js') !!}
{!! HTML::script('js/landing/js/main.js') !!}

</body>
</html>