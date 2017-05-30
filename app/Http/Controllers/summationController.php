<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class summationController extends Controller
{
    //
	protected $sum;  
	
	public function index(){
		return view('cube.summation');
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
			//$this->sum[] = create_test($n,$operation);
		}
		print_r($data);
		//return $sum;
	}
}
