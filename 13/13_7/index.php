<?php

setcookie('userid', 3456, time()+3600); // wartosc identyfikaotra = 3456
?>

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


			setcookie('userid',211212);
			echo $_COOKIE['userid'];
			unset($_COOKIE['userid']);
			echo $_COOKIE['userid'];

		?>
		</div>
	</div>
</body>
</html>