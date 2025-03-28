## Ce document vise à décrire les échanges entre le client java (RestoSwing) et le serveur php (RestoWeb). Je précise que le client RestoSwing n'existe pas encore.

Les échanges entre client et serveur sont gérés par des APIs. (Une API est une interface de communication qui permet d’échanger des données et des fonctionnalités.)

Avec une API, seuls les points d'entrée et de sortie sont exposés. Le code source, qui contient la logique métier et les algorithmes, reste protégé sur le serveur de l’API. On parle d'encapsulation.

Notre application possède pour l'instant 4 APIs. Tous nos APIs sont des fichiers PHP que le client appelle sous forme d'URL. 

Je vais diviser ceux-ci en deux parties :

-- Les APIs qui mettent à jour la base de données --

Ceux-ci prennent en paramètre l'id de la commande via la méthode GET (url), et mettent à jour le statut de celle-ci.

- commande_accepter.php : Met le statut de la commande en "acceptée" (id_etat = 2)

- commande_refuser.php : Met le statut de la commande en "refusée" (id_etat = 3)

- commande_terminer.php : Met le statut de la commande en "terminée" (id_etat = 4)

Ces APIs ne renvoient rien pour l'instant, elles ne font que mettre à jour la BDD.


-- L'API qui encode les données des commandes provenant de la BDD en format JSON. --

- commandes_en_attente.php : Récupère toutes les commandes en attente (id_etat = 1), ainsi que leurs lignes de commandes liées, puis encode ces données dans un tableau sous format JSON, et renvoie les données sous format JSON.

Ces données sous format JSON sont constituées des informations sur les commandes en attente, ainsi que les informations relatives aux produits associés à chaque commande, il y a en fait deux tableaux imbriqués.

Voici un extrait du fichier JSON : 

```json
[
    {
        "id_commande": 38,
        "_date": "2024-11-07 11:30:13",
        "id_etat": 1,
        "sum(ligne_commande.quantite)": "7",
        "total_conso": "35.20",
        "lignes_commande": [
            {
                "id_ligne_commande": 124,
                "libelle": "Pur\u00e9e classique",
                "quantite": 4
            },
            {
                "id_ligne_commande": 125,
                "libelle": "Riz classique",
                "quantite": 3
            }
        ]
    },

    (…)
```

Le fichier JSON entier se trouve dans le même dossier que la documentation que vous êtes en train de lire.