-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : Dim 02 juil. 2023 à 14:05
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `monboncoin`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonces`
--

DROP TABLE IF EXISTS `annonces`;
CREATE TABLE IF NOT EXISTS `annonces` (
  `idAnnonce` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `idCategorie` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `actif` int(11) NOT NULL DEFAULT '1',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idAnnonce`),
  KEY `idUser` (`idUser`),
  KEY `idCategorie` (`idCategorie`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `annonces`
--

INSERT INTO `annonces` (`idAnnonce`, `idUser`, `idCategorie`, `title`, `description`, `price`, `image`, `actif`, `date`) VALUES
(4, 2, 2, 'tondeuse', 'tondeuse électrique, maximum 250 m²', 258, 'tondeuse.jpg', 1, '2023-02-15 12:34:13'),
(7, 1, 2, 'transat', 'super transat', 50, '63ef701105a5ctransat.jpg', 1, '2023-02-17 12:16:17'),
(8, 14, 3, '208', 'super 208 jaune', 8000, '63ef9f76b8ed6208.jpg', 1, '2023-02-17 15:38:30');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `idCategorie` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`idCategorie`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`idCategorie`, `title`) VALUES
(1, 'maison'),
(2, 'jardin'),
(3, 'véhicule'),
(4, 'tech'),
(5, 'non classé'),
(7, 'instruments de musique');

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `idOrder` int(11) NOT NULL AUTO_INCREMENT,
  `idAnnonce` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idOrder`),
  KEY `idAnnonce` (`idAnnonce`),
  KEY `idUser` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `role` int(11) NOT NULL DEFAULT '0',
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `adress` varchar(255) DEFAULT NULL,
  `cp` int(11) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`idUser`, `role`, `login`, `password`, `firstName`, `lastName`, `adress`, `cp`, `city`) VALUES
(1, 1, 'admin@admin.fr', '$2y$10$A7H1//nSrbGctjXKxCplhutBIerOqX/wW/xNG/iS8Of8j0tsApZfy', 'admin', 'administrateur', '105 rue de rivoli', 75001, 'paris'),
(2, 0, 'sylvain@gmail.com', '$2y$10$7F7/3ci.P/ELXzujNUwlyuqSzO1llIn97qpp4Qn/nq1UXlCbbNWvm', 'sylvain', 'campos', '21 av des yvris', 93160, 'Noisy le grand'),
(3, 0, 'toto@gmail.com', '$2y$10$A2B6B125V2/s.G0sHj/BZOjnD9APwxKsrsyxg0mSa4QzUkHgl.7RK', 'toto', 'nomToto', '66 rue de paris', 77140, 'nemours'),
(5, 0, 'candice@gmail.com', '$2y$10$HvEPTqcfmLG0EZct1SEbuuJk1OiwPBzcOKbP8TGnZkn3eYGQHJ4C2', 'CANDICE', 'CAMPOS', '1 allée de la noiseraie', 93160, 'Noisy-le-Grand'),
(6, 0, 'csylvainc@gmail.com', '$2y$10$2rZbSQCmzTs92tMEr17JTeot7uoUZ6DSFYkXLbghIjmZN4QPdbUc6', 'candice', 'chan', '21 Avenue des Yvris', 93160, 'Noisy-le-Grand'),
(13, 0, 'test@gmail.com', '$2y$10$CH/P313oQZUfNBLRADTjl.jnK5APSCOnbq2gYLUPx6KkVfVtTlzxC', 'test', 'test', '&lt;h1&gt;21 Avenue des Yvris&lt;/h1&gt;', 93160, 'Noisy-le-Grand'),
(14, 0, 'test2@gmail.com', '$2y$10$Lw5Y6Z2MilDLP2iJn8gtqerLZi4JIWXkkUhyktrhUz5sMBf/UFaWa', 'test', 'test', '21 Avenue des Yvris', 93160, 'Noisy-le-Grand');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `annonces`
--
ALTER TABLE `annonces`
  ADD CONSTRAINT `annonces_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `annonces_ibfk_2` FOREIGN KEY (`idCategorie`) REFERENCES `categories` (`idCategorie`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`idAnnonce`) REFERENCES `annonces` (`idAnnonce`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
