<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Http\Requests;

class CommentController extends Controller
{
    public function store(Request $request) {
    	$comment = new Comment();
    	
    	$comment->name = $request->get('name');
    	$comment->email = $request->get('email');
    	$comment->comment = $request->get('comment');
    	$comment->post_id = $request->get('post_id');

    	$comment->save();

    	return back()->withMessage('Comment added.');
    }

    public function destroy($id) {
        $comment = Comment::find($id);
        $comment->delete();

        return back()->withMessage('Comment deleted.'); 
    }

    public function show($id) {
        return back();
    }
}
