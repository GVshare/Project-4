<?php

require_once("model/Manager.php");

class ConnexionManager extends Manager {

	public function findUser($login, $password) {

		$db = $this->dbConnect();
		
		$req = $db->prepare('
			SELECT id, name, login, password 
			FROM users 
			WHERE login = ?');

		$req->execute(array($login));
		$result = $req->fetch();

		return $result;
	}
}