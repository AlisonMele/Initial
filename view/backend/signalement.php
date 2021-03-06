<?php
session_start();
session_destroy();
?>
<html>
<?php $title = htmlspecialchars_decode('Billet simple pour l\'Alaska'); ?>
<head>
	<meta charset="utf8">
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
                        <li class="col-xs-12 col-md-4"><a href="index.php?action=getReport">Modérer les commentaires</a></li>
                        <li class="col-xs-12 col-md-4"><a href="./connect.php">Se déconnecter</a></li>
                    </ul>           
            </nav>


<h1>Billet simple pour l'Alaska !</h1>
<a href="index.php?action=getConnect">Retour à la page principale</a>

<h3>Liste des commentaires signalés</h3>
<table>
		<tr>
			<td class="col-xs-4"><strong>Auteur</strong></td>
			<td class="col-xs-4"><strong>Commentaire</strong></td>
			<td class="col-xs-4"><strong>Action</strong></td>
		</tr><br />
<?php
while ($signalement = $reports->fetch())
{
?>
		<tr>
			<td class="col-md-4"><?= htmlspecialchars_decode($signalement['author']) ?></td>
			<td class="col-md-4"><?= nl2br(htmlspecialchars_decode($signalement['comment'])) ?></td>
			<td><a href="index.php?action=removeComment&amp;id=<?= $signalement['id'] ?>">Supprimer</a> - <a href="index.php?action=keepComment&amp;id=<?= $signalement['id'] ?>">Valider</a></td>
		</tr>
	
<?php 
}
$reports->closeCursor();
?>
</table>
</body>
<?php $content = ob_get_clean(); ?>
</div>
</html>

<?php require('view/template.php'); ?>