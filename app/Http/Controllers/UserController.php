<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Http\Requests;

class UserController extends Controller
{

	public function __construct() {
		$this->middleware('auth');
		$this->middleware('role');
	}
    
    public function index() {
    	$users = User::all();
    	
    	return view('admin.users')->withUsers($users);
    }

    public function edit($id) {
    	
    	return back();
    }

    public function destroy($id) {
    	$user = User::find($id);
    	$user->delete();

    	return back();
    }

    public function makeAdmin($id) {
        $user = User::find($id);
        $user->assignRole(Role::where('name','admin')->get()[0]->id);

        return back()->withMessage('Role assigned!');
    }
}
