<?php 
session_start();
/*if(!empty($_POST['pseudo'])) {
    $_SESSION['pseudo'] = $_POST['pseudo'];
}
else
{
    echo '<script>alert("Vous devez être connecté !");</script>';
    require('index.php');
}*/

/*$cookiefin = time()+60*60*24;//Cookie valable 1 jour
setcookie('pseudo', $_SESSION['pseudo'], $cookiefin);*/
session_destroy();

require_once('controler/frontend.php');
require_once('controler/backend.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'getReport') {
        echo 'routeur';        
        getReport();
    }

   /* if ($_GET['action'] == 'listComments') {
        if(isset($_POST['author']) && !empty($_POST['comment'])) {
                listComments($_GET['author'], $_GET['comment']);
         }
        else {
            echo 'erreur vérif routeur';
        }
    }*/
    if ($_GET['action'] == 'removePost') {
        removePost($_GET['id']);
    }

    if ($_GET['action'] == 'removeComment') {
        removeComment($_GET['id']);
    }
    if ($_GET['action'] == 'keepComment') {
        if(isset($_GET['id'])){
        echo 'routeur';        
        keepComment($_GET['id']);
        }
        else {
            echo 'Aucun identifiant';
        }
    }
    if ($_GET['action'] == 'getConnect') {

            $_POST['password'] = md5($_POST['password']);
            if(!empty($_POST['pseudo']) && !empty($_POST['password'])) {
               getConnect($_POST['pseudo'], $_POST['password']);
                //session_start();
                /*$_SESSION['pseudo'] = $_POST['pseudo'];
                $_SESSION['password'] = $_POST['password'];
                $cookiefin = time()+60*60*24;//Cookie valable 1 jour
                setcookie('pseudo', $_SESSION['pseudo'], $cookiefin);*/
            }
            else {
                echo '<script>alert("Identifiant ou mot de passe manquant");</script>';
                require('view/backend/connect.php');
            }
    }
    if ($_GET['action'] == 'addPost') {
        $content = htmlspecialchars($_POST['content'], ENT_QUOTES);
            if (!empty($_POST['title']) && !empty($_POST['content'])) {
                addPost($_POST['title'], $_POST['content']);
            }
            else {
                echo 'Erreur : tous les champs ne sont pas remplis !';
            }
    }

    if ($_GET['action'] == 'editPost') {
                editPost($_GET['id']);
    }
    if ($_GET['action'] == 'newPost') {
        $content = htmlspecialchars($_POST['content'], ENT_QUOTES);
            if (!empty($_POST['title']) && !empty($_POST['content'])) {
                newPost($_POST['title'], $_POST['content']);
            }
            else {
                echo 'Erreur : tous les champs ne sont pas remplis !';
            }
    }
    if ($_GET['action'] == 'draftCopy') {
            echo 'routeur';
            if (!empty($_POST['title']) && !empty($_POST['content'])) {
                draftCopy($_POST['title'], $_POST['content']);
            }
            else {
                echo 'Erreur : tous les champs ne sont pas remplis !';
            }
    }
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
    if ($_GET['action'] == 'reportComment') {

            reportComment();      
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