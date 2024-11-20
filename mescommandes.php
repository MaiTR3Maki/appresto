<?php
include "functions/functions.php";
session_start();
check_session_user_non_connecte();
$rows = afficher_commandes();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;600&display=swap" rel="stylesheet">
    <title>Mes Commandes</title>
</head>

<body>
    <?php navbar(); ?>
    <h2>Mes Commandes Récentes</h2>
    <div class="commandes-container">
        <?php
        $etat_commandes = [ //tableau associatif pour afficher les états des commandes.
            1 => 'En attente',
            2 => 'Acceptée',
            3 => 'Refusée',
            4 => 'Terminée'
        ];
        if (count($rows) > 0) {
            foreach ($rows as $row) {
                echo '
                <div class="commande-info">
                    <div class="commande-gauche">
                        <span class="commande-date">' . (!empty($row['_date']) ? $row['_date'] : 'Date inconnue') . '</span>
                        <span class="commande-id">Commande n°' . (!empty($row['id_commande']) ? $row['id_commande'] : 'ID inconnu') . '</span>
                    </div>
                    <div class="commande-milieu">
                    <span class="commande-etat">' . (!empty($row['id_etat']) ? $etat_commandes[$row['id_etat']] : 'État inconnu') . '</span>
                    </div>
                    <div class="commande-droite">
                        <span class="commande-total">' . (!empty($row['total_conso']) ? $row['total_conso'] : '0,00') . '€</span>
                    </div>
                </div>';
            }
        } else {
            echo "<p>Aucune commande trouvée.</p>";
        }
        ?>
    </div>
    <?php
    footer();
    ?>
</body>
</html>