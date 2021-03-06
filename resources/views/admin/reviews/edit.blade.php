@extends('layouts.admin')
@section ('content')
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Edit review</h5>
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
                        'action' => array('ReviewController@update', $review->id),
                        'class' => 'form-horizontal',
                        'enctype' => 'multipart/form-data'

                    )) !!}
                    <div class="form-group">
                        {!! Form::label('author_name', 'Author name', ['class' => 'col-lg-3 control-label']) !!}
                        <div class="col-lg-9">
                            {!! Form::text('author_name', $review->author_name, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('author_job', 'Author job', ['class' => 'col-lg-3 control-label']) !!}
                        <div class="col-lg-9">
                            {!! Form::text('author_job', $review->author_job, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('review', 'Review', ['class' => 'col-lg-3 control-label']) !!}
                        <div class="col-lg-9">
                            {!! Form::textarea('review', $review->review, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-3 col-lg-9">
                            <label class="btn btn-default btn-file">
                                Browse image <input type="file" name="preview" value="{{$review->preview}}" style="display: none;">
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-3 col-lg-9">
                            {!! Form::submit('Update review', ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                    <div class="row">
                        <div class="col-lg-offset-3 col-lg-9">
                            <h3>Review image now: </h3>
                                <img src="{{$review->preview}}" height="150">
                        </div>
                    </div>
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