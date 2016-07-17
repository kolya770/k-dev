<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
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
}
