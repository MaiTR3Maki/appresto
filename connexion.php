<?php 
include "functions/functions.php"; 
session_start(); 
check_session_user_connecte();
?>
<!DOCTYPE html>
<html lang="fr">


<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;600&display=swap" rel="stylesheet">
    <title>Connexion</title>
</head>

<body>
    <?php navbar(); ?>
    <div class="connexion-container">
        <h2>De retour chez nous !</h2>
        <p>Connectez-vous pour passer une commande.</p>
        <form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST">
            <div>
                <label for="pseudo">Identifiant</label>
                <input type="text" id="pseudo" name="pseudo" required>
            </div>
            <div>
                <label for="mdp">Mot de passe</label>
                <input type="password" id="mdp" name="mdp" required>
            </div>
            <div>
                <a href="commander.php"><input type="submit" name="submit" required="required" id="submit"></a>
            </div>
        </form>
        <p>Vous n'avez pas de compte ? <a href="inscription.php">Inscrivez-vous</a></p>
        <a href="index.php" class="retour">Retour</a>
    </div>
    <?php
        $submit = isset($_POST["submit"]);
        if ($submit) {
            userLogin();
        }
    footer();
    ?>
</body>

</html>