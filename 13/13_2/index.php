<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Przydatne techniki</title>
	<link rel="stylesheet" href="semantic.min.css">
	<link rel="stylesheet" href="custom.css">
</head>
<body>
	<div class="ui container content">
		<div class="top">
		<?php
		//$values = [34,4,45,12,55,29,40,21,9,16,23,18];
		$values = ['foxtrot','bravo','tango','lima','x-ray','hotel','alpha'];
		usort($values, function($a, $b)
		{
			return $a <=> $b;
		}); // Sortowanie tablicy
		foreach ($values as $value) {
			echo "$value<br>";
		}
		?>
		</div>
	</div>
</body>
</html>