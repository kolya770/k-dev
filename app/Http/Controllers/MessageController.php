<?php
/**
 * Author:      Elizabeth Blyumska
 * DateTime:    17 July 2016 (Sunday) 22:42
 * Description: Controller for storing messages upcoming 
 * from user.
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Http\Requests;
use \Session;

class MessageController extends Controller
{
	public function __construct() {
        $this->middleware('auth');
        $this->middleware('role');
    }
    public function store(Request $request) {
    	$message = new Message();
    	$message->name = $request->get('name');
    	$message->email = $request->get('email');
    	$message->message = $request->get('message');

    	$message->save();

    	session()->flash('flash_message', 'Your message was succesfully sent!');

    	return back();
    }
}
