<?php  

require 'controller/FrontEnd.php';
require 'controller/Connection.php';
require 'controller/BackEnd.php';

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

	} elseif ($_GET['action'] === 'connectionPage') {
		connectionPageOpen();

	} elseif ($_GET['action'] === 'checkUserInfo') {
		if (isset($_POST['login']) && isset($_POST['password'])){
            checkInfoValidity($_POST['login'],$_POST['password']);
        }

	} elseif ($_GET['action'] === 'deleteComment') {
		if (isset($_GET['commentId']) && $_GET['commentId'] > 0) {
    		deleteComment($_GET['commentId']);
    	}

    } elseif ($_GET['action'] === 'adminDeleteComment') {
		if (isset($_GET['commentId']) && $_GET['commentId'] > 0) {
    		adminDeleteComment($_GET['commentId']);
    	}

    } elseif ($_GET['action'] === 'reportComment') {
		if (isset($_GET['commentId']) && $_GET['commentId'] > 0) {
    		reportComment($_GET['commentId']);
    	}

	} elseif ($_GET['action'] === 'logOut') {
		logOut();

	} elseif ($_GET['action'] === 'adminBoard')  {
		if (isset($_SESSION['status'])) {
			adminBoardOpen();
		} else {
			connectionPageOpen();
		}

	} elseif ($_GET['action'] === 'adminComments') {
		if (isset($_SESSION['status'])) {
			adminCommentsOpen();
		} else {
			connectionPageOpen();
		}

	} elseif ($_GET['action'] === 'adminPosts') {
		if (isset($_SESSION['status'])) {
			adminPostsOpen();
		} else {
			connectionPageOpen();
		}
	}





} else {
	listPosts();
}
	
?>