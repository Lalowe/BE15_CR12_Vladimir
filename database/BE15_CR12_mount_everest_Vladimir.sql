-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: localhost
-- Čas generovania: Pi 01.Apr 2022, 21:40
-- Verzia serveru: 10.4.21-MariaDB
-- Verzia PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `BE15_CR12_mount_everest_Vladimir`
--
CREATE DATABASE IF NOT EXISTS `BE15_CR12_mount_everest_Vladimir` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `BE15_CR12_mount_everest_Vladimir`;

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `destinations`
--

CREATE TABLE `destinations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(300) NOT NULL,
  `price` decimal(13,2) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `latitude` decimal(9,6) NOT NULL,
  `longitude` decimal(9,6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sťahujem dáta pre tabuľku `destinations`
--

INSERT INTO `destinations` (`id`, `name`, `description`, `price`, `picture`, `latitude`, `longitude`) VALUES
(4, 'High Tatras', 'Best views on beautiful sceneries.', '900.00', 'pic1.jpeg\r\n', '49.152664', '20.240951'),
(5, 'Hallstatt', 'Very instagramable', '1200.00', 'pic2.jpeg', '47.534564', '13.540589'),
(6, 'Mala Fatra', 'Nice scenery with lake', '1100.00', 'pic3.jpeg', '40.540589', '39.540589'),
(7, 'Altaj', 'Discover real wildness', '3000.00', 'pic4.jpeg', '50.540589', '43.340589'),
(8, 'Mongol Valley', 'Without internet', '2500.00', 'pic5.jpeg', '50.540589', '60.342342'),
(9, 'Strbske Pleso', 'Amazing lake', '1200.00', 'pic6.jpeg', '41.540589', '39.540518');

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `destinations`
--
ALTER TABLE `destinations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
