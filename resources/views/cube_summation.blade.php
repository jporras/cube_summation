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
		<form method="post">
		<h3>Cube Summation</h3>
		<table>
			<tr>
				<th>Input:</th>
				<td>
					<textarea name="input" rows="15"><?php echo isset($_POST['input'])?$_POST['input']:''; ?></textarea>
				</td>
			</tr>
			<tr>
				<td><input type="submit" name="submit" value="Send"></td>
			</tr>
		</table>
		<form>
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