<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<title>Modułowa struktura</title>
	<link rel="stylesheet" href="resources/semantic.min.css">
	<link rel="stylesheet" href="resources/custom.css">
	<!-- Dodatkowe skrypty -->
	<script src="resources/jquery.min.js"></script>
	<script src="resources/semantic.min.js"></script>

</head>
<body>

	<?php require('includes/header.php') ?>

	
	<!-- Tresc aplikacji -->
	<div class="sk-content">
		<div class="ui container">
			<div class="ui two column stackable relaxed grid">

  				<div class="eleven wide column">
					<!-- lista artykułów -->
					<h2>Najnowsze artykuły</h2>
					
					<article class="single-article">
						<h3>Jak wysłać email za pomocą PHP</h3>
						<img src="http://placehold.it/350x150" alt="obraz">
						<div class="article-content">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab blanditiis error, ipsam. Adipisci, incidunt dicta, consectetur sit illum doloremque, dolorum esse dolore nostrum labore iusto rem dolores iste pariatur hic. Quibusdam neque nisi molestias autem sunt alias mollitia earum ad.</p>
						</div>
					</article>
					<article class="single-article">
						<h3>Najciekawsze nowości w PHP7</h3>
						<img src="http://placehold.it/350x150" alt="obraz">
						<div class="article-content">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab blanditiis error, ipsam. Adipisci, incidunt dicta, consectetur sit illum doloremque, dolorum esse dolore nostrum labore iusto rem dolores iste pariatur hic. Quibusdam neque nisi molestias autem sunt alias mollitia earum ad.</p>
						</div>
					</article>
					<article class="single-article">
						<h3>Najpopularniejsze frameworki PHP</h3>
						<img src="http://placehold.it/350x150" alt="obraz">
						<div class="article-content">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab blanditiis error, ipsam. Adipisci, incidunt dicta, consectetur sit illum doloremque, dolorum esse dolore nostrum labore iusto rem dolores iste pariatur hic. Quibusdam neque nisi molestias autem sunt alias mollitia earum ad.</p>
						</div>
					</article>
					<h2>Dodaj nowy artykuł</h2>
					<form method="post" action="" class="ui form">
						<div class="required field">
							<label>Tytuł</label>
							<input type="text" name="title" id="title">
						</div>
						<div class="required field">
							<label>Treść artykułu</label>
							<textarea name="content" id="content" cols="30" rows="10"></textarea>
						</div>
						<div class="required field">
							<label>Obrazek</label>
							<input type="text" name="image" id="image">
						</div>
						<input type="submit" class="ui primary button" id="add" name="add" value="Dodaj artykuł"></input>
					</form>	
  				</div>

  				<div class="five wide column">
  					<!-- Rejestracja -->
  					<h3>Rejestracja</h3>

					<form method="post" action="" class="ui form">
						<div class="required field">
							<label>Email (login)</label>
							<input type="text" name="email" id="email">
						</div>
							
						<div class="required field">
							<label>Hasło</label>
							<input type="text" name="password" id="password">
						</div>
	
						<div class="required field">
							<div class="ui checkbox">
								<input class="hidden" tabindex="0" type="checkbox" name="terms"  id="terms">
								<label>Zapoznałem się z regulaminem</label>					
							</div>
						</div>
						<input type="submit" class="ui primary button" id="send" name="send" value="Wyślij"></input>
					</form>
					<!-- Tresc pod formularzem -->
					<div class="sk-popular-users">
  						<h3 class="sk-column-header">Najpopularniejsi użytkownicy</h3>
  						<div class="ui two column grid">
  							<div class="ui eight column">
								<div class="ui card">
  									<div class="image">
	  									<img src="resources/images/avatar.png" alt="">
  									</div>
  									<div class="content">
  										<a class="header">Janusz</a>
  									</div>
  									<div class="extra content">
  										<a href=""><i class="user icon"></i>6 obserwuje</a>
  									</div>
  								</div>
  							</div>
  							<div class="ui eight column">
								<div class="ui card">
  									<div class="image">
	  									<img src="resources/images/avatar.png" alt="">
  									</div>
  									<div class="content">
  										<a class="header">Krzysiek</a>
  									</div>
  									<div class="extra content">
  										<a href=""><i class="user icon"></i>2 obserwuje</a>
  									</div>
  								</div>
  							</div>
  						</div>
  					</div>
  				</div>
			</div>
		</div>
	</div>

	<!-- Stopka -->
	<?php require('includes/footer.php') ?>

	<script>
		$(document).ready(function(){
			$('.checkbox').checkbox();
		});
		$('.sticky').sticky();
	</script>
</body>
</html>