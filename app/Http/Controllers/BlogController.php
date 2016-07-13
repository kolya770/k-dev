<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \DB;
use App\Http\Requests;

class BlogController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
        $this->middleware('role');
    }

    public function index()
    {
    	return view('admin.settings');
    }

    public function store(Request $request)
    {
    	DB::table('settings')
            ->where('id', 1)
            ->update(['postsPerPage' => $request->get('posts_per_page')]);

        return back()->withMessage('Settings saved');
    }
}
