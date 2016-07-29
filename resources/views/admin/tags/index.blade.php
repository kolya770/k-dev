@extends('layouts.admin')
@section ('css')
  <!-- Toastr style -->
   {!! Html::style('admin/css/plugins/toastr/toastr.min.css') !!}
@endsection
@section ('title')
Tags
@endsection
@section('content')
@inject ('tags', 'App\Models\Tag')
<div class="row">
   <div class="col-lg-12">
   @foreach ($tags->all() as $tag) 
   
   <div class="btn-group" style="margin-right: 20px;">
      <button data-toggle="dropdown" class="btn btn-primary btn-rounded btn-outline dropdown-toggle">{{$tag->tag_name}} <span class="caret"></span></button>
         <ul class="dropdown-menu">
            <li><center><form method="post" action="{{action('TagController@destroy', ['tags'=>$tag->id])}}">
               <input type="hidden" name="_method" value="delete"/>
               <input type="hidden" name="_token" value="{{csrf_token()}}"/>
               <input type="submit" class='btn btn-link' value="Delete"/>
            </form></center></li>
            <li><a href="{{action('TagController@edit', ['tags'=>$tag->id])}}" class="btn btn-link" style="text-align: center;">Edit</a></li>
            
         </ul>
    </div>  
    
   @endforeach
   </div>
    </div>
    <div class="wrapper wrapper-content">
   <div class="row">
   <div class="col-sm-6">
   <div class="ibox float-e-margins">
      <div class="ibox-title">              
         <h5>Make a new tag</h5>
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
                                {!! Form::submit('Create tag', ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                       
      </div>
    </div>

@if (count($errors) > 0)
   @foreach ($errors->all() as $error)
       <input class="hidden alert" value="{{ $error }}">  
   @endforeach                  
@endif
@if (Session::has('message')) 
   <input class="hidden" value="{{ Session::get('message') }}" id="message">
@endif
@if (Session::has('alert')) 
   <input class="hidden" value="{{ Session::get('alert') }}" id="alert">
@endif
</div>
</div>
</div>
@endsection

@section('js')
 <!-- Toastr script -->
{!! Html::script('admin/js/plugins/toastr/toastr.min.js') !!}
<script type="text/javascript">
 $(function () {
    toastr.options = {
          "closeButton": true,
          "debug": false,
          "progressBar": true,
          "positionClass": "toast-top-right",
          "onclick": null,
          "showDuration": "10000",
          "hideDuration": "10000",
          "timeOut": "70000",
          "extendedTimeOut": "10000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
    }
    if (document.getElementById('message')) {  
        toastr["success"](document.getElementById('message').value, 'Message')
    }
    if (document.getElementById('alert')) {
        toastr["error"](document.getElementById('alert').value, 'Error')
    }

    if (document.getElementsByClassName('alert')) {
        var x = document.getElementsByClassName('alert');
        var i;
        for (i = 0; i < x.length; i++) {
            toastr["error"](x[i].value, 'Error');
        }
    }
});
</script>
 @endsection