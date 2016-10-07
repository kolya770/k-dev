@extends('layouts.admin')
@section ('css')
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
@inject ('marks', 'App\Models\UTM')

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

<!-- TABLE -->

  <table class = "table table-hover">
   <thead>
      <tr>
         <th>#</th>
         <th>Block name</th>
         <th>Group</th>
         <th>Content type</th>
         <th>Has UTM</th>
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
         <td>{{ $block->content->type }}</td>
         <td>@if (count($block->utm) > 0)
         Yes
         @endif
         </td>
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

<!-- EDIT BLOCK -->


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


<!-- SHOW BLOCK -->


<div class="modal inmodal" id="{{ "showblock".$block->id }}" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog">
   <div class="modal-content animated bounceInRight">
           <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
               
               <h4 class="modal-title">{{ $block->name }}</h4>
                         
           </div>

           <div class="modal-body">
             @if (count($block->utm) > 0)
             <center><h3>UTM marks in this block</h3></center>
             <table class = "table table-hover">
                 <thead>
                    <tr>
                       <th>#</th>
                       <th>UTM name</th>
                       <th>UTM value</th>
                       <th></th>
                       <th></th>
                       <th></th>
                    </tr>
                 </thead>   
                 <tbody>
                    @foreach ($block->utm as $mark)
                    <tr>
                       <td>{{ $mark->id }}</td>
                       <td>{{ $mark->utm_name }}</td>
                       <td>{{ $mark->utm_value }}</td>
                       <td> <button type="button" class="btn btn-success" data-toggle="modal" data-target="#{{ 'showmark' . $mark->id }}">Show</button></td>
                       <td><button class="btn btn-primary" data-toggle="modal" data-target="{{ "#editmark".$mark->id }}">Edit</button></td>

                       <td><form method="post" action="{{ action('UTMController@destroy', ['mark'=>$mark->id]) }}">
                        <input type="hidden" name="_method" value="delete"/>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                        <input type="submit" class="btn btn-danger" value="Delete"/>
                      </form></td>
                    </tr>
                    @endforeach   
                 </tbody> 
              </table>
              <hr>
              @endif
              @if ($block->content->type == 'image')
              <center>
              <img src="{{ '/'.$block->content->value }}">
              </center>
              @else

              {!! $block->content->value !!}

              @endif
           </div>
           <div class="modal-footer">
               <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
           </div>
       </div>
   </div>
</div> 

<!-- ADD UTM MODAL -->

<div class="modal inmodal" id="{{ 'addutm' . $block->id }}" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-lg">
   <div class="modal-content animated bounceInRight">
       <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
           
           <h4 class="modal-title">Add new mark</h4>
                     
       </div>
       <div class="modal-body">    
          {!! Form::open(array(
            'action' => 'UTMController@store',
            'class' => 'form-horizontal',
            'enctype' => 'multipart/form-data'

          )) !!}
          <div class="form-group">
              {!! Form::label('utm_name', 'Mark name', ['class' => 'col-lg-2 control-label']) !!}
              <div class="col-lg-10">
                  {!! Form::text('utm_name', null, ['class' => 'form-control', 'required' => '']) !!}
              </div>
          </div>
          <div class="form-group">
              {!! Form::label('utm_value', 'Mark value', ['class' => 'col-lg-2 control-label']) !!}
              <div class="col-lg-10">
                  {!! Form::text('utm_value', null, ['class' => 'form-control', 'required' => '']) !!}
              </div>
          </div>
          <div class="form-group">
              {!! Form::label('content', 'Content', ['class' => 'col-lg-2 control-label']) !!}
              <div class="col-lg-10">
                  @if ($block->content->type == 'image')
                  <label class='btn btn-success btn-file'>Browse image <input type='file' name='content' style='display: none;' ></label>
                  @elseif ($block->content->type == 'input')
                  <input type="text" required class="form-control" name='content'>
                  @elseif ($block->content->type == 'textarea')
                  <textarea type="text" required class="form-control" name='content' id="{{ 'utm_summernote'.$block->id }}"></textarea>
                  @else 
                  <textarea type="text" required class="form-control" name='content' id='{{ 'utm_codearea'.$block->id }}'></textarea>
                  @endif
              </div>
          </div>
          <input type="hidden" name="block" value={{ $block->id }}>
          <input type="hidden" name="type" value={{ $block->content->type }}>
      </div>
      <div class="modal-footer">
         {!! Form::submit('Save mark', ['class' => 'btn btn-w-m btn-primary btn-lg']) !!}
         {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>

@foreach($block->utm as $mark)

<!-- SHOW UTM MODAL -->

<div class="modal inmodal" id="{{ "showmark".$mark->id }}" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-lg">
   <div class="modal-content animated bounceInRight">
           <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
             
             <h4 class="modal-title">{{ $mark->utm_name.'='.$mark->utm_value }}</h4>              
           </div>
           <div class="modal-body">
             @if ($mark->content->type == 'image')
             <center>
              <img src="{{ '/'.$mark->content->value }}">
             </center>
             @else
             {!! $mark->content->value !!}
             @endif
           </div>
           <div class="modal-footer">
               <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
           </div>
       </div>
   </div>
</div> 

<!-- EDIT MARK MODAL-->

<div class="modal inmodal" id="{{ "editmark".$mark->id }}" tabindex="-1" role="dialog" aria-hidden="true">
           <div class="modal-dialog">
           <div class="modal-content animated bounceInRight">
           <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
               
               <h4 class="modal-title">Edit mark</h4>
                         
           </div>
           <div class="modal-body">
               {!! Form::open(array(
                      'method' => 'PATCH',
                      'action' => array('UTMController@update', $mark->id),
                      'class' => 'form-horizontal',
                      'enctype' => 'multipart/form-data'

                  )) !!}
                <div class="form-group">
                  {!! Form::label('utm_name', 'Mark name', ['class' => 'col-lg-2 control-label']) !!}
                  <div class="col-lg-10">
                      {!! Form::text('utm_name', $mark->utm_name, ['class' => 'form-control', 'required' => '']) !!}
                  </div>
                </div>
                <div class="form-group">
                  {!! Form::label('utm_value', 'Mark value', ['class' => 'col-lg-2 control-label']) !!}
                  <div class="col-lg-10">
                      {!! Form::text('utm_value', $mark->utm_value, ['class' => 'form-control', 'required' => '']) !!}
                  </div>
                </div>
                <div class="form-group">
                  {!! Form::label('content', 'Content', ['class' => 'col-lg-2 control-label']) !!}
                  <div class="col-lg-10">
                      @if ($mark->content->type == 'image')
                      <label class='btn btn-success btn-file'>Browse image <input type='file' name='content' style='display: none;' ></label>
                      @elseif ($mark->content->type == 'input')
                      <input type="text" required class="form-control" name='content' value={{ $mark->content->value }}>
                      @elseif ($mark->content->type == 'textarea')
                      <textarea type="text" required class="form-control" name='content' id="{!! 'utm_edit_summernote'.$mark->id !!}">{!! $mark->content->value !!}</textarea>
                      @else 
                      <textarea type="text" required class="form-control" name='content' id='{!! 'utm_edit_codearea'.$mark->id !!}'>{!! $mark->content->value !!}</textarea>
                      @endif
                  </div>
                </div>
           </div>
           <div class="modal-footer">
               {!! Form::submit('Update mark', ['class' => 'btn btn-w-m btn-primary btn-lg']) !!}
               {!! Form::close() !!}
           </div>
       </div>
   </div>
</div> 
@endforeach

@endforeach

<!-- ADD BLOCK BUTTON -->

<div class="row">
  <div class="col-lg-offset-2 col-lg-10">
    <button class="btn btn-primary btn-circle" type="button" data-toggle="modal" data-target="#addblock">
      <i class="fa fa-plus"></i>
    </button>
  </div>
</div>                
   
<input class="hidden" value="{{ $blocks->all()->last()->id }}" id="blockcount">
<input class="hidden" value="{{ $marks->all()->last()->id }}" id="markcount">

  <!-- ADD BLOCK MODAL --> 

<div class="modal inmodal" id="addblock" tabindex="-1" role="dialog" aria-hidden="true">
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
                                  <option value="1">No group needed</option>
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
                                  <option value="1">No group needed</option>
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
                                  <option value="1">No group needed</option>
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
                                  <option value="1">No group needed</option>
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
          "hideDuration": "10000",
          "timeOut": "7000",
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
         var block_count = document.getElementById('blockcount').value;
          var mark_count = document.getElementById('markcount').value;
          for (var i = 0; i < mark_count; i++) {
            var editor= CodeMirror.fromTextArea(document.getElementById("utm_edit_codearea"+i), {
             lineNumbers: true,
             matchBrackets: true,
             styleActiveLine: true,
             theme:"ambiance"
            });
          }
          for (var i = 0; i < block_count; i++) {
            var editor = CodeMirror.fromTextArea(document.getElementById("codearea"+i), {
             lineNumbers: true,
             matchBrackets: true,
             styleActiveLine: true,
             theme:"ambiance"
            });
            var editor = CodeMirror.fromTextArea(document.getElementById("utm_codearea"+i), {
             lineNumbers: true,
             matchBrackets: true,
             styleActiveLine: true,
             theme:"ambiance"
            });
          }
    });
</script>

@endsection