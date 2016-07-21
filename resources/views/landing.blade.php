<!DOCTYPE html>
<head lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Svyatoslav Svitlychnyi</title>
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" >
    
    {!! Html::style('css/slick.css') !!}
    {!! Html::style('css/slick-theme.css') !!}
    {!! Html::style('css/bootstrap.min.css') !!}
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
</head>


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

{!! HTML::script('js/jquery.min.js') !!}
{!! HTML::script('js/bootstrap.min.js') !!}
{!! HTML::script('js/slick.min.js') !!}
<script type="text/javascript">
    $(document).ready(function(){
        $("#myTab a").click(function(e){
            e.preventDefault();
            $(this).tab('show');
        });
    });
</script>


{!! HTML::script('js/landing/js/backgroundVideo.min.js') !!}
{!! HTML::script('js/landing/js/main.js') !!}

</body>
</html>