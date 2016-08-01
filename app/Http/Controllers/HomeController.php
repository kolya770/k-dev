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
use App\Models\UTMValue;
use App\Models\UTMMark;
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
        if (Input::has('utm_source')) {
            $source = Input::get('utm_source');
            $header_value = UTMValue::where('utm_value', $source)->first()->value;
        } else {
            $header_value = 'KIEV-DEV';
        }
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
        )); 
    }


    public function show($id) {
        $posts = Post::where('id', '!=', $id); //TODO: make other posts
        $post = Post::find($id);
        return view('show')->with(array(
            'post'  => $post
        ));
    }

    public function blog() {
        $postsPerPageArray = \DB::table('settings')->where('id', '1')->lists('postsPerPage');
        $postsPerPage = $postsPerPageArray[0];      
        $posts = Post::paginate($postsPerPage);

        return view('blog')->with(array(
                    'posts' => $posts
        ));
    }
}
