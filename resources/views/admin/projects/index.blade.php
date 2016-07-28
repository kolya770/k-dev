@extends('layouts.admin')
@section ('title')
Portfolio
@endsection
@section('content')
@inject ('projects', 'App\Models\Project')
@inject ('images', 'App\Models\Image')
<div class="ibox float-e-margins">
   <div class="ibox-title"> 
      <h5>Projects</h5>
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
         <th>Brief</th>
         <th>Image</th>
         <th></th>
         <th></th>
      </tr>
   </thead>   
   <tbody>
      @foreach ($projects->all() as $project)
      <tr>
         <td>{{ $project->id }}</td>
         <td>{{ $project->title }}</td>
         <td>{{ $project->brief }}</td>
         <td><img src="{{ $images->where('id', $project->main_image_id)->first()->path }}" width="150px"></td>
         <td><a href="{{ action('ProjectController@edit', ['projects'=>$project->id]) }}"><button class="btn btn-primary">Edit</button></a></td>

         <td><form method="POST" action="{{ action('ProjectController@destroy', ['projects'=>$project->id]) }}">
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