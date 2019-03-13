<?php ob_start(); ?>

<h2>Ceci sera ma page de conection a Admin</h2>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>