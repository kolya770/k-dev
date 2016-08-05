@extends('layouts.admin')
@section ('css')
  <!-- Toastr style -->
{!! Html::style('admin/css/plugins/toastr/toastr.min.css') !!}

@endsection
@section ('title')
{{ $group->name  }}
@endsection
@section('content')
@inject ('blocks', 'App\Models\Block')
@inject ('groups', 'App\Models\Group')
@foreach($group->blocks as $block)
<div class="ibox float-e-margins">
  <div class="ibox-title">
  <h5>{{ $block->name }}</h5>
     <div class="ibox-tools">
        <a class="collapse-link">
           <i class="fa fa-chevron-up"></i>
        </a>
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
        </a>
        <ul class="dropdown-menu dropdown-user">
            <li>
              <a data-toggle="modal" data-target="{{ "#editblock".$block->id }}">Edit</a>
            </li>
            <li> 
              <a data-toggle="modal" data-target="#areyousure">Delete</a>
            </li>
        </ul>
        <a class="close-link">
           <i class="fa fa-times"></i>
        </a>
     </div>
  </div>
  <div class="ibox-content">
@if ($block->content->type == 'image')
<center>
  <img src="{!! '/'.$block->content->value !!}">
</center>
@else
  {!! $block->content->value !!}
@endif
  </div>
</div>
<div class="modal inmodal" id="areyousure" tabindex="-1" role="dialog" aria-hidden="true">
       <div class="modal-dialog ">
       <div class="modal-content animated bounceInRight">
       <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>       
       </div>

      <div class="modal-body">
        <center>
          <h2>Are you sure you want</h2>
          <h2>to delete the block &quot;{{ $block->name }}&quot;?</h2>
        </center>
      </div>

       <div class="modal-footer">
          <div class="col-sm-1">
            <button type="button" class="btn btn-w-m btn-success" data-dismiss="modal">Close</button>
          </div>
          <div class="col-sm-offset-8 col-sm-1">
            <form method="POST" action="{{ action('BlockController@destroy', ['block' => $block->id]) }}">
                <input type="hidden" name="_method" value="delete"/>
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <input type="submit" class="btn btn-w-m btn-danger" value="Yes"/>
            </form>
          </div>
       </div>
    </div>
  </div>
</div>
@endforeach
@foreach ($blocks->all() as $block)
<div class="modal inmodal" id="{{ "editblock".$block->id }}" tabindex="-1" role="dialog" aria-hidden="true">
           <div class="modal-dialog modal-lg">
           <div class="modal-content animated bounceInRight">
           <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
               
               <h4 class="modal-title">Edit block</h4>
                         
           </div>

           <div class="modal-body">
             {!! Form::open(array(
                    'method' => 'PATCH',
                    'action' => array('BlockController@update', $block->id),
                    'class' => 'form-horizontal',
                    'enctype' => 'multipart/form-data'

                )) !!}
              
              @if ($block->content->type == 'input')

              <div class="form-group">
                  {!! Form::label('name', 'Block name', ['class' => 'col-lg-2 control-label']) !!}
                  <div class="col-lg-10">
                      {!! Form::text('name', $block->name, ['class' => 'form-control', 'required' => '']) !!}
                  </div>
              </div>
              <div class="form-group">
                  {!! Form::label('content', 'Content', ['class' => 'col-lg-2 control-label']) !!}
                  <div class="col-lg-10">
                      {!! Form::text('content', $block->content->value, ['class' => 'form-control', 'required' => '']) !!}
                  </div>
              </div>
              <div class="form-group"><label class="col-lg-2 control-label">Group</label>
                  <div class="col-lg-10">
                      <select class="form-control m-b" name="group">
                              @foreach ($groups->all() as $group)
                              <option value="{{ $group->id }}">{{ $group->name }}</option>
                              @endforeach
                              <option value="1">No group needed</option>
                      </select>
                  </div>
              </div>
              <div class="row">
                <div class="col-lg-offset-2 col-lg-10">
                  <button class="btn btn-primary btn-circle" type="button" data-toggle="modal" data-target="{{ '#addutm' . $block->id }}">
                    <i class="fa fa-plus"></i>
                  </button>
                </div>
              </div>
              <input class="hidden" name="type" value="input">

              @elseif ($block->content->type == 'textarea')
              <div class="form-group">
                  {!! Form::label('name', 'Block name', ['class' => 'col-lg-2 control-label']) !!}
                  <div class="col-lg-10">
                      {!! Form::text('name', $block->name, ['class' => 'form-control', 'required' => '']) !!}
                  </div>
              </div>
              <div class="form-group">
                {!! Form::label('content', 'Post content', ['class' => 'col-lg-2 control-label']) !!}
                <div class="col-lg-10">
                    {!! Form::textarea('content', $block->content->value, ['class' => 'form-control', 'id' => 'editsummernote'.$block->id]) !!}
                </div>
            </div>
              <div class="form-group"><label class="col-lg-2 control-label">Group</label>
                  <div class="col-lg-10">
                      <select class="form-control m-b" name="group">
                              @foreach ($groups->all() as $group)
                              <option value="{{ $group->id }}">{{ $group->name }}</option>
                              @endforeach
                      </select>
                  </div>
              </div>
              <div class="row">
                <div class="col-lg-offset-2 col-lg-10">
                  <button class="btn btn-primary btn-circle" type="button" data-toggle="modal" data-target="{{ '#addutm' . $block->id }}">
                    <i class="fa fa-plus"></i>
                  </button>
                </div>
              </div>
              <input class="hidden" name="type" value="textarea">
              @elseif ($block->content->type == 'image')

              <div class="form-group">
                  {!! Form::label('name', 'Block name', ['class' => 'col-lg-2 control-label']) !!}
                  <div class="col-lg-10">
                      {!! Form::text('name', $block->name, ['class' => 'form-control', 'required' => '']) !!}
                  </div>
              </div>
              <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                  <img src="{{ '/'.$block->content->value }}" style="max-width: 200px; border-width: 1px; border-color: #ddddd; padding: 4px; border-radius: 5px"> 
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-offset-2 col-lg-3 ">
                    <label class="btn btn-success btn-file">
                        Browse image <input type="file" name="content" style="display: none;" >
                    </label>
                </div>
              </div>
              <div class="form-group"><label class="col-lg-2 control-label">Group</label>
                  <div class="col-lg-10">
                      <select class="form-control m-b" name="group">
                              @foreach ($groups->all() as $group)
                              <option value="{{ $group->id }}">{{ $group->name }}</option>
                              @endforeach
                              <option value="1">No group needed</option>
                      </select>
                  </div>
              </div>
              <div class="row">
                <div class="col-lg-offset-2 col-lg-10">
                  <button class="btn btn-primary btn-circle" type="button" data-toggle="modal" data-target="{{ '#addutm' . $block->id }}">
                    <i class="fa fa-plus"></i>
                  </button>
                </div>
              </div>
              <input class="hidden" name="type" value="image">

              @elseif ($block->content->type == 'code')
              <div class="form-group">
                  {!! Form::label('name', 'Block name', ['class' => 'col-lg-2 control-label']) !!}
                  <div class="col-lg-10">
                      {!! Form::text('name', $block->name, ['class' => 'form-control', 'required' => '']) !!}
                  </div>
              </div>
              <div class="form-group">
                {!! Form::label('content', 'Post content', ['class' => 'col-lg-2 control-label']) !!}
                <div class="col-lg-10">
                    {!! Form::textarea('content', $block->content->value, ['class' => 'form-control', 'id' => 'codearea'.$block->id]) !!}
                </div>
            </div>
              <div class="form-group"><label class="col-lg-2 control-label">Group</label>
                  <div class="col-lg-10">
                      <select class="form-control m-b" name="group">
                              @foreach ($groups->all() as $group)
                              <option value="{{ $group->id }}">{{ $group->name }}</option>
                              @endforeach
                              <option value="1">No group needed</option>
                      </select>
                  </div>
              </div>
              <div class="row">
                <div class="col-lg-offset-2 col-lg-10">
                  <button class="btn btn-primary btn-circle" type="button" data-toggle="modal" data-target="{{ '#addutm' . $block->id }}">
                    <i class="fa fa-plus"></i>
                  </button>
                </div>
              </div>
              <input class="hidden" name="type" value="code">
              @endif

           </div>
           <div class="modal-footer">
               {!! Form::submit('Update block', ['class' => 'btn btn-w-m btn-primary btn-lg']) !!}
               {!! Form::close() !!}
           </div>
       </div>
   </div>
</div> 
@endforeach

     @if (Session::has('message')) 
        <input class="hidden" value="{{ Session::get('message') }}" id="message">
     @endif
     @if (Session::has('alert')) 
        <input class="hidden" value="{{ Session::get('alert') }}" id="alert">
     @endif


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

<!-- SUMMERNOTE -->
{!! Html::script('js/summernote.min.js') !!}
    <script type="text/javascript">
            $(document).ready(function() {
                $('#summernote').summernote({
                    height: 300,                 // set editor height
                    minHeight: null,             // set minimum height of editor
                    maxHeight: null,             // set maximum height of editor
                    focus: true                  // set focus to editable area after initializing summernote
                });
                var block_count = document.getElementById('blockcount').value;
                var mark_count = document.getElementById('markcount').value;
                for (var i = 0; i < mark_count; i++) {
                  $('#utm_edit_summernote'+i).summernote({
                   height: 300,                 // set editor height
                    minHeight: null,             // set minimum height of editor
                    maxHeight: null,             // set maximum height of editor
                    focus: true                  // set focus to editable area after initializing summernote
                  });
                }
                for (var i = 0; i < block_count; i++) {

                  $('#editsummernote'+i).summernote({
                   height: 300,                 // set editor height
                    minHeight: null,             // set minimum height of editor
                    maxHeight: null,             // set maximum height of editor
                    focus: true                  // set focus to editable area after initializing summernote
                  });
                  $('#utm_summernote'+i).summernote({
                      height: 300,                 // set editor height
                      minHeight: null,             // set minimum height of editor
                      maxHeight: null,             // set maximum height of editor
                      focus: true                  // set focus to editable area after initializing summernote
                  });
                }
                $('#editsummernote').summernote({
                   height: 300,                 // set editor height
                    minHeight: null,             // set minimum height of editor
                    maxHeight: null,             // set maximum height of editor
                    focus: true                  // set focus to editable area after initializing summernote
                });
                $('#utm_summernote').summernote({
                    height: 300,                 // set editor height
                    minHeight: null,             // set minimum height of editor
                    maxHeight: null,             // set maximum height of editor
                    focus: true                  // set focus to editable area after initializing summernote
                });
            });
    </script>

@endsection