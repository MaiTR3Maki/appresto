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
    <div class="margin-bottom-navbar">
    <header class="site-header">
    
    <script src="js/nav.js"></script>
        <nav class="navbar">
            <ul class="nav-liste gauche-nav">
    ';
    if (!isset($_SESSION['pseudo'])) {
    echo '<a href="index.php" onmouseover="Accueil()" onmouseout="Accueil()">
            <img id="Accueil-image" class="imglogoAccueil" src="images/logo/Accueil.png">
            <span id="Accueil-texte" style="display: none;">Accueil</span>
        </a>';
    }
    // Liens visibles seulement si l'utilisateur est connecté
    if (isset($_SESSION['pseudo'])) {
        echo '<a href="commander.php" class="navbar-commander-passercommander">Passer commande</a>';
        echo '<a href="mescommandes.php" class="navbar-commander-passercommander">Mes commandes</a>';
    }

    echo '
            </ul>
            <div class="site-logo" >
                <a href="index.php">
                    <img src="images/logo.png" alt="Patate Douce">
                </a>
            </div>
            <ul class="nav-liste droite-nav">
    ';

    // Liens visibles si l'utilisateur n'est pas connecté
    if (!isset($_SESSION['pseudo'])) {
        echo '<a href="connexion.php" class="margin-right-navbar" onmouseover="Connexion()" onmouseout="Connexion()">
            <img id="Connexion-image" class="imglogoConnexion" src="images/logo/Connexion.png">
            <span id="Connexion-texte" style="display: none;">Connexion</span>
        </a>';
        echo '<a href="inscription.php" class="margin-right-navbar" onmouseover="Inscription()" onmouseout="Inscription()">
            <img id="Inscription-image" class="imglogoInscription" src="images/logo/Inscription.png">
            <span id="Inscription-texte" style="display: none;">Inscription</span>
        </a>';
    } else {
        // Lien visible si l'utilisateur est connecté
        echo '<p class="message_connecte_navbar margin-right-navbar-connecter">Connecté en tant que '.$_SESSION['pseudo'].'</p>';
        echo '<a href="deconnexion.php" class="margin-right-navbar" onmouseover="Deconnexion()" onmouseout="Deconnexion()">
            <img id="Deconnexion-image" class="imglogoDeconnexion" src="images/logo/se-deconnecter.png">
            <span id="Deconnexion-texte" style="display: none;">Deconnexion</span></a>';
    }

    echo '
            </ul>
        </nav>
        
    </header>
    </div>
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


function db_connect()
{
    $dsn = 'mysql:host=localhost;dbname=appresto';  // contient le nom du serveur et de la base
    $user = 'root';
    $password = '';
    try {
        $dbh = new PDO($dsn, $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $ex) {
        die("Erreur lors de la connexion SQL : " . $ex->getMessage());
    }
    return $dbh;
}


/**
 * @param none
 * rajout utilisateur
 *
 * @return post
 */
function db_add_user()
{
    //va chercher la variable user_cree dans l'URL
    $_GET['user_cree'] = FALSE;
    //CONNECTION A LA BDD
    $dbh = db_connect();
    //CREATION DES VARIABLES QUI CONTIENNENT LES DONNEES SAISIES DANS LE FORM
    // si la variable existe, envoyée avec la méthode post, si elle n'est pas renseignée rien ne se passe 
    $id_user = "";
    $pseudo = isset($_POST['pseudo']) ? $_POST['pseudo'] : "";
    $mdp = isset($_POST['mdp']) ? $_POST['mdp'] : "";
    $mdp_check = isset($_POST['mdp_check']) ? $_POST['mdp_check'] : "";
    $mail = isset($_POST['mail']) ? $_POST['mail'] : "";

 
    //la requete renvoie le pseudo stocker dans la table "_user" 
    $sql1 = "select pseudo from _user where pseudo =:pseudo";
    try {
        //prepare la requete pour empecher les injections sql
        $sth = $dbh->prepare($sql1);
        //transforme la saisie en chaine de caractère 
        $sth->execute(array(':pseudo' => $pseudo));
        $pseudo_bdd = $sth->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $ex) {
        //en cas d'erreur revoie le message
        die("Erreur lors de la requête SQL : " . $ex->getMessage());
    }

    //requête qui vérifie si l'email est présent dans la table user
    $sql2 = "select mail from _user where mail =:mail";
    try {
        //préparation de la requête pour éviter les injections
        $sth = $dbh->prepare($sql2);
        //la saisie devient une chaine de caractère
        $sth->execute(array(':mail' => $mail));
        $mail_bdd = $sth->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $ex) {
        //si il y a une erreur affichage du message erreur lors de la requête sql
        die("Erreur lors de la requête SQL : " . $ex->getMessage());
    }

    //CHECK DES ERREURS DE SAISIS POUR EVITER DES INSERTIONS NON-CONFORME(S)
    if ($mdp != $mdp_check ||  count($pseudo_bdd) > 0 || count($mail_bdd) > 0) {

        //CAS OU LES 2 MDP SAISIS NE CORRESPONDENT PAS
        if ($mdp != $mdp_check) {
            echo "<p class='message_erreur'>Les 2 mots de passe de correspondent pas !</p>";
        }

        //CAS PSEUDO DEJA UTILISE
        if (count($pseudo_bdd) > 0) {
            echo "<p class='message_erreur'>Ce pseudo déja utilisé !</p>";
        }

        //CAS MAIL DEJA UTILISE
        if (count($mail_bdd) > 0) {
            echo "<p class='message_erreur'>Ce mail est déja utilisé !</p>";
        }
    }
    //DANS LES AUTRES CAS ON PEUT AJOUTER L'USER A LA BDD
    else {

        //REQUETES QUI CONTIENT LA REQUETES SQL D'INSERTION DE L'USER
        $sql = "INSERT INTO `_user`(`id_user`, `pseudo`, `mdp`, `mail`) values (:id_user,:pseudo,:mdp,:mail)";

        //HACHAGE DU MDP AVANT DE LE STOCKER
        $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
        //préparation requête
        try {
            $sth = $dbh->prepare($sql);
            //exécution des informations rentrées dans le formulaire 
            $sth->execute(array(
                ":id_user" => $id_user,
                ":pseudo" => $pseudo,
                ":mdp" => $mdp,
                ":mail" => $mail,
            ));
        } catch (PDOException $ex) {
            //si il y a une erreur, affichage du message erreur lors de la requête
            die("Erreur lors de la requête SQL : " . $ex->getMessage());
        }
        //utilisteur cree dans l'url est vraie alors message compte crée avec succès est affiché
        $_GET['user_cree'] = true;

        echo "<p class='message_validation'>Compte créé avec succés !</p>";
        echo "<p class='message_validation'>Redirection vers login dans 2 sec !</p>";
        //redirection vers la page de connexion
        header("Refresh: 2; connexion.php");
    }
}


//FONCTION QUI GERE LA CONNEXION D'UN UTILISATEUR
function userLogin()
{
    //CONNEXION A LA BDD
    $dbh = db_connect();

    //RECUPERATION DES CREDENTIALS DU FORMULAIRE
    $pseudo = isset($_POST['pseudo']) ? $_POST['pseudo'] : "";
    $mdp = isset($_POST['mdp']) ? $_POST['mdp'] : "";

    //requête servant a aller chercher dans la bdd le pseudo inséré qui correspondarait au pseudo rentré dans le form
    $sql_login_pseudo = "select pseudo from _user where pseudo =:pseudo";
    try {
        //preparation requête sql
        $sth = $dbh->prepare($sql_login_pseudo);
        //transformer en chaine de caractère
        $sth->execute(array(':pseudo' => $pseudo));
        $resultat_login_pseudo = $sth->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $ex) {
        //en cas d'erreur afficher erreur lors de la requête
        die("Erreur lors de la requête SQL : " . $ex->getMessage());
    };
    //s'il trouve un login alors il recupère le mot de passe stocker dans la table _user,
    if (count($resultat_login_pseudo) > 0) {
        $sql_login_mdp = "select mdp from _user where pseudo =:pseudo";
        try {
         // cette requete est préparer en raison du risque d'injection sql 
            $sth = $dbh->prepare($sql_login_mdp);
            $sth->execute(array(
                ':pseudo' => $pseudo
            ));
            $resultat_login_mdp = $sth->fetch(PDO::FETCH_ASSOC);
            //en cas d'erreur il renvoie un message d'erreur 
        } catch (PDOException $ex) {
            die("Erreur lors de la requête SQL : " . $ex->getMessage());
        }

        $sql_id_user = "select id_user from _user where pseudo =:pseudo";
        try {
            $sth = $dbh->prepare($sql_id_user);
            $sth->execute(array(':pseudo' => $pseudo));
            $resultat_id_user = $sth->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            die("Erreur lors de la requête SQL : " . $ex->getMessage());
        }
        $id_user = $resultat_id_user['id_user'];

//si le résult mdp et la méthode password verify correspondent a l'entréee de la var mdp alors
        if ($resultat_login_mdp && password_verify($mdp, $resultat_login_mdp['mdp'])) {
            //CONNEXION REUSSIE
            $_SESSION['pseudo'] = $pseudo;
            header("location:commander.php");
        } else {
            //si pas identique affichage message mot de passe incorrect 
            echo "<p> mot de passe incorrect ! </p>";
            echo count($resultat_login_mdp);
        }
    } else {
        echo "<p> Le compte n'existe pas ! </p>";
    }
}
// FONCTION DE DECONNEXION 
function deconnexion()
{
    session_unset(); // Détruit toutes les variables de session
    session_destroy(); // Détruit la session (mais pas le cookie)
    setcookie(session_name(), '', -1, '/'); // Détruit le cookie de session
    // Redirection vers index.php
    header("Location: index.php");//qd déconnexion redirrige a la page d'accueil
    exit();
}
//verif qu'on est connectés
function check_session_user_non_connecte()
{
    //si la session n'existe pas
  if (!isset($_SESSION['pseudo'])) {
    //redirection vers la page de connexion
    header("Location: connexion.php");
    exit();
  }
}

function check_session_user_connecte()
{
    //si la session existe
  if (isset($_SESSION['pseudo'])) {
    //redirection vers la page de commande
    header("Location: commander.php");
    exit();
  }
}
// la fonction va chercher les produits grâce a une requête
function fetch_produits()
{
    $dbh = db_connect(); // connexion bdd
    $sql_produits = 'select libelle, description, prix_ht
    from produit'; //requête sql allant chercher le nom, la description, le prix des produits de la table produit
    try {
        //préparation requête sql
        $sth = $dbh->prepare($sql_produits);
        $sth->execute();//exécution requête
        $rows = $sth->fetchAll(PDO::FETCH_ASSOC);//récupération de toutes les données
    } catch (PDOException $e) {
        //si erreur affichage message erreur lors de la requête
        die("<p>Erreur lors de la requête SQL : " . $e->getMessage() . "</p>");
    }
    //si il n'y a pas de produit affichage du message rien a afficher
    if (count($rows) > 0) {
    } else {
        echo "<p>Rien à afficher</p>";
    }
    return $rows;
}
//fonction bouton paiement
function submit_payement(){
    if (isset($_POST['submit'])) {//si le submit est préssé
        header("Location: Comfirmation_payement.php");// reidrection vers la page payment
        exit();//sortie
    }
}
 
