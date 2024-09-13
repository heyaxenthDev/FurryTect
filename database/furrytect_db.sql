-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2024 at 02:31 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `furrytect_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--


-- --------------------------------------------------------

--
-- Table structure for table `cats`
--

CREATE TABLE `cats` (
  `id` int(11) NOT NULL,
  `species` varchar(50) NOT NULL DEFAULT 'Cat',
  `name` varchar(255) NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `age` int(11) NOT NULL,
  `color` varchar(255) NOT NULL,
  `owner_code` varchar(255) NOT NULL,
  `vacc_status` varchar(255) NOT NULL,
  `date_vacc` date NOT NULL,
  `picture` varchar(255) NOT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cats`
--

INSERT INTO `cats` (`id`, `species`, `name`, `sex`, `age`, `color`, `owner_code`, `vacc_status`, `date_vacc`, `picture`, `date_created`) VALUES
(1, 'Cat', 'Mallow', 2, 1, '0', '24957-2', 'vaccinated', '2024-05-19', 'uploads/cats/kitty-cat-kitten-pet-45201.jpeg', '2024-05-19 10:40:30'),
(2, 'Cat', 'Garfield', 1, 5, 'Orange', '52184-4', 'vaccinated', '2023-11-14', 'uploads/cats/FELV-cat.jpg', '2024-05-21 14:44:04'),
(3, 'Cat', 'Olive', 1, 2, 'Grey and White', '24957-2', 'unvaccinated', '0000-00-00', 'uploads/cats/Asana3808_Dashboard_Standard.jpg', '2024-05-21 14:50:00');

-- --------------------------------------------------------

--
-- Table structure for table `dogs`
--

CREATE TABLE `dogs` (
  `id` int(11) NOT NULL,
  `species` varchar(50) NOT NULL DEFAULT 'Dog',
  `tag_number` varchar(255) NOT NULL,
  `date_tagged` date NOT NULL,
  `name` varchar(255) NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `age` int(11) NOT NULL,
  `color` varchar(255) NOT NULL,
  `owner_code` varchar(255) NOT NULL,
  `vacc_status` varchar(255) NOT NULL,
  `date_vacc` date NOT NULL,
  `picture` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dogs`
--

INSERT INTO `dogs` (`id`, `species`, `tag_number`, `date_tagged`, `name`, `sex`, `age`, `color`, `owner_code`, `vacc_status`, `date_vacc`, `picture`, `date_created`) VALUES
(1, 'Dog', '0001', '2024-05-20', 'Choco', 1, 2, 'Black, Brown, and White', '67584-1', 'unvaccinated', '0000-00-00', 'uploads/dogs/bernese-mountain-dog.jpg', '2024-05-19 01:14:17'),
(2, 'Dog', '0002', '2024-05-21', 'Julie', 2, 1, 'Black', '43544-3', 'vaccinated', '2024-05-17', 'uploads/dogs/julie.jpg', '2024-05-21 08:25:09'),
(3, 'Dog', '0003', '2022-04-04', 'Chichay', 2, 4, 'Black, White and Brown', '67584-1', 'vaccinated', '2021-09-14', 'uploads/dogs/Chichay.jpg', '2024-05-21 14:42:23');

-- --------------------------------------------------------

--
-- Table structure for table `owners`
--

CREATE TABLE `owners` (
  `id` int(11) NOT NULL,
  `owner_code` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `sex` tinyint(1) DEFAULT NULL,
  `barangay` varchar(255) DEFAULT NULL,
  `owner_picture` varchar(255) DEFAULT NULL,
  `admin_confirm` int(11) NOT NULL DEFAULT 0 COMMENT '1=true, 0=false, 2=declined',
  `first_log` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1= true = 0=false',
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `owners`
--

INSERT INTO `owners` (`id`, `owner_code`, `first_name`, `middle_name`, `last_name`, `date_of_birth`, `contact_number`, `email`, `password`, `age`, `sex`, `barangay`, `owner_picture`, `admin_confirm`, `first_log`, `date_created`) VALUES
(1, '18290-5', 'Hya Cynth', 'Genodepa', 'Dojillo', '2000-08-04', '09651168472', '', '', 24, 0, 'Alegre', 'uploads/owners/248979178_944280426177113_1596410793690653200_n.jpg', 1, 1, '2024-05-19 01:14:17'),
(2, '24138-5', 'Alex', 'Reyes', 'Dela Cruz', NULL, '09123456789', '', '', 28, 1, 'Alegre', 'uploads/owners/2 (1).jpg', 1, 1, '2024-05-19 10:40:30'),
(3, '45961-5', 'Maria', 'Pedro', 'Dela Cruz', NULL, '09456578314', '', '', 40, 2, 'La paz', 'uploads/owners/news_preview_mob_image__preview_11368.png', 1, 1, '2024-05-21 08:25:09'),
(4, '18016-5', 'John Austine', 'Roy', 'Distel', NULL, '09178976251', '', '', 34, 1, 'Martinez', 'uploads/owners/austin-distel-h1RW-NFtUyc-unsplash.jpg', 1, 1, '2024-05-21 14:44:04'),
(5, NULL, 'Hello', NULL, NULL, NULL, NULL, 'helloworld@gmail.com', 'hash', NULL, NULL, NULL, NULL, 2, 1, '2024-09-12 20:53:04'),
(6, '10017-7', 'Kaye', NULL, NULL, NULL, NULL, 'kayeyng@gmail.com', '$2y$10$htEgcxgCXwfmV.rlRz5bKOiP/EU5Qxkvrpo8LQS.HVl0luY56vmLK', NULL, NULL, NULL, NULL, 1, 1, '2024-09-12 20:53:34');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_list`
--

CREATE TABLE `schedule_list` (
  `id` int(30) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `start_datetime` datetime NOT NULL,
  `end_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule_list`
--

INSERT INTO `schedule_list` (`id`, `title`, `description`, `start_datetime`, `end_datetime`) VALUES
(3, 'Test Schedule', 'Lorem ipsum test. Description example.', '2024-06-26 07:20:00', '2024-06-26 18:21:00'),
(4, 'Hello World', 'New testing statement', '2024-06-28 13:22:00', '2024-06-29 19:22:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cats`
--
ALTER TABLE `cats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dogs`
--
ALTER TABLE `dogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owners`
--
ALTER TABLE `owners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule_list`
--
ALTER TABLE `schedule_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cats`
--
ALTER TABLE `cats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dogs`
--
ALTER TABLE `dogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `owners`
--
ALTER TABLE `owners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `schedule_list`
--
ALTER TABLE `schedule_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
