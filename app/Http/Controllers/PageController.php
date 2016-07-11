<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Models\Page;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;
use App\Http\Requests;

class PageController extends Controller
{
    public function show($id) {

    	$page = Page::find($id);
    	$lastpage = Page::all()->last();
    	if ($page->id == $lastpage->id) {
    		$pageAfter = $lastpage;
    		$pagesBefore = Page::where('id', '<', $id)->get();
    		$pageBefore = $pagesBefore->last();
    	} else {
	    	$pageAfter = Page::where('id', '>', $id)->first();
	    	$pagesBefore = Page::where('id', '<', $id)->get();
	    	$pageBefore = $pagesBefore->last();
	    }
    	$posts = $page->posts;
    	$tags = Tag::all();
    	$categories = Category::all();
    	$pages = Page::all();
    	return view('blog')->with(array(
                    'posts' => $posts,
                    'pages' => $pages,
                    'tags'  => $tags,
                    'categories' => $categories,
                    'page' => $page,
                    'pageAfter' => $pageAfter,
                    'pageBefore' => $pageBefore
        ));
    }
}
