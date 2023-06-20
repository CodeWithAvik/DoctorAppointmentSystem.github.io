-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2022 at 07:04 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_healthcare`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `icAdmin` int(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `adminFirstName` varchar(200) NOT NULL,
  `adminLastName` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`icAdmin`, `password`, `adminFirstName`, `adminLastName`) VALUES
(100, '100', 'Dr. Arindam', 'Bagchi');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appId` int(3) NOT NULL,
  `patientIc` bigint(12) NOT NULL,
  `scheduleId` int(10) NOT NULL,
  `appSymptom` varchar(100) NOT NULL,
  `appComment` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'process'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `icDoctor` bigint(12) NOT NULL,
  `password` varchar(20) NOT NULL,
  `doctorFirstName` varchar(50) NOT NULL,
  `doctorLastName` varchar(50) NOT NULL,
  `doctorEmail` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`icDoctor`, `password`, `doctorFirstName`, `doctorLastName`, `doctorEmail`) VALUES
(111, '111', 'Dr.Alok', 'Sen', 'alok@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `doctorschedule`
--

CREATE TABLE `doctorschedule` (
  `scheduleId` int(11) NOT NULL,
  `scheduleDate` date NOT NULL,
  `scheduleDay` varchar(15) NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `bookAvail` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctorschedule`
--

INSERT INTO `doctorschedule` (`scheduleId`, `scheduleDate`, `scheduleDay`, `startTime`, `endTime`, `bookAvail`) VALUES
(40, '2022-12-25', 'Saturday', '09:00:00', '10:00:00', 'available'),
(41, '2022-12-26', 'Sunday', '10:00:00', '11:00:00', 'available'),
(42, '2022-12-27', 'Monday', '11:00:00', '12:00:00', 'available'),
(43, '2022-12-28', 'Wednessday', '11:00:00', '12:00:00', 'available'),
(44, '2022-12-29', 'Thursday', '01:00:00', '02:00:00', 'available'),
(46, '2022-12-30', 'Friday', '09:00:00', '10:00:00', 'available'),
(47, '2022-12-31', 'Saturday', '09:00:00', '10:00:00', 'available'),
(48, '2023-01-01', 'Sunday', '09:00:00', '10:00:00', 'available'),
(49, '2023-01-02', 'Monday', '09:00:00', '10:00:00', 'available'),
(50, '2023-01-03', 'Tuesday', '09:00:00', '10:00:00', 'available'),
(51, '2023-01-04', 'Wednesday', '09:00:00', '10:00:00', 'available'),
(52, '2023-01-05', 'Thursday', '09:00:00', '10:00:00', 'available'),
(53, '2023-01-06', 'Friday', '09:00:00', '10:00:00', 'available'),
(54, '2023-01-07', 'Saturday', '09:00:00', '10:00:00', 'available'),
(55, '2023-01-08', 'Sunday', '09:00:00', '10:00:00', 'available'),
(56, '2023-01-09', 'Monday', '09:00:00', '10:00:00', 'available'),
(57, '2023-01-10', 'Tuesday', '09:00:00', '10:00:00', 'available'),
(58, '2023-01-11', 'Wednesday', '09:00:00', '10:00:00', 'available'),
(59, '2023-01-12', 'Thursday', '09:00:00', '10:00:00', 'available'),
(60, '2023-01-13', 'Friday', '09:00:00', '10:00:00', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `icPatient` bigint(12) NOT NULL,
  `password` varchar(20) NOT NULL,
  `patientFirstName` varchar(20) NOT NULL,
  `patientLastName` varchar(20) NOT NULL,
  `patientDOB` date NOT NULL,
  `patientGender` varchar(10) NOT NULL,
  `patientEmail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`icPatient`, `password`, `patientFirstName`, `patientLastName`, `patientDOB`, `patientGender`, `patientEmail`) VALUES
(999, '999', 'Avik', 'Chakraborty', '2002-11-25', 'male', 'ac@gmail.com'),
(9674, '9674', 'Aananta', 'Das', '1990-12-18', 'male', 'ad@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`icAdmin`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appId`),
  ADD UNIQUE KEY `scheduleId_2` (`scheduleId`),
  ADD KEY `patientIc` (`patientIc`),
  ADD KEY `scheduleId` (`scheduleId`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`icDoctor`);

--
-- Indexes for table `doctorschedule`
--
ALTER TABLE `doctorschedule`
  ADD PRIMARY KEY (`scheduleId`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`icPatient`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appId` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `doctorschedule`
--
ALTER TABLE `doctorschedule`
  MODIFY `scheduleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_4` FOREIGN KEY (`patientIc`) REFERENCES `patient` (`icPatient`),
  ADD CONSTRAINT `appointment_ibfk_5` FOREIGN KEY (`scheduleId`) REFERENCES `doctorschedule` (`scheduleId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
