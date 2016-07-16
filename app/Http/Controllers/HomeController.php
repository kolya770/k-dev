<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Post;
use App\Models\Form;
use App\Models\Field;
use App\Models\Review;
use App\Models\Project;
use App\Models\Tag;
use App\Models\Category;
use App\Models\Page;
use \DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $reviews = Review::all();
        //now we need to determine which projects are to show. 
        $projects = array();
        for ($i = 1; $i < 4; $i++) {
            $prarray = DB::table('settings')->where('id', '1')->lists('project_' . $i . '_id');
            $projects[] = Project::find($prarray[0]); 
        }
        //and what post
        $post_array = DB::table('settings')->where('id', '1')->lists('post_id');
        $post = Post::find($post_array[0]);
        
        return view('landing')->with(array(
            'reviews' => $reviews, 
            'projects' => $projects,
            'post' => $post
        )); 
    }


    public function show($id) {
        $posts = Post::where('id', '!=', $id);
        $post = Post::find($id);
        $tags = Tag::all();
        $categories = Category::all();

        return view('show')->with(array(
            'post'  => $post,
            'posts' => $posts,
            'tags'  => $tags,
            'categories' => $categories
        ));
    }

    public function forms() {
        $forms = Form::all();

        return view('forms')->with('forms', $forms); 
    }

    public function blog() {
        $postsPerPageArray = \DB::table('settings')->where('id', '1')->lists('postsPerPage');
        $postsPerPage = $postsPerPageArray[0];
        
        $posts = Post::paginate($postsPerPage);
        $tags = Tag::all();
        
        $categories = Category::all();
        return view('blog')->with(array(
                    'posts' => $posts,
                    
                    'tags'  => $tags,
                    'categories' => $categories
        ));
    }
}
