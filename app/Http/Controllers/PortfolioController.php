<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Http\Requests;

class PortfolioController extends Controller
{
    public function index() {
    	$projects = Project::all();
    	
    	return view('portfolio')->with('projects', $projects);
    }

    public function show($id) {
    	$project = Project::find($id);

    	return view('portfolio-item')->with('project', $project);
    }
}
