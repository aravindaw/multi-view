-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2015 at 08:57 PM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `page_viewer`
--

-- --------------------------------------------------------

--
-- Table structure for table `save_history`
--

CREATE TABLE IF NOT EXISTS `save_history` (
`id` int(11) NOT NULL,
  `tab_id` int(11) NOT NULL,
  `page_name` varchar(25) NOT NULL,
  `url` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `save_history`
--

INSERT INTO `save_history` (`id`, `tab_id`, `page_name`, `url`) VALUES
(1, 1, 'w3school', 'http://www.w3schools.com/');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `save_history`
--
ALTER TABLE `save_history`
 ADD PRIMARY KEY (`id`), ADD KEY `tab_id` (`tab_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `save_history`
--
ALTER TABLE `save_history`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `save_history`
--
ALTER TABLE `save_history`
ADD CONSTRAINT `save_history_ibfk_1` FOREIGN KEY (`tab_id`) REFERENCES `pages` (`pageID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
