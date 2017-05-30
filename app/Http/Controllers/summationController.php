<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class summationController extends Controller
{
    //
	public function index(){
		return view('cube.summation'); 
	}
	
	public function readInput(request $request){
		return $request->input('input');
	}
}
