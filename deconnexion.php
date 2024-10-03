<?php 
include "functions/functions.php";
session_start(); 
check_session_user_non_connecte();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;600&display=swap" rel="stylesheet">
    <title>Deconnexion</title>
</head>

<body>
    <?php navbar(); ?>
    <h2>Vous partez déjà ?</h2>

    <div class="choix">
        <div class="choix-boutons">
            <form action="" method="post">
                <button class="choix-bouton deconnecter" type="submit" name="valider"><span>Se déconnecter</span></button>
            </form>
            <a href="<?php echo isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php'; ?>"> <button class="choix-bouton annuler">Annuler</button></a>
        </div>
        <?php
        if (isset($_POST['valider'])) {
            deconnexion();
        }
        footer();
        ?>
</body>

</html>