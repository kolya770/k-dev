@extends('layouts.admin')

@section ('title')
Create review
@endsection
@section ('content')
<div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">                      
                        <h5>Make a new review</h5>
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
                            'action' => 'ReviewController@store',
                            'class' => 'form-horizontal',
                            'enctype' => 'multipart/form-data'

                        )) !!}
                        <div class="form-group">
                            {!! Form::label('author_name', 'Author name', ['class' => 'col-lg-3 control-label']) !!}
                            <div class="col-lg-9">
                                {!! Form::text('author_name', old('author_name'), ['class' => 'form-control', 'required' => '']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('author_job', 'Author job', ['class' => 'col-lg-3 control-label']) !!}
                            <div class="col-lg-9">
                                {!! Form::text('author_job', old('author_job'), ['class' => 'form-control', 'required' => '']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('review', 'Review', ['class' => 'col-lg-3 control-label']) !!}
                            <div class="col-lg-9">
                                {!! Form::textarea('review', old('review'), ['class' => 'form-control', 'required' => '']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-9">
		                        <label class="btn btn-default btn-file">
		    						Browse image <input type="file" name="preview" style="display: none;">
								</label>
							</div>
						</div>
                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-9">
                                {!! Form::submit('Create review', ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>
                        
                        {!! Form::close() !!}
                        @if (Session::has('message')) 
                        <input class="hidden" value="{{ Session::get('message') }}" id="message">
                        @endif
                        @if (Session::has('alert')) 
                        <input class="hidden" value="{{ Session::get('alert') }}" id="alert">
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

@section ('js')
 <!-- Toastr script -->
{!! Html::script('admin/js/plugins/toastr/toastr.min.js') !!}
<script type="text/javascript">
 $(function () {
    if (document.getElementById('message')) {
        toastr.options = {
          "closeButton": true,
          "debug": false,
          "progressBar": true,
          "positionClass": "toast-top-right",
          "onclick": null,
          "showDuration": "400",
          "hideDuration": "1000",
          "timeOut": "7000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        }
        toastr["success"]('Message', document.getElementById('message').value)
    }
    if (document.getElementById('alert')) {
        toastr.options = {
          "closeButton": true,
          "debug": false,
          "progressBar": true,
          "positionClass": "toast-top-right",
          "onclick": null,
          "showDuration": "1000",
          "hideDuration": "1000",
          "timeOut": "7000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        }
        toastr["error"]('Error', document.getElementById('alert').value)
    }
});
</script>
@endsection