<?php 
include "functions/functions.php";
session_start(); 
check_session_user_non_connecte();
check_commande_vide();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">*
    <link rel="stylesheet" href="css/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;600&display=swap" rel="stylesheet">
    <title>Confirmer_paiement</title>
</head>
<body>
    
 <?php navbar();?>
    <div class="choix">
    <h2>Votre commande n° <?php echo $_SESSION['id_commande_confirmee']?> est confirmée !</h2>
    <h3>Total : <?php echo $_SESSION['totalprixttc']; ?>€</h3>
    <h3>Réglée le <?php echo $_SESSION['date_heure_paiement']; ?></h3>
    <p>Vous recevrez un email de confirmation dès que votre commande sera validée.</p>
    
    <div class="choix-boutons">
        <a href="mescommandes.php"><button class="choix-bouton sur-place">Voir mes commandes</button></a>
    </div>
</div>
    <?php
footer();
?>
</body>
</html>