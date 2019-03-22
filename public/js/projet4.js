
// SHOW/HIDE THE REPORTED COMMENT TITLE IN ADMIN BOARD
let reportedComment = document.getElementsByClassName("commentsReportedAdminList")[0];
let reportedCommentTitle = document.getElementById("reportedCommentTitle");

if (reportedComment == undefined) {
	if (reportedCommentTitle != undefined ) {
		reportedCommentTitle.style.display = 'none';
	};
};


// OPEN AND CLOSE NAVIGATOR

let navigatorButton = document.getElementById("navOpener");
let menu = document.getElementById("navigator");
let status = false;

navigatorButton.addEventListener("click", function() {
	if (status === false) {
	menu.style.width = '90%';
	status = true;
} else {
	menu.style.width = '0%';
	status = false;
}
})



