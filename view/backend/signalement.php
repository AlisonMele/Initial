<html>
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
                        <li class="col-xs-12 col-md-4"><a href="view/backend/signalement.php">Modérer les commentaires</a></li>
                        <li class="col-xs-12 col-md-4"><a href="view/backend/deconnexion.php">Se déconnecter</a></li>
                    </ul>           
            </nav>


<h1>Billet simple pour l'Alaska !</h1>

<h3>Liste des commentaires signalés</h3>
<table>
		<tr>
			<td class="col-xs-4"><strong>Auteur</strong></td>
			<td class="col-xs-4"><strong>Commentaire</strong></td>
			<td class="col-xs-4"><strong>Action</strong></td>
		</tr><br />
<?php
while ($comment = $comments->fetch())
{
?>
		<tr>
			<td class="col-md-4"><?= htmlspecialchars_decode($comment['author']) ?></td>
			<td class="col-md-4"><?= nl2br(htmlspecialchars_decode($comment['comment'])) ?></td>
			<td><a href="index.php?action=removeComment&amp;id=<?= $comment['id'] ?>">Supprimer</a> - <a href="index.php?action=keepComment&amp;id=<?= $comment['id'] ?>">Valider</a></td>
		</tr>
	
<?php 
}
$comments->closeCursor();
?>
</table>

<a href="view/backend/deconnexion.php" target="_blank">Déconnexion</a>
<a href="view/backend/admin.php" target="_blank">Retour à la page d'accueil</a>

</body>
<?php $content = ob_get_clean(); ?>
</div>
</html>

<?php require('view/template.php'); ?>