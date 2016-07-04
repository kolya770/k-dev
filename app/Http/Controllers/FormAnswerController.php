<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\FormAnswer;
use App\Models\FieldAnswer;
use App\Http\Requests;

class FormAnswerController extends Controller
{

	 public function __construct()
    {
    	$this->middleware('auth');
        $this->middleware('role');
    }

    public function store(Request $request) {
    	$formAnswer = new FormAnswer();
    	$formAnswer->title = $request->get('title');
    	$formAnswer->form_id = $request->get('form_id');
    	$formAnswer->author_id = $request->user()->id;
    	$formAnswer->save();
    	for ($i = 1; $i <= $request->get('size'); $i++) {
    		$fieldAnswer = new FieldAnswer();
    		$fieldAnswer->answer = $request->get('field' . $i);
    		$fieldAnswer->form_answer_id = $formAnswer->id;
    		$fieldAnswer->save();
    	}
    	$forms = Form::all();
    	return view('forms')->with('forms', $forms);
    }
}
