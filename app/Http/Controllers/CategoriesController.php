<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
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
    	$this->validate($request, [
    		'title' => 'required|max:255'
    		]);
        Category::create($request->all());
        
        return view('admin.categories.create')->with('message','Category added');
    }

    public function destroy($id)
	{
		$category = Category::find($id); 
		$category->delete();

		return back()->with('message', "Категория " . $category->title . " удалена");
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
		
		return back()->with('message','Категория обновлена');
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
