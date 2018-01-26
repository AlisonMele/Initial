<?php $title = 'Billet simple pour l\'Alaska '; ?>

<?php ob_start(); ?>
<div class="container">
<img src="public/alaska.jpg" alt="" class="img-responsive" />
<h1 class="col-md-12">Billet simple pour l'Alaska!</h1>
<h2 class="col-md-12">Les derniers billets</h2>
</div>
<?php
while ($data = $posts->fetch())
{
?>
    <div class="container">
        <h3 class="col-md-6">
            <?= htmlspecialchars_decode($data['title']) ?>
            <em>le <?= $data['creation_date_fr'] ?></em>
        </h3>
        
        <p class="col-md-6">
            <?= nl2br(htmlspecialchars_decode($data['content'])) ?>
            <br />
            <em><a href='index.php?action=post&amp;id=<?= $data['id'] ?>'>Commentaires</a></em>
        </p>
    
<?php
}
$posts->closeCursor();
?>
    </div>
<a href='view/backend/connect.php'>Accéder à l'administration</a>
<?php $content = ob_get_clean(); ?>

<?php require('C:/wamp/www/p3/view/template.php'); ?>
