<?php
/**
 * Author:      Elizabeth Blyumska
 * DateTime:    14:59 01 August 2016 (Monday)
 * Description: Method for managing UTM. Each UTM is tied to content with content_id.
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UTM;
use App\Models\Content;
use App\Http\Requests;
use Intervention\Image\ImageManagerStatic as Image;
use \DomDocument;

class UTMController extends Controller
{


    public function index() {
    	return view('admin.content.utm');
    }

    /*
     * Method for storing new UTMs. 
     */
    public function store(Request $request) {
        //First, we create new UTM and new Content objects.
    	$utm = new UTM();
    	$content = new Content();
        //Get from request everything we can get at once.
    	$utm->utm_name = $request->get('utm_name');
    	$utm->utm_value = $request->get('utm_value');
    	$utm->block_id = $request->get('block');
    	$content->type = $type = $request->get('type'); 
        //Then, variations. If content type is image, we save it as image.
    	if ($type == 'image') {
    		$root = $_SERVER['DOCUMENT_ROOT'] . "/img/"; 
            $file = $request->file('content');
            $f_name = $file->getClientOriginalName();
            $file->move($root, $f_name);
            $content->value = 'img/' . $f_name;

    	} elseif ($type == 'input' || $type == 'code') {
    		$content->value = $request->get('content');
        //special save for Summernote editor - we save all images
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
    				  ->encode($mimetype, 100) 	// encode file to the specified mimetype
    				  ->save(public_path($filepath));
    				
    				$newSrc = asset($filepath);
    				$img->removeAttribute('src');
    				$img->setAttribute('src', $newSrc);
    			} // <!--endif
    		} // <!--endforeach	
            $content->value = $dom->saveHTML();
    	}
    	$content->save();
    	$utm->content_id = $content->id;
    	$utm->save();
    	return back()->withMessage('UTM successfully saved!');
    }

    public function destroy($id) {
    	$mark = UTM::find($id);
    	$mark->delete();

    	return back()->withMessage('UTM was successfully deleted!');
    }

    /*
     * Update method - practically similar to store method with slight 
     * differences.
     */
    public function update(Request $request, $id) {
        $mark = UTM::find($id);
        $mark->utm_name = $request->get('utm_name');
        $mark->utm_value = $request->get('utm_value');
        $content = Content::find($mark->content_id);
        if ($content->type == 'input' || $content->type == 'code') {
            $content->value = $request->get('content');
        } elseif ($content->type == 'image') {
            $root = $_SERVER['DOCUMENT_ROOT'] . "/img/"; 
            $file = $request->file('content');
            $f_name = $file->getClientOriginalName();
            $file->move($root, $f_name);
            $content->value = 'img/' . $f_name;
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
        $mark->save();

        return back()->withMessage('Mark was successfully updated!');
    }
}
