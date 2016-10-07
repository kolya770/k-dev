@extends ('layouts.app')
@section('css')
{!! Html::style('css/blog/all.css') !!}
@endsection
@section ('content')
@inject ('tags', 'App\Models\Tag')
@inject ('categories', 'App\Models\Category')
@include('partials.landing.success')
@include('partials.landing.preloader')
@include('partials.landing.popup')
@include('partials.navbar-other-pages')
@include('partials.blog.blog')
@include('partials.write-to-me')
@include('partials.footer')
@endsection
@section ('js')
{!! HTML::script('js/jquery.min.js') !!}
{!! HTML::script('js/bootstrap.min.js') !!}
{!! HTML::script('js/landing/js/main.js') !!}
@endsection