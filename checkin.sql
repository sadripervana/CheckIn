-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 07, 2021 at 06:10 PM
-- Server version: 8.0.27-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `checkin`
--

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `id` mediumint NOT NULL,
  `name` varchar(15) DEFAULT NULL,
  `surname` varchar(15) DEFAULT NULL,
  `checkin` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`id`, `name`, `surname`, `checkin`) VALUES
(1, 'new', 'user1s', 1),
(2, 'user2', 'user2s', 1),
(3, 'user3', 'user3s', 0),
(4, 'user4', 'user4s', 1),
(5, 'sadro', 'sadri', 1),
(6, 'sdaf', 'fasd', 1),
(7, 'sfd', 'fghdj', 0),
(8, 'fasd', 'sdaf', 1),
(9, 'sfd', 'fasdfasd', 0),
(10, 'fasd', 'fasds', 1),
(11, 'sdfa', 'fasd', 0),
(12, 'gadf', 'adgf', 0),
(13, 'csdzxg', 'afsdg', 1),
(14, 'gafd', 'afdg', 1),
(15, 'asdfg', 'fadg', 1),
(16, 'adfg', 'fadg', 1),
(17, 'fadg', 'adfg', 1),
(18, 'aagsdf', 'adfg', 1),
(19, 'fdhasg', 'fasdg', 1),
(20, 'sdfg', 'fsdg', 0),
(21, 'dsfga', 'adfg', 1),
(22, 'fdgs', 'asdfg', 1),
(23, 'asdgf', 'adfg', 1),
(24, 'afdgg', 'adfg', 1),
(25, 'adfghh', 'adfygh', 1),
(26, 'asdfhfg', 'adsfhg', 1),
(27, 'sfdgh', 'sfdgh', 1),
(28, 'adfghd', 'adfh', 1),
(29, 'adfhfgasj', 'fsgjfj', 1),
(30, 'sfgjdfsghj', 'dghjdj', 1),
(31, 'sfghfshjd', 'dhgjdghj', 1),
(32, 'Fdhadfh', 'Adfhgah', 1),
(33, 'Adgfagd', 'Adfgadfg', 1),
(34, 'Agd', 'Sfad', 1),
(35, 'Gafdg', 'Asdg', 1),
(36, 'Dsaffas', 'Sdfa', 1),
(37, 'ADSF', 'SADF', 1),
(38, 'FSADF', 'ADGFGA', 1),
(39, 'Asdf', 'SADF', 1),
(40, 'Fasdf', 'Sadf', 1),
(41, 'FSADF', 'Fasdf', 1),
(42, 'Zd', 'Ds', 1),
(43, 'Sfd', 'Sdg', 1),
(44, 'Aaaa', 'Aaaa', 1),
(45, 'Afs', 'Afs', 1),
(46, 'Safd', 'Sadf', 1),
(47, 'Ffsadf', 'Dsag', 1),
(48, 'Adgfagd', 'Daf', 1),
(49, 'Dfsa', 'Sadf', 1),
(50, 'Dfsa', 'Sadf', 1),
(51, 'Dfsa', 'Sadf', 1),
(52, 'Dfsa', 'Sadf', 1),
(53, 'Fasdf', 'Adgadg', 1),
(54, 'Anxhi', 'Anxhi', 1),
(55, 'Aaas', 'Aaas', 1),
(56, 'Dgadfg', 'GDGDFH', 1),
(57, 'Smith', 'Johnson', 1),
(58, 'Williams', '	 Brown', 0),
(59, 'Jones', 'Garcia', 1),
(60, 'Williams', 'GDGDFH', 0),
(61, 'New ', 'New', 0),
(62, 'Hello', 'There', 0),
(63, 'Pablo', 'Escobar', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`) VALUES
(1, 'sadripervana@gmail.com', '$2y$10$C3ajJRcHhfmS9PtAePrVuuK.BUg1MbxSETL7HnqFfmkkK6pNCEy4C');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`(5));

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `id` mediumint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
