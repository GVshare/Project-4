<?php  

require 'controller/controller.php';

if (isset($_GET['action']) && $_GET['action'] === 'post') {
	if (isset($_GET['id']) && $_GET['id'] > 0) {
    	postView();
    }
} elseif (isset($_GET['action']) && $_GET['action'] === 'addComment') {
	if (isset($_GET['id']) && $_GET['id'] > 0) {
		if (!empty($_POST['author']) && !empty($_POST['comment'])) {
            addComment($_GET['id'], $_POST['author'], $_POST['comment']);
        }
	}
	
} else {
	listPosts();	
};
?>