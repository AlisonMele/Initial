<?php
require_once('model/frontend/PostManager.php');
require_once('model/frontend/ReportComment.php');
require_once('/model/frontend/CommentManager.php');
require_once('/model/backend/ConnectManager.php');

function getConnect()
{
	
	$commentManager = new CommentManager();
	$comments = $commentManager->getComment();

	$postManager = new PostManager();
	$posts = $postManager->getPosts();

 	$connect = new ConnectManager();
 	$connexion = $connect->getConnect();
 	
 	
 	if($connexion == 1) {
 		session_start();
    		require ('view/backend/admin.php');
		}
       	
	else{
			echo '<script>alert("Mauvais identifiant ou mot de passe");</script>';
			
			require('../backend/connect.php');
		}
}


function getReport()
{
	echo 'controler';
    $reportcomment = new ReportCommentmodel();
    $reports = $reportcomment->getReport();

    require('view/backend/signalement.php');
 
}


function addPost($title, $content)
{

	$addPost = new PostManager();

	$affectedLines = $addPost->addPost($title, $content);

	if ($affectedLines === false) {
		throw new Exception('Impossible d\'ajouter l`\'article');
	}
		else {
			echo 'L\'article a été ajouté';			
			require('./view/backend/confirmation.php');
		}
}
function editPost($postId)
{
	

	$edit_post = new PostManager();

	$edit = $edit_post->editPost($_GET['id']);

	if($edit->rowCount() == 1) {
		require('./public/2-tinyMCE-avanced/write.php');

	} else {
		die('Erreur : l\'article concerné n\'existe pas !');
	}
}
function newPost($id, $title, $content)
{

	$newpost = new PostManager();
	$savepost = $newpost->newPost($title, $content, $id);

	if ($savepost === false) {
		throw new Exception('Impossible d\'ajouter l`\'article');
	}
		else {

			require('./view/backend/confirmation.php');
			echo 'L\'article a été modifié';

		}
}

function removePost($postId)
{
	
	$removePost = new PostManager();
	$remove = $removePost->removePost($id, $title, $content);

	if ($remove === false) {
		echo '<script>alert("L\'article n\a pas été supprimé");</script>';	
	
	}
		else {

			require('./view/backend/confirmation.php');

		}
}
function removeComment($id)
{
	
	$removeComment = new CommentManager();
	$remove = $removeComment->removeComment($_GET['id']);


	if ($remove === false) {
		echo '<script>alert("Le commentaire n\a pas été supprimé");</script>';	
	
	}
		else {

			require('./view/backend/confirmation.php');

		}
}
function keepComment($id)
{
	
	$keepComment = new CommentManager();
	$keep = $keepComment->keepComment($_GET['id']);

	$startReport = new ReportCommentmodel();
	$start = $startReport->startReport($_GET['id']);

	if ($keep === false) {
		echo '<script>alert("Le commentaire n\a pas été validé");</script>';	
	
	}
		else {

			echo '<script>alert("Le commentaire a été conservé");</script>';

		}
}