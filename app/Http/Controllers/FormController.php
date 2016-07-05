<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\Field;
use App\Models\FormAnswer;
use App\Models\FieldAnswer;
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

 		return back()->with('message', 'Form added!');
    }

    public function index() {
    	$formAnswers = FormAnswer::all();
    	
    	return view('admin.forms.answers')->with('formAnswers', $formAnswers);
    }

    public function indexAdmin() {
    	$forms = Form::all();

    	return view('admin.forms.index')->with('forms', $forms);
    }

    public function destroy($id) {
    	$form = Form::find($id);
    	$form->delete();

    	return back()->with('message', 'Form deleted');
    }

    public function edit($id) {
    	$form = Form::find($id);

    	return view('admin.forms.edit')->with('form', $form);
    }

    public function update(Request $request, $id) {
    	$form = Form::find($id);

    	$form->title = $request->get('title');
    	$form->size = $request->get('size');
    	$form->save();
    	$i = 1;
    	foreach($form->fields as $f) {
    		$f->question = $request->get('field' . $i);
 			$f->save();
 			$i++;
    	}
    	for ($k = $i; $k <= $request->get('size'); $k++) {
    		$field = new Field();
    		$field->question = $request->get('field' . $k);
    		$field->form_id = $form->id;
    		$field->save();
    	}

    	return back()->with('message', 'Form updated');
    }
}
