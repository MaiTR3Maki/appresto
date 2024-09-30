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
    <title>Accueil</title>
</head>

<body>
    <?php navbar(); ?>
    <div class="content">
        <div class="title-section">
            <h2>Découvrez nos plats à la une !</h2>
        </div>
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

                        </div>
                    </td>
                </tr>
            </table>
        </div>


        <?php
        footer();
        ?>

    </div>
</body>

</html>