<!DOCTYPE html>
<head lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="{{ $site->keywords }}">
    <meta name="description" content="{{ $site->description }}">
    <meta name="copyright" content="{{ $site->copyright }}">
    <meta name="url" content="{{ $site->url }}">
    <title>{{ $site->name }}</title>
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" >
    
    {!! Html::style('css/bootstrap.min.css') !!}

    @yield ('css')
</head>
<body>
    @yield('content')

{!! HTML::script('js/jquery.min.js') !!}
{!! HTML::script('js/bootstrap.min.js') !!}

@yield ('js')

</body>
</html>