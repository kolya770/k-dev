<?php
/**
 * Author:      Elizabeth Blyumska
 * DateTime:    19:36 02 August 2016 (Tuesday)
 * Description: Controller for managing blocks of content.
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Block;
use App\Models\Group;
use App\Models\Content;
use App\Http\Requests;

class BlockController extends Controller
{
    public function index() {
    	return view('admin.content.blocks');
    }

    public function destroy($id) {
    	$block = Block::find($id);
    	$content = Content::where('id', $block->content_id)->first();
    	$content->delete();
    	$block->delete();
    	
    	return back()->withMesssage('Block deleted successfully!');
    }

    public function store(Request $request) {
    	$content = new Content();
		$block = new Block();
		$block->name = $request->get('name');
		$block->group_id = $request->get('group'); 	
		$content->type = $request->get('type');
    	if ($request->get('type') == 'input' || $request->get('type') == 'code') {
	    	$content->value = $request->get('content');
	    	$content->save();
	    	$block->content_id = $content->id;  	
	    }
	    elseif ($request->hasFile('content')) {
	    	$root = $_SERVER['DOCUMENT_ROOT'] . "/img/"; 
            $file = $request->file('content');
            $f_name = $file->getClientOriginalName();
            $file->move($root, $f_name);
            $content->value = 'img/' . $f_name;
            $content->save();
            $block->content_id = $content->id;
	    }
		$block->save();
    	return back()->withMesssage('Your content block was succesfully saved!');
    }
}
