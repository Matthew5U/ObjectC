<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Zewnętrzne pliki</title>
	<link rel="stylesheet" href="semantic.min.css">
	<link rel="stylesheet" href="custom.css">
</head>
<body>
	<div class="ui container content">
		<div class="top">
			<h2>Zewnętrzne pliki PHP</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam provident optio nemo.</p>			
		</div>
		<?php 

		include 'function.php';
		$header = 'formularz rejestracji';
		makeHeader($header);
		require 'form.php'; 
		?>
		<footer>
			<h4>Zawartość stopki</h4>
			<p>Lorem ipsum dolor sit.</p>
		</footer>
	</div>
</body>
</html>