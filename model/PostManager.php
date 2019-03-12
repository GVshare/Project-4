<?php  

require_once("model/Manager.php");

class PostManager extends Manager {

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
};

?>