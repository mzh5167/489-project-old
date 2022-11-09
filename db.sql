-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 08, 2022 at 08:14 PM
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
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
