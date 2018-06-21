-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 21 juin 2018 à 16:58
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
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `heuredebut` time NOT NULL,
  `heurefin` time NOT NULL,
  `selectiontdb` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `actionneur`
--

INSERT INTO `actionneur` (`IDactionneur`, `IDpiece`, `IDutilisateur`, `IDmaison`, `nomtype`, `nom`, `etat`, `type`, `heuredebut`, `heurefin`, `selectiontdb`) VALUES
(2, 8, 4, 3, 'Volets', 'Volets', 1, 1, '00:00:00', '00:00:00', 1);

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
  `type` tinyint(1) NOT NULL DEFAULT '0',
  `selectiontdb` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `capteur`
--

INSERT INTO `capteur` (`IDcapteur`, `IDpiece`, `IDutilisateur`, `IDmaison`, `nomtype`, `nom`, `unite`, `type`, `selectiontdb`) VALUES
(6, 9, 4, 3, 'Capteur de temperature', 'Température', '', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `IDcontact` int(11) NOT NULL,
  `numero` varchar(100) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `sav` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`IDcontact`, `numero`, `mail`, `sav`) VALUES
(1, '06 01 01 01 01 ', 'essai@test.fr', '06 01 10 10 30');

-- --------------------------------------------------------

--
-- Structure de la table `donnees`
--

CREATE TABLE `donnees` (
  `IDdonnees` int(11) NOT NULL,
  `IDcomposant` int(11) NOT NULL,
  `donnees` int(11) NOT NULL,
  `IDcapteur` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `donnees`
--

INSERT INTO `donnees` (`IDdonnees`, `IDcomposant`, `donnees`, `IDcapteur`, `date`) VALUES
(1, 6, 21, 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `maison`
--

CREATE TABLE `maison` (
  `IDmaison` int(11) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `selection` tinyint(1) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `IDutilisateur` int(11) NOT NULL,
  `selectionauto` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `maison`
--

INSERT INTO `maison` (`IDmaison`, `adresse`, `selection`, `nom`, `IDutilisateur`, `selectionauto`) VALUES
(3, '', 1, 'Maison 1', 4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `IDmessage` int(11) NOT NULL,
  `IDclient` int(11) NOT NULL,
  `envoie` varchar(30) NOT NULL,
  `etatclient` tinyint(1) NOT NULL DEFAULT '1',
  `etatadmin` tinyint(1) NOT NULL DEFAULT '1',
  `message` varchar(1000) NOT NULL,
  `Objet` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`IDmessage`, `IDclient`, `envoie`, `etatclient`, `etatadmin`, `message`, `Objet`, `date`) VALUES
(1, 4, 'administrateur', 0, 0, 'texte', 'essai', '2018-06-15 18:52:04'),
(2, 4, 'utilisateur@gmail.com', 0, 0, 'Test', 'Message', '2018-06-21 15:00:56');

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
(1, 4, 0, 'Maison 1 a bien &eacute;t&eacute; ajout&eacute;e', '2018-06-15 10:50:12'),
(2, 4, 0, 'Maison 1 a bien &eacute;t&eacute; ajout&eacute;e', '2018-06-15 11:01:16'),
(3, 4, 0, 'Cuisine a bien &eacute;t&eacute; ajout&eacute;e', '2018-06-15 11:01:23'),
(4, 4, 0, 'Salon a bien &eacute;t&eacute; ajout&eacute;e', '2018-06-15 11:01:45'),
(5, 4, 0, 'SDB a bien &eacute;t&eacute; ajout&eacute;e', '2018-06-15 11:01:51'),
(6, 4, 0, 'Chambre a bien &eacute;t&eacute; ajout&eacute;e', '2018-06-15 11:01:56'),
(7, 4, 0, 'Volets a bien &eacute;t&eacute; ajout&eacute;e', '2018-06-15 11:07:26'),
(8, 4, 0, 'Luminosité a bien &eacute;t&eacute; ajout&eacute;e', '2018-06-15 11:07:43'),
(9, 4, 0, 'Luminosité a bien &eacute;t&eacute; supprim&eacute;e', '2018-06-15 19:30:17'),
(10, 4, 0, 'Température a bien &eacute;t&eacute; ajout&eacute;e', '2018-06-15 19:31:17'),
(11, 4, 0, 'L\'utilisateur secondaire Secondaire a &eacute;t&eacute; ajout&eacute;', '2018-06-15 19:38:24'),
(12, 4, 0, 'Chambre a bien &eacute;t&eacute; supprim&eacute;e', '2018-06-17 17:10:51'),
(13, 4, 0, 'Température a bien &eacute;t&eacute; ajout&eacute;e', '2018-06-20 10:36:33'),
(14, 4, 0, 'Température a bien &eacute;t&eacute; supprim&eacute;e', '2018-06-20 16:23:46');

-- --------------------------------------------------------

--
-- Structure de la table `piece`
--

CREATE TABLE `piece` (
  `IDpiece` int(11) NOT NULL,
  `IDmaison` int(11) NOT NULL,
  `IDutilisateur` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `piece`
--

INSERT INTO `piece` (`IDpiece`, `IDmaison`, `IDutilisateur`, `nom`) VALUES
(8, 3, 4, 'Cuisine'),
(9, 3, 4, 'Salon'),
(10, 3, 4, 'SDB');

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

CREATE TABLE `reponse` (
  `ID` int(11) NOT NULL,
  `reponse` text NOT NULL,
  `question` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reponse`
--

INSERT INTO `reponse` (`ID`, `reponse`, `question`) VALUES
(1, 'Réponse 1', 'Question 1'),
(3, 'Réponse 2', 'Question 2');

-- --------------------------------------------------------

--
-- Structure de la table `texte`
--

CREATE TABLE `texte` (
  `IDtexte` int(11) NOT NULL,
  `presentation` longtext NOT NULL,
  `cgu` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `typecomposant`
--

CREATE TABLE `typecomposant` (
  `IDtypeComposant` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `type` int(11) NOT NULL,
  `unite` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `typecomposant`
--

INSERT INTO `typecomposant` (`IDtypeComposant`, `nom`, `type`, `unite`) VALUES
(4, 'Volets', 1, ''),
(5, 'Capteur de luminosité', 0, 'Lux'),
(6, 'Capteur de temperature', 0, '°C');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `IDutilisateur` int(11) NOT NULL,
  `IDprincipal` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `nom` varchar(80) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `motdepasse` varchar(100) NOT NULL,
  `numerodetelephone` varchar(20) NOT NULL,
  `photo` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`IDutilisateur`, `IDprincipal`, `type`, `nom`, `mail`, `motdepasse`, `numerodetelephone`, `photo`) VALUES
(4, 0, 0, 'Utilisateur', 'utilisateur@gmail.com', '$2y$10$xIPHzD05pZm/9PI1GtVVBuTlZ.QR66bON9n2HAdorO9RMVxq0oUCC', '06 01 01 01 01', ''),
(5, 0, 2, 'Administrateur', 'administrateur@gmail.com', '$2y$10$F4kMmelwbAG61eUBSOTsUO5I7QOWAUadRS0GPTjftv9ARxfdU0aui', '01 47 01 16 18', ''),
(6, 4, 1, 'Secondaire', 'secondaire@gmail.com', '$2y$10$etbHyy2YF0DfIRdBjMNLGO.gypCzP/b6XfkiLDfRgevWgTQHM38pK', '', '');

--
-- Index pour les tables déchargées
--

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
  ADD PRIMARY KEY (`IDdonnees`);

--
-- Index pour la table `maison`
--
ALTER TABLE `maison`
  ADD PRIMARY KEY (`IDmaison`),
  ADD KEY `IDutilisateur` (`IDutilisateur`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`IDmessage`);

--
-- Index pour la table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`IDnotification`);

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
-- AUTO_INCREMENT pour la table `actionneur`
--
ALTER TABLE `actionneur`
  MODIFY `IDactionneur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `capteur`
--
ALTER TABLE `capteur`
  MODIFY `IDcapteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `IDcontact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `donnees`
--
ALTER TABLE `donnees`
  MODIFY `IDdonnees` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `maison`
--
ALTER TABLE `maison`
  MODIFY `IDmaison` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `IDmessage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `notification`
--
ALTER TABLE `notification`
  MODIFY `IDnotification` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `piece`
--
ALTER TABLE `piece`
  MODIFY `IDpiece` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `reponse`
--
ALTER TABLE `reponse`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `texte`
--
ALTER TABLE `texte`
  MODIFY `IDtexte` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `typecomposant`
--
ALTER TABLE `typecomposant`
  MODIFY `IDtypeComposant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `IDutilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `actionneur`
--
ALTER TABLE `actionneur`
  ADD CONSTRAINT `IDpiece` FOREIGN KEY (`IDpiece`) REFERENCES `piece` (`IDpiece`) ON DELETE CASCADE;

--
-- Contraintes pour la table `piece`
--
ALTER TABLE `piece`
  ADD CONSTRAINT `IDmaison` FOREIGN KEY (`IDmaison`) REFERENCES `maison` (`IDmaison`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
