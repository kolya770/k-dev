@extends('layouts.admin')

@section ('title')
All posts
@endsection
@section('content')
@inject ('posts', 'App\Models\Post')
<div class="ibox float-e-margins">
   <div class="ibox-title"> 
      <h5>Posts</h5>
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
            <th>Title</th>
            <th>Image</th>
            <th>Category</th>
            <th></th>
            <th></th>
            <th></th>
         </tr>
      </thead>   
      <tbody>
         @foreach ($posts->all() as $post)
         <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->title }}</td>
            <td><img src="{{ '/'.$post->preview }}" width="100px"></td>
            <td>{{ $post->category->title }}</td>
            <td><a href="{{ action('PostController@show', ['posts'=>$post->id]) }}"><button class="btn btn-success">Show</button></a>
            <td><a href="{{ action('PostController@edit', ['posts'=>$post->id]) }}"><button class="btn btn-primary">Edit</button></a></td>

            <td><form method="POST" action="{{ action('PostController@destroy', ['posts'=>$post->id]) }}">
   					<input type="hidden" name="_method" value="delete"/>
   					<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
   					<input type="submit" class="btn btn-danger" value="Delete"/>
   				</form></td>
         </tr>
         @endforeach   
      </tbody>	
   </table>
   </div>
</div>
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
@endsection