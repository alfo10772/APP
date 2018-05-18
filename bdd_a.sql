-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 18 mai 2018 à 11:31
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
-- Structure de la table `adresse`
--

CREATE TABLE `adresse` (
  `IDadresse` int(11) NOT NULL,
  `IDutilisateur` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `rue` varchar(30) NOT NULL,
  `code postal` int(11) NOT NULL,
  `ville` varchar(30) NOT NULL,
  `pays` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `composant`
--

CREATE TABLE `composant` (
  `IDcomposant` int(11) NOT NULL,
  `IDmaison` int(11) NOT NULL,
  `IDpiece` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `etat` tinyint(1) NOT NULL,
  `nom` varchar(26) NOT NULL,
  `unite` varchar(20) NOT NULL,
  `valeurmin` int(11) NOT NULL,
  `valeurmax` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `IDadresse` int(11) NOT NULL,
  `selection` tinyint(1) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `photo` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `maison`
--

INSERT INTO `maison` (`IDmaison`, `IDadresse`, `selection`, `nom`, `photo`) VALUES
(1, 6, 0, 'Résidence principale', ''),
(2, 25, 0, 'Vacances', ''),
(3, 0, 0, 'Chalet de ski de papy et mamy', '');

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

CREATE TABLE `notification` (
  `IDnotification` int(11) NOT NULL,
  `etat` tinyint(1) NOT NULL,
  `texte` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `nom` varchar(30) NOT NULL,
  `surface` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `piece`
--

INSERT INTO `piece` (`IDpiece`, `IDmaison`, `nom`, `surface`) VALUES
(1, 0, 'Chambre parents', 25),
(2, 0, 'Chambre enfants', 26),
(3, 0, 'Cuisine', 36),
(4, 0, 'Salle de jeu des enfants', 0);

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

CREATE TABLE `question` (
  `IDquestion` int(11) NOT NULL,
  `question` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

CREATE TABLE `reponse` (
  `IDreponse` int(11) NOT NULL,
  `reponse` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `typecomposant`
--

CREATE TABLE `typecomposant` (
  `IDtypeComposant` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `typecomposant`
--

INSERT INTO `typecomposant` (`IDtypeComposant`, `nom`) VALUES
(1, 'Capteur de température'),
(2, 'Capteur de fumée');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `IDutilisateur` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `mail` varchar(100) DEFAULT NULL,
  `motdepasse` varchar(32) DEFAULT NULL,
  `numerodetelephone` int(11) NOT NULL,
  `photo` longtext NOT NULL,
  `etat de connexion` tinyint(1) NOT NULL,
  `date de naissance` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`IDutilisateur`, `type`, `nom`, `mail`, `motdepasse`, `numerodetelephone`, `photo`, `etat de connexion`, `date de naissance`) VALUES
(2, 0, 'naca10767', 'n@yahoo.fr', '$2y$10$0ComSgkX.a67RhwX7Z4EBuQ3c', 0, '', 0, '0000-00-00'),
(3, 0, 'a', 'n@yahoo.fr', '$2y$10$apXrUZ5a4nWo7zXTinxf2.heY', 0, '', 0, '0000-00-00'),
(4, 0, 'nono', 'no@yahoo.fr', '$2y$10$qEcDSOBMTZ5PZpzbltJnCugPJ', 0, '', 0, '0000-00-00');

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
-- Index pour la table `adresse`
--
ALTER TABLE `adresse`
  ADD PRIMARY KEY (`IDadresse`),
  ADD KEY `IDutilisateur` (`IDutilisateur`);

--
-- Index pour la table `composant`
--
ALTER TABLE `composant`
  ADD PRIMARY KEY (`IDcomposant`),
  ADD KEY `IDpiece` (`IDpiece`),
  ADD KEY `IDmaison` (`IDmaison`);

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
  ADD KEY `IDadresse` (`IDadresse`);

--
-- Index pour la table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`IDnotification`);

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
-- Index pour la table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`IDquestion`);

--
-- Index pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD PRIMARY KEY (`IDreponse`);

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
-- AUTO_INCREMENT pour la table `adresse`
--
ALTER TABLE `adresse`
  MODIFY `IDadresse` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `composant`
--
ALTER TABLE `composant`
  MODIFY `IDcomposant` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `IDmaison` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `notification`
--
ALTER TABLE `notification`
  MODIFY `IDnotification` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `panne`
--
ALTER TABLE `panne`
  MODIFY `IDpanne` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `piece`
--
ALTER TABLE `piece`
  MODIFY `IDpiece` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `question`
--
ALTER TABLE `question`
  MODIFY `IDquestion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reponse`
--
ALTER TABLE `reponse`
  MODIFY `IDreponse` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `typecomposant`
--
ALTER TABLE `typecomposant`
  MODIFY `IDtypeComposant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `IDutilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `composant`
--
ALTER TABLE `composant`
  ADD CONSTRAINT `IDmaison` FOREIGN KEY (`IDmaison`) REFERENCES `maison` (`IDmaison`),
  ADD CONSTRAINT `IDpiece` FOREIGN KEY (`IDpiece`) REFERENCES `piece` (`IDpiece`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
