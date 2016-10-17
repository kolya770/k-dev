@extends('layouts.admin')
@section ('title')
    Settings
@endsection
@section('content')
    @inject ('posts', 'App\Models\Post')
    @inject ('projects', 'App\Models\Project')
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Settings</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        {!! Form::open(array(
                            'action' => 'SettingsController@store',
                            'class' => 'form-horizontal',
                            'enctype' => 'multipart/form-data'

                        )) !!}
                        <div class="form-group">
                            {!! Form::label('posts_per_page', 'Posts per page:', ['class' => 'col-lg-3 control-label']) !!}
                            <div class="col-lg-9">
                                <input name="posts_per_page" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('blog', 'Blog for main page:', ['class' => 'col-lg-3 control-label']) !!}
                            <div class="col-lg-9">
                                <select name="blog_id">
                                     @foreach ($posts->all() as $post)
                                        <option value="{{$post->id}}">{{$post->title}}</option>
                                     @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('projects', 'Projects for main page: (3)', ['class' => 'col-lg-3 control-label']) !!}
                            <div class="col-lg-9">
                                @foreach ($projects->all() as $project)
                                    <label class="checkbox-inline i-checks">
                                    <input type="checkbox" name="projects[]" value="{{$project->id}}">{{$project->title}} </label>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-9">
                                {!! Form::submit('Save settings', ['class' => 'btn btn-sm']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                        @if (Session::has('message'))
                           <input class="hidden" value="{{ Session::get('message') }}" id="message">
                           @endif
                        @if (Session::has('alert'))
                           <input class="hidden" value="{{ Session::get('alert') }}" id="alert">
                           @endif

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                         <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section ('js')
{!! Html::script('admin/js/plugins/iCheck/icheck.min.js') !!}
{!! Html::script('admin/js/plugins/toastr/toastr.min.js') !!}

<script>
    $(document).ready(function () {
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green'
        });
        if (document.getElementById('message')) {
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "onclick": null,
                "showDuration": "10000",
                "hideDuration": "1000",
                "timeOut": "7000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            toastr["success"]('Message', document.getElementById('message').value)
        }
        if (document.getElementById('alert')) {
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "onclick": null,
                "showDuration": "10000",
                "hideDuration": "10000",
                "timeOut": "70000",
                "extendedTimeOut": "10000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            toastr["error"]('Error', document.getElementById('alert').value)
        }
    });
</script>
@endsection