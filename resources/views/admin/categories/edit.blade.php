@extends('layouts.admin')
@section ('title')
    Edit category
@endsection
@section('content')
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Edit a category</h5>
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
                            'action' => array('CategoriesController@update', $category->id),
                            'class' => 'form-horizontal',
                            'enctype' => 'multipart/form-data'

                        )) !!}
                        <div class="form-group">
                            {!! Form::label('title', 'Category name', ['class' => 'col-lg-3 control-label']) !!}
                            <div class="col-lg-9">
                                {!! Form::text('title', $category->title, ['class' => 'form-control', 'required' => '']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-9">
                                {!! Form::submit('Update category', ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
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
@endsection
@section('js')
    {!! Html::script('admin/js/plugins/toastr/toastr.min.js') !!}
    <script type="text/javascript">
        $(function () {
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
        });
    </script>
 @endsection