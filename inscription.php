<!DOCTYPE html>
<html lang="fr">
<?php include "functions/functions.php";?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>

<body>
<?php navbar();?>
    <h2>Bienvenue chez nous !</h2>
    <p>Vous pouvez vous inscrire via ce formulaire.</p>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div><label for="Identifiant">Identifiant</label>
            <input type="text" id="identifiant" name="identifiant" required>
        </div>
        <div> <label for="mdp">Mot de passe</label>
            <input type="text" id="mdp" name="mdp" required>
        </div>
        <div> <label for="mdp_confirmer">Confirmation du mot de passe</label>
            <input type="text" id="mdp_confirmer" name="mdp_confirmer" required>
        </div>
        <div>
            <input type="submit" value="Créer mon compte">
        </div>
    </form>

    <p>Vous avez déjà un compte ? <a href="connexion.php">Connectez-vous</a></p>
    <a href="index.php">Retour</a>
</body>

</html>