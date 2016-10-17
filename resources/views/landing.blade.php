@extends('layouts.app')

@section('css')
    {!! Html::style('css/landing/all.css') !!}
	<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
@endsection

@section('content')
    @inject('reviews', 'App\Models\Review')
    @include('partials.landing.success')
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
    @include('partials.landing.blog')
    @include('partials.write-to-me')
    @include('partials.footer')
@endsection

@section ('js')
{!! HTML::script('js/landing/all.js') !!}
@endsection