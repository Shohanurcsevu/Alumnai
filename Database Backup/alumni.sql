-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 12, 2019 at 05:36 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `alumni`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `blog_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`blog_id`, `user_id`, `title`, `subtitle`, `content`, `post_date`) VALUES
(1, 9, '21', '21', '<p>21</p>', '2019-01-05 22:17:14'),
(3, 9, 'a', 'b', '<p>c</p>', '2019-01-09 10:13:35');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `dept_id` int(11) NOT NULL,
  `department_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`dept_id`, `department_name`) VALUES
(1, 'CSE'),
(2, 'EEE');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `message_to_user_id` int(11) NOT NULL,
  `message_from_user_id` int(11) NOT NULL COMMENT 'this is the logged in user',
  `chat_message` text NOT NULL,
  `status` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `message_to_user_id`, `message_from_user_id`, `chat_message`, `status`, `timestamp`) VALUES
(1, 16, 9, 'asdfsdf222', 1, '2019-01-10 14:22:44'),
(2, 9, 16, 'asdfas', 1, '2019-01-10 14:22:44'),
(3, 17, 9, 'asdfas222 asldfj alsd las alsjf lasdjf lasjfla sjdflas flasjdf lakjsfl akjsdflasj lfjal;sdf jalsdfjlas jflas flasjfl asjfla sfjlaskdfj', 1, '2019-01-10 14:22:44'),
(4, 1, 1, '1', 0, '2019-01-11 06:16:41'),
(5, 1, 1, '1', 0, '2019-01-11 06:16:43'),
(6, 1, 1, '1', 0, '2019-01-11 06:16:46'),
(7, 1, 1, '1', 0, '2019-01-11 06:17:34'),
(8, 1, 1, '1', 0, '2019-01-11 06:19:18'),
(9, 1, 1, '1', 0, '2019-01-11 06:22:12'),
(10, 1, 1, '1', 0, '2019-01-11 06:24:57'),
(11, 1, 1, '1', 0, '2019-01-11 06:25:56'),
(12, 1, 1, '1', 0, '2019-01-11 06:27:47'),
(13, 17, 9, 'asdf', 1, '2019-01-11 06:31:20'),
(14, 17, 9, 'asdf', 1, '2019-01-11 06:31:32'),
(15, 17, 9, 'asdf', 1, '2019-01-11 06:31:47'),
(16, 17, 9, 'asdf', 1, '2019-01-11 06:32:07'),
(17, 17, 9, 'asdf', 1, '2019-01-11 06:32:12'),
(18, 17, 9, 'sagor sagor', 1, '2019-01-11 06:32:34'),
(19, 16, 9, 'hi', 1, '2019-01-11 11:05:30'),
(20, 9, 16, 'hello', 1, '2019-01-11 11:05:59'),
(21, 16, 9, 'sdf', 1, '2019-01-11 13:22:45'),
(22, 16, 9, 'this is my first message', 1, '2019-01-11 22:44:08'),
(23, 18, 9, 'asdf', 1, '2019-01-11 22:49:48'),
(24, 9, 16, 'This is test message', 1, '2019-01-11 23:14:32'),
(25, 9, 16, 'another testing 2', 1, '2019-01-11 23:15:11'),
(26, 9, 16, 'hey brother', 1, '2019-01-12 00:17:52');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(11) NOT NULL,
  `birth_date` date DEFAULT NULL,
  `mobile_no` int(11) DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `marital_status` varchar(50) DEFAULT NULL,
  `address` text,
  `work_title` varchar(50) DEFAULT NULL,
  `work_description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `birth_date`, `mobile_no`, `nationality`, `marital_status`, `address`, `work_title`, `work_description`) VALUES
(9, '2019-01-10', 43534, 'asdf', 'married', 'asdf', 'asdf', 'asdf'),
(14, NULL, NULL, NULL, NULL, NULL, 'work title', 'work description');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `department_name` varchar(50) NOT NULL,
  `roll` int(50) NOT NULL,
  `session` varchar(50) NOT NULL,
  `passing_year` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_type` varchar(50) NOT NULL DEFAULT 'student',
  `verify_status` tinyint(4) NOT NULL DEFAULT '0',
  `last_activity` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `department_name`, `roll`, `session`, `passing_year`, `email`, `password`, `user_type`, `verify_status`, `last_activity`) VALUES
(9, 'sagor2', 'EEE', 122, 'ads2', 342, 'admin@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'admin', 1, '2019-01-12 05:36:47'),
(16, 'sagor', 'CSE', 34, '345', 345, 'sagor@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'admin', 1, '2019-01-11 16:33:23'),
(17, 'me', 'CSE', 34, '567', 456, 'me@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'student', 1, '2019-01-10 09:22:08'),
(18, 'asdlfjasl', '', 34345345, '12-15', 19, 'email@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'admin', 1, '2019-01-10 15:23:58'),
(19, 'new', 'CSE', 3434, '34', 34, 'new@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'admin', 1, '2019-01-10 10:46:28'),
(20, 'shakil', 'CSE', 234, '345', 435, 'shakil@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'student', 1, '2019-01-11 15:57:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
