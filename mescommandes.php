<?php
include "functions/functions.php";
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

<?php navbar();?>
<h2>Mes Commandes Récentes</h2>
<div class="commandes-container">


    <table>
        <tr>
            <th>Date</th>
            <th>Numéro de Commande</th>
            <th>Produits</th>
            <th>Total</th>
            <th>Statut</th>
        </tr>
        <tr>
            <td>01/10/2024</td>
            <td>#0001</td>
            <td>
                - Purée classique x2<br>
                - Poulet frit x1
            </td>
            <td>3000 €</td>
            <td class="statut-en-cours">En cours</td>
        </tr>
        <tr>
            <td>28/09/2024</td>
            <td>#0002</td>
            <td>
                - Purée classique<br>
            </td>
            <td>2500 €</td>
            <td class="statut-en-cours">En cours</td>
        </tr>
    </table>
</div>

<?php
footer();
?>
</body>
</html>
