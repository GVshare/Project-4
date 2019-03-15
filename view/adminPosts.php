<?php ob_start(); ?>

<h2>Administrate your Posts !</h2>

<div id="boardAdmin">
	<a href="#/" class="managers"><div >NOUVEAU CHAPITRE</div></a>
	<a href="index.php?action=adminChapterView" class="managers"><div >MES CHAPITRES</div> </a>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>