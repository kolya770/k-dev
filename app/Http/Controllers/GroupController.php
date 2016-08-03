<?php
/**
 * Author:      Elizabeth Blyumska
 * DateTime:    19:35 02 August 2016 (Tuesday)
 * Description: Controller for managing groups of blocks.
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Http\Requests;

class GroupController extends Controller
{
    public function index() {
    	return view('admin.content.groups');
    }

    public function destroy($id) {
    	$group = Group::find($id);
    	$group->delete();

    	return back()->withMessage('Group was successfully deleted!');
    }

    public function store(Request $request) {
    	$group = new Group($request->all());
    	$group->save();

    	return back()->withMessage('Group was successfully saved!');
    }

    public function update(Request $request, $id) {
    	$group = Group::find($id);
    	$group->update($request->all());

    	return back()->withMessage('Group was successfully updated!');
    }
}
