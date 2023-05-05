-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2023 at 06:32 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skolajezika`
--
CREATE DATABASE IF NOT EXISTS `skolajezika` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `skolajezika`;

-- --------------------------------------------------------

--
-- Table structure for table `jezik`
--

CREATE TABLE `jezik` (
  `id` bigint(20) NOT NULL,
  `naziv` varchar(30) DEFAULT NULL,
  `nastavnik` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jezik`
--

INSERT INTO `jezik` (`id`, `naziv`, `nastavnik`) VALUES
(1, 'Francuski', 1),
(2, 'Engleski', 2),
(3, 'Spanski', 4),
(4, 'Japanski', 3);

-- --------------------------------------------------------

--
-- Table structure for table `nastavnik`
--

CREATE TABLE `nastavnik` (
  `id` bigint(20) NOT NULL,
  `imePrezime` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nastavnik`
--

INSERT INTO `nastavnik` (`id`, `imePrezime`) VALUES
(1, 'Hristina Kostic'),
(2, 'Milica Nikolic'),
(3, 'Teodora Tosic'),
(4, 'Sandra Ciric');

-- --------------------------------------------------------

--
-- Table structure for table `termin`
--

CREATE TABLE `termin` (
  `id` bigint(20) NOT NULL,
  `jezik` bigint(20) NOT NULL,
  `klijent` varchar(50) DEFAULT NULL,
  `datum` date DEFAULT NULL,
  `ucionica` bigint(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `termin`
--

INSERT INTO `termin` (`id`, `jezik`, `klijent`, `datum`, `ucionica`) VALUES
(1, 2, 'Milica Mitic', '2023-02-13', 4),
(2, 2, 'Jelena Mitic', '2023-03-13', 10),
(3, 1, 'Ana Markovic', '2023-04-02', 5),
(4, 4, 'Filip Petrovic', '2022-11-20', 8),
(5, 4, 'Helena Maric', '2022-11-20', 8),
(6, 3, 'Jovana Milovanovic', '2023-02-12', 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jezik`
--
ALTER TABLE `jezik`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nastavnik` (`nastavnik`);

--
-- Indexes for table `nastavnik`
--
ALTER TABLE `nastavnik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `termin`
--
ALTER TABLE `termin`
  ADD PRIMARY KEY (`id`,`jezik`),
  ADD KEY `jezik` (`jezik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jezik`
--
ALTER TABLE `jezik`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nastavnik`
--
ALTER TABLE `nastavnik`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `termin`
--
ALTER TABLE `termin`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jezik`
--
ALTER TABLE `jezik`
  ADD CONSTRAINT `jezik_nastavnik_fk` FOREIGN KEY (`nastavnik`) REFERENCES `nastavnik` (`id`);

--
-- Constraints for table `termin`
--
ALTER TABLE `termin`
  ADD CONSTRAINT `termin_jezik_fk` FOREIGN KEY (`jezik`) REFERENCES `jezik` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
