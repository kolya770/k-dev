<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PortfolioController extends Controller
{
    public function index() {
    	return view('portfolio');
    }

    public function show($id) {
    	
    }
}
