<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />

        <title><?= $title ?></title>
 		<link rel="stylesheet" href="public/bootstrap/css/bootstrap.min.css" />
    </head>
        
    <body>
    	<div class="container">
    		<nav class="navbar navbar-default navbar-fixed-top">
    			<div class="navbar-header">
    				<a class="navbar-brand" href="index.php">Billet simple pour l'Alaska</a>
    			</div>
	    			<ul class="nav navbar-nav">
	    				<li class="active col-md-2"><a href="index.php">Accueil</a></li>
	    				<li class="col-md-2"><a href="view/frontend/bio.php">A propos de Jean</a></li>
	    				<li class="col-md-2"><a href="contact.html">Contact</a></li>
	    			</ul>
	    			<form class="navbar-form pull-right col-md-2">
	    				<input type="text" class="input-small" placeholder="Rechercher">
	    				<button type="submit" class="btn btn-primary btn-xs">
	    						<span class="glyphicon glyphicon-eye-open"></span>
	    						Chercher</button>
	    			</form>
    		
    		</nav>
    	</div>
        <?= $content ?>
    </body>
</html>