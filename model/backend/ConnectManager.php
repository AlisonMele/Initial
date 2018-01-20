<?php 
require_once('model/Manager.php');

class ConnectManager extends Manager
{
	public function getConnect()
	{
		$db = $this->dbConnect();
		$connect = $db->prepare('SELECT * FROM `secure` WHERE `pseudo` = ? AND `password` = ?');
		//SELECT * FROM `secure` WHERE `pseudo` = 'alison' AND `password` = 'Victoria' 
		/*$connect->execute(
			'pseudo' = $_POST['pseudo'],
			'password' = $_POST['password']
		);
/*$connect -> bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
$connect -> bindParam(':password', $password, PDO::PARAM_STR);*/
$connect ->fetch();
		/*$connect->execute(array(
			'pseudo' =>$_POST['pseudo'],
			'password' => $_POST['password']));
		$connexion = $connect->rowCount();
		

		//$connect = $db->prepare('SELECT `pseudo`, `password` FROM `secure`');

		

		/*$connect->execute();
		$connexion = $connect->fetch();
			
	//$req = $db->query('SELECT * FROM secure');
	//$connect = $connect->fetch();	
	}*/

	}
}