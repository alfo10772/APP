-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 04 juin 2018 à 10:28
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
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `IDutilisateur` int(11) NOT NULL,
  `IDprincipal` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `mail` varchar(100) DEFAULT NULL,
  `motdepasse` varchar(100) DEFAULT NULL,
  `numerodetelephone` varchar(20) NOT NULL,
  `photo` longtext NOT NULL,
  `etat de connexion` tinyint(1) NOT NULL,
  `date de naissance` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`IDutilisateur`, `IDprincipal`, `type`, `nom`, `mail`, `motdepasse`, `numerodetelephone`, `photo`, `etat de connexion`, `date de naissance`) VALUES
(3, 0, 0, 'a', 'n@yahoo.fr', '$2y$10$apXrUZ5a4nWo7zXTinxf2.heY', '0', '', 0, '0000-00-00'),
(4, 0, 0, 'nono', 'no@yahoo.fr', '$2y$10$qEcDSOBMTZ5PZpzbltJnCugPJ', '0', '', 0, '0000-00-00'),
(8, 0, 0, 'tes', 'al@e.fr', '$2y$10$RRtgWvs8xqiUkdk9YrOt7.3iL', '0', '', 0, '0000-00-00'),
(9, 0, 0, 'alfo10772', 'alfo@gmail.fr', '098f6bcd4621d373cade4e832627b4f6', '0', '', 0, '0000-00-00'),
(10, 0, 0, 'nao', 'nao@lol.fr', '$2y$10$A4a3aPlzTXmWxczyRg/HEuputI3tlho9kHiTvpBQTRT3fuW9woq.S', '0', '', 0, '0000-00-00'),
(11, 0, 0, 'yannis', 'yannis@yahoo.fr', '$2y$10$BZ27tsw679cKPGXnTIa0G.LN2bcpsqCobtVH6PjNG/bfCaIWSD8D.', '0', '', 0, '0000-00-00'),
(12, 0, 0, 'hehe', 'hehe@hdue.fr', '$2y$10$HlOX61N4B1yDhY9oYSa.zuMuA.HvueZaO/Gxf0KImiHpnMsxePtwK', '0687654321', '', 0, '0000-00-00'),
(13, 0, 0, 'Albane', 'albane.f@hotmail.fr', '$2y$10$htEJBbl4MI9/Lmr7pbiBOO6guHJ0zdRM9L.YT4dQv6ar/n7fYdv.u', '01 47 01 16 18', '', 0, '0000-00-00'),
(14, 0, 2, 'Administrateur', 'admin@test.fr', '$2y$10$Buvx0z3lUTlgUei8DCgmJOC49W26TARoRSbdmMd3A7Btk19eGL7gm', '', '', 0, '0000-00-00'),
(15, 0, 1, 'Secondaire', 'utilisateur@secondaire.fr', '$2y$10$ifAGc95SJQxM79rOSrLYtuqP7Q9.jCrJXP/SZGveKwdRD.go44u8.', '', '', 0, '0000-00-00'),
(17, 13, 1, 'test', 'secondaire@gmail.com', '$2y$10$K.gVfhoATuWfDzeRXjIn4exGgmGzd0PFNTwQnqozz6jRwfr7XVKGC', '', '', 0, '0000-00-00');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`IDutilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `IDutilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
