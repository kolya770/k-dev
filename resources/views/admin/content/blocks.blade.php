@extends('layouts.admin')
@section ('css')
  <!-- Toastr style -->
{!! Html::style('admin/css/plugins/toastr/toastr.min.css') !!}
{{ Html::style('css/summernote.css') }}
{{ Html::style('admin/css/plugins/codemirror/codemirror.css') }}
{{ Html::style('admin/css/plugins/codemirror/ambiance.css') }}

<style type="text/css">
    .btn-default {
            color: #333 !important; 
            background-color: #fff !important;
            border-color: #ccc !important;
    }
</style>
@endsection
@section ('title')
Blocks
@endsection
@section('content')
@inject ('blocks', 'App\Models\Block')
@inject ('groups', 'App\Models\Group')

<div class="ibox float-e-margins">
  <div class="ibox-title">
  <h5>Content blocks</h5>
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
         <th>Group</th>
         <th></th>
         <th></th>
         <th></th>
      </tr>
   </thead>   
   <tbody>

                            
      @foreach ($blocks->all() as $block)
      <tr>
         <td>{{ $block->id }}</td>
         <td>{{ $block->name }}</td>
         <td>{{ $block->group->name }}</td>
         <td> <button type="button" class="btn btn-success" data-toggle="modal" data-target="#{{ 'showblock' . $block->id }}">Show</button></td>
         <td><button class="btn btn-primary" data-toggle="modal" data-target="{{ "#editblock".$block->id }}">Edit</button></td>

         <td><form method="post" action="{{ action('BlockController@destroy', ['block'=>$block->id]) }}">
          <input type="hidden" name="_method" value="delete"/>
          <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
          <input type="submit" class="btn btn-danger" value="Delete"/>
        </form></td>
      </tr>
      
      @endforeach   
   </tbody> 
</table>
@foreach ($blocks->all() as $block)
<div class="modal inmodal" id="{{ "editblock".$block->id }}" tabindex="-1" role="dialog" aria-hidden="true">
           <div class="modal-dialog">
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
                              </select>
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
                            {!! Form::textarea('content', $block->content->value, ['class' => 'form-control', 'id' => 'summernote']) !!}
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
                      <input class="hidden" name="type" value="textarea">
                      @elseif ($block->content->type == 'image')

                      <div class="form-group">
                          {!! Form::label('name', 'Block name', ['class' => 'col-lg-2 control-label']) !!}
                          <div class="col-lg-10">
                              {!! Form::text('name', $block->name, ['class' => 'form-control', 'required' => '']) !!}
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
                              </select>
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
                            {!! Form::textarea('content', $block->content->value, ['class' => 'form-control', 'id' => 'codearea']) !!}
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
     
        <div class="row">
          <div class="col-lg-offset-2 col-lg-10">
            <button class="btn btn-primary btn-circle" type="button" data-toggle="modal" data-target="#addconfig">
              <i class="fa fa-plus"></i>
            </button>
          </div>
        </div>                
        
    <div class="modal inmodal" id="addconfig" tabindex="-1" role="dialog" aria-hidden="true">
           <div class="modal-dialog modal-lg">
           <div class="modal-content animated bounceInRight">
                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                       
                       <h4 class="modal-title">Add new block</h4>
                                 
                   </div>

                   <div class="modal-body">
                    <div class="panel blank-panel">

                        <div class="panel-heading">
                            
                            <div class="panel-options">

                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#input">Input</a></li>
                                    <li class=""><a data-toggle="tab" href="#image">Image</a></li>
                                    <li class=""><a data-toggle="tab" href="#textarea">Textarea</a></li>
                                    <li class=""><a data-toggle="tab" href="#code">Code</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="panel-body">

                            <div class="tab-content">
                                <div id="input" class="tab-pane active">
                                    {!! Form::open(array(
                                      'action' => 'BlockController@store',
                                      'class' => 'form-horizontal',
                                      'enctype' => 'multipart/form-data'

                                    )) !!}
                                    <div class="form-group">
                                        {!! Form::label('name', 'Block name', ['class' => 'col-lg-2 control-label']) !!}
                                        <div class="col-lg-10">
                                            {!! Form::text('name', null, ['class' => 'form-control', 'required' => '']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('content', 'Content', ['class' => 'col-lg-2 control-label']) !!}
                                        <div class="col-lg-10">
                                            {!! Form::text('content', null, ['class' => 'form-control', 'required' => '']) !!}
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
                                    <input class="hidden" name="type" value="input">
                                    <div class="form-group" style="margin-top: 40px;">
                                      <div class="col-lg-offset-8 col-lg-2">
                                      {!! Form::submit('Save block of content', ['class' => 'btn btn-w-m btn-primary btn-lg']) !!}
                                  
                                      </div>
                                    </div>
                                {!! Form::close() !!}
                                </div>

                                <div id="image" class="tab-pane">
                                    {!! Form::open(array(
                                      'action' => 'BlockController@store',
                                      'class' => 'form-horizontal',
                                      'enctype' => 'multipart/form-data'

                                    )) !!}
                                    <div class="form-group">
                                        {!! Form::label('name', 'Block name', ['class' => 'col-lg-2 control-label']) !!}
                                        <div class="col-lg-10">
                                            {!! Form::text('name', null, ['class' => 'form-control', 'required' => '']) !!}
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
                                            </select>
                                        </div>
                                    </div>
                                    <input class="hidden" name="type" value="image">
                                    <div class="form-group" style="margin-top: 40px;">
                                      <div class="col-lg-offset-8 col-lg-2">
                                      {!! Form::submit('Save block of content', ['class' => 'btn btn-w-m btn-primary btn-lg']) !!}
                                  
                                      </div>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                                <div id="textarea" class="tab-pane">
                                    {!! Form::open(array(
                                      'action' => 'BlockController@store',
                                      'class' => 'form-horizontal',
                                      'enctype' => 'multipart/form-data'

                                    )) !!}
                                    <div class="form-group">
                                        {!! Form::label('name', 'Block name', ['class' => 'col-lg-2 control-label']) !!}
                                        <div class="col-lg-10">
                                            {!! Form::text('name', null, ['class' => 'form-control', 'required' => '']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                      {!! Form::label('content', 'Post content', ['class' => 'col-lg-2 control-label']) !!}
                                      <div class="col-lg-10">
                                          {!! Form::textarea('content', null, ['class' => 'form-control', 'id' => 'summernote']) !!}
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
                                    <input class="hidden" name="type" value="textarea">
                                    <div class="form-group" style="margin-top: 40px;">
                                      <div class="col-lg-offset-8 col-lg-2">
                                      {!! Form::submit('Save block of content', ['class' => 'btn btn-w-m btn-primary btn-lg']) !!}
                                  
                                      </div>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                                <div id="code" class="tab-pane">
                                    {!! Form::open(array(
                                      'action' => 'BlockController@store',
                                      'class' => 'form-horizontal',
                                      'enctype' => 'multipart/form-data'

                                    )) !!}
                                    <div class="form-group">
                                        {!! Form::label('name', 'Block name', ['class' => 'col-lg-2 control-label']) !!}
                                        <div class="col-lg-10">
                                            {!! Form::text('name', null, ['class' => 'form-control', 'required' => '']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                      {!! Form::label('content', 'Post content', ['class' => 'col-lg-2 control-label']) !!}
                                      <div class="col-lg-10">
                                          {!! Form::textarea('content', 'Insert some code here.', ['class' => 'form-control', 'id' => 'codearea']) !!}
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
                                    <input class="hidden" name="type" value="code">
                                    <div class="form-group" style="margin-top: 40px;">
                                      <div class="col-lg-offset-8 col-lg-2">
                                      {!! Form::submit('Save block of content', ['class' => 'btn btn-w-m btn-primary btn-lg']) !!}
                                  
                                      </div>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
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
            });
    </script>

<!-- CodeMirror -->

{!! Html::script('js/codemirror.js') !!}
{{   Html::script('admin/js/plugins/codemirror/mode/javascript/javascript.js') }}
<script>
     $(document).ready(function(){

         var editor= CodeMirror.fromTextArea(document.getElementById("codearea"), {
             lineNumbers: true,
             matchBrackets: true,
             styleActiveLine: true,
             theme:"ambiance"
         });

    });
</script>



@endsection