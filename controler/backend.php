<?php
require_once('model/frontend/PostManager.php');
require_once('model/frontend/ReportComment.php');
require_once('model/backend/ConnectManager.php');
function listReport()
{
    $listReport = new ReportComment();
    $listreport = $listReport->listReport();

    require('view/backend/admin.php');
}
function getConnect()
{
	echo 'controleur';
 	$connect = new ConnectManager();
 	echo 'pdo ok';
 	$connexion = $connect->getConnect();
 	echo 'appel ok';
 	echo $connexion;
 	if($connexion == 1) {
 	 		echo "Pseudo ok";
 	   	require ('view/backend/admin.php');
 	
    	}
	else{
		echo 'Mauvais identifiant ou mot de passe';
		echo $_POST['pseudo'];
		echo $_POST['password'];



		}
}
function addPost($title, $content)
{

	$addPost = new PostManager();

	$affectedLines = $addPost->addPost($title, $content);

	if ($affectedLines === false) {
		throw new Exception('Impossible d\'ajouter l`\'article');
	}
		else {
			require('view/backend/admin.php');
		}
}
function draftCopy($title, $content)
{
	echo 'controleur';
	$draftCopy = new PostManager();

	$affectedLines = $draftCopy->draftCopy($title, $content);

	if ($affectedLines === false) {
		throw new Exception('Impossible d\'ajouter l`\'article');
	}
		else {
			require('view/backend/admin.php');
		}
}
