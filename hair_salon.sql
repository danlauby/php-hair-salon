-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Mar 01, 2017 at 12:41 AM
-- Server version: 5.5.49-log
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hair_salon`
--
CREATE DATABASE IF NOT EXISTS `hair_salon` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `hair_salon`;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` bigint(20) unsigned NOT NULL,
  `client_name` varchar(255) DEFAULT NULL,
  `stylist_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `client_name`, `stylist_id`) VALUES
(5, 'rgwhw', 7),
(6, 'erwh', 7),
(7, 'drheh', 7),
(8, 'fbss', 7),
(9, 'gjdj', 14),
(10, 'gdhdg', 13),
(11, 'gdhdg', 13),
(12, 'efqf', 16),
(20, 'dfhdh', 29),
(22, 'gg', 52),
(23, 'gg', 52),
(24, 'dvsv', 54),
(25, 'dvsv', 54),
(26, 'dvsv', 54),
(31, '', 64),
(32, '', 64),
(33, '', 64),
(34, '', 64),
(35, '', 64),
(36, '', 68);

-- --------------------------------------------------------

--
-- Table structure for table `stylists`
--

CREATE TABLE IF NOT EXISTS `stylists` (
  `id` bigint(20) unsigned NOT NULL,
  `stylist_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `stylists`
--
ALTER TABLE `stylists`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `stylists`
--
ALTER TABLE `stylists`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=75;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
