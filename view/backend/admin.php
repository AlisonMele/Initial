<?php $title = htmlspecialchars_decode('Billet simple pour l\'Alaska'); ?>
<head>
<meta charset="utf-8">
</head>

<body>
<?php ob_start(); ?>
<div class="container">
            <nav class="navbar navbar-default">
                <div class="navbar-header">
                    <a class="navbar-brand">Bienvenue dans l'espace administrateur</a>
                </div>
                    <ul class="nav navbar-nav">
                        <li class="col-xs-12 col-md-4"><a href="public/2-tinyMCE-avanced/edit.php">Ecrire un nouvel article</a></li>
                        <li class="col-xs-12 col-md-4"><a href="index.php?action=listReport">Modérer les commentaires</a></li>
                        <li class="col-xs-12 col-md-4"><a href="view/backend/deconnexion.php">Se déconnecter</a></li>
                    </ul>           
            </nav>
</div>
<div class="container">
<h1>Billet simple pour l'Alaska !</h1>

<?php
while ($data = $posts->fetch())
{
?>
<div class="news">

    <h3>
        <?= nl2br(htmlspecialchars_decode($data['title'])) ?>
        <em>le <?= $data['creation_date_fr'] ?> - </em><a href="index.php?action=removePost&amp;id=<?= $data['id'] ?>">Supprimer</a> - <a href="index.php?action=editPost&amp;id=<?= $data['id'] ?>">Modifier</a>
    </h3>
    
    <p>
        <?= nl2br(htmlspecialchars_decode($data['content'])) ?>
    </p>

<?php
}
$posts->closeCursor();
?>
</div>
</div>
</body>
<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>

