@extends('layouts.admin')
@section ('css')
{!! Html::style('css/lightgallery.css') !!}
@endsection
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
         <td> <button type="button" class="btn btn-success" data-toggle="modal" data-target="#{{ 'modal' . $project->id }}">Show</button></td>
         <td><a href="{{ action('ProjectController@edit', ['projects'=>$project->id]) }}"><button class="btn btn-primary">Edit</button></a></td>

         <td><form method="POST" action="{{ action('ProjectController@destroy', ['projects'=>$project->id]) }}">
                    <input type="hidden" name="_method" value="delete"/>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                    <input type="submit" class="btn btn-danger" value="Delete"/>
                </form></td>
      </tr>
      <div class="modal inmodal" id="{{ 'modal' . $project->id }}" tabindex="-1" role="dialog" aria-hidden="true">
           <div class="modal-dialog">
           <div class="modal-content animated bounceInRight">
                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                       <center>
                       <img src="{{ $images->where('id', $project->main_image_id)->first()->path }}" width="300px" style="border-radius: 5px;">
                       </center>
                       <br>
                       <h4 class="modal-title">{{ $project->title }}</h4>
                                 
                   </div>
                   <div class="modal-body">
                     <input class="project_id hidden" value="{{ $project->id }}"> 
                     
                     
                     <center>
                       <p>
                       {{ $project->brief }}
                       </p>
                       </center>
                       <hr>
                       <p>
                       {{ $project->description }}
                       </p>
                   </div>
                   <div class="modal-footer">
                      <div id="{{ 'lightgallery'. $project->id }}">
                          @foreach ($project->images as $image) 
                          <a href="{{ $image->path }}" class="gallery-block">
                              <img alt="{{ $image->description }}" src="{{ $image->path }}" width="150px" class="image-item" style="margin-right: 30px; border: 1px solid #ddd; border-radius: 4px; padding: 5px;"> 
                           </a>
                          @endforeach
                      </div>
                  </div>
               </div>
           </div>
       </div>
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

@section ('js')
{!! Html::script('js/lightgallery.js') !!}
{!! Html::script('js/lg-thumbnail.js') !!}
{!! Html::script('js/lg-fullscreen.js') !!}

<script>
   $(document).ready(function() {
      var x = document.getElementsByClassName("project_id");
      var i;
      var gallery_id;
      for (i = 0; i < x.length; i++) {
         gallery_id = "#lightgallery" + x[i].value;
         $(gallery_id).lightGallery({
         mode: 'lg-fade'
        }); 
      }
   });
</script>
@endsection