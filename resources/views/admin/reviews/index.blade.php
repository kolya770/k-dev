@extends('layouts.admin')
@section ('title')
All reviews
@endsection
@section('content')
@inject ('reviews', 'App\Models\Review')
<div class="ibox float-e-margins">
   <div class="ibox-title"> 
      <h5>Reviews</h5>
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
         <th>Author name</th>
         <th>Author job</th>
         <th>Preview</th>
         <th></th>
         <th></th>
         <th></th>
      </tr>
   </thead>   
   <tbody>

                            
      @foreach ($reviews->all() as $review)
      <tr>
         <td>{{ $review->id }}</td>
         <td>{{ $review->author_name }}</td>
         <td>{{ $review->author_job }}</td>
         <td><img src="{{ $review->preview }}" class="img-circle" width="50px"></td>
         <td> <button type="button" class="btn btn-success" data-toggle="modal" data-target="#{{ 'modal' . $review->id }}">Show</button></td>
         <td><a href="{{ action('ReviewController@edit', ['reviews'=>$review->id]) }}"><button class="btn btn-primary">Edit</button></a></td>

         <td><form method="post" action="{{ action('ReviewController@destroy', ['reviews'=>$review->id]) }}">
					<input type="hidden" name="_method" value="delete"/>
					<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
					<input type="submit" class="btn btn-danger" value="Delete"/>
				</form></td>
      </tr>
      <div class="modal inmodal" id="{{ 'modal' . $review->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content animated bounceInRight">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <center>
                                            <img src="{{ $review->preview }}" class="img-circle">
                                            </center>
                                            <h4 class="modal-title">{{ $review->author_name }}</h4>
                                            <h5>
                                               {{ $review->author_job }}
                                            </h5>           
                                        </div>
                                        <div class="modal-body">
                                          <center>
                                            <p>
                                            {{ $review->review }}
                                            </p>
                                            </center>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
      @endforeach   
   </tbody>	
</table>

</div>
</div>
@if (Session::has('message')) 
   <div class="alert alert-success">
         {{ Session::get('message') }}
   </div>
@endif
@endsection