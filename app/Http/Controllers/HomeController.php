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
        $projects = Project::all();
        return view('landing')->with(array(
            'reviews' => $reviews, 
            'projects' => $projects
        )); 
    }


    public function show($id) {
        $posts = Post::where('id', '!=', $id);
        $post = Post::find($id);
        
        return view('show')->with(array(
            'post'  => $post,
            'posts' => $posts
        ));
    }

    public function forms() {
        $forms = Form::all();

        return view('forms')->with('forms', $forms); 
    }

    public function blog() {
        $posts = Post::all();
        $tags = Tag::all();
        $categories = Category::all();
        return view('blog')->with(array(
                    'posts' => $posts,
                    'tags'  => $tags,
                    'categories' => $categories
        ));
    }
}
