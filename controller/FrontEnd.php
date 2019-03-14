<?php
// Get the Class
require_once('model/PostManager.php');
require_once('model/CommentManager.php');

// Get all the posts
function listPosts() {
	$postManager = new PostManager();
    $post = $postManager->getPosts();

	require('view/listPostsView.php');
};

// Get a specifit post and comments base of the ID of the Post
function postView() {
	$postManager = new PostManager();
	$commentManager = new CommentManager();
    

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/postView.php');
};

// Add a comment in a specific post by specifying the post ID, author and comment
function addComment($postId, $author, $comment) {

    $commentManager = new CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        die('Impossible d\'ajouter le commentaire !');
    } else {
        header('Location: index.php?action=post&id=' . $postId);
    };
};

// Delete a comment
function deleteComment($commentId) {

    $commentManager = new CommentManager();

    $infoComment = $commentManager->commentInfos($commentId);

    $affectedComment = $commentManager->deleteComment($commentId);

    header('location: index.php?action=post&id=' . $infoComment['idPost']);
}

function adminDeleteComment($commentId) {

    $commentManager = new CommentManager();

    $infoComment = $commentManager->commentInfos($commentId);

    $affectedComment = $commentManager->deleteComment($commentId);

    header('location: index.php?action=adminComments');
}

function reportComment($commentId) {
    $commentManager = new CommentManager();

    $infoComment = $commentManager->commentInfos($commentId);

    $affectedComment = $commentManager->reportComment($commentId);

    header('location: index.php?action=post&id=' . $infoComment['idPost']);
}

?>