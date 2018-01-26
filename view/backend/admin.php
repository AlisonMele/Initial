<head>
<meta charset="utf-8">
</head>

<body>
<h1>Billet simple pour l'Alaska !</h1>
<a href="public/2-tinyMCE-avanced/edit.php" target="_blank">Editeur de texte</a>
<a href="view/backend/deconnexion.php" target="_blank">Déconnexion</a>
<a href="view/backend/signalement.php" target="_blank">Liste des commentaires signalés</a>

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

</body>