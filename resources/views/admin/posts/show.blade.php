@extends('layouts.admin')

@section('content')
<div class="row">
                <div class="col-lg-6">
                    <div class="panel blank-panel">

                        <div class="panel-heading">
                            <div class="panel-title m-b-md"><h4>{{$post->title}}</h4></div>        
                        </div>
                        <div class="panel-body">                          
                            {!!$post->content!!}
                        </div>
                    </div>
                </div>
</div>

@endsection