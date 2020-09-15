-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 15 sep. 2020 à 17:39
-- Version du serveur :  5.7.17
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `db`
--

-- --------------------------------------------------------

--
-- Structure de la table `listecontacts`
--

CREATE TABLE `listecontacts` (
  `idcontacts` int(11) NOT NULL,
  `nomContacts` varchar(255) NOT NULL,
  `numerosTel` int(11) NOT NULL,
  `mailContacts` varchar(255) NOT NULL,
  `listeUtilisateurs_iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `listeutilisateurs`
--

CREATE TABLE `listeutilisateurs` (
  `iduser` int(11) NOT NULL,
  `noms` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `listeutilisateurs`
--

INSERT INTO `listeutilisateurs` (`iduser`, `noms`, `email`, `mot_de_passe`) VALUES
(1, 'TOTO TATA', 'toto@mail.com', 'tototata');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `listecontacts`
--
ALTER TABLE `listecontacts`
  ADD PRIMARY KEY (`idcontacts`),
  ADD UNIQUE KEY `idcontacts_UNIQUE` (`idcontacts`),
  ADD UNIQUE KEY `numerosTel_UNIQUE` (`numerosTel`),
  ADD UNIQUE KEY `contactscol_UNIQUE` (`mailContacts`),
  ADD KEY `fk_listeContacts_listeUtilisateurs_idx` (`listeUtilisateurs_iduser`);

--
-- Index pour la table `listeutilisateurs`
--
ALTER TABLE `listeutilisateurs`
  ADD PRIMARY KEY (`iduser`),
  ADD UNIQUE KEY `id_UNIQUE` (`iduser`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `listecontacts`
--
ALTER TABLE `listecontacts`
  MODIFY `idcontacts` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `listeutilisateurs`
--
ALTER TABLE `listeutilisateurs`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
