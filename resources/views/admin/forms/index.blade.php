@extends('layouts.admin')
@section ('css')
  <!-- Toastr style -->
   {!! Html::style('admin/css/plugins/toastr/toastr.min.css') !!}
@endsection
@section ('title')
All forms
@endsection
@section('content')
<div class="ibox float-e-margins">
   <div class="ibox-title"> 
      <h5>Forms</h5>
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
<table class = "table table-hover">
   
   <thead>
      <tr>
         <th>#</th>
         <th>Form title</th>
         <th>Size</th>
         <th>Answers number</th>
         <th></th>
         <th></th>
      </tr>
   </thead>   
   <tbody>
      @foreach ($forms as $form)
      <tr>
         <td>{{ $form->id }}</td>
         <td>{{ $form->title }}</td>
         <td>{{ $form->size }}</td>
         <td>{{ count($form->answers) }}
         <td><a href="{{ action('FormController@edit', ['forms' => $form->id]) }}"><button class="btn btn-primary">Edit</button></a></td>

         <td><form method="POST" action="{{ action('FormController@destroy', ['forms' => $form->id]) }}">
					<input type="hidden" name="_method" value="delete"/>
					<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
					<input type="submit" id = 'delete' class="btn btn-danger" value="Delete"/>
				</form></td>
      </tr>
      @endforeach   
   </tbody>	
</table>
 </div>
 </div>

@if (Session::has('message')) 
<div class="alert alert-success">
   {{ Session::get('message') }}
</div>
@endif
@endsection
