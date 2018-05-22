-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 18 Septembre 2016 à 22:04
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `sin`
--

-- --------------------------------------------------------

--
-- Structure de la table `bus`
--

CREATE TABLE IF NOT EXISTS `bus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `line_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `line_id` (`line_id`),
  KEY `line_id_2` (`line_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `bus`
--

INSERT INTO `bus` (`id`, `line_id`) VALUES
(8, 1);

-- --------------------------------------------------------

--
-- Structure de la table `line`
--

CREATE TABLE IF NOT EXISTS `line` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `line`
--

INSERT INTO `line` (`id`, `name`) VALUES
(1, 703);

-- --------------------------------------------------------

--
-- Structure de la table `schedule`
--

CREATE TABLE IF NOT EXISTS `schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_time` datetime NOT NULL,
  `line_id` int(11) NOT NULL,
  `stop_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `line_id` (`line_id`),
  KEY `stop_id` (`stop_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `schedule`
--

INSERT INTO `schedule` (`id`, `date_time`, `line_id`, `stop_id`) VALUES
(1, '2016-09-19 06:55:00', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `stop`
--

CREATE TABLE IF NOT EXISTS `stop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `line_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `line_ID` (`line_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `stop`
--

INSERT INTO `stop` (`id`, `name`, `line_id`) VALUES
(3, 'REALMONT - CENTRE', 1),
(4, 'REALMONT - GENDARMERIE', 1);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `bus`
--
ALTER TABLE `bus`
  ADD CONSTRAINT `bus_line_id` FOREIGN KEY (`line_id`) REFERENCES `line` (`id`);

--
-- Contraintes pour la table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `date_line_id` FOREIGN KEY (`line_id`) REFERENCES `line` (`id`);

--
-- Contraintes pour la table `stop`
--
ALTER TABLE `stop`
  ADD CONSTRAINT `stop_line_id` FOREIGN KEY (`line_id`) REFERENCES `line` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
