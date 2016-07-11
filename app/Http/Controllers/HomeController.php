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
        $post = Post::find(1);
        $reviews = Review::all();
        $projects = Project::all();
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
        $page = Page::find(1);
        $posts = $page->posts;
        $tags = Tag::all();
        $pages = Page::all();
        $pageAfter = Page::where('id', '>', '1')->first();
        $pageBefore = $page;
        $categories = Category::all();
        return view('blog')->with(array(
                    'posts' => $posts,
                    'page' => $page,
                    'pages' => $pages,
                    'tags'  => $tags,
                    'categories' => $categories,
                    'pageAfter' => $pageAfter,
                    'pageBefore' => $pageBefore
        ));
    }
}
