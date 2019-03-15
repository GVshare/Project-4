
// SHOW/HIDE THE REPORTED COMMENT TITLE IN ADMIN BOARD
let reportedComment = document.getElementsByClassName("commentsReportedAdminList")[0];
let reportedCommentTitle = document.getElementById("reportedCommentTitle");

if (reportedComment == null) {
	reportedCommentTitle.style.display = 'none';
};
