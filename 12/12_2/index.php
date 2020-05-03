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
		<h2>Niezdefiniowane wartości</h2>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis libero, labore reprehenderit vel nesciunt cum atque repellat repudiandae impedit sapiente minima rem eveniet, quasi quis expedita at excepturi! Iste, nam.</p>

		<?php
		$productName = 'Kurs PHP7';
		echo $productName . '<br>';

		$codes = [200,300,404,500,501];
		echo $codes[4] . '<br>';

		$product = [
			'id' => 0034,
			'price' => 199,
			'available' => TRUE 
		];
		echo $product['available'] . '<br>';
		?>

	</div>
</body>
</html>