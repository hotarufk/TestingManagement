-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2014 at 08:44 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `testingdb`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`dataID`, `no`, `Stream`, `Scenario`, `TestCase`, `TesterWipro`, `TesterTsel`, `Cycle`, `PlannedStartDate`, `PlannedEndDate`, `Status`, `Remark`, `DefectID`, `FinalStatus`) VALUES
(1, 13, 'qewffe', 'wefwf', 'wefef', 'wfwefw', 'ewfewf', 13, '2014-08-12', '2014-08-27', 0, 'ewffw', 123, 0),
(2, 10, 'dfseef', 'sfsf', 'sfsf', 'sfse', 'sefsef', 1, '2014-08-01', '2014-08-08', 0, 'sffsesegseg', 7, 0),
(3, 1312, 'sesuatu', 'test', 'sesuatu aja', 'someone (?)', 'emon', 1, '2014-08-22', '2014-08-01', 0, NULL, NULL, 0),
(4, 123, '1', 'frferfe', 'efefe', 'erfef', 'ferferf', 1, '2014-08-26', '2014-08-29', 0, NULL, NULL, 0),
(5, 123, 'qewffe', 'wedwdw', 'dwde', 'wdewdw', 'dwedew', 12, '2014-08-26', '2014-08-29', 0, NULL, NULL, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`logID`, `Ndata`, `TanggalTest`, `Keterangan`) VALUES
(1, 1, '2014-08-20', '1eqqdd'),
(2, 1, '2014-08-01', 'safsafas'),
(8, 1, '2014-08-02', 'eergerg'),
(9, 2, '2014-08-23', 'sesutu'),
(10, 1, '2014-08-14', 'sesuatu'),
(13, 1, '2014-08-15', 'sesuatu');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_ibfk_2` FOREIGN KEY (`Ndata`) REFERENCES `data` (`dataID`),
  ADD CONSTRAINT `log_ibfk_1` FOREIGN KEY (`Ndata`) REFERENCES `data` (`dataID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
