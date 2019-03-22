<!DOCTYPE html>
<html>
<head>
	<title>Mon Blog</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="public/css/style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<script src="public\tinymce\js\tinymce\tinymce.js"></script>
	<script type="text/javascript" src="public/js/tinyMCE.js"></script>

</head>
<body>

	<!-- ASIDE START-->
	<aside id="navigator">
		<div id="pictProfile"></div>

		<h1>Jean Forteroche</h1>
		<p id="descriptionAuteur">Et revoici, avec "Billet simple pour l'Alaska", notre maître du polar, Jean Forteroche, l'un des pionniers du Blog des livres qui depaint sont long voyage de la France à l'Alaska en passant par le Mexique. 
		...Accrochez vous!
		</p>	

		<nav>
			<ul>	
				<a href="index.php"><li class="navLi">Accueil</li></a>
					<?php  
					if (isset($_SESSION['status'])) {
					?>
						<a href="index.php?action=adminBoard"><li class="navLi">Admin</li></a>
					<?php
					} else {
					?>
						<a href="mailto:JeanForteroche@edition.com"><li class="navLi">Contacts</li></a>
					<?php 
					} 
					?>
					<?php  
					if (isset($_SESSION['status'])) {
					?>
						<a href="index.php?action=adminPosts"><li class="navLi">Mes Chapitres</li></a>
					<?php
					} 
					?>
					<?php  
					if (isset($_SESSION['status'])) {
					?>
						<a href="index.php?action=adminComments"><li class="navLi">Mes Commentaires</li></a>
					<?php
					} 
					?>
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
			<div id="social"><a class="social" href="#/"><i class="fab fa-facebook-f"></i></a><a class="social" href="#/"><i class="fab fa-twitter"></i></a><a class="social" href="#/"><i class="fab fa-google-plus-g"></i></a><a class="social" href="#/"><i class="fab fa-instagram"></i></a></div>

		</nav>

	</aside>
	<!-- ASIDE END -->


	<!-- HEADER START -->
	<header>
		<img id="headerImage" src="public/image/alaska.png">
	</header>
	<!-- HEADER END -->

	<section id="content">
		<div id="navOpener">&#9776</div>

	<?= $content ?>

	</section>
	

<script type="text/javascript" src="public/js/projet4.js"></script>
</body>
</html>