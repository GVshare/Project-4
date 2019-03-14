<?php  

require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function adminBoardOpen() {
	require('view/adminBoardView.php');
}

function adminCommentsOpen() {
	$commentManager = new CommentManager();
	$comments = $commentManager->getAllComments();
	$reportedComments = $commentManager->getReportedComments();
	require('view/adminComments.php');
}

function adminPostsOpen() {
	require('view/adminPosts.php');
}

?>