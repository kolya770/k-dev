<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Post;
use App\Models\Form;
use App\Models\Field;
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
        $posts = Post::all();

        return view('landing'); //('home')->with('posts', $posts);
    }

    public function show($id) {
        $post = Post::find($id);
        
        return view('show')->with('post', $post);
    }

    public function forms() {
        $forms = Form::all();

        return view('forms')->with('forms', $forms); 
    }
}
