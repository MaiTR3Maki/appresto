<?php

/**
 * @param none
 * Affiche la barre de navigation.
 * Pour l'instant, renvoie tous les liens, mais à terme, elle affichera dynamiquement les liens selon l'état de la session.
 * @return void
 * @author Samuel
 */
function navbar()
{
    echo '
    <header class="site-header">
        <nav class="navbar">
            <ul class="nav-liste gauche-nav">
                <li><a href="index.php">Accueil</a></li>
                <li><a href="commander.php">Passer commande</a></li>
                <li><a href="mescommandes.php">Mes commandes</a></li>
            </ul>
            <div class="site-logo">
                <a href="index.php">
                    <img src="images/logo.png" alt="Patate Douce">
                </a>
            </div>
            <ul class="nav-liste droite-nav">
                <li><a href="connexion.php">Connexion</a></li>
                <li><a href="inscription.php">Inscription</a></li>
                <li><a href="deconnexion.php">Déconnexion</a></li>
            </ul>
        </nav>
    </header>
    ';
}

/**
 * @param none
 * Affiche le footer.
 * Le footer reste fixe en bas de page avec un texte et une image à gauche.
 * @return void
 * @author Samuel
 */
function footer()
{
    echo '
    <footer class="site-footer">
        <img src="images/patateseule.png" alt="Patate Douce Logo" class="footer-logo">
        <span>Patate Douce © 2024</span>
    </footer>
    ';
}


?>