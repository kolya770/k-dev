@extends('layouts.admin')
@section ('css')
  <!-- Toastr style -->
   {!! Html::style('admin/css/plugins/toastr/toastr.min.css') !!}
@endsection
@section ('title')
All forms
@endsection
@section('content')

<table class = "table table-bordered">
   <caption>All forms</caption>   
   <thead>
      <tr>
         <th>Id</th>
         <th>Form title</th>
         <th>Size</th>
         <th></th>
         <th></th>
      </tr>
   </thead>   
   <tbody>
      @foreach ($forms as $form)
      <tr>
         <td>{{$form->id}}</td>
         <td>{{$form->title}}</td>
         <td>{{$form->size}}</td>
         <td><a type="button" class="btn mini blue-stripe" href="{{action('FormController@edit', ['forms' => $form->id])}}">Edit</a></td>

         <td><form method="POST" action="{{action('FormController@destroy', ['forms' => $form->id])}}">
					<input type="hidden" name="_method" value="delete"/>
					<input type="hidden" name="_token" value="{{csrf_token()}}"/>
					<input type="submit" id = 'delete' class="btn btn-danger" value="Delete"/>
				</form></td>
      </tr>
      @endforeach   
   </tbody>	
</table>
 

@if (Session::has('message')) 
<div class="alert alert-success">
   {{Session::get('message')}}
</div>
@endif
@endsection
