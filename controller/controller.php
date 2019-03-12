<?php
require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function listPosts() {
	$postManager = new PostManager();
    $post = $postManager->getPosts();

	require('view/listPostsView.php');
};

function postView() {
	$postManager = new PostManager();
	$commentManager = new CommentManager();
    

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/postView.php');
};

?>