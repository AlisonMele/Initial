<?php 
require_once('controler/frontend.php');
require_once('controler/backend.php');
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'addPost') {
            if (!empty($_POST['title']) && !empty($_POST['content'])) {
                addPost($_POST['title'], $_POST['content']);
            }
            else {
                echo 'Erreur : tous les champs ne sont pas remplis !';
            }
    }
    /*if ($_GET['action'] == 'removePost') {
            if (!empty($_POST['title']) && !empty($_POST['content'])) {
                removePost($_POST['title'], $_POST['content']);
            }
            else {
                echo 'Erreur : tous les champs ne sont pas remplis !';
            }
    }*/
    if ($_GET['action'] == 'draftCopy') {
            echo 'routeur';
            if (!empty($_POST['title']) && !empty($_POST['content'])) {
                draftCopy($_POST['title'], $_POST['content']);
            }
            else {
                echo 'Erreur : tous les champs ne sont pas remplis !';
            }
    }
    if ($_GET['action'] == 'getConnect') {
            echo 'routeur';
            if(!empty($_POST['pseudo']) && !empty($_POST['password'])) {
               getConnect($_POST['pseudo'], $_POST['password']);
            }
            else {
                echo 'Identifiant ou mot de passe manquant';
            }
    }
}
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'listPosts') {
        listPosts();
    }
    elseif ($_GET['action'] == 'post') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            post();
        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
    elseif ($_GET['action'] == 'addComment') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {

            if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                addComment($_GET['id'], $_POST['author'], $_POST['comment']);
            }
            else {
                echo 'Erreur : tous les champs ne sont pas remplis !';
            }
        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
    if ($_GET['action'] == 'reportComment'){
        if (!empty($_POST['pseudo']) && !empty($_POST['commentId'])) {
                reportComment($_POST['pseudo'], $_POST['commentId']);
            }
        else {
            echo 'Erreur : tous les champs ne sont pas remplis !';
            }
        }
}
else {
    listPosts();
}

/*if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listReport') {
            listReport();
        }    
        elseif ($_GET['action'] == 'listReport') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            }
            else {
                echo 'Erreur : aucun identifiant de billet envoyé';
            }
        }
    }*/