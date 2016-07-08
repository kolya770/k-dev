@extends('layouts.admin')

@section('content')

<table class = "table table-bordered">
   <caption>All reviews</caption>   
   <thead>
      <tr>
         <th>id</th>
         <th>Author name</th>
         <th>Author job</th>
         <th>Preview</th>
         <th></th>
         <th></th>
      </tr>
   </thead>   
   <tbody>
      @foreach ($reviews as $review)
      <tr>
         <td>{{$review->id}}</td>
         <td>{{$review->author_name}}</td>
         <td>{{$review->author_job}}</td>
         <td>{{$review->preview}}</td>
         <td><a class="btn btn-link" href="{{action('ReviewController@edit', ['reviews'=>$review->id])}}">Edit</a></td>

         <td><form method="post" action="{{action('ReviewController@destroy', ['reviews'=>$review->id])}}">
					<input type="hidden" name="_method" value="delete"/>
					<input type="hidden" name="_token" value="{{csrf_token()}}"/>
					<input type="submit" class="btn mini blue-stripe" value="Delete"/>
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