@extends('layouts.admin')

@section('content')

<table class = "table table-bordered">
   <caption>All posts</caption>   
   <thead>
      <tr>
         <th>id</th>
         <th>Title</th>
         <th>Image</th>
         <th></th>
         <th></th>
      </tr>
   </thead>   
   <tbody>
      @foreach ($posts as $post)
      <tr>
         <td>{{$post->id}}</td>
         <td>{{$post->title}}</td>
         <td>{{$post->preview}}</td>
         <td><a class="btn mini blue-stripe" href="{{action('PostController@edit', ['posts'=>$post->id])}}">Edit</a></td>

         <td><form method="POST" action="{{action('PostController@destroy', ['posts'=>$post->id])}}">
					<input type="hidden" name="_method" value="delete"/>
					<input type="hidden" name="_token" value="{{csrf_token()}}"/>
					<input type="submit" class="btn mini blue-stripe" value="Delete"/>
				</form></td>
      </tr>
      @endforeach   
   </tbody>	
</table>

@endsection