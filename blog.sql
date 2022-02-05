-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2022 at 05:04 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `place`
--

CREATE TABLE `place` (
  `place_id` int(11) NOT NULL,
  `place_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `place`
--

INSERT INTO `place` (`place_id`, `place_name`) VALUES
(1, 'bihar'),
(2, 'Jharkhand'),
(3, 'Lucknow'),
(4, 'Goa'),
(5, 'Kolkata'),
(6, 'Mumbai'),
(7, 'Pune'),
(8, 'Jaipur'),
(9, 'Ahmedabad');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(200) NOT NULL,
  `post_content` longtext NOT NULL,
  `post_place` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `post_title`, `post_content`, `post_place`, `user_id`, `image`) VALUES
(8, 'testing title by danish alam for image', 'this is for testing purpose only', 1, 1, 'Screenshot (7).png'),
(11, 'Taj Mahal', 'Almost all of us know that getting stains out of something white can be tricky. But instead of imagining scrubbing spaghetti out of your favorite white shirt, think bigger—a 240-foot tall monument of gleaming marble.', 1, 2, 'images.jpg'),
(12, 'Taj Mahal', 'Almost all of us know that getting stains out of something white can be tricky. But instead of imagining scrubbing spaghetti out of your favorite white shirt, think bigger—a 240-foot tall monument of gleaming marble.\r\nAlmost all of us know that getting stains out of something white can be tricky. But instead of imagining scrubbing spaghetti out of your favorite white shirt, think bigger—a 240-foot tall monument of gleaming marble.\r\nAlmost all of us know that getting stains out of something white can be tricky. But instead of imagining scrubbing spaghetti out of your favorite white shirt, think bigger—a 240-foot tall monument of gleaming marble.', 8, 1, 'images.jpg'),
(13, 'New data recording system to better analyse road accidents', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat illo doloremque repellat quisquam laborum veniam tempore ratione ipsam, quo repellendus omnis voluptas praesentium magni deleniti repudiandae culpa suscipit corporis optio minus? Excepturi inventore dolor ad veritatis ea hic minima assumenda.', 7, 1, 'images.jpg'),
(14, 'Taj Mahal', 'orem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat illo doloremque repellat quisquam laborum veniam tempore ratione ipsam, quo repellendus omnis voluptas praesentium magni deleniti repudiandae culpa suscipit corporis optio minus? Excepturi inventore dolor ad veritatis ea hic minima assumenda.', 8, 2, 'images.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `cpassword` varchar(200) NOT NULL,
  `gender` enum('m','f') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `full_name`, `user_name`, `email`, `password`, `cpassword`, `gender`) VALUES
(1, 'nandu', 'nandu@123', 'nandu123@gmail.com', '12345', '12345', 'f'),
(2, 'danishalam', 'danish', 'danishalam002@gmail.com', '123456', '123456', 'm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `post_user` (`user_id`),
  ADD KEY `post_place` (`post_place`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `place`
--
ALTER TABLE `place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_place` FOREIGN KEY (`post_place`) REFERENCES `place` (`place_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
