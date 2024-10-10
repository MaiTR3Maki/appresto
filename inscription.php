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
    <title>Inscription</title>
</head>



<body>
    <?php navbar(); ?>
    <div class="connexion-container">
        <h2>Bienvenue chez nous !</h2>
        <p>Vous pouvez vous inscrire via ce formulaire.</p>

        <form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST">

            <?php
            $submit = isset($_POST['submit']);
            if ($submit) {
                db_add_user();
            }
            ?>
            

            <div>
                <label for="pseudo">Identifiant</label>
                <!-- htmlspecialchars est une fonction PHP qui convertit les caractères spéciaux en entités HTML pour prévenir les failles XSS et assurer un affichage sûr du contenu. -->
                <input type="text" id="pseudo" name="pseudo" value="<?php echo isset($_POST['pseudo']) ? htmlspecialchars($_POST['pseudo']) : ''; ?>" required>
            </div>
            <div>
                <label for="email">Mail</label>
                <input type="email" id="mail" pattern="+@" name="mail" value="<?php echo isset($_POST['mail']) ? htmlspecialchars($_POST['mail']) : ''; ?>"required>
            </div>


            <div>
                <label for="mdp">Mot de passe</label>
                <input type="password" id="mdp" name="mdp" required>
            </div>
            <div>
                <label for="mdp_check">Confirmation du mot de passe</label>
                <input type="password" id="mdp_check" name="mdp_check" required>
            </div>
            <div>
                <input type="submit" value="Créer mon compte" name="submit" id="submit">
            </div>
        </form>
        <p>Vous avez déjà un compte ? <a href="connexion.php">Connectez-vous</a></p>
        <a href="index.php" class="retour">Retour</a>
    </div>
    <?php
    footer();
    ?>
</body>

</html>