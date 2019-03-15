<?php ob_start(); ?>

<h2>Administrate your Posts !</h2>

<div id="boardAdmin">
	<a href="#/" class="managers"><div >NOUVEAU CHAPITRE</div></a>
	<a href="#/" class="managers"><div >MES CHAPITRES</div> </a>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>