Patate Douce - Application Web de Commande en Ligne

⚠️ Important : Avant d'utiliser cette application, assurez-vous d'installer la base de données MySQL et les triggers associés. 

Ce dépôt GitHub regroupe le code source de notre application web, ainsi que sa documentation.

Dans le cadre de ce projet, nous développons une application web pour les clients et les restaurateurs.

- Interface Web pour les Clients :

Permet aux clients de passer des commandes en ligne.
Les clients peuvent sélectionner les produits disponibles, choisir les quantités souhaitées et passer commande.

🆕 Mise à jour du 17/10/2024

Le site web Patate Douce est désormais connecté à une base de données MySQL, avec laquelle il communique activement pour afficher les produits disponibles.
Nouveauté : Les clients peuvent maintenant afficher l'historique de leurs commandes directement depuis l'interface web.
Vous pouvez sélectionner les produits et les quantités que vous souhaitez acheter, puis cliquer sur le bouton "Commander" pour passer la commande.
Une fois la commande passée, vous avez la possibilité de consulter vos commandes récentes, vérifier leur statut et les détails associés.

- Application Java pour les Restaurateurs :

Permet aux restaurateurs de gérer les commandes reçues.
Les restaurateurs peuvent accepter ou refuser des commandes et mettre à jour leur statut en temps réel.
Celle-ci n'est pas encore commencée, stay tuned !

🔧 Installation :

Base de Données :

Importez le script de création de la base de données fourni dans le dossier /sql/appresto.sql
Assurez-vous que les tables et les données initiales sont correctement créées.
Triggers :

Les triggers sont essentiels pour le calcul automatique des totaux.
Exécutez les scripts de création des triggers également disponibles dans le dossier /sql/Triggers.sql

Merci d'utiliser Patate Douce ! 🍠 Bon appétit !