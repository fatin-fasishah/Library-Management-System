-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2026 at 04:46 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `mybookreserve`
--

CREATE TABLE `mybookreserve` (
  `bookreserveid` int(11) NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `studentid` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `pickupdate` date DEFAULT NULL,
  `returndate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mybookreserve`
--

INSERT INTO `mybookreserve` (`bookreserveid`, `fullname`, `studentid`, `email`, `pickupdate`, `returndate`) VALUES
(34, 'shazlinadriana', 'SWE24070987', 'shazlin@gmail.com', '2026-05-29', '2026-05-30'),
(35, 'fatinfasishah', 'SWE24070645', 'fatinfasishah0307@gmail.com', '2026-06-04', '2026-06-06'),
(36, 'imanajihah', 'SWE24070345', 'iman@gmail.com', '2026-06-02', '2026-06-06'),
(39, 'syarifahsyakirah', 'SWE24070233', 'syarifah@gmail.com', '2026-06-09', '2026-06-13');

-- --------------------------------------------------------

--
-- Table structure for table `myprintrequest`
--

CREATE TABLE `myprintrequest` (
  `printid` int(11) NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `studentid` varchar(20) DEFAULT NULL,
  `printtype` varchar(20) DEFAULT NULL,
  `pages` int(11) DEFAULT NULL,
  `copies` int(11) DEFAULT NULL,
  `doublesided` varchar(5) DEFAULT NULL,
  `totalcost` decimal(10,2) DEFAULT NULL,
  `pickuptime` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `myprintrequest`
--

INSERT INTO `myprintrequest` (`printid`, `fullname`, `studentid`, `printtype`, `pages`, `copies`, `doublesided`, `totalcost`, `pickuptime`) VALUES
(14, 'imanajihah', 'SWE24070345', 'Black & White', 5, 3, 'Yes', 3.75, '9:00 AM'),
(15, 'ainsofea', 'SWE24070316', 'Color', 10, 5, 'Yes', 32.50, '2:00 PM'),
(16, 'syarifahsyakirah', 'SWE24070233', 'Black & White', 1, 1, 'No', 0.10, '11:00 AM'),
(17, 'fatinfasishah', 'SWE24070645', 'Color', 2, 2, 'Yes', 2.60, '10:00 AM');

-- --------------------------------------------------------

--
-- Table structure for table `mystudents`
--

CREATE TABLE `mystudents` (
  `studentid` varchar(20) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mystudents`
--

INSERT INTO `mystudents` (`studentid`, `fullname`, `password`, `gender`) VALUES
('', '', '', ''),
('SWE24070028', 'imannajihah', '123456', 'Female'),
('SWE24070029', 'ainsofea', '123456', 'Female'),
('SWE24070030', 'nurfatin', '123456', 'Female'),
('SWE24070031', 'testuser', '123456', 'Male'),
('SWE24070645', 'shazlinadriana', 'kucingcomel', 'female'),
('SWE24070765', 'syarifah', '123456', 'Female'),
('SWE24567890', 'fatin', '123456', 'female');

-- --------------------------------------------------------

--
-- Table structure for table `mystudyroom`
--

CREATE TABLE `mystudyroom` (
  `roomid` int(11) NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `studentid` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `roomnumber` varchar(20) DEFAULT NULL,
  `bookingdate` date DEFAULT NULL,
  `starttime` varchar(10) DEFAULT NULL,
  `endtime` varchar(10) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `purpose` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mystudyroom`
--

INSERT INTO `mystudyroom` (`roomid`, `fullname`, `studentid`, `email`, `roomnumber`, `bookingdate`, `starttime`, `endtime`, `duration`, `purpose`) VALUES
(32, 'imanajihah', 'SWE24070345', 'iman@gmail.com', 'Room 102', '2026-06-02', '08:00', '12:00', 4, 'Exam prep'),
(33, 'ainsofea', 'SWE24070316', 'ain@gmail.com', 'Room 101', '2026-06-04', '15:00', '17:00', 2, 'Group project'),
(34, 'syarifahsyakirah', 'SWE24070233', 'syarifah@gmail.com', 'Room 104', '2026-06-03', '12:00', '17:00', 5, 'Exam prep'),
(35, 'fatinfasishah', 'SWE24070645', 'fatinfasishah0307@gmail.com', 'Room 101', '2026-06-05', '08:00', '15:00', 7, 'Assignment discussion');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mybookreserve`
--
ALTER TABLE `mybookreserve`
  ADD PRIMARY KEY (`bookreserveid`),
  ADD KEY `studentid` (`studentid`);

--
-- Indexes for table `myprintrequest`
--
ALTER TABLE `myprintrequest`
  ADD PRIMARY KEY (`printid`),
  ADD KEY `fk_student` (`studentid`);

--
-- Indexes for table `mystudents`
--
ALTER TABLE `mystudents`
  ADD PRIMARY KEY (`studentid`);

--
-- Indexes for table `mystudyroom`
--
ALTER TABLE `mystudyroom`
  ADD PRIMARY KEY (`roomid`),
  ADD KEY `studentid` (`studentid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mybookreserve`
--
ALTER TABLE `mybookreserve`
  MODIFY `bookreserveid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `myprintrequest`
--
ALTER TABLE `myprintrequest`
  MODIFY `printid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `mystudyroom`
--
ALTER TABLE `mystudyroom`
  MODIFY `roomid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
