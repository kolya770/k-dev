<?php
/**
 * Author:      Elizabeth Blyumska
 * DateTime:    19:36 02 August 2016 (Tuesday)
 * Description: Controller for managing blocks of content. Each block is tied 
 * to content with content_id and to a group with grouo_id.
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Block;
use App\Models\Group;
use App\Models\Content;
use App\Http\Requests;
use Intervention\Image\ImageManagerStatic as Image;
use \DomDocument;

class BlockController extends Controller
{
    public function index() {
        return view('admin.content.blocks');
    }

    public function destroy($id) {
        $block = Block::find($id);
        $content = Content::where('id', $block->content_id)->first();
        $content->delete();
        $block->delete();
        
        return back()->withMesssage('Block deleted successfully!');
    }

    public function store(Request $request) {
        $content = new Content();
        $block = new Block();

        $block->name = $request->get('name');
        $block->group_id = $request->get('group');  
        $content->type = $request->get('type');

        //if content type is usual, we save it as it is
        if ($request->get('type') == 'input' || $request->get('type') == 'code') {
            $content->value = $request->get('content');
        }
        //but if content type is image, we have to save the image separately
        elseif ($request->hasFile('content')) {
            $root = $_SERVER['DOCUMENT_ROOT'] . "/img/"; 
            $file = $request->file('content');
            $f_name = $file->getClientOriginalName();
            $file->move($root, $f_name);
            $content->value = 'img/' . $f_name;
        //same with summernote, special store for images
        } else {
            $dom = new DomDocument();
            libxml_use_internal_errors(true);
            $dom->loadHtml($request->get('content'));
        
            $images = $dom->getElementsByTagName('img');
            
            // foreach <img> in the submited message
            foreach($images as $img) {
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
                    
                    // @see http://image.intervention.io/api/
                    $image = Image::make($src)
                      // resize if required
                      /* ->resize(300, 200) */
                      ->encode($mimetype, 100)  // encode file to the specified mimetype
                      ->save(public_path($filepath));
                    
                    $newSrc = asset($filepath);
                    $img->removeAttribute('src');
                    $img->setAttribute('src', $newSrc);
                } // <!--endif
            } // <!--endforeach 
            $content->value = $dom->saveHTML();
        }
        $content->save();
        $block->content_id = $content->id;
        $block->utm_content_id = $content->id;
        $block->save();

        return back()->withMesssage('Your content block was succesfully saved!');
    }

    public function update(Request $request, $id) {
        $block = Block::find($id);
        $content = $block->content;

        $block->name = $request->get('name');
        $block->group_id = $request->get('group');  
        $content->type = $request->get('type');

        if ($request->get('type') == 'input' || $request->get('type') == 'code') {
            $content->value = $request->get('content');
        }
        elseif ($request->hasFile('content')) {
            $root = $_SERVER['DOCUMENT_ROOT'] . "/img/"; 
            $file = $request->file('content');
            $f_name = $file->getClientOriginalName();
            $file->move($root, $f_name);
            $content->value = 'img/' . $f_name;
        //same with summernote, special store for images
        } else {
            $dom = new DomDocument();
            libxml_use_internal_errors(true);
            $dom->loadHtml($request->get('content'));
        
            $images = $dom->getElementsByTagName('img');
            
            // foreach <img> in the submited message
            foreach($images as $img) {
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
                    
                    // @see http://image.intervention.io/api/
                    $image = Image::make($src)
                      // resize if required
                      /* ->resize(300, 200) */
                      ->encode($mimetype, 100)  // encode file to the specified mimetype
                      ->save(public_path($filepath));
                    
                    $newSrc = asset($filepath);
                    $img->removeAttribute('src');
                    $img->setAttribute('src', $newSrc);
                } // <!--endif
            } // <!--endforeach 
            $content->value = $dom->saveHTML();
        }
        $content->save();
        $block->content_id = $content->id;
        $block->save();

        return back()->withMesssage('Your content block was succesfully updated!');
    }
}
