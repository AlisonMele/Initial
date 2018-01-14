<?php $title = 'Billet simple pour l\'Alaska '; ?>

<?php ob_start(); ?>
<div class="container">
<h1 class="col-md-12">Billet simple pour l'Alaska!</h1>
<h2 class="col-md-12">Biographie</h2>
<img src="public/jean.jpg" alt="" class="img-responsive" />
</div>

<a href='view/backend/connect.php'>Accéder à l'administration</a>
<?php $content = ob_get_clean(); ?>

<?php require('C:/wamp/www/p3/view/template.php'); ?>