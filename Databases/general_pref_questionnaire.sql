-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 22, 2019 at 02:05 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `matchisuru`
--

-- --------------------------------------------------------

--
-- Table structure for table `general_pref_questionnaire`
--

CREATE TABLE `general_pref_questionnaire` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `teammate_pref` varchar(255) NOT NULL,
  `describe_yourself` varchar(255) NOT NULL,
  `mad_while_playing` varchar(255) NOT NULL,
  `foul_language` varchar(255) NOT NULL,
  `age_group` varchar(255) NOT NULL,
  `strongest_trait` varchar(255) NOT NULL,
  `active_on_mic` varchar(255) NOT NULL,
  `game_pref` varchar(255) NOT NULL,
  `player_type` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `animal` varchar(255) NOT NULL,
  `book` varchar(255) NOT NULL,
  `drink` varchar(255) NOT NULL,
  `general_pref` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `general_pref_questionnaire`
--
ALTER TABLE `general_pref_questionnaire`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `general_pref_questionnaire`
--
ALTER TABLE `general_pref_questionnaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
