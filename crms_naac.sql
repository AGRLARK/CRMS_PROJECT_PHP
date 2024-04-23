-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2024 at 05:34 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crms_naac`
--

-- --------------------------------------------------------

--
-- Table structure for table `collaboration_info`
--

CREATE TABLE `collaboration_info` (
  `id` int(11) NOT NULL,
  `activityType` varchar(30) NOT NULL,
  `collaborationDescription` varchar(30) NOT NULL,
  `benefits` varchar(255) NOT NULL,
  `moUs` varchar(255) NOT NULL,
  `events` varchar(255) NOT NULL,
  `linkages` varchar(255) NOT NULL,
  `activityDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `collaboration_info`
--

INSERT INTO `collaboration_info` (`id`, `activityType`, `collaborationDescription`, `benefits`, `moUs`, `events`, `linkages`, `activityDate`) VALUES
(1, 'Collaborative', 'XYZ', 'student', 'Faculty Exchange', 'Student Faculty', 'Linkage', '2023-10-11');

-- --------------------------------------------------------

--
-- Table structure for table `consultancy_organized`
--

CREATE TABLE `consultancy_organized` (
  `id` int(11) NOT NULL,
  `consultancyName` varchar(25) NOT NULL,
  `clientName` varchar(25) NOT NULL,
  `clientIndustry` varchar(25) NOT NULL,
  `projectDescription` varchar(250) NOT NULL,
  `projectCost` varchar(25) NOT NULL,
  `projectDate` date NOT NULL,
  `consultancyPhoto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `consultancy_organized`
--

INSERT INTO `consultancy_organized` (`id`, `consultancyName`, `clientName`, `clientIndustry`, `projectDescription`, `projectCost`, `projectDate`, `consultancyPhoto`) VALUES
(1, 'Financial Consulting', 'Akash', 'TCS', 'Lorem ', '34000000', '2023-09-05', 'C:\\xampp\\htdocs\\CRMS/uploads/wall.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `registeration`
--

CREATE TABLE `registeration` (
  `id` int(11) NOT NULL,
  `sname` varchar(25) NOT NULL,
  `semail` varchar(50) NOT NULL,
  `passwd` varchar(50) NOT NULL,
  `cpasswd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registeration`
--

INSERT INTO `registeration` (`id`, `sname`, `semail`, `passwd`, `cpasswd`) VALUES
(5, 'ASHISH TRIVEDI', 'dummy@gmail.com', '123', '123'),
(6, 'Mahesh Gurunani', 'mahesh@gmail.com', '123', '123'),
(7, 'Siddhi Mam', 'siddhi@gmail.com', '123', '123'),
(8, 'Riddhi Mam ', 'riddhi@gmail.com', '123', '123'),
(9, 'Ashish Trivedi', 'trivedi@gmail.com', '123', '123'),
(10, 'Pandey sir', 'pandey@gmail.com', '123', '123'),
(11, 'Trivedi Sir', 'trivedisir@gmail.com', '123', '123'),
(12, 'ANURAG GUPTA', 'anuraggupta8309@gmail.com', '123', '123');

-- --------------------------------------------------------

--
-- Table structure for table `research_lab`
--

CREATE TABLE `research_lab` (
  `id` int(11) NOT NULL,
  `labName` varchar(25) NOT NULL,
  `labLocation` varchar(50) NOT NULL,
  `department` varchar(25) NOT NULL,
  `totalCost` varchar(20) NOT NULL,
  `labDescription` varchar(50) NOT NULL,
  `labSponsors` varchar(20) NOT NULL,
  `labDate` date NOT NULL,
  `labPhoto` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `research_lab`
--

INSERT INTO `research_lab` (`id`, `labName`, `labLocation`, `department`, `totalCost`, `labDescription`, `labSponsors`, `labDate`, `labPhoto`) VALUES
(1, '0', 'MUMBAI', '', '', '', '', '2023-10-03', 'C:\\xampp\\htdocs\\CRMS/uploads/pickup.jpeg'),
(3, '0', 'THAKUR CLG', 'IT', '150000000', 'IT COMANY CONSULTANCY', 'THAKUR JITENDRA SING', '2023-10-04', 'C:\\xampp\\htdocs\\CRMS/uploads/wall-black.jpeg'),
(4, 'INFOSYS INFOTECH', 'THAKUR CLG', 'IT', '150000000', 'IT COMANY CONSULTANCY', 'THAKUR JITENDRA SING', '2023-10-04', 'C:\\xampp\\htdocs\\CRMS/uploads/wall-black.jpeg'),
(5, 'INFOSYS INFOTECH', 'THAKUR CLG', 'IT', '150000000', 'IT COMANY CONSULTANCY', 'THAKUR JITENDRA SING', '2023-10-04', 'C:\\xampp\\htdocs\\CRMS/uploads/wall-black.jpeg'),
(7, 'INFOSYS INFOTECH', 'THAKUR CLG', 'IT', '150000000', 'IT COMANY CONSULTANCY', 'THAKUR JITENDRA SING', '2023-10-04', 'C:\\xampp\\htdocs\\CRMS/uploads/wall-black.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `research_labs_organized`
--

CREATE TABLE `research_labs_organized` (
  `id` int(11) NOT NULL,
  `labTitle` varchar(25) NOT NULL,
  `labOrganizedBy` varchar(24) NOT NULL,
  `labDate` date NOT NULL,
  `labLocation` varchar(25) NOT NULL,
  `labLevel` varchar(25) NOT NULL,
  `labPhoto` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `research_labs_organized`
--

INSERT INTO `research_labs_organized` (`id`, `labTitle`, `labOrganizedBy`, `labDate`, `labLocation`, `labLevel`, `labPhoto`) VALUES
(1, 'INFOSYS LAB', 'GIRISH SIR', '2023-10-09', 'MUMBAI', 'HIGER', ''),
(2, 'INFOSYS LAB', 'GIRISH SIR', '2023-10-09', 'MUMBAI', 'HIGER', ''),
(3, 'INFOSYS LAB', 'GIRISH SIR', '2023-10-09', 'MUMBAI', 'HIGER', ''),
(4, 'hfds', 'sdafsfd', '2023-10-11', 'MUMBAI', 'HIGER', ''),
(5, 'MARKETING', 'ASHISH SIR', '2023-10-03', 'MUMBAI', 'ADV.', ''),
(6, 'MARKETING', 'ASHISH SIR', '2023-10-03', 'MUMBAI', 'ADV.', '');

-- --------------------------------------------------------

--
-- Table structure for table `seminar_organized`
--

CREATE TABLE `seminar_organized` (
  `id` int(11) NOT NULL,
  `stitle` varchar(25) NOT NULL,
  `speaker` varchar(25) NOT NULL,
  `seminarOrganizedBy` varchar(52) NOT NULL,
  `seminarDate` date NOT NULL,
  `profileSpeaker` varchar(25) NOT NULL,
  `ac_year` varchar(25) NOT NULL,
  `seminarOrganizedAt` varchar(225) NOT NULL,
  `totParticipants` int(11) NOT NULL,
  `dept` varchar(25) NOT NULL,
  `seminarLevel` varchar(25) NOT NULL,
  `seminarStartTime` time NOT NULL,
  `seminarEndTime` time NOT NULL,
  `seminarPhoto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seminar_organized`
--

INSERT INTO `seminar_organized` (`id`, `stitle`, `speaker`, `seminarOrganizedBy`, `seminarDate`, `profileSpeaker`, `ac_year`, `seminarOrganizedAt`, `totParticipants`, `dept`, `seminarLevel`, `seminarStartTime`, `seminarEndTime`, `seminarPhoto`) VALUES
(24, 'DATA', 'AKASH ', 'MAHESH SIR', '2023-10-08', 'BUSINESS ANALYST', '2023', 'Thakur College of Science and Commerce is a college located in Kandivali, Mumbai in the state of Maharashtra, India ', 604, 'COMPUTER SCIENCE', 'college', '04:00:00', '17:09:00', 'C:\\xampp\\htdocs\\CRMS/uploads/wall-black.jpeg'),
(25, 'CAREER GROWTH', 'AKASH SIR', 'AJAREKAR SIR', '2023-10-04', 'BUSINESS ANALYST', '2023', 'Thakur College of Science and Commerce is a college located in Kandivali, Mumbai in the state of Maharashtra, India ', 604, 'COMPUTER SCIENCE', 'college', '04:00:00', '17:09:00', 'C:\\xampp\\htdocs\\CRMS/uploads/wall-black.jpeg'),
(27, 'CAREER GROWTH', 'AKASH SIR', 'AJAREKAR SIR', '2023-10-04', 'BUSINESS ANALYST', '2023', 'Thakur College of Science and Commerce is a college located in Kandivali, Mumbai in the state of Maharashtra, India ', 604, 'COMPUTER SCIENCE', 'college', '04:00:00', '17:09:00', 'C:\\xampp\\htdocs\\CRMS/uploads/wall-black.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `workshop_organized`
--

CREATE TABLE `workshop_organized` (
  `id` int(11) NOT NULL,
  `wtitle` varchar(25) NOT NULL,
  `res_person` varchar(25) NOT NULL,
  `worganized` varchar(25) NOT NULL,
  `wdate` date NOT NULL,
  `profile_person` varchar(25) NOT NULL,
  `ac_year` int(24) NOT NULL,
  `tech` varchar(25) NOT NULL,
  `OrganizedAt` varchar(255) NOT NULL,
  `totparticipant` int(11) NOT NULL,
  `dept` varchar(25) NOT NULL,
  `level` varchar(25) NOT NULL,
  `stime` time NOT NULL,
  `etime` time NOT NULL,
  `photo` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `workshop_organized`
--

INSERT INTO `workshop_organized` (`id`, `wtitle`, `res_person`, `worganized`, `wdate`, `profile_person`, `ac_year`, `tech`, `OrganizedAt`, `totparticipant`, `dept`, `level`, `stime`, `etime`, `photo`) VALUES
(2, 'ANDROID DEVELOPMENT', 'SACHIN SIR', 'MAHESH SIR', '2023-07-09', 'ANDROID DEVELOPER', 2023, 'KOTLIN,ANDROID STUDIO', 'Thakur College of Science and Commerce is a college located in Kandivali, Mumbai in the state of Maharashtra, India', 140, 'COMPUTER SCIENCE', 'college', '09:00:00', '18:00:00', ''),
(3, 'MERN', 'Ankit SIR', 'Ashish SIR', '2023-10-09', 'FULL  STACK PROGAMMER', 2023, 'MERN', 'Thakur College of Science and Commerce is a college located in Kandivali, Mumbai in the state of Maharashtra, Indi', 85, 'COMPUTER SCIENCE', 'college', '11:00:00', '17:00:00', ''),
(5, '', '', '', '0000-00-00', '', 0, '', '', 0, '', '', '00:00:00', '00:00:00', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `collaboration_info`
--
ALTER TABLE `collaboration_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consultancy_organized`
--
ALTER TABLE `consultancy_organized`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registeration`
--
ALTER TABLE `registeration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `research_lab`
--
ALTER TABLE `research_lab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `research_labs_organized`
--
ALTER TABLE `research_labs_organized`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seminar_organized`
--
ALTER TABLE `seminar_organized`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workshop_organized`
--
ALTER TABLE `workshop_organized`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `collaboration_info`
--
ALTER TABLE `collaboration_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `consultancy_organized`
--
ALTER TABLE `consultancy_organized`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `registeration`
--
ALTER TABLE `registeration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `research_lab`
--
ALTER TABLE `research_lab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `research_labs_organized`
--
ALTER TABLE `research_labs_organized`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `seminar_organized`
--
ALTER TABLE `seminar_organized`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `workshop_organized`
--
ALTER TABLE `workshop_organized`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
