<?php

/**
 * Author:      Elizabeth Blyumska
 * DateTime:    14:42 01 August 2016 (Monday)
 * Description: Controller for managing multilanding purposes. 
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UTMValue;
use App\Http\Requests;

class ScreenController extends Controller
{
    public function index() {
    	return view('admin.first');
    }

    public function store(Request $request)  {
    	return back();
    }

    /*
     * Method for storing new UTM values from user. 
     * @param request
     */
    public function storeUTM(Request $request) {
    	$value = new UTMValue();

    	$value->value = $request->get('value');
    	$value->utm_value = $request->get('utm_value');
    	$value->mark_id = $request->get('mark');
    	$value->save();

    	return back()->withMessage('UTM Mark successfully saved!');
    }
    
}
