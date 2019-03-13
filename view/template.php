<!DOCTYPE html>
<html>
<head>
	<title>Mon Blog</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="public/style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>

	<!-- ASIDE START-->
	<aside>
		<div id="pictProfile"></div>

		<h1>Auteur Tout Pourrit !</h1>
		<p id="descriptionAuteur">Je suis un auteur alcoholique tout pourrit en train d'éssayer d'écrire un blog car écrire sur papier c est demodé...</p>

		<nav>
			<ul>
				<a href="index.php"><li class="navLi">Accueil</li></a>
				<a href="#"><li class="navLi">Chapitre 2</li></a>
				<a href="#"><li class="navLi">Chapitre 3</li></a>
					<?php 
					if (isset($_SESSION['status'])) {
					?>
						<p id="connectedAdminText">Connecté en Administrateur </p>
						<div id="logOutDiv"><a id="logOut" href='index.php?action=logOut'> -- Log out -- </a></div>
					<?php
					} else {
					?>
						<a href="index.php?action=connectionPage"><li class="navLi">Espace Administrateur </li></a>
					<?php
					}
					?> 
			</ul>

		</nav>

	</aside>
	<!-- ASIDE END -->


	<!-- HEADER START -->
	<header>
		<img id="headerImage" src="public/image/alaska.png">
	</header>
	<!-- HEADER END -->

	<section id="content">

	<?= $content ?>

	</section>

</body>
</html>