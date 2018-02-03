<?php $title = htmlspecialchars_decode($post['title']); ?>

<?php ob_start(); ?>
<div class="container">
            <nav class="navbar navbar-default">
                <div class="navbar-header">
                    <h1 class="navbar-brand col-md-12" href="index.php">Billet simple pour l'Alaska - <?= $title ?></h1>
                    
                </div>          
            </nav>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>

                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item">
                                <img src="public/alaska.jpg" alt="">
                                <div class="carousel-caption">
                                </div>
                            </div>
                            <div class="item  active">
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
<p><a href="index.php">Retour à la liste des billets</a></p>
</div>
<div class=" container">
    <div class="news">
        <h3>
            <?= htmlspecialchars_decode($post['title']) ?>
            <em>le <?= $post['creation_date_fr'] ?></em>
        </h3>
        
        <p>
            <?= nl2br(htmlspecialchars_decode($post['content'])) ?>
        </p>

    <h2>Commentaires</h2>
    <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
        <div>
            <label for="author">Auteur</label><br />
            <input type="text" id="author" name="author" />
        </div>
        <div>
            <label for="comment">Commentaire</label><br />
            <textarea id="comment" name="comment"></textarea>
        </div>
        <div>
            <input type="submit" />
        </div>
    </form>

    <?php
    while ($comment = $comments->fetch())
    {
    ?>
        <p><strong><?= htmlspecialchars_decode($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?>   
        <p><?= nl2br(htmlspecialchars_decode($comment['comment'])) ?></p>
        <a href="index.php?action=reportComment&amp;id=<?= $comment['id'] ?>">Signaler le commentaire</a>

    <?php 
    }
    ?>
    </div>
</div>
<footer>       
        <div class="container">
        <p class="col-md-12">Copyright &copy;<?php echo strftime("%Y"); ?> - <small>Alison MELE</small></p>
        </div>

</footer>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>