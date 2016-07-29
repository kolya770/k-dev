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
            <li><a href="{{ action('PostController@edit', ['posts'=>$post->id]) }}">Edit</a>
            </li>
            <li><form method="POST" action="{{ action('PostController@destroy', ['posts'=>$post->id]) }}">
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
@endsection