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
    <title>Paiement</title>
</head>

<body>

    <?php navbar(); ?>
    <div class="payement-container">
        <div class="payement-left-section">
            <h2 class="payment-h2">Paiement</h2>
            <h3>Commande à emporter</h3>

            <form>
                <label class="payement-label" for="card-number">N° de carte</label>
                <input class="payement-input" type="number" id="card-number" name="card-number"
                    placeholder="Numéro de carte">

                <label class="payment-label" for="card-name">Nom sur la carte</label>
                <input class="payement-input" type="text" id="card-name" name="card-name" placeholder="Nom">

                <label class="payment-label" for="cvc">Cryptogramme Visuel (CVC)</label>
                <input class="payement-input" type="password" id="cvc" name="cvc" placeholder="CVC">

                <label class="payment-label" for="expiry-date">Date D'Expiration</label>
                <input class="payement-input" type="text" id="expiry-date" name="expiry-date" placeholder="MM / AAAA">

                <input class="payement-input" type="submit" value="Payer">
            </form>
        </div>

        <div class="payement-right-section">
            <div class="payement-list-items">
                <ul class="price-texte">
                    <li>Nugget x 5 <span>1.5€/u</span></li>
                    <li>Big MAC x 2 <span>25.5€/u</span></li>
                </ul>
            </div>


            <div class="payement-list-price">
                <table class="payement-table">
                    <tr>
                        <td class="payement-td">Prix HT</td>
                        <td class="payement-td">32.5€</td>
                    </tr>
                </table>
            </div>

            <div class="payement-list-price">
                <table class="payement-table">
                    <tr>
                        <td class="payement-td">TVA 5.5%</td>
                        <td class="payement-td">1.79€</td>
                    </tr>
                    <tr>
                        <td class="payement-td">Prix TTC</td>
                        <td class="payement-td">34.29€</td>
                    </tr>
                </table>
            </div>
            </table>
        </div>
    </div>
    <?php
    footer();
    ?>
</body>

</html>