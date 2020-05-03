<?php
$frameworks = ['Laravel','Zend','Symfony','CakePHP'];

$features = [
	'id' => 23,
	'price' => 199.99,
	'category' => 'Tablety',
	'accessories' => 'Kabel USB',
	'size' => 7
]

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pętla FOREACH</title>
</head>
<body>
	<h3>Popularne frameworki PHP</h3>
	<ul>
		<?php
			foreach( $frameworks as $fr ) // Dla kazdego elementu z tablicy frameworks definiujemy zmienna pomocnicza
			{
				echo "<li>$fr</li>";
			}
		?>
	</ul>
	<h3>Cechy produktu</h3>
			<?php 
				foreach ( $features as $key => $value)
				{
					echo "<p>Nazwa klucza to $key a wartosc to $value</p>";
				}
			?>
</body>
</html>