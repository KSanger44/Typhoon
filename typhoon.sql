-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2022 at 09:24 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `typhoon`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `aID` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `info` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`aID`, `title`, `info`, `date`) VALUES
(1, 'Flu Shots', 'Flu Shots are due November 1st', '2022-10-25'),
(2, 'SNA Blood Drive', 'SNA is hosting a blood drive this Weekend', '2022-11-25'),
(3, 'Admit Health Portal Compliance', 'Spring 2023 admit health portals are due by January 6th', '2022-12-02');

-- --------------------------------------------------------

--
-- Table structure for table `site`
--

CREATE TABLE `site` (
  `sID` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `level` char(1) NOT NULL,
  `street` varchar(45) NOT NULL,
  `city` varchar(45) NOT NULL,
  `state` varchar(45) NOT NULL,
  `zip` int(5) NOT NULL,
  `myce` tinyint(1) NOT NULL,
  `90daytb` tinyint(1) NOT NULL,
  `2steptb` tinyint(1) NOT NULL,
  `drugscreen` tinyint(1) NOT NULL,
  `uniquereq` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `site`
--

INSERT INTO `site` (`sID`, `name`, `level`, `street`, `city`, `state`, `zip`, `myce`, `90daytb`, `2steptb`, `drugscreen`, `uniquereq`) VALUES
(1, 'Meriter Hospital', 'b', '202 S Park St', 'Madison', 'WI', 53715, 1, 0, 0, 0, ''),
(2, 'Select Specialty Hospital', 'u', '801 Braxton Place', 'Madison', 'WI', 53715, 0, 0, 1, 1, ''),
(3, 'St Mary Hospital', 'b', '700 S Brooks St', 'Madison', 'WI', 53715, 1, 0, 0, 1, ''),
(4, 'UW Hospital', 'b', '600 Highland Ave', 'Madison', 'WI', 53792, 1, 0, 0, 0, ''),
(5, 'William S Middleton Memorial VA Hospital', 'b', '2500 Overlook Terrace', 'Madison', 'WI', 53705, 0, 1, 0, 0, ''),
(8, 'Pivotal Health', 'g', '3030 Laura Ln', 'Middleton', 'WI', 53562, 0, 0, 0, 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`aID`);

--
-- Indexes for table `site`
--
ALTER TABLE `site`
  ADD PRIMARY KEY (`sID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `aID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `site`
--
ALTER TABLE `site`
  MODIFY `sID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
