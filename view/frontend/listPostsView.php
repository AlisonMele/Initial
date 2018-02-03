<?php $title = 'Billet simple pour l\'Alaska le Blog de Jean Forteroche'; ?>
<head>
    <script src="bootstrap/js/jquery.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="public/bootstrap/css/bootstrap.min.css" />
</head>
<?php ob_start(); ?>
<div class="container">
            <nav class="navbar navbar-default">
                <div class="navbar-header">
                    <h1 class="navbar-brand col-md-12" href="index.php">Billet simple pour l'Alaska</h1>
                </div>         
            </nav>
</div>
<div class="container">
     <div class="row">
        <div class="col-md-12">
            <div id="carousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#carousel0" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel1" data-slide-to="1"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <img src="public/alaska.jpg" alt="">
                                </div>
                            
                            <div class="item">
                                <img src="public/landscape.jpg" alt="">
                            </div>
                        </div>
                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
            </div>
        </div>
    </div>

    <h2 class="col-md-12">Les derniers billets</h2>

    <?php
    while ($data = $posts->fetch())
    {
    ?>
        
            <h3 class="col-md-12">
                <?= htmlspecialchars_decode($data['title']) ?>
                <em>le <?= $data['creation_date_fr'] ?></em>
            </h3>
            
            <p class="col-md-12">
                <?= nl2br(htmlspecialchars_decode($data['content'])) ?>
                <br />
                <em><a href='index.php?action=post&amp;id=<?= $data['id'] ?>'>Commentaires</a></em>
            </p>
        
    <?php
    }
    $posts->closeCursor();
    ?>
    <a href='view/backend/connect.php'>Accéder à l'administration</a>
    <footer>
            <h3 class="col-md-12"><strong>A propos de l'auteur</strong></h3> 
            <img src="public/jean.jpg" alt="" class="img-responsive col-md-2" />     
            <p class="col-md-6">Jean Forteroche est un écrivain français renommé dans le monde grâce à de multiples nouvelles publiées depuis plus de 20 ans. Aujourd'hui, il se lance dans un nouveau projet pour toucher un public plus large. Par ce blog, son objectif est de communiquer avec ses lecteurs et de leur faire découvrir l'histoire au fur et à mesure de son écriture <strong>Une Une question ? Vous pouvez me joindre sur l'adresse mail suivante : alaska@gmail.com</strong></p>
            
            <p class="col-md-12">Copyright &copy;<?php echo strftime("%Y"); ?> - <small>Alison MELE</small></p>
            

    </footer>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('C:/wamp/www/p3/view/template.php'); ?>

