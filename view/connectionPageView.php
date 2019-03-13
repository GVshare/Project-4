<?php ob_start(); ?>

<h2>Bienvenue sur votre site !</h2>

<form method="POST" action="index.php?action=checkUserInfo">
	<label>Username</label>
	<input type="text" name="login">

	<label>Password</label>
	<input type="password" name="password"><br>

	<input type="submit" name="submitButton" value="Log In" id="buttonConnectionAdmin">
</form>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>