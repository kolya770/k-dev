<?php
/**
 * Author:      Elizabeth Blyumska
 * DateTime:    17 July 2016 (Sunday) 12:16
 * Description: Controller for administrating projects.
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Image;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
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
    	return view('admin.projects.index');
    }

    public function destroy($id) {
    	$project = Project::find($id);
    	$images = Image::where('project_id', $id)->get();
        foreach ($images as $image) {
            $image->delete();
        }  
        $project->delete();

    	return back()->with('message', 'Project deleted');
    }

    public function edit($id) {
        $project = Project::find($id);
        $images = Image::where('project_id', $id)->get();
        $main_image = $project->images()->where('id', $project->main_image_id)->get()[0];

        return view('admin.projects.edit')->with(array(
            'project' => $project,
            'images' => $images,
            'main_image' => $main_image
        ));
    }

    /**
     * Method for storing new projects. Firstly, we create 
     * a project without main image id. Then, we pass all 
     * our images, already created and saved paths to 
     * a special view, where a user defines the main image
     * and adds some description.
     */
    public function store(Request $request) {
        $project = new Project();
        $project->title = $request->get('title');
        $project->brief = $request->get('brief');
        $project->description = $request->get('description');
        if ($request->hasFile('image')) {
            $project->save();
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
        } else {
            return back()->with('alert', 'Please add some images!');
        } 
        
        if ($uploadCount == $fileCount) {
            $imagesAdded = Image::where('project_id', $project->id)->get();

            return view('admin.projects.images')->with(array('images' => $imagesAdded, 'project_id' => $project->id));
        }
        else {
            return back()->with('alert', 'Something happened');
        }
    }

    /**
     * Method for storing project main image and image 
     * descriptions got from special 'admin.project.images'
     * view.
     */

    public function imageStore(Request $request) {
        $projectId = $request->get('project_id');
        $project = Project::find($projectId);
        if ($request->has('mainImage')) {
            $project->main_image_id = $request->get('mainImage');
            $project->save();
        }
        else {
            $imagesAdded = Image::where('project_id', $project->id)->get();

            return view('admin.projects.images')->with(array('images' => $imagesAdded, 'project_id' => $project->id, 'alert' => 'Please, choose main image!'));
            
        }
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

    /**
     * Method for updating projects already posted.
     * TODO: some images bugs
     */
    public function update(Request $request, $id) {
        $project = Project::find($id);
        $project->update($request->all());
        $project->save();
        if ($request->hasFile('image')) {
            Image::where('project_id', $id)->delete();
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
            if ($uploadCount == $fileCount) {
                $imagesAdded = Image::where('project_id', $project->id)->get();

                return view('admin.projects.images')->with(array(
                    'images' => $imagesAdded, 
                    'project_id' => $project->id
                ));
            } 
        } else if (count(Image::where('project_id', $project->id)->get()) != 0) {
                $imagesAdded = Image::where('project_id', $project->id)->get();

                return view('admin.projects.images')->with(array(
                    'images' => $imagesAdded, 
                    'project_id' => $project->id
                ));
            } else {
                return back()->withMessage('Please, add some images!');
        }
    }
}
