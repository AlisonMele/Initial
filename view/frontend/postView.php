<?php $title = htmlspecialchars_decode($post['title']); ?>

<?php ob_start(); ?>
<h1>Billet simple pour l'Alaska !</h1>
<p><a href="index.php">Retour à la liste des billets</a></p>

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
    <form action="index.php?action=reportComment" method="post">
        <label for="pseudo">Votre nom : </label> <input type ="text" id="pseudo" name="pseudo" required />
        <input type="hidden" name="commentId" id="commentId" value="<?= $comment['id'] ?>" />
        <input type="submit" name="reportcomments" value="Signaler le commentaire" /></p>
    </form>
<?php 
}
/*"<? echo $comment->getId(); ?>"*/
?>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>