-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2020 at 04:24 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

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

--
-- Dumping data for table `blogposts`
--

INSERT INTO `blogposts` (`PostID`, `EmployeeID`, `PostTitle`, `PostMonth`, `PostYear`, `PostText`, `Suspended`) VALUES
(3, 3, 'Company Establishment', 'SEP', '1989', 'ahsbdhjdadvhuiwbvewjfw', 'Disabled'),
(4, 3, 'First Aniversairy', 'SEP', '1990', 'dkfnjwkfjkwbjekfjwebdfwed', 'Enabled'),
(12, 3, '10 Years of Speedo Tours   ', 'OCT', '1977', 'kgujgjglukglk kjbjkbkj\r\nahsijanoanoi', 'Enabled');

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
(4, 'RMS Titanic', 250, 'Edward Smith', 'TRUE', 'FALSE', 'FALSE', 'TRUE', 'Disabled'),
(5, 'RMS Olympic', 200, 'Walter White', 'TRUE', 'TRUE', 'TRUE', 'TRUE', 'Disabled');

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

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`EmployeeID`, `Name`, `JobType`, `Email`, `Username`, `Password`, `Suspended`) VALUES
(3, 'John Doe', 'ADMIN', 'test@test', 'test', 'test', 'Enabled'),
(4, 'Al Pacino', 'SUPPORT', 'test1@test1', 'test1', 'test1', 'Enabled');

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
  `Suspended` set('Enabled','Disabled') NOT NULL DEFAULT 'Enabled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`GuestID`, `FirstName`, `LastName`, `Gender`, `Age`, `NationalID`, `PassportNumber`, `Phone`, `City`, `Country`, `Email`, `Username`, `Password`, `BankAccount`, `Suspended`) VALUES
(1, 'Robert', 'Deniro', 'MALE', 60, 2020, 9999, 17822676, 'Corleone', 'Italy', 'khaled1701294@miuegypt.edu.eg', 'test', 'test', 2112, 'Enabled'),
(2, 'Sean', 'Connery', 'MALE', 75, 0, 0, 126867, 'London', 'England', 'ramez1700124@miuegypt.edu.eg', 'ramez', 'test', 0, 'Enabled');

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
  `PriceSuites` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`HotelID`, `Name`, `NumberofRooms`, `overview`, `description`, `WiFI`, `Swimming_Pool`, `Spa`, `Gym`, `Bar`, `Restaurant`, `Pets`, `featured`, `FeaturedMainSilder`, `Suspended`, `location`, `PriceSingle`, `PriceDouble`, `PriceTriple`, `PriceSuites`) VALUES
(1, 'Ritz Carlton', 500, 'This is a simple overview.the data here can be changed by the admin.the data he This is a simple overview.the data here can be changed by th', 'Rtiz is in france', 'TRUE', 'TRUE', 'TRUE', 'TRUE', 'FALSE', 'TRUE', 'TRUE', 'feature', 'TRUE', 'Disabled', 'Paris,France', 500, 600, 700, 800),
(3, 'winter palace hotel', 2000, 'This is a simple overview.the data here can be changed by the admin.the data he This is a simple overview.the data here can be changed by th', '', 'TRUE', 'TRUE', 'TRUE', 'TRUE', '', 'TRUE', 'TRUE', 'header', 'FALSE', 'Disabled', 'Luxor,Egypt', 0, 0, 0, 0),
(4, 'sheraton', 900, 'This is a simple overview.the data here can be changed by the admin.the data he This is a simple overview.the data here can be changed by th', '', 'TRUE', 'TRUE', 'TRUE', 'TRUE', '', 'FALSE', 'TRUE', 'false', 'TRUE', 'Disabled', 'Luxor,Egypt', 0, 0, 0, 0),
(5, 'bloomberg hotel', 300, 'This is a simple overview.the data here can be changed by the admin.the data he This is a simple overview.the data here can be changed by th', '', 'TRUE', 'TRUE', 'TRUE', 'TRUE', 'TRUE', 'TRUE', 'TRUE', 'false', 'TRUE', 'Enabled', 'London,England', 0, 0, 0, 0),
(6, ' new hotelsasdfas', 3999, ' dsafsdfa ', '   atafadsfasd ', 'TRUE', 'TRUE', 'FALSE', 'FALSE', 'TRUE', 'TRUE', 'TRUE', 'false', 'FALSE', 'Enabled', 'Havana,Cuba', 0, 0, 0, 0),
(7, 'Emillio', 8, 'overview', 'emilio hotel', 'FALSE', 'FALSE', 'TRUE', 'FALSE', 'TRUE', 'FALSE', 'FALSE', 'feature', 'FALSE', 'Disabled', 'Luxor,Egypt', 0, 0, 0, 0),
(8, 'test', 8, 'test', 'test', 'TRUE', 'FALSE', 'FALSE', 'FALSE', 'TRUE', 'TRUE', 'FALSE', 'false', 'FALSE', 'Disabled', 'test', 0, 0, 0, 0),
(9, 'test15', 4, 'elshanselsel', 'elshanselsel', 'FALSE', 'TRUE', 'FALSE', 'TRUE', 'TRUE', 'TRUE', 'FALSE', 'false', 'FALSE', 'Disabled', 'embaba', 0, 0, 0, 0),
(10, 'test161', 11, 'test', 'test', 'TRUE', 'FALSE', 'TRUE', 'FALSE', 'FALSE', 'TRUE', 'TRUE', 'false', 'FALSE', 'Disabled', 'tests', 166, 200, 300, 400);

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `InquiryID` int(11) NOT NULL,
  `Author` varchar(12) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Inquiry` varchar(600) NOT NULL,
  `TimeStamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inquiries`
--

INSERT INTO `inquiries` (`InquiryID`, `Author`, `Email`, `Inquiry`, `TimeStamp`) VALUES
(4, 'asbkjabf', 'adfakuf@jsbafkb.com', 'asdgagg', '2020-04-24 17:41:05'),
(5, 'Ramez', 'ramez1700124.miuegypt.edu.eg', 'DgdgDGsdgD', '2020-04-24 17:42:31'),
(44, 'Ramez', 'ramez1700124@miuegypt.edu.eg', 'asaddaa', '2020-04-24 19:56:58'),
(45, 'Ramez', 'ramez1700124@miuegypt.edu.eg', 'sdsfss', '2020-04-24 19:58:59'),
(46, 'Ramez', 'ramez1700124@miuegypt.edu.eg', 'sgsgdgdg', '2020-04-25 14:32:51');

-- --------------------------------------------------------

--
-- Table structure for table `inquiryhistory`
--

CREATE TABLE `inquiryhistory` (
  `InquiryID` int(11) NOT NULL,
  `EmployeeID` int(11) NOT NULL,
  `Inquiry` text NOT NULL,
  `reply` text NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inquiryhistory`
--

INSERT INTO `inquiryhistory` (`InquiryID`, `EmployeeID`, `Inquiry`, `reply`, `Timestamp`) VALUES
(3, 4, 'some text', 'adsgasga', '2020-04-24 19:36:20');

-- --------------------------------------------------------

--
-- Table structure for table `newswire`
--

CREATE TABLE `newswire` (
  `ID` int(11) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `TimeStamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newswire`
--

INSERT INTO `newswire` (`ID`, `Email`, `TimeStamp`) VALUES
(2, 'ahmed.mahdy1899@gmail.com', '2020-04-22 18:16:21'),
(3, 'Ramez1700124@miuegypt.edu.eg', '2020-04-22 18:16:21'),
(4, 'adfadfkb@hotmail.com', '2020-04-24 17:41:56');

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
  `DateIn` date NOT NULL DEFAULT current_timestamp(),
  `DateOut` date NOT NULL DEFAULT current_timestamp(),
  `Overview` text NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`PackageID`, `CruiseID`, `PackageName`, `ReserveLimit`, `HotelID`, `Price`, `TourGuide`, `Transportation`, `TouristMap`, `BoardType`, `NumberofDays`, `NumberofNights`, `Suspended`, `DateIn`, `DateOut`, `Overview`, `Description`) VALUES
(3, 4, 'Rome/Milano', 100, 4, 1000, 'FALSE', 'FALSE', 'FALSE', 'Full', 10, 11, 'Disabled', '2020-04-22', '2020-05-07', 'Overview test', 'asd'),
(4, 5, 'Around Europe    ', 40, 7, 500, 'FALSE', 'FALSE', 'TRUE', 'Full', 5, 6, 'Disabled', '2020-04-14', '2020-05-28', 'text', 'testing desc    '),
(15, 5, 'Around Egypt ', 25, 7, 20000, 'FALSE', 'FALSE', 'FALSE', 'Half', 15, 14, 'Disabled', '2020-04-29', '2020-05-29', 'test', ' We will take you around imbaba and el houssain '),
(26, NULL, 'test123', 1, 4, 1000, 'FALSE', 'FALSE', 'FALSE', 'Full', 1, 1, 'Disabled', '2020-04-20', '2020-04-21', 'test', 'test'),
(27, NULL, 'be5', 1521, 4, 15215, 'TRUE', 'TRUE', 'FALSE', 'Full', 124, 123, 'Disabled', '2020-04-22', '2020-04-30', 'twa', 'twa'),
(28, NULL, '99test', 51251, 3, 1525125, 'FALSE', 'FALSE', 'FALSE', 'Full', 234, 125, 'Disabled', '2020-04-13', '2020-04-22', 'test', 'test');

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
  `DateIn` timestamp NOT NULL DEFAULT current_timestamp(),
  `Suspended` set('Enabled','Disabled') NOT NULL DEFAULT 'Enabled',
  `DateOut` timestamp NULL DEFAULT NULL,
  `NoOfSingleRooms` int(11) NOT NULL,
  `NoOfDoubleRooms` int(11) NOT NULL,
  `NoOfTripleRooms` int(11) NOT NULL,
  `NoOfSuits` int(11) NOT NULL,
  `BoardType` set('Full','Half') NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reserves`
--

INSERT INTO `reserves` (`ReserveID`, `GuestId`, `PackageId`, `HotelId`, `NoofChildren`, `NoofAdults`, `DateIn`, `Suspended`, `DateOut`, `NoOfSingleRooms`, `NoOfDoubleRooms`, `NoOfTripleRooms`, `NoOfSuits`, `BoardType`, `price`) VALUES
(1, 1, NULL, 1, 65, 2, '2020-03-03 00:00:00', 'Disabled', '2020-04-29 22:00:00', 0, 0, 0, 0, 'Full', 0),
(2, 2, 3, NULL, 0, 0, '0000-00-00 00:00:00', 'Disabled', NULL, 3, 1, 1, 1, 'Half', 0),
(3, 1, NULL, 3, 5, 2, '2020-04-27 22:00:00', 'Enabled', '2020-04-29 22:00:00', 1, 2, 0, 0, 'Half', 0);

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

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`ReviewID`, `GuestID`, `PackageID`, `HotelID`, `Review`, `Featured`) VALUES
(1, 1, 3, NULL, 'I Was Happy to visit Egypt with Speedo Tours', 'TRUE'),
(2, 2, NULL, 3, 'Winter Palace Hotel in luxor is magnificent', 'TRUE'),
(3, 1, NULL, 1, 'Ritz Carlton Hotel is real deal in france', 'FALSE'),
(4, 1, 4, NULL, 'This Package Made me in love with europe', 'TRUE');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `RoomID` int(11) NOT NULL,
  `RoomNumber` int(11) NOT NULL,
  `RoomType` set('Single','Double','Triple','Suites') NOT NULL,
  `Status` set('Free','Not') NOT NULL,
  `HotelID` int(11) DEFAULT NULL,
  `GuestID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`RoomID`, `RoomNumber`, `RoomType`, `Status`, `HotelID`, `GuestID`) VALUES
(200, 1, 'Single', 'Free', 7, NULL),
(201, 2, 'Single', 'Free', 7, NULL),
(202, 3, 'Double', 'Free', 7, NULL),
(203, 4, 'Double', 'Free', 7, NULL),
(204, 5, 'Triple', 'Free', 7, NULL),
(205, 6, 'Triple', 'Free', 7, NULL),
(206, 7, 'Suites', 'Free', 7, NULL),
(207, 8, 'Suites', 'Free', 7, NULL),
(208, 1, 'Single', 'Free', 8, NULL),
(209, 2, 'Single', 'Free', 8, NULL),
(210, 3, 'Double', 'Free', 8, NULL),
(211, 4, 'Double', 'Free', 8, NULL),
(212, 5, 'Triple', 'Free', 8, NULL),
(213, 6, 'Triple', 'Free', 8, NULL),
(214, 7, 'Suites', 'Free', 8, NULL),
(215, 8, 'Suites', 'Free', 8, NULL),
(216, 1, 'Single', 'Free', 9, NULL),
(217, 2, 'Double', 'Free', 9, NULL),
(218, 3, 'Triple', 'Free', 9, NULL),
(219, 4, 'Suites', 'Free', 9, NULL),
(220, 1, 'Single', 'Free', 10, NULL),
(221, 2, 'Single', 'Free', 10, NULL),
(222, 3, 'Double', 'Free', 10, NULL),
(223, 4, 'Double', 'Free', 10, NULL),
(224, 5, 'Triple', 'Free', 10, NULL),
(225, 6, 'Triple', 'Free', 10, NULL),
(226, 7, 'Triple', 'Free', 10, NULL),
(227, 8, 'Suites', 'Free', 10, NULL),
(228, 9, 'Suites', 'Free', 10, NULL),
(229, 10, 'Suites', 'Free', 10, NULL),
(230, 11, 'Suites', 'Free', 10, NULL);

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
  ADD PRIMARY KEY (`InquiryID`);

--
-- Indexes for table `inquiryhistory`
--
ALTER TABLE `inquiryhistory`
  ADD PRIMARY KEY (`InquiryID`),
  ADD KEY `EmployeeID` (`EmployeeID`);

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
  ADD KEY `Email_2` (`Email`(191));

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
  MODIFY `GuestID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `InquiryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `inquiryhistory`
--
ALTER TABLE `inquiryhistory`
  MODIFY `InquiryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `newswire`
--
ALTER TABLE `newswire`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `newswirehistory`
--
ALTER TABLE `newswirehistory`
  MODIFY `MessageID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `PackageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `reserves`
--
ALTER TABLE `reserves`
  MODIFY `ReserveID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `ReviewID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `RoomID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=231;

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
  ADD CONSTRAINT `inquiryhistory_ibfk_1` FOREIGN KEY (`EmployeeID`) REFERENCES `employees` (`EmployeeID`);

--
-- Constraints for table `packages`
--
ALTER TABLE `packages`
  ADD CONSTRAINT `packages_ibfk_2` FOREIGN KEY (`HotelID`) REFERENCES `hotel` (`HotelID`),
  ADD CONSTRAINT `packages_ibfk_3` FOREIGN KEY (`CruiseID`) REFERENCES `cruise` (`CruiseID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
