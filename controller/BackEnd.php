<?php  

require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function adminBoardOpen() {
	require('view/adminBoardView.php');
}

function adminCommentsOpen() {
	require('view/adminComments.php');
}

function adminPostsOpen() {
	require('view/adminPosts.php');
}

?>