<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Image;
use App\Http\Requests;

class ProjectController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('role');
    }

    public function create() {
    	return view('admin.projects.create');
    }

    public function index() {
    	$projects = Project::all();

    	return view('admin.projects.index')->with('projects', $projects);
    }

    public function destroy($id) {
    	$project = Project::find($id);
    	$project->delete();

    	return back()->with('message', 'Project deleted');
    }

    public function imageStore(Request $request)
    {
        $projectId = $request->get('project_id');
        $project = Project::find($projectId);
        $project->main_image_id = $request->get('mainImage');
        $project->save();
        $imageDescs = $request->get('desc');
        $imageIds = $request->get('id');
        $i = 0;
        
        foreach ($imageIds as $id) {
            $image = Image::find($id);
            $image->description = $imageDescs[$i];
            $image->save();
            $i++;
        }

        $projects = Project::all();

        return view('admin.projects.index')->with('projects', $projects);
    }

    public function store(Request $request) {
    	$project = new Project();
    	$project->title = $request->get('title');
    	$project->brief = $request->get('brief');
    	$project->description = $request->get('description');
        $project->save();

    	if ($request->file('image')) {
            $root = $_SERVER['DOCUMENT_ROOT'] . "/img/"; 
            $files = $request->file('image');
            $fileCount = count($files);
            $uploadCount = 0;
            foreach($files as $file) {
                $f_name = $file->getClientOriginalName();
                $file->move($root, $f_name);
                $image = new Image();
                $image->path = '/img/' . $f_name;
                $image->project_id = $project->id;
                $image->save();
                $uploadCount++;
            }  
        } 
    	
        if ($uploadCount == $fileCount) {
            $imagesAdded = Image::where('project_id', $project->id)->get();

    	    return view('admin.projects.images')->with(array('images' => $imagesAdded, 'project_id' => $project->id));
        }
        else {
            return back()->withMessage('something happened');
        }
    }
}
