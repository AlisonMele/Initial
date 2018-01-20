<head>
    <meta charset="utf-8" />
</head>
<h1>Billet simple pour Alaska!</h1>
<h2>Les derniers billets</h2>


    <div class="container">
        <h3>

            <?= htmlspecialchars($posts['title']) ?>
            <em>le <?= $posts['creation_date_fr'] ?></em><a href="index.php?delete=<?= $posts['id'] ?>">Supprimer</a>
        </h3>
        
       <p class="col-md-6">
            <?= nl2br(htmlspecialchars($posts['content'])) ?>
        </p>
    

<a href='http://localhost/p3/index.php'>Se déconnecter</a>
<a href='http://localhost/p3/public/2-tinyMCE-avanced/edit.php'>Ecrire un nouveau billet</a>



