-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 03 avr. 2023 à 03:55
-- Version du serveur :  10.4.10-MariaDB
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
-- Base de données :  `art_community_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `add_date` date DEFAULT NULL,
  `is_active` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `add_date`, `is_active`) VALUES
(1, 'Tableau', '2023-04-03', b'1'),
(2, 'Sculture', '2023-04-03', b'1');

-- --------------------------------------------------------

--
-- Structure de la table `followings`
--

CREATE TABLE `followings` (
  `id_followed` int(11) NOT NULL,
  `id_follower` int(11) NOT NULL,
  `follow_date` date NOT NULL,
  `is_active` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `interests`
--

CREATE TABLE `interests` (
  `id_user` int(11) NOT NULL,
  `id_realisation` int(11) NOT NULL,
  `interest_date` date NOT NULL,
  `likes` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `purchases`
--

CREATE TABLE `purchases` (
  `id_client` int(11) NOT NULL,
  `id_realisation` int(11) NOT NULL,
  `purchase_date` date NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `is_active` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `realisations`
--

CREATE TABLE `realisations` (
  `id` int(11) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `image_url` varchar(50) DEFAULT NULL,
  `registed_date` date DEFAULT NULL,
  `id_artist` int(11) DEFAULT NULL,
  `id_categorie` int(11) DEFAULT NULL,
  `is_active` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `realisations`
--

INSERT INTO `realisations` (`id`, `title`, `price`, `image_url`, `registed_date`, `id_artist`, `id_categorie`, `is_active`) VALUES
(1, 'Mine', 18890, '1603477938733.jpg', '2023-04-03', 1, 1, b'1'),
(2, 'Star', 22100, '1601667042428.jpg', '2023-04-03', 1, 1, b'1'),
(3, 'myself', 18000, 'myself.jpg', '2023-04-03', 1, 1, b'1'),
(4, 'My person', 10000, 'myPerson.jpg', '2023-04-03', 1, 1, b'1');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `surname` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `profile_picture` varchar(50) DEFAULT NULL,
  `registed_date` date DEFAULT NULL,
  `is_active` bit(1) DEFAULT b'1',
  `is_confirm` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `username`, `email`, `password`, `profile_picture`, `registed_date`, `is_active`, `is_confirm`) VALUES
(1, 'Kengni', 'Johan', 'Ken Joh', 'kengnijordan9@gmail.com', 'ken21', 'myPerson.jpg', '2023-04-01', b'1', b'1');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `followings`
--
ALTER TABLE `followings`
  ADD PRIMARY KEY (`id_followed`,`id_follower`,`follow_date`),
  ADD KEY `id_follower` (`id_follower`);

--
-- Index pour la table `interests`
--
ALTER TABLE `interests`
  ADD PRIMARY KEY (`id_user`,`id_realisation`,`interest_date`),
  ADD KEY `id_realisation` (`id_realisation`);

--
-- Index pour la table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id_client`,`id_realisation`,`purchase_date`),
  ADD KEY `id_realisation` (`id_realisation`);

--
-- Index pour la table `realisations`
--
ALTER TABLE `realisations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_artist` (`id_artist`),
  ADD KEY `id_categorie` (`id_categorie`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `realisations`
--
ALTER TABLE `realisations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `followings`
--
ALTER TABLE `followings`
  ADD CONSTRAINT `followings_ibfk_1` FOREIGN KEY (`id_followed`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `followings_ibfk_2` FOREIGN KEY (`id_follower`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `interests`
--
ALTER TABLE `interests`
  ADD CONSTRAINT `interests_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `interests_ibfk_2` FOREIGN KEY (`id_realisation`) REFERENCES `realisations` (`id`);

--
-- Contraintes pour la table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchases_ibfk_2` FOREIGN KEY (`id_realisation`) REFERENCES `realisations` (`id`);

--
-- Contraintes pour la table `realisations`
--
ALTER TABLE `realisations`
  ADD CONSTRAINT `realisations_ibfk_1` FOREIGN KEY (`id_artist`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `realisations_ibfk_2` FOREIGN KEY (`id_categorie`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
