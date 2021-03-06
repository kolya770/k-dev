<?php
/**
 * Author:      Elizabeth Blyumska
 * DateTime:    21 July 2016 (Thursday) 17:48
 * Description: User controller for administrating users; assigning 
 * roles to them.
 */

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

    	return view('admin.users');
    }

    public function edit($id) {
    	
    	return back();
    }

    public function destroy($id) {
    	$user = User::find($id);
    	$user->delete();

    	return back()->withMessage('User deleted!');
    }

    /*
     * You can assign and revoke roles from user. Root user can assign users, 
     * roots and admins; admin user can assign admins and users. Root user can 
     * revoke any role.
     */
    public function assignRole($id, $role) {
        $user = User::find($id);
        $user->assignRole($role);
        
        return back()->withMessage('Role assigned!');
    }

    public function revokeRole($id, $role) {
        $user = User::find($id);
        $user->revokeRole($role);
        
        return back()->withMessage('Role revoked!');
    }
}
