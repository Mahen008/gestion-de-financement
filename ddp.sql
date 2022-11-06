-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 06 nov. 2022 à 08:44
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ddp`
--

-- --------------------------------------------------------

--
-- Structure de la table `bailleurs`
--

CREATE TABLE `bailleurs` (
  `id_bai` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `secteur_intervation` varchar(255) NOT NULL,
  `maturite` int(11) NOT NULL,
  `periode_grace` int(11) NOT NULL,
  `taux_interet` float NOT NULL,
  `mode_remboursement_principal` varchar(255) NOT NULL,
  `periodisite_de_remboursement` varchar(50) NOT NULL,
  `differenciel_interet` float NOT NULL,
  `frais_gestion` float NOT NULL,
  `commission_engagement` float NOT NULL,
  `commission_service` float NOT NULL,
  `commission_initiale` float NOT NULL,
  `commission_arragement` float NOT NULL,
  `commission_agent` float NOT NULL,
  `frais_rebours` float NOT NULL,
  `prime_assurance` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `bailleurs`
--

INSERT INTO `bailleurs` (`id_bai`, `nom`, `secteur_intervation`, `maturite`, `periode_grace`, `taux_interet`, `mode_remboursement_principal`, `periodisite_de_remboursement`, `differenciel_interet`, `frais_gestion`, `commission_engagement`, `commission_service`, `commission_initiale`, `commission_arragement`, `commission_agent`, `frais_rebours`, `prime_assurance`) VALUES
(1, 'banque mondiale', 'appui budgetaire', 100, 5, 0.0078, 'Remboursement constant du principal', 'Annuelle', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 'fond africain de developpement', 'gouvernance', 50, 3, 0.0196, 'Remboursement constant du principal', 'Annuelle', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 'agence française de developpement', 'infranstructure', 100, 0, 0.01, 'Remboursement constant du principal', 'Annuelle', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 'Fida', 'infranstructure', 300, 15, 0.01, 'Remboursement constant du principal', 'Annuelle', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 'investec', 'agriculure', 50, 3, 0.0317, 'Remboursement constant du principal', 'Annuelle', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12, 'Banque Europeen Investissement', 'projet pont', 70, 5, 57, 'Remboursement principal en fin', 'Annuelle', 0, 10000000, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `plafond_fmi`
--

CREATE TABLE `plafond_fmi` (
  `id_plafond` int(11) NOT NULL,
  `date_debut` date NOT NULL,
  `duree` varchar(200) NOT NULL,
  `montant` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `plafond_fmi`
--

INSERT INTO `plafond_fmi` (`id_plafond`, `date_debut`, `duree`, `montant`) VALUES
(1, '2022-10-27', '2', 1000000000);

-- --------------------------------------------------------

--
-- Structure de la table `pret`
--

CREATE TABLE `pret` (
  `id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `id_bailleurs` int(11) NOT NULL,
  `id_projet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pret`
--

INSERT INTO `pret` (`id`, `status`, `id_bailleurs`, `id_projet`) VALUES
(7, 'requette envoyée', 1, 2),
(9, 'en cours de négociation', 1, 3),
(10, 'en cours de signature', 1, 1),
(13, 'en cours d\'etude', 7, 5),
(16, 'en cours de négociation', 12, 4);

-- --------------------------------------------------------

--
-- Structure de la table `projet_sub`
--

CREATE TABLE `projet_sub` (
  `id_projet_sub` int(11) NOT NULL,
  `nom_projet_sub` varchar(255) NOT NULL,
  `montant_projet_sub` float NOT NULL,
  `date_signature` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `projet_sub`
--

INSERT INTO `projet_sub` (`id_projet_sub`, `nom_projet_sub`, `montant_projet_sub`, `date_signature`) VALUES
(1, 'Mionjo', 70900000, '2022-10-27'),
(2, 'Casef', 37400000, '2022-10-27'),
(3, 'Parn', 1763660, '2022-10-27'),
(4, 'PFSS', 58820000, '2022-10-27'),
(5, 'STATCAP', 1740020, '2022-10-27');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `role` varchar(75) NOT NULL,
  `fonction` varchar(100) NOT NULL,
  `service` varchar(150) NOT NULL,
  `profile` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_users`, `name`, `email`, `password`, `gender`, `role`, `fonction`, `service`, `profile`) VALUES
(22, 'Christian Roger', 'rchrione@gmail.com', '$2y$10$y7gDsZ0E.sNA7Bzby6S7nu6TsFv9yu6.n3zurukq6uUapMV2La8dO', 'Homme', 'Administrateur', '', 'Service des Analyses et des Statistiques de la Dette', 'user.jpg'),
(23, 'Joêl Patrick', 'joelpatrick@gmail.com', '$2y$10$ZO846Tjx.wVUK9uFnOGwdeuMioXSQ9AVVzkSVOaJkB1BtsFuQ1/c6', 'Homme', 'Utilisateur', '', 'Service des Analyses et des Statistiques de la Dette', 'test.webp'),
(24, 'Harielle', 'harielle@gmail.com', '$2y$10$gmXoPIqutDHvJgwkRJYIn.Rmo2Z3BpQTSBAh0pmrw360DjZR0JJyG', 'Femme', 'Utilisateur', '', 'Service des Aides et de la Dette extérieures', '127715041.jpg'),
(25, 'John', 'Johnddp@gmail.com', '$2y$10$waP0512IM1/ZvbItP2zsSOU1CRtTIfhZQ4hVr3Ch4TkIsmu.6.Osy', 'Homme', 'Utilisateur', '', 'Service des Aides et de la Dette extérieures', '800px-Stromae.jpg'),
(26, 'Arson', 'arsonddp@gmail.com', '$2y$10$8pB7pboAfIwaS5YJgPh6EO5SrZgOn3985tvL0QoqMBMb.SYtocB1.', 'Homme', 'Utilisateur', '', 'Service des Analyses et des Statistiques de la Dette', 'user-03.jpg'),
(27, 'Patrice Mahen', 'patrice.mahen008@gmail.com', '$2y$10$zlS2v9cb/oayyjyzAUKX4ekrp/QpX2LFdKvVnM3gbHc99iGg14c6G', 'Homme', 'Administrateur', '', 'Service des Analyses et des Statistiques de la Dette', '_1012958.JPG');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bailleurs`
--
ALTER TABLE `bailleurs`
  ADD PRIMARY KEY (`id_bai`);

--
-- Index pour la table `plafond_fmi`
--
ALTER TABLE `plafond_fmi`
  ADD PRIMARY KEY (`id_plafond`);

--
-- Index pour la table `pret`
--
ALTER TABLE `pret`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `projet_sub`
--
ALTER TABLE `projet_sub`
  ADD PRIMARY KEY (`id_projet_sub`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `bailleurs`
--
ALTER TABLE `bailleurs`
  MODIFY `id_bai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `plafond_fmi`
--
ALTER TABLE `plafond_fmi`
  MODIFY `id_plafond` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `pret`
--
ALTER TABLE `pret`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `projet_sub`
--
ALTER TABLE `projet_sub`
  MODIFY `id_projet_sub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
