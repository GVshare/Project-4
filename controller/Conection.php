<?php  
session_start();
require_once('model/ConectionManager.php');

function conectionPageOpen() {
	require('view/conectionPageView.php');
}

function checkInfoValidity($login, $password) {	 
	$conection = new ConectionManager();
    $result = $conection->getUserInfo($login, $password);
	$checkPassword = $password === $result['password'];
	
		if ($checkPassword) {
			$_SESSION['status'] = "Admin";

			header('Location: index.php');
		}
		else {
			echo "mauvais mot de passe <br><br>";
			echo "<a href='index.php?action=conectionPage'>Back</a>";
		}
}

?>