-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 05 déc. 2024 à 10:52
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `appresto`
--
CREATE DATABASE IF NOT EXISTS `appresto` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `appresto`;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE `commande` (
  `id_commande` int(11) NOT NULL,
  `id_etat` int(11) DEFAULT NULL,
  `_date` datetime DEFAULT NULL,
  `total_conso` decimal(15,2) DEFAULT NULL,
  `type_conso` tinyint(4) NOT NULL,
  `Id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id_commande`, `id_etat`, `_date`, `total_conso`, `type_conso`, `Id_user`) VALUES
(1, 1, '2024-12-05 10:51:32', 32.45, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `ligne_commande`
--

DROP TABLE IF EXISTS `ligne_commande`;
CREATE TABLE `ligne_commande` (
  `id_ligne_commande` int(11) NOT NULL,
  `quantite` int(11) DEFAULT NULL,
  `total_ligne_ht` decimal(15,2) DEFAULT NULL,
  `id_produit` int(11) NOT NULL,
  `id_commande` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `ligne_commande`
--

INSERT INTO `ligne_commande` (`id_ligne_commande`, `quantite`, `total_ligne_ht`, `id_produit`, `id_commande`) VALUES
(1, 1, 5.00, 0, 1),
(2, 2, 8.00, 1, 1),
(3, 1, 3.00, 7, 1),
(4, 3, 13.50, 8, 1);

--
-- Déclencheurs `ligne_commande`
--
DROP TRIGGER IF EXISTS `after_ligne_insert`;
DELIMITER $$
CREATE TRIGGER `after_ligne_insert` AFTER INSERT ON `ligne_commande` FOR EACH ROW BEGIN
    DECLARE v_total_conso DECIMAL(15, 2);
    DECLARE v_type_conso TINYINT;
    DECLARE v_tva DECIMAL(4, 3);

    /*Récupérer la somme des totaux ligne HT*/
    SELECT SUM(total_ligne_ht) INTO v_total_conso FROM ligne_commande WHERE id_commande = NEW.id_commande;

    /*Récupérer le type de consommation (1 = sur place, 0 = à emporter)*/
    SELECT type_conso INTO v_type_conso FROM commande WHERE id_commande = NEW.id_commande;
   
    /*Déterminer le taux de TVA en fonction du type de consommation*/
    IF v_type_conso = 1 THEN
        SET v_tva = 1.055; -- TVA de 5.5% sur place
    ELSE
        SET v_tva = 1.10;  -- TVA de 10% à emporter
    END IF;

    -- Appliquer la TVA au total
    SET v_total_conso = v_total_conso * v_tva;

    -- Mettre à jour le total consommation dans la commande
    UPDATE commande SET total_conso = v_total_conso WHERE id_commande = NEW.id_commande;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `after_ligne_update`;
DELIMITER $$
CREATE TRIGGER `after_ligne_update` AFTER UPDATE ON `ligne_commande` FOR EACH ROW BEGIN
    DECLARE v_total_conso DECIMAL(15, 2);
    DECLARE v_tva DECIMAL(4, 3);
    DECLARE v_type_conso TINYINT;

    /*Récupérer la somme des totaux ligne HT*/
    SELECT SUM(total_ligne_ht) INTO v_total_conso FROM ligne_commande WHERE id_commande = NEW.id_commande;

    /*Récupérer le type de consommation (1 = sur place, 0 = à emporter)*/
    SELECT type_conso INTO v_type_conso FROM commande WHERE id_commande = NEW.id_commande;

    /*Déterminer le taux de TVA en fonction du type de consommation*/
    IF v_type_conso = 1 THEN
        SET v_tva = 1.055; -- TVA de 5.5% sur place
    ELSE
        SET v_tva = 1.10;  -- TVA de 10% à emporter
    END IF;

    -- Appliquer la TVA au total
    SET v_total_conso = v_total_conso * v_tva;

    -- Mettre à jour le total consommation dans la commande
    UPDATE commande SET total_conso = v_total_conso WHERE id_commande = NEW.id_commande;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `before_ligne_insert`;
DELIMITER $$
CREATE TRIGGER `before_ligne_insert` BEFORE INSERT ON `ligne_commande` FOR EACH ROW BEGIN
    DECLARE v_prix_ht DECIMAL(15, 2);

    SELECT prix_ht INTO v_prix_ht FROM produit WHERE id_produit = NEW.id_produit;
    SET NEW.total_ligne_ht = NEW.quantite * v_prix_ht;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `before_ligne_update`;
DELIMITER $$
CREATE TRIGGER `before_ligne_update` BEFORE UPDATE ON `ligne_commande` FOR EACH ROW BEGIN
    DECLARE v_prix_ht DECIMAL(15, 2);
    
    SELECT prix_ht INTO v_prix_ht FROM produit WHERE id_produit = NEW.id_produit;
    SET NEW.total_ligne_ht = NEW.quantite * v_prix_ht;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE `produit` (
  `id_produit` int(11) NOT NULL,
  `libelle` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `prix_ht` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `libelle`, `description`, `prix_ht`) VALUES
(0, 'La Purée classique', 'Notre purée de patate douce, parfaite en accompagnement pour vos plats.', 5.00),
(1, 'Le Riz classique', 'Notre riz est le plus frais sur terre ! Il va parfaitement avec nos purées.', 4.00),
(2, 'Le Poulet Frit', 'Notre poulet est élevé en plein-air, et possède l\'un des Q.I. mesuré le plus élevé jamais vu. Testez-le, vous verrez !', 8.00),
(3, 'La Salade de Crevettes', 'Nos crevettes fraîches sont succulentes, pêchées à Limayrac directement !', 8.00),
(4, 'Les Gnocchis Patate Douce', 'Nos gnocchis à la patate douce sont ronds et doux comme rondoudou !', 5.00),
(5, 'Les Pâtes Fraîches', 'Nos pâtes proviennent de patates douces élevées avec amour en Irlande !', 4.00),
(6, 'Le Mafé Patate Douce', 'Notre mafé spécialement préparé par nos chefs avec amour est à tomber par terre !', 12.50),
(7, 'Le Jus à la carotte', 'Notre jus de carotte est naturellement anti-oxydant et sans sucre ajouté !', 3.00),
(8, 'Le yaourt patate douce', 'Savourez notre yaourt à la patate douce : onctueux, naturellement doux, et terriblement gourmand.', 4.50);

-- --------------------------------------------------------

--
-- Structure de la table `_user`
--

DROP TABLE IF EXISTS `_user`;
CREATE TABLE `_user` (
  `id_user` int(11) NOT NULL,
  `pseudo` varchar(255) DEFAULT NULL,
  `mdp` varchar(255) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `_user`
--

INSERT INTO `_user` (`id_user`, `pseudo`, `mdp`, `mail`) VALUES
(1, 'test', '$2y$10$uMAhCs4uQ0IMD6wQHFEXVOiDIBhjML0ZjLWZbDWlZ1Gyq54BQbXeu', 'test@test.test');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_commande`),
  ADD KEY `Id_user` (`Id_user`);

--
-- Index pour la table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  ADD PRIMARY KEY (`id_ligne_commande`),
  ADD KEY `id_produit` (`id_produit`),
  ADD KEY `id_commande` (`id_commande`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id_produit`);

--
-- Index pour la table `_user`
--
ALTER TABLE `_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_commande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  MODIFY `id_ligne_commande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id_produit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `_user`
--
ALTER TABLE `_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`Id_user`) REFERENCES `_user` (`id_user`);

--
-- Contraintes pour la table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  ADD CONSTRAINT `ligne_commande_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`),
  ADD CONSTRAINT `ligne_commande_ibfk_2` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id_commande`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
