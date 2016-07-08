@extends('layouts.admin')

@section('content')
<table class = "table table-bordered">
   <caption>All users</caption>   
   <thead>
      <tr>
         <th>id</th>
         <th>username</th>
         <th>email</th>
         
         <th></th>
         <th></th>
      </tr>
   </thead>   
   <tbody>
      @foreach ($users as $user)
      <tr>
         <td>{{$user->id}}</td>
         <td>{{$user->name}}</td>
         <td>{{$user->email}}</td>
         
         <td><a class="btn btn-link" href="#">Edit</a></td>

         <td><form method="POST" action="">
					<input type="hidden" name="_method" value="delete"/>
					<input type="hidden" name="_token" value="{{csrf_token()}}"/>
					<input type="submit" class="btn mini blue-stripe" value="Delete"/>
				</form></td>
      </tr>
      @endforeach   
   </tbody>	
</table>
@endsection