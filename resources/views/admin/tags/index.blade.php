@extends('layouts.admin')

@section('content')
@inject ('tags', 'App\Models\Tag')
<div class="row">
   <div class="col-lg-12">
   @foreach ($tags->all() as $tag) 
   
   <div class="btn-group">
      <button data-toggle="dropdown" class="btn btn-primary btn-rounded btn-outline dropdown-toggle">{{$tag->tag_name}}<span class="caret"></span></button>
         <ul class="dropdown-menu">
            <li><center><form method="post" action="{{action('TagController@destroy', ['tags'=>$tag->id])}}">
               <input type="hidden" name="_method" value="delete"/>
               <input type="hidden" name="_token" value="{{csrf_token()}}"/>
               <input type="submit" class='btn btn-w-m btn-link' value="Delete"/>
            </form></center></li>
            <li><a href="{{action('TagController@edit', ['tags'=>$tag->id])}}" class="font-bold">Edit</a></li>
            
         </ul>
    </div>  
    
   @endforeach
   </div>
    </div>
    <div class="wrapper wrapper-content">
   <div class="row">
   <div class="col-sm-12">
   <div class="ibox float-e-margins">
      <div class="ibox-title">              
         <h5>Make a new tag</h5>
            <div class="ibox-tools">
               <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
              </a>
               <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                     <i class="fa fa-wrench"></i>
               </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
               <a class="close-link">
                     <i class="fa fa-times"></i>
               </a>
            </div>
      </div>
      <div class="ibox-content">
         {!! Form::open(array(
               'action' => 'TagController@store',                        
               'class' => 'form-horizontal',
               'enctype' => 'multipart/form-data'
            )) !!}
                        <div class="form-group">
                            {!! Form::label('tag_name', 'Tag name', ['class' => 'col-lg-3 control-label']) !!}
                            <div class="col-lg-9">
                                {!! Form::text('tag_name', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-9">
                                {!! Form::submit('Create tag', ['class' => 'btn btn-sm']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                       
                    </div>
                </div>

@if (Session::has('message')) 
   <div class="alert alert-success">
         {{Session::get('message')}}
   </div>
@endif
</div>
</div>
</div>
@endsection