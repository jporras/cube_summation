<!doctype html>
<html lang="{{ config('app.locale') }}">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Cube Summation</title>
		<style></style>
	</head>
	<body>
		<?php if(isset($sum)){ ?>
		<h3>Output:</h3>
		<?php
		foreach($sum as $t){
			foreach($t as $value){
				echo $value."<br/>";
			}
		}
		?>
		<?php } ?>
	</body>
</html>
