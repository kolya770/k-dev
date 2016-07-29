@extends('layouts.admin')
@section ('css')
     <!-- Toastr style -->
{!! Html::style('admin/css/plugins/toastr/toastr.min.css') !!}
@endsection
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
        </div>
    </div>
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