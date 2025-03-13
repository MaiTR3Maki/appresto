<?php
include "functions/functions.php";
session_start();
check_session_user_non_connecte();
get_type_conso();
check_commande_vide();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;600&display=swap" rel="stylesheet">
    <title>Choix_commande</title>
</head>


<body>
    <?php navbar(); ?>

    <h2>Où souhaitez-vous consommer votre commande ?</h2>

    <div class="choix">
        <form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST">
            <div class="choix-boutons">
                <input type="submit" id="btn-sur-place" class="choix-bouton sur-place" name="sur_place" value="Sur Place">
                <input type="submit" id="btn-a-emporter" class="choix-bouton a-emporter" name="emporter" value="À Emporter">
            </div>
        </form>

        <div class="hover-text">
            <img id="image-sur-place" class="hover-image" src="images/surplace.png" alt="Image Sur Place">
            <span id="text-sur-place" class="hover-message">TVA 10%</span>
            <img id="image-a-emporter" class="hover-image" src="images/aemporter.png" alt="Image À Emporter">
            <span id="text-a-emporter" class="hover-message">TVA 5.5%</span>
        </div>
    </div>
    <?php footer(); ?>
    <script src="js/choixcommande.js"></script> <!-- le script est purement esthétique -->
</body>

</html>