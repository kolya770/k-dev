<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category as Category;
use App\Models\Tag;
use App\Http\Requests;

class CatPageController extends Controller
{
    public function find($id)		
	{
		$posts = Category::find($id)->posts;
		$tags = Tag::all();
		$categories = Category::all();

		return view('blog')->with(array(
            'posts' => $posts, 
            'tags'  => $tags,
            'categories' => $categories
        ));

	}
}
