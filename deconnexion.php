<!DOCTYPE html>
<html lang="fr">
<?php include "functions/functions.php";?>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;600&display=swap" rel="stylesheet">
    <title>Deconnexion</title>
</head>
<body>
<?php navbar();?>
<h2>Vous partez déjà ?</h2>

<div class="choix">
    <div class="choix-boutons">
        <a href="index.php"><button class="choix-bouton deconnecter">Se déconnecter</button></a>
        <a href="index.php"><button class="choix-bouton annuler">Annuler</button></a>
    </div>
<?php
footer();
?>
</body>
</html>