@extends('layouts.admin')

@section ('title')
Create a form
@endsection
@section('content')
 <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                       

                        
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
                            'action' => 'FormController@store',
                            'class' => 'form-horizontal',
                            'enctype' => 'multipart/form-data',
                            'id' => 'myForm'

                        )) !!}
                        <div class="form-group">
                            {!! Form::label('title', 'Form name', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                {!! Form::text('title', null, ['class' => 'form-control', 'required' => '']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                        	<div class="col-lg-offset-2 col-lg-10">
                           		<button id='addField' type="button" class="btn btn-w-m btn-primary">Add a new question</button>
                           	</div>
                        </div>
                        <div class="form-group">
                           <div class="col-lg-offset-2 col-lg-10" id="questions">
                           </div>
                        </div>
                        <input type="hidden" id="size" name="size">
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                {!! Form::submit('Create form', ['class' => 'btn btn-primary']) !!}
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

@section ('js')
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
<script type="text/javascript">
	var i = 0;
	var form = document.getElementById('questions');
	document.getElementById('addField').addEventListener('click', function(e) {		
		form.appendChild(document.createElement('div')).innerHTML = "<input type=\"text\" placeholder=\"Enter question\" required class=\"form-control\" id=\"field" + (++i) +"\" name=\"field" + (i) + "\"> </br>";
		document.getElementById('size').value = i;
	});
</script>
@endsection