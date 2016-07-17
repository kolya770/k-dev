<?php
/**
 * Author:      Elizabeth Blyumska
 * DateTime:    17 July 2016 (Sunday) 22:45
 * Description: Controller made specially for finding posts 
 * by category.
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category as Category;
use App\Models\Tag;
use App\Http\Requests;

class CatPageController extends Controller
{
    public function find($id) {
		$postsPerPageArray = \DB::table('settings')->where('id', '1')->lists('postsPerPage');
        $postsPerPage = $postsPerPageArray[0];
    	$posts = Category::find($id)->posts()->paginate($postsPerPage);
		
		$tags = Tag::all();
		$categories = Category::all();

		return view('blog')->with(array(
            'posts' => $posts, 
            'tags'  => $tags,
            'categories' => $categories
        ));

	}
}
