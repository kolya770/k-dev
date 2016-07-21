<?php
/**
 * Author:      Elizabeth Blyumska
 * DateTime:    22:47 17 July 2016 (Sunday)
 * Description: Controller for tags administration.
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Category;
use App\Http\Requests;

class TagController extends Controller
{
    public function index() {
    	return view('admin.tags.index');
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

    public function find($id) {
        $postsPerPageArray = \DB::table('settings')->where('id', '1')->lists('postsPerPage');
        $postsPerPage = $postsPerPageArray[0];
    	$posts = Tag::find($id)->posts()->paginate($postsPerPage);
        $tags = Tag::all();
        $categories = Category::all();

    	return view('blog')->with(array(
            'posts' => $posts, 
            'tags'  => $tags,
            'categories' => $categories
        ));
    }
}
