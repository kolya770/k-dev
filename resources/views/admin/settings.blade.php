@extends('layouts.admin')
@section ('css')
{!! Html::style('admin/css/plugins/iCheck/custom.css') !!}
@endsection
@section('content')

<div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                         <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                       
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
                            'action' => 'BlogController@store',
                            'class' => 'form-horizontal',
                            'enctype' => 'multipart/form-data'

                        )) !!}
                        <div class="form-group">
                            {!! Form::label('posts_per_page', 'Posts per page:', ['class' => 'col-lg-3 control-label']) !!}
                            <div class="col-lg-9">
                                <input name="posts_per_page" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('projects', 'Project for main page:', ['class' => 'col-lg-3 control-label']) !!}
                            <div class="col-lg-9">
                           
                        @foreach ($projects as $project)
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
                            <div class="alert alert-success">
                               {{Session::get('message')}}
                            </div>
                        @endif
                       
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection

@section ('js')
{!! HTML::script('admin/js/plugins/iCheck/icheck.min.js') !!}
@endsection