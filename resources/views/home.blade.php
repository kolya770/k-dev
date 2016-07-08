@extends('layouts.app')

@section('content')
@foreach($posts as $post)
<div class="row">
                <div class="col-lg-6">
                    <div class="panel blank-panel">

                        <div class="panel-heading">
                            <div class="panel-title m-b-md"><h4><a href="{{action('HomeController@show',['id'=>$post->id])}}">{!!$post->title!!}</a></h4></div>        
                        </div>
                        <div class="panel-body">                          
                            {!!$post->content!!} 
                        </div>
                    </div>
                </div>
</div>
@endforeach

@endsection
