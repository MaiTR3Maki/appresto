# Patate Douce - Application Web de Commande en Ligne

## ⚠️ Important : Avant d'utiliser cette application, assurez-vous d'installer la base de données MySQL !

### Ce dépôt GitHub regroupe le code source de notre application web, ainsi que sa documentation.

Dans le cadre de ce projet, nous développons une application web pour les clients et les restaurateurs.

- Interface Web pour les Clients :

Permet aux clients de passer des commandes en ligne.
Les clients peuvent sélectionner les produits disponibles, choisir les quantités souhaitées et passer commande.

- Client lourd java pour les restaurateurs :
Permet aux restaurateurs d'accepter, modifier, refuser ou terminer les commandes en cours. 

- APIs faisant le lien entre l'interface web et le client lourd.

## 🔧 Installation :

Pour utiliser notre application web, vous devez avoir une base de données MySQL configurée et un serveur apache (Vous pouvez utiliser XAMPP !).

Téléchargez notre application web depuis le dépôt GitHub et copiez-la sur votre serveur (le dossier htdocs si vous être sur XAMPP).

Importez le script de création de la base de données fourni dans le dossier sql/appresto.sql, ou cliquez sur [Link](sql/appresto.sql)

Assurez-vous que les tables et les données initiales sont correctement créées.

Lancez la page index.php ([Link](index.php)) pour accéder à l'interface web de Patate Douce, vous pouvez créer un compte chez nous et commander !

Merci d'utiliser Patate Douce ! 🍠 Bon appétit !

### 🆕 Mise à jour du 14/11/2024

Nous venons de créer nos APIs, qui permettent de communiquer entre le client et le serveur.
Vous pouvez consulter la documentation en suivant ce lien : [Link](Documentations/lot-5/doc_APIs)
Un fichier JSON est également disponible ici : [Link](Documentations/lot-5/commandes_en_attente.json)

### Mise à jour du 17/10/2024

Le site web Patate Douce est désormais connecté à une base de données MySQL, avec laquelle il communique activement pour afficher les produits disponibles.

Vous pouvez sélectionner les produits et les quantités que vous souhaitez acheter, puis cliquer sur le bouton "Commander" pour passer la commande.

Une fois la commande passée, vous avez la possibilité de consulter vos commandes récentes, vérifier leur statut et les détails associés.