@extends('layouts.admin')
@section ('title')
All posts
@endsection
@section('content')
@inject ('posts', 'App\Models\Post')
<div class="ibox float-e-margins">
   <div class="ibox-title"> 
      <h5>Posts</h5>
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
            <th>Title</th>
            <th>Image</th>
            <th>Category</th>
            <th></th>
            <th></th>
            <th></th>
         </tr>
      </thead>   
      <tbody>
         @foreach ($posts->all() as $post)
         <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->preview }}</td>
            <td>{{ $post->category->title }}</td>
            <td><a href="{{ action('PostController@show', ['posts'=>$post->id]) }}"><button class="btn btn-success">Show</button></a>
            <td><a href="{{ action('PostController@edit', ['posts'=>$post->id]) }}"><button class="btn btn-primary">Edit</button></a></td>

            <td><form method="POST" action="{{ action('PostController@destroy', ['posts'=>$post->id]) }}">
   					<input type="hidden" name="_method" value="delete"/>
   					<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
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
         {{ Session::get('message') }}
   </div>
@endif
@endsection