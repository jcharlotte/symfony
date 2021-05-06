-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 06 mai 2021 à 09:55
-- Version du serveur :  10.4.16-MariaDB
-- Version de PHP : 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `biblioo`
--


CREATE DATABASE biblioo;

USE biblioo;

-- --------------------------------------------------------

--
-- Structure de la table `abonne`
--


CREATE TABLE `abonne` (
  `id` int(3) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `mdp` varchar(80) NOT NULL,
  `annee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `abonne`
--

INSERT INTO `abonne` (`id`, `pseudo`, `mdp`, `annee`) VALUES
(1, 'anakin', '$2y$10$kjT9rZi2MzTt3lDcLRk/wOsdH6U4/xVKGNuFzW3mzMbaP7iEr/uHO', 2000),
(2, 'solo', '$2y$10$RR5QCLk42YNFzSuRWPRhbOAg7kj182m7DxEj0qiSNW6pzL6AiHnOG', 1972),
(3, 'stark', '$2y$10$YG2737pM.PcValJO/XDs3eYxG63qQRDhDBULSkJII.HzkcrWTdZfq', 1981),
(4, 'admin', '$2y$10$aU.ps8qUCMFhG6lsDcYYPuO//CYi6cRzk5FlccvX2KB3FRv6xZ6Ii', 2001),
(5, 'directeur', '$2y$10$.YUVralH0TTwT0.TavE9TeNokfuBqp.oU3s3FRtPUSWwTH15ANHOO', 1994),
(18, 'testeur', '$2y$10$qjKZk1wd4JUrXPEsYjXcjOoyVJ5zWsgzKi80Eod3NkzBTOMkQLnaW', 1999),
(19, 'test', 'testeste', 1900),
(20, 'test', 'testeste', 1900);

-- --------------------------------------------------------

--
-- Structure de la table `emprunt`
--

CREATE TABLE `emprunt` (
  `id` int(3) NOT NULL,
  `livre_id` int(3) NOT NULL,
  `abonne_id` int(3) NOT NULL,
  `date_emprunt` date NOT NULL,
  `date_retour` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `emprunt`
--

INSERT INTO `emprunt` (`id`, `livre_id`, `abonne_id`, `date_emprunt`, `date_retour`) VALUES
(1, 100, 1, '2019-12-17', '2019-12-18'),
(2, 101, 2, '2019-12-18', '2019-12-20'),
(3, 100, 3, '2019-12-19', '2019-12-22'),
(4, 103, 4, '2019-12-19', '2019-12-22'),
(5, 104, 1, '2019-12-19', '2019-12-28'),
(6, 105, 2, '2020-03-20', '2020-03-26'),
(7, 105, 3, '2020-05-13', NULL),
(8, 100, 2, '2020-05-15', NULL),
(9, 100, 5, '2020-12-02', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

CREATE TABLE `livre` (
  `id` int(3) NOT NULL,
  `auteur` varchar(40) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `couverture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `livre`
--

INSERT INTO `livre` (`id`, `auteur`, `titre`, `couverture`) VALUES
(100, 'Isaac Asimov', 'I, robot', 'I-robot.jpg'),
(101, 'Isaac Asimov', 'Prélude à Fondation', 'Fondation.jpg'),
(102, 'Isaac Asimov', 'Fondation foudroyé', 'Fondation-foudroyee.jpg'),
(103, 'George Orwell', '1984', '1984.jpg'),
(104, 'Frank Herbert', 'Dune', 'Dune.jpg'),
(105, 'Frank Herbert', 'Les Enfants de Dune', 'Les-Enfants-de-Dune.jpg'),
(111, 'Bernard Werber', 'Le jour des fourmis', 'Le-jour-des-fourmis.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `abonne`
--
ALTER TABLE `abonne`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `emprunt`
--
ALTER TABLE `emprunt`
  ADD PRIMARY KEY (`id`),
  ADD KEY `livre_id` (`livre_id`),
  ADD KEY `abonne_id` (`abonne_id`);

--
-- Index pour la table `livre`
--
ALTER TABLE `livre`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `abonne`
--
ALTER TABLE `abonne`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `emprunt`
--
ALTER TABLE `emprunt`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `livre`
--
ALTER TABLE `livre`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `emprunt`
--
ALTER TABLE `emprunt`
  ADD CONSTRAINT `emprunt_ibfk_1` FOREIGN KEY (`abonne_id`) REFERENCES `abonne` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `emprunt_ibfk_2` FOREIGN KEY (`livre_id`) REFERENCES `livre` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
