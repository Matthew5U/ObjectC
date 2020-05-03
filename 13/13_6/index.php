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
			$date = new DateTime('2014-01-15');
			//$data->setDate(2015,12,16);
			$data->setTime(14,20);
			echo $date->format('d-m-Y H:i:s');
		?>
		</div>
	</div>
</body>
</html>