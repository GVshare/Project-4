<?php  
ob_start();

require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/DraftManager.php');

function adminBoardOpen() {
	require('view/BackEnd_View/adminBoardView.php');
}

function adminCommentsOpen() {
	$commentManager = new CommentManager();
	$comments = $commentManager->getAllComments();
	$reportedComments = $commentManager->getReportedComments();
	require('view/BackEnd_View/adminComments.php');
}

function adminPostsOpen() {
	require('view/BackEnd_View/adminPosts.php');
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

    require('view/BackEnd_View/adminMyChaptersView.php');
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

    require('view/BackEnd_View/adminModifyChapterView.php');
}

function adminModifyChapter($postId , $postContent , $postTitle) {
    $postManager = new PostManager();
    
    $post = $postManager->modifyPostContent($postId , $postContent , $postTitle);

    header('location: index.php?action=post&id='.$postId);
}

function adminNewChaptersOpen() {
    $draftManager = new DraftManager();

    $drafts = $draftManager->getAllDrafts();

    require('view/BackEnd_View/adminNewChapters.php');
}

function adminAddDraft() {
    $draftManager = new DraftManager();

    $draftManager->addNewDraft();

    header('location: index.php?action=adminNewChapter');
}

function adminDeleteDraft($draftId) {
    $draftManager = new DraftManager();

    $drafts = $draftManager->deleteDraft($draftId);

    header('location: index.php?action=adminNewChapter');
}

function adminEditDraftOpen() {
    $draftManager = new DraftManager();
    
    $draft = $draftManager->getDraft($_GET['draftId']);

    require('view/BackEnd_View/adminModifyDraftView.php');
}

function adminModifyDraft($draftId , $draftContent , $draftTitle) {
    $draftManager = new DraftManager();
    
    $draft = $draftManager->modifyDraftContent($draftId , $draftContent , $draftTitle);

    header('location: index.php?action=adminNewChapter');
}

function publishDraft($draftId) {
    $draftManager = new DraftManager();
    $draft = $draftManager->getDraft($_GET['draftId']);

    $postManager = new PostManager();
    $post = $postManager->addPost($draft['author'] , $draft['title'] , $draft['content'] ,  $draft['draftDate']);

    adminDeleteDraft($draftId);

    header('location: index.php?action=adminChapterView');
}

?>