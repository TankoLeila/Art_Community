-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 27 mars 2023 à 17:25
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `art_community_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `followings`
--

DROP TABLE IF EXISTS `followings`;
CREATE TABLE IF NOT EXISTS `followings` (
  `id_followed` int(11) NOT NULL,
  `id_follower` int(11) NOT NULL,
  `follow_date` date NOT NULL,
  `is_active` bit(1) DEFAULT b'1',
  PRIMARY KEY (`id_followed`,`id_follower`,`follow_date`),
  KEY `id_follower` (`id_follower`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `interests`
--

DROP TABLE IF EXISTS `interests`;
CREATE TABLE IF NOT EXISTS `interests` (
  `id_user` int(11) NOT NULL,
  `id_realisation` int(11) NOT NULL,
  `interest_date` date NOT NULL,
  `likes` bit(1) DEFAULT b'1',
  PRIMARY KEY (`id_user`,`id_realisation`,`interest_date`),
  KEY `id_realisation` (`id_realisation`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `publications`
--

DROP TABLE IF EXISTS `publications`;
CREATE TABLE IF NOT EXISTS `publications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `publish_date` date DEFAULT NULL,
  `is_active` bit(1) DEFAULT b'1',
  `id_artist` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_artist` (`id_artist`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `purchases`
--

DROP TABLE IF EXISTS `purchases`;
CREATE TABLE IF NOT EXISTS `purchases` (
  `id_client` int(11) NOT NULL,
  `id_realisation` int(11) NOT NULL,
  `purchase_date` date NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_client`,`id_realisation`,`purchase_date`),
  KEY `id_realisation` (`id_realisation`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `realisations`
--

DROP TABLE IF EXISTS `realisations`;
CREATE TABLE IF NOT EXISTS `realisations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `image_url` varchar(50) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `registed_date` date DEFAULT NULL,
  `id_publication` int(11) DEFAULT NULL,
  `is_active` bit(1) DEFAULT b'1',
  PRIMARY KEY (`id`),
  KEY `id_publication` (`id_publication`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `surname` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `profile_picture_url` varchar(50) DEFAULT NULL,
  `is_active` bit(1) DEFAULT b'1',
  `is_confirm` bit(1) DEFAULT b'1',
  `registed_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
