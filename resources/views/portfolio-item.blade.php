@extends ('layouts.app')
@section ('css')
    {!! Html::style('css/portfolio/main.css') !!}
    {!! Html::style('css/lightgallery.css') !!}
@endsection
@section ('content')
@include('partials.navbar')
@include('partials.portfolio.portfolio-item')
@endsection
@section('js')
{!! HTML::script('js/jquery.min.js') !!}
{!! HTML::script('js/bootstrap.min.js') !!}
{!! HTML::script('js/lightgallery.js') !!}
{!! HTML::script('js/lg-thumbnail.js') !!}
{!! HTML::script('js/lg-fullscreen.js') !!}
<script>
    $(document).ready(function() {
        $("#lightgallery").lightGallery({
        	mode: 'lg-fade'
        }); 
    });
</script>
{!! HTML::script('js/landing/js/main.js') !!}

@endsection