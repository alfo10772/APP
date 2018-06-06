-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 06 juin 2018 à 10:29
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
-- Structure de la table `typecomposant`
--

CREATE TABLE `typecomposant` (
  `IDtypeComposant` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `type` int(1) NOT NULL,
  `unite` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `typecomposant`
--

INSERT INTO `typecomposant` (`IDtypeComposant`, `nom`, `type`, `unite`) VALUES
(1, 'Capteur de température', 0, 'C°'),
(2, 'Capteur de fumée', 0, ''),
(11, 'volet', 1, ''),
(14, 'Capteur de luminosité', 0, ''),
(15, 'Lumière', 1, ''),
(16, 'test', 1, '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `typecomposant`
--
ALTER TABLE `typecomposant`
  ADD PRIMARY KEY (`IDtypeComposant`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `typecomposant`
--
ALTER TABLE `typecomposant`
  MODIFY `IDtypeComposant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
