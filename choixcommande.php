<?php
include "functions/functions.php";
session_start();
check_session_user_non_connecte();
get_type_conso()
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
    <form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST">
        <div class="choix-boutons">
            <input type="submit" class="choix-bouton sur-place" name="sur_place" value="Sur Place"></input>
            <input type="submit" class="choix-bouton a-emporter" name="emporter"value="À Emporter"></input>
        </div>
    </form>
    <?php
    footer();
    ?>
</body>


</html>