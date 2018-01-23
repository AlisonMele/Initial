<head>
    <meta charset="utf-8" />
</head>
<?php
session_start();
session_destroy();
?>
<?php $title = htmlspecialchars_decode($post['title']); ?>

<?php ob_start(); ?>
<h1>Billet simple pour l'Alaska !</h1>
<a href="public/2-tinyMCE-avanced/edit.php">Editeur de texte</a>
<a href="view/backend/deconnexion.php" target="_blank">Déconnexion</a>
Bienvenue dans l'espace administrateur <?php echo $_SESSION['pseudo']; ?>
<?php
while ($data = $posts->fetch())
{
?>
<div class="news">

    <h3>
        <?= nl2br(htmlspecialchars_decode($data['title'])) ?>
        <em>le <?= $data['creation_date_fr'] ?></em><a href="index.php?removePost&amp;id=<?= $data['id'] ?>">Supprimer</a> <a href="index.php?editPost&amp;id=<?= $data['id'] ?>">Modifier</a>
    </h3>
    
    <p>
        <?= nl2br(htmlspecialchars_decode($data['content'])) ?>
    </p>
   <?php
}
$posts->closeCursor();
?>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('c:/wamp/www/p3/view/template.php'); ?>




