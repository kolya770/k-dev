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
        $projectIds = $request->get('projects');
        if (count($projectIds) != 3)
            return back()->with('alert_message', 'Please, choose 3 projects to show');
        DB::table('settings')
            ->where('id', 1)
            ->update(['project_1_id' => $projectIds[0]]);
        DB::table('settings')
            ->where('id', 1)
            ->update(['project_2_id' => $projectIds[1]]);
        DB::table('settings')
            ->where('id', 1)
            ->update(['project_3_id' => $projectIds[2]]);
        return back()->withMessage('Settings saved');
    }
}
