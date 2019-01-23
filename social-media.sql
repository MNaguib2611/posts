-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2019 at 06:31 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social-media`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `idcomment` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `commented` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`idcomment`, `comment`, `commented`, `user_id`, `post_id`) VALUES
(1, 'i hope this will work', '2019-01-21 22:37:15', 1, 1),
(2, 'did this work?', '2019-01-21 22:37:21', 1, 3),
(3, 'trying different user', '2019-01-21 22:37:56', 2, 1),
(5, 'this is a test for the second post', '2019-01-22 11:47:06', 2, 2),
(6, 'here is another comment', '2019-01-22 11:47:49', 2, 2),
(7, 'this is the final comment to test', '2019-01-22 11:53:53', 2, 3),
(11, 'another comment to remove the error', '2019-01-22 21:53:58', 1, 5),
(12, 'i think germany could have never won', '2019-01-22 22:00:39', 1, 5),
(17, 'this comment is to prevent error', '2019-01-23 01:19:00', 4, 11),
(18, 'this comment is to prevent error', '2019-01-23 16:46:14', 11, 12);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `idpost` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `post` text NOT NULL,
  `posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`idpost`, `title`, `post`, `posted`, `user_id`) VALUES
(1, 'first post', 'this is the first post as mohammed naguib\r\n', '2019-01-21 21:06:34', 1),
(2, 'second post', 'this is the second post as mahmoud gabr', '2019-01-21 19:38:46', 2),
(3, 'third post', 'this is the third post as ahmed gouda', '2019-01-21 19:39:35', 5),
(5, 'WW2', 'again,germany couldnt have won the war', '2019-01-22 22:56:57', 1),
(11, 'Dish party', 'i am editing this post', '2019-01-23 17:03:39', 4),
(12, 'm said', 'i am commenting this as a test as i always do', '2019-01-23 16:46:13', 11);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `iduser` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_pic` varchar(2500) NOT NULL,
  `is_admin` tinyint(4) NOT NULL DEFAULT '0',
  `signedup` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`iduser`, `fullname`, `username`, `password`, `profile_pic`, `is_admin`, `signedup`) VALUES
(1, 'Mohammed Naguib', 'mn2611', '123456', 'mn2611.jpg', 1, '2019-01-23 12:31:49'),
(2, 'Mahmoud Gabr ', 'mg1993', '123456', 'mg1993.jpg', 1, '2019-01-23 17:30:20'),
(3, 'Abdalah Khouly', 'ak1994', '123456', 'ak1994.jpg', 0, '2019-01-23 12:32:14'),
(4, 'Mohammed Wahba', 'mw1991', '123456', 'mw1991.jpg', 0, '2019-01-23 17:20:07'),
(5, 'Ahmed Gouda ', 'ag1995', '123456', 'ag1995.jpg', 0, '2019-01-23 12:32:45'),
(6, 'Mahmoud Mekkawy', 'mm1999', '123456', 'mm1999.jpg', 0, '2019-01-23 12:32:53'),
(11, 'Mohammed Said', 'ms2000', '123456', 'ms2000.jpg', 0, '2019-01-23 12:24:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`idcomment`),
  ADD KEY `user_id` (`user_id`,`post_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`idpost`),
  ADD UNIQUE KEY `title` (`title`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`iduser`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `idcomment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `idpost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`idpost`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
