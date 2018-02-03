<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<?php $title = 'Billet simple pour l\'Alaska '; ?>
<link rel="stylesheet" href="./public/bootstrap/css/bootstrap.min.css" />
</head>
<?php ob_start(); ?>
 <div class="container">
            <nav class="navbar navbar-default">
                <div class="navbar-header">
                    <a class="navbar-brand" href="../../index.php">Billet simple pour l'Alaska</a>
                </div>
                    <ul class="nav navbar-nav">
                        <li class="active col-md"><a href="../../index.php">Accueil</a></li>
                        <li class="col-md"><a href="bio.php">A propos de Jean</a></li>
                    </ul>           
            </nav>
</div>
	       

<div class="container">
	<h1 class="col-md-12">Billet simple pour l'Alaska!</h1>
		<h2 class="col-md-12">Biographie</h2>
</div>
			<div class="container">
			<img class="col-xs-2 col-md-4" src="jean.jpg" alt="" class="img-responsive" />
			<p class="col-md-4">Jean Forteroche est un écrivain français renommé dans le monde grâce à de multiples nouvelles publiées depuis plus de 20 ans. Aujourd'hui, il se lance dans un nouveau projet pour toucher un public plus large. Par ce blog, son objectif est de communiquer avec ses lecteurs et de leur faire découvrir l'histoire au fur et à mesure de son écriture</p>
			<p class="col-md-12">Une question ? Vous pouvez me joindre sur l'adresse mail suivante : alaska@gmail.com</p>
			</div>

<?php $content = ob_get_clean(); ?>

<?php require('../template.php'); ?>

</html>