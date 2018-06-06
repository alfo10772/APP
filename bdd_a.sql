-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 05 juin 2018 à 10:00
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
-- Structure de la table `action`
--

CREATE TABLE `action` (
  `IDaction` int(11) NOT NULL,
  `IDcomposant` int(11) NOT NULL,
  `IDutilisateur` int(11) NOT NULL,
  `valeur` int(11) NOT NULL,
  `heure` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `actionneur`
--

CREATE TABLE `actionneur` (
  `IDactionneur` int(11) NOT NULL,
  `IDpiece` int(11) NOT NULL,
  `IDutilisateur` int(11) NOT NULL,
  `IDmaison` int(11) NOT NULL,
  `nomtype` varchar(30) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `etat` tinyint(1) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `actionneur`
--

INSERT INTO `actionneur` (`IDactionneur`, `IDpiece`, `IDutilisateur`, `IDmaison`, `nomtype`, `nom`, `etat`, `type`) VALUES
(3, 5, 13, 28, 'volet', 'Volets', 0, 1),
(4, 6, 13, 28, 'test connexion', 'Essai connexion', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `capteur`
--

CREATE TABLE `capteur` (
  `IDcapteur` int(11) NOT NULL,
  `IDpiece` int(11) NOT NULL,
  `IDutilisateur` int(11) NOT NULL,
  `IDmaison` int(11) NOT NULL,
  `nomtype` varchar(30) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `unite` varchar(10) NOT NULL,
  `valeurmin` int(11) NOT NULL,
  `valeurmax` int(11) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `capteur`
--

INSERT INTO `capteur` (`IDcapteur`, `IDpiece`, `IDutilisateur`, `IDmaison`, `nomtype`, `nom`, `unite`, `valeurmin`, `valeurmax`, `type`) VALUES
(1, 2, 11, 26, 'Capteur de fumée', 'Fumée', '', 0, 0, 0),
(2, 5, 13, 28, 'Capteur de température', 'Température', '', 0, 0, 0),
(3, 6, 13, 28, 'Capteur de température', 'Température', '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `IDcontact` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `type utilisateur` int(11) NOT NULL,
  `probleme` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `donnees`
--

CREATE TABLE `donnees` (
  `IDdonnees` int(11) NOT NULL,
  `IDcomposant` int(11) NOT NULL,
  `donnees` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `maison`
--

CREATE TABLE `maison` (
  `IDmaison` int(11) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `selection` tinyint(1) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `photo` longtext NOT NULL,
  `IDutilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `maison`
--

INSERT INTO `maison` (`IDmaison`, `adresse`, `selection`, `nom`, `photo`, `IDutilisateur`) VALUES
(28, '0', 1, 'Maison 1', '', 13),
(29, '0', 0, 'Maison 2', '', 13);

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

CREATE TABLE `notification` (
  `IDnotification` int(11) NOT NULL,
  `IDutilisateur` int(11) NOT NULL,
  `etat` tinyint(1) NOT NULL DEFAULT '1',
  `texte` varchar(200) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `notification`
--

INSERT INTO `notification` (`IDnotification`, `IDutilisateur`, `etat`, `texte`, `date`) VALUES
(1, 12, 0, 'test 2 a bien &eacute;t&eacute; supprim&eacute;e', '2018-05-30 16:36:21'),
(2, 12, 0, 'test a bien &eacute;t&eacute; supprim&eacute;e', '2018-05-30 16:36:55'),
(3, 11, 0, 'Salle de jeu des enfants a bien &eacute;t&eacute; ajout&eacute;e', '2018-05-31 14:05:28'),
(4, 11, 0, 'Cuisine a bien &eacute;t&eacute; ajout&eacute;e', '2018-05-31 14:05:59'),
(5, 11, 0, 'Salon a bien &eacute;t&eacute; ajout&eacute;e', '2018-05-31 14:06:06'),
(6, 11, 0, 'Bureau a bien &eacute;t&eacute; ajout&eacute;e', '2018-05-31 14:06:36'),
(7, 11, 0, 'Fumée a bien &eacute;t&eacute; ajout&eacute;e', '2018-05-31 14:06:59'),
(8, 11, 0, 'Volets S a bien &eacute;t&eacute; ajout&eacute;e', '2018-05-31 14:07:09'),
(9, 11, 0, 'Volets B a bien &eacute;t&eacute; ajout&eacute;e', '2018-05-31 14:07:19'),
(10, 11, 0, 'Lumière a bien &eacute;t&eacute; ajout&eacute;e', '2018-05-31 14:07:33'),
(11, 11, 0, 'Salle de jeu des enfants a bien &eacute;t&eacute; supprim&eacute;e', '2018-05-31 17:48:32'),
(12, 13, 0, 'Maison 1 a bien &eacute;t&eacute; ajout&eacute;e', '2018-06-01 09:10:04'),
(13, 13, 0, 'Maison 2 a bien &eacute;t&eacute; ajout&eacute;e', '2018-06-01 09:10:15'),
(14, 13, 0, 'Cuisine a bien &eacute;t&eacute; ajout&eacute;e', '2018-06-01 09:11:41'),
(15, 13, 0, 'Salon a bien &eacute;t&eacute; ajout&eacute;e', '2018-06-01 09:11:50'),
(16, 13, 0, 'Température a bien &eacute;t&eacute; ajout&eacute;e', '2018-06-01 09:12:13'),
(17, 13, 0, 'Volets a bien &eacute;t&eacute; ajout&eacute;e', '2018-06-01 09:12:32'),
(18, 13, 0, 'lrh a bien &eacute;t&eacute; ajout&eacute;e', '2018-06-01 11:02:43'),
(19, 13, 0, 'lqshir a bien &eacute;t&eacute; ajout&eacute;e', '2018-06-01 11:02:47'),
(20, 13, 0, 'oejb a bien &eacute;t&eacute; ajout&eacute;e', '2018-06-01 11:02:53'),
(21, 13, 0, 'er gz a bien &eacute;t&eacute; ajout&eacute;e', '2018-06-01 11:02:57'),
(22, 13, 0, ' rth a bien &eacute;t&eacute; ajout&eacute;e', '2018-06-01 11:03:00'),
(23, 13, 0, 'er gz a bien &eacute;t&eacute; supprim&eacute;e', '2018-06-01 11:04:38'),
(24, 13, 0, 'lqshir a bien &eacute;t&eacute; supprim&eacute;e', '2018-06-01 11:04:43'),
(25, 13, 0, 'oejb a bien &eacute;t&eacute; supprim&eacute;e', '2018-06-01 11:04:47'),
(26, 13, 0, ' rth a bien &eacute;t&eacute; supprim&eacute;e', '2018-06-01 11:04:51'),
(27, 13, 0, 'lrh a bien &eacute;t&eacute; supprim&eacute;e', '2018-06-01 11:04:55'),
(28, 13, 0, 'Température a bien &eacute;t&eacute; ajout&eacute;e', '2018-06-01 11:40:30'),
(29, 13, 0, 'test a bien &eacute;t&eacute; ajout&eacute;e', '2018-06-05 09:12:42'),
(30, 13, 0, 'test a bien &eacute;t&eacute; supprim&eacute;e', '2018-06-05 09:15:42'),
(31, 13, 0, 'Essai connexion a bien &eacute;t&eacute; ajout&eacute;e', '2018-06-05 09:52:05');

-- --------------------------------------------------------

--
-- Structure de la table `panne`
--

CREATE TABLE `panne` (
  `IDpanne` int(11) NOT NULL,
  `IDcomposant` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `piece`
--

CREATE TABLE `piece` (
  `IDpiece` int(11) NOT NULL,
  `IDmaison` int(11) NOT NULL,
  `IDutilisateur` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `surface` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `piece`
--

INSERT INTO `piece` (`IDpiece`, `IDmaison`, `IDutilisateur`, `nom`, `surface`) VALUES
(5, 28, 13, 'Cuisine', 0),
(6, 28, 13, 'Salon', 0);

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

CREATE TABLE `reponse` (
  `ID` int(11) NOT NULL,
  `reponse` varchar(200) NOT NULL,
  `question` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reponse`
--

INSERT INTO `reponse` (`ID`, `reponse`, `question`) VALUES
(1, 'test', 'essai ');

-- --------------------------------------------------------

--
-- Structure de la table `texte`
--

CREATE TABLE `texte` (
  `IDtexte` int(11) NOT NULL,
  `presentation` longtext NOT NULL,
  `cgu` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `texte`
--

INSERT INTO `texte` (`IDtexte`, `presentation`, `cgu`) VALUES
(1, 'test', 'test');

-- --------------------------------------------------------

--
-- Structure de la table `typecomposant`
--

CREATE TABLE `typecomposant` (
  `IDtypeComposant` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `type` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `typecomposant`
--

INSERT INTO `typecomposant` (`IDtypeComposant`, `nom`, `type`) VALUES
(1, 'Capteur de température', 0),
(2, 'Capteur de fumée', 0),
(11, 'volet', 1),
(14, 'Capteur de luminosité', 0),
(15, 'Lumière', 1),
(16, 'test', 1),
(17, 'test connexion', 1);

-- --------------------------------------------------------

--
-- Structure de la table `typecomposantuser`
--

CREATE TABLE `typecomposantuser` (
  `IDtypecomposant` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `type1` tinyint(1) NOT NULL,
  `userID` int(11) NOT NULL,
  `affichage` varchar(30) DEFAULT NULL
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
(2, 'Capteur de fumée', 0, 14, 'moyenne'),
(1, 'Capteur de température', 0, 13, 'moyenne'),
(2, 'Capteur de fumée', 0, 13, 'moyenne'),
(11, 'volet', 1, 13, 'moyenne'),
(14, 'Capteur de luminosité', 0, 13, 'moyenne'),
(15, 'Lumière', 1, 13, 'moyenne'),
(1, 'Capteur de température', 0, 14, 'moyenne'),
(2, 'Capteur de fumée', 0, 14, 'moyenne'),
(11, 'volet', 1, 14, 'moyenne'),
(14, 'Capteur de luminosité', 0, 14, 'moyenne'),
(15, 'Lumière', 1, 14, 'moyenne'),
(1, 'Capteur de température', 0, 15, 'moyenne'),
(2, 'Capteur de fumée', 0, 15, 'moyenne'),
(11, 'volet', 1, 15, 'moyenne'),
(14, 'Capteur de luminosité', 0, 15, 'moyenne'),
(15, 'Lumière', 1, 15, 'moyenne'),
(1, 'Capteur de température', 0, 18, 'moyenne'),
(2, 'Capteur de fumée', 0, 18, 'moyenne'),
(11, 'volet', 1, 18, 'moyenne'),
(14, 'Capteur de luminosité', 0, 18, 'moyenne'),
(15, 'Lumière', 1, 18, 'moyenne'),
(16, 'test', 1, 18, 'moyenne');

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
  `date de naissance` date NOT NULL,
  `reinitialisation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`IDutilisateur`, `IDprincipal`, `type`, `nom`, `mail`, `motdepasse`, `numerodetelephone`, `photo`, `etat de connexion`, `date de naissance`, `reinitialisation`) VALUES
(13, 0, 0, 'Albane', 'albane.f@hotmail.fr', '$2y$10$htEJBbl4MI9/Lmr7pbiBOO6guHJ0zdRM9L.YT4dQv6ar/n7fYdv.u', '01 47 01 16 18', '', 0, '0000-00-00', 0),
(17, 13, 1, 'test', 'secondaire@gmail.com', '$2y$10$K.gVfhoATuWfDzeRXjIn4exGgmGzd0PFNTwQnqozz6jRwfr7XVKGC', '', '', 0, '0000-00-00', 0),
(18, 0, 2, 'Administrateur', 'administrateur@gmail.com', '$2y$10$OPZGIIA.QfAIc9KNFkOZr./K7R/RvjtlONj2Iez0Ej17PM9dQBAQm', '', '', 0, '0000-00-00', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `action`
--
ALTER TABLE `action`
  ADD PRIMARY KEY (`IDaction`),
  ADD KEY `IDcomposant` (`IDcomposant`),
  ADD KEY `IDutilisateur` (`IDutilisateur`);

--
-- Index pour la table `actionneur`
--
ALTER TABLE `actionneur`
  ADD PRIMARY KEY (`IDactionneur`),
  ADD KEY `IDpiece` (`IDpiece`);

--
-- Index pour la table `capteur`
--
ALTER TABLE `capteur`
  ADD PRIMARY KEY (`IDcapteur`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`IDcontact`);

--
-- Index pour la table `donnees`
--
ALTER TABLE `donnees`
  ADD PRIMARY KEY (`IDdonnees`),
  ADD KEY `IDcomposant` (`IDcomposant`);

--
-- Index pour la table `maison`
--
ALTER TABLE `maison`
  ADD PRIMARY KEY (`IDmaison`),
  ADD KEY `IDadresse` (`adresse`),
  ADD KEY `IDutilisateur` (`IDutilisateur`);

--
-- Index pour la table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`IDnotification`),
  ADD KEY `IDutilisateur` (`IDutilisateur`);

--
-- Index pour la table `panne`
--
ALTER TABLE `panne`
  ADD PRIMARY KEY (`IDpanne`),
  ADD KEY `IDcomposant` (`IDcomposant`);

--
-- Index pour la table `piece`
--
ALTER TABLE `piece`
  ADD PRIMARY KEY (`IDpiece`),
  ADD KEY `IDmaison` (`IDmaison`);

--
-- Index pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `texte`
--
ALTER TABLE `texte`
  ADD PRIMARY KEY (`IDtexte`);

--
-- Index pour la table `typecomposant`
--
ALTER TABLE `typecomposant`
  ADD PRIMARY KEY (`IDtypeComposant`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`IDutilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `action`
--
ALTER TABLE `action`
  MODIFY `IDaction` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `actionneur`
--
ALTER TABLE `actionneur`
  MODIFY `IDactionneur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `capteur`
--
ALTER TABLE `capteur`
  MODIFY `IDcapteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `IDcontact` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `donnees`
--
ALTER TABLE `donnees`
  MODIFY `IDdonnees` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `maison`
--
ALTER TABLE `maison`
  MODIFY `IDmaison` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `notification`
--
ALTER TABLE `notification`
  MODIFY `IDnotification` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `panne`
--
ALTER TABLE `panne`
  MODIFY `IDpanne` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `piece`
--
ALTER TABLE `piece`
  MODIFY `IDpiece` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `reponse`
--
ALTER TABLE `reponse`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `typecomposant`
--
ALTER TABLE `typecomposant`
  MODIFY `IDtypeComposant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `IDutilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `actionneur`
--
ALTER TABLE `actionneur`
  ADD CONSTRAINT `IDpiece` FOREIGN KEY (`IDpiece`) REFERENCES `piece` (`IDpiece`) ON DELETE CASCADE;

--
-- Contraintes pour la table `maison`
--
ALTER TABLE `maison`
  ADD CONSTRAINT `IDutilisateur` FOREIGN KEY (`IDutilisateur`) REFERENCES `utilisateur` (`IDutilisateur`) ON DELETE CASCADE;

--
-- Contraintes pour la table `piece`
--
ALTER TABLE `piece`
  ADD CONSTRAINT `IDmaison` FOREIGN KEY (`IDmaison`) REFERENCES `maison` (`IDmaison`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
