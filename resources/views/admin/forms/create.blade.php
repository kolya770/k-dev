 
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
                            {!! Form::label('title', 'Form name', ['class' => 'col-lg-3 control-label']) !!}
                            <div class="col-lg-9">
                                {!! Form::text('title', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                        	<div class="col-lg-9">
                           		<button id='addField' type="button" class="btn btn-w-m btn-primary">Add a new question</button>
                           	</div>
                        </div>
                        <div class="form-group">
                           <div class="col-lg-9" id="questions">
                           </div>
                        </div>
                        <input type="hidden" id="size" name="size">
                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-9">
                                {!! Form::submit('Create form', ['class' => 'btn btn-md']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
                @if (Session::has('message')) 
                        <div class="alert alert-success">
                           {{Session::get('message')}}
                        </div>
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
@endsection


 

@section ('js')
<script type="text/javascript">
	var i = 0;
	var form = document.getElementById('questions');
	document.getElementById('addField').addEventListener('click', function(e) {		
		form.appendChild(document.createElement('div')).innerHTML = "<input type=\"text\" placeholder=\"Enter question\" class=\"form-control\" id=\"field" + (++i) +"\" name=\"field" + (i) + "\"> </br>";
		document.getElementById('size').value = i;
	});
</script>
@endsection