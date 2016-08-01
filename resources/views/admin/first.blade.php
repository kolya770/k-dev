@extends('layouts.admin')
@section ('css')
  <!-- Toastr style -->
{!! Html::style('admin/css/plugins/toastr/toastr.min.css') !!}
@endsection
@section ('title')
First screen
@endsection
@section('content')
@inject ('marks', 'App\Models\UTMMark')
@inject ('values', 'App\Models\UTMValue')
<div class="ibox float-e-margins">
  <div class="ibox-title">
  <h5>Header</h5>
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
         <th>Header value</th>
         <th>UTM value</th>
         <th>UTM mark</th>
         <th></th>
         <th></th>
      </tr>
   </thead>   
   <tbody>

                            
      @foreach ($values->all() as $value)
      <tr>
         <td>{{ $value->id }}</td>
         <td>{{ $value->value }}</td>
         <td>{{ $value->utm_value }}</td>
         <td>{{ $value->mark->mark }}</td>
         <td><a href="{{ action('UTMController@edit', ['value'=>$value->id]) }}"><button class="btn btn-primary">Edit</button></a></td>

         <td><form method="post" action="{{ action('UTMController@destroy', ['value'=>$value->id]) }}">
          <input type="hidden" name="_method" value="delete"/>
          <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
          <input type="submit" class="btn btn-danger" value="Delete"/>
        </form></td>
      </tr>
      
      @endforeach   
   </tbody> 
</table>
     {!! Form::open(array(
            'action' => 'ScreenController@store',
            'class' => 'form-horizontal',
            'enctype' => 'multipart/form-data'

          )) !!}
        <div class="form-group">
            {!! Form::label('default', 'Default value', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::text('default', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
          <div class="col-lg-offset-2 col-lg-10">
            <button class="btn btn-primary btn-circle" type="button" data-toggle="modal" data-target="#addutm">
              <i class="fa fa-plus"></i>
            </button>
          </div>
        </div>                
        <div class="form-group">
            <div class="col-lg-10">
                {!! Form::submit('Save changes', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
    {!! Form::close() !!}
    <div class="modal inmodal" id="addutm" tabindex="-1" role="dialog" aria-hidden="true">
           <div class="modal-dialog">
           <div class="modal-content animated bounceInRight">
                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                       
                       <h4 class="modal-title">Add new UTM mark value</h4>
                                 
                   </div>
                   <div class="modal-body">
                     {!! Form::open(array(
                        'action' => 'ScreenController@storeUTM',
                        'class' => 'form-horizontal',
                        'enctype' => 'multipart/form-data'

                      )) !!}
                      <div class="form-group"><label class="col-lg-2 control-label">UTM mark</label>
                            <div class="col-lg-10">
                                <select class="form-control m-b" name="mark">
                                        @foreach ($marks->all() as $mark)
                                        <option value="{{ $mark->id }}">{{ $mark->mark }}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                          {!! Form::label('utm_value', 'UTM value', ['class' => 'col-lg-2 control-label']) !!}
                          <div class="col-lg-10">
                              {!! Form::text('utm_value', null, ['class' => 'form-control']) !!}
                          </div>
                      </div>
                      <div class="form-group">
                          {!! Form::label('value', 'Header value', ['class' => 'col-lg-2 control-label']) !!}
                          <div class="col-lg-10">
                              {!! Form::text('value', null, ['class' => 'form-control']) !!}
                          </div>
                      </div>

                   </div>
                   <div class="modal-footer">
                       {!! Form::submit('Save UTM mark', ['class' => 'btn btn-w-m btn-primary btn-lg']) !!}
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