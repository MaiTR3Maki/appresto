<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>

<body>
    <h1>De retour chez nous !</h1>
    <p>Connectez-vous pour passer une commande.</p>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div><label for="Identifiant">Identifiant</label>
            <input type="text" id="identifiant" name="identifiant" required>
        </div>
        <div> <label for="mdp">Mot de passe</label>
            <input type="text" id="mdp" name="mdp" required>
        </div>
        <div>
        <input type="submit" value="Connexion">
        </div>
    </form>

    <p>Vous n'avez pas de compte ? <a href="inscription.php">Inscrivez-vous</a></p>
    <a href="index.php">Retour</a>
</body>

</html>