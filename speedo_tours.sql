-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2020 at 04:22 PM
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
(3, 'John Doe', 'ADMIN', 'test@test', 'admin', 'admin', 'Enabled'),
(4, 'Al Pacino', 'SUPPORT', 'test1@test1', 'supp', 'supp', 'Enabled');

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

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`GuestID`, `FirstName`, `LastName`, `Gender`, `Age`, `NationalID`, `PassportNumber`, `Phone`, `City`, `Country`, `Email`, `Username`, `Password`, `BankAccount`, `Suspended`, `Image`) VALUES
(1, 'Robert', 'Deniro', 'MALE', 60, 2020, 9999, 17822676, 'Corleone', 'Italy', 'khaled1701294@miuegypt.edu.eg', 'test', '2c9341ca4cf3d87b9e4eb905d6a3ec45', 2112, 'Enabled', ''),
(2, 'Sean', 'Connery', 'MALE', 75, 0, 0, 126867, 'London', 'England', 'ramez1700124@miuegypt.edu.eg', 'ramez', 'test', 0, 'Enabled', ''),
(19, 'Ahmed', 'Mahdy', 'MALE', 0, 0, 0, 0, '', 'Bangladesh', 'Ahmed@mahdy.com', 'Ahmed', 'b7fbdfc24ba048c9fbc7d752c6eece45', 0, 'Enabled', ''),
(20, 'Khaled', 'Elgammal', '', 0, 6234632, 6436, 0, '', 'Bolivia', 'elgammal17@gmail.com', '', '', 515661, 'Enabled', ''),
(21, 'test', 'test', 'MALE', 0, 0, 0, 0, '', 'Algeria', 'test@tets', 'test123', '2c9341ca4cf3d87b9e4eb905d6a3ec45', 0, 'Enabled', '');

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
(1, 'hotel 1', 80, 'test', 'test', 'TRUE', 'TRUE', 'FALSE', 'FALSE', 'TRUE', 'FALSE', 'FALSE', 'header', 'TRUE', 'Disabled', 'location 1', 20, 20, 20, 20, 2),
(2, 'hotel 2', 80, 'test', 'test', 'TRUE', 'FALSE', 'TRUE', 'FALSE', 'FALSE', 'FALSE', 'TRUE', 'feature', 'TRUE', 'Disabled', 'location 2', 20, 20, 20, 20, 4),
(3, 'test', 48, '21', '21', 'TRUE', 'TRUE', 'FALSE', 'FALSE', 'FALSE', 'FALSE', 'FALSE', 'feature', 'TRUE', 'Disabled', 'test', 12, 12, 12, 12, 2);

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
  `InquiryAuthor` text NOT NULL,
  `InquiryEmail` text NOT NULL,
  `reply` text NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inquiryhistory`
--

INSERT INTO `inquiryhistory` (`InquiryID`, `EmployeeID`, `Inquiry`, `InquiryAuthor`, `InquiryEmail`, `reply`, `Timestamp`) VALUES
(3, 4, 'some text', 'Ramez', 'ramez1700124.miuegypt.edu.eg', 'adsgasga', '2020-05-06 19:57:26'),
(4, 4, 'asdgagg', 'Ramez', 'ramez1700124.miuegypt.edu.eg', 'ddgdgdgrdtretretrere', '2020-05-06 19:58:12'),
(5, 4, 'dasdasdasdasd', 'ahmed', 'ahmed1707083@miuegypt.edu.eg', 'ahmed basha', '2020-05-06 20:41:42'),
(6, 4, 'gjntdgskliogsiogilrsgrjirdf', 'khaled', 'khaled1701294@miuegypt.edu.eg', 'msh fakr yad', '2020-05-06 20:41:53'),
(7, 4, 'ghvbnvvvjjgh', 'ahmed', 'ahmed1707083@miuegypt.edu.eg', '', '2020-05-06 20:48:04'),
(8, 4, 'zzzzzzxxvfrbgfhtfj', 'khaled', 'khaled1701294@miuegypt.edu.eg', '<h2> Your inquiry: zzzzzzxxvfrbgfhtfj</h2> <br> <br> enta mn madinty ???', '2020-05-06 20:49:19');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `ID` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`ID`, `username`, `password`) VALUES
(1, 'test', '2c9341ca4cf3d87b9e4eb905d6a3ec45'),
(2, 'ramez', 'test'),
(3, 'admin', 'admin'),
(4, 'supp', 'supp'),
(9, 'Ahmed', 'b7fbdfc24ba048c9fbc7d752c6eece45'),
(10, 'test123', '2c9341ca4cf3d87b9e4eb905d6a3ec45');

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

--
-- Dumping data for table `newswirehistory`
--

INSERT INTO `newswirehistory` (`MessageID`, `EmployeeID`, `Message`, `Email`) VALUES
(1, 4, 'kljfvldfhvkljdfklbvjdflvdhbgprugrvouyn ', 'adfadfkb@hotmail.com'),
(2, 4, 'kljfvldfhvkljdfklbvjdflvdhbgprugrvouyn ', 'ahmed.mahdy1899@gmail.com'),
(3, 4, 'kljfvldfhvkljdfklbvjdflvdhbgprugrvouyn ', 'Ramez1700124@miuegypt.edu.eg'),
(4, 4, 'k;k;k;klk;k;k;k;k;k;k;k;k;k;k\r\nk;kk;', 'adfadfkb@hotmail.com'),
(5, 4, 'k;k;k;klk;k;k;k;k;k;k;k;k;k;k\r\nk;kk;', 'ahmed.mahdy1899@gmail.com'),
(6, 4, 'k;k;k;klk;k;k;k;k;k;k;k;k;k;k\r\nk;kk;', 'Ramez1700124@miuegypt.edu.eg');

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

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`PackageID`, `CruiseID`, `PackageName`, `ReserveLimit`, `HotelID`, `Price`, `TourGuide`, `Transportation`, `TouristMap`, `BoardType`, `NumberofDays`, `NumberofNights`, `Suspended`, `DateIn`, `DateOut`, `Overview`, `Description`) VALUES
(1, 4, 'pkg 1', 60, 1, 500, 'TRUE', 'TRUE', 'FALSE', 'Full', 3, 3, 'Enabled', '2020-04-22', '2020-04-30', 'test', 'test'),
(2, NULL, 'pkg 2', 15, 2, 150, 'FALSE', 'TRUE', 'FALSE', 'Full', 3, 2, 'Enabled', '2020-04-01', '2020-04-07', 'test', 'yet');

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

--
-- Dumping data for table `reserves`
--

INSERT INTO `reserves` (`ReserveID`, `GuestId`, `PackageId`, `HotelId`, `NoofChildren`, `NoofAdults`, `DateIn`, `Suspended`, `DateOut`, `NoOfSingleRooms`, `NoOfDoubleRooms`, `NoOfTripleRooms`, `NoOfSuits`, `BoardType`, `price`, `Status`) VALUES
(1, 1, NULL, 1, 65, 2, '2020-03-03', 'Disabled', '2020-04-30', 2, 2, 2, 2, 'Full', 0, 'Approved and reserved'),
(2, 2, 3, NULL, 0, 0, '0000-00-00', 'Disabled', NULL, 3, 1, 1, 1, 'Half', 0, ''),
(3, 1, NULL, 2, 5, 2, '2020-04-28', 'Disabled', '2020-04-30', 0, 0, 0, 0, 'Half', 0, ''),
(4, 2, 1, NULL, 6, 3, '2020-04-22', 'Disabled', '2020-04-30', 3, 2, 6, 4, '', 3000, 'Approved and reserved'),
(5, 1, 1, NULL, 5, 4, '2020-04-22', 'Disabled', '2020-04-30', 6, 3, 2, 2, '', 3250, 'Approved and reserved'),
(6, 1, 1, NULL, 3, 3, '2020-04-22', 'Disabled', '2020-04-30', 3, 3, 3, 3, 'Full', 2250, 'Approved and reserved'),
(7, 1, NULL, 1, 2, 2, '0000-00-00', 'Enabled', '0000-00-00', 2, 3, 2, 3, '', 200, 'Waiting for approval'),
(8, 1, NULL, 1, 2, 2, '2020-05-19', 'Disabled', '2020-05-27', 3, 3, 3, 3, '', 240, 'Approved and reserved');

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
(1, 1, 3, 2, 'I Was Happy to visit Egypt with Speedo Tours', 'TRUE'),
(2, 2, NULL, 3, 'Winter Palace Hotel in luxor is magnificent', 'TRUE'),
(3, 1, NULL, 1, 'Ritz Carlton Hotel is real deal in france', 'TRUE'),
(4, 1, 4, 1, 'This Package Made me in love with europe', 'FALSE');

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
(384, 1, 'Single', 'Not', 1, 1, '2020-05-19', '2020-05-27'),
(385, 2, 'Single', 'Not', 1, 1, '2020-05-19', '2020-05-27'),
(386, 3, 'Single', 'Not', 1, 1, '2020-05-19', '2020-05-27'),
(387, 4, 'Single', 'Pending', 1, 1, '2020-05-19', '2020-05-27'),
(388, 5, 'Single', 'Pending', 1, 1, '2020-05-19', '2020-05-27'),
(389, 6, 'Single', 'Pending', 1, 1, '2020-05-19', '2020-05-27'),
(390, 7, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(391, 8, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(392, 9, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(393, 10, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(394, 11, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(395, 12, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(396, 13, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(397, 14, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(398, 15, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(399, 16, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(400, 17, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(401, 18, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(402, 19, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(403, 20, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(404, 21, 'Double', 'Not', 1, 1, '2020-05-19', '2020-05-27'),
(405, 22, 'Double', 'Not', 1, 1, '2020-05-19', '2020-05-27'),
(406, 23, 'Double', 'Not', 1, 1, '2020-05-19', '2020-05-27'),
(407, 24, 'Double', 'Pending', 1, 1, '2020-05-19', '2020-05-27'),
(408, 25, 'Double', 'Pending', 1, 1, '2020-05-19', '2020-05-27'),
(409, 26, 'Double', 'Pending', 1, 1, '2020-05-19', '2020-05-27'),
(410, 27, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(411, 28, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(412, 29, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(413, 30, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(414, 31, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(415, 32, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(416, 33, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(417, 34, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(418, 35, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(419, 36, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(420, 37, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(421, 38, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(422, 39, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(423, 40, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(424, 41, 'Triple', 'Not', 1, 1, '2020-05-19', '2020-05-27'),
(425, 42, 'Triple', 'Not', 1, 1, '2020-05-19', '2020-05-27'),
(426, 43, 'Triple', 'Not', 1, 1, '2020-05-19', '2020-05-27'),
(427, 44, 'Triple', 'Pending', 1, 1, '2020-05-19', '2020-05-27'),
(428, 45, 'Triple', 'Pending', 1, 1, '2020-05-19', '2020-05-27'),
(429, 46, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(430, 47, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(431, 48, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(432, 49, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(433, 50, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(434, 51, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(435, 52, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(436, 53, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(437, 54, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(438, 55, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(439, 56, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(440, 57, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(441, 58, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(442, 59, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(443, 60, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(444, 61, 'Suites', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(445, 62, 'Suites', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(446, 63, 'Suites', 'Not', 1, 1, '2020-05-19', '2020-05-27'),
(447, 64, 'Suites', 'Not', 1, 1, '2020-05-19', '2020-05-27'),
(448, 65, 'Suites', 'Not', 1, 1, '2020-05-19', '2020-05-27'),
(449, 66, 'Suites', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(450, 67, 'Suites', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(451, 68, 'Suites', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(452, 69, 'Suites', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(453, 70, 'Suites', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(454, 71, 'Suites', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(455, 72, 'Suites', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(456, 73, 'Suites', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(457, 74, 'Suites', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(458, 75, 'Suites', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(459, 76, 'Suites', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(460, 77, 'Suites', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(461, 78, 'Suites', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(462, 79, 'Suites', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(463, 80, 'Suites', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(464, 1, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(465, 2, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(466, 3, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(467, 4, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(468, 5, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(469, 6, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(470, 7, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(471, 8, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(472, 9, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(473, 10, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(474, 11, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(475, 12, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(476, 13, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(477, 14, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(478, 15, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(479, 16, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(480, 17, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(481, 18, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(482, 19, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(483, 20, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(484, 21, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(485, 22, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(486, 23, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(487, 24, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(488, 25, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(489, 26, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(490, 27, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(491, 28, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(492, 29, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(493, 30, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(494, 31, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(495, 32, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(496, 33, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(497, 34, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(498, 35, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(499, 36, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(500, 37, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(501, 38, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(502, 39, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(503, 40, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(504, 41, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(505, 42, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(506, 43, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(507, 44, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(508, 45, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(509, 46, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(510, 47, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(511, 48, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(512, 49, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(513, 50, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(514, 51, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(515, 52, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(516, 53, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(517, 54, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(518, 55, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(519, 56, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(520, 57, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(521, 58, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(522, 59, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(523, 60, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(524, 61, 'Suites', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(525, 62, 'Suites', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(526, 63, 'Suites', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(527, 64, 'Suites', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(528, 65, 'Suites', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(529, 66, 'Suites', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(530, 67, 'Suites', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(531, 68, 'Suites', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(532, 69, 'Suites', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(533, 70, 'Suites', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(534, 71, 'Suites', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(535, 72, 'Suites', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(536, 73, 'Suites', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(537, 74, 'Suites', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(538, 75, 'Suites', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(539, 76, 'Suites', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(540, 77, 'Suites', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(541, 78, 'Suites', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(542, 79, 'Suites', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(543, 80, 'Suites', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(544, 1, 'Single', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(545, 2, 'Single', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(546, 3, 'Single', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(547, 4, 'Single', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(548, 5, 'Single', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(549, 6, 'Single', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(550, 7, 'Single', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(551, 8, 'Single', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(552, 9, 'Single', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(553, 10, 'Single', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(554, 11, 'Single', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(555, 12, 'Single', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(556, 13, 'Double', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(557, 14, 'Double', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(558, 15, 'Double', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(559, 16, 'Double', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(560, 17, 'Double', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(561, 18, 'Double', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(562, 19, 'Double', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(563, 20, 'Double', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(564, 21, 'Double', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(565, 22, 'Double', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(566, 23, 'Double', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(567, 24, 'Double', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(568, 25, 'Triple', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(569, 26, 'Triple', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(570, 27, 'Triple', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(571, 28, 'Triple', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(572, 29, 'Triple', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(573, 30, 'Triple', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(574, 31, 'Triple', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(575, 32, 'Triple', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(576, 33, 'Triple', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(577, 34, 'Triple', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(578, 35, 'Triple', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(579, 36, 'Triple', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(580, 37, 'Suites', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(581, 38, 'Suites', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(582, 39, 'Suites', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(583, 40, 'Suites', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(584, 41, 'Suites', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(585, 42, 'Suites', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(586, 43, 'Suites', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(587, 44, 'Suites', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(588, 45, 'Suites', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(589, 46, 'Suites', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(590, 47, 'Suites', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(591, 48, 'Suites', 'Free', 3, NULL, '2000-01-01', '2000-01-01');

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
  ADD KEY `EmployeeID` (`EmployeeID`),
  ADD KEY `InquiryAuthor` (`InquiryAuthor`(768)),
  ADD KEY `InquiryEmail` (`InquiryEmail`(768));

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID`);

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
  MODIFY `GuestID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `InquiryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

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
