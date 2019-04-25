-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2019 at 10:56 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

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
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `profileID` bigint(20) UNSIGNED NOT NULL,
  `userID` bigint(20) UNSIGNED NOT NULL,
  `dispName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `steam` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ps` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `xbox` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nintendo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fb` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `insta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reddit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `twitch` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `youtube` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bio` varchar(1500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`profileID`, `userID`, `dispName`, `steam`, `ps`, `xbox`, `nintendo`, `fb`, `twitter`, `insta`, `reddit`, `twitch`, `youtube`, `bio`) VALUES
(2, 9, 'Alex Kritskiy', '', '', '', '', 'akritskiy', '', 'akritskiy', 'zinu92', '', '', 'Hello world.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `email_verif_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `created_at`, `email_verif_hash`, `active`) VALUES
(9, 'akritskiy@gmail.com', 'alex', '$2y$10$mxaX3JwwzYFDZuCTIKqwO.FwWStaEThozkrg9.L4LZNOAEib.RoRe', '2019-04-23 20:40:39', '$2y$10$jb8jK2uhZI.FYdlhqtTdmepGHnR.79lqlrasZgelxguC7Q4RPF.CC', 1);
INSERT INTO `users` (`id`, `email`, `username`, `password`, `created_at`, `email_verif_hash`, `active`) VALUES
(22, 'rparizi1@kennesaw.edu', 'rmp', '$2y$10$/Mr26KQW8vVH7v5B6KvGROVHziSYcK4RymcejFOWKwhDlR8GWE8ue', '2019-04-06 17:11:40', '$2y$10$95FpFwBj/tYun0/HdFMT3.ThY8E9elnH8.QF8YvRQqHASsEFF/HFW', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`profileID`),
  ADD UNIQUE KEY `foreign key: links profile to users table by the uid` (`userID`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `profileID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `foreign key: userID in profile table -> id in users table` FOREIGN KEY (`userID`) REFERENCES `users` (`id`) ON DELETE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
