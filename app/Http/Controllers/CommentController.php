<?php
/**
 * Author:      Elizabeth Blyumska
 * DateTime:    12:12 17 July 2016 (Sunday)
 * Description: Controller for user comments.
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Http\Requests;

class CommentController extends Controller
{
    public function store(Request $request) {   	
        $comment = new Comment();

    	if ($comment->validate($request->all())) {
        	$comment->name = $request->get('name');
        	$comment->email = $request->get('email');
        	$comment->comment = $request->get('comment');
        	$comment->post_id = $request->get('post_id');
        	$comment->save();
        } else {
            // validation failure, get errors
            $errors = $comment->errors();

            return back()->with('errors', $errors);
        }

        return back()->withMessage('Comment added.');
    }

    public function destroy($id) {
        $comment = Comment::find($id);
        $comment->delete();

        return back()->withMessage('Comment deleted.'); 
    }
}
