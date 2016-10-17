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
                    <h5>Edit project</h5>
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
                        'method' => 'PATCH',
                        'action' => array('ProjectController@update', $project->id),
                        'class' => 'form-horizontal',
                        'enctype' => 'multipart/form-data'
                    )) !!}
                    <div class="form-group">
                        {!! Form::label('title', 'Title', ['class' => 'col-lg-2 control-label']) !!}
                        <div class="col-lg-10">
                            {!! Form::text('title', $project->title, ['class' => 'form-control', 'required' => '']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('brief', 'Brief', ['class' => 'col-lg-2 control-label']) !!}
                        <div class="col-lg-10">
                            <input class='form-control' name='brief' max="130" required="" value="{{ $project->brief }}">
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('description', 'Description', ['class' => 'col-lg-2 control-label']) !!}
                        <div class="col-lg-10">
                            {!! Form::textarea('description', $project->description, ['class' => 'form-control', 'required' => '']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <label class="btn btn-default btn-file">
                                Browse images <input type="file" name="image[]" style="display: none;" multiple="multiple">
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            {!! Form::submit('Update project', ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                    <hr>
                    <div class="row">
                        <div class="col-lg-offset-2 col-lg-10">
                            <h3>Main image:</h3>
                            <img src="{{ $main_image->path }}" height="150" style="border-radius: 5px;">
                            <hr>
                            <h3>All images:</h3>
                            <div id="lightgallery" class="row">
                                @foreach ($project->images as $image)
                                    <a href="{{ $image->path }}" class="col-sm-3">
                                        <img class="" width="150px" src="{{ $image->path }}" alt="{{ $image->description }}" style="margin-right: 30px; border: 1px solid #ddd; border-radius: 4px; padding: 5px;">
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @if (Session::has('message'))
                        <div class="alert alert-success">
                            {{ Session::get('message') }}
                        </div>
                    @endif
                    @if (count($errors) > 0)
                        @foreach($errors as $error)
                            <div class="alert alert-danger">
                                {{ $error }}
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
{!! Html::script('js/lightgallery.js') !!}
{!! Html::script('js/lg-thumbnail.js') !!}
{!! Html::script('js/lg-fullscreen.js') !!}
<script>
    $(document).ready(function() {
        $("#lightgallery").lightGallery({
            mode: 'lg-fade'
        }); 
    });
</script>
@endsection