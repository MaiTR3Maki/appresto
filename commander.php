<?php
include "functions/functions.php"
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commander</title>
</head>
<body>


 <?php navbar();?>


    
    <h2>Sélectionnez les produits que vous souhaitez!</h2>

  <table>
    <tr>
        <th>Produit</th>
        <th>Prix</th>
        <th>Image</th>
        <th>Quantitté</th>
    </tr>
    <tr>
        <td>Big Mac</td>
        <td>9 €</td>
        <td><img src="images/big-mac.png" alt="" height="50px" ></td>
        <td><select name="" id=""> <option value="0">0</option>
        <option value="1">1</option> 
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        </select></td>
    </tr>

    <tr>
        <td>Mac Chicken</td>
        <td>12 €</td>
        <td><img src="images/big-mac.png" alt="" height="50px" ></td>
        <td><select name="" id=""> <option value="0">0</option>
        <option value="1">1</option> 
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        </select></td>
    </tr>

    <tr>
        <td>Mac Fish</td>
        <td>8 €</td>
        <td><img src="images/big-mac.png" alt="" height="50px" ></td>
        <td><select name="" id=""> <option value="0">0</option>
        <option value="1">1</option> 
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        </select></td>
    </tr>
    
  </table>
    </div>
    <div class="header">
    <a href="choixcommande.php"><button>Valider</button></a>
    </div>
</body>
</html>