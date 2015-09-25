-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2015 at 03:48 PM
-- Server version: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mechatron`
--

-- --------------------------------------------------------

--
-- Table structure for table `oe_mechatron_users`
--

CREATE TABLE IF NOT EXISTS `oe_mechatron_users` (
`Id` int(10) NOT NULL,
  `UID` varchar(100) NOT NULL,
  `Username` varchar(500) NOT NULL,
  `Password` varchar(500) NOT NULL,
  `QNo` int(10) NOT NULL,
  `Skip` int(10) NOT NULL,
  `Answered` int(11) NOT NULL,
  `Options` varchar(1000) NOT NULL,
  `Score` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `oe_mechatron_users`
--
ALTER TABLE `oe_mechatron_users`
 ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `oe_mechatron_users`
--
ALTER TABLE `oe_mechatron_users`
MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
