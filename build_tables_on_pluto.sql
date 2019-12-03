-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 20, 2019 at 06:15 PM
-- Server version: 10.3.18-MariaDB
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jhp232`
--

-- --------------------------------------------------------

--
-- Table structure for table `classics`
--

CREATE TABLE IF NOT EXISTS `classics` (
  `author` varchar(128) DEFAULT NULL,
  `title` varchar(128) DEFAULT NULL,
  `category` varchar(16) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `isbn` char(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classics`
--

INSERT INTO `classics` (`author`, `title`, `category`, `year`, `isbn`) VALUES
('Charles Dickens', 'The Old Curiosity Shop', 'Fiction', 1841, '9780099533474'),
('Charles Dickens', 'Little Dorrit', 'Fiction', 1857, '9780141439969'),
('William Shakespeare', 'Romeo and Juliet', 'Play', 1594, '9780192814968'),
('Charles Darwin', 'The Origin of Species', 'Non-Fiction', 1856, '9780517123201'),
('Jane Austen', 'Pride and Prejudice', 'Fiction', 1811, '9780582506206'),
('Mark Twain', 'The Adventures of Tom Sawyer', 'Fiction', 1876, '9781598184891');

-- --------------------------------------------------------

--
-- Table structure for table `INVENTORY`
--

CREATE TABLE IF NOT EXISTS `INVENTORY` (
  `shirtID` varchar(20) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `size` varchar(20) DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL,
  `sleeve` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `INVENTORY`
--

INSERT INTO `INVENTORY` (`shirtID`, `price`, `quantity`, `size`, `color`, `sleeve`) VALUES
('000021', 10.55, 7, 'XXX-Large', 'Black', 'short'),
('000069', 12.69, 13, 'XX-Large', 'Teal', 'long'),
('000121', 13.45, 22, 'Large', 'Maroon', 'long'),
('000123', 25.99, 13, 'Small', 'Blue', 'short'),
('000154', 19.99, 9, 'Large', 'Purple', 'short'),
('000212', 15.99, 15, 'X-Small', 'Orange', 'long'),
('000382', 7.99, 7, 'Medium', 'Green', 'short'),
('000412', 21.99, 20, 'X-Large', 'Red', 'long'),
('000567', 6.79, 4, 'Small', 'White', 'long'),
('042069', 16.75, 5, 'Medium', 'Yellow', 'short');

-- --------------------------------------------------------

--
-- Table structure for table `lab4_users`
--

CREATE TABLE IF NOT EXISTS `lab4_users` (
  `forename` varchar(32) NOT NULL,
  `surname` varchar(32) NOT NULL,
  `type` varchar(10) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lab4_users`
--

INSERT INTO `lab4_users` (`forename`, `surname`, `type`, `username`, `password`) VALUES
('Super', 'User', 'admin', 'admin', '6e8204c0862ec8abecb49762f0899554'),
('Bill', 'Smith', 'user', 'bsmith', '32aa0c466818e1ccba25b8793db98c94'),
('Pauline', 'Jones', 'user', 'pjones', '53eb1f29c1f8a132441a4fad1d6f667d');

-- --------------------------------------------------------

--
-- Table structure for table `USERS`
--

CREATE TABLE IF NOT EXISTS `USERS` (
  `email` varchar(75) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(25) NOT NULL,
  `cc_num` varchar(25) NOT NULL,
  `mail_address` varchar(90) NOT NULL,
  `reward_points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `USERS`
--

INSERT INTO `USERS` (`email`, `user_name`, `password`, `cc_num`, `mail_address`, `reward_points`) VALUES
('bossman@msstate.edu', 'The Boss', 'makemeadmin', '123456789', '804 Alexis Ave Starkville, MS 39751', 0),
('jared@msstate.edu', 'Jared Oakes', 'jared', '123456789', '804 Alexis Ave Starkville, MS 39751', 9),
('jayden@msstate.edu', 'Jayden Rushing', 'jayden', '123456789', '804 Alexis Ave Starkville, MS 39751', 12),
('joe@msstate.edu', 'Joe Patterson', 'joe', '123456789', '804 Alexis Ave Starkville, MS 39751', 0),
('laura@msstate.edu', 'Laura Creekmore', 'laura', '123456789', '804 Alexis Ave Starkville, MS 39751', 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classics`
--
ALTER TABLE `classics`
  ADD PRIMARY KEY (`isbn`),
  ADD KEY `author` (`author`(20)),
  ADD KEY `category` (`category`(4));

--
-- Indexes for table `INVENTORY`
--
ALTER TABLE `INVENTORY`
  ADD PRIMARY KEY (`shirtID`);

--
-- Indexes for table `lab4_users`
--
ALTER TABLE `lab4_users`
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `USERS`
--
ALTER TABLE `USERS`
  ADD PRIMARY KEY (`email`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
