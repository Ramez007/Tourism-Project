-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2020 at 01:54 AM
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

--
-- Dumping data for table `blogposts`
--

INSERT INTO `blogposts` (`PostID`, `EmployeeID`, `PostTitle`, `PostMonth`, `PostYear`, `PostText`, `Suspended`) VALUES
(18, 5, 'Company Establishment', 'SEP', '1989', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vulputate nisl non urna commodo rutrum. Ut ipsum est, faucibus vel facilisis nec, feugiat a dolor. Praesent tempus dictum ante vel bibendum. Fusce arcu urna, hendrerit at turpis vitae, pellentesque luctus eros. Phasellus maximus tortor ege', 'Disabled'),
(19, 5, '1st Anniversaiy of Speedo', 'SEP', '1999', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vulputate nisl non urna commodo rutrum. Ut ipsum est, faucibus vel facilisis nec, feugiat a dolor. Praesent tempus dictum ante vel bibendum. Fusce arcu urna, hendrerit at turpis vitae, pellentesque luctus eros. Phasellus maximus tortor ege', 'Disabled'),
(20, 5, '10 Years of Speedo', 'SEP', '2009', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vulputate nisl non urna commodo rutrum. Ut ipsum est, faucibus vel facilisis nec, feugiat a dolor. Praesent tempus dictum ante vel bibendum. Fusce arcu urna, hendrerit at turpis vitae, pellentesque luctus eros. Phasellus maximus tortor ege', 'Disabled');

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
(7, 'Palm', 200, 'Edward Smith', 'TRUE', 'TRUE', 'TRUE', 'TRUE', 'Disabled'),
(8, 'Olypmic', 150, 'Gottieb Damiler', 'FALSE', 'TRUE', 'TRUE', 'FALSE', 'Disabled');

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
  `Suspended` set('Enabled','Disabled') NOT NULL DEFAULT 'Disabled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`EmployeeID`, `Name`, `JobType`, `Email`, `Username`, `Password`, `Suspended`) VALUES
(5, 'John Doe', 'ADMIN', 'JohnDoe@hotmail.com', 'admin', 'admin', 'Disabled'),
(6, 'Adams Baker', 'SUPPORT', 'AdamsBaker@gmail.com', 'supp', 'supp', 'Disabled');

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
  `Gender` set('MALE','FEMALE','OTHER') NOT NULL,
  `Age` int(3) NOT NULL,
  `NationalID` int(11) NOT NULL,
  `PassportNumber` int(9) NOT NULL,
  `Phone` int(11) NOT NULL,
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

INSERT INTO `guest` (`GuestID`, `FirstName`, `LastName`, `Gender`, `Age`, `NationalID`, `PassportNumber`, `Phone`, `Country`, `Email`, `Username`, `Password`, `BankAccount`, `Suspended`, `Image`) VALUES
(30, 'Ramez', 'Nabil', 'MALE', 0, 0, 0, 0, 'Egypt', 'ramez1700124@miuegypt.edu.eg', 'test', '2c9341ca4cf3d87b9e4eb905d6a3ec45', 0, 'Enabled', ''),
(31, 'Ahmed', 'Mahdy', 'MALE', 0, 0, 0, 0, 'Egypt', 'ahmed1707083@miuegypt.edu.eg', 'test2', '662af1cd1976f09a9f8cecc868ccc0a2', 0, 'Enabled', '');

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
(1, 'Winter Palace', 250, 'This is one of the most decorated luxury hotels and one of the best for family vacations and equipped with a lot of facilities for Comfort .', 'The hotel was built by the Upper Egypt Hotels Co, an enterprise founded in 1905 by Cairo hoteliers Charles Baehler and George Nungovich in collaboration with Thomas Cook & Son (Egypt). It was inaugurated on Saturday 19 January 1907, with a picnic at the Valley of the Kings followed by dinner at the hotel and speeches.\r\n\r\nThe architect was Leon Stienon, the Italian construction company G.GAROZZO and Figli Costruzioni in Cemento Armato, Sistema SIACCI brevettato.\r\n\r\nDuring World War I the hotel was temporarily closed to paying guests and employed as a hospice for convalescing soldiers. A regular guest at the hotel from 1907 on was George Herbert, 5th Earl of Carnarvon, better known simply as Lord Carnarvon. Carnarvon was the patron of Egyptologist Howard Carter, who in 1922 discovered the intact tomb of Tutankhamun.', 'TRUE', 'TRUE', 'TRUE', 'TRUE', 'TRUE', 'TRUE', 'TRUE', 'header', 'TRUE', 'Disabled', 'Luxor, Egypt', 1000, 1500, 2000, 4000, 5),
(2, 'Steinberger', 105, 'This is one of the most decorated luxury hotels and one of the best for family vacations and equipped with a lot of facilities for Comfort .', 'Look forward to one of our hotels in Luxor, the capital of the Pharaohs on the eastern bank of the Nile and experience hospitality a la Steigenberger. \r\n\r\nThe Steigenberger Achti Resort Luxor with is spacious tropical garden and panoramic view of the Nile as well as the Steigenberger Nile Palace with its pool landscape, spa and wellness guarantee a luxury holiday in Egypt at the Nile.', 'TRUE', 'TRUE', 'TRUE', 'TRUE', 'TRUE', 'TRUE', 'FALSE', 'feature', 'TRUE', 'Disabled', 'Luxor, Egypt', 1000, 1500, 2000, 3000, 5),
(3, 'Emilio', 4, 'This is one of the most decorated luxury hotels and one of the best for family vacations and equipped with a lot of facilities for Comfort .', 'The Emilio features a rooftop pool and sun terrace overlooking the River Nile and Luxor temple. All rooms are air conditioned and offer Nile and Luxor city views. Luxor Temple is located with a short driving distance from the hotel.\r\n\r\nFeaturing views over the Nile and Luxor Temple, all Emilio rooms include satellite TV, work desk, a safe deposit box, and 24-hour room service.\r\n\r\nFor meals and drinks, guests can chose from a coffee shop, a bar, and 2 restaurants, one of which is located on the rooftop by the pool.\r\n\r\nEnjoy many festive nights at the on-site disco. Emilio also provides a travel agency that can arrange a wide variety of trips and daily excursions, laundry, and express check in/out service.\r\n\r\nThe Karnak temple and shopping district are within walking distance.\r\n\r\nWe speak your language! ', 'TRUE', 'TRUE', 'FALSE', 'FALSE', 'TRUE', 'TRUE', 'FALSE', 'false', 'TRUE', 'Disabled', 'Luxor, Egypt', 1, 1, 1, 1, 3),
(4, 'Isis', 4, 'This is one of the most decorated luxury hotels and one of the best for family vacations and equipped with a lot of facilities for Comfort .', 'On the banks of the Nile, this resort offers air conditioned rooms with views of the river, tropical grounds, or outdoor pools. It is located in the center of Luxor and half a kilometer from Luxor Temple.\r\n\r\nInternational buffet meals, including breakfast, are served daily at Lotus Restaurant. Isis Hotel has a barbecue terrace, and a Chinese and an Italian themed restaurant. In the evening, there is live entertainment in the bar.\r\n\r\nVarious beauty treatments are available at the salon. Guests can also work out at the gym or play a game of racquetball.', 'TRUE', 'TRUE', 'FALSE', 'TRUE', 'TRUE', 'TRUE', 'FALSE', 'feature', 'FALSE', 'Disabled', 'Luxor, Egypt', 1, 1, 1, 1, 4);

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
(19, 5, NULL, 'admin', 'admin'),
(20, 6, NULL, 'supp', 'supp'),
(23, NULL, 30, 'test', '2c9341ca4cf3d87b9e4eb905d6a3ec45'),
(24, NULL, 31, 'test2', '662af1cd1976f09a9f8cecc868ccc0a2');

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
(7, NULL, 'Around Luxor', 100, 1, 5000, 'TRUE', 'TRUE', 'TRUE', 'Full', 6, 5, 'Disabled', '2020-05-31', '2020-06-05', 'This Package is highly recommended for egyptlogists and historians. Enjoying history is essential for meditation. Enjoy The Nile River Ride.', '\r\nDay 1: Luxor\r\n\r\nUpon arrival at Luxor Airport, you will be greeted by a Travco representative and transferred to your Nile Cruise which will be your home for the next 7 nights. In the afternoon, you have the choice for an optional visit to the Luxor Museum, or spend free time at leisure on board, then dinner and overnight onboard your cruise ship.\r\n\r\nDay 2: Luxor | Esna\r\n\r\nAfter breakfast you will start the visits and leave for the East Bank of Luxor where you will enjoy discovering the grand Karnak and Luxor temples with your guide. You will be back on board for lunch. In the afternoon, the ship will sail to Esna. Dinner and overnight onboard (Esna).\r\n\r\nDay 3: Edfu | Kom Ombo\r\n\r\nEnjoy the view as you sail down the Nile heading for Edfu. Once you arrive, you will reach the huge temple dedicated to the ancient god Horus by horse-drawn carriage where you will take a tour around with your guide. Lunch on board. Your ship will then leave for Kom Ombo. Dinner and overnight onboard (Kom Ombo).\r\n\r\nDay 4: Aswan\r\n\r\nToday, the boat sails to Aswan. Breakfast on board. Once in Aswan, you will visit the High Dam, Unfinished Obelisk and Philae temple. You will be back on board for lunch. Dinner and overnight aboard the ship (Aswan).\r\n\r\nDay 5: Aswan\r\n\r\nYou have the option of spending the morning free at leisure or visit Abu Simbel (check out our optional tours by air or by road). Lunch on board. In the afternoon, you will tour the Nile by felucca boat and visit the Botanical Garden. Then back to the ship for dinner and overnight (Aswan).\r\n\r\nDay 6: Kom Ombo | Edfu | Luxor\r\n\r\nIn the early morning your Nile Cruise will sail to Kom Ombo where you will visit their legendary temple. Sail to Edfu. Lunch on board and enjoy the beautiful scenery of the Nile while sailing to Luxor. Dinner and overnight aboard the ship.\r\n'),
(8, 6, 'Luxor Temples', 80, 3, 4000, 'TRUE', 'FALSE', 'TRUE', 'Half', 5, 4, 'Disabled', '2020-06-07', '2020-06-10', 'This Package is highly recommended for egyptlogists and historians. Enjoying history is essential for meditation. Enjoy The Nile River Ride.', 'Day 1: Luxor\r\n\r\nUpon arrival at Luxor Airport, our representative will be waiting for you to assist you with the airport formalities. \r\nMeet your guide and depart to visit the sights of the East Bank of Luxor including the Karnak and Luxor Temples. After the tour, you will be transferred to your 5 Nile cruise which will be your home for the next four nights. You will have lunch, dinner and stay overnight onboard.\r\n\r\nDay 2: Luxor | Esna\r\n\r\nFollowing breakfast onboard you will depart for your sightseeing tour starting with the West Bank, including the Colossi of Memnon and Temple of Queen Hatshepsut, and the Valley of Kings. Return to your cruise ship for lunch while the ship sails to Esna. Dinner and overnight aboard your cruise ship.\r\n\r\nDay 3: Edfu | Kom Ombo\r\n\r\nYou will have breakfast on board and sail to Edfu. In Edfu you will take a tour by a horse-drawn carriage to visit the Temple of Horus. You will have lunch onboard and sail to Kom Ombo; and later dinner and overnight onboard.\r\n\r\nDay 4: Kom Ombo | Aswan\r\n\r\nYou will have breakfast onboard in Kom Ombo, and then visit the temples of Sobek and Horus. Return to the ship for lunch and sail to Aswan. You will visit to the High Dam, the Unfinished Obelisk, and the beautiful Philae Temple. Dinner and overnight onboard.\r\n\r\nDay 5: Aswan\r\n\r\nYou will have breakfast onboard then disembark ship to be transferred to Aswan Airport for your final departure. \r\n'),
(9, 7, 'Best of the Nile', 50, 4, 3000, 'FALSE', 'FALSE', 'TRUE', 'Full', 4, 3, 'Disabled', '2020-08-01', '2020-08-05', 'This Package is highly recommended for egyptlogists and historians. Enjoying history is essential for meditation. Enjoy The Nile River Ride.', 'Day 1: Aswan\r\n\r\nUpon arrival in Aswan airport we will meet & assist you and escort you to your Nile Cruise ship where you will be lodged the next 3 nights. Embarkation and check in before lunch. Lunch will be on board. In the afternoon, you will discover the High Dam, the Unfinished Obelisk and Philae temple. Then return to the ship for dinner and overnight onboard (Aswan).\r\n\r\nDay 2: Kom Ombo | Edfu\r\n\r\nIn the early morning, the ship will sail to Kom Ombo. In Kom Ombo, you will visit the huge temple dedicated to the ancient god Horus. Back to your cruise ship for lunch. Admire the beautiful scenery of the Nile while sailing to Edfu. In Edfu, you will take a tour by horse-drawn carriage to visit Edfu temple. Upon returning back to ship, we will sail to Luxor. Dinner and overnight aboard the ship.\r\n\r\nDay 3: Luxor\r\n\r\nFollowing breakfast onboard; depart for visits to the sites on the West Bank, including the Colossi of Memnon, Temple of Queen Hatshepsut, and the Valley of Kings. After lunch, you will visit the East Bank for sightseeing, including the Karnak & Luxor temples. Back to the cruise ship, dinner and overnight on board.\r\n\r\nDay 4: Luxor\r\n\r\nYou will have breakfast onboard then disembark to be transferred to Luxor Airport for your final departure. \r\n');

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
  `Status` set('Waiting for approval','Approved and reserved','','') NOT NULL,
  `Ended` set('TRUE','FALSE','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reserves`
--

INSERT INTO `reserves` (`ReserveID`, `GuestId`, `PackageId`, `HotelId`, `NoofChildren`, `NoofAdults`, `DateIn`, `Suspended`, `DateOut`, `NoOfSingleRooms`, `NoOfDoubleRooms`, `NoOfTripleRooms`, `NoOfSuits`, `BoardType`, `price`, `Status`, `Ended`) VALUES
(12, 31, 7, NULL, 0, 1, '2020-05-31', 'Enabled', '2020-06-05', 1, 0, 0, 0, 'Full', 5000, 'Waiting for approval', 'FALSE'),
(13, 30, 7, NULL, 2, 2, '2020-05-31', 'Enabled', '2020-06-05', 1, 1, 0, 0, 'Half', 15000, 'Waiting for approval', 'FALSE'),
(14, 30, NULL, 1, 0, 1, '2020-06-01', 'Enabled', '2020-06-06', 1, 0, 0, 0, 'Full', 1000, 'Waiting for approval', 'FALSE');

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
(6, 30, NULL, 1, 'Winter Palace Is Magnificent ', 'TRUE'),
(7, 30, 7, NULL, 'This Package Made me in love with luxor', 'TRUE'),
(8, 31, NULL, 3, 'Emilio is a great hotel', 'TRUE');

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
(1117, 1, 'Single', 'Pending', 1, 30, '2020-06-01', '2020-06-06'),
(1118, 2, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1119, 3, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1120, 4, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1121, 5, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1122, 6, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1123, 7, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1124, 8, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1125, 9, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1126, 10, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1127, 11, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1128, 12, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1129, 13, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1130, 14, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1131, 15, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1132, 16, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1133, 17, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1134, 18, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1135, 19, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1136, 20, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1137, 21, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1138, 22, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1139, 23, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1140, 24, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1141, 25, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1142, 26, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1143, 27, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1144, 28, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1145, 29, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1146, 30, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1147, 31, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1148, 32, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1149, 33, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1150, 34, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1151, 35, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1152, 36, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1153, 37, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1154, 38, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1155, 39, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1156, 40, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1157, 41, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1158, 42, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1159, 43, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1160, 44, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1161, 45, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1162, 46, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1163, 47, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1164, 48, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1165, 49, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1166, 50, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1167, 51, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1168, 52, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1169, 53, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1170, 54, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1171, 55, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1172, 56, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1173, 57, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1174, 58, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1175, 59, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1176, 60, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1177, 61, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1178, 62, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1179, 63, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1180, 64, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1181, 65, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1182, 66, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1183, 67, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1184, 68, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1185, 69, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1186, 70, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1187, 71, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1188, 72, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1189, 73, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1190, 74, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1191, 75, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1192, 76, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1193, 77, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1194, 78, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1195, 79, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1196, 80, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1197, 81, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1198, 82, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1199, 83, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1200, 84, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1201, 85, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1202, 86, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1203, 87, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1204, 88, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1205, 89, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1206, 90, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1207, 91, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1208, 92, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1209, 93, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1210, 94, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1211, 95, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1212, 96, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1213, 97, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1214, 98, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1215, 99, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1216, 100, 'Single', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1217, 101, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1218, 102, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1219, 103, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1220, 104, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1221, 105, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1222, 106, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1223, 107, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1224, 108, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1225, 109, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1226, 110, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1227, 111, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1228, 112, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1229, 113, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1230, 114, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1231, 115, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1232, 116, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1233, 117, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1234, 118, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1235, 119, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1236, 120, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1237, 121, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1238, 122, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1239, 123, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1240, 124, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1241, 125, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1242, 126, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1243, 127, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1244, 128, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1245, 129, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1246, 130, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1247, 131, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1248, 132, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1249, 133, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1250, 134, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1251, 135, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1252, 136, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1253, 137, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1254, 138, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1255, 139, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1256, 140, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1257, 141, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1258, 142, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1259, 143, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1260, 144, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1261, 145, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1262, 146, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1263, 147, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1264, 148, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1265, 149, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1266, 150, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1267, 151, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1268, 152, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1269, 153, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1270, 154, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1271, 155, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1272, 156, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1273, 157, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1274, 158, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1275, 159, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1276, 160, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1277, 161, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1278, 162, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1279, 163, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1280, 164, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1281, 165, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1282, 166, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1283, 167, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1284, 168, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1285, 169, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1286, 170, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1287, 171, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1288, 172, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1289, 173, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1290, 174, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1291, 175, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1292, 176, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1293, 177, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1294, 178, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1295, 179, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1296, 180, 'Double', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1297, 181, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1298, 182, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1299, 183, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1300, 184, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1301, 185, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1302, 186, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1303, 187, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1304, 188, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1305, 189, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1306, 190, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1307, 191, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1308, 192, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1309, 193, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1310, 194, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1311, 195, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1312, 196, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1313, 197, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1314, 198, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1315, 199, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1316, 200, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1317, 201, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1318, 202, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1319, 203, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1320, 204, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1321, 205, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1322, 206, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1323, 207, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1324, 208, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1325, 209, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1326, 210, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1327, 211, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1328, 212, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1329, 213, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1330, 214, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1331, 215, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1332, 216, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1333, 217, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1334, 218, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1335, 219, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1336, 220, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1337, 221, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1338, 222, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1339, 223, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1340, 224, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1341, 225, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1342, 226, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1343, 227, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1344, 228, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1345, 229, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1346, 230, 'Triple', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1347, 231, 'Suites', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1348, 232, 'Suites', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1349, 233, 'Suites', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1350, 234, 'Suites', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1351, 235, 'Suites', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1352, 236, 'Suites', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1353, 237, 'Suites', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1354, 238, 'Suites', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1355, 239, 'Suites', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1356, 240, 'Suites', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1357, 241, 'Suites', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1358, 242, 'Suites', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1359, 243, 'Suites', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1360, 244, 'Suites', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1361, 245, 'Suites', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1362, 246, 'Suites', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1363, 247, 'Suites', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1364, 248, 'Suites', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1365, 249, 'Suites', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1366, 250, 'Suites', 'Free', 1, NULL, '2000-01-01', '2000-01-01'),
(1367, 1, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1368, 2, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1369, 3, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1370, 4, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1371, 5, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1372, 6, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1373, 7, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1374, 8, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1375, 9, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1376, 10, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1377, 11, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1378, 12, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1379, 13, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1380, 14, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1381, 15, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1382, 16, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1383, 17, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1384, 18, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1385, 19, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1386, 20, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1387, 21, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1388, 22, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1389, 23, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1390, 24, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1391, 25, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1392, 26, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1393, 27, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1394, 28, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1395, 29, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1396, 30, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1397, 31, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1398, 32, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1399, 33, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1400, 34, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1401, 35, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1402, 36, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1403, 37, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1404, 38, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1405, 39, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1406, 40, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1407, 41, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1408, 42, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1409, 43, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1410, 44, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1411, 45, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1412, 46, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1413, 47, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1414, 48, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1415, 49, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1416, 50, 'Single', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1417, 51, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1418, 52, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1419, 53, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1420, 54, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1421, 55, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1422, 56, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1423, 57, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1424, 58, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1425, 59, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1426, 60, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1427, 61, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1428, 62, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1429, 63, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1430, 64, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1431, 65, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1432, 66, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1433, 67, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1434, 68, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1435, 69, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1436, 70, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1437, 71, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1438, 72, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1439, 73, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1440, 74, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1441, 75, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1442, 76, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1443, 77, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1444, 78, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1445, 79, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1446, 80, 'Double', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1447, 81, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1448, 82, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1449, 83, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1450, 84, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1451, 85, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1452, 86, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1453, 87, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1454, 88, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1455, 89, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1456, 90, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1457, 91, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1458, 92, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1459, 93, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1460, 94, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1461, 95, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1462, 96, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1463, 97, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1464, 98, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1465, 99, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1466, 100, 'Triple', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1467, 101, 'Suites', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1468, 102, 'Suites', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1469, 103, 'Suites', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1470, 104, 'Suites', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1471, 105, 'Suites', 'Free', 2, NULL, '2000-01-01', '2000-01-01'),
(1472, 1, 'Single', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(1473, 2, 'Double', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(1474, 3, 'Triple', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(1475, 4, 'Suites', 'Free', 3, NULL, '2000-01-01', '2000-01-01'),
(1476, 1, 'Single', 'Free', 4, NULL, '2000-01-01', '2000-01-01'),
(1477, 2, 'Double', 'Free', 4, NULL, '2000-01-01', '2000-01-01'),
(1478, 3, 'Triple', 'Free', 4, NULL, '2000-01-01', '2000-01-01'),
(1479, 4, 'Suites', 'Free', 4, NULL, '2000-01-01', '2000-01-01');

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
  MODIFY `PostID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `cruise`
--
ALTER TABLE `cruise`
  MODIFY `CruiseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `EmployeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `PictureId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `GuestID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `InquiryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inquiryhistory`
--
ALTER TABLE `inquiryhistory`
  MODIFY `InquiryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `newswire`
--
ALTER TABLE `newswire`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `newswirehistory`
--
ALTER TABLE `newswirehistory`
  MODIFY `MessageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `PackageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `reserves`
--
ALTER TABLE `reserves`
  MODIFY `ReserveID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `ReviewID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `RoomID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1480;

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
