<!DOCTYPE html>
<head lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Svyatoslav Svitlychnyi</title>
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" >
    
    {!! Html::style('css/bootstrap.min.css') !!}
    {!! Html::style('css/portfolio/main.css') !!}
	<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
@inject ('projects', 'App\Models\Project')
@include('partials.navbar')
@include('partials.portfolio.portfolio')

{!! HTML::script('js/jquery.min.js') !!}
{!! HTML::script('js/bootstrap.min.js') !!}

</body>
</html>