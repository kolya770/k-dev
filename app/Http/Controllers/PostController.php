<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Http\Requests;
use Intervention\Image\ImageManagerStatic as Image;

class PostController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
        $this->middleware('role');
    }

    public function create() {
    	$categories = Category::all();
    	
    	return view('admin.posts.create')->withCategories($categories);
    }

    public function index() {
    	$posts = Post::all();
    	
    	return view('admin.posts.index')->withPosts($posts); 
    }

    public function store(Request $request) {
    	$this->validate($request, [
            'title'   => 'required',
            'content' => 'required',
            'preview' => 'mimes:jpeg,bmp,png,jpg'
        ]);

    	$post = new Post();
        $post->title = $request->get('title');
    	$dom = new \DomDocument();
    	libxml_use_internal_errors(true);
		$dom->loadHtml($request->content);//, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    
		$images = $dom->getElementsByTagName('img');
		
		
		// foreach <img> in the submited message
		foreach($images as $img){
			$src = $img->getAttribute('src');
			
			// if the img source is 'data-url'
			if(preg_match('/data:image/', $src)){
				
				// get the mimetype
				preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
				$mimetype = $groups['mime'];
				
				// Generating a random filename
				$filename = uniqid();
				$filepath = "images/$filename.$mimetype";
				$post->preview = $filepath;
				// @see http://image.intervention.io/api/
				$image = Image::make($src)
				  // resize if required
				  /* ->resize(300, 200) */
				  ->encode($mimetype, 100) 	// encode file to the specified mimetype
				  ->save(public_path($filepath));
				
				$new_src = asset($filepath);
				$img->removeAttribute('src');
				$img->setAttribute('src', $new_src);
			} // <!--endif
		} // <!--endforeach
		
    	
        $post->content = $dom->saveHTML();
        $post->category_id = $request->category;
        $post->save();
        
        return back();
    }

    public function edit($id) {
    	$post = Post::find($id);
    	$categories = Category::all();
    	return view('admin.posts.edit')->withPost($post)->withCategories($categories);


    }

    public function update(Request $request, $id) {
    	$post = Post::find($id);
    	$post->update($request->all());

   		$post->save();

   		return back();
    }

    public function destroy($id) {
    	$post = Post::find($id);
    	
    	$post->delete();
    	
    	return back();
    }

    public function show($id) {
    	$post = Post::find($id);

    	return view('admin.posts.show')->withPost($post); 
    }
}
