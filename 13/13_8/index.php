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
		/*$html = "
		<ul class=\"list\">
			<li class=\"item\">Zmienne</li>
			<li class=\"item\">Funkcje</li>
			<li class=\"item\">Instrukcja \"IF\"</li>
			<li class=\"item\">Klasy</li>
		</ul>
		";*/ // Skladnia heredoc pzy skomplikowanym stringu z cudzyslow
		$html = <<< HTML
		<ul class="list">
			<li class="item">Zmienne</li>
			<li class="item">Funkcje</li>
			<li class="item">Instrukcja "IF"</li>
			<li class="item">Klasy</li>
		</ul>
HTML; 
		echo $html;
		?>
		</div>
	</div>
</body>
</html>