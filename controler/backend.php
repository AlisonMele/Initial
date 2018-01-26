<?php
require_once('model/frontend/PostManager.php');
require_once('model/frontend/ReportComment.php');
require_once('model/frontend/CommentManager.php');
require_once('model/backend/ConnectManager.php');

function listComments() {
    $commentManager = new PostManager();
    $comments = $commentManager->getComments();

}
function getConnect()
{
	//echo 'controleur';
	$commentManager = new CommentManager();
	$comments = $commentManager->getComment();

	$postManager = new PostManager();
	$posts = $postManager->getPosts();

 	$connect = new ConnectManager();
 	$connexion = $connect->getConnect();
 	
 	//echo $connexion;
 	if($connexion == 1) {
 		session_start();
    	//echo 'Vous êtes connecté !';
 	   	require ('view/backend/admin.php');
 	
    	}
	else{
		echo '<script>alert("Mauvais identifiant ou mot de passe");</script>';
		//exit();
		require('view/backend/connect.php');
		}
}

/*function backlistPosts() {
    $postManager = new PostManager();
    $posts = $postManager->getPosts();
}
function backPost()
{
    $postManager = new PostManager();
    $post = $postManager->getPost($_GET['id']);
  
}*/
function listReport()
{
    $listReport = new ReportCommentmodel();
    //$listReport = new PostManager();
    $comments = $commentManager->getComments($id);
    $listreport = $listReport->listReport();

    if($id == $commentId) {
		echo $listreport;
    }

    else {
    	echo('Aucun commentaire signalé !');
    }
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
			require('view/backend/admin.php');
		}
}
/*function draftCopy($title, $content)
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
}*/
function editPost($postId)
{
	//echo 'controleur';

	$edit_post = new PostManager();

	$edit = $edit_post->editPost($_GET['id']);

	if($edit->rowCount() == 1) {
		require('public/2-tinyMCE-avanced/write.php');

	} else {
		die('Erreur : l\'article concerné n\'existe pas !');
	}
}
function newPost($title, $content)
{

	$newPost = new PostManager();

	$savePost = $newPost->newPost($title, $content);

	if ($savePost === false) {
		throw new Exception('Impossible d\'ajouter l`\'article');
	}
		else {
			echo 'L\'article a été ajouté';			
			
			//require('localhost/p3/index.php?action=getConnect');
		}
}

function removePost($postId)
{
	//echo 'controleur';
	$removePost = new PostManager();
	$remove = $removePost->removePost($_GET['id']);

	if ($remove === false) {
		echo '<script>alert("L\'article n\a pas été supprimé");</script>';	
	
	}
		else {

			echo '<script>alert("L\article a été supprimé");</script>';

		}
}
function removeComment($id)
{
	//echo 'controleur';
	$removeComment = new CommentManager();
	$remove = $removeComment->removeComment($_GET['id']);

	if ($remove === false) {
		echo '<script>alert("Le commentaire n\a pas été supprimé");</script>';	
	
	}
		else {

			echo '<script>alert("Le commentaire a été supprimé");</script>';

		}
}