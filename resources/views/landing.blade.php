@extends('layouts.app')
@section ('css')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
    {!! Html::style('css/slick.css') !!}
    {!! Html::style('css/slick-theme.css') !!}
    {!! Html::style('css/landing/main.css') !!}
    
	{!! Html::style('css/landing/some-stuff.css') !!}
	{!! Html::style('css/landing/preloader.css') !!}

    <style type="text/css">
        .nav-tabs>li::after {
            content:" ";
            background: url(img/str.png) no-repeat;
            width: 53px;
            height: 46px;
            @media screen and (max-width: 780px) {
                display: none;
            }   
            display: inline-block;
            position: absolute;
            top: 60px;
            right: -50px;   
        }
        .nav-tabs>li:last-child:after {
           display: none;
        }
    </style>
	<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
@endsection

@section ('content')
    @inject ('reviews', 'App\Models\Review')
    @include ('partials.landing.success') 
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
{!! HTML::script('js/slick.min.js') !!}
<script type="text/javascript">
    $(document).ready(function(){
        $("#myTab a").click(function(e){
            e.preventDefault();
            $(this).tab('show');
        });
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
  <script>   
    $(document).ready(function () {
        //initialize swiper when document ready  
        var mySwiper = new Swiper ('.swiper-container', {
          
          loop: true,
          // If we need pagination
        pagination: '.swiper-pagination',
        
        // Navigation arrows
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev' 
        })
    });        
  </script>
{!! HTML::script('js/landing/js/backgroundVideo.min.js') !!}
{!! HTML::script('js/landing/js/main.js') !!}
@endsection
