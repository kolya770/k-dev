@extends ('layouts.app')
@section ('css')
    {!! Html::style('css/post/all.css') !!}
@endsection
@section ('content')
    @inject ('categories', 'App\Models\Category')
    @inject ('tags', 'App\Models\Tag')
    @include ('partials.landing.success')
    @include('partials.landing.popup')
    @include('partials.navbar-other-pages')
    @include('partials.post.post')
    @include('partials.write-to-me')
@include('partials.footer')
@endsection


