<?php

require_once("model/Manager.php");

class ConnectionManager extends Manager {

	private $login; 
	private $password;

	public function getUserInfo($login, $password) {

		$db = $this->dbConnect();
		
		$req = $db->prepare('
			SELECT id, login, password 
			FROM users 
			WHERE login = ?');

		$req->execute(array(htmlspecialchars($login)));

		$result = $req->fetch();

		return $result;
	}
}