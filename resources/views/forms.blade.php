@extends('layouts.app')

@section('content')
@foreach ($forms as $form)


<div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Basic form <small>Answer our form!</small></h5>
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
                            <div class="col-sm-6 b-r">
                                <h3 class="m-t-none m-b"> {!! $form->title !!}</h3>
                               
                                {!! Form::open(array(
                                    'action' => 'FormAnswerController@store',
                                    'class' => 'form-basic',
                                    'enctype' => 'multipart/form-data'

                                    )) !!}
                                    @foreach ($form->fields as $field)
                                    <div class="form-group">
                                        <label>{!! $field->question !!}</label>
                                        {!! Form::text('field' . $field->id, null, ['class' => 'form-control']) !!}

                                    </div>
                                    @endforeach
                                    {!! Form::text('size', $form->size, ['class' => 'hidden']) !!}
                                     {!! Form::text('title', $form->title, ['class' => 'hidden']) !!}
                                     {!! Form::text('form_id', $form->id, ['class' => 'hidden']) !!}
                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-9">
                                            {!! Form::submit('Submit', ['class' => 'btn btn-sm']) !!}
                                        </div>
                                    </div>
                                {!! Form::close() !!}
                            </div> 
                        </div>
                    </div>
                </div>

@endforeach

@endsection