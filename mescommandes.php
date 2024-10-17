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
$sql = "SELECT id_commande, id_etat, _date, total_conso
FROM commande"
$result=$ ->query($sql);

if ($result->num_rows >0){
    echo"<table>
    <thead>
    <tr>
        <th> date </th>
        <th> Numéro de Commande </th>
        <th> Produits </th>
        <th> total </th>
    </tr>
    </thead>
    <tbody>"
    foreach($restul as $rows){
    echo"<tr>
        <td><td>{$row['_date']}</td>
        <td>{$row['id_commande']}</td>
        <td>{$row['id_etat']}</td>
        <td>{$row['total_conso']}</td>
      </tr>";
   echo" </tbody>
    </table>";
}
?>
</div>

<?php
footer();
?>
</body>
</html>
