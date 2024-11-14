<?php
include '../functions/functions.php';

$dbh = db_connect();
$tableau = [];
$i = 1;

try {
    $sql = "select commande.id_commande,commande._date,commande.id_etat,
    sum(ligne_commande.quantite),commande.total_conso
    from commande inner join ligne_commande
    on commande.id_commande=ligne_commande.id_commande
    where id_etat=1
    GROUP by commande.id_commande";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $commandes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erreur de base de données : " . $e->getMessage();
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}


foreach ($commandes as &$commande) {
    try {
        $sql = "select id_ligne_commande,libelle,quantite
    from ligne_commande inner join produit
    on produit.id_produit=ligne_commande.id_produit
    where id_commande=:id_commande";
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':id_commande' => $commande['id_commande']));
        $lignes_commande = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erreur de base de données : " . $e->getMessage();
    } catch (Exception $e) {
        echo "Erreur : " . $e->getMessage();
    }
    $commande['lignes_commande'] = $lignes_commande;
}
$json = json_encode($commandes);
header("Content-type: application/json; charset=utf-8");
$file =fopen('commandes_en_attente.json', 'w');
if ($file==false){
    echo"erreur: impossible de créer ou d'ouvrir le fichier .json";
    exit;
}
fwrite($file,$json);
if (fwrite($file, $json) === false){
    echo"Erreur: Impossible d'écrire le fichier json";
    fclose($file);
    exit;
}
fclose($file);
echo $json;
