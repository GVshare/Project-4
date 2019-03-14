<?php ob_start(); ?>

<h2>Bienvenue sur votre site !</h2>

<div id="boardAdmin">
	<a href="index.php?action=adminPosts" class="managers"><div >CHAPITRES MANAGER</div></a>
	<a href="index.php?action=adminComments" class="managers"><div >COMMENTAIRES MANAGER</div></a>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>