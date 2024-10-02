<?php
include "functions/functions.php"
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
    <h2>Sélectionnez les produits que vous souhaitez!</h2>
    <div class="table-container">
        <table class="table-produit">
            <tr>
                <td class="produit-info">
                    <div class="produit-gauche">
                        <span class="produit-libelle">Purée classique</span>
                        <img src="images/plat_0.png" alt="Purée de patate douce" class="produit-image">
                    </div>
                    <div class="produit-description">
                        <span>Notre purée de patate douce, parfaite en accompagnement pour vos plats.</span>
                    </div>
                    <div class="produit-droite">
                        <span class="produit-prix">5 €</span>
                        <select class="produit-quantite" name="" id="">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                </td>
            </tr>

            <tr>
                <td class="produit-info">
                    <div class="produit-gauche">
                        <span class="produit-libelle">Riz classique</span>
                        <img src="images/plat_1.png" alt="Riz" class="produit-image">
                    </div>
                    <div class="produit-description">
                        <span>Notre riz est le plus frais sur terre ! Il va parfaitement avec nos purées.</span>
                    </div>
                    <div class="produit-droite">
                        <span class="produit-prix">4 €</span>
                        <select class="produit-quantite" name="" id="">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                </td>
            </tr>

            <tr>
                <td class="produit-info">
                    <div class="produit-gauche">
                        <span class="produit-libelle">Le poulet frit</span>
                        <img src="images/plat_2.png" alt="Poulet frit" class="produit-image">
                    </div>
                    <div class="produit-description">
                        <span>Notre poulet est élevé en plein-air, et possède l'un des Q.I. mesuré le plus élevé jamais vu. Testez-le, vous verrez !</span>
                    </div>
                    <div class="produit-droite">
                        <span class="produit-prix">8 €</span>
                        <select class="produit-quantite" name="macfish-qty" id="macfish-qty">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    </div>
    <div class="bouton-container">
    <a href="choixcommande.php"><button class="bouton-valider">Payer</button></a>
</div>

    <?php
footer();
?>
</body>

</html>