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
use App\Models\Site;
use App\Http\Requests;
use \DB;
class CatPageController extends Controller
{
    public function find($id) {
    	$site = Site::where('isActive', '1')->first();
        $postsPerPageArray = DB::table('settings')->where('id', '1')->lists('postsPerPage');
        $postsPerPage = $postsPerPageArray[0];
        $posts = Category::find($id)->posts()->paginate($postsPerPage);
        
        return view('blog')->with(array(
        	'site'=> $site
            'posts' => $posts
        ));

    }
}
