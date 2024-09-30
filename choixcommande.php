<?php
include "functions/functions.php"
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;600&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>

<?php navbar();?>


    <div class="choix">
    <h2>Où souhaitez-vous consommer votre commande ?</h2>
    
    <div class="choix-boutons">
        <a href="payer.php"><button class="choix-bouton sur-place">Sur Place</button></a>
        <a href="payer.php"><button class="choix-bouton a-emporter">À Emporter</button></a>
    </div>
</div>
    <?php
footer();
?>
</body>
</html>