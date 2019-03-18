<?php  

require_once("model/Manager.php");

class DraftManager extends Manager {

	private $draftId; 
	private $draftContent; 
	private $draftTitle;

	public function getAllDrafts() {
		$db = $this->dbConnect();

		$req = $db->query('
			SELECT id, title, content, author, DATE_FORMAT(draftDate, \'%d/%m/%Y à %Hh%imin%ss\') AS draftDateFr 
			FROM drafts 
			ORDER BY draftDate DESC 
			LIMIT 0, 5'
		);

		return $req;
	}

	public function addNewDraft() {
		$db = $this->dbConnect();
	    $req = $db->prepare('
	    	INSERT INTO drafts (author, title, content, draftDate) 
	    	VALUES ("Jean Forteroche" , "Nouveau Brouillon" , "Nouveau Brouillon" , NOW())
	    	');

	    $req->execute();

	    return $req;
	}

	public function deleteDraft($draftId) {
		$db = $this->dbConnect();
		$req = $db->prepare('
			DELETE FROM drafts 
			WHERE id = ? '
		);
        $affectedDraft = $req->execute(array($draftId));

        return $affectedDraft;
	}

	public function getDraft($draftId) {

		$db = $this->dbConnect();

	    $req = $db->prepare('
	    	SELECT id, title, content, author, DATE_FORMAT(draftDate, \'%d/%m/%Y à %Hh%imin%ss\') AS draftDate 
	    	FROM drafts 
	    	WHERE id = ?'
	    );

		$req->execute(array($draftId));
		$draft = $req->fetch();

	    return $draft;
	}

	public function modifyDraftContent($draftId , $draftContent , $draftTitle) {
		$db = $this->dbConnect();
		$req = $db->prepare('
		UPDATE `drafts` 
		SET content = ? , title = ? , draftDate = NOW()
		WHERE id = ?'
		);
		$affectedDraft = $req->execute(array($draftContent , $draftTitle , $draftId));

       return $affectedDraft;	
	}
}

?>