-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2020 at 08:14 PM
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
-- Database: `speedo_tours`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogposts`
--

CREATE TABLE `blogposts` (
  `PostID` int(11) NOT NULL,
  `EmployeeID` int(11) NOT NULL,
  `PostTitle` varchar(255) NOT NULL,
  `PostMonth` varchar(255) NOT NULL,
  `PostYear` varchar(255) NOT NULL,
  `PostText` text NOT NULL,
  `Suspended` set('Enabled','Disabled') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `EmployeeID` int(11) NOT NULL,
  `Name` varchar(60) NOT NULL,
  `JobType` set('ADMIN','SUPPORT','TOURGUIDE') NOT NULL,
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
  `Gender` set('MALE','FEMALE') NOT NULL,
  `Age` int(3) NOT NULL,
  `NationalID` int(11) NOT NULL,
  `PassportNumber` int(9) NOT NULL,
  `Phone` int(11) NOT NULL,
  `City` varchar(15) NOT NULL,
  `Country` varchar(15) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `BankAccount` int(20) NOT NULL,
  `Suspended` set('Enabled','Disabled') NOT NULL DEFAULT 'Enabled',
  `Image` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `HotelID` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `NumberofRooms` int(11) NOT NULL,
  `overview` varchar(140) NOT NULL,
  `description` mediumtext NOT NULL,
  `WiFI` set('TRUE','FALSE') NOT NULL,
  `Swimming_Pool` set('TRUE','FALSE') NOT NULL,
  `Spa` set('TRUE','FALSE') NOT NULL,
  `Gym` set('TRUE','FALSE') NOT NULL,
  `Bar` set('TRUE','FALSE') NOT NULL,
  `Restaurant` set('TRUE','FALSE') NOT NULL,
  `Pets` set('TRUE','FALSE') NOT NULL,
  `featured` set('feature','header','false') NOT NULL DEFAULT 'false',
  `FeaturedMainSilder` set('TRUE','FALSE') NOT NULL,
  `Suspended` set('Enabled','Disabled') NOT NULL DEFAULT 'Enabled',
  `location` varchar(20) NOT NULL,
  `PriceSingle` int(11) NOT NULL,
  `PriceDouble` int(11) NOT NULL,
  `PriceTriple` int(11) NOT NULL,
  `PriceSuites` int(11) NOT NULL,
  `stars` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `InquiryID` int(11) NOT NULL,
  `Email` text NOT NULL,
  `Author` text NOT NULL,
  `Inquiry` text NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Suspended` set('Disabled','Enabled') NOT NULL DEFAULT 'Disabled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `inquiryhistory`
--

CREATE TABLE `inquiryhistory` (
  `InquiryID` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `EmployeeID` int(11) NOT NULL,
  `InquiryAuthor` text NOT NULL,
  `InquiryEmail` text NOT NULL,
  `Inquiry` text NOT NULL,
  `reply` text NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `ID` int(11) NOT NULL,
  `EmpID` int(11) NOT NULL,
  `GuestID` int(11) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `newswire`
--

CREATE TABLE `newswire` (
  `ID` int(11) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `TimeStamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `newswirehistory`
--

CREATE TABLE `newswirehistory` (
  `MessageID` int(11) NOT NULL,
  `EmployeeID` int(11) NOT NULL,
  `Message` text NOT NULL,
  `Email` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `PackageID` int(11) NOT NULL,
  `CruiseID` int(11) DEFAULT NULL,
  `PackageName` varchar(60) NOT NULL,
  `ReserveLimit` int(11) NOT NULL,
  `HotelID` int(11) DEFAULT NULL,
  `Price` int(11) NOT NULL,
  `TourGuide` set('TRUE','FALSE') DEFAULT NULL,
  `Transportation` set('TRUE','FALSE') NOT NULL,
  `TouristMap` set('TRUE','FALSE') NOT NULL,
  `BoardType` set('Full','Half') NOT NULL,
  `NumberofDays` int(11) NOT NULL,
  `NumberofNights` int(11) NOT NULL,
  `Suspended` set('Enabled','Disabled') NOT NULL DEFAULT 'Enabled',
  `DateIn` date NOT NULL,
  `DateOut` date NOT NULL,
  `Overview` text NOT NULL,
  `Description` text NOT NULL
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
  `DateIn` date NOT NULL,
  `Suspended` set('Enabled','Disabled') NOT NULL DEFAULT 'Enabled',
  `DateOut` date DEFAULT NULL,
  `NoOfSingleRooms` int(11) NOT NULL,
  `NoOfDoubleRooms` int(11) NOT NULL,
  `NoOfTripleRooms` int(11) NOT NULL,
  `NoOfSuits` int(11) NOT NULL,
  `BoardType` set('Full','Half') NOT NULL,
  `price` int(11) NOT NULL,
  `Status` set('Waiting for approval','Approved and reserved','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `ReviewID` int(11) NOT NULL,
  `GuestID` int(11) DEFAULT NULL,
  `PackageID` int(11) DEFAULT NULL,
  `HotelID` int(11) DEFAULT NULL,
  `Review` text NOT NULL,
  `Featured` set('TRUE','FALSE') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `RoomID` int(11) NOT NULL,
  `RoomNumber` int(11) NOT NULL,
  `RoomType` set('Single','Double','Triple','Suites') NOT NULL,
  `Status` set('Free','Pending','Not') NOT NULL,
  `HotelID` int(11) DEFAULT NULL,
  `GuestID` int(11) DEFAULT NULL,
  `DateIn` date DEFAULT '2000-01-01',
  `DateOut` date DEFAULT '2000-01-01'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogposts`
--
ALTER TABLE `blogposts`
  ADD PRIMARY KEY (`PostID`),
  ADD KEY `EmployeeID` (`EmployeeID`);

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
  ADD KEY `Author` (`Author`(768)),
  ADD KEY `Email` (`Email`(768));

--
-- Indexes for table `inquiryhistory`
--
ALTER TABLE `inquiryhistory`
  ADD PRIMARY KEY (`InquiryID`),
  ADD KEY `EmployeeID` (`EmployeeID`),
  ADD KEY `ID` (`ID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `GuestID` (`GuestID`),
  ADD KEY `EmpID` (`EmpID`);

--
-- Indexes for table `newswire`
--
ALTER TABLE `newswire`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Email` (`Email`);

--
-- Indexes for table `newswirehistory`
--
ALTER TABLE `newswirehistory`
  ADD PRIMARY KEY (`MessageID`),
  ADD KEY `EmployeeID` (`EmployeeID`),
  ADD KEY `Email` (`Email`(191)),
  ADD KEY `Email_2` (`Email`(191)),
  ADD KEY `Email_3` (`Email`);

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
  ADD KEY `CruiseID` (`PackageID`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`RoomID`),
  ADD KEY `GuestID` (`GuestID`),
  ADD KEY `HotelID` (`HotelID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogposts`
--
ALTER TABLE `blogposts`
  MODIFY `PostID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `cruise`
--
ALTER TABLE `cruise`
  MODIFY `CruiseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `GuestID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `InquiryID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inquiryhistory`
--
ALTER TABLE `inquiryhistory`
  MODIFY `InquiryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `newswire`
--
ALTER TABLE `newswire`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `newswirehistory`
--
ALTER TABLE `newswirehistory`
  MODIFY `MessageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `PackageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reserves`
--
ALTER TABLE `reserves`
  MODIFY `ReserveID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `ReviewID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `RoomID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=592;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogposts`
--
ALTER TABLE `blogposts`
  ADD CONSTRAINT `blogposts_ibfk_1` FOREIGN KEY (`EmployeeID`) REFERENCES `employees` (`EmployeeID`);

--
-- Constraints for table `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `gallery_ibfk_1` FOREIGN KEY (`PackageId`) REFERENCES `packages` (`PackageID`),
  ADD CONSTRAINT `gallery_ibfk_2` FOREIGN KEY (`HotelId`) REFERENCES `hotel` (`HotelID`);

--
-- Constraints for table `inquiryhistory`
--
ALTER TABLE `inquiryhistory`
  ADD CONSTRAINT `inquiryhistory_ibfk_1` FOREIGN KEY (`EmployeeID`) REFERENCES `employees` (`EmployeeID`),
  ADD CONSTRAINT `inquiryhistory_ibfk_2` FOREIGN KEY (`ID`) REFERENCES `inquiries` (`InquiryID`);

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_2` FOREIGN KEY (`GuestID`) REFERENCES `guest` (`GuestID`),
  ADD CONSTRAINT `login_ibfk_3` FOREIGN KEY (`EmpID`) REFERENCES `employees` (`EmployeeID`);

--
-- Constraints for table `newswirehistory`
--
ALTER TABLE `newswirehistory`
  ADD CONSTRAINT `newswirehistory_ibfk_1` FOREIGN KEY (`EmployeeID`) REFERENCES `employees` (`EmployeeID`),
  ADD CONSTRAINT `newswirehistory_ibfk_2` FOREIGN KEY (`Email`) REFERENCES `newswire` (`Email`);

--
-- Constraints for table `packages`
--
ALTER TABLE `packages`
  ADD CONSTRAINT `packages_ibfk_2` FOREIGN KEY (`HotelID`) REFERENCES `hotel` (`HotelID`),
  ADD CONSTRAINT `packages_ibfk_3` FOREIGN KEY (`CruiseID`) REFERENCES `cruise` (`CruiseID`);

--
-- Constraints for table `reserves`
--
ALTER TABLE `reserves`
  ADD CONSTRAINT `reserves_ibfk_1` FOREIGN KEY (`GuestId`) REFERENCES `guest` (`GuestID`),
  ADD CONSTRAINT `reserves_ibfk_2` FOREIGN KEY (`HotelId`) REFERENCES `hotel` (`HotelID`),
  ADD CONSTRAINT `reserves_ibfk_3` FOREIGN KEY (`PackageId`) REFERENCES `packages` (`PackageID`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`GuestID`) REFERENCES `guest` (`GuestID`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`HotelID`) REFERENCES `hotel` (`HotelID`),
  ADD CONSTRAINT `reviews_ibfk_3` FOREIGN KEY (`PackageID`) REFERENCES `packages` (`PackageID`);

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_ibfk_1` FOREIGN KEY (`GuestID`) REFERENCES `guest` (`GuestID`),
  ADD CONSTRAINT `rooms_ibfk_2` FOREIGN KEY (`HotelID`) REFERENCES `hotel` (`HotelID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
