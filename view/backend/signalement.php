<html>
<head>
	<meta charset="utf8">
</head>
<body>
<h1>Billet simple pour l'Alaska !</h1>

<h3>Liste des commentaires signalés</h3>
<?php
while ($comment = $comments->fetch())
{
?>
    <p><strong>Auteur : <?= htmlspecialchars_decode($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?> - <a href="index.php?action=removeComment&amp;id=<?= $comment['id'] ?>">Supprimer</a>   
    <p>Commentaire : <?= nl2br(htmlspecialchars_decode($comment['comment'])) ?></p>
<?php 
}
$comments->closeCursor();
?>

<a href="view/backend/deconnexion.php" target="_blank">Déconnexion</a>
<a href="view/backend/admin.php" target="_blank">Retour à la page d'accueil</a>

</body>
</html>