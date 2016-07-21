<?php
/**
 * Author:      Elizabeth Blyumska
 * DateTime:    17 July 2016 (Sunday) 22:57
 * Description: Controller for reviews administation.
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Http\Requests;

class ReviewController extends Controller
{

    public function create() {
    	return view('admin.reviews.create');
    }

    public function index() {
    	return view('admin.reviews.index');
    }

    public function store(Request $request) {
    	$review = new Review();
    	$review->review = $request->get('review');
    	$review->author_name = $request->get('author_name');
    	$review->author_job = $request->get('author_job');
    	if ($request->file('preview')) {
            $root = $_SERVER['DOCUMENT_ROOT'] . "/img/"; 
            $f_name = $request->file('preview')->getClientOriginalName();
            $request->file('preview')->move($root, $f_name);
            $review->preview = "/img/" . $f_name;
         }   
    	$review->save();

    	return back()->with('message', 'Review uploaded!');
    }

    public function destroy($id) {
    	$review = Review::find($id);
    	$review->delete();

    	return back()->with('message', 'Review deleted!');
    }

    public function edit($id) {
    	$review = Review::find($id);

    	return view('admin.reviews.edit')->with('review', $review);
    }

    public function update(Request $request, $id) {
    	$review = Review::find($id);
    	$review->update($request->all());
    	if ($request->file('preview')) {
            $root = $_SERVER['DOCUMENT_ROOT'] . "/img/"; 
            $f_name = $request->file('preview')->getClientOriginalName();
            $request->file('preview')->move($root, $f_name);
            $review->preview = "/img/" . $f_name;
        }   
   		$review->save();

   		return back()->with('message', 'Review updated!');
    }
}
