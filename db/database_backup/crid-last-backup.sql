-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2019 at 07:45 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.2.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crid`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@admin.com', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` tinytext NOT NULL,
  `body` longtext NOT NULL,
  `published` int(1) NOT NULL DEFAULT 1,
  `publishtime` datetime NOT NULL DEFAULT current_timestamp(),
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `body`, `published`, `publishtime`, `uid`) VALUES
(2, 'This is test', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 1, '2019-09-11 10:13:03', 9);

-- --------------------------------------------------------

--
-- Table structure for table `careers`
--

CREATE TABLE `careers` (
  `id` int(11) NOT NULL,
  `position` varchar(400) NOT NULL,
  `vacancy` int(5) NOT NULL,
  `applylink` varchar(500) NOT NULL,
  `jobdetails` longtext NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` tinytext NOT NULL,
  `message` longtext NOT NULL,
  `seen` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `email`, `subject`, `message`, `seen`) VALUES
(1, 'Mortuza', 'mortuza.crid@gmail.com', 'Hello', 'Hello, Test message.', 1),
(2, 'Mortuza', 'mortuza.crid@gmail.com', 'Hello', 'Test2', 1),
(3, 'Test Name', 'cojocod@net8mail.com', 'Your Temporary Email Address', 'Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 0),
(4, 'Your Temporary', 'cojocod@net8mail.com', 'Your Temporary sadcaca', 'Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 1),
(5, 'Funny Me', 'cojocod@net8mail.com', 'Why do we use it?', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 1),
(6, 'Foo Bur', 'test@akmdlcmal.com', 'Where does it come from?', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 1),
(7, 'trymerobo', 'admin@crid.com', 'sac', 'csa', 0),
(8, 'Eso Robot Banai', 'mavioasvi@vnaskld.avsoidnm', 'svoadiomjp', 'lkvmdpo ksdvpkasopdvkpoaksdvpokadsv', 0),
(9, 'Eso Robot Banai', 'mortuza.crid@gmail.com', 'Hello', 'ascdacadcac', 0),
(10, 'Mortuza', 'b4499984@urhen.com', 'Hello', 'asxasxasxasxasxasx', 0);

-- --------------------------------------------------------

--
-- Table structure for table `instructors_registration`
--

CREATE TABLE `instructors_registration` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mailing_address` tinytext NOT NULL,
  `zipcode` int(10) NOT NULL,
  `city` varchar(20) NOT NULL,
  `contact_number` int(15) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nid` int(20) NOT NULL,
  `previous_experiance` tinytext NOT NULL,
  `occupation` tinytext NOT NULL,
  `other_information` tinytext NOT NULL,
  `language` tinytext NOT NULL,
  `class_time` tinytext NOT NULL,
  `convicted_with_violation` tinytext NOT NULL,
  `health_problem` tinytext NOT NULL,
  `emergency_contact` varchar(255) NOT NULL,
  `emergency_contact_number` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instructors_registration`
--

INSERT INTO `instructors_registration` (`id`, `name`, `mailing_address`, `zipcode`, `city`, `contact_number`, `dob`, `email`, `nid`, `previous_experiance`, `occupation`, `other_information`, `language`, `class_time`, `convicted_with_violation`, `health_problem`, `emergency_contact`, `emergency_contact_number`) VALUES
(1, 'Mortuza', 'acasdcas', 12, '12sacasdca', 1212, '2019-08-16', 'mortuza.crid@gmail.com', 1231322, 'acdadcasdc', 'dsacasdcsadcc', 'cdscasdcacc', 'casdcasdc', 'Morning (Mon-Fri),Afternoon (Mon-Fri),Evening (Mon-Fri),More than Once a Week,One Time Only', 'adcad', 'cascasdc', 'cas', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `students_registration`
--

CREATE TABLE `students_registration` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `grade` varchar(10) NOT NULL,
  `school` varchar(255) NOT NULL,
  `mailing_address` tinytext NOT NULL,
  `mobile_number` int(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `father_mobile` int(15) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `mother_mobile` int(15) NOT NULL,
  `guardian_name` varchar(255) NOT NULL,
  `guardian_number` int(15) NOT NULL,
  `relation_with_guardian` varchar(20) NOT NULL,
  `health_problem` tinytext NOT NULL,
  `medication` tinytext NOT NULL,
  `approve` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `account_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `password`, `gender`, `account_type`) VALUES
(3, 'mortuzahossain1997@gmail.com', 'Md Mortuza Hossain', '827ccb0eea8a706c4c34a16891f84e7b', 'Male', 'Enthusiast/Learner'),
(4, 'aksmdkclams@jcamdslk.ckamsd', 'Md Mortuza Hossain', '202cb962ac59075b964b07152d234b70', 'Male', 'Enthusiast/Learner'),
(9, 'mortuza.crid@gmail.com', 'Md Mortuza Hossain', '81dc9bdb52d04dc20036dbd8313ed055', 'Male', 'Mentor/Trainer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogs_ibfk_1` (`uid`);

--
-- Indexes for table `careers`
--
ALTER TABLE `careers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instructors_registration`
--
ALTER TABLE `instructors_registration`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `students_registration`
--
ALTER TABLE `students_registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `careers`
--
ALTER TABLE `careers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `instructors_registration`
--
ALTER TABLE `instructors_registration`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
