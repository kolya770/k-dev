<?php
/**
 * Author:      Elizabeth Blyumska
 * DateTime:    19:35 02 August 2016 (Tuesday)
 * Description: Controller for managing groups of blocks.
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class GroupController extends Controller
{
    public function index() {
    	return view('admin.content.groups');
    }
}
