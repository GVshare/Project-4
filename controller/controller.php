<?php
require_once('model/PostManager.php');

function listPosts() {
	$postManager = new PostManager();
    $post = $postManager->getPosts();

	require('view/listPostsView.php');
};

function postView() {
	$postManager = new PostManager();
    

    $post = $postManager->getPost($_GET['id']);
    

    require('view/postView.php');
};

?>