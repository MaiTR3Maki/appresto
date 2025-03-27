<?php
include "functions/functions.php";
session_start();
check_session_user_connecte();
$rows = fetch_produits();

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;600&display=swap" rel="stylesheet">
    
    <title>Accueil</title>
</head>

<body>
    <?php navbar(); ?>
    <div class="content">
        <div class="title-section">
            <h2>Découvrez nos plats à la une !</h2>
        </div>

        <div class="table-container-non-connecte"> <!-- Nouvelle classe pour le tableau pour afficher les articles quand on n'est pas connecté -->
            <table class="table-produit">
                <?php
                foreach ($rows as $row) {
                    echo '
                <tr>
                    <td class="produit-info">
                        <div class="produit-gauche">
                            <span class="produit-libelle">' . $row['libelle'] . '</span>
                            <img src="images/' . $row['libelle'] . '.png" alt="' . $row['libelle'] . '" class="produit-image">
                        </div>
                        <div class="produit-description">
                            <span> ' . $row['description'] . '</span>
                        </div>
                        <div class="produit-droite">
                            <span class="produit-prix"> ' . $row['prix_ht'] . '€</span>
                        </div>
                    </td>
                </tr>';
                }
                ?>
                <tr><td><h4>Restez à l'écoute pour les produits à venir !</h4></td></tr>
            </table>

        </div>
        <h4>Vous devez être connecté pour passer une commande.</h4>
        <?php
        footer();
        ?>

    </div>
</body>

</html>