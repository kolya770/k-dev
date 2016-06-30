
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
    {!! Html::style('admin/css/plugins/morris/morris-0.4.3.min.css') !!}
    {!! Html::style('admin/css/plugins/summernote/summernote.css') !!}
    {!! Html::style('admin/css/plugins/summernote/summernote-bs3.css') !!}
    {!! Html::style('admin/css/plugins/dropzone/dropzone.css') !!}
    {!! Html::style('admin/css/animate.css') !!}
    {!! Html::style('admin/css/style.css') !!}
    {!! Html::style('admin/css/slick.css') !!}
    {!! Html::style('admin/css/slick-theme.css') !!}
    {!! Html::style('admin/css/app.css') !!}

  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script> 
  <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 
  <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css" rel="stylesheet">
  <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.js"></script>

</head>

<body>
    <div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="/admin/users/"> <span class="nav-label">Users</span> </a>
                    
                </li>
                <li>
                    <a href="/admin/posts/"> <span class="nav-label">Posts</span> </a>
                </li>
                <li>
                   <a href="/admin/categories/"> <span class="nav-label">Categories</span> </a>
                </li>
                <li>
                    <a href="/admin/posts/create"> <span class="nav-label">Create Post</span> </a>
                </li>
                <li>
                    <a href="/admin/categories/create"><span class="nav-label">Create Category</span> </a>
                </li>
            </ul>
        </div>
    </nav>
        <div id="page-wrapper" class="gray-bg">
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>Admin zone</h2>
                    
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
{!! HTML::script('admin/js/plugins/metisMenu/jquery.metisMenu.js') !!}
{!! HTML::script('admin/js/plugins/slimscroll/jquery.slimscroll.min.js') !!}

        <!-- Custom and plugin javascript -->
{!! HTML::script('admin/js/inspinia.js') !!}
{!! HTML::script('admin/js/plugins/pace/pace.min.js') !!}

        <!-- SUMMERNOTE -->
{!! HTML::script('admin/js/plugins/summernote/summernote.min.js') !!}
{!! HTML::script('admin/js/admin.js') !!}
{!! HTML::script('admin/js/plugins/slick/slick.min.js') !!}

        <!-- DROPZONE -->
{!! HTML::script('admin/js/plugins/dropzone/dropzone.js') !!}



@yield('js')


</body>

</html>
