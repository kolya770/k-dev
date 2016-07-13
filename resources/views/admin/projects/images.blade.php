@extends('layouts.admin')

@section('content')
 {!! Form::open(array(
                            'action' => 'ProjectController@imageStore',
                            'class' => 'form-horizontal',
                            'enctype' => 'multipart/form-data',
                            'files' => true

                        )) !!}
@foreach ($images as $image)
<div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Path: {!! $image->path !!} 
                        
                        
                        </h5>
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
                       <div class="row">
                            <div class="col-sm-3">
                            <img style="margin:auto; width:100%;" src='{{$image->path}}'>
                            </div>
                            <div class="col-sm-9">
                            <div class="row">
                                {!! Form::label('desc', 'Description', ['class' => 'control-label']) !!}
                            </div>
                            <div class="row">
                                {!! Form::text('desc[]', null, ['class' => 'form-control']) !!}
                                {!! Form::text('id[]', $image->id, ['class' => 'hidden']) !!}
                            </div>
                            </div>
                       </div> 
                    </div>
                </div>
@endforeach

{!! Form::submit('Save images', ['class' => 'btn btn-sm']) !!}
{!! Form::close() !!}
@endsection