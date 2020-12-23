-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 23, 2020 at 03:12 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reservationsalles`
--

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `debut` datetime NOT NULL,
  `fin` datetime NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `titre`, `description`, `debut`, `fin`, `id_utilisateur`) VALUES
(2, 'manger', 'a table', '2020-12-02 00:00:00', '2020-12-02 00:00:00', 1),
(3, 'ibra', 'salah', '1970-01-01 00:00:00', '1970-01-01 00:00:00', 1),
(4, 'dffdfqdfqdfqfdqf', 'dfdqfdqbdqfqdbb', '2020-12-02 00:00:00', '2020-12-02 00:00:00', 1),
(5, 'ibra', 'vvvv', '2020-12-03 00:00:00', '2020-12-03 00:00:00', 1),
(6, 'dffdfqdfqdfqfdqf', 'a table', '1970-01-01 00:00:00', '1970-01-01 00:00:00', 1),
(7, 'sdvkdvbhjdvbuiuqvbjidqfdf', 'XVXVd', '1970-01-01 00:00:00', '1970-01-01 00:00:00', 1),
(8, 'manger', 'salah', '2020-12-06 00:00:00', '2020-12-20 00:00:00', 1),
(9, 'nnnndd', 'ddq', '2020-12-06 00:00:00', '2020-12-15 00:00:00', 1),
(10, 'salut', 'mon beau!!!', '2020-12-06 00:00:00', '2020-12-13 00:00:00', 1),
(11, 'dffdfqdfqdfqfdqf', 'oullaa', '2020-12-19 00:00:00', '2020-12-20 00:00:00', 2),
(12, 'sdvkdvbhjdvbuiuqvbjidqfdf', 'xcwc', '2020-12-26 00:00:00', '2020-12-27 00:00:00', 2),
(13, 'xvxvx', 'bjb', '2020-12-19 00:00:00', '2020-12-20 00:00:00', 2),
(14, 'ibra', 'cava', '2020-12-16 00:00:00', '2020-12-24 00:00:00', 4),
(15, 'manger', 'cava', '2020-12-16 00:00:00', '2020-12-23 00:00:00', 4),
(16, 'xvxvx', 'cavabaa', '2020-12-17 00:00:00', '2020-12-20 00:00:00', 4),
(17, 'dffdfqdfqdfqfdqf', 'helllllll', '2020-12-15 00:00:00', '2020-12-25 00:00:00', 4),
(18, 'sdvkdvbhjd', 'heellllllll', '2020-12-02 14:37:00', '2020-12-05 15:37:00', 4),
(19, 'yahoo', 'qsqc', '2020-12-22 19:07:00', '2020-12-22 14:09:00', 4);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES
(1, 'bah', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(2, 'salah', '2dcc3820e64b3d1a7866b22935c695fd6aa3980a'),
(3, 'albert', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(4, 'admin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
