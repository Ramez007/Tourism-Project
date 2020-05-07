-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2020 at 12:34 AM
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
  `PostText` longtext NOT NULL,
  `Suspended` set('Enabled','Disabled') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogposts`
--

INSERT INTO `blogposts` (`PostID`, `EmployeeID`, `PostTitle`, `PostMonth`, `PostYear`, `PostText`, `Suspended`) VALUES
(14, 5, 'Company Establishment', 'SEP', '2000', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting\r\n\r\n\r\n', 'Disabled'),
(15, 5, '1st Anniversaiy of Speedo', 'SEP', '1990', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting\r\n\r\n\r\n\r\n', 'Disabled');

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
(6, 'King Mina', 150, 'Walter White', 'FALSE', 'FALSE', 'TRUE', 'TRUE', 'Disabled'),
(7, 'Palm', 200, 'Edward Smith', 'TRUE', 'TRUE', 'TRUE', 'TRUE', 'Disabled');

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
(5, 'John Doe', 'ADMIN', 'JohnDoe@hotmail.com', 'admin', 'admin', 'Disabled');

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

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`HotelID`, `Name`, `NumberofRooms`, `overview`, `description`, `WiFI`, `Swimming_Pool`, `Spa`, `Gym`, `Bar`, `Restaurant`, `Pets`, `featured`, `FeaturedMainSilder`, `Suspended`, `location`, `PriceSingle`, `PriceDouble`, `PriceTriple`, `PriceSuites`, `stars`) VALUES
(1, 'Winter Palace', 250, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever sinc', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'TRUE', 'TRUE', 'TRUE', 'TRUE', 'TRUE', 'TRUE', 'FALSE', 'header', 'TRUE', 'Disabled', 'Luxor, Egypt', 100, 80, 30, 500, 5),
(2, 'Steinberger', 190, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever sinc', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'TRUE', 'TRUE', 'TRUE', 'TRUE', 'TRUE', 'TRUE', 'TRUE', 'feature', 'TRUE', 'Disabled', 'Luxor, Egypt', 100, 50, 30, 10, 5),
(3, 'Emilio', 40, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever sinc', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'FALSE', 'TRUE', 'FALSE', 'FALSE', 'TRUE', 'FALSE', 'FALSE', 'feature', 'TRUE', 'Disabled', 'Luxor, Egypt', 10, 10, 10, 10, 3);

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
  `EmpID` int(11) DEFAULT NULL,
  `GuestID` int(11) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`ID`, `EmpID`, `GuestID`, `username`, `password`) VALUES
(19, 5, NULL, 'admin', 'admin');

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
  `Overview` mediumtext NOT NULL,
  `Description` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`PackageID`, `CruiseID`, `PackageName`, `ReserveLimit`, `HotelID`, `Price`, `TourGuide`, `Transportation`, `TouristMap`, `BoardType`, `NumberofDays`, `NumberofNights`, `Suspended`, `DateIn`, `DateOut`, `Overview`, `Description`) VALUES
(3, NULL, 'Around Luxor', 50, 3, 1000, 'TRUE', 'TRUE', 'FALSE', 'Full', 5, 4, 'Disabled', '2020-06-01', '2020-06-06', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever sinc', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(4, 6, 'Luxor Temples', 100, 1, 5000, 'TRUE', 'TRUE', 'TRUE', 'Half', 10, 9, 'Disabled', '2020-06-01', '2020-06-10', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever sinc', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.');

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
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`RoomID`, `RoomNumber`, `RoomType`, `Status`, `HotelID`, `GuestID`, `DateIn`, `DateOut`) VALUES
(592, 1, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(593, 2, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(594, 3, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(595, 4, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(596, 5, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(597, 6, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(598, 7, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(599, 8, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(600, 9, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(601, 10, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(602, 11, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(603, 12, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(604, 13, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(605, 14, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(606, 15, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(607, 16, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(608, 17, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(609, 18, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(610, 19, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(611, 20, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(612, 21, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(613, 22, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(614, 23, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(615, 24, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(616, 25, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(617, 26, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(618, 27, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(619, 28, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(620, 29, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(621, 30, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(622, 31, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(623, 32, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(624, 33, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(625, 34, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(626, 35, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(627, 36, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(628, 37, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(629, 38, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(630, 39, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(631, 40, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(632, 41, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(633, 42, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(634, 43, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(635, 44, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(636, 45, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(637, 46, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(638, 47, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(639, 48, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(640, 49, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(641, 50, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(642, 51, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(643, 52, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(644, 53, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(645, 54, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(646, 55, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(647, 56, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(648, 57, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(649, 58, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(650, 59, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(651, 60, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(652, 61, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(653, 62, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(654, 63, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(655, 64, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(656, 65, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(657, 66, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(658, 67, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(659, 68, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(660, 69, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(661, 70, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(662, 71, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(663, 72, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(664, 73, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(665, 74, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(666, 75, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(667, 76, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(668, 77, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(669, 78, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(670, 79, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(671, 80, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(672, 81, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(673, 82, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(674, 83, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(675, 84, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(676, 85, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(677, 86, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(678, 87, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(679, 88, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(680, 89, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(681, 90, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(682, 91, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(683, 92, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(684, 93, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(685, 94, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(686, 95, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(687, 96, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(688, 97, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(689, 98, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(690, 99, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(691, 100, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(692, 101, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(693, 102, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(694, 103, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(695, 104, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(696, 105, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(697, 106, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(698, 107, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(699, 108, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(700, 109, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(701, 110, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(702, 111, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(703, 112, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(704, 113, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(705, 114, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(706, 115, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(707, 116, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(708, 117, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(709, 118, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(710, 119, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(711, 120, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(712, 121, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(713, 122, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(714, 123, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(715, 124, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(716, 125, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(717, 126, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(718, 127, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(719, 128, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(720, 129, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(721, 130, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(722, 131, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(723, 132, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(724, 133, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(725, 134, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(726, 135, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(727, 136, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(728, 137, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(729, 138, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(730, 139, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(731, 140, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(732, 141, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(733, 142, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(734, 143, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(735, 144, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(736, 145, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(737, 146, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(738, 147, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(739, 148, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(740, 149, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(741, 150, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(742, 151, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(743, 152, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(744, 153, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(745, 154, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(746, 155, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(747, 156, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(748, 157, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(749, 158, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(750, 159, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(751, 160, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(752, 161, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(753, 162, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(754, 163, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(755, 164, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(756, 165, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(757, 166, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(758, 167, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(759, 168, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(760, 169, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(761, 170, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(762, 171, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(763, 172, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(764, 173, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(765, 174, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(766, 175, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(767, 176, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(768, 177, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(769, 178, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(770, 179, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(771, 180, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(772, 181, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(773, 182, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(774, 183, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(775, 184, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(776, 185, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(777, 186, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(778, 187, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(779, 188, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(780, 189, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(781, 190, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(782, 191, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(783, 192, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(784, 193, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(785, 194, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(786, 195, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(787, 196, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(788, 197, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(789, 198, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(790, 199, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(791, 200, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(792, 201, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(793, 202, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(794, 203, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(795, 204, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(796, 205, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(797, 206, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(798, 207, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(799, 208, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(800, 209, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(801, 210, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(802, 211, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(803, 212, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(804, 213, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(805, 214, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(806, 215, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(807, 216, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(808, 217, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(809, 218, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(810, 219, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(811, 220, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(812, 221, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(813, 222, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(814, 223, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(815, 224, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(816, 225, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(817, 226, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(818, 227, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(819, 228, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(820, 229, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(821, 230, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(822, 231, 'Suites', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(823, 232, 'Suites', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(824, 233, 'Suites', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(825, 234, 'Suites', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(826, 235, 'Suites', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(827, 236, 'Suites', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(828, 237, 'Suites', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(829, 238, 'Suites', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(830, 239, 'Suites', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(831, 240, 'Suites', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(832, 241, 'Suites', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(833, 242, 'Suites', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(834, 243, 'Suites', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(835, 244, 'Suites', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(836, 245, 'Suites', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(837, 246, 'Suites', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(838, 247, 'Suites', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(839, 248, 'Suites', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(840, 249, 'Suites', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(841, 250, 'Suites', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(842, 1, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(843, 2, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(844, 3, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(845, 4, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(846, 5, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(847, 6, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(848, 7, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(849, 8, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(850, 9, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(851, 10, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(852, 11, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(853, 12, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(854, 13, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(855, 14, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(856, 15, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(857, 16, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(858, 17, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(859, 18, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(860, 19, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(861, 20, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(862, 21, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(863, 22, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(864, 23, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(865, 24, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(866, 25, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(867, 26, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(868, 27, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(869, 28, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(870, 29, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(871, 30, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(872, 31, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(873, 32, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(874, 33, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(875, 34, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(876, 35, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(877, 36, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(878, 37, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(879, 38, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(880, 39, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(881, 40, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(882, 41, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(883, 42, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(884, 43, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(885, 44, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(886, 45, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(887, 46, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(888, 47, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(889, 48, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(890, 49, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(891, 50, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(892, 51, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(893, 52, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(894, 53, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(895, 54, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(896, 55, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(897, 56, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(898, 57, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(899, 58, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(900, 59, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(901, 60, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(902, 61, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(903, 62, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(904, 63, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(905, 64, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(906, 65, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(907, 66, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(908, 67, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(909, 68, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(910, 69, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(911, 70, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(912, 71, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(913, 72, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(914, 73, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(915, 74, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(916, 75, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(917, 76, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(918, 77, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(919, 78, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(920, 79, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(921, 80, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(922, 81, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(923, 82, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(924, 83, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(925, 84, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(926, 85, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(927, 86, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(928, 87, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(929, 88, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(930, 89, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(931, 90, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(932, 91, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(933, 92, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(934, 93, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(935, 94, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(936, 95, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(937, 96, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(938, 97, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(939, 98, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(940, 99, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(941, 100, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(942, 101, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(943, 102, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(944, 103, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(945, 104, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(946, 105, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(947, 106, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(948, 107, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(949, 108, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(950, 109, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(951, 110, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(952, 111, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(953, 112, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(954, 113, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(955, 114, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(956, 115, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(957, 116, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(958, 117, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(959, 118, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(960, 119, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(961, 120, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(962, 121, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(963, 122, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(964, 123, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(965, 124, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(966, 125, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(967, 126, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(968, 127, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(969, 128, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(970, 129, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(971, 130, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(972, 131, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(973, 132, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(974, 133, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(975, 134, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(976, 135, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(977, 136, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(978, 137, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(979, 138, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(980, 139, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(981, 140, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(982, 141, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(983, 142, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(984, 143, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(985, 144, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(986, 145, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(987, 146, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(988, 147, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(989, 148, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(990, 149, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(991, 150, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(992, 151, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(993, 152, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(994, 153, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(995, 154, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(996, 155, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(997, 156, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(998, 157, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(999, 158, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1000, 159, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1001, 160, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1002, 161, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1003, 162, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1004, 163, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1005, 164, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1006, 165, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1007, 166, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1008, 167, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1009, 168, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1010, 169, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1011, 170, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1012, 171, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1013, 172, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1014, 173, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1015, 174, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1016, 175, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1017, 176, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1018, 177, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1019, 178, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1020, 179, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1021, 180, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1022, 181, 'Suites', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1023, 182, 'Suites', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1024, 183, 'Suites', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1025, 184, 'Suites', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1026, 185, 'Suites', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1027, 186, 'Suites', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1028, 187, 'Suites', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1029, 188, 'Suites', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1030, 189, 'Suites', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1031, 190, 'Suites', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1032, 1, 'Single', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(1033, 2, 'Single', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(1034, 3, 'Single', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(1035, 4, 'Single', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(1036, 5, 'Single', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(1037, 6, 'Single', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(1038, 7, 'Single', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(1039, 8, 'Single', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(1040, 9, 'Single', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(1041, 10, 'Single', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(1042, 11, 'Double', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(1043, 12, 'Double', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(1044, 13, 'Double', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(1045, 14, 'Double', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(1046, 15, 'Double', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(1047, 16, 'Double', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(1048, 17, 'Double', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(1049, 18, 'Double', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(1050, 19, 'Double', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(1051, 20, 'Double', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(1052, 21, 'Triple', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(1053, 22, 'Triple', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(1054, 23, 'Triple', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(1055, 24, 'Triple', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(1056, 25, 'Triple', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(1057, 26, 'Triple', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(1058, 27, 'Triple', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(1059, 28, 'Triple', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(1060, 29, 'Triple', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(1061, 30, 'Triple', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(1062, 31, 'Suites', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(1063, 32, 'Suites', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(1064, 33, 'Suites', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(1065, 34, 'Suites', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(1066, 35, 'Suites', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(1067, 36, 'Suites', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(1068, 37, 'Suites', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(1069, 38, 'Suites', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(1070, 39, 'Suites', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(1071, 40, 'Suites', 'Free', 3, NULL, '2000-01-01', '2000-01-01');

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
  MODIFY `PostID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `cruise`
--
ALTER TABLE `cruise`
  MODIFY `CruiseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `EmployeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `PictureId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `GuestID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
  MODIFY `PackageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `RoomID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1072;

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
