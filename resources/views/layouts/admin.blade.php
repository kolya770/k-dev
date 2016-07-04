
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Blog</title>
    {!! Html::style('admin/css/bootstrap.css') !!}
    {!! Html::style('admin/font-awesome/css/font-awesome.css') !!}
      
    {!! Html::style('admin/css/animate.css') !!}
    {!! Html::style('admin/css/style.css') !!}
@yield ('css')

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
                <li>
                    <a href="/admin/forms/create"><span class="nav-label">Create Form</span> </a>
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


@yield('js')


</body>

</html>
