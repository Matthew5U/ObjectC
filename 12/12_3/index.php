<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Błędy w PHP</title>
	<link rel="stylesheet" href="semantic.min.css">
	<link rel="stylesheet" href="custom.css">
</head>
<body>
	<div class="ui container content">
		<div class="top">
		<h2>Ostrzeżenia PHP</h2>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis libero, labore reprehenderit vel nesciunt cum atque repellat repudiandae impedit sapiente minima rem eveniet, quasi quis expedita at excepturi! Iste, nam.</p>

		<?php
			//include 'function.php';
			
			$string = "Kurs";
			strtoupper($string, 10);
			
			echo '<p>Pozostala czesc skrytpu</p>';
		?>

	</div>
</body>
</html>