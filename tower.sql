-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2022 at 03:46 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tower`
--

-- --------------------------------------------------------

--
-- Table structure for table `band`
--

CREATE TABLE `band` (
  `ID` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `band`
--

INSERT INTO `band` (`ID`, `Name`) VALUES
(1, 'Dig'),
(2, 'acquisition'),
(3, 'Trasport');

-- --------------------------------------------------------

--
-- Table structure for table `civil`
--

CREATE TABLE `civil` (
  `ID` int(11) NOT NULL,
  `Band Name` varchar(255) NOT NULL,
  `Dimensions` int(11) NOT NULL,
  `Total Dimensions` int(11) NOT NULL,
  `Type` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Unit Price` int(11) NOT NULL,
  `Cost Per Gram` int(11) NOT NULL,
  `Total Band Expenses` int(11) NOT NULL,
  `Notes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `civil`
--

INSERT INTO `civil` (`ID`, `Band Name`, `Dimensions`, `Total Dimensions`, `Type`, `Quantity`, `Unit Price`, `Cost Per Gram`, `Total Band Expenses`, `Notes`) VALUES
(2, 'Transport for digging ', 0, 321, 3, 80, 75, 6000, 12000, '');

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `ID` int(200) NOT NULL,
  `Name` varchar(300) NOT NULL,
  `Price` int(200) NOT NULL,
  `Quantity` int(200) NOT NULL,
  `Total` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`ID`, `Name`, `Price`, `Quantity`, `Total`) VALUES
(1, 'Cement ', 280, 100, 28000),
(2, 'Sand', 150, 50, 7500);

-- --------------------------------------------------------

--
-- Table structure for table `material with measurements`
--

CREATE TABLE `material with measurements` (
  `ID` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Unitid` int(200) NOT NULL,
  `Price` int(200) NOT NULL,
  `Quantity` int(200) NOT NULL,
  `Total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `material with measurements`
--

INSERT INTO `material with measurements` (`ID`, `Name`, `Unitid`, `Price`, `Quantity`, `Total`) VALUES
(4, 'isolated nail', 1, 50, 2, 100);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `PayID` int(11) NOT NULL,
  `Phase` int(5) NOT NULL,
  `AdminID` int(11) NOT NULL,
  `TowerID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `statement type`
--

CREATE TABLE `statement type` (
  `Statement ID` int(11) NOT NULL,
  `Statement Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `statement type`
--

INSERT INTO `statement type` (`Statement ID`, `Statement Name`) VALUES
(1, 'Transfers');

-- --------------------------------------------------------

--
-- Table structure for table `tower info`
--

CREATE TABLE `tower info` (
  `ID` int(15) NOT NULL,
  `AdminID` int(11) NOT NULL,
  `Name` varchar(150) NOT NULL,
  `Address` varchar(300) NOT NULL,
  `Phase` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tower info`
--

INSERT INTO `tower info` (`ID`, `AdminID`, `Name`, `Address`, `Phase`) VALUES
(50, 174761, 'it me', 'ikive here', 2),
(100, 174761, 'ppppppp', '6 of October city District 5', 0),
(534, 174761, 'heheh', 'dsdsadsaa', 0),
(654, 174761, 'ana gamed gedan', 'dsadsadsa', 0);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `ID` int(200) NOT NULL,
  `Name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`ID`, `Name`) VALUES
(1, 'Meter'),
(2, 'roll');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(15) NOT NULL,
  `FullName` varchar(200) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Phone` varchar(200) NOT NULL,
  `userType` int(10) NOT NULL,
  `Address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `FullName`, `Email`, `Phone`, `userType`, `Address`) VALUES
(174761, 'Shaymaa SalahEldin', 'mmhem@fndsfn.com', '01069870019', 1, '5 pringles street 3334'),
(176789, 'amina hassan', 'sisisis@hehehe.com', '01068461551', 1, 'skrrr street 65465');

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `UserID` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`UserID`, `name`) VALUES
(1, 'Admin'),
(2, 'Accountant');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `band`
--
ALTER TABLE `band`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `civil`
--
ALTER TABLE `civil`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Type` (`Type`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `material with measurements`
--
ALTER TABLE `material with measurements`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Unitid` (`Unitid`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PayID`),
  ADD KEY `ReceiverID` (`AdminID`),
  ADD KEY `TowerID` (`TowerID`),
  ADD KEY `AdminID` (`AdminID`);

--
-- Indexes for table `statement type`
--
ALTER TABLE `statement type`
  ADD PRIMARY KEY (`Statement ID`);

--
-- Indexes for table `tower info`
--
ALTER TABLE `tower info`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `AdminID` (`AdminID`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD KEY `userType` (`userType`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `band`
--
ALTER TABLE `band`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `civil`
--
ALTER TABLE `civil`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `ID` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `material with measurements`
--
ALTER TABLE `material with measurements`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `PayID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `statement type`
--
ALTER TABLE `statement type`
  MODIFY `Statement ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `ID` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `civil`
--
ALTER TABLE `civil`
  ADD CONSTRAINT `civil_ibfk_1` FOREIGN KEY (`Type`) REFERENCES `band` (`ID`);

--
-- Constraints for table `material with measurements`
--
ALTER TABLE `material with measurements`
  ADD CONSTRAINT `material with measurements_ibfk_1` FOREIGN KEY (`Unitid`) REFERENCES `units` (`ID`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`AdminID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`TowerID`) REFERENCES `tower info` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tower info`
--
ALTER TABLE `tower info`
  ADD CONSTRAINT `tower info_ibfk_1` FOREIGN KEY (`AdminID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`userType`) REFERENCES `usertype` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
