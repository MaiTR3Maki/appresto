-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 04 nov. 2024 à 08:51
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
(8, NULL, '2024-10-20 13:29:31', NULL, 0, 6),
(9, NULL, '2024-10-20 13:30:06', 26.50, 1, 6),
(10, NULL, '2024-10-20 13:33:57', 16.50, 0, 6),
(11, NULL, '2024-10-20 13:36:57', 38.16, 1, 6),
(12, NULL, '2024-10-20 13:37:08', 10.60, 1, 6),
(13, NULL, '2024-10-20 13:37:39', 55.00, 0, 6),
(14, NULL, '2024-10-20 13:37:51', 53.00, 1, 6),
(15, NULL, '2024-10-20 13:43:11', 52.75, 1, 6),
(16, NULL, '2024-10-20 14:05:37', 37.98, 1, 6),
(17, 1, '2024-10-20 14:08:47', 10.55, 1, 6),
(18, 1, '2024-10-20 14:16:46', 316.50, 1, 6),
(19, 1, '2024-10-20 14:30:09', 15.83, 1, 6),
(20, 1, '2024-10-20 14:42:41', 21.10, 1, 6),
(21, 1, '2024-10-20 14:56:07', 10.55, 1, 6),
(22, 1, '2024-10-20 15:00:53', 37.98, 1, 6),
(23, 1, '2024-10-20 15:01:18', 37.98, 1, 6),
(24, 1, '2024-10-20 15:01:46', 37.98, 1, 6),
(25, 1, '2024-10-20 15:02:11', 5.50, 0, 6),
(26, 1, '2024-10-20 15:02:54', 5.28, 1, 6),
(27, 1, '2024-10-20 15:03:53', 10.55, 1, 6),
(28, 1, '2024-10-20 20:28:06', 78.07, 1, 8),
(29, 1, '2024-11-04 08:22:11', 5.28, 1, 6),
(30, 1, '2024-11-04 08:23:43', 5.28, 1, 8),
(31, 1, '2024-11-04 08:27:41', 5.50, 0, 8),
(32, 1, '2024-11-04 08:28:39', 4.40, 0, 8),
(33, 1, '2024-11-04 08:28:50', 5.28, 1, 8),
(34, 1, '2024-11-04 08:31:06', 5.28, 1, 8),
(35, 1, '2024-11-04 08:31:24', 38.50, 0, 8),
(36, 1, '2024-11-04 08:31:39', 47.48, 1, 8),
(37, 1, '2024-11-04 08:50:30', 541.20, 0, 8);

-- --------------------------------------------------------

--
-- Structure de la table `ligne_commande`
--

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
(29, 7, NULL, 4, 8),
(30, 7, NULL, 5, 8),
(31, 0, NULL, 6, 8),
(32, 0, NULL, 7, 8),
(33, 0, NULL, 8, 8),
(34, 5, 25.00, 4, 9),
(35, 0, 0.00, 5, 9),
(36, 0, 0.00, 6, 9),
(37, 0, 0.00, 7, 9),
(38, 0, 0.00, 8, 9),
(39, 3, 15.00, 4, 10),
(40, 0, 0.00, 5, 10),
(41, 0, 0.00, 6, 10),
(42, 0, 0.00, 7, 10),
(43, 0, 0.00, 8, 10),
(44, 0, 0.00, 4, 11),
(45, 9, 36.00, 5, 11),
(46, 0, 0.00, 6, 11),
(47, 0, 0.00, 7, 11),
(48, 0, 0.00, 8, 11),
(49, 2, 10.00, 4, 12),
(50, 0, 0.00, 5, 12),
(51, 0, 0.00, 6, 12),
(52, 0, 0.00, 7, 12),
(53, 0, 0.00, 8, 12),
(54, 10, 50.00, 4, 13),
(55, 0, 0.00, 5, 13),
(56, 0, 0.00, 6, 13),
(57, 0, 0.00, 7, 13),
(58, 0, 0.00, 8, 13),
(59, 10, 50.00, 4, 14),
(60, 0, 0.00, 5, 14),
(61, 0, 0.00, 6, 14),
(62, 0, 0.00, 7, 14),
(63, 0, 0.00, 8, 14),
(64, 10, 50.00, 4, 15),
(65, 0, 0.00, 5, 15),
(66, 0, 0.00, 6, 15),
(67, 0, 0.00, 7, 15),
(68, 0, 0.00, 8, 15),
(69, 0, 0.00, 4, 16),
(70, 9, 36.00, 5, 16),
(71, 0, 0.00, 6, 16),
(72, 0, 0.00, 7, 16),
(73, 0, 0.00, 8, 16),
(74, 2, 10.00, 4, 17),
(75, 0, 0.00, 5, 17),
(76, 0, 0.00, 6, 17),
(77, 0, 0.00, 7, 17),
(78, 0, 0.00, 8, 17),
(116, 10, 50.00, 4, 37),
(117, 10, 40.00, 5, 37),
(118, 10, 80.00, 6, 37),
(119, 10, 80.00, 7, 37),
(120, 10, 50.00, 8, 37),
(121, 10, 40.00, 9, 37),
(122, 10, 125.00, 10, 37),
(123, 9, 27.00, 11, 37);

--
-- Déclencheurs `ligne_commande`
--
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
DELIMITER $$
CREATE TRIGGER `before_ligne_insert` BEFORE INSERT ON `ligne_commande` FOR EACH ROW BEGIN
    DECLARE v_prix_ht DECIMAL(15, 2);

    SELECT prix_ht INTO v_prix_ht FROM produit WHERE id_produit = NEW.id_produit;
    SET NEW.total_ligne_ht = NEW.quantite * v_prix_ht;
END
$$
DELIMITER ;
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
(4, 'Purée classique', 'Notre purée de patate douce, parfaite en accompagnement pour vos plats.', 5.00),
(5, 'Riz classique', 'Notre riz est le plus frais sur terre ! Il va parfaitement avec nos purées.', 4.00),
(6, 'Le poulet frit', 'Notre poulet est élevé en plein-air, et possède l\'un des Q.I. mesuré le plus élevé jamais vu. Testez-le, vous verrez !', 8.00),
(7, 'La salade de crevettes', 'Nos crevettes fraîches sont succulentes, pêchées à Limayrac directement !', 8.00),
(8, 'Les gnocchis ', 'Nos gnocchis à la patate douce sont ronds et doux comme rondoudou !', 5.00),
(9, 'Les pâtes fraîches', 'Nos pâtes proviennent de blé 100% français qui a été nominé comme le blé le plus heureux du monde !', 4.00),
(10, 'Le mafé patate douce', 'Notre mafé spécialement préparé par nos chefs avec amour est à tomber par terre !', 12.50),
(11, 'Jus carotte et patate douce', 'Notre jus de patate douce est naturellement anti-oxydant et sans sucre ajouté ! Il se marie bien avec notre mafé.', 3.00);

-- --------------------------------------------------------

--
-- Structure de la table `_user`
--

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
(4, 'sss', '$2y$10$gS0FL4jhVxpV6sD1dP4dfeWDuZQ80d2lpv.erYtEZzsLr0AsCJ/sy', 'zam@zam.fr'),
(5, '333', '$2y$10$Nw3maqn3DP3mRkluEoAm9.Y330Wwg03cIM2a1z9Q8jVT3pZv5TVYe', 'samu.kakez@gmail.com'),
(6, 'a', '$2y$10$Sc21vn1ybSy0hyo5cvJISeV.dKD9v4TOzhAFlbhmuqsrxbC4XtJUW', 'a@a.a'),
(7, 'b', '$2y$10$96tw/432C1FvVLW46G1VAOaj7bAWYsIkG5W3WXothwm3T8kqxMJy6', 'sadmin@gmail.com'),
(8, 'samuel', '$2y$10$G6pD7sNX0nlJ4gwFRf0.XOmtSvyoim4jPNCYgDrKDIbf1fS3Cun1i', 'sam@gmail.ff');

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
  MODIFY `id_commande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT pour la table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  MODIFY `id_ligne_commande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id_produit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `_user`
--
ALTER TABLE `_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`Id_user`) REFERENCES `_user` (`Id_user`);

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
