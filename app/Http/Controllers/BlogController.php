<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \DB;
use App\Http\Requests;
use App\Models\Project;

class BlogController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
        $this->middleware('role');
    }

    public function index()
    {
        $projects = Project::all();

    	return view('admin.settings')->with(array(
                'projects' => $projects
            ));
    }

    public function store(Request $request)
    {
    	DB::table('settings')
            ->where('id', 1)
            ->update(['postsPerPage' => $request->get('posts_per_page')]);
        DB::table('settings')
            ->where('id', 2)
            ->update(['project_id' => $request->get('project_id')]);
        return back()->withMessage('Settings saved');
    }
}
