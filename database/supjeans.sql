-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 24 déc. 2021 à 14:49
-- Version du serveur :  5.7.19
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `supjeans`
--

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

DROP TABLE IF EXISTS `adresse`;
CREATE TABLE IF NOT EXISTS `adresse` (
  `ID_ADRESSE` int(4) NOT NULL AUTO_INCREMENT,
  `NUMERO` int(4) NOT NULL,
  `RUE` varchar(50) NOT NULL,
  `VILLE` varchar(30) NOT NULL,
  `CODE_POSTAL` int(5) NOT NULL,
  `PAYS` varchar(30) NOT NULL,
  PRIMARY KEY (`ID_ADRESSE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `ID_CATEGORIE` int(4) NOT NULL AUTO_INCREMENT,
  `NOM` varchar(30) NOT NULL,
  `DESCRIPTION` varchar(500) NOT NULL,
  `URL_PHOTO` varchar(500) NOT NULL,
  PRIMARY KEY (`ID_CATEGORIE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `ID_COMMANDE` int(4) NOT NULL AUTO_INCREMENT,
  `UTILISATEUR` int(4) NOT NULL,
  `ARTICLES` varchar(200) NOT NULL,
  PRIMARY KEY (`ID_COMMANDE`),
  KEY `FK_ID_UTILISATEUR` (`UTILISATEUR`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `jean`
--

DROP TABLE IF EXISTS `jean`;
CREATE TABLE IF NOT EXISTS `jean` (
  `ID_JEAN` int(4) NOT NULL AUTO_INCREMENT,
  `NOM` varchar(50) NOT NULL,
  `ID_MARQUE` int(4) NOT NULL,
  `ID_CATEGORIE` int(4) NOT NULL,
  `PRIX` int(4) NOT NULL,
  `DESCRIPTION` varchar(500) NOT NULL,
  `URL_PHOTO` varchar(500) NOT NULL,
  PRIMARY KEY (`ID_JEAN`),
  KEY `FK_ID_MARQUE` (`ID_MARQUE`),
  KEY `FK_ID_CATEGORIE` (`ID_CATEGORIE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `marque`
--

DROP TABLE IF EXISTS `marque`;
CREATE TABLE IF NOT EXISTS `marque` (
  `ID_MARQUE` int(4) NOT NULL AUTO_INCREMENT,
  `NOM` varchar(50) NOT NULL,
  `DESCRIPTION` varchar(500) NOT NULL,
  `URL_PHOTO` varchar(500) NOT NULL,
  PRIMARY KEY (`ID_MARQUE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `ID_UTILISATEUR` int(4) NOT NULL AUTO_INCREMENT,
  `PRENOM` varchar(20) NOT NULL,
  `NOM` varchar(20) NOT NULL,
  `MAIL` varchar(40) NOT NULL,
  `MOT_DE_PASSE` varchar(30) NOT NULL,
  `ADRESSE_FACT` int(4) NOT NULL,
  `ADRESSE_LIVR` int(4) NOT NULL,
  `ROLE` int(1) NOT NULL,
  PRIMARY KEY (`ID_UTILISATEUR`),
  KEY `FK_ADRESSE_FACT` (`ADRESSE_FACT`),
  KEY `FK_ADRESSE_LIVR` (`ADRESSE_LIVR`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `FK_ID_UTILISATEUR` FOREIGN KEY (`UTILISATEUR`) REFERENCES `utilisateur` (`ID_UTILISATEUR`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `jean`
--
ALTER TABLE `jean`
  ADD CONSTRAINT `FK_ID_CATEGORIE` FOREIGN KEY (`ID_CATEGORIE`) REFERENCES `categorie` (`ID_CATEGORIE`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ID_MARQUE` FOREIGN KEY (`ID_MARQUE`) REFERENCES `marque` (`ID_MARQUE`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `FK_ADRESSE_FACT` FOREIGN KEY (`ADRESSE_FACT`) REFERENCES `adresse` (`ID_ADRESSE`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ADRESSE_LIVR` FOREIGN KEY (`ADRESSE_LIVR`) REFERENCES `adresse` (`ID_ADRESSE`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
