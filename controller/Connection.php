<?php  
session_start();
require_once('model/ConnectionManager.php');

function connectionPageOpen() {
	require('view/connectionPageView.php');
}

function checkInfoValidity($login, $password) {	 
	$connection = new ConnectionManager();
    $result = $connection->getUserInfo($login, $password);
	$checkPassword = SHA1($password) === $result['password'];
	
		if ($checkPassword) {
			$_SESSION['status'] = "Admin";

			header('Location: index.php?action=adminBoard');
		}
		else {
			echo "mauvais mot de passe <br><br>";
			echo "<a href='index.php?action=connectionPage'>Back</a>";
		}
}

function logOut() {
	unset($_SESSION['status']);

	header('Location: index.php');
}

?>