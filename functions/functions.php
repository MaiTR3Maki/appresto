<?php

/**
 * Affiche la barre de navigation.
 * Pour l'instant, renvoie tous les liens, mais à terme, elle affichera dynamiquement les liens selon l'état de la session.
 * @author Samuel
 * @return void
 */
function navbar()
{
    echo
    '<h1>Patate Douce</h1>
<nav>
    <ul>
        <li><a href="index.php">Liste des produits</a></li>
        <li><a href="connexion.php">Connexion</a></li>
        <li><a href="inscription.php">Inscription</a></li>
        <li><a href="deconnexion.php">Déconnexion</a></li>
        <li><a href="commander.php">Passer commande</a></li>
    </ul>
</nav>';
}
