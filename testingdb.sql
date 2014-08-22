-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2014 at 08:31 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `testingdb`
--
CREATE DATABASE IF NOT EXISTS `testingdb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `testingdb`;

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE IF NOT EXISTS `data` (
  `dataID` int(11) NOT NULL AUTO_INCREMENT,
  `no` int(11) NOT NULL,
  `Stream` text NOT NULL,
  `Scenario` text NOT NULL,
  `TestCase` text NOT NULL,
  `TesterWipro` text NOT NULL,
  `TesterTsel` text NOT NULL,
  `Cycle` int(11) NOT NULL,
  `PlannedStartDate` date NOT NULL,
  `PlannedEndDate` date NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `Remark` text,
  `DefectID` int(11) DEFAULT NULL,
  `FinalStatus` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`dataID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `logID` int(11) NOT NULL AUTO_INCREMENT,
  `Ndata` int(11) NOT NULL,
  `TanggalTest` date NOT NULL,
  `Keterangan` text NOT NULL,
  PRIMARY KEY (`logID`),
  UNIQUE KEY `TanggalTest` (`TanggalTest`),
  KEY `ID` (`Ndata`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_ibfk_1` FOREIGN KEY (`Ndata`) REFERENCES `data` (`dataID`),
  ADD CONSTRAINT `log_ibfk_2` FOREIGN KEY (`Ndata`) REFERENCES `data` (`dataID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
