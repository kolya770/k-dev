
<!DOCTYPE html>
<html>

<head>
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" >
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Kiev-dev admin</title>
    {!! Html::style('admin/css/bootstrap.min.css') !!}
    {!! Html::style('admin/font-awesome/css/font-awesome.css') !!}
      
    {!! Html::style('admin/css/animate.css') !!}
    {!! Html::style('admin/css/style.min.css') !!}
@yield ('css')

</head>
    <body>

    <div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" width="50px" class="img-circle" src="/img/user.png" />
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{Auth::user()->name}}</strong>
                             </span> <span class="text-muted text-xs block">
                             {{Auth::user()->email}}<b class="caret"></b></span> </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            
                            <li><a href="/logout">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        KD
                    </div>
                </li>
                <li>
                    <a href="/adm/"><i class="fa fa-th-large"></i><span class="nav-label">Dashboard</span> </a>
                </li>
                <li>
                    <a href="#"> <i class="fa fa-users"></i><span class="nav-label">Admin</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li>
                            <a href="/adm/messages/">Messages</a>
                        </li>
                        <li>
                            <a href="/adm/users/">Users</a> 
                        </li>
                       
                    </ul>
                </li>
                <li>
                    <a href="#"> <i class="fa fa-desktop"></i><span class="nav-label">Landing</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li>
                            <a href="/adm/first">First screen</a>
                        </li>
                        <li>
                            <a href="/adm/reviews">Reviews</a>
                        </li>
                        <li>
                            <a href="/adm/reviews/create">Create Review</a>
                        </li>
                        <li>
                            <a href="/adm/settings">Settings</a>
                        </li>
                        <li>
                            <a href="/adm/config">Site configuration</a>
                        </li>
                       
                    </ul>
                </li>
                <li>
                    <a href="#"> <i class="fa fa-pencil"></i><span class="nav-label">Blog</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse" aria-expanded="false">
                        <li>
                            <a href="/adm/posts/"> Posts</a>
                        </li>
                        <li>
                           <a href="/adm/categories/">Categories </a>
                        </li>
                        
                        <li>
                            <a href="/adm/tags">Tags</a>
                        </li>
                        <li>
                            <a href="/adm/posts/create"> Create Post</a>
                        </li>
                        <li>
                            <a href="/adm/categories/create">Create Category </a>
                        </li>
                        
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-flask"></i> <span class="nav-label">Portfolio</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li>
                            <a href="/adm/projects">Projects </a>
                        </li>
                        <li>
                            <a href="/adm/projects/create">Add project </a>
                        </li>
                       
                    </ul>
                </li>
                <li>
                    <a href="#"> <i class="fa fa-question"></i><span class="nav-label">Brief</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li>
                           <a href="/adm/forms/"> Forms </a>
                        </li>
                         <li>
                            <a href="/adm/forms/answers">Form Answers </a>
                        </li>
                        <li>
                            <a href="/adm/forms/create">Create Form</a>
                        </li>
                       
                    </ul>
                </li>
            </ul>

        </div>
    </nav>

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" method="post" action="search_results.html">
                <div class="form-group">
                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                </div>
            </form>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Welcome to administration theme.</span>
                </li>

                <li>
                    <a href="/logout">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>

        </nav>
        </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>
                        @yield ('title')
                    </h2>
                    
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                @yield ('content')

            </div>
        </div>
        <div class="footer">
            <div>
                <strong>Copyright</strong> Kievdev &copy; 2016
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
