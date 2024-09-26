<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiement</title>
</head>

<body>
    <div
        <div>
            <h1>Paiement</h1>
            <h2>Commande à emporter</h2>

            <form>
                <label for="card-number">N° de carte</label>
                <input type="number" id="card-number" name="card-number" placeholder="Numéro de carte">

                <label for="card-name">Nom sur la carte</label>
                <input type="text" id="card-name" name="card-name" placeholder="Nom">

                <label for="cvc">Cryptogramme Visuel (CVC)</label>
                <input type="password" id="cvc" name="cvc" placeholder="CVC">

                <label for="expiry-date">Date D'Expiration</label>
                <input type="text" id="expiry-date" name="expiry-date" placeholder="MM / AAAA">

                <input type="submit" value="Payer">
            </form>
        </div>

        <div>
            <div>
                <ul>
                    <li>Nugget x 5 <span>1.5€/u</span></li>
                    <li>Big MAC x 2 <span>25.5€/u</span></li>
                </ul>
            </div>

            <div ion">
                <div>
                    <span>Prix HT</span>
                    <span>32.5€</span>
                </div>
                <div>
                    <span>TVA 5.5%</span>
                    <span>1.79€</span>
                </div>
                <div>
                    <span>Prix TTC</span>
                    <span>34.29€</span>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
