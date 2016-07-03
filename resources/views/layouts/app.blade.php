<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Blog</title>
    {!! Html::style('admin/css/bootstrap.css') !!}
    {!! Html::style('admin/font-awesome/css/font-awesome.css') !!}
            <!-- Morris -->
    {!! Html::style('admin/css/animate.css') !!}
    {!! Html::style('admin/css/style.css') !!}


</head>

<body>
    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2><a class='btn-link' href='/index.php'>Blog</a></h2>
                    
                </div>
                
            </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content">
                @yield ('content')
                   <!-- <div class="middle-box text-center animated fadeInRightBig">
                        
                    @yield ('content')
                       
                    </div> -->
                </div>
            </div>
        </div>
        </div>
    </div>

    <!-- Mainly scripts -->
{!! HTML::script('admin/js/jquery-2.1.1.js') !!}
{!! HTML::script('admin/js/bootstrap.min.js') !!}

@yield('js')


</body>

</html>
