<?php  

require 'controller/controller.php';

if (isset($_GET['action']) && $_GET['action'] === 'post') {
	if (isset($_GET['id']) && $_GET['id'] > 0) {
    	postView();
    }
} else {
	listPosts();	
};
?>