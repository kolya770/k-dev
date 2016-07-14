<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Http\Requests;
use \Session;

class MessageController extends Controller
{
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
