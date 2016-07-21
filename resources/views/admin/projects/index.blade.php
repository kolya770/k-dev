@extends('layouts.admin')

@section('content')
@inject ('projects', 'App\Models\Project')
<table class = "table table-bordered">
   <caption>All projects</caption>   
   <thead>
      <tr>
         <th>id</th>
         <th>Title</th>
         <th>Brief</th>
         <th>Image</th>
         <th></th>
         <th></th>
      </tr>
   </thead>   
   <tbody>
      @foreach ($projects->all() as $project)
      <tr>
         <td>{{$project->id}}</td>
         <td>{{$project->title}}</td>
         <td>{{$project->brief}}</td>
         <td>{{$project->image}}</td>
         <td><a class="btn btn-link" href="{{action('ProjectController@edit', ['projects'=>$project->id])}}">Edit</a></td>

         <td><form method="post" action="{{action('ProjectController@destroy', ['projects'=>$project->id])}}">
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