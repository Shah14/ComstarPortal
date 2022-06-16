-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2021 at 02:37 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `comstar_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Email` varchar(32) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `Name` text NOT NULL,
  `Image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Email`, `Password`, `Name`, `Image`) VALUES
('admin@gmail', '25d55ad283aa400af464c76d713c07ad', 'Zuhair Isyraq', 'zuhair@gmail');

-- --------------------------------------------------------

--
-- Table structure for table `advertisement`
--

CREATE TABLE `advertisement` (
  `ID` int(11) NOT NULL,
  `Title` varchar(1000) NOT NULL,
  `Description` varchar(1000) NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp(),
  `Visibility` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `advertisement`
--

INSERT INTO `advertisement` (`ID`, `Title`, `Description`, `Date`, `Visibility`) VALUES
(14, ' Software and Design Internship UiTM', ' Looking for internship? Our pals at UiTM is offering one right now. Contact 011-12345678 (En. Sabri) or 012-23456789 (Pn. Sakinah)', '2021-11-18 15:09:07', 'Visible'),
(16, '  COMSPORT 2022', '  Register now at comstarportal.com/programme', '2021-11-25 17:52:35', 'Visible');

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `Post ID` int(11) NOT NULL,
  `Title` varchar(32) NOT NULL,
  `Description` varchar(10000) NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp(),
  `Upvote` int(11) NOT NULL,
  `Report` int(11) NOT NULL,
  `Replies` int(11) NOT NULL,
  `Poster` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`Post ID`, `Title`, `Description`, `Date`, `Upvote`, `Report`, `Replies`, `Poster`) VALUES
(31, 'Test', 'Test', '2021-11-25 14:08:23', 0, 0, 0, 'Danish Haqime'),
(34, 'Welcome to COMSTAR Portal!', 'Welcome to the official website of COMSTAR! This thread is for introduction of each users of COMSTAR Portal so feel free to introduce yourself to others. Refrain from using profanity and avoid causing provocation by any means to keep this thread civil. Failure to oblige will result in your account being banned.', '2021-11-25 18:26:54', 3, 0, 1, 'Zuhair Isyraq'),
(38, 'Question about COMSTARIAN Day', 'When and where will COMSTARIAN day be held?', '2021-11-25 18:40:13', 0, 0, 0, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `homepage`
--

CREATE TABLE `homepage` (
  `ID` varchar(32) NOT NULL,
  `About` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `homepage`
--

INSERT INTO `homepage` (`ID`, `About`) VALUES
('1', '																																																																																										Computer Strike Toward Artistic Research also known as COMSTAR is a club consists of Computer Science students of UTMKL. Our vision is to produce students who are active, skilled, and creative in the field of Computer Science while helping them achieving excellence in the world of Information and Communication Technology (ICT). Our mission on the other hand is to ensure that the students master the skills and cultivate an interest in the world of ICT while inculcating good values and good work culture into practice.                 ');

-- --------------------------------------------------------

--
-- Table structure for table `list`
--

CREATE TABLE `list` (
  `ID` int(32) NOT NULL,
  `Student` text NOT NULL,
  `Name` varchar(32) NOT NULL,
  `Programme` text NOT NULL,
  `Date` varchar(32) NOT NULL,
  `Venue` varchar(32) NOT NULL,
  `Fee Price` varchar(32) NOT NULL,
  `Status` varchar(32) NOT NULL,
  `Attend Status` varchar(32) NOT NULL,
  `Present Time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `list`
--

INSERT INTO `list` (`ID`, `Student`, `Name`, `Programme`, `Date`, `Venue`, `Fee Price`, `Status`, `Attend Status`, `Present Time`) VALUES
(57, 'user@gmail', 'User', 'Unity Workshop', '2021-10-20', 'Menara Razak', '5', 'Open To UTM', 'Present', '2021-11-25 19:01:44'),
(58, 'user@gmail', 'User', 'C++ CodeShop', '2021-10-30', 'Makmal M1', '15', 'Open To COMSTAR', 'Not Present', '2021-11-25 19:01:39');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `Email` varchar(32) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `Name` text NOT NULL,
  `Verification` text NOT NULL,
  `Matric Number` varchar(9) NOT NULL,
  `User Type` text NOT NULL,
  `Image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`Email`, `Password`, `Name`, `Verification`, `Matric Number`, `User Type`, `Image`) VALUES
('haiqal@gmail', 'c5fde9de2d29789a81d1bc0f16292048', 'Danish Haqime', 'Verified', 'A19DW0272', 'UTM', 'haiqal@gmail'),
('user@gmail', '25d55ad283aa400af464c76d713c07ad', 'User', 'Pending', 'A19DW0000', 'Public', 'default');

-- --------------------------------------------------------

--
-- Table structure for table `programme`
--

CREATE TABLE `programme` (
  `Programme ID` varchar(32) NOT NULL,
  `Name` text NOT NULL,
  `Date` date NOT NULL,
  `Venue` text NOT NULL,
  `Fee Price` decimal(11,0) NOT NULL,
  `Status` text NOT NULL,
  `attend_process` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `programme`
--

INSERT INTO `programme` (`Programme ID`, `Name`, `Date`, `Venue`, `Fee Price`, `Status`, `attend_process`) VALUES
('P1', 'Unity Workshop', '2021-10-20', 'Menara Razak', '5', 'Open To UTM', 'Visible'),
('P2', 'Photoshop', '2021-10-20', 'Dewan Hashim', '10', 'Open To UTM', 'Hidden'),
('P3', '3D Game', '2021-10-20', 'Makmal M1', '12', 'Open To UTM', 'Hidden'),
('P4', '2D Game', '2021-10-20', 'Makmal M2', '9', 'Open To Public', 'Hidden'),
('P5', 'Vegas Video Editing', '2021-10-21', 'Dewan Kuliah 7', '11', 'Open To Public', 'Hidden'),
('P6', 'Valorant Tournament', '2021-10-22', 'Online', '20', 'Open To Public', 'Hidden'),
('P7', 'C++ CodeShop', '2021-10-30', 'Makmal M1', '15', 'Open To COMSTAR', 'Hidden'),
('P8', 'Java Jaya', '2021-10-28', 'Makmal M2', '15', 'Open To COMSTAR', 'Hidden'),
('P9', 'Microsoft Workshop', '2021-11-01', 'Online', '17', 'Open To COMSTAR', 'Hidden');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `Title` varchar(32) NOT NULL,
  `Reply` varchar(32) NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp(),
  `Poster` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`Title`, `Reply`, `Date`, `Poster`) VALUES
('Deepavali', 'Yey', '2021-11-18 15:07:17', 'Danish Haqime'),
('Welcome to COMSTAR Portal!', 'hi my name is J', '2021-11-25 18:33:57', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `technical`
--

CREATE TABLE `technical` (
  `Email` varchar(32) NOT NULL,
  `Type` text NOT NULL,
  `Description` text NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `technical`
--

INSERT INTO `technical` (`Email`, `Type`, `Description`, `Date`) VALUES
('Guest1411306563', 'Bug/Glitch/Error Report', 'Website lagging', '2021-11-18 14:49:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`Post ID`);

--
-- Indexes for table `homepage`
--
ALTER TABLE `homepage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `list`
--
ALTER TABLE `list`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `programme`
--
ALTER TABLE `programme`
  ADD PRIMARY KEY (`Programme ID`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`Date`);

--
-- Indexes for table `technical`
--
ALTER TABLE `technical`
  ADD PRIMARY KEY (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertisement`
--
ALTER TABLE `advertisement`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `Post ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `list`
--
ALTER TABLE `list`
  MODIFY `ID` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
