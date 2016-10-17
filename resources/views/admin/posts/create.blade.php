@extends('layouts.admin')
@section ('css')
<style type="text/css">
    .btn-default {
        color: #333 !important;
        background-color: #fff !important;
        border-color: #ccc !important;
    }
</style>
@endsection
@section ('title')
    Create a post
@endsection
@section('content')
    @inject ('categories', 'App\Models\Category')
    @inject ('tags', 'App\Models\Tag')
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Make a new post</h5>
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
                            'action' => 'PostController@store',
                            'class' => 'form-horizontal',
                            'enctype' => 'multipart/form-data'

                        )) !!}
                        <div class="form-group">
                            {!! Form::label('title', 'Post name', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                {!! Form::text('title', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('content', 'Post content', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                {!! Form::textarea('content', null, ['class' => 'form-control', 'id' => 'summernote']) !!}
                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label">Category</label>
                            <div class="col-lg-10">
                                <select class="form-control m-b" name="category">
                                    @foreach ($categories->all() as $category)
                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Tags</label>
                            <div class="col-lg-10">
                                @foreach ($tags->all() as $tag)
                                    <label class="checkbox-inline i-checks">
                                    <input type="checkbox" name="tags[]" value="{{ $tag->id }}">{{ $tag->tag_name }} </label>
                                @endforeach
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
                                {!! Form::submit('Create post', ['class' => 'btn btn-w-m btn-primary btn-lg']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
                @if (count($errors) > 0)
                    @foreach ($errors->all() as $error)
                        <input class="hidden alert" value="{{ $error }}">
                    @endforeach
                @endif
                @if (Session::has('message'))
                    <input class="hidden" value="{{ Session::get('message') }}" id="message">
                @endif
                @if (Session::has('alert'))
                    <input class="hidden" value="{{ Session::get('alert') }}" id="alert">
                @endif
            </div>
        </div>
    </div>
@endsection
@section('js')
    {!! Html::script('admin/js/plugins/toastr/toastr.min.js') !!}
    {!! Html::script('js/summernote.min.js') !!}
    {!! Html::script('admin/js/plugins/iCheck/icheck.min.js') !!}
    {!! Html::script('admin/js/plugins/slick/slick.min.js') !!}
    {!! Html::script('admin/js/admin.js') !!}
    <script type="text/javascript">
        $(document).ready(function () {
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
            if (document.getElementById('message')) {
                toastr["success"](document.getElementById('message').value, 'Message')
            }
            if (document.getElementById('alert')) {
                toastr["error"](document.getElementById('alert').value, 'Error')
            }
            if (document.getElementsByClassName('alert')) {
                var x = document.getElementsByClassName('alert');
                var i;
                for (i = 0; i < x.length; i++) {
                    toastr["error"](x[i].value, 'Error');
                }
            }

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
