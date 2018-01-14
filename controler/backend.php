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
/*function getConnect($pseudo, $password)
{
	echo 'controleur';
	if (!$_SESSION['secure']) {
		header('location: view/backend/connect.php');
	}
 	$connect = new ConnectManager();
 	if($pseudo = $_POST['pseudo'] && $password = $_POST['password']) {
 	  	require ('view/backend/admin.php');
    	}
	else {
		echo 'Mauvais identifiant ou mot de passe';
		}
	}*/
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
