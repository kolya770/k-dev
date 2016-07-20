<?php
/**
 * Author:      Elizabeth Blyumska
 * DateTime:    17 July 2016 (Sunday) 22:43
 * Description: Controller for showing portfolio for 
 * visitors.
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Image;
use App\Http\Requests;

class PortfolioController extends Controller
{
    public function index() {
    	$projects = Project::all();
    	$mainImages = array();
    	foreach ($projects as $project) {
    		$mainImages[$project->id] = Image::find($project->main_image_id)->path;
    	}

    	return view('portfolio')->with(array(
    		'projects' => $projects,
    		'mainImages' => $mainImages
    		));
    }

    public function show($id) {
    	$project = Project::find($id);
    	$mainImage = Image::find($project->main_image_id);
        
    	return view('portfolio-item')->with(array(
    		'project' => $project,
    		'mainImage' => $mainImage
    		));
    }
}
