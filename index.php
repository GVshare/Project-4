<?php  

require 'controller/FrontEnd.php';
require 'controller/Connection.php';
require 'controller/BackEnd.php';

if (isset($_GET['action'])) {

	// ================================================= READERS ===========================================================
	
	// Get a post specified by its ID
	if ($_GET['action'] === 'post') {
		if (isset($_GET['id']) && $_GET['id'] > 0) {
    		postView();
    	}

    // Add a comment to a specified post
	} elseif ($_GET['action'] === 'addComment') {
		if (isset($_GET['id']) && $_GET['id'] > 0) {
			if (!empty($_POST['author']) && !empty($_POST['comment'])) {
            	addComment($_GET['id'], $_POST['author'], $_POST['comment']);
        	}
		}

	// Report a Comment
	} elseif ($_GET['action'] === 'reportComment') {
		if (isset($_GET['commentId']) && $_GET['commentId'] > 0) {
    		reportComment($_GET['commentId']);
    	}

    // Delete a comment specified by its commentId
	} elseif ($_GET['action'] === 'deleteComment') {
		if (isset($_SESSION['status'])) {
			if (isset($_GET['commentId']) && $_GET['commentId'] > 0) {
    			deleteComment($_GET['commentId']);
    		}
		}
		

	// ================================================ CONNECTION ==========================================================

	// Redirect to the connection Page
	} elseif ($_GET['action'] === 'connectionPage') {
		connectionPageOpen();

	// Check the user name and password validity
	} elseif ($_GET['action'] === 'checkUserInfo') {
		if (isset($_POST['login']) && isset($_POST['password'])){
            checkInfoValidity(htmlspecialchars($_POST['login']) , htmlspecialchars($_POST['password']));
        }

    // Log out
    } elseif ($_GET['action'] === 'logOut') {
		logOut();

    // =============================================== ADMINISTRATOR ========================================================

	// Delete a comment specified by its commentId
    } elseif ($_GET['action'] === 'adminDeleteComment') {
    	if (isset($_SESSION['status'])) {
    		if (isset($_GET['commentId']) && $_GET['commentId'] > 0) {
    			adminDeleteComment($_GET['commentId']);
    		}
    	} else {
			connectionPageOpen();	// If not conected as Admin, go to the connection.
		}

	// Approve a comment specified by its commentId
    } elseif ($_GET['action'] === 'adminApproveComment') {
    	if (isset($_SESSION['status'])) {
    		if (isset($_GET['commentId']) && $_GET['commentId'] > 0) {
    			adminApproveComment($_GET['commentId']);
    		}
    	} else {
			connectionPageOpen();
		}

	// Redirect to the admin Page
	} elseif ($_GET['action'] === 'adminBoard')  {
		if (isset($_SESSION['status'])) {
			adminBoardOpen();
		} else {
			connectionPageOpen();
		}

	// Redirect to the Comment administration Page
	} elseif ($_GET['action'] === 'adminComments') {
		if (isset($_SESSION['status'])) {
			adminCommentsOpen();
		} else {
			connectionPageOpen();
		}

	// Redirect to the Posts administration Page -> will give choice to go to Create New Post Page OR Manage my published Posts Page
	} elseif ($_GET['action'] === 'adminPosts') {
		if (isset($_SESSION['status'])) {
			adminPostsOpen();
		} else {
			connectionPageOpen();
		}

	// Redirect to the Page to manage my Published Posts
	} elseif ($_GET['action'] === 'adminChapterView') {
		if (isset($_SESSION['status'])) {
			adminMyChapterOpen();
		} else {
			connectionPageOpen();
		}

	// Delete a Post specified by its ID
	} elseif ($_GET['action'] === 'adminDeleteChapter') {
		if (isset($_SESSION['status'])) {
			if (isset($_GET['postId']) && $_GET['postId'] > 0) {
			adminDeleteChapter($_GET['postId']);
			}
		} else {
			connectionPageOpen();
		}

	// Redirect to the Page to modify a Post
	} elseif ($_GET['action'] === 'adminModifyChapter') {
		if (isset($_SESSION['status'])) {
			if (isset($_GET['postId']) && $_GET['postId'] > 0) {
			adminModifyChapterOpen();
			}
		} else {
			connectionPageOpen();
		}

	// Modify the title and content of a Post specified by its ID
	} elseif ($_GET['action'] === 'modifyPost') {
		if (isset($_SESSION['status'])) {
			if (isset($_GET['postId']) && $_GET['postId'] > 0) {
				adminModifyChapter($_GET['postId'] , $_POST['updatePostContent'] , $_POST['updatePostTitle']);
			}
		} else {
			connectionPageOpen();
		}

	// Redirect to the page to create a new Post/Draft
	} elseif ($_GET['action'] === 'adminNewChapter') {
		if (isset($_SESSION['status'])) {
			adminNewChaptersOpen();
		} else {
			connectionPageOpen();
		}

	// Create a new Draft
	} elseif ($_GET['action'] === 'addDraft') {
		if (isset($_SESSION['status'])) {
			adminAddDraft();
		} else {
			connectionPageOpen();
		}

	// Delete a Draft specified by its ID
	} elseif ($_GET['action'] === 'deleteDraft') {
		if (isset($_SESSION['status'])) {
			if (isset($_GET['draftId']) && $_GET['draftId'] > 0) {
				adminDeleteDraft($_GET['draftId']);
			}	
		} else {
			connectionPageOpen();
		}

	// Redirect to the page to modify a draft specified by its ID
	} elseif ($_GET['action'] === 'adminEditDraft') {
		if (isset($_SESSION['status'])) {
			if (isset($_GET['draftId']) && $_GET['draftId'] > 0) {
				adminEditDraftOpen();
			}	
		} else {
			connectionPageOpen();
		}

	// Modify the title and content of a Draft specified by its ID
	} elseif ($_GET['action'] === 'editDraft') {
		if (isset($_SESSION['status'])) {
			if (isset($_GET['draftId']) && $_GET['draftId'] > 0) {
				adminModifyDraft($_GET['draftId'] , $_POST['updateDraftContent'] , $_POST['updateDraftTitle']);
			}
		} else {
			connectionPageOpen();
		}

	// Change a Draft into a Post
	} elseif ($_GET['action'] === 'publishDraft') {
		if (isset($_SESSION['status'])) {
			if (isset($_GET['draftId']) && $_GET['draftId'] > 0) {
				publishDraft($_GET['draftId']);
			}
		} else {
			connectionPageOpen();
		}
	}

// Redirect to the page with all Posts
} else {
	listPosts();
}
	
?>