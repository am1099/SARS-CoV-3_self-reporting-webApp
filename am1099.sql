-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2020 at 05:10 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `co3102_cw2_2020`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `PasswordHash` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Username`, `PasswordHash`) VALUES
('admin', '$2y$10$6CBIWyqTI3TNjR8OKEAKJON56MParTrVmv1QVg6SyejU9vH/eds.C'),
('tester', '$2y$10$5C76EqJDvSW9Pbn/WeI2O.B74umbVNow7Bq4zPaIc4U0BOhMdaIlu');

-- --------------------------------------------------------

--
-- Table structure for table `hometestkit`
--

CREATE TABLE `hometestkit` (
  `TNN_Code` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `used` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hometestkit`
--

INSERT INTO `hometestkit` (`TNN_Code`, `used`) VALUES
('34GC829B', '1'),
('4F7YKH9G', '1'),
('57UBS5J6', '1'),
('8RL4ENTK', '1'),
('CB8FBCCM', '1'),
('CCZTQ8KW', '1'),
('FEQQ6U01', '1'),
('FEQQ6U02', '1'),
('FEQQ6U03', '1'),
('FEQQ6U04', '1'),
('FEQQ6U05', '1'),
('FEQQ6U06', '1'),
('FEQQ6U07', '1'),
('FEQQ6U08', '1'),
('FEQQ6U09', '1'),
('FEQQ6U10', '1'),
('FEQQ6U11', '1'),
('FEQQ6U12', '1'),
('FEQQ6U13', '1'),
('FEQQ6U14', '1'),
('FEQQ6U15', '1'),
('FEQQ6U16', '1'),
('FEQQ6U17', '1'),
('FEQQ6U18', '1'),
('FEQQ6UUG', '1'),
('MM2874Z6', '1'),
('R9KZ2NXL', '1'),
('YBQUVXHL', '1');

-- --------------------------------------------------------

--
-- Table structure for table `testresult`
--

CREATE TABLE `testresult` (
  `Email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Fullname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `Gender` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Address` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `Postcode` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TTN` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TestResult` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `testresult`
--

INSERT INTO `testresult` (`Email`, `Fullname`, `Age`, `Gender`, `Address`, `Postcode`, `TTN`, `TestResult`) VALUES
('a9@student.le.ac.uk', 'Abh Menacer', 32, 'M', '42 Manston Mews', 'NG7', 'FEQQ6UUG', 'Negative'),
('abdall4@outlook.com', 'Abdal  er', 76, 'F', '42 Mansto', 'NG7', 'FEQQ6U11', 'Positive'),
('abdallah_0106@outlook.com', 'ibrahim men', 5, 'M', '42 Mansto', 'NG8', 'FEQQ6U07', 'Negative'),
('ABZ@abz.cds', 'abz1 m', 56, 'F', '42 Mansto', 'NG5', 'FEQQ6U10', 'Positive'),
('ABZ@DSADA.cs', 'abz2 m', 12, 'M', 'asdafca', 'NG8', 'FEQQ6U09', 'Inconclusive'),
('AHM@amine.com', 'Abdallah MeRONALDO', 81, 'M', '42 Manston Mews', 'NG5', 'FEQQ6U14', 'Positive'),
('AIDUSBNASD@ASDAS.ASD', 'TEST TEST2', 96, 'M', '12BKJBK', 'NG6', 'FEQQ6U16', 'Positive'),
('am10@student.le.ac.uk', 'Abdallah 5', 45, 'M', '42 Manston Mews', 'NG7', 'FEQQ6U05', 'Positive'),
('am1040@student.le.ac.uk', 'Abdallah 5', 21, 'F', '42 Manston Mews', 'NG7', 'FEQQ6U06', 'Positive'),
('am1085@student.le.ac.uk', 'Abdallah 3', 34, 'F', '42 Manston Mews', 'NG8', 'FEQQ6U08', 'Negative'),
('am1099@stude.uk', 'Abdallah Men', 27, 'F', '42 Manston Mews', 'NG7', 'FEQQ6U01', 'Positive'),
('am1099@student.le.ac.uk', 'Abdallah Menacer', 14, 'M', '42 Manston Mews', 'NG7', 'FEQQ6U02', 'Positive'),
('amine@amine.com', 'amine 2', 65, 'M', '42 Manston Mews', 'NG6', 'FEQQ6U03', 'Positive'),
('gotach@coriel.co.uk', 'riyadh 2', 34, 'M', '42 Manston Mews', 'NG5', 'FEQQ6U04', 'Positive'),
('madrid@barca.win', 'madrid best', 69, 'Other', 'acsa 12', 'NG7', 'FEQQ6U15', 'Positive'),
('riyadh.menacer@cASC.uk', 'riyadh ASD', 85, 'M', '42 Manston Mews', 'NG5', 'FEQQ6U12', 'Positive'),
('riyadh@riyadh.com', 'Mohamed Riyadh', 26, 'M', '18 Sucking Road', 'NG9', 'FEQQ6U17', 'Positive'),
('riyanacer@coriel.co.uk', 'riyadh ADSSAD', 49, 'M', '42 Manston Mews', 'NG7', 'CB8FBCCM', 'Negative'),
('riycer@coriel.co.uk', 'riyadh ACASCA', 87, 'Other', '42 Manston Mews', 'NG6', '57UBS5J6', 'Negative'),
('test2@ABZ5.uk', 'test2 SACSA', 16, 'Other', '53 test2', 'NG8', 'FEQQ6U13', 'Positive'),
('test3@test3.uk', 'test3 3w', 56, 'F', '53 test2', 'NG8', 'R9KZ2NXL', 'Positive'),
('uhffsd@fds.com', 'Abdallah Mencaer', 20, 'M', '18 cockington road', 'NG6', 'FEQQ6U18', 'Negative');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Username`);

--
-- Indexes for table `hometestkit`
--
ALTER TABLE `hometestkit`
  ADD PRIMARY KEY (`TNN_Code`);

--
-- Indexes for table `testresult`
--
ALTER TABLE `testresult`
  ADD PRIMARY KEY (`Email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
