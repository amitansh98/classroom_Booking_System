-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2017 at 07:30 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `classroombooking`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminrequests`
--

CREATE TABLE `adminrequests` (
  `roomnumber` varchar(20) NOT NULL,
  `studentname` varchar(100) NOT NULL,
  `reason` varchar(10000) NOT NULL,
  `date` date NOT NULL,
  `bookingstatus` varchar(10) NOT NULL DEFAULT 'pending',
  `userid` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminrequests`
--

INSERT INTO `adminrequests` (`roomnumber`, `studentname`, `reason`, `date`, `bookingstatus`, `userid`) VALUES
('2005', 'Amitansh Gangwar ', 'for framed', '2017-04-12', 'accept', 'amitansh123');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `roomnumber` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `usershift1` varchar(100) DEFAULT 'NA',
  `usershift2` varchar(100) DEFAULT 'NA',
  `usershift3` varchar(100) DEFAULT 'NA',
  `usershift4` varchar(100) DEFAULT 'NA',
  `usershift5` varchar(100) DEFAULT 'NA',
  `usershift6` varchar(100) DEFAULT 'NA',
  `usershift7` varchar(100) DEFAULT 'NA',
  `usershift8` varchar(100) DEFAULT 'NA',
  `eventbooking` varchar(1000) NOT NULL DEFAULT 'NA'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`roomnumber`, `date`, `usershift1`, `usershift2`, `usershift3`, `usershift4`, `usershift5`, `usershift6`, `usershift7`, `usershift8`, `eventbooking`) VALUES
('2002', '2017-02-28', 'akash123', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA'),
('2004', '2017-03-21', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA'),
('2001', '2017-03-10', 'akash123', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA'),
('2005', '2017-04-12', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'Amitansh Gangwar '),
('2004', '2017-04-26', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `roomnumber` varchar(100) NOT NULL,
  `projector` varchar(100) NOT NULL,
  `isbooked` varchar(10) NOT NULL,
  `capacity` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`roomnumber`, `projector`, `isbooked`, `capacity`) VALUES
('2005', '1', '0', '150'),
('2004', '0', '0', '40'),
('2003', '0', '0', '40'),
('2103', '0', '0', '40'),
('2104', '0', '0', '40'),
('2105', '1', '0', '100');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `password`, `type`, `name`) VALUES
('amitansh123', 'amitansh#1997', 'student', 'Amitansh Gangwar '),
('akash123', 'akash#1997', 'faculty', 'Akash Gupta'),
('admin123', 'admin#1997', 'admin', 'Administrator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`roomnumber`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
