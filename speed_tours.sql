-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2020 at 09:56 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `speedtours_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `cruise`
--

CREATE TABLE `cruise` (
  `CruiseID` int(11) NOT NULL,
  `CruiseName` varchar(30) NOT NULL,
  `NumberofCabins` int(11) NOT NULL,
  `Captain` varchar(50) NOT NULL,
  `Pets` set('TRUE','FALSE') NOT NULL,
  `Fishing` set('TRUE','FALSE') NOT NULL,
  `SunBathing` set('TRUE','FALSE') NOT NULL,
  `Pool` set('TRUE','FALSE') NOT NULL,
  `Suspended` set('Enabled','Disabled') NOT NULL DEFAULT 'Enabled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cruise`
--

INSERT INTO `cruise` (`CruiseID`, `CruiseName`, `NumberofCabins`, `Captain`, `Pets`, `Fishing`, `SunBathing`, `Pool`, `Suspended`) VALUES
(1, 'RMS Titanic', 2, 'Edward Smith', 'TRUE', 'TRUE', '', 'TRUE', 'Enabled');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `EmployeeID` int(11) NOT NULL,
  `Name` varchar(60) NOT NULL,
  `JobType` set('ADMIN','SUPPORT') NOT NULL,
  `Email` varchar(60) NOT NULL,
  `Username` varchar(60) NOT NULL,
  `Password` varchar(60) NOT NULL,
  `Suspended` set('Enabled','Disabled') NOT NULL DEFAULT 'Enabled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `PictureId` int(11) NOT NULL,
  `PackageId` int(11) DEFAULT NULL,
  `HotelId` int(11) DEFAULT NULL,
  `picture` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `GuestID` int(11) NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `Age` int(3) NOT NULL,
  `NationalID` int(11) NOT NULL,
  `PassportNumber` int(9) NOT NULL,
  `City` varchar(15) NOT NULL,
  `Country` varchar(15) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `BankAccount` int(20) NOT NULL,
  `Suspended` set('Enabled','Disabled') NOT NULL DEFAULT 'Enabled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `HotelID` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `NumberofRooms` int(11) NOT NULL,
  `WiFI` set('TRUE','FALSE') NOT NULL,
  `Swimming Pool` set('TRUE','FALSE') NOT NULL,
  `RESORT` set('TRUE','FALSE') NOT NULL,
  `GYM` set('TRUE','FALSE') NOT NULL,
  `Full_Board` set('TRUE','FALSE') NOT NULL,
  `Half_Board` set('TRUE','FALSE') NOT NULL,
  `Pets` set('TRUE','FALSE') NOT NULL,
  `Suspended` set('Enabled','Disabled') NOT NULL DEFAULT 'Enabled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`HotelID`, `Name`, `NumberofRooms`, `WiFI`, `Swimming Pool`, `RESORT`, `GYM`, `Full_Board`, `Half_Board`, `Pets`, `Suspended`) VALUES
(1, 'Ritz Carlton', 500, 'TRUE', 'TRUE', 'TRUE', 'TRUE', 'TRUE', 'TRUE', 'TRUE', 'Enabled');

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `InquiryID` int(11) NOT NULL,
  `EmployeeID` int(11) NOT NULL,
  `Inquiry` varchar(600) NOT NULL,
  `TimeStamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `LanguageID` int(11) NOT NULL,
  `Employee ID` int(11) NOT NULL,
  `LanguageName` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `newswire`
--

CREATE TABLE `newswire` (
  `ID` int(11) NOT NULL,
  `Email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `newswirehistory`
--

CREATE TABLE `newswirehistory` (
  `ArticleID` int(11) NOT NULL,
  `EmployeeID` int(11) NOT NULL,
  `ArticleName` varchar(300) NOT NULL,
  `Article` text NOT NULL,
  `NewWireID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `PackageID` int(11) NOT NULL,
  `PackageName` varchar(60) NOT NULL,
  `ReserveLimit` int(11) NOT NULL,
  `HotelID` int(11) NOT NULL,
  `CruiseID` int(11) NOT NULL,
  `Price` int(11) NOT NULL,
  `TourGuideLeader` varchar(60) NOT NULL,
  `Transportation` set('TRUE','FALSE') NOT NULL,
  `NumberofDays` int(11) NOT NULL,
  `NumberofNights` int(11) NOT NULL,
  `DateIn` int(11) NOT NULL,
  `DateOut` int(11) NOT NULL,
  `Suspended` set('Enabled','Disabled') DEFAULT 'Enabled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reserves`
--

CREATE TABLE `reserves` (
  `ReserveID` int(11) NOT NULL,
  `GuestId` int(11) DEFAULT NULL,
  `PackageId` int(11) DEFAULT NULL,
  `HotelId` int(11) DEFAULT NULL,
  `NoofChildren` int(11) NOT NULL,
  `NoofAdults` int(11) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp(),
  `Suspended` set('Enabled','Disabled') NOT NULL DEFAULT 'Enabled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `ReviewID` int(11) NOT NULL,
  `GuestID` int(11) NOT NULL,
  `HotelID` int(11) NOT NULL,
  `CruiseID` int(11) NOT NULL,
  `Review` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `RoomID` int(11) NOT NULL,
  `RoomNumber` int(11) NOT NULL,
  `RoomType` set('Single','Double','Triple','Royal','Bridal') NOT NULL,
  `Status` set('Free','Not') NOT NULL,
  `HotelID` int(11) NOT NULL,
  `GuestID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stops`
--

CREATE TABLE `stops` (
  `StopsID` int(11) NOT NULL,
  `StopNumber` int(11) NOT NULL,
  `StopName` varchar(60) NOT NULL,
  `CruiseID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `visits`
--

CREATE TABLE `visits` (
  `VisitID` int(11) NOT NULL,
  `NameLocation` varchar(60) NOT NULL,
  `VisitDay` int(11) NOT NULL,
  `PackageID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cruise`
--
ALTER TABLE `cruise`
  ADD PRIMARY KEY (`CruiseID`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`EmployeeID`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`PictureId`),
  ADD KEY `PackageId` (`PackageId`),
  ADD KEY `HotelId` (`HotelId`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`GuestID`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`HotelID`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`InquiryID`),
  ADD KEY `EmployeeID` (`EmployeeID`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`LanguageID`),
  ADD KEY `Employee ID` (`Employee ID`);

--
-- Indexes for table `newswire`
--
ALTER TABLE `newswire`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `newswirehistory`
--
ALTER TABLE `newswirehistory`
  ADD PRIMARY KEY (`ArticleID`),
  ADD KEY `EmployeeID` (`EmployeeID`),
  ADD KEY `NewWireID` (`NewWireID`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`PackageID`),
  ADD KEY `HotelID` (`HotelID`),
  ADD KEY `CruiseID` (`CruiseID`);

--
-- Indexes for table `reserves`
--
ALTER TABLE `reserves`
  ADD PRIMARY KEY (`ReserveID`),
  ADD KEY `GuestId` (`GuestId`),
  ADD KEY `HotelId` (`HotelId`),
  ADD KEY `PackageId` (`PackageId`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`ReviewID`),
  ADD KEY `GuestID` (`GuestID`),
  ADD KEY `HotelID` (`HotelID`),
  ADD KEY `CruiseID` (`CruiseID`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`RoomID`),
  ADD KEY `GuestID` (`GuestID`),
  ADD KEY `HotelID` (`HotelID`);

--
-- Indexes for table `stops`
--
ALTER TABLE `stops`
  ADD PRIMARY KEY (`StopsID`),
  ADD KEY `CruiseID` (`CruiseID`);

--
-- Indexes for table `visits`
--
ALTER TABLE `visits`
  ADD PRIMARY KEY (`VisitID`),
  ADD KEY `PackageID` (`PackageID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cruise`
--
ALTER TABLE `cruise`
  MODIFY `CruiseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `EmployeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `PictureId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `GuestID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `HotelID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `InquiryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `LanguageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `newswirehistory`
--
ALTER TABLE `newswirehistory`
  MODIFY `ArticleID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `PackageID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `ReviewID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `RoomID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stops`
--
ALTER TABLE `stops`
  MODIFY `StopsID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visits`
--
ALTER TABLE `visits`
  MODIFY `VisitID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`EmployeeID`) REFERENCES `inquiries` (`EmployeeID`);

--
-- Constraints for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD CONSTRAINT `inquiries_ibfk_1` FOREIGN KEY (`EmployeeID`) REFERENCES `employees` (`EmployeeID`);

--
-- Constraints for table `languages`
--
ALTER TABLE `languages`
  ADD CONSTRAINT `languages_ibfk_1` FOREIGN KEY (`Employee ID`) REFERENCES `employees` (`EmployeeID`);

--
-- Constraints for table `newswirehistory`
--
ALTER TABLE `newswirehistory`
  ADD CONSTRAINT `newswirehistory_ibfk_1` FOREIGN KEY (`EmployeeID`) REFERENCES `employees` (`EmployeeID`),
  ADD CONSTRAINT `newswirehistory_ibfk_2` FOREIGN KEY (`NewWireID`) REFERENCES `newswire` (`ID`);

--
-- Constraints for table `packages`
--
ALTER TABLE `packages`
  ADD CONSTRAINT `packages_ibfk_1` FOREIGN KEY (`CruiseID`) REFERENCES `cruise` (`CruiseID`),
  ADD CONSTRAINT `packages_ibfk_2` FOREIGN KEY (`HotelID`) REFERENCES `hotel` (`HotelID`);

--
-- Constraints for table `reserves`
--
ALTER TABLE `reserves`
  ADD CONSTRAINT `reserves_ibfk_1` FOREIGN KEY (`GuestId`) REFERENCES `guest` (`GuestID`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`GuestID`) REFERENCES `guest` (`GuestID`),
  ADD CONSTRAINT `reviews_ibfk_3` FOREIGN KEY (`CruiseID`) REFERENCES `cruise` (`CruiseID`),
  ADD CONSTRAINT `reviews_ibfk_4` FOREIGN KEY (`HotelID`) REFERENCES `hotel` (`HotelID`);

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_ibfk_2` FOREIGN KEY (`HotelID`) REFERENCES `hotel` (`HotelID`),
  ADD CONSTRAINT `rooms_ibfk_3` FOREIGN KEY (`GuestID`) REFERENCES `guest` (`GuestID`);

--
-- Constraints for table `stops`
--
ALTER TABLE `stops`
  ADD CONSTRAINT `stops_ibfk_1` FOREIGN KEY (`CruiseID`) REFERENCES `cruise` (`CruiseID`);

--
-- Constraints for table `visits`
--
ALTER TABLE `visits`
  ADD CONSTRAINT `visits_ibfk_1` FOREIGN KEY (`PackageID`) REFERENCES `packages` (`PackageID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
