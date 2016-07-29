@extends('layouts.admin')
@section ('title')
Portfolio
@endsection
@section ('css')
     <!-- Toastr style -->
{!! Html::style('admin/css/plugins/toastr/toastr.min.css') !!}
@endsection
@section('content')
{!! Form::open(array(
    'action' => 'ProjectController@imageStore',
    'class' => 'form-horizontal',
    'enctype' => 'multipart/form-data',
    'files' => true
)) !!}
{!! Form::text('project_id', $project_id, ['class' => 'hidden']) !!}
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
                            <div class="row">
                                <div class="radio">
                                    <label> 
                                        <input type="radio" name="mainImage" value="{{$image->id}}">Select as main image
                                    </label>
                                </div>
                                
                            </div>
                            </div>

                       </div> 

                    </div>
                </div>
@endforeach

{!! Form::submit('Save images', ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}
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

 <!-- Toastr script -->
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
    }
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