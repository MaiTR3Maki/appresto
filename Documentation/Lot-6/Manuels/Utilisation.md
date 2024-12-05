--- Manuel d'utilisation ---

-- Sommaire 

- Partie 1 -> Inscription
- Partie 2 -> Connexion
- Partie 3 -> Commande
- Partie 4 -> Paiement
- Partie 5 -> API


Partie 1 -> Inscription <-

Pour vous inscrire, dirigez vous vers la page d'inscription (Sur l'accueil, cliquez en haut à droite). 

Vous devez saisir les données suivantes :

- Identifiant 
- Email
- Mot de passe

Ensuite, cliquez sur "Créer mon compte", vous serez redirigé vers la page de connexion.


Partie 2 -> Connexion <-

Une fois inscrit, vous devez saisir vos identifiants sur la page de connexion, puis cliquez sur "Connexion".

Vous pouvez accéder à la page de connexion directement depuis la page d'accueil en cliquant sur l'icône à gauche de l'inscription.


Partie 3 -> Commande <-

Une fois connecté, vous pouvez choisir les produits que vous souhaitez et leur quantité (10 max), puis cliquer sur "Valider" à droite des produits pour valider votre panier.

Lorsque vous validez votre panier, vous serez redirigé vers une page qui vous propose de consommer votre commande sur place ou à emporter. En glissant votre souris sur l'une des deux options, la TVA correspondante sera affichée.

Partie 4 -> Paiement <-

Après avoir choisi votre type de consommation (sur place - à emporter), vous serez redirigé vers la page paiement.

Celle-ci affiche le résumé de votre commande (les produits et leurs prix, ainsi qu'un rappel de la TVA). Le prix total hors HT et TTC est également calculé et affiché.

Un formulaire fictif d'informations bancaires est présent la page, vous NE DEVEZ PAS INSCRIRE VOS DONNÉES BANCAIRES.

Si la commande vous convient, vous pouvez cliquer sur "Payer".

Une pop-up affichant le total TTC de votre commande vous demandera de confirmer la commande.

Une fois la commande passée, le récapitulatif de celle-ci vous sera présenté, et vous pouvez voir toutes vos commandes en cliquant sur "Mes commandes".

Partie 5 -> API <-

Notre application contient des APIs :

Pour accéder aux API, vous devez pour l'instant entrer les URLs ci-dessous. Vous devez remplacer "votredossier" par le nom du dossier qui contient le code source de l'application (Si vous voulez de l'aide pour l'installation, c'est ici : [link](../Manuels/Installation.md))

1 API qui affiche sous format JSON un tableau des commandes et des lignes commandes associées. Celui-ci n'a pas de paramètre.

http://localhost/votredossier/webresto/appresto/api/commandes_en_attente.php

3 APIs qui mettent à jour le statut d'une commande via l'id commande récupéré dans l'URL.

http://localhost/votredossier/webresto/appresto/api/commande_accepter.php?id_commande=1

http://localhost/votredossier/webresto/appresto/api/commande_refuser.php?id_commande=1

http://localhost/votredossier/webresto/appresto/api/commande_terminer.php?id_commande=1

Si vous voulez plus d'informations sur les APIs, c'est ici : [link](../../lot-5/doc_APIs.md)



