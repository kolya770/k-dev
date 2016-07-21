@extends ('layouts.app')
@section ('css')
    {!! Html::style('css/slick.css') !!}
    {!! Html::style('css/slick-theme.css') !!}

    {!! Html::style('css/portfolio/main.css') !!}
@endsection
@section ('content')
@include('partials.navbar')
@include('partials.portfolio.portfolio-item')
@endsection
@section('js')
{!! HTML::script('js/jquery.min.js') !!}
{!! HTML::script('js/bootstrap.min.js') !!}
{!! HTML::script('js/slick.min.js') !!}
<script>
    $(document).ready(function(){
          $('.images').slick({
            infinite: true,
            slidesToShow: 2,
            slidesToScroll: 2,
            dots:true,
            responsive: [

            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 767,
                settings: {
                  arrows: false,
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }

        ]
            });
        });
</script>
{!! HTML::script('js/landing/js/main.js') !!}
@endsection