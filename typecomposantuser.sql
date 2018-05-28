-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 28 mai 2018 à 10:45
-- Version du serveur :  10.1.31-MariaDB
-- Version de PHP :  7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bdd_a`
--

-- --------------------------------------------------------

--
-- Structure de la table `typecomposantuser`
--

CREATE TABLE `typecomposantuser` (
  `IDtypecomposant` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `type1` tinyint(1) NOT NULL,
  `userID` int(11) NOT NULL,
  `affichage` varchar(30) NOT NULL DEFAULT 'moyenne'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `typecomposantuser`
--

INSERT INTO `typecomposantuser` (`IDtypecomposant`, `nom`, `type1`, `userID`, `affichage`) VALUES
(1, 'Capteur de température', 0, 15, 'cuisine'),
(2, 'Capteur de fumée', 0, 15, 'cuisine'),
(3, 'essai', 0, 15, 'piece'),
(4, 'essai 2', 0, 15, 'test'),
(11, 'volet', 1, 15, 'moyenne'),
(2, 'Capteur de fumée', 0, 14, 'moyenne');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
