<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Http\Requests;

class MessageController extends Controller
{
    public function store(Request $request) {
    	$message = new Message();
    	$message->name = $request->get('name');
    	$message->email = $request->get('email');
    	$message->message = $request->get('message');

    	$message->save();

    	return back();
    }
}
