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
            <?php
            if (isset($_SESSION['type_conso'])) {
                if ($_SESSION['type_conso'] == 0) {
                    echo '<h3>Commande sur place (tva 10%)</h3>';
                } else if ($_SESSION['type_conso'] == 1) {
                    echo '<h3>Commande à emporter (tva 5.5%)</h3>';
                }
            } ?>


            <form method="post">
                <label class="payement-label" for="card-number">N° de carte</label>
                <input class="payement-input" type="number" id="card-number" name="card-number"
                    placeholder="Numéro de carte">

                <label class="payment-label" for="card-name">Nom sur la carte</label>
                <input class="payement-input" type="text" id="card-name" name="card-name" placeholder="Nom">

                <label class="payment-label" for="cvc">Cryptogramme Visuel (CVC)</label>
                <input class="payement-input" type="password" id="cvc" name="cvc" placeholder="CVC">

                <label class="payment-label" for="expiry-date">Date D'Expiration</label>
                <input class="payement-input" type="text" id="expiry-date" name="expiry-date" placeholder="MM / AAAA">
                <?php
                ?>
                <button class="payement-input" type="submit" name="submit" onclick="return confirmerPaiement();">Payer</button>

            </form>
            <?php
            submit_payement();
            ?>

            </form>
        </div>

        <div class="payement-right-section">
            <div class="payement-list-items">

                <?php fetch_commande() ?>


            </div>


            <div class="payement-list-price">
                <table class="payement-table">
                    <tr>
                        <td class="payement-td-left">Total HT</td>
                        <td class="payement-td-right"><?php echo $_SESSION['totalprixht']; ?>€</td>
                    </tr>
                </table>
            </div>

            <div class="payement-list-price">
                <table class="payement-table">
                    <tr>
                        <td class="payement-td-left">Prix TTC</td>
                        <td class="payement-td-right"><?php echo $_SESSION['totalprixttc']; ?>€</td>
                    </tr>
                </table>
            </div>
            </table>
        </div>
    </div>
    <?php
    footer();
    ?>
    <script>
        function confirmerPaiement() {
            return confirm("Voulez-vous vraiment effectuer le paiement de <?php echo $_SESSION['totalprixttc']; ?>€ ?");
        }
    </script>

</body>

</html>