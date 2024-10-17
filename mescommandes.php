<?php 
include "functions/functions.php";
session_start(); 
check_session_user_non_connecte();
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
<?php
$sql = "SELECT id_commande, id_etat, _date, total_conso FROM commande";
$result = $dbh->query($sql);
$rows = $result->fetchAll(PDO::FETCH_ASSOC);
if (count($rows) > 0) {
    echo "<table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Numéro de Commande</th>
                    <th>État</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>";
    foreach ($rows as $row) {
        echo "<tr>
                <td>{$row['_date']}</td>
                <td>{$row['id_commande']}</td>
                <td>{$row['id_etat']}</td>
                <td>{$row['total_conso']}</td>
              </tr>";
    }
    echo "</tbody>
        </table>";
} else {
    echo "Aucune commande trouvée.";
}
?>
</div>

<?php
footer();
?>
</body>
</html>
