<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \DB;
use App\Http\Requests;
use App\Models\Project;
use App\Models\Post;

class SettingsController extends Controller
{
    public function __construct() {
    	$this->middleware('auth');
        $this->middleware('role');
    }

    public function index() {
        
    	return view('admin.settings');
    }

    public function store(Request $request) {
        if ($request->get('posts_per_page')) {
        	DB::table('settings')
                ->where('id', 1)
                ->update(['postsPerPage' => $request->get('posts_per_page')]);
        }
        if ($request->get('projects')) {
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
        }

        if ($request->get('blog_id')) {
            DB::table('settings')
                ->where('id', 1)
                ->update(['post_id' => $request->get('blog_id')]);
        }
        return back()->withMessage('Settings saved');
    }
}
