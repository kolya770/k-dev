@extends('layouts.admin')
@section ('title')
Portfolio
@endsection
@section ('content')
<div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">                      
                        <h5>Add a new project</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                           
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        {!! Form::open(array(
                            'action' => 'ProjectController@store',
                            'class' => 'form-horizontal',
                            'enctype' => 'multipart/form-data',
                            'files' => true

                        )) !!}
                        <div class="form-group">
                            {!! Form::label('title', 'Title', ['class' => 'col-lg-3 control-label']) !!}
                            <div class="col-lg-9">
                                {!! Form::text('title', null, ['class' => 'form-control', 'required' => '']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('brief', 'Brief', ['class' => 'col-lg-3 control-label']) !!}
                            <div class="col-lg-9">
                                <input class='form-control' required="" name='brief' max="130">
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Description', ['class' => 'col-lg-3 control-label']) !!}
                            <div class="col-lg-9">
                                {!! Form::textarea('description', null, ['class' => 'form-control', 'required' => '']) !!}
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
                                {!! Form::submit('Add project', ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>
                        
                        {!! Form::close() !!}
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