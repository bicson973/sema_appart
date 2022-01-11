-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mar. 11 jan. 2022 à 11:41
-- Version du serveur :  5.7.34
-- Version de PHP : 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cbs_php_inter_sema`
--
CREATE DATABASE IF NOT EXISTS `cbs_php_inter_sema` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `cbs_php_inter_sema`;

-- --------------------------------------------------------

--
-- Structure de la table `advert`
--

CREATE TABLE `advert` (
  `id` int(5) NOT NULL,
  `title` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `zip_code` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `price` int(5) NOT NULL,
  `reservation_message` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `advert`
--
ALTER TABLE `advert`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `advert`
--
ALTER TABLE `advert`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
