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
	//echo 'controleur';
 	$connect = new ConnectManager();

 	$connexion = $connect->getConnect();
 	
 	//echo $connexion;
 	if($connexion == 1) {
 	 	//echo "pseudo ok";
 	   	require ('view/backend/admin.php');
 	
    	}
	else{
		echo 'Mauvais identifiant ou mot de passe';
		require ('view/backend/connect.php');
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
		throw new Exception('Impossible d\'enregistrer le brouillon');
	}
		else {
			require('view/backend/admin.php');
		}
}
function editPost($title, $content)
{
	echo 'controleur';
	$editPost = new PostManager();

	$post = $editPost->editPost($title, $content);

	if ($post === false) {
		throw new Exception('Impossible d\'afficher l`\'article');
	}
		else {
			require('public/2-tinyMCE-avanced/edit.php');
		}
}
function removePost($title, $content)
{
	echo 'controleur';
	$removePost = new PostManager();

	$remove = $removePost->removePost($title, $content);

	if ($remove === false) {
		throw new Exception('Impossible d\'ajouter l`\'article');
	}
		else {
			require('view/backend/admin.php');
		}
}