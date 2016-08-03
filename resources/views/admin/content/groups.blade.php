@extends('layouts.admin')
@section ('css')
  <!-- Toastr style -->
{!! Html::style('admin/css/plugins/toastr/toastr.min.css') !!}

@endsection
@section ('title')
Groups
@endsection
@section('content')
@inject ('Blocks', 'App\Models\Block')
@inject ('groups', 'App\Models\Group')

<div class="ibox float-e-margins">
  <div class="ibox-title">
  <h5>Content groups</h5>
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


  <!-- TABLE -->
  <table class = "table table-hover">
   <thead>
      <tr>
         <th>#</th>
         <th>Group name</th>
         <th>Block count</th>
         <th></th>
         <th></th>
         <th></th>
      </tr>
   </thead>   
   <tbody>
      @foreach ($groups->all() as $group)
      <tr>
         <td>{{ $group->id }}</td>
         <td>{{ $group->name }}</td>
         <td>{{ count($group->blocks) }}</td>
         <td> <button type="button" class="btn btn-success" data-toggle="modal" data-target="#{{ 'showgroup' . $group->id }}">Show</button></td>
         <td><button class="btn btn-primary" data-toggle="modal" data-target="{{ "#editgroup".$group->id }}">Edit</button></td>

         <td><form method="post" action="{{ action('GroupController@destroy', ['group'=>$group->id]) }}">
          <input type="hidden" name="_method" value="delete"/>
          <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
          <input type="submit" class="btn btn-danger" value="Delete"/>
        </form></td>
      </tr>
      @endforeach   
   </tbody> 
</table>


<!-- EDIT GROUP -->
@foreach ($groups->all() as $group)
<div class="modal inmodal" id="{{ "editgroup".$group->id }}" tabindex="-1" role="dialog" aria-hidden="true">
           <div class="modal-dialog">
           <div class="modal-content animated bounceInRight">
           <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
               
               <h4 class="modal-title">Edit group</h4>
                         
           </div>

           <div class="modal-body">
               {!! Form::open(array(
                      'method' => 'PATCH',
                      'action' => array('GroupController@update', $group->id),
                      'class' => 'form-horizontal',
                      'enctype' => 'multipart/form-data'

                  )) !!}
                <div class="form-group">
                  {!! Form::label('name', 'Group name', ['class' => 'col-lg-2 control-label']) !!}
                  <div class="col-lg-10">
                      {!! Form::text('name', $group->name, ['class' => 'form-control', 'required' => '']) !!}
                  </div>
              </div>
           </div>
           <div class="modal-footer">
               {!! Form::submit('Update group', ['class' => 'btn btn-w-m btn-primary btn-lg']) !!}
               {!! Form::close() !!}
           </div>
       </div>
   </div>
</div> 



<!-- SHOW GROUP -->
<div class="modal inmodal" id="{{ "showgroup".$group->id }}" tabindex="-1" role="dialog" aria-hidden="true">
           <div class="modal-dialog">
           <div class="modal-content animated bounceInRight">
                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                       
                       <h4 class="modal-title">{{ $group->name }}</h4>
                                 
                   </div>

                   <div class="modal-body">
                  
                   </div>
                   <div class="modal-footer">
                       <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                   </div>
               </div>
           </div>
       </div> 
@endforeach
     

<!-- ADD BUTTON -->     
<div class="row">
  <div class="col-lg-offset-2 col-lg-10">
    <button class="btn btn-primary btn-circle" type="button" data-toggle="modal" data-target="#addgroup">
      <i class="fa fa-plus"></i>
    </button>
  </div>
</div>                


<!-- SAVE MODAL -->
<div class="modal inmodal" id="addgroup" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog">
   <div class="modal-content animated bounceInRight">
       <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
           
           <h4 class="modal-title">Add new group</h4>
                     
       </div>
       <div class="modal-body">    
          {!! Form::open(array(
            'action' => 'GroupController@store',
            'class' => 'form-horizontal',
            'enctype' => 'multipart/form-data'

          )) !!}
          <div class="form-group">
              {!! Form::label('name', 'Group name', ['class' => 'col-lg-2 control-label']) !!}
              <div class="col-lg-10">
                  {!! Form::text('name', null, ['class' => 'form-control', 'required' => '']) !!}
              </div>
          </div>
      </div>
      <div class="modal-footer">
         {!! Form::submit('Save group', ['class' => 'btn btn-w-m btn-primary btn-lg']) !!}
         {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>

     @if (Session::has('message')) 
        <input class="hidden" value="{{ Session::get('message') }}" id="message">
     @endif
     @if (Session::has('alert')) 
        <input class="hidden" value="{{ Session::get('alert') }}" id="alert">
     @endif
  </div>
</div>

@endsection

@section ('js')

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
          "hideDuration": "1000",
          "timeOut": "7000",
          "extendedTimeOut": "1000",
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
});
</script>


@endsection