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
        /*
         * Отлавливание меток. Работает таким образом: у каждого блока есть 
         * ссылка на свой контент и на ютм-контент. В начале у каждого блока  
         * эти ссылки одинаковые. Если мы отлавливаем метку, то мы подменяем
         * ссылку-ютм на ссылку из метки. Таким образом, контент из блока 
         * подменяется на контент из метки.
         *
         * Catching marks. Each of blocks has two fields - content_id, 
         * utm_content_id, both of them pointing to a same content at first. 
         * When caught, the second link is changed to the link to mark 
         * content. 
         */
        $all_blocks = Block::all();
        foreach($all_blocks as $block) {
            $block->utm_content_id = $block->content_id;
            $block->save();
        }
        $site = Site::where('isActive', '1')->first();
        $all_marks = UTM::all();
        if (count($all_marks) > 0) {
            foreach($all_marks as $mark) {
                if (Input::get($mark->utm_name) == $mark->utm_value) {
                    $block = Block::find($mark->block_id);
                    $block->utm_content_id = $mark->content_id;
                    $block->save();
                }
            }
        }
        $header_value = Block::where('name', 'header')->first()->utm_content->value;
        $image = Block::where('name', 'header_image')->first()->utm_content->value;

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

    public function forms() {
        return view('forms'); 
    }
}
