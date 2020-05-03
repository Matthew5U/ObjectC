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
		<h2>Wyjątki w PHP</h2>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis libero, labore reprehenderit vel nesciunt cum atque repellat repudiandae impedit sapiente minima rem eveniet, quasi quis expedita at excepturi! Iste, nam.</p>

		<?php
		
			function calculateArea($a, $b) 
			{
				if( $a <= 0 || $b <= 0 )
				{
					throw new Exception(('Wartosci wieksze niz zero'));
				}
				return $a * $b;
			}

			try
			{
			echo calculateArea(10,0);
			}
			catch(Exception $e)
			{
				echo $e->getMessage();
			}



		?>

	</div>
</body>
</html>