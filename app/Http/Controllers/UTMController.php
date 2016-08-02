<?php
/**
 * Author:      Elizabeth Blyumska
 * DateTime:    14:59 01 August 2016 (Monday)
 * Description: 
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UTMValue;
use App\Http\Requests;

class UTMController extends Controller
{
    public function edit($id) {
    	return back();
    }

    public function destroy($id) {
    	$value = UTMValue::find($id);
    	$value->delete();

    	return back()->withMessage('Value was successfully deleted!');
    }
}
