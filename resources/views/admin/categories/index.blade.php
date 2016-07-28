@extends('layouts.admin')
@section ('title')
All categories
@endsection
@section('content')
@inject ('categories', 'App\Models\Category')
<div class="ibox float-e-margins col-lg-6">
   <div class="ibox-title"> 
      <h5>All categories</h5>
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
         <td><a href="{{action('CategoriesController@edit',['categories'=>$category->id])}}"><button class="btn btn-primary">Edit</button></a></td>

         <td><form method="POST" action="{{action('CategoriesController@destroy',['categories'=>$category->id])}}">
					<input type="hidden" name="_method" value="delete"/>
					<input type="hidden" name="_token" value="{{csrf_token()}}"/>
					<input type="submit" class="btn btn-danger" value="Delete"/>
				</form></td>
      </tr>
      @endforeach   
   </tbody>	
</table>
</div>
</div>
@if (Session::has('message')) 
<div class="alert alert-success">
   {{Session::get('message')}}
</div>
@endif
@endsection