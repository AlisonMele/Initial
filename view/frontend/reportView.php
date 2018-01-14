<?php ob_start(); ?>
<h1>Billet simple pour l'Alaska !</h1>
<p>Le commentaire a été signalé,<a href="index.php">retour à la liste des articles</a></p>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>