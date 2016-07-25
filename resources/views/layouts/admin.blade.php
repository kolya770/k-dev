
<!DOCTYPE html>
<html>

<head>
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" >
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Kiev-dev admin</title>
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
                    <a href="/adm/"><span class="nav-label">Dashboard</span> </a>
                </li>
                <li>
                    <a href="#"> <span class="nav-label">Admin</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li>
                            <a href="/adm/messages/"> <span class="nav-label">Messages</span> </a>
                        </li>
                        <li>
                            <a href="/adm/users/"> <span class="nav-label">Users</span> </a> 
                        </li>
                       
                    </ul>
                </li>
                <li>
                    <a href="#"> <span class="nav-label">Landing</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li>
                            <a href="/adm/reviews"><span class="nav-label">Reviews</span> </a>
                        </li>
                        <li>
                            <a href="/adm/reviews/create"><span class="nav-label">Create Review</span> </a>
                        </li>
                        <li>
                            <a href="/adm/settings"><span class="nav-label">Settings</span> </a>
                        </li>
                       
                    </ul>
                </li>
                <li>
                    <a href="#"> <span class="nav-label">Blog</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="/adm/posts/"> <span class="nav-label">Posts</span> </a>
                        </li>
                        <li>
                           <a href="/adm/categories/"> <span class="nav-label">Categories</span> </a>
                        </li>
                        
                        <li>
                            <a href="/adm/tags"><span class="nav-label">Tags</span> </a>
                        </li>
                        <li>
                            <a href="/adm/posts/create"> <span class="nav-label">Create Post</span> </a>
                        </li>
                        <li>
                            <a href="/adm/categories/create"><span class="nav-label">Create Category</span> </a>
                        </li>
                        
                    </ul>
                </li>
                <li>
                    <a href="#"> <span class="nav-label">Portfolio</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li>
                            <a href="/adm/projects"><span class="nav-label">Projects</span> </a>
                        </li>
                        <li>
                            <a href="/adm/projects/create"><span class="nav-label">Add project</span> </a>
                        </li>
                       
                    </ul>
                </li>
                <li>
                    <a href="#"> <span class="nav-label">Brief</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li>
                           <a href="/adm/forms/"> <span class="nav-label">Forms</span> </a>
                        </li>
                         <li>
                            <a href="/adm/forms/answers"><span class="nav-label">Form Answers</span> </a>
                        </li>
                        <li>
                            <a href="/adm/forms/create"><span class="nav-label">Create Form</span> </a>
                        </li>
                       
                    </ul>
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

@yield('js')


</body>

</html>
