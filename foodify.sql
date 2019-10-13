-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2019 at 06:37 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodify`
--

-- --------------------------------------------------------

--
-- Table structure for table `calories`
--

CREATE TABLE `calories` (
  `id` int(11) NOT NULL,
  `foodid` varchar(233) NOT NULL,
  `name` varchar(333) NOT NULL,
  `calories` varchar(333) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calories`
--

INSERT INTO `calories` (`id`, `foodid`, `name`, `calories`) VALUES
(1, '345dwef32rf3sfsfd', 'lays waffers', '180'),
(2, 'du8sd82hdsjdha', 'balaji waffers', '165'),
(3, 'sf3tfsf3fsadf3s', 'parleg biscuit', '260'),
(4, 'j8o5i7jtyhdfgerge', 'krackjack biscuit', '300'),
(5, 'bisg8s8gd8s88', 'maggi noodles', '345'),
(6, 'sf939whf9sdfjs', 'pepsi can', '156');

-- --------------------------------------------------------

--
-- Table structure for table `intakes`
--

CREATE TABLE `intakes` (
  `id` int(11) NOT NULL,
  `intakeid` varchar(122) NOT NULL,
  `calorieid` varchar(122) NOT NULL,
  `uid` varchar(122) NOT NULL,
  `date` varchar(122) NOT NULL,
  `time` varchar(122) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `intakes`
--

INSERT INTO `intakes` (`id`, `intakeid`, `calorieid`, `uid`, `date`, `time`) VALUES
(35, 'Wo1HAmIkNyh6Pd', 'sf3tfsf3fsadf3s', '2RIqL6yHWWwdqI', '12/10/2019', '08:34:11PM'),
(36, 'Lc1onpbOzkyjE3', 'sf3tfsf3fsadf3s', '2RIqL6yHWWwdqI', '12/10/2019', '08:36:06PM'),
(37, '1oIYHbW8FrDZhE', '345dwef32rf3sfsfd', '2RIqL6yHWWwdqI', '12/10/2019', '08:37:03PM'),
(38, 'veO3ZxPLZzvcPf', 'bisg8s8gd8s88', '2RIqL6yHWWwdqI', '12/10/2019', '08:37:45PM'),
(39, 'sDhxqLwZFEg6JJ', '345dwef32rf3sfsfd', '2RIqL6yHWWwdqI', '12/10/2019', '08:38:27PM'),
(40, 'ZCKdbgmzguoEL2', '345dwef32rf3sfsfd', '2RIqL6yHWWwdqI', '12/10/2019', '08:43:59PM'),
(41, 'ZteDfj54OjicCH', '345dwef32rf3sfsfd', '2RIqL6yHWWwdqI', '12/10/2019', '08:45:04PM'),
(49, 'O7mEmXhgeWKAAW', 'sf939whf9sdfjs', '2RIqL6yHWWwdqI', '12/10/2019', '09:51:07PM');

-- --------------------------------------------------------

--
-- Table structure for table `nutritions`
--

CREATE TABLE `nutritions` (
  `id` int(11) NOT NULL,
  `nutritionid` varchar(122) NOT NULL,
  `foodid` varchar(122) NOT NULL,
  `fat` varchar(122) NOT NULL,
  `chol` varchar(122) NOT NULL,
  `carbo` varchar(122) NOT NULL,
  `protein` varchar(122) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nutritions`
--

INSERT INTO `nutritions` (`id`, `nutritionid`, `foodid`, `fat`, `chol`, `carbo`, `protein`) VALUES
(1, 'asdw223dasdadawee2', '345dwef32rf3sfsfd', '18 mg', '0 mg', '26 g', '3 g'),
(2, 'wdcszcxcwcwc', 'sf3tfsf3fsadf3s', '7 g', '0 g', '44 g', '4 g'),
(3, 'asdad3d2dadasd', 'du8sd82hdsjdha', '34.5 g', '0 g', '55.2 g', '6.5 g'),
(4, '3fqfsfdfsfwf32fe3', 'j8o5i7jtyhdfgerge', '21.4 g', '0 g', '69.2 g', '6.6 g'),
(5, 'fsdf3f3t34fqwef', 'bisg8s8gd8s88', '16 g', '0 g', '62 g', '11 g'),
(6, 'asd1ed2dasdadqwdasdasda', 'sf939whf9sdfjs', '0 g', '0 g', '41 g', '0 g');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `uid` varchar(122) NOT NULL,
  `name` varchar(122) NOT NULL,
  `email` varchar(122) NOT NULL,
  `password` varchar(122) NOT NULL,
  `fitbitid` varchar(122) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uid`, `name`, `email`, `password`, `fitbitid`) VALUES
(5, '2RIqL6yHWWwdqI', 'Fury', 'sankit945@gmail.com', 'ankit123', 'f3fq3fqasdfsfdsa'),
(6, 'bSYfMmW4tWmPN6', 'vishu', 'vishweswar53@gmail.com', 'vishu123', 'NULL'),
(7, '8wuCUhzYYUgmEZ', 'Somya', 'soumya@soumya.com', 'soumya', 'vxxverfeg34gdg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calories`
--
ALTER TABLE `calories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `intakes`
--
ALTER TABLE `intakes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nutritions`
--
ALTER TABLE `nutritions`
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
-- AUTO_INCREMENT for table `calories`
--
ALTER TABLE `calories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `intakes`
--
ALTER TABLE `intakes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `nutritions`
--
ALTER TABLE `nutritions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
