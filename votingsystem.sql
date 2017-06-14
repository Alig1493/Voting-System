-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2015 at 01:47 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `votingsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE IF NOT EXISTS `candidates` (
  `voter_id` int(100) NOT NULL,
  `wealth` varchar(25) NOT NULL,
  `party` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`voter_id`, `wealth`, `party`) VALUES
(710818, '23232', 'AL'),
(710820, '150 Lakh', 'Workers Party'),
(710821, '4123423', 'AL'),
(710822, '200 Lakh', 'AL'),
(710827, '33', 'BNP'),
(710828, '100', 'BNP'),
(710829, '21 Thousand', 'Workers Party');

-- --------------------------------------------------------

--
-- Table structure for table `electionstartend`
--

CREATE TABLE IF NOT EXISTS `electionstartend` (
  `electionid` int(25) NOT NULL,
  `starttime` datetime NOT NULL,
  `endtime` datetime NOT NULL,
  `publish` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `electionstartend`
--

INSERT INTO `electionstartend` (`electionid`, `starttime`, `endtime`, `publish`) VALUES
(2014, '2014-12-11 01:00:00', '2014-12-12 01:00:00', 1),
(2015, '2015-07-31 15:00:00', '2015-08-23 15:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `electionvotes`
--

CREATE TABLE IF NOT EXISTS `electionvotes` (
  `cand_name` varchar(25) NOT NULL,
  `party` varchar(25) NOT NULL,
  `vote_count` int(100) NOT NULL,
  `region` varchar(25) NOT NULL,
  `voter_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `electionvotes`
--

INSERT INTO `electionvotes` (`cand_name`, `party`, `vote_count`, `region`, `voter_id`) VALUES
('b b', 'AL', 0, 'khulna', 710818),
('c c', 'Workers Party', 4, 'dhaka', 710820),
('x x', 'AL', 32, 'dhaka', 710821),
('z z', 'AL', 1, 'rajshahi', 710822),
('o o', 'BNP', 2, 'barisal', 710827),
('p p', 'BNP', 0, 'rajshahi', 710828),
('r r', 'Workers Party', 0, 'barisal', 710829);

-- --------------------------------------------------------

--
-- Table structure for table `party_image`
--

CREATE TABLE IF NOT EXISTS `party_image` (
  `id` int(100) NOT NULL,
  `party` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `path` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `party_image`
--

INSERT INTO `party_image` (`id`, `party`, `name`, `path`, `type`) VALUES
(1, 'Workers Party', 'CPB.jpg', 'photo/CPB.jpg', 'image/jpeg'),
(2, 'BNP', '1934047_129458400987_2448524_n.jpg', 'photo/1934047_129458400987_2448524_n.jpg', 'image/jpeg'),
(3, 'AL', 'Symbol_of_Bangladesh_Awami_League.svg.png', 'photo/Symbol_of_Bangladesh_Awami_League.svg.png', 'image/png');

-- --------------------------------------------------------

--
-- Table structure for table `tblaccount`
--

CREATE TABLE IF NOT EXISTS `tblaccount` (
  `account_no` int(10) NOT NULL,
  `voter_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblaccount`
--

INSERT INTO `tblaccount` (`account_no`, `voter_id`, `username`, `password`) VALUES
(1, 999, 'admin', 'admin'),
(3, 987, 'mukit', 'mukit'),
(5, 0, 'g', 'g'),
(10, 1210374, 'ali', 'ali');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE IF NOT EXISTS `tblusers` (
  `voter_id` int(15) NOT NULL,
  `user_no` int(15) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `no_street` varchar(50) NOT NULL,
  `region` varchar(500) NOT NULL,
  `contact_no` int(15) NOT NULL,
  `dob` date NOT NULL,
  `age` int(3) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `user_type` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`voter_id`, `user_no`, `fname`, `mname`, `lname`, `no_street`, `region`, `contact_no`, `dob`, `age`, `gender`, `user_type`) VALUES
(999, 1, 'syed', ' ishtiaque', 'ahmad', '60/3,mohammadpur', 'dhaka', 123456, '1992-12-05', 22, 'male', 'Administrator'),
(987, 2, 'mukit', 'reza', 'mookipooo', '6/3,uttara', 'chittagong', 1233456, '1992-01-01', 22, 'Male', 'Regional officer'),
(1210374, 9, 'ali', 'b', 'george', 'farmgate', 'Dhaka', 2145879, '2014-02-13', 23, 'Male', 'Regional officer');

-- --------------------------------------------------------

--
-- Table structure for table `user_image`
--

CREATE TABLE IF NOT EXISTS `user_image` (
  `id` int(100) NOT NULL,
  `voter_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `path` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_image`
--

INSERT INTO `user_image` (`id`, `voter_id`, `name`, `path`, `type`) VALUES
(6, 1210374, '2463d511.bmp', 'images/2463d511.bmp', 'image/bmp'),
(8, 999, '4203d501.bmp', 'images/4203d501.bmp', 'image/bmp'),
(10, 987, '2463d301.bmp', 'images/2463d301.bmp', 'image/bmp');

-- --------------------------------------------------------

--
-- Table structure for table `voted`
--

CREATE TABLE IF NOT EXISTS `voted` (
  `voter_id` int(200) NOT NULL,
  `votedornot` int(11) NOT NULL DEFAULT '0',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `party` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voted`
--

INSERT INTO `voted` (`voter_id`, `votedornot`, `time`, `party`) VALUES
(710825, 1, '2015-08-07 11:44:18', 'Workers Party'),
(710826, 0, '2015-08-07 11:07:34', ''),
(710827, 0, '2015-08-07 11:11:39', ''),
(710828, 0, '2015-08-07 11:07:34', ''),
(710829, 0, '2015-08-07 11:07:34', ''),
(710830, 1, '2015-08-07 11:14:39', 'AL');

-- --------------------------------------------------------

--
-- Table structure for table `voter`
--

CREATE TABLE IF NOT EXISTS `voter` (
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `sex` varchar(7) NOT NULL,
  `age` varchar(5) NOT NULL,
  `address` varchar(25) NOT NULL,
  `region` varchar(25) NOT NULL,
  `phone` varchar(18) NOT NULL,
  `email` varchar(100) NOT NULL,
  `occupation` varchar(20) NOT NULL,
  `username` varchar(25) NOT NULL,
  `voter_id` int(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=710831 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voter`
--

INSERT INTO `voter` (`firstname`, `lastname`, `sex`, `age`, `address`, `region`, `phone`, `email`, `occupation`, `username`, `voter_id`) VALUES
('mandy', 'moore', 'F', '23', '118/East Tejturi Bazar', 'dhaka', '8120873', 'something@hotmail.co', 'Student', 'm', 710817),
('b', 'b', 'F', 'hggfh', '23', 'khulna', '76456', 'b', 'b', 'b', 710818),
('dfsf', 'sdfsff', 'Other', 'fsfdf', '1', 'barisal', '1231231', 'sdfafsfd', 'sadfasfdsaf', 'sdfdf', 710819),
('c', 'c', 'Male', 'sdfsd', '21', 'dhaka', '123', 'sdfsdf', 'sdfsf', 'c', 710820),
('x', 'x', 'Female', '1234s', '3', 'dhaka', '1231', 'something@hotmail.com', 'asdfasdfa', 'x', 710821),
('z', 'z', 'Male', 'sadfa', '2314', 'rajshahi', '1234', 'something@hotmail.co', 'fassdfsd', 'z', 710822),
('k', 'k', 'Male', '234gf', '234', 'chittagong', '234', 'something@hotmail.co', 'asdfsdf', 'k', 710823),
('wwwww', 'wwwwwww', 'Male', 'afkag', '23', 'dhaka', '12312315', 'asdasfas@gmail.com', 'student', 'www', 710825),
('l', 'l', 'Male', 'afafa', '12', 'barisal', '78979', 'f@fsd.com', 'sdfasf', 'l', 710826),
('o', 'o', 'Female', '4535', '12', 'barisal', '345', 'something@hotmail.co', 'sdfsf', 'o', 710827),
('p', 'p', 'Female', 'dfgsd', '13', 'rajshahi', '2345', 'something@hotmail.co', 'fsdf', 'p', 710828),
('r', 'r', 'Male', '13312', '21', 'barisal', '1244312', 'something@hotmail.com', 'r', 'r', 710829),
('w', 'w', 'Male', '21', '155656651561', 'rajshahi', '354564', 'something@hotmail.com', 'worker', 'w', 710830);

-- --------------------------------------------------------

--
-- Table structure for table `voter_image`
--

CREATE TABLE IF NOT EXISTS `voter_image` (
  `id` int(10) NOT NULL,
  `voter_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `path` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voter_image`
--

INSERT INTO `voter_image` (`id`, `voter_id`, `name`, `path`, `type`) VALUES
(2, 710817, 'contact3.jpg', 'photo/contact3.jpg', 'image/jpeg'),
(3, 710818, 'contact5.jpg', 'photo/contact5.jpg', 'image/jpeg'),
(5, 710820, 'contact5.jpg', 'photo/contact5.jpg', 'image/jpeg'),
(6, 710821, 'contact5.jpg', 'photo/contact5.jpg', 'image/jpeg'),
(7, 710822, 'contact5.jpg', 'photo/contact5.jpg', 'image/jpeg'),
(8, 710823, 'animated-question-mark-for-powerpoint-1256186461796715642question-mark-icon.svg.hi.png', 'photo/animated-question-mark-for-powerpoint-1256186461796715642question-mark-icon.svg.hi.png', 'image/png'),
(10, 710825, '2463d291.bmp', 'photo/2463d291.bmp', 'image/bmp'),
(11, 710826, '2463d331.bmp', 'photo/2463d331.bmp', 'image/bmp'),
(12, 710827, '4202d381.bmp', 'photo/4202d381.bmp', 'image/bmp'),
(13, 710828, '4202d501.bmp', 'photo/4202d501.bmp', 'image/bmp'),
(14, 710829, '4203d531.bmp', 'photo/4203d531.bmp', 'image/bmp'),
(15, 710830, '2463d501.bmp', 'photo/2463d501.bmp', 'image/bmp');

-- --------------------------------------------------------

--
-- Table structure for table `winner`
--

CREATE TABLE IF NOT EXISTS `winner` (
  `electionid` int(50) NOT NULL,
  `party` varchar(50) NOT NULL,
  `votes` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`voter_id`,`party`);

--
-- Indexes for table `electionstartend`
--
ALTER TABLE `electionstartend`
  ADD PRIMARY KEY (`electionid`);

--
-- Indexes for table `electionvotes`
--
ALTER TABLE `electionvotes`
  ADD PRIMARY KEY (`voter_id`), ADD UNIQUE KEY `voter_id` (`voter_id`), ADD KEY `voter_id_2` (`voter_id`);

--
-- Indexes for table `party_image`
--
ALTER TABLE `party_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblaccount`
--
ALTER TABLE `tblaccount`
  ADD PRIMARY KEY (`account_no`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`user_no`), ADD UNIQUE KEY `voter_id` (`voter_id`);

--
-- Indexes for table `user_image`
--
ALTER TABLE `user_image`
  ADD PRIMARY KEY (`id`), ADD KEY `voter_id` (`voter_id`);

--
-- Indexes for table `voted`
--
ALTER TABLE `voted`
  ADD PRIMARY KEY (`voter_id`);

--
-- Indexes for table `voter`
--
ALTER TABLE `voter`
  ADD PRIMARY KEY (`voter_id`);

--
-- Indexes for table `voter_image`
--
ALTER TABLE `voter_image`
  ADD PRIMARY KEY (`id`), ADD KEY `voter_id` (`voter_id`);

--
-- Indexes for table `winner`
--
ALTER TABLE `winner`
  ADD PRIMARY KEY (`electionid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `party_image`
--
ALTER TABLE `party_image`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tblaccount`
--
ALTER TABLE `tblaccount`
  MODIFY `account_no` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `user_no` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user_image`
--
ALTER TABLE `user_image`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `voter`
--
ALTER TABLE `voter`
  MODIFY `voter_id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=710831;
--
-- AUTO_INCREMENT for table `voter_image`
--
ALTER TABLE `voter_image`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `candidates`
--
ALTER TABLE `candidates`
ADD CONSTRAINT `candidates_ibfk_1` FOREIGN KEY (`voter_id`) REFERENCES `voter` (`voter_id`);

--
-- Constraints for table `electionvotes`
--
ALTER TABLE `electionvotes`
ADD CONSTRAINT `electionvotes_ibfk_1` FOREIGN KEY (`voter_id`) REFERENCES `voter` (`voter_id`);

--
-- Constraints for table `user_image`
--
ALTER TABLE `user_image`
ADD CONSTRAINT `user_image_ibfk_1` FOREIGN KEY (`voter_id`) REFERENCES `tblusers` (`voter_id`);

--
-- Constraints for table `voter_image`
--
ALTER TABLE `voter_image`
ADD CONSTRAINT `voter_image_ibfk_1` FOREIGN KEY (`voter_id`) REFERENCES `voter` (`voter_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
