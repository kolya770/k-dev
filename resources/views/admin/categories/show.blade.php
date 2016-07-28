@extends('layouts.admin')
@section ('title')
Category
@endsection
@section('content')

<table class = "table table-bordered">
   <caption>Category</caption>   
   <thead>
      <tr>
         <th>id</th>
         <th>Category</th>
         <th></th>
         <th></th>
      </tr>
   </thead>   
   <tbody>
      
      <tr>
         <td>{{$category->id}}</td>
         <td>{{$category->title}}</td>
         <td><a class="btn mini blue-stripe" href="{{action('CategoriesController@edit',['categories'=>$category->id])}}">Edit</a></td>

         <td><form method="POST" action="{{action('CategoriesController@destroy',['categories'=>$category->id])}}">
					<input type="hidden" name="_method" value="delete"/>
					<input type="hidden" name="_token" value="{{csrf_token()}}"/>
					<input type="submit" class="btn mini blue-stripe" value="Delete"/>
				</form></td>
      </tr>
      
   </tbody>	
</table>

@endsection