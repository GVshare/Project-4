<?php

require_once("model/Manager.php");

class ConnectionManager extends Manager {

	public function getUserInfo($login, $password) {

		$db = $this->dbConnect();
		
		$req = $db->prepare('
			SELECT id, login, password 
			FROM users 
			WHERE login = ?');

		$req->execute(array($login));

		$result = $req->fetch();

		return $result;
	}
}