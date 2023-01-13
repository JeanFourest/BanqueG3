-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : ven. 13 jan. 2023 à 15:41
-- Version du serveur :  5.7.34
-- Version de PHP : 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `banque`
--

-- --------------------------------------------------------

--
-- Structure de la table `bankaccounts`
--

CREATE TABLE `bankaccounts` (
  `id` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `id_users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `bankaccounts`
--

INSERT INTO `bankaccounts` (`id`, `balance`, `id_users`) VALUES
(1, 11, 2),
(2, 10, 4);

-- --------------------------------------------------------

--
-- Structure de la table `contact_forms`
--

CREATE TABLE `contact_forms` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contact_forms`
--

INSERT INTO `contact_forms` (`id`, `fullname`, `phone`, `email`, `message`, `created_at`) VALUES
(1, 'bruuuh', 986543456, 'jean@gmail.com', 'jcjsjcvieki', '2023-01-11 16:37:50'),
(2, 'bruuuh', 986543456, 'jean@gmail.com', 'zefjbzebczebcuzebcuhze', '2023-01-11 16:39:22');

-- --------------------------------------------------------

--
-- Structure de la table `currencies`
--

CREATE TABLE `currencies` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `symbole` varchar(255) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `currencies`
--

INSERT INTO `currencies` (`id`, `nom`, `symbole`, `price`) VALUES
(1, 'Livre Sterling', 'GBP', 0.88),
(2, 'Dollar', 'USD', 1.07),
(3, 'Yen', 'JPY', 141.95),
(4, 'Bitcoin', 'BTC', 0.000057);

-- --------------------------------------------------------

--
-- Structure de la table `deposits`
--

CREATE TABLE `deposits` (
  `id` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `message` text NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_bank` int(11) NOT NULL,
  `do_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `deposits`
--

INSERT INTO `deposits` (`id`, `id_users`, `price`, `message`, `id_admin`, `id_bank`, `do_at`) VALUES
(6, 2, 10, 'Petit commencement', 1, 1, '2023-01-13 13:57:16'),
(8, 2, 12, 's', 1, 1, '2023-01-13 15:05:55'),
(9, 2, 12, 'sdfghjhgfdsd', 1, 1, '2023-01-13 15:06:10');

-- --------------------------------------------------------

--
-- Structure de la table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `type_currencies` int(11) NOT NULL,
  `do_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `transactions`
--

INSERT INTO `transactions` (`id`, `sender`, `receiver`, `value`, `type_currencies`, `do_at`) VALUES
(2, 2, 2, 2, 1, '2023-01-12 19:55:42');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_ip` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`, `created_at`, `last_ip`) VALUES
(1, 'jean@gmail.com', 'aa3d2fe4f6d301dbd6b8fb2d2fddfb7aeebf3bec53ffff4b39a0967afa88c609', 1000, '2023-01-11 16:22:54', '::1'),
(2, 'alex@gmail.com', 'aa3d2fe4f6d301dbd6b8fb2d2fddfb7aeebf3bec53ffff4b39a0967afa88c609', 10, '2023-01-12 09:15:35', '::1'),
(3, 'jean2@gmail.com', 'aa3d2fe4f6d301dbd6b8fb2d2fddfb7aeebf3bec53ffff4b39a0967afa88c609', 1000, '2023-01-12 11:11:47', '::1'),
(4, 'jean3@gmail.com', 'aa3d2fe4f6d301dbd6b8fb2d2fddfb7aeebf3bec53ffff4b39a0967afa88c609', 10, '2023-01-12 19:57:44', '::1'),
(7, 'a@gmail.com', 'f2d81a260dea8a100dd517984e53c56a7523d96942a834b9cdc249bd4e8c7aa9', 10, '2023-01-13 14:41:26', '::1');

-- --------------------------------------------------------

--
-- Structure de la table `withdrawals`
--

CREATE TABLE `withdrawals` (
  `id` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_bank` int(11) NOT NULL,
  `do_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `withdrawals`
--

INSERT INTO `withdrawals` (`id`, `id_users`, `price`, `id_admin`, `id_bank`, `do_at`) VALUES
(8, 2, 2, 1, 1, '2023-01-13 13:57:26'),
(9, 2, 10, 1, 1, '2023-01-13 15:01:26');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bankaccounts`
--
ALTER TABLE `bankaccounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users-id_users` (`id_users`);

--
-- Index pour la table `contact_forms`
--
ALTER TABLE `contact_forms`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user-id_user` (`id_users`),
  ADD KEY `bankaccount-id_bank` (`id_bank`),
  ADD KEY `bankaccount-id_admin` (`id_admin`);

--
-- Index pour la table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bankaccount-receiver` (`receiver`),
  ADD KEY `bankaccount-sender` (`sender`),
  ADD KEY `currencies-type_currencies` (`type_currencies`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bankaccount-id_admins` (`id_admin`),
  ADD KEY `bankaccount-id_banks` (`id_bank`),
  ADD KEY `user-id_users` (`id_users`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `bankaccounts`
--
ALTER TABLE `bankaccounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `contact_forms`
--
ALTER TABLE `contact_forms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `withdrawals`
--
ALTER TABLE `withdrawals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `bankaccounts`
--
ALTER TABLE `bankaccounts`
  ADD CONSTRAINT `users-id_users` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `deposits`
--
ALTER TABLE `deposits`
  ADD CONSTRAINT `bankaccount-id_admin` FOREIGN KEY (`id_admin`) REFERENCES `bankaccounts` (`id`),
  ADD CONSTRAINT `bankaccount-id_bank` FOREIGN KEY (`id_bank`) REFERENCES `bankaccounts` (`id`),
  ADD CONSTRAINT `user-id_user` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `bankaccount-receiver` FOREIGN KEY (`receiver`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `bankaccount-sender` FOREIGN KEY (`sender`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `currencies-type_currencies` FOREIGN KEY (`type_currencies`) REFERENCES `currencies` (`id`);

--
-- Contraintes pour la table `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD CONSTRAINT `bankaccount-id_admins` FOREIGN KEY (`id_admin`) REFERENCES `bankaccounts` (`id`),
  ADD CONSTRAINT `bankaccount-id_banks` FOREIGN KEY (`id_bank`) REFERENCES `bankaccounts` (`id`),
  ADD CONSTRAINT `user-id_users` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
