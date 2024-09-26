<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deconnexion</title>
</head>
<body>

<h2>Vous partez déjà ?</h2>
<p>Êtes-vous sûr de vouloir vous déconnecter ?</p>


<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input type="submit" value="Déconnexion">
    <input type="submit" value="Annuler">
</form>

</body>
</html>