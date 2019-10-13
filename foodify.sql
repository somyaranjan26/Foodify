-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2019 at 07:19 AM
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
(54, 'RIevEdk4zrJ1gM', 'sf3tfsf3fsadf3s', 'bSYfMmW4tWmPN6', '13/10/2019', '08:31:53AM'),
(55, 'lJNIO3WEZH5nXq', 'sf3tfsf3fsadf3s', 'bSYfMmW4tWmPN6', '13/10/2019', '08:31:53AM'),
(56, 'l4rorJZnrW4v5d', 'sf3tfsf3fsadf3s', 'bSYfMmW4tWmPN6', '13/10/2019', '08:31:53AM'),
(57, 'mGkOrqlcYDj2Jt', 'sf3tfsf3fsadf3s', 'bSYfMmW4tWmPN6', '13/10/2019', '08:31:53AM'),
(58, 'yTBmDsYmCqusLh', 'du8sd82hdsjdha', 'bSYfMmW4tWmPN6', '13/10/2019', '08:33:44AM'),
(60, 'jOiaFafkw7jU65', 'sf3tfsf3fsadf3s', 'bSYfMmW4tWmPN6', '13/10/2019', '09:33:34AM'),
(61, 'yseZFr4WTzxIzA', 'sf3tfsf3fsadf3s', 'bSYfMmW4tWmPN6', '13/10/2019', '09:33:34AM'),
(62, '2Be4kV5VlZCTIx', 'sf3tfsf3fsadf3s', 'bSYfMmW4tWmPN6', '13/10/2019', '09:33:34AM'),
(63, 'PT4WyGIpvMEGjZ', 'sf3tfsf3fsadf3s', 'bSYfMmW4tWmPN6', '13/10/2019', '09:33:34AM'),
(70, 'GJqeBchEIKwvBb', '345dwef32rf3sfsfd', '2RIqL6yHWWwdqI', '13/10/2019', '10:31:07AM'),
(71, 'OpW1OrADNZWGhn', '345dwef32rf3sfsfd', '2RIqL6yHWWwdqI', '13/10/2019', '10:31:07AM'),
(72, 'xKkbmqzZV73Seh', '345dwef32rf3sfsfd', '2RIqL6yHWWwdqI', '13/10/2019', '10:31:07AM'),
(73, 'vZoM42Y4iZSjM9', '345dwef32rf3sfsfd', '2RIqL6yHWWwdqI', '13/10/2019', '10:31:07AM'),
(74, '2GGCbvuqUF1F9d', '345dwef32rf3sfsfd', '2RIqL6yHWWwdqI', '13/10/2019', '10:31:07AM'),
(75, 'GJAiSWW5NxmSl5', '345dwef32rf3sfsfd', '2RIqL6yHWWwdqI', '13/10/2019', '10:31:07AM'),
(76, '8LFgrrSSpEwLmz', '345dwef32rf3sfsfd', '2RIqL6yHWWwdqI', '13/10/2019', '10:31:07AM'),
(77, 'nJlc6vYgR6zLOv', '345dwef32rf3sfsfd', '2RIqL6yHWWwdqI', '13/10/2019', '10:31:07AM'),
(78, 'nEFz4xg9VVsxxt', '345dwef32rf3sfsfd', '2RIqL6yHWWwdqI', '13/10/2019', '10:31:07AM'),
(79, 'PvV8YctY12NWGl', '345dwef32rf3sfsfd', '2RIqL6yHWWwdqI', '13/10/2019', '10:31:07AM'),
(80, '42g3KbVcHCJ9WU', '345dwef32rf3sfsfd', '2RIqL6yHWWwdqI', '13/10/2019', '10:31:07AM'),
(81, 'vi7P1a3Jh3owb7', '345dwef32rf3sfsfd', '2RIqL6yHWWwdqI', '13/10/2019', '10:31:07AM'),
(82, 'k8VdTcWU9EN4T8', '345dwef32rf3sfsfd', '2RIqL6yHWWwdqI', '13/10/2019', '10:31:07AM'),
(83, 'fBxK3WPZ2zpptq', 'sf939whf9sdfjs', '2RIqL6yHWWwdqI', '13/10/2019', '10:32:59AM'),
(84, '2STWLdvnLm7Azz', 'sf3tfsf3fsadf3s', 'bSYfMmW4tWmPN6', '13/10/2019', '10:48:42AM'),
(85, 'I8LNjkdvSXmtuc', 'sf3tfsf3fsadf3s', 'bSYfMmW4tWmPN6', '13/10/2019', '10:48:42AM'),
(86, 'JLdMWC2Uxl5L6K', 'sf3tfsf3fsadf3s', 'bSYfMmW4tWmPN6', '13/10/2019', '10:48:42AM'),
(87, 'rNmkYGNW2JWvJs', 'sf3tfsf3fsadf3s', 'bSYfMmW4tWmPN6', '13/10/2019', '10:48:42AM'),
(88, 'ZUWE6u6OKgcfm6', 'sf3tfsf3fsadf3s', 'bSYfMmW4tWmPN6', '13/10/2019', '10:48:42AM'),
(89, '9WrJzFczMbdMWm', 'sf3tfsf3fsadf3s', 'bSYfMmW4tWmPN6', '13/10/2019', '10:48:42AM'),
(90, '7Nedqwu2V9MDWx', 'sf3tfsf3fsadf3s', 'bSYfMmW4tWmPN6', '13/10/2019', '10:48:42AM'),
(91, 'yEOBqfPoW49kSd', 'sf3tfsf3fsadf3s', 'bSYfMmW4tWmPN6', '13/10/2019', '10:48:42AM'),
(92, '1CnxAURLJ7nDth', 'sf3tfsf3fsadf3s', 'bSYfMmW4tWmPN6', '13/10/2019', '10:48:42AM'),
(93, 'SfJCLq5F49Ekzw', 'sf3tfsf3fsadf3s', 'bSYfMmW4tWmPN6', '13/10/2019', '10:48:42AM');

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
(5, '2RIqL6yHWWwdqI', 'Ankit', 'sankit945@gmail.com', 'ankit123', 'f3fq3fqasdfsfdsa'),
(6, 'bSYfMmW4tWmPN6', 'Vishu', 'vishweswar53@gmail.com', 'vishu123', 'j5j5jhythdfh4hs'),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

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
