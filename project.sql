-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2020 at 04:23 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer_like`
--

CREATE TABLE `answer_like` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ans_id` int(11) NOT NULL,
  `action` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer_like`
--

INSERT INTO `answer_like` (`id`, `user_id`, `ans_id`, `action`) VALUES
(49, 4, 41, 'like'),
(50, 5, 41, 'like'),
(51, 6, 41, 'like'),
(52, 2, 41, 'like');

-- --------------------------------------------------------

--
-- Table structure for table `ask_question`
--

CREATE TABLE `ask_question` (
  `questionid` int(11) NOT NULL,
  `question` text NOT NULL,
  `unique_number` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ask_question`
--

INSERT INTO `ask_question` (`questionid`, `question`, `unique_number`, `user_id`) VALUES
(12, 'question1', 1268898513, NULL),
(13, 'question2', 1590123383, 5),
(14, 'question 3', 372575236, 4),
(15, 'where i found panipuri', 1658643067, 6);

-- --------------------------------------------------------

--
-- Table structure for table `give_answer`
--

CREATE TABLE `give_answer` (
  `answerid` int(11) NOT NULL,
  `que_id` int(11) NOT NULL,
  `ans_unique_no` int(11) NOT NULL,
  `answer` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `give_answer`
--

INSERT INTO `give_answer` (`answerid`, `que_id`, `ans_unique_no`, `answer`, `user_id`) VALUES
(41, 12, 1364864359, 'abc', 4),
(42, 15, 1384068045, 'answer1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `laari_info`
--

CREATE TABLE `laari_info` (
  `laari_no` int(11) NOT NULL,
  `laari_name` text NOT NULL,
  `s_time` text NOT NULL,
  `e_time` text NOT NULL,
  `cat_1` text NOT NULL,
  `cat_2` text NOT NULL,
  `cat_3` text NOT NULL,
  `items` text NOT NULL,
  `price` int(11) NOT NULL,
  `laari_img` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `laari_owner_id` int(11) NOT NULL,
  `address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laari_info`
--

INSERT INTO `laari_info` (`laari_no`, `laari_name`, `s_time`, `e_time`, `cat_1`, `cat_2`, `cat_3`, `items`, `price`, `laari_img`, `status`, `laari_owner_id`, `address`) VALUES
(2, 'surtisnacks', '00:00', '19:00', 'vegetarian', 'choose option', 'choose option', 'a:2:{i:0;s:8:\"panipuri\";i:1;s:7:\"frankie\";}', 1020, '10_owner_id.jpg', 0, 10, NULL),
(3, 'shaktichat', '00:00', '20:00', 'snacks', 'choose option', 'choose option', 'a:1:{i:0;s:7:\"vadapav\";}', 0, '11_owner_id.jfif', 0, 11, NULL),
(14, 'famsous panipuri', '14:00', '17:00', 'vegetarian', 'choose option', 'choose option', 'a:6:{i:0;s:8:\"panipuri\";i:1;s:11:\"manchoorian\";i:2;s:5:\"thali\";i:3;s:8:\"bhelpuri\";i:4;s:6:\"Chiken\";i:5;s:8:\"chatpuri\";}', 0, '33_owner_id.jfif', 0, 33, ''),
(15, 'rajupancorner', '00:00', '22:00', 'desert', 'beverages', 'choose option', 'a:2:{i:0;s:3:\"pan\";i:1;s:8:\"coldcoco\";}', 1525, '34_owner_id.jpg', 0, 34, ''),
(16, 'dilip dabeli', '15:00', '16:00', 'vegetarian', 'snacks', 'choose option', 'a:2:{i:0;s:6:\"dabeli\";i:1;s:11:\"masala paav\";}', 3030, '35_owner_id.jpg', 0, 35, ''),
(17, 'vadapav good', '16:00', '23:00', 'vegetarian', 'snacks', 'choose option', 'a:2:{i:0;s:6:\"vadpav\";i:1;s:5:\"daeli\";}', 2040, '36_owner_id.jpg', 0, 36, '');

-- --------------------------------------------------------

--
-- Table structure for table `laari_owner`
--

CREATE TABLE `laari_owner` (
  `id` int(11) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `pno` varchar(10) NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laari_owner`
--

INSERT INTO `laari_owner` (`id`, `fname`, `lname`, `pno`, `email`) VALUES
(10, 'suresh', 'kumar', '9558684863', 'sdhcvj@gmail.com'),
(11, 'ramesh', 'kumar', '9558684863', 'surtiswag@gmail.com'),
(33, 'paresh', 'patel', '9898234200', 'ppatel@mail.com'),
(34, 'raju', 'kumar', '9898123409', 'pancorner@gmail.com'),
(35, 'dilip', 'patel', '9898123409', 'dilip123@gmail.com'),
(36, 'rakesh', 'kumar', '9898234200', 'rakesh@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `laari_owner_login`
--

CREATE TABLE `laari_owner_login` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laari_owner_login`
--

INSERT INTO `laari_owner_login` (`id`, `username`, `password`) VALUES
(10, 'suresh', 'dfec1b227f92fb95b91c52cd670729764a92699e83ba68e4b123a04809dad4ce5f4fb863fa9ff7a208dbb3ce6de2f0adfcc5a4bdc9e6d0ebcdcbeb6853ed7da6'),
(11, 'ramesh', '8681b06405a6614138579fdcbde8a7501cc542a84bc2ffdcd80cedb09dbde5b42b299981ea3710406dd071c48159078664c7d7613bd09b9927d967627bf44b29'),
(33, 'paresh', '2cb1c30068821f0d2cf99e045922eff49986801ffabcde1a62e35ea37667fe7015a4b494fa8a82ba6a287adaf5dea2be49fa39f4dee7c649a56abaec4fc1c67e'),
(34, 'raju', '4dce6f6f3175d8f171658b3488a0a78afca66ad34c9ee838c1f85bcb33a9577d3fb960ddca6ae60cc98213e09d63b79145bf4f91f89520cd66c9d05cd3866f42'),
(35, 'dilip', '2a6ea74ec64236ba8c2492282c5328556add3fee65e1841a54ae289ef4a4fc096742337de016de1ccc975a5f54cae9c781fa04c86da63a4539a056d974a9d7dc'),
(36, 'rakesh', '0d793ea2e3ce294a1bba02bb98948844f47d55827d67ecbfd46b8e62114c80a626d41e973f3abc9a01313b183e583b99d2107e4e7ddbcd05a979d300f93dac26');

-- --------------------------------------------------------

--
-- Table structure for table `laari_rating`
--

CREATE TABLE `laari_rating` (
  `rating_id` int(11) NOT NULL,
  `laari_no` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laari_rating`
--

INSERT INTO `laari_rating` (`rating_id`, `laari_no`, `user_id`, `rating`) VALUES
(1, 2, 5, 3),
(2, 2, 6, 3),
(11, 14, 6, 4);

-- --------------------------------------------------------

--
-- Table structure for table `notification_forum`
--

CREATE TABLE `notification_forum` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `questionid` int(11) NOT NULL,
  `answerid` int(11) NOT NULL,
  `action` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification_forum`
--

INSERT INTO `notification_forum` (`id`, `userid`, `questionid`, `answerid`, `action`) VALUES
(1, 6, 15, 42, 'unread');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `google_mail` text DEFAULT NULL,
  `phone_no` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `google_mail`, `phone_no`) VALUES
(2, 'Pankti', 'Shah', NULL, '9879070498'),
(4, 'Swapnil', 'Patel', 'projectmy17@gmail.com', NULL),
(5, 'Swapnil', 'Patel', 'swapnilpatel276@gmail.com', NULL),
(6, 'Pankti', 'Shah', 'panktishah910@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `userid` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`userid`, `user_name`, `password`) VALUES
(2, 'pankti', 'cb1c4cb97b47c0ff880893fbed642d132b2ba400e4e4e64a1b061bd2012be2556e2150434f4e1f1222d48856133909315809ba9fafdebc112df61f95730ff52a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer_like`
--
ALTER TABLE `answer_like`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `ans_unique_numbe` (`ans_id`);

--
-- Indexes for table `ask_question`
--
ALTER TABLE `ask_question`
  ADD PRIMARY KEY (`questionid`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `give_answer`
--
ALTER TABLE `give_answer`
  ADD PRIMARY KEY (`answerid`),
  ADD KEY `question_unique_no` (`que_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `laari_info`
--
ALTER TABLE `laari_info`
  ADD PRIMARY KEY (`laari_no`),
  ADD KEY `laari_owner_id` (`laari_owner_id`);

--
-- Indexes for table `laari_owner`
--
ALTER TABLE `laari_owner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laari_owner_login`
--
ALTER TABLE `laari_owner_login`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laari_owner_id_kf` (`id`);

--
-- Indexes for table `laari_rating`
--
ALTER TABLE `laari_rating`
  ADD PRIMARY KEY (`rating_id`),
  ADD UNIQUE KEY `laari_no_2` (`laari_no`,`user_id`),
  ADD KEY `laari_no` (`laari_no`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `notification_forum`
--
ALTER TABLE `notification_forum`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `questionid` (`questionid`),
  ADD KEY `answerid` (`answerid`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`userid`),
  ADD KEY `userid` (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer_like`
--
ALTER TABLE `answer_like`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `ask_question`
--
ALTER TABLE `ask_question`
  MODIFY `questionid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `give_answer`
--
ALTER TABLE `give_answer`
  MODIFY `answerid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `laari_info`
--
ALTER TABLE `laari_info`
  MODIFY `laari_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `laari_owner`
--
ALTER TABLE `laari_owner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `laari_rating`
--
ALTER TABLE `laari_rating`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `notification_forum`
--
ALTER TABLE `notification_forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer_like`
--
ALTER TABLE `answer_like`
  ADD CONSTRAINT `aid_fk` FOREIGN KEY (`ans_id`) REFERENCES `give_answer` (`answerid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `uid_fk` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ask_question`
--
ALTER TABLE `ask_question`
  ADD CONSTRAINT `user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`user_id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `give_answer`
--
ALTER TABLE `give_answer`
  ADD CONSTRAINT `question_fk` FOREIGN KEY (`que_id`) REFERENCES `ask_question` (`questionid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id_ans` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `laari_info`
--
ALTER TABLE `laari_info`
  ADD CONSTRAINT `laari_info_ibfk_1` FOREIGN KEY (`laari_owner_id`) REFERENCES `laari_owner` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `laari_owner_login`
--
ALTER TABLE `laari_owner_login`
  ADD CONSTRAINT `laari_owner_id_kf` FOREIGN KEY (`id`) REFERENCES `laari_owner` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `laari_rating`
--
ALTER TABLE `laari_rating`
  ADD CONSTRAINT `laari_no_fk` FOREIGN KEY (`laari_no`) REFERENCES `laari_info` (`laari_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rating_uid_fk` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notification_forum`
--
ALTER TABLE `notification_forum`
  ADD CONSTRAINT `answerid_fk` FOREIGN KEY (`answerid`) REFERENCES `give_answer` (`answerid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `qid_fk` FOREIGN KEY (`questionid`) REFERENCES `ask_question` (`questionid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userid_fk` FOREIGN KEY (`userid`) REFERENCES `user_info` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_login`
--
ALTER TABLE `user_login`
  ADD CONSTRAINT `user_login_fk` FOREIGN KEY (`userid`) REFERENCES `user_info` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
