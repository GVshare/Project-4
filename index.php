<?php  

require 'controller/FrontEnd.php';
require 'controller/Conection.php';

if (isset($_GET['action'])) {
	if ($_GET['action'] === 'post') {
		if (isset($_GET['id']) && $_GET['id'] > 0) {
    		postView();
    	}

	} elseif ($_GET['action'] === 'addComment') {
		if (isset($_GET['id']) && $_GET['id'] > 0) {
			if (!empty($_POST['author']) && !empty($_POST['comment'])) {
            	addComment($_GET['id'], $_POST['author'], $_POST['comment']);
        	}
		}

	} elseif ($_GET['action'] === 'conectionPage') {
		conectionPageOpen();

	} elseif ($_GET['action'] === 'checkUserInfo') {
		if (isset($_POST['login']) && isset($_POST['password'])){
            checkInfoValidity($_POST['login'],$_POST['password']);
        }
	}





} else {
	listPosts();
}
	
?>