<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class summationController extends Controller{

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
			$this->sum[] = $this->createTest($n,$operation);
		}
		return view('cube.summation')->with('sum',$sum);
	}

	private function createTest($n,$operation){
		$cube = $this->createCube($n);
		$sum = $this->processOperation($operation, $cube);
		return $sum;
	}

	private function processOperation($operation,$cube){
		$sum = array();
		for($i = 0; $i < count($operation); $i++){
			if(strpos($operation[$i],'UPDATE')!==false){
				list($name, $x, $y, $z, $value) = explode(" ", $operation[$i]);
				$cube = $this->update($cube, $x, $y, $z, $value);
			}
			if(strpos($operation[$i],'QUERY')!==false){
				list($name, $x1, $y1, $z1, $x2, $y2, $z2) = explode(" ", $operation[$i]);
				array_push($sum, $this->query($cube, $x1, $y1, $z1, $x2, $y2, $z2));
			}
		}
		return $sum;
	}

	function update($cube, $x, $y, $z, $value){
		$cube[$x][$y][$z] = $value;
		return $cube;
	}

	function query($cube, $x1, $y1, $z1, $x2, $y2, $z2){
		$sum = 0;
		for($i = $x1; $i <= $x2; $i++){
			for($j = $y1; $j <= $y2; $j++){
				for($k = $z1; $k <= $z2; $k++){
					$sum += $cube[$i][$j][$k];
				}
			}
		}
		return $sum;
	}

	private function createCube($n){
		$cube = array();
		for($i = 0; $i <= $n; $i++){
			for($j = 0; $j <= $n; $j++){
				for($k = 0; $k <= $n; $k++){
					$cube[$i][$j][$k]=0;
				}
			}
		}
		return $cube;
	}
}
