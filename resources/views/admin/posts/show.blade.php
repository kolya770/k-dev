@extends('layouts.admin')
@section ('title')
    {{ $post->title }}
@endsection
@section('content')
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            {{ $post->updated_at }}
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-wrench"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="{{ action('PostController@edit', ['posts'=>$post->id]) }}">Edit</a></li>
                    <li>
                        <form method="POST" action="{{ action('PostController@destroy', ['posts'=>$post->id]) }}">
                            <input type="hidden" name="_method" value="delete"/>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                            <input type="submit" class="btn btn-link" value="Delete"/>
                        </form>
                    </li>
                </ul>
                <a class="close-link">
                    <i class="fa fa-times"></i>
                </a>
            </div>
        </div>
        <div class="ibox-content">
            <img src="{{ '/'.$post->preview }}">
            <hr>
            {!! $post->content !!}
            <hr>
            <h5>Category: </h5>{{ $post->category->title }}
            <hr>
            <h5>Tags: </h5>
            @foreach($post->tags as $tag)
                {{ $tag->tag_name }}
            @endforeach
        </div>
    </div>
    @foreach ($blocks->all() as $block)
        <div class="modal inmodal" id="{{ "editblock".$block->id }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content animated bounceInRight">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
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
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Group</label>
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
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Group</label>
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
                                    <img src="{{ '/'.$block->content->value }}" style="max-width: 200px; border: 1px solid #dddddd; padding: 4px; border-radius: 5px">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-3 ">
                                    <label class="btn btn-success btn-file">
                                        Browse image
                                        <input type="file" name="content" style="display: none;" >
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Group</label>
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
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Group</label>
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
@endsection