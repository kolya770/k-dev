<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Page;
use \DomDocument;
use \DB;
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
    	$tags = Tag::all();
    	return view('admin.posts.create')->with(array(
            'categories' => $categories,
            'tags' => $tags
        ));
    }

    public function index() {
    	$posts = Post::all();
    	
    	return view('admin.posts.index')->withPosts($posts); 
    }

    public function store(Request $request) {
    	$post = new Post();
        $postCount = count(Post::all());
        $postsPerPageArray = \DB::table('settings')->where('id', '1')->lists('postsPerPage');
        
        $postsPerPage = $postsPerPageArray[0];
        
        if ($postCount % $postsPerPage == 0) {
            $lastPageNumber = Page::all()->last()->number;
            Page::create(['number' => ($lastPageNumber + 1)]);
            $post->page_id = Page::all()->last()->id;
        } else {
            $post->page_id = Page::all()->last()->id;
        }

        if ($post->validate($request->all())) {
            $post->title = $request->get('title');
        	$dom = new DomDocument();
        	libxml_use_internal_errors(true);
    		$dom->loadHtml($request->content);
        
    		$images = $dom->getElementsByTagName('img');
    		
    		// foreach <img> in the submited message
    		foreach($images as $img){
    			$src = $img->getAttribute('src');
    			
    			// if the img source is 'data-url'
    			if (preg_match('/data:image/', $src)) {
    				
    				// get the mimetype
    				preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
    				$mimetype = $groups['mime'];
    				
    				// Generating a random filename
    				$filename = str_random(10);
                    $rootpath = config('uploads.local.directory');
    				$filepath = $rootpath ."/". $filename .".". $mimetype;
    				$post->preview = $filepath;
    				// @see http://image.intervention.io/api/
    				$image = Image::make($src)
    				  // resize if required
    				  /* ->resize(300, 200) */
    				  ->encode($mimetype, 100) 	// encode file to the specified mimetype
    				  ->save(public_path($filepath));
    				
    				$newSrc = asset($filepath);
    				$img->removeAttribute('src');
    				$img->setAttribute('src', $newSrc);
    			} // <!--endif
    		} // <!--endforeach
    		
        	
            $post->content = $dom->saveHTML();
            $post->category_id = $request->category;

            $post->save();
            if ($request->tags) {
                foreach ($request->get('tags') as $tagid) {
                    DB::table('post_tag')->insert([
                        'post_id' => $post->id,
                        'tag_id' => $tagid,
                    ]);
                }
            }
        }
        else {
            // validation failure, get errors
            $errors = $post->errors();
        }
        
        return back()->with('message', 'Post added!');
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

   		return back()->with('message', 'Post updated!');
    }

    public function destroy($id) {
    	$post = Post::find($id);	
    	$post->delete();
    	
    	return back()->with('message', 'Post deleted!');
    }

    public function show($id) {
    	$post = Post::find($id);

    	return view('admin.posts.show')->withPost($post); 
    }
}
