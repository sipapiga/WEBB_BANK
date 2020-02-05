-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1:3308
-- Tid vid skapande: 05 feb 2020 kl 23:31
-- Serverversion: 10.4.11-MariaDB
-- PHP-version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `bank`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `account`
--

CREATE TABLE `account` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `currency` varchar(5) NOT NULL DEFAULT 'SEK'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `account`
--

INSERT INTO `account` (`id`, `user_id`, `currency`) VALUES
(10, 10, 'SEK'),
(15, 1, 'SEK'),
(16, 2, 'SEK'),
(17, 3, 'SEK'),
(18, 4, 'SEK'),
(19, 5, 'SEK'),
(20, 6, 'SEK'),
(21, 7, 'SEK'),
(22, 8, 'SEK'),
(23, 9, 'SEK'),
(50, 11, 'SEK');

-- --------------------------------------------------------

--
-- Tabellstruktur `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL,
  `from_amount` int(11) NOT NULL,
  `from_account` int(11) NOT NULL,
  `from_currency` varchar(5) NOT NULL DEFAULT 'SEK',
  `to_amount` int(11) NOT NULL,
  `to_account` int(11) NOT NULL,
  `to_currency` varchar(5) NOT NULL DEFAULT 'SEK',
  `currency_rate` decimal(10,3) NOT NULL DEFAULT 1.000,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `from_amount`, `from_account`, `from_currency`, `to_amount`, `to_account`, `to_currency`, `currency_rate`, `date`) VALUES
(1, 0, 0, 'SEK', 5000, 10, 'SEK', '1.000', '2020-02-05 12:42:12'),
(2, 0, 0, 'SEK', 5000, 15, 'SEK', '1.000', '2020-02-05 12:42:12'),
(3, 0, 0, 'SEK', 5000, 16, 'SEK', '1.000', '2020-02-05 12:42:12'),
(4, 0, 0, 'SEK', 5000, 17, 'SEK', '1.000', '2020-02-05 12:42:12'),
(5, 0, 0, 'SEK', 5000, 18, 'SEK', '1.000', '2020-02-05 12:42:12'),
(6, 0, 0, 'SEK', 5000, 19, 'SEK', '1.000', '2020-02-05 12:42:12'),
(7, 0, 0, 'SEK', 5000, 20, 'SEK', '1.000', '2020-02-05 12:42:12'),
(8, 0, 0, 'SEK', 5000, 21, 'SEK', '1.000', '2020-02-05 12:42:12'),
(9, 0, 0, 'SEK', 5000, 22, 'SEK', '1.000', '2020-02-05 12:42:12'),
(10, 0, 0, 'SEK', 5000, 23, 'SEK', '1.000', '2020-02-05 12:42:12'),
(13, 200, 20, 'SEK', 200, 21, 'SEK', '1.000', '2020-02-05 18:16:41'),
(14, 2, 20, 'SEK', 2, 21, 'SEK', '1.000', '2020-02-05 20:05:42'),
(15, 5000, 20, 'SEK', 5000, 16, 'SEK', '1.000', '2020-02-05 20:06:08'),
(16, 5000, 16, 'SEK', 5000, 20, 'SEK', '1.000', '2020-02-05 20:11:17'),
(17, 5000, 20, 'SEK', 5000, 16, 'SEK', '1.000', '2020-02-05 20:12:28'),
(18, 100, 16, 'SEK', 100, 20, 'SEK', '1.000', '2020-02-05 20:35:46'),
(19, 5000, 16, 'SEK', 5000, 20, 'SEK', '1.000', '2020-02-05 20:39:15'),
(20, 5000, 20, 'SEK', 5000, 15, 'SEK', '1.000', '2020-02-05 20:41:35'),
(21, 5500, 17, 'SEK', 5500, 18, 'SEK', '1.000', '2020-02-05 20:48:12'),
(22, 20, 17, 'SEK', 20, 17, 'SEK', '1.000', '2020-02-05 20:52:59'),
(23, 20, 17, 'SEK', 20, 17, 'SEK', '1.000', '2020-02-05 20:53:05'),
(24, 2, 17, 'SEK', 2, 19, 'SEK', '1.000', '2020-02-05 20:54:00'),
(25, 5000, 16, 'SEK', 5000, 15, 'SEK', '1.000', '2020-02-05 20:55:39'),
(26, 5000, 15, 'SEK', 5000, 16, 'SEK', '1.000', '2020-02-05 20:57:09'),
(27, 1300, 20, 'SEK', 1300, 16, 'SEK', '1.000', '2020-02-05 21:16:59'),
(28, 13000, 20, 'SEK', 13000, 50, 'SEK', '1.000', '2020-02-05 21:21:58'),
(29, 13000, 50, 'SEK', 13000, 20, 'SEK', '1.000', '2020-02-05 21:27:13'),
(31, 3000, 18, 'SEK', 3000, 20, 'SEK', '1.000', '2020-02-05 22:21:03'),
(32, 2000, 18, 'SEK', 2000, 17, 'SEK', '1.000', '2020-02-05 22:21:15');

-- --------------------------------------------------------

--
-- Tabellstruktur `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobilephone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `username`, `password`, `mobilephone`) VALUES
(1, 'Eugenius', 'McDougall', 'emcdougall0', 'MJvcqxlbNK', '076-1234560'),
(2, 'Lion', 'Toyer', 'ltoyer1', '1HUTP8BivQ17', '076-1234561'),
(3, 'Blanca', 'Fussie', 'bfussie2', 'INdDBPs9UcW', '076-1234562'),
(4, 'Giffer', 'Wilstead', 'gwilstead3', 'fYz2Bs', '076-1234563'),
(5, 'Charlot', 'Waggatt', 'cwaggatt4', 'Qv69mr', '076-1234564'),
(6, 'Huberto', 'Biggs', 'hbiggs5', 'iVulMzUQ7v1', '076-1234565'),
(7, 'Drusi', 'Foskew', 'dfoskew6', '4pShbrXSpTLK', '076-1234566'),
(8, 'Sapphire', 'Vequaud', 'svequaud7', 'agN4Bzo3D', '076-1234567'),
(9, 'Stephannie', 'Gotfrey', 'sgotfrey8', '9LlRq8laWX', '076-1234568'),
(10, 'Giulio', 'Arnli', 'garnli9', 'tSfZJjg', '076-1234569'),
(11, 'Pat', 'Prasopsap', 'pat', 'pat', '073-8423135');

-- --------------------------------------------------------

--
-- Ersättningsstruktur för vy `vw_users`
-- (See below for the actual view)
--
CREATE TABLE `vw_users` (
`id` int(11)
,`firstName` varchar(255)
,`lastName` varchar(255)
,`username` varchar(255)
,`password` varchar(255)
,`mobilephone` varchar(20)
,`account_id` int(10) unsigned
,`balance` decimal(33,0)
);

-- --------------------------------------------------------

--
-- Struktur för vy `vw_users`
--
DROP TABLE IF EXISTS `vw_users`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_users`  AS  select `u`.`id` AS `id`,`u`.`firstName` AS `firstName`,`u`.`lastName` AS `lastName`,`u`.`username` AS `username`,`u`.`password` AS `password`,`u`.`mobilephone` AS `mobilephone`,`a`.`id` AS `account_id`,(select ifnull(sum(`transactions`.`to_amount`),0) from `transactions` where `transactions`.`to_account` = `a`.`id`) - (select ifnull(sum(`transactions`.`from_amount`),0) from `transactions` where `transactions`.`from_account` = `a`.`id`) AS `balance` from (`users` `u` join `account` `a` on(`a`.`user_id` = `u`.`id`)) ;

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `from_user_id` (`from_account`,`to_account`),
  ADD KEY `to_user_id` (`to_account`);

--
-- Index för tabell `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`id`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `account`
--
ALTER TABLE `account`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT för tabell `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
