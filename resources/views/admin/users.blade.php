@extends('layouts.admin')

@section('content')
@inject ('users', 'App\Models\User')
<table class = "table table-bordered">
   <caption>All users</caption>   
   <thead>
      <tr>
         <th>id</th>
         <th>username</th>
         <th>email</th>
         <th>roles</th>
         <th></th>
         <th></th>
         <th></th>
      </tr>
   </thead>   
   <tbody>
      @foreach ($users->all() as $user)
      <tr>
         <td>{{$user->id}}</td>
         <td>{{$user->name}}</td>
         <td>{{$user->email}}</td>
         <td>
         @foreach($user->roles as $role) 
         {{$role->name}},
         @endforeach
         </td>
         <td><a class="btn btn-link" href="#">Edit</a></td>

         <td><form method="POST" action="">
					<input type="hidden" name="_method" value="delete"/>
					<input type="hidden" name="_token" value="{{csrf_token()}}"/>
					<input type="submit" class="btn mini blue-stripe" value="Delete"/>
				</form></td>
         <td><div class="btn-group">
               <button data-toggle="dropdown" class="btn btn-default dropdown-toggle">Assign role<span class="caret"></span></button>
                  <ul class="dropdown-menu">
                     @if (Auth::User()->is('root'))
                     <li><a href="{{action('UserController@assignRole', ['id' => $user->id, 'role' => 2])}}">Admin</a></li>
                     <li><a href="{{action('UserController@assignRole', ['id' => $user->id, 'role' => 1])}}">Root</a></li>
                     @endif
                     <li><a href="{{action('UserController@assignRole', ['id' => $user->id, 'role' => 3])}}">User</a></li> 
                  </ul>
            </div>

         </td>
      </tr>
      @endforeach   
   </tbody>	
</table>
@endsection