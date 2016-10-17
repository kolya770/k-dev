@extends ('layouts.app')
@section ('css')
    {!! Html::style('css/portfolio/all.css') !!}
@endsection
@section ('content')
    @include('partials.navbar-other-pages')
    @include('partials.portfolio.portfolio-item')
@endsection
@section('js')
    {!! Html::script('js/portfolio-item/all.js') !!}
@endsection