<?php
/**
 * Author:      Elizabeth Blyumska
 * DateTime:    14:33 02 August 2016 (Tuesday)
 * Description: Controller for managing different site configurations (
 * meta-tags, etc.)
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Site;
use App\Http\Requests;

class ConfigController extends Controller
{
    public function index() {
    	return view('admin.config');
    }

    public function store(Request $request) {
    	$site = new Site($request->all());
    	$site->isActive = false;
    	$site->save();

    	return back()->withMessage('Site configuration saved successfully!');
    }

    public function choose(Request $request) { 
    	$allSites = Site::all();
    	foreach($allSites as $site) { 
    		$site->isActive = false;
    		$site->save();
    	}
    	$activesite = Site::find($request->site);
    	$activesite->isActive = true;
    	$activesite->save();
    	return back();
    }

    public function destroy($id) {
    	$site = Site::find($id);
    	$site->delete();

    	return back()->withMessage('Site was successfully deleted!');
    }

    public function update(Request $request, $id) {
    	$site = Site::find($id);
    	$site->update($request->all());

    	return back()->withMessage('Site was successfully updated!');
    }
}
