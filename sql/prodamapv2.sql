-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 27 mai 2018 à 17:12
-- Version du serveur :  5.7.21
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `prodamapv2`
--

-- --------------------------------------------------------

--
-- Structure de la table `adherant`
--

DROP TABLE IF EXISTS `adherant`;
CREATE TABLE IF NOT EXISTS `adherant` (
  `adher_id` int(11) NOT NULL AUTO_INCREMENT,
  `adher_tresorier` tinyint(1) NOT NULL,
  PRIMARY KEY (`adher_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `adherant`
--

INSERT INTO `adherant` (`adher_id`, `adher_tresorier`) VALUES
(1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `amap`
--

DROP TABLE IF EXISTS `amap`;
CREATE TABLE IF NOT EXISTS `amap` (
  `amap_id` int(11) NOT NULL AUTO_INCREMENT,
  `amap_nom` varchar(100) DEFAULT NULL,
  `amap_adresse1` varchar(25) DEFAULT NULL,
  `amap_adresse2` varchar(25) DEFAULT NULL,
  `amap_codepostal` varchar(25) DEFAULT NULL,
  `amap_ville` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`amap_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `amap`
--

INSERT INTO `amap` (`amap_id`, `amap_nom`, `amap_adresse1`, `amap_adresse2`, `amap_codepostal`, `amap_ville`) VALUES
(1, 'amap du 45', 'rue de la rue', 'baiment gg', '45000', 'Orléans');

-- --------------------------------------------------------

--
-- Structure de la table `contrat`
--

DROP TABLE IF EXISTS `contrat`;
CREATE TABLE IF NOT EXISTS `contrat` (
  `cont_id` int(11) NOT NULL AUTO_INCREMENT,
  `cont_date_recept` datetime DEFAULT NULL,
  `cont_montant` float NOT NULL,
  `cont_date_debut` datetime DEFAULT NULL,
  `cont_date_fin` datetime DEFAULT NULL,
  `prod_id` int(11) NOT NULL,
  `amap_id` int(11) NOT NULL,
  `adher_id` int(11) NOT NULL,
  PRIMARY KEY (`cont_id`),
  KEY `contrat_producteur_FK` (`prod_id`),
  KEY `contrat_amap0_FK` (`amap_id`),
  KEY `contrat_adherant1_FK` (`adher_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `contrat`
--

INSERT INTO `contrat` (`cont_id`, `cont_date_recept`, `cont_montant`, `cont_date_debut`, `cont_date_fin`, `prod_id`, `amap_id`, `adher_id`) VALUES
(2, '2018-05-15 00:00:00', 150, '2017-10-16 00:00:00', '2019-04-19 00:00:00', 1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `famille`
--

DROP TABLE IF EXISTS `famille`;
CREATE TABLE IF NOT EXISTS `famille` (
  `fam_id` int(11) NOT NULL AUTO_INCREMENT,
  `fam_nom` varchar(255) DEFAULT NULL,
  `util_id` int(11) NOT NULL,
  PRIMARY KEY (`fam_id`),
  KEY `famille_utilisateur_FK` (`util_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `famille`
--

INSERT INTO `famille` (`fam_id`, `fam_nom`, `util_id`) VALUES
(3, 'légume', 1),
(4, 'fruit', 1);

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `panier_id` int(11) NOT NULL AUTO_INCREMENT,
  `panier_date_prevue` datetime DEFAULT NULL,
  `panier_recept` tinyint(1) NOT NULL,
  `panier_date_recept` datetime DEFAULT NULL,
  `panier_actif` tinyint(1) NOT NULL COMMENT 'Le panier est il toujours prévu ?',
  `util_panier_probleme` tinyint(1) DEFAULT NULL,
  `util_panier_raison` varchar(25) DEFAULT NULL,
  `cont_id` int(11) NOT NULL,
  `adher_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`panier_id`),
  KEY `panier_contrat_FK` (`cont_id`),
  KEY `panier_adherant0_FK` (`adher_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`panier_id`, `panier_date_prevue`, `panier_recept`, `panier_date_recept`, `panier_actif`, `util_panier_probleme`, `util_panier_raison`, `cont_id`, `adher_id`) VALUES
(1, '2018-04-01 14:30:00', 1, '2018-04-01 14:30:00', 1, NULL, NULL, 2, 1),
(2, '2018-05-01 13:00:00', 1, '2018-05-08 00:00:00', 1, 1, 'Grève SNCF', 2, 1),
(3, '2018-06-01 14:30:00', 0, NULL, 1, NULL, NULL, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `producteur`
--

DROP TABLE IF EXISTS `producteur`;
CREATE TABLE IF NOT EXISTS `producteur` (
  `prod_id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_verif` tinyint(1) NOT NULL,
  `prod_siren` varchar(100) NOT NULL,
  `prod_date_verif` datetime DEFAULT NULL,
  `prod_nom_exploit` varchar(100) NOT NULL,
  `produit_id` int(11) NOT NULL,
  PRIMARY KEY (`prod_id`),
  KEY `producteur_produit_FK` (`produit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `producteur`
--

INSERT INTO `producteur` (`prod_id`, `prod_verif`, `prod_siren`, `prod_date_verif`, `prod_nom_exploit`, `produit_id`) VALUES
(1, 1, '123456', '2017-05-08 00:00:00', '123456', 1),
(2, 1, '123456', '2017-05-07 00:00:00', '123456', 2);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `produit_id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_nom` varchar(100) DEFAULT NULL,
  `fam_id` int(11) NOT NULL,
  `util_id` int(11) NOT NULL,
  PRIMARY KEY (`produit_id`),
  KEY `produit_famille_FK` (`fam_id`),
  KEY `produit_utilisateur0_FK` (`util_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`produit_id`, `prod_nom`, `fam_id`, `util_id`) VALUES
(1, 'raisin', 4, 1),
(2, 'courgette', 3, 1),
(3, 'zee', 3, 2);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `util_id` int(11) NOT NULL AUTO_INCREMENT,
  `util_nom` varchar(100) DEFAULT NULL,
  `util_prenom` varchar(100) DEFAULT NULL,
  `util_tel` varchar(100) NOT NULL,
  `util_mail` varchar(100) NOT NULL,
  `util_login` varchar(100) NOT NULL,
  `util_mdp` varchar(100) NOT NULL,
  `util_actif` tinyint(1) NOT NULL,
  `util_superadmin` tinyint(1) NOT NULL,
  `util_adresse1` varchar(25) DEFAULT NULL,
  `util_adresse2` varchar(25) DEFAULT NULL,
  `util_codepostal` varchar(25) DEFAULT NULL,
  `util_ville` varchar(25) DEFAULT NULL,
  `producteur` int(11) DEFAULT NULL,
  `adherant` int(11) DEFAULT NULL,
  PRIMARY KEY (`util_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`util_id`, `util_nom`, `util_prenom`, `util_tel`, `util_mail`, `util_login`, `util_mdp`, `util_actif`, `util_superadmin`, `util_adresse1`, `util_adresse2`, `util_codepostal`, `util_ville`, `producteur`, `adherant`) VALUES
(1, 'administrateur', 'administrateur', '0606060606', 'mail@gmail.com', 'administrateur', 'mdp', 1, 1, '1 rue de la rue', 'batiment a', '45000', 'Orléans', NULL, NULL),
(2, 'producteur', 'producteur', '0606060606', 'mail@gmail.com', 'producteur', 'mdp', 1, 0, '1 rue de la rue', 'batiment a', '45000', 'Orléans', 1, NULL),
(3, 'adherant', 'adherant', '0606060606', 'mail@gmail.com', 'adherant', 'mdp', 1, 0, '1 rue de la rue', 'batiment a', '45000', 'Orléans2', NULL, 1),
(4, 'producteur2', 'producteur2', '0606060606', 'mail@gmail.com', 'producteur2', 'mdp', 1, 0, '1 rue de la rue', 'batiment a', '45000', 'Orléans', 2, NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `contrat`
--
ALTER TABLE `contrat`
  ADD CONSTRAINT `contrat_adherant1_FK` FOREIGN KEY (`adher_id`) REFERENCES `adherant` (`adher_id`),
  ADD CONSTRAINT `contrat_amap0_FK` FOREIGN KEY (`amap_id`) REFERENCES `amap` (`amap_id`),
  ADD CONSTRAINT `contrat_producteur_FK` FOREIGN KEY (`prod_id`) REFERENCES `producteur` (`prod_id`);

--
-- Contraintes pour la table `famille`
--
ALTER TABLE `famille`
  ADD CONSTRAINT `famille_utilisateur_FK` FOREIGN KEY (`util_id`) REFERENCES `utilisateur` (`util_id`);

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `panier_adherant0_FK` FOREIGN KEY (`adher_id`) REFERENCES `adherant` (`adher_id`),
  ADD CONSTRAINT `panier_contrat_FK` FOREIGN KEY (`cont_id`) REFERENCES `contrat` (`cont_id`);

--
-- Contraintes pour la table `producteur`
--
ALTER TABLE `producteur`
  ADD CONSTRAINT `producteur_produit_FK` FOREIGN KEY (`produit_id`) REFERENCES `produit` (`produit_id`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_famille_FK` FOREIGN KEY (`fam_id`) REFERENCES `famille` (`fam_id`),
  ADD CONSTRAINT `produit_utilisateur0_FK` FOREIGN KEY (`util_id`) REFERENCES `utilisateur` (`util_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
