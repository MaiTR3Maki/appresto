<?php
/**
 * @param $id_commande
 * Cette api permet de mettre à jour l'état de la commande en "acceptée"
 */
session_start();
include '../functions/functions.php';

$dbh = db_connect();

$id_commande = $_GET['id_commande'];

if (isset($id_commande)) {
    try {
        $sql = "UPDATE commande SET id_etat = 2 WHERE id_commande = :id_commande";
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':id_commande' => $id_commande));
    } catch (PDOException $e) {
        echo /*json_encode*/(['status' => 'error', 'message' => 'Erreur de base de données : ' . $e->getMessage()]);
    } catch (Exception $e) {
        echo /*json_encode*/(['status' => 'error', 'message' => 'Erreur : ' . $e->getMessage()]);
    }
} 


//Pour la gestion des erreurs
/*else {
    echo json_encode(['status' => 'error', 'message' => 'id_commande manquant']);
}*/