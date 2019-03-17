<?php  

require 'controller/FrontEnd.php';
require 'controller/Connection.php';
require 'controller/BackEnd.php';

if (isset($_GET['action'])) {

	// ================================================= READERS ===========================================================
	
	if ($_GET['action'] === 'post') {
		if (isset($_GET['id']) && $_GET['id'] > 0) {
    		postView();
    	}

	} elseif ($_GET['action'] === 'addComment') {
		if (isset($_GET['id']) && $_GET['id'] > 0) {
			if (!empty($_POST['author']) && !empty($_POST['comment'])) {
            	addComment($_GET['id'], $_POST['author'], $_POST['comment']);
        	}
		}

	} elseif ($_GET['action'] === 'reportComment') {
		if (isset($_GET['commentId']) && $_GET['commentId'] > 0) {
    		reportComment($_GET['commentId']);
    	}

	} elseif ($_GET['action'] === 'deleteComment') {
		if (isset($_GET['commentId']) && $_GET['commentId'] > 0) {
    		deleteComment($_GET['commentId']);
    	}

	// ================================================ CONNECTION ==========================================================

	} elseif ($_GET['action'] === 'connectionPage') {
		connectionPageOpen();

	} elseif ($_GET['action'] === 'checkUserInfo') {
		if (isset($_POST['login']) && isset($_POST['password'])){
            checkInfoValidity(htmlspecialchars($_POST['login']) , htmlspecialchars($_POST['password']));
        }

    } elseif ($_GET['action'] === 'logOut') {
		logOut();

    // =============================================== ADMINISTRATOR ========================================================

    } elseif ($_GET['action'] === 'adminDeleteComment') {
		if (isset($_GET['commentId']) && $_GET['commentId'] > 0) {
    		adminDeleteComment($_GET['commentId']);
    	} else {
			connectionPageOpen();
		}

    } elseif ($_GET['action'] === 'adminApproveComment') {
		if (isset($_GET['commentId']) && $_GET['commentId'] > 0) {
    		adminApproveComment($_GET['commentId']);
    	} else {
			connectionPageOpen();
		}

	} elseif ($_GET['action'] === 'adminBoard')  {
		if (isset($_SESSION['status'])) {
			adminBoardOpen();
		} else {
			connectionPageOpen();
		}

	} elseif ($_GET['action'] === 'adminComments') {
		if (isset($_SESSION['status'])) {
			adminCommentsOpen();
		} else {
			connectionPageOpen();
		}

	} elseif ($_GET['action'] === 'adminPosts') {
		if (isset($_SESSION['status'])) {
			adminPostsOpen();
		} else {
			connectionPageOpen();
		}

	} elseif ($_GET['action'] === 'adminChapterView') {
		if (isset($_SESSION['status'])) {
			adminMyChapterOpen();
		} else {
			connectionPageOpen();
		}

	} elseif ($_GET['action'] === 'adminDeleteChapter') {
		if (isset($_SESSION['status'])) {
			if (isset($_GET['postId']) && $_GET['postId'] > 0) {
			adminDeleteChapter($_GET['postId']);
			}
		} else {
			connectionPageOpen();
		}

	} elseif ($_GET['action'] === 'adminModifyChapter') {
		if (isset($_SESSION['status'])) {
			if (isset($_GET['postId']) && $_GET['postId'] > 0) {
			adminModifyChapterOpen();
			}
		} else {
			connectionPageOpen();
		}

	} elseif ($_GET['action'] === 'modifyPost') {
		if (isset($_SESSION['status'])) {
			if (isset($_GET['postId']) && $_GET['postId'] > 0) {
				adminModifyChapter($_GET['postId'] , $_POST['updatePostContent'] , $_POST['updatePostTitle']);
			}
		} else {
			connectionPageOpen();
		}

	} elseif ($_GET['action'] === 'adminNewChapter') {
		if (isset($_SESSION['status'])) {
			adminNewChaptersOpen();
		} else {
			connectionPageOpen();
		}

	} elseif ($_GET['action'] === 'addDraft') {
		if (isset($_SESSION['status'])) {
			adminAddDraft();
		} else {
			connectionPageOpen();
		}

	} elseif ($_GET['action'] === 'deleteDraft') {
		if (isset($_SESSION['status'])) {
			if (isset($_GET['draftId']) && $_GET['draftId'] > 0) {
				adminDeleteDraft($_GET['draftId']);
			}	
		} else {
			connectionPageOpen();
		}

	} elseif ($_GET['action'] === 'adminEditDraft') {
		if (isset($_SESSION['status'])) {
			if (isset($_GET['draftId']) && $_GET['draftId'] > 0) {
				adminEditDraftOpen();
			}	
		} else {
			connectionPageOpen();
		}

	} elseif ($_GET['action'] === 'editDraft') {
		if (isset($_SESSION['status'])) {
			if (isset($_GET['draftId']) && $_GET['draftId'] > 0) {
				adminModifyDraft($_GET['draftId'] , $_POST['updateDraftContent'] , $_POST['updateDraftTitle']);
			}
		} else {
			connectionPageOpen();
		}

	} elseif ($_GET['action'] === 'publishDraft') {
		if (isset($_SESSION['status'])) {
			if (isset($_GET['draftId']) && $_GET['draftId'] > 0) {
				publishDraft($_GET['draftId']);
			}
		} else {
			connectionPageOpen();
		}
	}





} else {
	listPosts();
}
	
?>