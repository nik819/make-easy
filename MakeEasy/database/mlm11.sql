-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2020 at 02:54 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mlm11`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `adminid` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `adminid`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `id` int(11) NOT NULL,
  `userid` varchar(50) DEFAULT NULL,
  `day_bal` int(11) DEFAULT 0,
  `current_bal` int(11) DEFAULT 0,
  `total_bal` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`id`, `userid`, `day_bal`, `current_bal`, `total_bal`) VALUES
(1, 'dashrath@gmail.com', 100, 0, 100),
(2, 'rutvik@gmail.com', 0, 0, 0),
(3, 'nikhil@gmail.com', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `income_received`
--

CREATE TABLE `income_received` (
  `id` int(11) NOT NULL,
  `userid` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `income_received`
--

INSERT INTO `income_received` (`id`, `userid`, `amount`, `date`) VALUES
(1, 'dashrath@gmail.com', 100, '2020-03-13');

-- --------------------------------------------------------

--
-- Table structure for table `pin_list`
--

CREATE TABLE `pin_list` (
  `id` int(11) NOT NULL,
  `userid` varchar(50) NOT NULL,
  `pin` int(11) NOT NULL,
  `status` enum('open','close') NOT NULL DEFAULT 'open'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pin_list`
--

INSERT INTO `pin_list` (`id`, `userid`, `pin`, `status`) VALUES
(1, 'dashrath@gmail.com', 114597, 'close'),
(2, 'dashrath@gmail.com', 510549, 'close'),
(3, 'dashrath@gmail.com', 624243, 'open'),
(4, 'dashrath@gmail.com', 721256, 'open'),
(5, 'dashrath@gmail.com', 460381, 'open'),
(6, 'dashrath@gmail.com', 812577, 'open'),
(7, 'dashrath@gmail.com', 806476, 'open');

-- --------------------------------------------------------

--
-- Table structure for table `pin_request`
--

CREATE TABLE `pin_request` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` enum('open','close') NOT NULL DEFAULT 'open'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pin_request`
--

INSERT INTO `pin_request` (`id`, `email`, `amount`, `date`, `status`) VALUES
(1, 'dashrath@gmail.com', 2700, '2020-02-15', 'close'),
(2, 'dashrath@gmail.com', 300, '2020-03-13', 'open');

-- --------------------------------------------------------

--
-- Table structure for table `tree`
--

CREATE TABLE `tree` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `userid` varchar(50) DEFAULT NULL,
  `left` varchar(50) DEFAULT NULL,
  `right` varchar(50) DEFAULT NULL,
  `leftcount` int(11) DEFAULT 0,
  `rightcount` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tree`
--

INSERT INTO `tree` (`id`, `name`, `userid`, `left`, `right`, `leftcount`, `rightcount`) VALUES
(1, 'Dashrat', 'dashrath@gmail.com', 'rutvik@gmail.com', 'nikhil@gmail.com', 1, 1),
(2, 'Rutvik', 'rutvik@gmail.com', NULL, NULL, 0, 0),
(3, 'Nikhil', 'nikhil@gmail.com', NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address` text NOT NULL,
  `account` varchar(11) NOT NULL,
  `under_userid` varchar(50) DEFAULT NULL,
  `side` enum('left','right','center') NOT NULL DEFAULT 'center'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `mobile`, `address`, `account`, `under_userid`, `side`) VALUES
(1, 'Dashrath', 'dashrath@gmail.com', '123456', '8758247767', 'Mahuva', '78451232655', NULL, 'center'),
(2, 'Rutvik', 'rutvik@gmail.com', '123456', '7359101428', 'Mahuva', '78454545454', 'dashrath@gmail.com', 'left'),
(3, 'Nikhil', 'nikhil@gmail.com', '123456', '8980255629', 'Bhutnath', '84458454544', 'dashrath@gmail.com', 'right');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income_received`
--
ALTER TABLE `income_received`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pin_list`
--
ALTER TABLE `pin_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pin_request`
--
ALTER TABLE `pin_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tree`
--
ALTER TABLE `tree`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `income_received`
--
ALTER TABLE `income_received`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pin_list`
--
ALTER TABLE `pin_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pin_request`
--
ALTER TABLE `pin_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tree`
--
ALTER TABLE `tree`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
