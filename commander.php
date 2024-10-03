<?php
include "functions/functions.php";
session_start();
check_session_user_non_connecte();
$rows = fetch_produits();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;600&display=swap" rel="stylesheet">
    <title>Commander</title>
</head>

<body>
    <?php navbar(); ?>
    <h2>Bonjour <?php echo $_SESSION['pseudo']; ?>, sélectionnez les produits que vous souhaitez!</h2>

    <div class="table-container">
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
                        <select class="produit-quantite" name="" id="">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                        <div class="produit-droite">
                            <span class="produit-prix"> ' . $row['prix_ht'] . '€</span>
                        </div>
                    </td>
                </tr>';
            }

            ?>
        </table>
    </div>
    <div class="bouton-container">
        <a href="choixcommande.php"><button class="bouton-valider">Payer</button></a>
    </div>

    <?php
    footer();
    ?>
</body>

</html>