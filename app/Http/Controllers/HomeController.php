<?php
/**
 * Author:      Elizabeth Blyumska
 * DateTime:    17 July 2016 (Sunday) 22:46
 * Description: Main controller for landing and blog pages.
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Post;
use App\Models\Project;
use App\Models\UTM;
use App\Models\Site;
use App\Models\Block;
use \DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $site = Site::where('isActive', '1')->first();

        $header_value = Block::where('name', 'header')->first()->content->value;
        $image = 'none';

        //now we need to determine which projects are to show. 
        $projects = array();
        for ($i = 1; $i < 4; $i++) {
            $prarray = DB::table('settings')->where('id', '1')->lists('project_' . $i . '_id');
            $projects[] = Project::find($prarray[0]); 
        }
        //and what post
        $post_array = DB::table('settings')->where('id', '1')->lists('post_id');
        $post = Post::find($post_array[0]);
        
        return view('landing')->with(array( //TODO: redo
            'projects' => $projects,
            'post' => $post,
            'header' => $header_value,
            'image' => $image,
            'site' => $site
        )); 
    }


    public function show($id) {
        $site = Site::where('isActive', '1')->first();
        $posts = Post::where('id', '!=', $id); //TODO: make other posts
        $post = Post::find($id);
        return view('show')->with(array(
            'post'  => $post,
            'site' => $site
        ));
    }

    public function blog() {
        $site = Site::where('isActive', '1')->first();
        $postsPerPageArray = \DB::table('settings')->where('id', '1')->lists('postsPerPage');
        $postsPerPage = $postsPerPageArray[0];      
        $posts = Post::paginate($postsPerPage);

        return view('blog')->with(array(
                    'site' => $site,
                    'posts' => $posts
        ));
    }
}
