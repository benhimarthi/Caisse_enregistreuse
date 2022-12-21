-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2022 at 12:26 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `caisse_enregistreuse`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `ID` int(11) NOT NULL,
  `ARTICLE_TITLE` varchar(100) NOT NULL,
  `ARTICLE_IMAGE_LINK` varchar(250) NOT NULL,
  `ARTICLE_PRICE` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`ID`, `ARTICLE_TITLE`, `ARTICLE_IMAGE_LINK`, `ARTICLE_PRICE`) VALUES
(1, 'laptop lenovo Delhi', '_', 4500),
(2, 'Playstation 5', '-', 8500);

-- --------------------------------------------------------

--
-- Table structure for table `detail_vente`
--

CREATE TABLE `detail_vente` (
  `ID` int(11) NOT NULL,
  `VENTE_ID` int(11) DEFAULT NULL,
  `DATE_VENTE` date NOT NULL,
  `QUANTITE` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_vente`
--

INSERT INTO `detail_vente` (`ID`, `VENTE_ID`, `DATE_VENTE`, `QUANTITE`, `user_id`) VALUES
(14, 23, '2022-12-05', 1, 1),
(15, 24, '2022-12-05', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `USER_NAME` varchar(100) DEFAULT NULL,
  `USER_EMAIL` varchar(150) NOT NULL,
  `USER_PASSWORD` varchar(100) NOT NULL,
  `USER_ACCOUNT_DATE_CREATED` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `USER_NAME`, `USER_EMAIL`, `USER_PASSWORD`, `USER_ACCOUNT_DATE_CREATED`) VALUES
(1, 'gojo satoru', 'g.satoru@manganim.jp', '12345', '2022-11-01'),
(2, 'jimbe mikary', 'j.mikary@manganim.jp', '12345', '2022-11-10'),
(3, 'naruto uzumaki', 'u.naruto@manganim.jp', '12345', '2022-11-01');

-- --------------------------------------------------------

--
-- Table structure for table `vente`
--

CREATE TABLE `vente` (
  `ID` int(11) NOT NULL,
  `ARTICLE_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vente`
--

INSERT INTO `vente` (`ID`, `ARTICLE_ID`) VALUES
(23, 1),
(24, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `detail_vente`
--
ALTER TABLE `detail_vente`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_VENTE` (`VENTE_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `vente`
--
ALTER TABLE `vente`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_ARTICLE` (`ARTICLE_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `detail_vente`
--
ALTER TABLE `detail_vente`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vente`
--
ALTER TABLE `vente`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_vente`
--
ALTER TABLE `detail_vente`
  ADD CONSTRAINT `FK_VENTE` FOREIGN KEY (`VENTE_ID`) REFERENCES `vente` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `vente`
--
ALTER TABLE `vente`
  ADD CONSTRAINT `FK_ARTICLE` FOREIGN KEY (`ARTICLE_ID`) REFERENCES `article` (`ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
