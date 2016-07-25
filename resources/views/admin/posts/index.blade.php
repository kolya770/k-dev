@extends('layouts.admin')

@section('content')
@inject ('posts', 'App\Models\Post')
<table class = "table table-bordered">
   <caption>All posts</caption>   
   <thead>
      <tr>
         <th>id</th>
         <th>Title</th>
         <th>Image</th>
         <th>Category</th>
         <th></th>
         <th></th>
      </tr>
   </thead>   
   <tbody>
      @foreach ($posts->all() as $post)
      <tr>
         <td>{{$post->id}}</td>
         <td>{{$post->title}}</td>
         <td>{{$post->preview}}</td>
         <td>{{$post->category_id}}
         <td><a class="btn btn-link" href="{{action('PostController@edit', ['posts'=>$post->id])}}">Edit</a></td>

         <td><form method="POST" action="{{action('PostController@destroy', ['posts'=>$post->id])}}">
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