<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\Field;
use App\Http\Requests;

class FormController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
        $this->middleware('role');
    }

    public function create() {
    	return view('admin.forms.create');
    }

    public function store(Request $request) {
    	$form = new Form();
    	$form->title = $request->get('title');
    	$form->size = $request->get('size');
    	$form->save();
    	for ($i = 1; $i <= $request->get('size'); $i++) {
    		$field = new Field();
    		$field->question = $request->get('field' . $i);
    		$field->form_id = $form->id;
    		$field->save();
    	}
 		return back();
    }
}
