<?php
include "functions/functions.php";
session_start();
check_session_user_non_connecte();
$rows = fetch_produits();
$submit = isset($_POST["submit"]);
if ($submit) {
    get_quantites();
}

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
    <h2>Bonjour <u><?php echo $_SESSION['pseudo']; ?></u>, sélectionnez les produits que vous souhaitez!</h2>
    <?php
    // Affichage du message d'erreur si aucun article séléctionné
    if (isset($_SESSION['message_erreur']) && !empty($_SESSION['message_erreur'])) {
        echo '<p class="msg_erreur">' . $_SESSION['message_erreur'] . '</p>';
        unset($_SESSION['message_erreur']); // On supprime le message après l'affichage
    }
    ?>
    <form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST">
        <div class="table-et-bouton-container">
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
                        <select class="produit-quantite" name="quantites[' . $row['id_produit'] . ']">';

                        foreach (range(0, 10) as $i) {
                            echo '<option value="' . $i . '">' . $i . '</option>';
                        }
                        echo '
                        </select>
                    </div>
                        <div class="produit-droite">
                            <span class="produit-prix"> ' . $row['prix_ht'] . '€</span>
                        </div>
                    </td>
                </tr>';
                    }

                    ?>
                    <tr>
                        <td>
                            <h4>Restez à l'écoute pour les produits à venir !</h4>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="bouton-container">
                <input class="bouton-valider" type="submit" name="submit" value="Valider" required="required" id="submit"></a>
            </div>
    </form>
    <?php
    footer();
    ?>
</body>

</html>