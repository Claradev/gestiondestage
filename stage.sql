-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  sam. 27 jan. 2018 à 17:58
-- Version du serveur :  10.1.28-MariaDB
-- Version de PHP :  7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `stage`
--

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE `entreprise` (
  `id` int(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `denomination` varchar(50) NOT NULL,
  `lieu` varchar(50) NOT NULL,
  `secteur` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenoms` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`id`, `email`, `mdp`, `denomination`, `lieu`, `secteur`, `nom`, `prenoms`) VALUES
(1, 'salimata@sali.com', '0101', 'gestage', 'cocody', 'informatique', 'salimata', 'alima'),
(2, 'carine@yahoo.fr', '0101', 'sheisthecode', 'cocody', 'production', 'carine', 'bouazi');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mdp` varchar(20) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenoms` varchar(50) NOT NULL,
  `classe` varchar(50) NOT NULL,
  `filiere` varchar(50) NOT NULL,
  `diplome` varchar(50) NOT NULL,
  `image` varchar(250) NOT NULL,
  `motivation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`id`, `email`, `mdp`, `nom`, `prenoms`, `classe`, `filiere`, `diplome`, `image`, `motivation`) VALUES
(1, 'salimata@salimata.com', '0101', 'clarisse', 'Gnou', 'licence 3', '', 'licence 1', 'hd2.jpg', 'je suis belle'),
(2, 'clarisse@gmail.com', '0101', 'gnou', 'clarisse', 'master 2', '', 'master 1', 'hd2.jpg', 'je suis une grande codeuse'),
(3, 'salimata@salimata.com', '0000', 'kouassi', 'marie dominique', '3', '', '3', 'carousel-payments.png', 'je suis passionnee de code'),
(4, 'kouassimarie@gmail.com', '0203', 'kouassi', 'marie dominique', '', '', '', 'quel-est-le-meilleur-antivirus-228x152.png', ''),
(5, 'kouassimarie@gmail.com', '0203', 'kouassi', 'marie dominique', '', '', '', 'quel-est-le-meilleur-antivirus-228x152.png', ''),
(6, 'marie@marie.com', '0230', 'kouassi', 'marie dominique', '3', '', '3', 'canadienne-Presse-Cafe-Abidjan-0006.jpg', 'kbubiyv');

-- --------------------------------------------------------

--
-- Structure de la table `maitre`
--

CREATE TABLE `maitre` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `noms` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `poste` varchar(50) NOT NULL,
  `domaine` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `maitre`
--

INSERT INTO `maitre` (`id`, `email`, `mdp`, `noms`, `prenom`, `poste`, `domaine`) VALUES
(1, 'salimata@salimata.sal', '0101', 'konan', 'kouadio', '', 'marketing'),
(2, 'salimata@salimata.sal', '0101', 'salimata', 'kouadio', 'directeur', '0'),
(3, 'volidavila@gmail.com', '1234', 'voli', 'davila', 'assitant', 'ressources humaines'),
(4, 'kouassi@gmail.com', '12345', 'kouassi', 'marie', 'assistant', 'rhcom');

-- --------------------------------------------------------

--
-- Structure de la table `stage`
--

CREATE TABLE `stage` (
  `id` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `note` int(20) NOT NULL,
  `ddebut` date NOT NULL,
  `dfin` date NOT NULL,
  `id_etudiant` int(10) NOT NULL,
  `id_maitre` int(10) NOT NULL,
  `id_entreprise` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `stage`
--

INSERT INTO `stage` (`id`, `email`, `mdp`, `note`, `ddebut`, `dfin`, `id_etudiant`, `id_maitre`, `id_entreprise`) VALUES
(0, 'salimata@salimata.sal', '0000', 8, '2017-02-05', '2017-02-02', 1, 1, 1),
(0, 'salimata@salimata.sal', '0000', 8, '2017-02-05', '2017-02-02', 1, 1, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `maitre`
--
ALTER TABLE `maitre`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `maitre`
--
ALTER TABLE `maitre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
