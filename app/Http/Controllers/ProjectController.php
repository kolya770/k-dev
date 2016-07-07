<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Http\Requests;

class ProjectController extends Controller
{
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

    public function store(Request $request) {
    	$project = new Project();
    	$project->title = $request->get('title');
    	$project->brief = $request->get('brief');
    	$project->description = $request->get('description');

    	if ($request->file('image')) {
            $root = $_SERVER['DOCUMENT_ROOT'] . "/img/"; 
            $f_name = $request->file('image')->getClientOriginalName();
            $request->file('image')->move($root, $f_name);
            $project->image = "/img/" . $f_name;
         }   
    	$project->save();

    	return back()->with('message', 'Project saved');
    }

}
