<?php  

require_once("model/Manager.php");

class PostManager extends Manager {

	private $postId;
	private $postAuthor; 
	private $postTitle; 
	private $postContent; 
	private $postDate;

	public function getPosts(){
		$db = $this->dbConnect();

		$req = $db->query('
			SELECT id, title, content, author, DATE_FORMAT(commentDate, \'%d/%m/%Y à %Hh%imin%ss\') AS commentDateFr 
			FROM posts 
			ORDER BY commentDate DESC 
			LIMIT 0, 5'
		);

		return $req;
	}

	public function getPost($postId){
	    $db = $this->dbConnect();

	    $req = $db->prepare('
	    	SELECT id, title, content, author, DATE_FORMAT(commentDate, \'%d/%m/%Y à %Hh%imin%ss\') AS commentDateFr 
	    	FROM posts 
	    	WHERE id = ?'
	    );

	    $req->execute(array($postId));
	    $post = $req->fetch();

	    return $post;
	}

	public function deletePost($postId) {
		$db = $this->dbConnect();
		$req = $db->prepare('
			DELETE FROM posts 
			WHERE id = ? '
		);
    $affectedPost = $req->execute(array($postId));

    return $affectedPost;
	}

	public function modifyPostContent($postId , $postContent , $postTitle) {
		$db = $this->dbConnect();
		$req = $db->prepare('
		UPDATE `posts` 
		SET content = ? , title = ?
		WHERE id = ?'
		);
		$affectedPost = $req->execute(array($postContent , $postTitle , $postId));

       return $affectedPost;	
	}

	public function addPost($postAuthor , $postTitle , $postContent , $postDate) {
		$db = $this->dbConnect();
	    $post = $db->prepare('
	    	INSERT INTO posts(title, author, content, commentDate) 
	    	VALUES(? , ? , ? , NOW())'
	    );

	    $affectedLines = $post->execute(array($postTitle,$postAuthor,$postContent));

	    return $affectedLines;
	}
};

?>