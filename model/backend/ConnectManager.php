<?php 
require_once('model/Manager.php');

class ConnectManager extends Manager
{
	public function getConnect()
	{
		$db = $this->dbConnect();
		$connect = $db->prepare('SELECT * FROM `secure` where `pseudo` = ? AND `password` = ?');
		$connect->execute(array($_POST['pseudo'], $_POST['password']));
		$connexion = $connect->rowCount();
		return $connexion;
	}
}