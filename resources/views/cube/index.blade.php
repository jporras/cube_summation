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
		<h3>Cube Summation</h3>
		<form action="/cube/summation" method="post">
		{{csrf_field()}}
		<table>
			<tr>
				<th>Input:</th>
				<td>
					<textarea name="input" rows="15"></textarea>
				</td>
			</tr>
			<tr>
				<td><input type="submit" name="submit" value="Send"></td>
			</tr>
		</table>
		<form>
	</body>
</html>
