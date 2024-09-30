<!DOCTYPE html>
<html lang="fr">
<?php include "functions/functions.php";?>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;600&display=swap" rel="stylesheet">
    <title>Connexion</title>
</head>

<body>
    <?php navbar();?>

    <div class="connexion-container">
        <h2>De retour chez nous !</h2>
        <p>Connectez-vous pour passer une commande.</p>

        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div>
                <label for="Identifiant">Identifiant</label>
                <input type="text" id="identifiant" name="identifiant" required>
            </div>
            <div>
                <label for="mdp">Mot de passe</label>
                <input type="password" id="mdp" name="mdp" required>
            </div>
            <div>
                <input type="submit" value="Connexion">
            </div>
        </form>

        <p>Vous n'avez pas de compte ? <a href="inscription.php">Inscrivez-vous</a></p>
        <a href="index.php" class="retour">Retour</a>
    </div>
    <?php
footer();
?>
</body>

</html>