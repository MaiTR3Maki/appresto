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

Pour utiliser notre application web, vous devez avoir une base de données MySQL configurée et un serveur apache (Vous pouvez utiliser XAMPP !).

Téléchargez notre application web depuis le dépôt GitHub et copiez-la sur votre serveur (le dossier htdocs si vous être sur XAMPP).

Importez le script de création de la base de données fourni dans le dossier sql/appresto.sql, ou cliquez [ici](sql/appresto.sql).

Assurez-vous que les tables et les données initiales sont correctement créées.

Lancez la page index.php ([ici](index.php)) pour accéder à l'interface web de Patate Douce, vous pouvez créer un compte chez nous et commander !

Merci d'utiliser Patate Douce ! 🍠 Bon appétit !

### 🆕 Mise à jour du 14/11/2024

Nous venons de créer nos APIs, qui permettent de communiquer entre le client et le serveur.
Vous pouvez consulter la documentation en suivant ce [lien](Documentation/lot-5/doc_APIs).
Un fichier JSON est également disponible [ici](Documentation/lot-5/commandes_en_attente.json).

### Mise à jour du 17/10/2024

Le site web Patate Douce est désormais connecté à une base de données MySQL, avec laquelle il communique activement pour afficher les produits disponibles.

Vous pouvez sélectionner les produits et les quantités que vous souhaitez acheter, puis cliquer sur le bouton "Commander" pour passer la commande.

Une fois la commande passée, vous avez la possibilité de consulter vos commandes récentes, vérifier leur statut et les détails associés.

## Documentation 
[Le diagramme des cas d'utilisation](Documentation/lot-1/Diagramme%20Utilisateur.drawio.pdf)
[Le modèle conceptuel des données (looping ou équivalent)](Documentation/lot-1/MCD_final.jpg)
[Le modèle logique des données (PHPMyAdmin ou équivalent)](Documentation/lot-1/MLD_final.jpg)
[Le modèle physique des données (script(s) SQL)](sql/appresto.sql)
[Une description des valeurs possibles pour : les états des commandes/les types de conso. (sur place/à emporter)](Documentation/lot-6/Documents/état_possible)
[Le sitemap (enchaînement des pages)](Documentation/lot-1/Restoweb-%20Client.pdf)
[les maquettes de l'IHM (Balsamiq ou équivalent)](Documentation/lot-1/Restoweb-%20Client.pdf)
[la maquette JSON et si nécessaire les différents messages d'erreur si une réponse est notifiée](Documentation/lot-5/commandes_en_attente.json)