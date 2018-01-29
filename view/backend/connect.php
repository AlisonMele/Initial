<?php $title = htmlspecialchars_decode('Billet simple pour l\'Alaska'); ?>


<head>
    <meta charset="utf-8" />
</head>
<body>
<?php ob_start(); ?>
 <h1>Billet simple pour Alaska!</h1>
        <h2>Les derniers billets</h2>

            <p>Veuillez entrer l'identifiant et le mot de passe :</p>
                <form action="../../index.php?action=getConnect" method="POST">
                <p>
                    <label for="pseudo">Identifiant</label><input type="pseudo" name="pseudo" required />
                    <label for="password">Mot de passe</label><input type="password" name="password" autocomplete="off" required/>
                    <input type="submit" value="Valider" />
                </p>
                </form>
            <a href="../../index.php">Retour au site internet</a>

            <p>Cette page est réservée à l'administrateur du site internet</p>
</body>
<?php $content = ob_get_clean(); ?>

<?php require('../template.php'); ?>



