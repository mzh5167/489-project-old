-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 09, 2022 at 04:45 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tmp0`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `paymentMethod` enum('paypal','apple-pay','benefit-pay') NOT NULL,
  `timeSlotId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `seatStart` char(2) NOT NULL,
  `seatEnd` char(2) NOT NULL,
  `status` enum('pending','complete','canceled','suspended') NOT NULL DEFAULT 'pending',
  `fee` decimal(3,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int(11) NOT NULL,
  `name` varchar(31) NOT NULL,
  `addr` varchar(63) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name`, `addr`) VALUES
(1, 'City centre cinema', 'city centre mall'),
(2, 'Juffair Cinema', 'Juffair Oasis mall');

-- --------------------------------------------------------

--
-- Table structure for table `halls`
--

CREATE TABLE `halls` (
  `id` int(11) NOT NULL,
  `letter` char(1) NOT NULL,
  `branchId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `halls`
--

INSERT INTO `halls` (`id`, `letter`, `branchId`) VALUES
(1, 'A', 1),
(2, 'B', 1),
(3, 'A', 2),
(4, 'B', 2),
(5, 'C', 2);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(31) DEFAULT NULL,
  `email` varchar(31) DEFAULT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(31) NOT NULL,
  `releaseYear` int(11) NOT NULL,
  `lang` varchar(7) NOT NULL,
  `duration` int(11) NOT NULL,
  `rating` decimal(2,1) NOT NULL,
  `genre` enum('action','animation','comedy','crime','drama','fantasy','horror','romance','sci-fi','thriller','superhero','adventure') NOT NULL,
  `desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `releaseYear`, `lang`, `duration`, `rating`, `genre`, `desc`) VALUES
(1, 'btmn', 2014, 'en', 90, '1.3', 'drama', 'descccc'),
(2, 'btmn', 2014, 'en', 90, '1.3', 'drama', 'descccc'),
(29, 'hkjl', 2017, 'en', 99, '2.0', 'drama', 'jkjj'),
(30, 'uywerui', 2034, 'en', 99, '2.0', 'drama', 'deskjl');

-- --------------------------------------------------------

--
-- Table structure for table `timeSlots`
--

CREATE TABLE `timeSlots` (
  `id` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `branchId` int(11) NOT NULL,
  `movieId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fName` varchar(31) NOT NULL,
  `lName` varchar(31) NOT NULL,
  `email` varchar(31) NOT NULL,
  `birthday` date NOT NULL,
  `hash` varchar(255) NOT NULL,
  `credit` decimal(4,1) NOT NULL DEFAULT 0.0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fName`, `lName`, `email`, `birthday`, `hash`, `credit`) VALUES
(1, 'M', 'H', 'test@example.com', '2002-01-01', 'TxQtfVPQXck=', '0.0'),
(2, 'm', 'h', 'r@gmail.com', '1990-12-12', '$2y$10$LPNpW8IFHTBDOK4M8iMSS.JetrFqbtXCf.dzFQOdq1mUJ9yQHAevK', '0.0'),
(3, 'MMM', 'HHH', 'r@gmail.co', '2018-08-07', '$2y$10$38miqRnphcC/1XmXfs5ivOiKFd1R7EjDsHQJOzO2SW0SZprKiJDsK', '0.0'),
(5, 'jjj', 'kkk', 'hjkl@gmail.com', '2078-05-10', '$2y$10$9VrulGSQBJ5CCZjbF7nQfOaUH.8F2yPSd4y3DfKSgETkkZlCEigYe', '0.0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_bookings_timeslotid` (`timeSlotId`),
  ADD KEY `fk_bookings_userid` (`userId`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `halls`
--
ALTER TABLE `halls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_halls_branchid` (`branchId`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timeSlots`
--
ALTER TABLE `timeSlots`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_timeslots_branchid` (`branchId`),
  ADD KEY `fk_timeslots_movieid` (`movieId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `halls`
--
ALTER TABLE `halls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `timeSlots`
--
ALTER TABLE `timeSlots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `fk_bookings_timeslotid` FOREIGN KEY (`timeSlotId`) REFERENCES `timeSlots` (`id`),
  ADD CONSTRAINT `fk_bookings_userid` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

--
-- Constraints for table `halls`
--
ALTER TABLE `halls`
  ADD CONSTRAINT `fk_halls_branchid` FOREIGN KEY (`branchId`) REFERENCES `branches` (`id`);

--
-- Constraints for table `timeSlots`
--
ALTER TABLE `timeSlots`
  ADD CONSTRAINT `fk_timeslots_branchid` FOREIGN KEY (`branchId`) REFERENCES `branches` (`id`),
  ADD CONSTRAINT `fk_timeslots_movieid` FOREIGN KEY (`movieId`) REFERENCES `movies` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
