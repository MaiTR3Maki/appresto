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
            <div class="site-logo">
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

//FONCTION QUI PERMET D'AJOUTER UN USER DANS LA BDD A L'AIDE DES SAISIES DU FORM REGISTER
function db_add_user()
{
    //TRUE SI USER CREE OU RESTE FALSE SI PAS CREE
    $_GET['user_cree'] = FALSE;
    //CONNECTION A LA BDD
    $dbh = db_connect();
    //CREATION DES VARIABLES QUI CONTIENNENT LES DONNEES SAISIES DANS LE FORM
    $id_user = "NULL";
    $pseudo = isset($_POST['pseudo']) ? $_POST['pseudo'] : "";
    $mdp = isset($_POST['mdp']) ? $_POST['mdp'] : "";
    $mdp_check = isset($_POST['mdp_check']) ? $_POST['mdp_check'] : "";
    $mail = isset($_POST['mail']) ? $_POST['mail'] : "";

 

    //REQUETE POUR VOIR SI PSEUDO DEJA DANS LA BDD
    $sql1 = "select pseudo from _user where pseudo =:pseudo";
    try {
        $sth = $dbh->prepare($sql1);
        $sth->execute(array(':pseudo' => $pseudo));
        $pseudo_bdd = $sth->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $ex) {
        die("Erreur lors de la requête SQL : " . $ex->getMessage());
    }

    //REQUETE POUR VOIR SI MAIL DEJA DANS LA BDD
    $sql2 = "select mail from _user where mail =:mail";
    try {
        $sth = $dbh->prepare($sql2);
        $sth->execute(array(':mail' => $mail));
        $mail_bdd = $sth->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $ex) {
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

        try {
            $sth = $dbh->prepare($sql);
            $sth->execute(array(
                ":id_user" => $id_user,
                ":pseudo" => $pseudo,
                ":mdp" => $mdp,
                ":mail" => $mail,
            ));
        } catch (PDOException $ex) {
            die("Erreur lors de la requête SQL : " . $ex->getMessage());
        }

        $_GET['user_cree'] = true;

        echo "<p class='message_validation'>Compte créé avec succés !</p>";
        echo "<p class='message_validation'>Redirection vers login dans 2 sec !</p>";
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


    $sql_login_pseudo = "select pseudo from _user where pseudo =:pseudo";
    try {
        $sth = $dbh->prepare($sql_login_pseudo);
        $sth->execute(array(':pseudo' => $pseudo));
        $resultat_login_pseudo = $sth->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $ex) {
        die("Erreur lors de la requête SQL : " . $ex->getMessage());
    }

    if (count($resultat_login_pseudo) > 0) {
        $sql_login_mdp = "select mdp from _user where pseudo =:pseudo";
        try {
            $sth = $dbh->prepare($sql_login_mdp);
            $sth->execute(array(
                ':pseudo' => $pseudo
            ));
            $resultat_login_mdp = $sth->fetch(PDO::FETCH_ASSOC);
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


        if ($resultat_login_mdp && password_verify($mdp, $resultat_login_mdp['mdp'])) {
            //CONNEXION REUSSIE
            $_SESSION['pseudo'] = $pseudo;
            header("location:commander.php");
        } else {
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
    header("Location: index.php");
    exit();
}

function check_session_user_non_connecte()
{
  if (!isset($_SESSION['pseudo'])) {
    header("Location: connexion.php");
    exit();
  }
}

function check_session_user_connecte()
{
  if (isset($_SESSION['pseudo'])) {
    header("Location: commander.php");
    exit();
  }
}

function fetch_produits()
{
    $dbh = db_connect();
    $sql_produits = 'select libelle, description, prix_ht
    from produit';
    try {
        $sth = $dbh->prepare($sql_produits);
        $sth->execute();
        $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("<p>Erreur lors de la requête SQL : " . $e->getMessage() . "</p>");
    }
    if (count($rows) > 0) {
    } else {
        echo "<p>Rien à afficher</p>";
    }
    return $rows;
}

function submit_payement(){
    if (isset($_POST['submit'])) {
        header("Location: Comfirmation_payement.php");
        exit();
    }
}
 
