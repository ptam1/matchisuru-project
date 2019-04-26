-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 26, 2019 at 06:25 AM
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
-- Table structure for table `games_questionnaire`
--

CREATE TABLE `games_questionnaire` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `game` varchar(255) NOT NULL,
  `skill_level` varchar(255) NOT NULL,
  `hours_playing_games` varchar(255) NOT NULL,
  `beginner_player` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `games_questionnaire`
--
ALTER TABLE `games_questionnaire`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `games_questionnaire`
--
ALTER TABLE `games_questionnaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `games_questionnaire`
--
ALTER TABLE `games_questionnaire`
  ADD CONSTRAINT `FK` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
