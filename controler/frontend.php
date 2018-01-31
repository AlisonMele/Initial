<?php

require_once('model/frontend/PostManager.php');
require_once('model/frontend/CommentManager.php');


function listPosts() {
    $postManager = new PostManager();
    $posts = $postManager->getPosts();

    require('view/frontend/listPostsView.php');

}
function post()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/frontend/postView.php');
}
function addComment($postId, $author, $comment)
{
    $commentManager = new CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}
function reportComment()
{
    echo 'controler';
    $report = new CommentManager();
    $reportcomment = $report->reportComment($_GET['id']);  

    if($reportcomment === false) {
        echo 'Le commentaire n\a pas été signalé !';
    }
    else {
        require('view/frontend/reportView.php');
    }
    
}
