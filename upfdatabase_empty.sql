-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 10, 2013 at 07:22 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `upfdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `table_driver`
--

CREATE TABLE IF NOT EXISTS `table_driver` (
  `driver` int(11) NOT NULL,
  `operator` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `table_driverid`
--

CREATE TABLE IF NOT EXISTS `table_driverid` (
  `driverID` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `profileID` int(100) NOT NULL,
  PRIMARY KEY (`driverID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `table_log`
--

CREATE TABLE IF NOT EXISTS `table_log` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) NOT NULL,
  `notes` text NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `table_option`
--

CREATE TABLE IF NOT EXISTS `table_option` (
  `option` varchar(30) NOT NULL,
  `value` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_option`
--

INSERT INTO `table_option` (`option`, `value`) VALUES
('maxViolation', '10'),
('maxInspection', '50');

-- --------------------------------------------------------

--
-- Table structure for table `table_profile`
--

CREATE TABLE IF NOT EXISTS `table_profile` (
  `profileID` int(100) NOT NULL AUTO_INCREMENT,
  `licenseNumber` varchar(20) NOT NULL,
  `profileType` text NOT NULL,
  `licenseIssuedLTOBranch` text NOT NULL,
  `licenseIssuedDate` date NOT NULL,
  `licenseExpiryDate` date NOT NULL,
  `userName` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `emailAddress` varchar(30) DEFAULT NULL,
  `contactNumber` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `givenName` varchar(30) NOT NULL,
  `middleName` varchar(30) DEFAULT NULL,
  `age` int(2) DEFAULT NULL,
  `birthDate` date NOT NULL,
  `birthPlace` varchar(50) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `civilStatus` text NOT NULL,
  `citizenship` text NOT NULL,
  `occupation` varchar(30) DEFAULT NULL,
  `homeAddress` varchar(100) NOT NULL,
  `homeBrgy` varchar(30) NOT NULL,
  `homeTown` varchar(30) NOT NULL,
  `homeProvince` varchar(30) NOT NULL,
  `officeAddress` varchar(100) DEFAULT NULL,
  `officeBrgy` varchar(30) DEFAULT NULL,
  `officeTown` varchar(30) DEFAULT NULL,
  `officeProvince` varchar(30) DEFAULT NULL,
  `spouseName` varchar(30) DEFAULT NULL,
  `spouseOccupation` varchar(30) DEFAULT NULL,
  `violation` int(25) NOT NULL,
  `block` int(1) NOT NULL DEFAULT '0',
  `status` varchar(50) NOT NULL DEFAULT 'confirmation',
  `notes` text,
  `picture` varchar(100) NOT NULL DEFAULT 'default.gif',
  `licensepic` varchar(100) NOT NULL DEFAULT 'default.gif',
  PRIMARY KEY (`profileID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `table_profile`
--

INSERT INTO `table_profile` (`profileID`, `licenseNumber`, `profileType`, `licenseIssuedLTOBranch`, `licenseIssuedDate`, `licenseExpiryDate`, `userName`, `password`, `emailAddress`, `contactNumber`, `lastName`, `givenName`, `middleName`, `age`, `birthDate`, `birthPlace`, `gender`, `civilStatus`, `citizenship`, `occupation`, `homeAddress`, `homeBrgy`, `homeTown`, `homeProvince`, `officeAddress`, `officeBrgy`, `officeTown`, `officeProvince`, `spouseName`, `spouseOccupation`, `violation`, `block`, `status`, `notes`, `picture`, `licensepic`) VALUES
(1, 'ADMIN', 'ADMIN', 'CALAMBA', '2012-01-01', '2013-01-01', 'admin', 'admin', 'admin@admin.com', '', 'ADMIN', 'ADMIN', 'ADMIN', NULL, '1990-01-01', 'ADMIN', 'F', 'SINGLE', 'ADMIN', 'ADMIN', 'ADMIN', 'ADMIN', 'ADMIN', 'ADMIN', 'ADMIN', 'ADMIN', 'ADMIN', 'ADMIN', 'ADMIN', 'ADMIN', 0, 0, '', NULL, 'default.gif', 'default.gif'),
(2, 'CASHIER', 'CASHIER', '', '0000-00-00', '0000-00-00', 'cashier', 'cashier', 'cashier@cashier.com', '', 'CASHIER', 'CASHIER', 'CASHIER', NULL, '0000-00-00', 'CASHIER', 'F', 'CASHIER', 'CASHIER', 'CASHIER', 'CASHIER', 'CASHIER', 'CASHIER', 'CASHIER', 'CASHIER', 'CASHIER', 'CASHIER', 'CASHIER', 'CASHIER', 'CASHIER', 0, 0, '', NULL, 'default.gif', 'default.gif'),
(3, 'OVCCA', 'OVCCA', 'CALAMBA', '1990-01-01', '1990-01-01', 'ovcca', 'ovcca', 'ovcca@ovcca.com', '', 'OVCCA', 'OVCCA', 'OVCCA', NULL, '1990-01-01', 'OVCCA', 'F', 'SINGLE', 'OVCCA', 'OVCCA', 'OVCCA', 'OVCCA', 'OVCCA', 'OVCCA', 'OVCCA', 'OVCCA', 'OVCCA', 'OVCCA', NULL, NULL, 0, 0, '', NULL, 'default.gif', 'default.gif'),
(4, 'OPERATIONS', 'OPERATIONS', 'OPERATIONS', '1990-01-01', '1990-01-01', 'operations', 'operations', 'operations@operations.com', '', 'operations', 'operations', 'operations', 21, '1990-01-01', 'OPERATIONS', 'F', 'OPERATIONS', 'OPERATIONS', 'OPERATIONS', 'OPERATIONS', 'OPERATIONS', 'OPERATIONS', 'OPERATIONS', 'OPERATIONS', 'OPERATIONS', 'OPERATIONS', 'OPERATIONS', 'OPERATIONS', 'OPERATIONS', 0, 0, '', NULL, 'default.gif', 'default.gif'),
(5, 'INVESTIGATION', 'INVESTIGATION', 'INVESTIGATION', '1990-01-01', '1990-01-01', 'investigation', 'investigation', 'investigation@investigation.co', '', 'investigation', 'investigation', 'investigation', 21, '1990-01-01', 'INVESTIGATION', 'F', 'INVESTIGATION', 'INVESTIGATION', 'INVESTIGATION', 'INVESTIGATION', 'INVESTIGATION', 'INVESTIGATION', 'INVESTIGATION', 'INVESTIGATION', 'INVESTIGATION', 'INVESTIGATION', 'INVESTIGATION', 'INVESTIGATION', 'INVESTIGATION', 0, 0, '', NULL, 'default.gif', 'default.gif');

-- --------------------------------------------------------

--
-- Table structure for table `table_reference`
--

CREATE TABLE IF NOT EXISTS `table_reference` (
  `result` varchar(4) NOT NULL,
  `plateNumber` varchar(30) NOT NULL,
  `referenceNumber` varchar(30) DEFAULT NULL,
  `notes` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `table_request`
--

CREATE TABLE IF NOT EXISTS `table_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `request` varchar(25) NOT NULL,
  `profile` int(11) NOT NULL,
  `requestor` int(11) NOT NULL,
  `notes` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `table_vehicle`
--

CREATE TABLE IF NOT EXISTS `table_vehicle` (
  `plateNumber` varchar(7) NOT NULL,
  `vehicleType` text NOT NULL COMMENT 'PRIVATE OR PUBLIC OR MOTORCYCLE OR COMMERCIAL',
  `owner` int(100) NOT NULL,
  `model` varchar(30) NOT NULL,
  `year` year(4) NOT NULL,
  `motor` varchar(30) NOT NULL,
  `chassis` varchar(20) NOT NULL,
  `color` text NOT NULL,
  `stickerNumber` int(4) unsigned zerofill DEFAULT NULL,
  `stickerIssuedDate` date DEFAULT NULL,
  `lastStickerNumber` int(4) DEFAULT NULL,
  `lastStickerIssuedDate` date DEFAULT NULL,
  `reference` int(5) DEFAULT NULL,
  `inspection` date NOT NULL,
  `block` int(1) DEFAULT '0',
  `paid` date DEFAULT '0000-00-00',
  `status` varchar(30) NOT NULL DEFAULT 'pending',
  `condition` text,
  `violation` int(25) NOT NULL,
  `certificationRegistration` text NOT NULL,
  `receiptRegistration` text NOT NULL,
  `LTFRBFranchise` text,
  `insurance` text,
  `deed` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `table_violation`
--

CREATE TABLE IF NOT EXISTS `table_violation` (
  `violationNumber` int(50) NOT NULL AUTO_INCREMENT,
  `licenseNumber` varchar(50) NOT NULL,
  `driverID` int(4) unsigned zerofill NOT NULL,
  `plateNumber` varchar(7) NOT NULL,
  `violation` text NOT NULL,
  `violationDate` date NOT NULL,
  `violationTime` time NOT NULL,
  `violationLocation` text NOT NULL,
  `penalty` varchar(50) NOT NULL,
  `reporter` varchar(50) NOT NULL,
  `reporterContact` varchar(20) NOT NULL,
  `approve` int(1) NOT NULL DEFAULT '1',
  `evidence` text,
  PRIMARY KEY (`violationNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
