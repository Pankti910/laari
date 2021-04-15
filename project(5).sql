-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2020 at 01:34 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
(50, 5, 41, 'like');

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
(14, 'question 3', 372575236, 4);

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
(41, 12, 1364864359, 'abc', 4);

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
  `cat3` text NOT NULL,
  `items` text NOT NULL,
  `price` int(11) NOT NULL,
  `laari_img` text NOT NULL,
  `street` text NOT NULL,
  `place` text NOT NULL,
  `area` text NOT NULL,
  `pincode` int(7) NOT NULL,
  `city` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `laari_owner_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laari_info`
--

INSERT INTO `laari_info` (`laari_no`, `laari_name`, `s_time`, `e_time`, `cat_1`, `cat_2`, `cat3`, `items`, `price`, `laari_img`, `street`, `place`, `area`, `pincode`, `city`, `status`, `laari_owner_id`) VALUES
(4, 'surti dishes', '10:00', '18:00', 'snacks', 'choose option', 'choose option', 'a:2:{i:0;s:11:\"surti locho\";i:1;s:12:\"cheese locho\";}', 0, '21_owner_id.jpg', 'parle point flyover', 'city light town', 'athwa', 394001, 'surat', 0, 21),
(5, 'surtisnacks', '10:00', '21:00', 'snacks', 'vegetarian', 'break fast', 'a:4:{i:0;s:8:\"sandwich\";i:1;s:15:\"cheese sandwich\";i:2;s:8:\"aloopuri\";i:3;s:7:\"vadapav\";}', 0, '22_owner_id.jpg', 'ghod dod road', 'ground floor royal palace', 'athwa', 395007, 'surat', 0, 22),
(6, 'khamanhouse', '08:00', '17:00', 'break fast', 'snacks', 'choose option', 'a:2:{i:0;s:6:\"khaman\";i:1;s:6:\"patodi\";}', 0, '23_owner_id.jpg', 'gopipura main rd', 'subhash chowk', 'gopipura', 395002, 'surat', 0, 23);

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
(21, 'arjun', 'katekar', '9836457890', 'arjunsurti@gmail.com'),
(22, 'suresh', 'kumar', '9879070498', 'sdhcvj@gmail.com'),
(23, 'rakesh', 'luhar', '8975647586', 'rakeshkhaman@gmal.com');

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
(21, 'arjunsurti@gmail.com', 'c64ec8ea87be97a55bd7e8b7096b28cae82be0d837f8f9f96ab43ccc2ce674e7109f75f94fbb3f3a2183db417c8b5947440c4ded7fe0bde8c9c1eb09dabe9883'),
(22, 'sdhcvj@gmail.com', '54a9f8f8a98c04ba1d6a6e14266232324305d7d736cbaa6103018ae270d0ededdf117b6ad648275a575236c378a0ac084770b00e261bcd119b140825485384d2'),
(23, 'rakeshkhaman@gmal.com', '5c955a91e6e58a0b166ce52cb0188b5f9c5e110ae7bc64e1c4a6c4ad529118aaf93ac77c9d0d799c200c0628f24120b4385c678b38611d5f29bbad935ea78265');

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

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `google_mail` text,
  `phone_no` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `google_mail`, `phone_no`) VALUES
(2, 'Pankti', 'Shah', NULL, '9879070498'),
(4, 'Swapnil', 'Patel', 'projectmy17@gmail.com', NULL),
(5, 'Swapnil', 'Patel', 'swapnilpatel276@gmail.com', NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `ask_question`
--
ALTER TABLE `ask_question`
  MODIFY `questionid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `give_answer`
--
ALTER TABLE `give_answer`
  MODIFY `answerid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `laari_info`
--
ALTER TABLE `laari_info`
  MODIFY `laari_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `laari_owner`
--
ALTER TABLE `laari_owner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `laari_rating`
--
ALTER TABLE `laari_rating`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification_forum`
--
ALTER TABLE `notification_forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
