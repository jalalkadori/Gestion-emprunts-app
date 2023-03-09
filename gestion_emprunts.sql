-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 09 mars 2023 à 13:21
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_emprunts`
--

-- --------------------------------------------------------

--
-- Structure de la table `adherent`
--

CREATE TABLE `adherent` (
  `ID_ADHERENT` int(11) NOT NULL,
  `NOM_ADHERENT` varchar(25) DEFAULT NULL,
  `PRENOM_ADHERENT` varchar(25) DEFAULT NULL,
  `CIN_ADHERENT` varchar(8) DEFAULT NULL,
  `ADRESSE_ADHERENT` varchar(255) DEFAULT NULL,
  `DN_ADHERENT` date DEFAULT NULL,
  `TELE_ADHERENT` int(10) DEFAULT NULL,
  `EMAIL_ADHERENT` varchar(120) DEFAULT NULL,
  `MDP_ADHERENT` varchar(255) DEFAULT NULL,
  `TYPE_ADHERENT` varchar(25) DEFAULT NULL,
  `DATE_CREATION_COMPTE` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `PENALITE` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `adherent`
--

INSERT INTO `adherent` (`ID_ADHERENT`, `NOM_ADHERENT`, `PRENOM_ADHERENT`, `CIN_ADHERENT`, `ADRESSE_ADHERENT`, `DN_ADHERENT`, `TELE_ADHERENT`, `EMAIL_ADHERENT`, `MDP_ADHERENT`, `TYPE_ADHERENT`, `DATE_CREATION_COMPTE`, `PENALITE`) VALUES
(2, 'KADDOURI', 'Jalal', 'CD000000', 'RTE RABAT Tanger', '2000-03-22', 601020304, 'jalalkaddouri@gmail.com', '1234567890', 'Étudiants', '2023-03-09 11:16:16', 0);

-- --------------------------------------------------------

--
-- Structure de la table `bibliothecaire`
--

CREATE TABLE `bibliothecaire` (
  `ID_BIBLIOTHECAIRE` int(11) NOT NULL,
  `NOM_BIBLIOTHECAIRE` varchar(50) DEFAULT NULL,
  `EMAIL_BIBLIOTHECAIRE` varchar(120) DEFAULT NULL,
  `MDP_BIBLIOTHECAIRE` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `bibliothecaire`
--

INSERT INTO `bibliothecaire` (`ID_BIBLIOTHECAIRE`, `NOM_BIBLIOTHECAIRE`, `EMAIL_BIBLIOTHECAIRE`, `MDP_BIBLIOTHECAIRE`) VALUES
(1, 'KADDOURI Jalal', 'jalalkaddouri@gmail.com', '1234567890'),
(2, 'MABROUKI Ihsane', 'ihsane@gmail.com', '1234567890');

-- --------------------------------------------------------

--
-- Structure de la table `emprunt`
--

CREATE TABLE `emprunt` (
  `ID_EMPRUNT` int(11) NOT NULL,
  `ID_BIBLIOTHECAIRE` int(11) NOT NULL,
  `ID_ADHERENT` int(11) NOT NULL,
  `ID_RESERVATION` int(11) NOT NULL,
  `DATE_EMPRUNT` date DEFAULT NULL,
  `DATE_RETOUR` date DEFAULT NULL,
  `DATE_EFF_RETOUT` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `operation`
--

CREATE TABLE `operation` (
  `ID_OPERATION` int(11) NOT NULL,
  `CODE_OUVRAGE` int(11) NOT NULL,
  `ID_BIBLIOTHECAIRE` int(11) NOT NULL,
  `DATE_OPERATION` date DEFAULT NULL,
  `NOM_OPERATION` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ouvrage`
--

CREATE TABLE `ouvrage` (
  `CODE_OUVRAGE` int(11) NOT NULL,
  `TITRE_OUVRAGE` varchar(120) DEFAULT NULL,
  `NOM_AUTHEUR` varchar(60) DEFAULT NULL,
  `IMG_OUVRAGE` varchar(50) DEFAULT NULL,
  `ETAT_OUVRAGE` varchar(25) DEFAULT NULL,
  `TYPE_OUVRAGE` varchar(25) DEFAULT NULL,
  `DATE_EDITION` date DEFAULT NULL,
  `DATE_ACHAT` date DEFAULT NULL,
  `NOMBRE_PAGE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ouvrage`
--

INSERT INTO `ouvrage` (`CODE_OUVRAGE`, `TITRE_OUVRAGE`, `NOM_AUTHEUR`, `IMG_OUVRAGE`, `ETAT_OUVRAGE`, `TYPE_OUVRAGE`, `DATE_EDITION`, `DATE_ACHAT`, `NOMBRE_PAGE`) VALUES
(1, 'Je me battrai pour toi ', 'Sarah S. Cope', './images/ouvrage1.jpg', 'Neuf', 'roman', '2022-12-05', '2023-02-01', 210),
(7, 'Le Medium (Suspense et Sentiments)', ' Julia Salvador ', './images/51TzZINJb8L._SY346_.jpg', 'Neuf', 'roman', '2020-09-14', '2023-03-10', 500);

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `ID_RESERVATION` int(11) NOT NULL,
  `ID_ADHERENT` int(11) NOT NULL,
  `CODE_OUVRAGE` int(11) NOT NULL,
  `DATE_RESERVATION` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adherent`
--
ALTER TABLE `adherent`
  ADD PRIMARY KEY (`ID_ADHERENT`);

--
-- Index pour la table `bibliothecaire`
--
ALTER TABLE `bibliothecaire`
  ADD PRIMARY KEY (`ID_BIBLIOTHECAIRE`);

--
-- Index pour la table `emprunt`
--
ALTER TABLE `emprunt`
  ADD PRIMARY KEY (`ID_EMPRUNT`),
  ADD KEY `AK_PK_ID_EMPRUNT` (`ID_EMPRUNT`),
  ADD KEY `ID_RESERVATION` (`ID_RESERVATION`),
  ADD KEY `ID_ADHERENT` (`ID_ADHERENT`),
  ADD KEY `ID_BIBLIOTHECAIRE` (`ID_BIBLIOTHECAIRE`);

--
-- Index pour la table `operation`
--
ALTER TABLE `operation`
  ADD PRIMARY KEY (`ID_OPERATION`),
  ADD KEY `ID_BIBLIOTHECAIRE` (`ID_BIBLIOTHECAIRE`),
  ADD KEY `CODE_OUVRAGE` (`CODE_OUVRAGE`);

--
-- Index pour la table `ouvrage`
--
ALTER TABLE `ouvrage`
  ADD PRIMARY KEY (`CODE_OUVRAGE`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`ID_RESERVATION`),
  ADD KEY `ID_ADHERENT` (`ID_ADHERENT`),
  ADD KEY `CODE_OUVRAGE` (`CODE_OUVRAGE`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `adherent`
--
ALTER TABLE `adherent`
  MODIFY `ID_ADHERENT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `bibliothecaire`
--
ALTER TABLE `bibliothecaire`
  MODIFY `ID_BIBLIOTHECAIRE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `emprunt`
--
ALTER TABLE `emprunt`
  MODIFY `ID_EMPRUNT` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `operation`
--
ALTER TABLE `operation`
  MODIFY `ID_OPERATION` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `ouvrage`
--
ALTER TABLE `ouvrage`
  MODIFY `CODE_OUVRAGE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `ID_RESERVATION` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `emprunt`
--
ALTER TABLE `emprunt`
  ADD CONSTRAINT `emprunt_ibfk_1` FOREIGN KEY (`ID_RESERVATION`) REFERENCES `reservation` (`ID_RESERVATION`),
  ADD CONSTRAINT `emprunt_ibfk_2` FOREIGN KEY (`ID_ADHERENT`) REFERENCES `adherent` (`ID_ADHERENT`),
  ADD CONSTRAINT `emprunt_ibfk_3` FOREIGN KEY (`ID_BIBLIOTHECAIRE`) REFERENCES `bibliothecaire` (`ID_BIBLIOTHECAIRE`);

--
-- Contraintes pour la table `operation`
--
ALTER TABLE `operation`
  ADD CONSTRAINT `operation_ibfk_1` FOREIGN KEY (`ID_BIBLIOTHECAIRE`) REFERENCES `bibliothecaire` (`ID_BIBLIOTHECAIRE`),
  ADD CONSTRAINT `operation_ibfk_2` FOREIGN KEY (`CODE_OUVRAGE`) REFERENCES `ouvrage` (`CODE_OUVRAGE`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`ID_ADHERENT`) REFERENCES `adherent` (`ID_ADHERENT`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`CODE_OUVRAGE`) REFERENCES `ouvrage` (`CODE_OUVRAGE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
