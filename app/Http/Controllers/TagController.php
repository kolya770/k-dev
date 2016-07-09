<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Http\Requests;

class TagController extends Controller
{
    public function index() {
    	$tags = Tag::all();

    	return view('admin.tags.index')->withTags($tags);
    }

    public function store(Request $request) {
    	$tag = new Tag();
    	$tag->tag_name = $request->get('tag_name');
    	$tag->save();

    	return back()->withMessage('Tag added');
    }

    public function destroy($id) {
    	$tag = Tag::find($id);
    	$tag->delete();

    	return back()->withMessage('Tag deleted');
    }
}
