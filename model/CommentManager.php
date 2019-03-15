<!-- THE MODEL IS PICKING THE INFORMATIONS IN THE DATABASE AND SENDING TO THE CONTROLLER -->

<?php  
// Get the database
require_once("model/Manager.php");

class CommentManager extends Manager {
	
	public function getComments($postId){

	    $db = $this->dbConnect();

	    $comments = $db->prepare('
	    	SELECT id, upper(author) AS author, comment, DATE_FORMAT(commentDate, \'%d/%m/%Y à %Hh%imin%ss\') AS commentDateFr, reported
	    	FROM comments 
	    	WHERE idPost = ? 
	    	ORDER BY commentDate DESC'
	    );	

	    $comments->execute(array($postId));

	    return $comments;
	}

	public function getAllComments() {

	    $db = $this->dbConnect();

	    $comments = $db->prepare('
	    	SELECT id, idPost, upper(author) AS author, comment, DATE_FORMAT(commentDate, \'%d/%m/%Y à %Hh%imin%ss\') AS commentDateFr, reported
	    	FROM comments 
	    	ORDER BY commentDate DESC'
	    );	

	    $comments->execute();

	    return $comments;
	}

	public function getReportedComments() {
		$db = $this->dbConnect();

		$reportedComments = $db->prepare('
			SELECT id, idPost, reported, upper(author) AS author, comment, DATE_FORMAT(commentDate, \'%d/%m/%Y à %Hh%imin%ss\') AS commentDateFr 
			FROM comments
			WHERE reported = 1 '
		);

		$reportedComments->execute();

		return $reportedComments;
	}

	public function postComment($postId, $author, $comment) {

	    $db = $this->dbConnect();
	    $comments = $db->prepare('
	    	INSERT INTO comments(idPost, author, comment, commentDate) 
	    	VALUES(?, ?, ?, NOW())');

	    $affectedLines = $comments->execute(array($postId, $author, $comment));

	    return $affectedLines;
	}

	public function reportComment($commentId) {

		$db = $this->dbConnect();
		$comment = $db->prepare('
			UPDATE comments 
			SET reported = 1
			WHERE id = ? '
		);

		$comment->execute(array($commentId));
	}

	public function deleteComment($commentId) {
		$db = $this->dbConnect();
		$req = $db->prepare('
			DELETE FROM comments 
			WHERE id = ? '
		);
        $affectedComment = $req->execute(array($commentId));

        return $affectedComment;
	}

	public function approveComment($commentId) {
		$db = $this->dbConnect();
		$req = $db->prepare('
			UPDATE comments
			SET reported = 0 
			WHERE id = ? '
		);
        $affectedComment = $req->execute(array($commentId));

        return $affectedComment;
	}

	public function commentInfos($commentId) {
		$db = $this->dbConnect();
        $req = $db->prepare('
        	SELECT id, idPost, author, comment, reported
        	FROM comments 
        	WHERE id = ?');

        $req->execute(array($commentId));
        $commentInfos = $req->fetch();

        return $commentInfos;
	}
};

?>