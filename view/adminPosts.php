<?php ob_start(); ?>

<h2>Administrate your Posts !</h2>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>