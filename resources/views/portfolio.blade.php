@extends ('layouts.app')
@section ('css')
    {!! Html::style('css/portfolio/all.css') !!}
@endsection
@section('content')
    @inject ('projects', 'App\Models\Project')
    @include('partials.navbar-other-pages')
    @include('partials.portfolio.portfolio')
@endsection