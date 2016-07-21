@extends('layouts.admin')

@section ('content')
<div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">                      
                        <h5>Edit project</h5>
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
                            'method' => 'PATCH',
                            'action' => array('ProjectController@update', $project->id),
                            'class' => 'form-horizontal',
                            'enctype' => 'multipart/form-data'

                        )) !!}
                        <div class="form-group">
                            {!! Form::label('title', 'Title', ['class' => 'col-lg-3 control-label']) !!}
                            <div class="col-lg-9">
                                {!! Form::text('title', $project->title, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('brief', 'Brief', ['class' => 'col-lg-3 control-label']) !!}
                            <div class="col-lg-9">
                                <input class='form-control' name='brief' max="130" value="{{$project->brief}}">
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Description', ['class' => 'col-lg-3 control-label']) !!}
                            <div class="col-lg-9">
                                {!! Form::textarea('description', $project->description, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-9">
		                        <label class="btn btn-default btn-file">
		    						Browse images <input type="file" name="image[]" style="display: none;" multiple="multiple">
								</label>
							</div>
						</div>
                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-9">
                                {!! Form::submit('Add project', ['class' => 'btn btn-sm']) !!}
                            </div>
                        </div>
                        
                        {!! Form::close() !!}

                        <h3>Main image:</h3>
                        <img src="{{$main_image->path}}" height="150">
                        <h3>All images:</h3>
                        @foreach ($project->images as $image) 
                        <img src="{{$image->path}}" height="150">
                        @endforeach
                        @if (Session::has('message')) 
                            <div class="alert alert-success">
                               {{Session::get('message')}}
                            </div>
                        @endif
                        @if (count($errors) > 0)
                            @foreach($errors as $error)
                                    <div class="alert alert-danger">
                                       {{$error}}
                                    </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection