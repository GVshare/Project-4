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


function adminDeleteComment($commentId) {

    $commentManager = new CommentManager();

    $infoComment = $commentManager->commentInfos($commentId);

    $affectedComment = $commentManager->deleteComment($commentId);

    header('location: index.php?action=adminComments');
}

function adminApproveComment($commentId) {

    $commentManager = new CommentManager();

    $infoComment = $commentManager->commentInfos($commentId);

    $affectedComment = $commentManager->approveComment($commentId);

    header('location: index.php?action=adminComments');
}

function adminMyChapterOpen() {
    $postManager = new PostManager();

    $post = $postManager->getPosts();

    require('view/adminMyChaptersView.php');
}

function adminDeleteChapter($postId) {
    $postManager = new PostManager();

    $infoPost = $postManager->getPost($postId);

    $affectedPost = $postManager->deletePost($postId);

    header('location: index.php?action=adminChapterView');
}

function adminModifyChapterOpen() {
    $postManager = new PostManager();
    
    $post = $postManager->getPost($_GET['postId']);

    require('view/adminModifyChapterView.php');
}

function adminModifyChapter($postId , $postContent , $postTitle) {
    $postManager = new PostManager();
    
    $post = $postManager->modifyPostContent($postId , $postContent , $postTitle);

    header('location: index.php?action=post&id='.$postId);
}
?>