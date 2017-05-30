<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class summationController extends Controller
{
    //
	protected $sum;
	
	public function index(){
		return view('cube.index');
	}
	
	public function readInput(request $request){
		$data = explode(PHP_EOL, $request->input('input'));
		$t = $data[0];
		$i = 1;
		while($i < count($data) && trim($data[$i]) != ''){
			$operation = array();
			list($n, $m) = explode(" ", $data[$i]);
			$i++;
			$a = 0;
			while($a < $m){
				array_push($operation,$data[$i]);
				$i++;
				$a++;
			}
			$this->sum[] = createTest($n,$operation);
		}
		return view('cube.summation')->with('sum',$sum);
	}


	public function createTest($n,$operation){
		$cube = create_cube($n);
		$sum = process_operation($operation, $cube);
		return $sum;
	}



}
