@extends('layouts.admin')
@section ('css')
  <!-- Toastr style -->
{!! Html::style('admin/css/plugins/toastr/toastr.min.css') !!}
@endsection
@section ('title')
Groups
@endsection
@section('content')
@inject ('sites', 'App\Models\Group')

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
  <table class = "table table-hover">
   <thead>
      <tr>
         <th>#</th>
         <th>Block name</th>
         <th>URL</th>
         <th>Description</th>
         <th>Keywords</th>
         <th>Copyright</th>
         <th>Chosen</th>
         <th></th>
         <th></th>
      </tr>
   </thead>   
   <tbody>

                            
      @foreach ($sites->all() as $site)
      <tr>
         <td>{{ $site->id }}</td>
         <td>{{ $site->name }}</td>
         <td>{{ $site->url }}</td>
         <td>{{ $site->description }}</td>
         <td>{{ $site->keywords }}</td>
         <td>{{ $site->copyright }}</td>
         <td> @if ($site->isActive) 
         <i class="fa fa-check"></i>  
         @endif</td>
         <td><button class="btn btn-primary" data-toggle="modal" data-target="{{ "#editconfig".$site->id }}">Edit</button></td>

         <td><form method="post" action="{{ action('ConfigController@destroy', ['site'=>$site->id]) }}">
          <input type="hidden" name="_method" value="delete"/>
          <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
          <input type="submit" class="btn btn-danger" value="Delete"/>
        </form></td>
      </tr>
      
      @endforeach   
   </tbody> 
</table>
@foreach ($sites->all() as $site)
<div class="modal inmodal" id="{{ "editconfig".$site->id }}" tabindex="-1" role="dialog" aria-hidden="true">
           <div class="modal-dialog">
           <div class="modal-content animated bounceInRight">
                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                       
                       <h4 class="modal-title">Edit site configuration</h4>
                                 
                   </div>
                   <div class="modal-body">
                     {!! Form::open(array(
                            'method' => 'PATCH',
                            'action' => array('ConfigController@update', $site->id),
                            'class' => 'form-horizontal',
                            'enctype' => 'multipart/form-data'

                        )) !!}
                      
                      <div class="form-group">
                          {!! Form::label('name', 'Site name', ['class' => 'col-lg-2 control-label']) !!}
                          <div class="col-lg-10">
                              {!! Form::text('name',  $site->name, ['class' => 'form-control', 'required' => '']) !!}
                          </div>
                      </div>
                      <div class="form-group">
                          {!! Form::label('url', 'URL', ['class' => 'col-lg-2 control-label']) !!}
                          <div class="col-lg-10">
                              {!! Form::text('url', $site->url, ['class' => 'form-control', 'required' => '']) !!}
                          </div>
                      </div>
                      <div class="form-group">
                          {!! Form::label('description', 'Description (META)', ['class' => 'col-lg-2 control-label']) !!}
                          <div class="col-lg-10">
                              {!! Form::text('description', $site->description, ['class' => 'form-control', 'required' => '']) !!}
                          </div>
                      </div>
                      <div class="form-group">
                          {!! Form::label('keywords', 'Keywords (META)', ['class' => 'col-lg-2 control-label']) !!}
                          <div class="col-lg-10">
                              {!! Form::text('keywords', $site->keywords, ['class' => 'form-control', 'required' => '']) !!}
                          </div>
                      </div>
                      <div class="form-group">
                          {!! Form::label('copyright', 'Copyright (META)', ['class' => 'col-lg-2 control-label']) !!}
                          <div class="col-lg-10">
                              {!! Form::text('copyright', $site->copyright, ['class' => 'form-control', 'required' => '']) !!}
                          </div>
                      </div>

                   </div>
                   <div class="modal-footer">
                       {!! Form::submit('Update site configuration', ['class' => 'btn btn-w-m btn-primary btn-lg']) !!}
                       {!! Form::close() !!}
                   </div>
               </div>
           </div>
       </div> 
@endforeach
     {!! Form::open(array(
            'action' => 'ConfigController@choose',
            'class' => 'form-horizontal',
            'enctype' => 'multipart/form-data'

          )) !!}
        <div class="form-group"><label class="col-lg-2 control-label">Site configuration</label>
            <div class="col-lg-10">
                <select class="form-control m-b" name="site">
                        @foreach ($sites->all() as $site)
                        <option value="{{ $site->id }}">{{ $site->name }}</option>
                        @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-10">
                {!! Form::submit('Choose as a site configuration', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
    {!! Form::close() !!}
        <div class="row">
          <div class="col-lg-offset-2 col-lg-10">
            <button class="btn btn-primary btn-circle" type="button" data-toggle="modal" data-target="#addconfig">
              <i class="fa fa-plus"></i>
            </button>
          </div>
        </div>                
        
    <div class="modal inmodal" id="addconfig" tabindex="-1" role="dialog" aria-hidden="true">
           <div class="modal-dialog">
           <div class="modal-content animated bounceInRight">
                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                       
                       <h4 class="modal-title">Add new site configuration</h4>
                                 
                   </div>
                   <div class="modal-body">
                     {!! Form::open(array(
                        'action' => 'ConfigController@store',
                        'class' => 'form-horizontal',
                        'enctype' => 'multipart/form-data'

                      )) !!}
                      
                      <div class="form-group">
                          {!! Form::label('name', 'Site name', ['class' => 'col-lg-2 control-label']) !!}
                          <div class="col-lg-10">
                              {!! Form::text('name', null, ['class' => 'form-control', 'required' => '']) !!}
                          </div>
                      </div>
                      <div class="form-group">
                          {!! Form::label('url', 'URL', ['class' => 'col-lg-2 control-label']) !!}
                          <div class="col-lg-10">
                              {!! Form::text('url', null, ['class' => 'form-control', 'required' => '']) !!}
                          </div>
                      </div>
                      <div class="form-group">
                          {!! Form::label('description', 'Description (META)', ['class' => 'col-lg-2 control-label']) !!}
                          <div class="col-lg-10">
                              {!! Form::text('description', null, ['class' => 'form-control', 'required' => '']) !!}
                          </div>
                      </div>
                      <div class="form-group">
                          {!! Form::label('keywords', 'Keywords (META)', ['class' => 'col-lg-2 control-label']) !!}
                          <div class="col-lg-10">
                              {!! Form::text('keywords', null, ['class' => 'form-control', 'required' => '']) !!}
                          </div>
                      </div>
                      <div class="form-group">
                          {!! Form::label('copyright', 'Copyright (META)', ['class' => 'col-lg-2 control-label']) !!}
                          <div class="col-lg-10">
                              {!! Form::text('copyright', null, ['class' => 'form-control', 'required' => '']) !!}
                          </div>
                      </div>

                   </div>
                   <div class="modal-footer">
                       {!! Form::submit('Save site configuration', ['class' => 'btn btn-w-m btn-primary btn-lg']) !!}
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