@extends('layouts.admin')
@section ('css')
  <!-- Toastr style -->
{!! Html::style('admin/css/plugins/toastr/toastr.min.css') !!}
@endsection
@section ('title')
Users
@endsection
@section('content')
@inject ('users', 'App\Models\User')
<div class="ibox float-e-margins">
<div class="ibox-title">
All users
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
            <th>Username</th>
            <th>Email</th>
            <th>Roles</th>
            <th></th>
            <th></th>
            <th></th>
         </tr>
      </thead>   
      <tbody>
         @foreach ($users->all() as $user)
         <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
            @foreach($user->roles as $role) 
            {{ $role->name }},
            @endforeach
            </td>   
            <td>
               <form method="POST" action="{{ action('UserController@destroy', ['users'=>$user->id]) }}">
   					<input type="hidden" name="_method" value="delete"/>
   					<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
   					<input type="submit" class="btn btn-danger" value="Delete"/>
   				</form>
            </td>
            <td>
               <div class="btn-group">
                  <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Assign role <span class="caret"></span></button>
                     <ul class="dropdown-menu">
                        @if (Auth::User()->is('root'))
                        <li><a href="{{ action('UserController@assignRole', ['id' => $user->id, 'role' => 2]) }}">Admin</a></li>
                        <li><a href="{{ action('UserController@assignRole', ['id' => $user->id, 'role' => 1]) }}">Root</a></li>
                        @endif
                        <li><a href="{{ action('UserController@assignRole', ['id' => $user->id, 'role' => 3]) }}">User</a></li> 
                     </ul>
               </div>
            </td>
            @if (Auth::User()->is('root'))
            <td>
               <div class="btn-group">
                  <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Revoke role <span class="caret"></span></button>
                     <ul class="dropdown-menu">
                     @foreach ($user->roles as $role) 

                        <li><a href="{{ action('UserController@revokeRole', ['id' => $user->id, 'role' => $role->id]) }}">{{ $role->name }}</a></li>
                     @endforeach
                     </ul>
               </div>
            </td>
            @endif
         </tr>
         @endforeach   
      </tbody>	
   </table>
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