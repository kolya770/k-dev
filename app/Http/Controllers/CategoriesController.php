<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category as Category;
use App\Http\Requests;

class CategoriesController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
        $this->middleware('role');
    }

    public function create() {
    	return view('admin.categories.create');
    }

    public function store(Request $request)
    {
    	$category = new Category();
    	if ($category->validate($request->all())) {
        	Category::create($request->all());

        	return back()->with('message', 'Category added');
        } else {
        	$errors = $category->errors();

        	return back();
        }     
    }

    public function destroy($id)
	{
		$category = Category::find($id); 
		$category->delete();

		return back()->with('message', 'Category deleted');
	}

	public function edit($id) 
	{
		$category = Category::find($id);
		
		return view('admin.categories.edit')->with('category', $category);
	}

	public function update(Request $request, $id)
	{
		$category = Category::find($id);
		$category->update($request->all());
		$category->save();
		
		return back()->with('message','Category updated');
	}

	public function index() {
		$categories = Category::all();

		return view('admin.categories.index')->with ('categories', $categories); 
	}

	public function show($id) {
		$category = Category::find($id);

		return view('admin.categories.show', ['category' => $category]);
	}
}
