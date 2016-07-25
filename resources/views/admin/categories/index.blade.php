@extends('layouts.admin')

@section('content')
@inject ('categories', 'App\Models\Category')
<table class = "table table-bordered">
   <caption>All categories</caption>   
   <thead>
      <tr>
         <th>id</th>
         <th>Category</th>
         <th></th>
         <th></th>
      </tr>
   </thead>   
   <tbody>
      @foreach ($categories->all() as $category)
      <tr>
         <td>{{$category->id}}</td>
         <td>{{$category->title}}</td>
         <td><a class="btn mini blue-stripe" href="{{action('CategoriesController@edit',['categories'=>$category->id])}}">Edit</a></td>

         <td><form method="POST" action="{{action('CategoriesController@destroy',['categories'=>$category->id])}}">
					<input type="hidden" name="_method" value="delete"/>
					<input type="hidden" name="_token" value="{{csrf_token()}}"/>
					<input type="submit" class="btn btn-danger" value="Delete"/>
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