<?php
/**
 * Author:      Elizabeth Blyumska
 * DateTime:    22:47 17 July 2016 (Sunday)
 * Description: Controller for tags administration.
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Site;
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

    /*
     * @param tag id
     * Method for finding posts by tag id.
     *
     */
    public function find($id) {
        //paginating posts finded
        $site = Site::where('isActive', '1')->first();
        $postsPerPageArray = \DB::table('settings')->where('id', '1')->lists('postsPerPage');
        $postsPerPage = $postsPerPageArray[0];
    	$posts = Tag::find($id)->posts()->paginate($postsPerPage);

    	return view('blog')->with(array(
            'posts' => $posts, 
            'site' => $site
        ));
    }
}
