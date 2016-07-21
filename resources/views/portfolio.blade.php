@extends ('layouts.app')
@section ('css')
    {!! Html::style('css/portfolio/main.css') !!}
@endsection
@section('content')
@inject ('projects', 'App\Models\Project')
@include('partials.navbar')
@include('partials.portfolio.portfolio')
@endsection
@section ('js')
{!! HTML::script('js/jquery.min.js') !!}
{!! HTML::script('js/bootstrap.min.js') !!}
@endsection