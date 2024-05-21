-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2024 at 10:49 AM
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
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `first_name`, `middle_name`, `last_name`, `password`, `date_created`) VALUES
(1, 'hyacynth', 'Hya Cynth', 'Genodepa', 'Dojillo', '$2y$10$6h8Z6PwhPkGk.jKGV7OkvebCdOj8mI8xlHIAHvcMsqGBTOYDbNDvS', '2024-05-20 06:28:16');

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
(1, 'Cat', 'Mallow', 2, 1, '0', '24957-2', 'vaccinated', '2024-05-19', 'uploads/cats/kitty-cat-kitten-pet-45201.jpeg', '2024-05-19 10:40:30');

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
(2, 'Dog', '0002', '2024-05-21', 'Julie', 2, 1, 'Black', '43544', 'vaccinated', '2024-05-17', 'uploads/dogs/julie.jpg', '2024-05-21 08:25:09');

-- --------------------------------------------------------

--
-- Table structure for table `owners`
--

CREATE TABLE `owners` (
  `id` int(11) NOT NULL,
  `owner_code` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `owner_picture` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `owners`
--

INSERT INTO `owners` (`id`, `owner_code`, `first_name`, `middle_name`, `last_name`, `contact_number`, `age`, `sex`, `barangay`, `owner_picture`, `date_created`) VALUES
(1, '67584-1', 'Hya Cynth', 'Genodepa', 'Dojillo', '09651168472', 24, 2, 'Poblacion', 'uploads/owners/248979178_944280426177113_1596410793690653200_n.jpg', '2024-05-19 01:14:17'),
(2, '24957-2', 'Alex', 'Reyes', 'Dela Cruz', '09123456789', 28, 1, 'Alegre', 'uploads/owners/2 (1).jpg', '2024-05-19 10:40:30'),
(3, '43544-3', 'Maria', 'Pedro', 'Dela Cruz', '09456578314', 40, 2, 'La paz', 'uploads/owners/news_preview_mob_image__preview_11368.png', '2024-05-21 08:25:09');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dogs`
--
ALTER TABLE `dogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `owners`
--
ALTER TABLE `owners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
