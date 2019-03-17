<?php ob_start(); ?>

<h2> Mes chapitres ! </h2>

<div id="boardAdmin">
	<a href="index.php?action=adminNewChapter" class="managers"><div >NOUVEAU CHAPITRE</div></a>
	<a href="index.php?action=adminChapterView" class="managers"><div >CHAPITRES PUBLIÉS</div> </a>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>