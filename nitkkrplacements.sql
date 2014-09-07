-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 24, 2014 at 12:08 PM
-- Server version: 5.5.38-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nitkkrplacements`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `companyName` varchar(255) NOT NULL,
  `ctc` int(11) NOT NULL,
  `offer` int(1) NOT NULL,
  `dateOfVisit` date NOT NULL,
  `noOfDays` int(1) NOT NULL,
  `pacMember` varchar(255) NOT NULL,
  `studentHired` int(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `companyName`, `ctc`, `offer`, `dateOfVisit`, `noOfDays`, `pacMember`, `studentHired`) VALUES
(1, 'Amazone', 23, 1, '2014-08-04', 2, 'Vidur Khanna', 5),
(2, 'Adobe', 18, 1, '2014-08-22', 1, 'Faraz gazi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `studentCompanyAttended`
--

CREATE TABLE IF NOT EXISTS `studentCompanyAttended` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `companyId` int(10) NOT NULL,
  `studentId` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `studentCompanyAttended`
--

INSERT INTO `studentCompanyAttended` (`id`, `companyId`, `studentId`) VALUES
(1, 1, 5),
(2, 1, 8),
(3, 2, 5),
(4, 1, 5),
(5, 1, 5),
(6, 1, 5),
(7, 1, 5),
(8, 1, 5),
(9, 1, 5),
(10, 1, 5),
(11, 1, 8),
(12, 1, 5),
(13, 1, 8),
(14, 1, 5),
(15, 1, 5),
(16, 1, 5),
(17, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `studentPlaced`
--

CREATE TABLE IF NOT EXISTS `studentPlaced` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `companyId` int(10) NOT NULL,
  `studentId` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `studentPlaced`
--

INSERT INTO `studentPlaced` (`id`, `companyId`, `studentId`) VALUES
(23, 1, 5),
(24, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `studentsData`
--

CREATE TABLE IF NOT EXISTS `studentsData` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `rollno` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contacts` bigint(10) NOT NULL,
  `year` int(1) NOT NULL,
  `degree` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `placementStatus` int(1) NOT NULL DEFAULT '0',
  `companyName0` int(255) DEFAULT NULL,
  `companyName1` int(255) DEFAULT NULL,
  `noOfOffers` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `studentsData`
--

INSERT INTO `studentsData` (`id`, `rollno`, `name`, `email`, `contacts`, `year`, `degree`, `branch`, `placementStatus`, `companyName0`, `companyName1`, `noOfOffers`) VALUES
(3, 1120086, 'cc', 'email', 999, 0, 'degree', 'branch', 0, NULL, NULL, 0),
(4, 1120081, 'Utkarsh', 'email', 99999, 3, 'B.tech', 'IT', 0, NULL, NULL, 0),
(5, 1120084, 'Utkarsh', 'email', 999992323, 3, 'B.tech', 'Mechanical', 1, 1, 2, 2),
(6, 1120088, 'Rahul', 'email', 123654789, 3, 'MCA', 'IT', 0, NULL, NULL, 0),
(8, 1120085, 'Utkarsh', 'email', 9802791771, 3, 'B.tech', 'IT', 0, NULL, NULL, 0),
(9, 1120121, 'kumar', 'email', 9802791771, 4, 'BIO-MEDICAL', 'Electronics', 0, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(80) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` bigint(11) NOT NULL,
  `role` varchar(255) NOT NULL,
  `flag` int(1) NOT NULL,
  `branch` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
