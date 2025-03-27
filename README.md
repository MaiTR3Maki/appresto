# Patate Douce - Application Web de Commande en Ligne

## ⚠️ Important : Avant d'utiliser cette application, assurez-vous d'installer la base de données MySQL !

### Ce dépôt GitHub regroupe le code source de notre application web, ainsi que sa documentation.

Dans le cadre de ce projet, nous développons une application web pour les clients et les restaurateurs.

- Interface Web pour les Clients :

Permet aux clients de passer des commandes en ligne.
Les clients peuvent sélectionner les produits disponibles, choisir les quantités souhaitées et passer commande.

- Client lourd java pour les restaurateurs :

Permet aux restaurateurs d'accepter, modifier, refuser ou terminer les commandes en cours. 

- APIs faisant le lien entre l'interface web et le client lourd : 

Permet la communication entre le client et le serveur.

## 🔧 Installation :

Pour l'installation de notre application web, c'est [ici!](restoweb/Documentation/Lot-6/Manuels/Installation.md).

## 🔧 Utilisation:

Vous ne savez pas comment utiliser notre application web ? Consultez le manuel d'utilisation [ici!](restoweb/Documentation/Lot-6/Manuels/Utilisation.md)

### 🆕 Mise à jour du 27/03/2025
Nous venons de créer le client lourd Java, qui permet aux restaurateurs d'accepter, refuser ou prévenir que les commandes sont terminée terminer.
Le restoswing permet de visualiser les commandes en cours et de voir le détail des commandes.
le code est disponible [ici](Restoswing/).

###  Mise à jour du 14/11/2024

Nous venons de créer nos APIs, qui permettent de communiquer entre le client et le serveur.
Vous pouvez consulter la documentation en suivant ce [lien](restoweb/Documentation/lot-5/doc_APIs.md).
Un fichier JSON est également disponible [ici](restoweb/Documentation/lot-5/commandes_en_attente.json).

### Mise à jour du 17/10/2024

Le site web Patate Douce est désormais connecté à une base de données MySQL, avec laquelle il communique activement pour afficher les produits disponibles.

Vous pouvez sélectionner les produits et les quantités que vous souhaitez acheter, puis cliquer sur le bouton "Commander" pour passer la commande.

Une fois la commande passée, vous avez la possibilité de consulter vos commandes récentes, vérifier leur statut et les détails associés.

## Documentation 
[Diagramme des cas d'utilisation restoweb ](restoweb/Documentation/Lot-1/DCU_RESTOWEB.png)

[Diagramme des cas d'utilisation restoswing ](restoweb/Documentation/Lot-1/DCU_RESTOSWING.png)

[Modèle conceptuel des données](restoweb/Documentation/Lot-1/MCD_APPRESTO.png)

[Modèle logique des données](restoweb/Documentation/Lot-1/MLD_APPRESTO.png)

[Script de création de la BDD](restoweb/sql/appresto.sql)

[Description des valeurs possibles pour : les états des commandes/les types de conso. (sur place/à emporter)](restoweb/Documentation/Lot-6/Documents/etats_possibles.md)

[IHM et Sitemap RestoWeb](restoweb/Documentation/Lot-1/Restoweb-%20Client.pdf)

[IHM et Sitemap RestoSwing](restoweb/Documentation/Lot-1/RestoWeb%20-%20Java.pdf)

[Maquette JSON](restoweb/Documentation/lot-5/commandes_en_attente.json)

## Merci d'utiliser Patate Douce ! 🍠 Bon appétit !
