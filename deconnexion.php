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
<p>Êtes-vous sûr de vouloir vous déconnecter ?</p>


<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input type="submit" value="Déconnexion">
</form>
<a href="index.php">Retour</a>
<?php
footer();
?>
</body>
</html>