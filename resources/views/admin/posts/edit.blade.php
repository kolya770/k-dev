@extends('layouts.admin')
@section ('title')
    Edit a post
@endsection
@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Edit post</h5>
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
                            'action' => array('PostController@update', $post->id),
                            'class' => 'form-horizontal',
                            'enctype' => 'multipart/form-data'

                        )) !!}
                        <div class="form-group">
                            {!! Form::label('title', 'Post name', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                {!! Form::text('title', $post->title, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('content', 'Post content', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                {!! Form::textarea('content', $post->content, ['class' => 'form-control', 'id' => 'summernote']) !!}
                            </div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">Category</label>
                            <div class="col-sm-10">
                                <select class="form-control m-b" name="category">
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <label class="btn btn-default btn-file">
                                    Browse main image <input type="file" name="main_image" style="display: none;" >
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                {!! Form::submit('Update post', ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                        <div class="row">
                            <div class="col-lg-offset-2 col-lg-10">
                                <h3>Main image now:</h3>
                                <img src="{{'/'.$post->preview}}" height="150">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
@endsection
@section('js')
    {!! Html::script('admin/js/plugins/iCheck/icheck.min.js') !!}
    {!! Html::script('admin/js/plugins/slick/slick.min.js') !!}
    {!! Html::script('js/summernote.min.js') !!}
    {!! Html::script('admin/js/admin.js') !!}
    <script type="text/javascript">
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 300,                 // set editor height
                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor
                focus: true                  // set focus to editable area after initializing summernote
            });
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green'
            });
        });
    </script>
@endsection