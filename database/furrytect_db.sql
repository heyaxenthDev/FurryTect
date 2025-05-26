-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2025 at 03:27 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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

INSERT INTO `admin` (`id`, `username`, `first_name`, `middle_name`, `last_name`, `password`, `profile_pic`, `date_created`) VALUES
(1, 'hyacynth', 'Hya Cynth', 'Genodepa', 'Dojillo', '$2y$10$RCqmxDbaLJby7vut5QoFbudeZ924f033xurFt2rDA..vr.Ij8628m', '', '2024-05-19 22:28:16');

-- --------------------------------------------------------

--
-- Table structure for table `cats`
--

CREATE TABLE `cats` (
  `id` int(11) NOT NULL,
  `species` varchar(50) NOT NULL DEFAULT 'Cat',
  `name` varchar(255) NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `age_years` int(11) DEFAULT NULL,
  `age_months` int(11) DEFAULT NULL,
  `color` varchar(255) NOT NULL,
  `owner_code` varchar(255) NOT NULL,
  `vacc_status` varchar(255) NOT NULL,
  `vacc_reason` varchar(255) NOT NULL,
  `vacc_disease` varchar(255) NOT NULL,
  `vacc_type` varchar(255) NOT NULL,
  `vacc_source` varchar(255) NOT NULL,
  `date_vacc` date NOT NULL,
  `picture` varchar(255) NOT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cats`
--

INSERT INTO `cats` (`id`, `species`, `name`, `sex`, `age_years`, `age_months`, `color`, `owner_code`, `vacc_status`, `vacc_reason`, `vacc_disease`, `vacc_type`, `vacc_source`, `date_vacc`, `picture`, `date_created`) VALUES
(1, 'Cat', 'Mallow', 2, 2, 1, 'Orange', '18290-5', 'vaccinated', 'Mass', 'Rabies', 'Rabisin', 'Rabies', '2024-05-19', '', '2024-05-19 10:40:30'),
(2, 'Cat', 'Garfield', 1, NULL, NULL, 'Orange', '52184-4', 'vaccinated', '', '', '', '', '2023-11-14', 'uploads/cats/FELV-cat.jpg', '2024-05-21 14:44:04'),
(3, 'Cat', 'Olive', 1, NULL, NULL, 'Grey and White', '24957-2', 'unvaccinated', '', '', '', '', '0000-00-00', 'uploads/cats/Asana3808_Dashboard_Standard.jpg', '2024-05-21 14:50:00');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `subject`, `message`, `status`, `submitted_at`) VALUES
(1, 'Hya Cynth Dojillo', 'hyacynthd.socialmail@gmail.com', 'Testing Query', 'asdsadas', 0, '2025-01-19 12:51:06'),
(2, 'Hya Cynth Dojillo', 'hyacynthd.socialmail@gmail.com', 'Testing Query2', 'jashdjkhasjkdhas', 0, '2025-01-19 12:57:06');

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
  `age_years` int(11) DEFAULT NULL,
  `age_months` int(11) DEFAULT NULL,
  `color` varchar(255) NOT NULL,
  `owner_code` varchar(255) NOT NULL,
  `vacc_status` varchar(255) NOT NULL,
  `vacc_reason` varchar(255) NOT NULL,
  `vacc_disease` varchar(255) NOT NULL,
  `vacc_type` varchar(255) NOT NULL,
  `vacc_source` varchar(255) NOT NULL,
  `date_vacc` date NOT NULL,
  `picture` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dogs`
--

INSERT INTO `dogs` (`id`, `species`, `tag_number`, `date_tagged`, `name`, `sex`, `age_years`, `age_months`, `color`, `owner_code`, `vacc_status`, `vacc_reason`, `vacc_disease`, `vacc_type`, `vacc_source`, `date_vacc`, `picture`, `date_created`) VALUES
(1, 'Dog', '0001', '2024-05-20', 'Choco', 1, 1, 3, 'Black, Brown, and White', '18290-5', 'vaccinated', 'Mass', 'Rabies', 'Rabisin', 'Rabies', '2025-01-01', '', '2024-05-19 01:14:17'),
(2, 'Dog', '0002', '2024-05-21', 'Julie', 2, NULL, NULL, 'Black', '24138-5', 'vaccinated', '', '', '', '', '2024-05-17', 'uploads/dogs/julie.jpg', '2024-05-21 08:25:09'),
(3, 'Dog', '0003', '2022-04-04', 'Chichay', 2, NULL, NULL, 'Black, White and Brown', '67584-1', 'vaccinated', '', '', '', '', '2021-09-14', 'uploads/dogs/Chichay.jpg', '2024-05-21 14:42:23'),
(4, 'Dog', '0005', '2025-02-01', 'Ying', 2, NULL, NULL, 'White and Brown', '46872-7', '', '', '', '', '', '0000-00-00', 'uploads/dogs/karsten-winegeart-_hoAqzp39tk-unsplash.jpg', '2024-09-14 11:47:02'),
(5, 'Dog', '0006', '2025-02-28', 'Yang', 1, NULL, NULL, 'White and Brown, Black', '95467-8', 'vaccinated', '', '', '', '', '2025-02-15', 'admin/uploads/dogs/photo-dog-chewing-smartphone-holding-260nw-2560989037.webp', '2025-02-01 11:33:39'),
(6, 'Dog', '0006', '2025-02-28', 'Yang', 1, NULL, NULL, 'White and Brown, Black', '93484-9', 'vaccinated', '', '', '', '', '2025-02-15', 'admin/uploads/dogs/photo-dog-chewing-smartphone-holding-260nw-2560989037.webp', '2025-02-01 11:35:18'),
(7, 'Dog', '', '0000-00-00', 'Yang', 1, NULL, NULL, 'White and Brown', '79307-10', 'vaccinated', '', '', '', '', '2025-02-01', 'admin/uploads/dogs/AdobeStock_83233470-2048x1255.jpeg', '2025-02-01 14:28:40'),
(8, 'Dog', '', '0000-00-00', 'Yang', 1, NULL, NULL, 'White and Brown', '91675-11', 'vaccinated', '', '', '', '', '2025-02-01', 'uploads/pet_679e30e11d27a1.91306010.jpeg', '2025-02-01 14:34:09'),
(9, 'Dog', '', '0000-00-00', 'Ash', 1, NULL, NULL, 'Brown', '98806-12', 'vaccinated', '', '', '', '', '2025-01-08', 'uploads/pet_67a01a91a0c294.99225725.jpg', '2025-02-03 01:23:29'),
(10, 'Dog', '0007', '2025-01-08', 'Ash', 1, NULL, NULL, 'Brown', '63529-13', 'vaccinated', '', '', '', '', '2025-02-12', 'admin/uploads/dogs/pet_67a0276b792a03.75829671.jpg', '2025-02-03 02:18:19'),
(11, 'Dog', '0007', '2025-01-08', 'Ash', 1, NULL, NULL, 'Brown', '22119-14', 'vaccinated', '', '', '', '', '2025-02-12', 'uploads/dogs/pet_67a027be8fe032.88873373.jpg', '2025-02-03 02:19:42');

-- --------------------------------------------------------

--
-- Table structure for table `evidencefiles`
--

CREATE TABLE `evidencefiles` (
  `id` int(11) NOT NULL,
  `incident_id` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `evidencefiles`
--

INSERT INTO `evidencefiles` (`id`, `incident_id`, `file_path`, `created_at`) VALUES
(1, '20250130-3849-4', 'uploads/evidence_679aef0b397034.56864609.png', '2025-01-30 11:16:27'),
(2, '20250130-3849-4', 'uploads/evidence_679aef0b3a68b1.20035894.png', '2025-01-30 11:16:27'),
(3, '20250130-3849-4', 'uploads/evidence_679aef0b3aa965.44454464.png', '2025-01-30 11:16:27'),
(4, '20250526-5239-5', 'uploads/evidence_683464e8159368.77334944.png', '2025-05-26 20:56:08');

-- --------------------------------------------------------

--
-- Table structure for table `incidentreports`
--

CREATE TABLE `incidentreports` (
  `id` int(11) NOT NULL,
  `incident_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dog_tag_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `incident_type` varchar(255) NOT NULL,
  `for_others` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL,
  `location` text NOT NULL,
  `description` text NOT NULL,
  `agree_terms` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `incidentreports`
--

INSERT INTO `incidentreports` (`id`, `incident_id`, `name`, `dog_tag_number`, `email`, `contact_number`, `incident_type`, `for_others`, `date_time`, `location`, `description`, `agree_terms`, `created_at`) VALUES
(1, '20250130-3593-1', '', '', '', '', 'Animal-Vehicle Accident', '', '2025-01-30 10:47:00', 'San Jose, Antique', 'sadasd', 1, '2025-01-30 03:10:31'),
(2, '20250130-3952-2', '', '', '', '', 'Animal-Vehicle Accident', '', '2025-01-30 10:47:00', 'San Jose, Antique', 'sadasd', 1, '2025-01-30 03:13:22'),
(3, '20250130-8539-3', '', '', '', '', 'Animal-Vehicle Accident', '', '2025-01-30 10:47:00', 'San Jose, Antique', 'sadasd', 1, '2025-01-30 03:16:11'),
(4, '20250130-3849-4', 'Hya Cynth Dojillo', '', 'hyacynth@gmail.com', '09651168472', 'Animal-Vehicle Accident', '', '2025-01-30 10:47:00', 'San Jose, Antique', 'sadasd', 1, '2025-01-30 03:16:27'),
(5, '20250526-5239-5', 'hasdhasg hahsdghj ahsdhjah', 'sadas', 'asdasd@gmail.com', '90909090090', 'Animal-Vehicle Accident', '', '2025-05-26 20:55:00', 'San Jose, Antique', 'adasd', 1, '2025-05-26 12:56:08');

-- --------------------------------------------------------

--
-- Table structure for table `log_history`
--

CREATE TABLE `log_history` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `datetime_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `log_history`
--

INSERT INTO `log_history` (`id`, `username`, `description`, `datetime_modified`) VALUES
(1, 'hyacynth', 'Logged in successfully', '2025-01-19 10:19:11'),
(2, 'hyacynth', 'Admin has logged out.', '2025-01-19 10:24:52'),
(3, 'hyacynth', 'Logged in successfully', '2025-01-19 10:25:10'),
(4, 'hyacynth', 'Admin has logged out.', '2025-01-19 10:43:10'),
(5, 'hyacynth', 'Logged in successfully', '2025-01-19 12:57:56'),
(6, 'hyacynth', 'Viewed an email query and marked it as read. Query ID: 2', '2025-01-19 13:33:44'),
(7, 'hyacynth', 'Saved a schedule', '2025-01-19 13:34:27'),
(8, 'hyacynth', 'Updated owner record, reference owner code: 1', '2025-01-19 13:34:56'),
(9, 'hyacynth', 'Admin has logged out.', '2025-01-19 15:10:35'),
(10, 'hyacynth', 'Logged in successfully', '2025-01-22 10:11:56'),
(11, 'hyacynth', 'Logged in successfully', '2025-01-23 06:46:52'),
(12, 'hyacynth', 'Viewed an email query and marked it as read. Query ID: 2', '2025-01-23 07:26:59'),
(13, 'hyacynth', 'Viewed an email query and marked it as read. Query ID: 1', '2025-01-23 07:27:02'),
(14, 'hyacynth', 'Admin has logged out.', '2025-01-23 10:56:06'),
(15, 'hyacynth', 'Logged in successfully', '2025-01-25 13:14:33'),
(16, 'hyacynth', 'Logged in successfully', '2025-01-29 11:25:22'),
(17, 'hyacynth', 'Updated owner record, reference owner code: 1', '2025-01-29 14:00:25'),
(18, 'hyacynth', 'Admin has logged out.', '2025-01-29 14:01:25'),
(19, 'hyacynth', 'Logged in successfully', '2025-01-30 00:24:18'),
(20, 'hyacynth', 'Admin has logged out.', '2025-01-30 05:01:24'),
(21, 'hyacynth', 'Logged in successfully', '2025-01-30 05:05:46'),
(22, 'hyacynth', 'Logged in successfully', '2025-01-30 07:16:36'),
(23, 'hyacynth', 'Admin has logged out.', '2025-01-30 08:52:31'),
(24, 'hyacynth', 'Logged in successfully', '2025-01-30 15:15:28'),
(25, 'hyacynth', 'Admin has logged out.', '2025-01-30 15:29:19'),
(26, 'hyacynth', 'Logged in successfully', '2025-02-01 09:31:04'),
(27, 'hyacynth', 'Updated dog record, reference dog code: 4', '2025-02-01 10:52:14'),
(28, 'hyacynth', 'Updated dog record, reference dog code: 4', '2025-02-01 10:54:43'),
(29, 'hyacynth', 'Updated dog record, reference dog code: 4', '2025-02-01 10:57:41'),
(30, 'hyacynth', 'Updated dog record, reference dog code: 4', '2025-02-01 11:08:58'),
(31, 'hyacynth', 'Updated dog record, reference dog code: 4', '2025-02-01 11:22:39'),
(32, 'hyacynth', 'Updated dog record, reference dog code: 4', '2025-02-01 11:22:59'),
(33, 'hyacynth', 'Admin has logged out.', '2025-02-01 11:24:09'),
(34, 'hyacynth', 'Logged in successfully', '2025-02-01 13:09:04'),
(35, 'hyacynth', 'Admin has logged out.', '2025-02-01 13:11:18'),
(36, 'hyacynth', 'Logged in successfully', '2025-02-01 14:18:15'),
(37, 'hyacynth', 'Admin has logged out.', '2025-02-01 14:19:47'),
(38, 'hyacynth', 'Logged in successfully', '2025-02-01 15:17:09'),
(39, 'hyacynth', 'Admin has logged out.', '2025-02-01 15:24:39'),
(40, 'hyacynth', 'Logged in successfully', '2025-02-01 16:10:50'),
(41, 'hyacynth', 'Logged in successfully', '2025-02-02 14:23:52'),
(42, 'hyacynth', 'Admin has logged out.', '2025-02-02 14:29:32'),
(43, 'hyacynth', 'Logged in successfully', '2025-02-03 01:24:08'),
(44, 'hyacynth', 'Admin has logged out.', '2025-02-03 02:17:17'),
(45, 'hyacynth', 'Logged in successfully', '2025-02-03 02:20:08'),
(46, 'hyacynth', 'Admin has logged out.', '2025-02-03 02:29:25'),
(47, 'hyacynth', 'Logged in successfully', '2025-02-25 02:30:57'),
(48, 'hyacynth', 'Logged in successfully', '2025-02-28 07:10:52'),
(49, 'hyacynth', 'Logged in successfully', '2025-03-02 09:46:45'),
(50, 'hyacynth', 'Admin has logged out.', '2025-03-02 09:49:02'),
(51, 'hyacynth', 'Logged in successfully', '2025-03-02 09:52:34'),
(52, 'hyacynth', 'Viewed an email query and marked it as read. Query ID: 2', '2025-03-02 09:52:39'),
(53, 'hyacynth', 'Viewed an email query and marked it as read. Query ID: 2', '2025-03-02 11:05:41'),
(54, 'hyacynth', 'Logged in successfully', '2025-05-26 12:56:45'),
(55, 'hyacynth', 'Admin has logged out.', '2025-05-26 13:01:18'),
(56, 'hyacynth', 'Logged in successfully', '2025-05-26 13:01:51'),
(57, 'hyacynth', 'Updated dog record, reference dog code: 1', '2025-05-26 13:15:45'),
(58, 'hyacynth', 'Updated cat record, reference cat code: 1', '2025-05-26 13:17:51'),
(59, 'hyacynth', 'Admin has logged out.', '2025-05-26 13:25:34');

-- --------------------------------------------------------

--
-- Table structure for table `owners`
--

CREATE TABLE `owners` (
  `id` int(11) NOT NULL,
  `owner_code` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
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
(6, '10017-7', 'Kaye', NULL, NULL, NULL, NULL, 'kayeyng@gmail.com', '$2y$10$htEgcxgCXwfmV.rlRz5bKOiP/EU5Qxkvrpo8LQS.HVl0luY56vmLK', NULL, NULL, NULL, NULL, 1, 1, '2024-09-12 20:53:34'),
(7, '95530-8', 'Alice', 'Jean', 'Smith', '1999-01-01', '09644887998', NULL, NULL, 25, 2, 'Natividad', 'uploads/owners/news_preview_mob_image__preview_11368.png', 1, 1, '2024-09-14 11:47:02'),
(8, '95467-8', 'Hya Cynth', 'Genodepa', 'Dojillo', '2025-02-01', '09651168472', NULL, NULL, 24, 2, 'Alegre', 'admin/uploads/owners/susn-matthiessen-7O9dILhfn5Y-unsplash.jpg', 1, 1, '2025-02-01 11:33:39'),
(9, '93484-9', 'Hya Cynth', 'Genodepa', 'Dojillo', '2025-02-01', '09651168472', NULL, NULL, 24, 2, 'Alegre', 'admin/uploads/owners/susn-matthiessen-7O9dILhfn5Y-unsplash.jpg', 1, 1, '2025-02-01 11:35:18'),
(10, '79307-10', 'Hya Cynth', 'Genodepa', 'Dojillo', '2025-02-28', '09651168472', NULL, NULL, 24, 2, 'Alegre', 'admin/uploads/owners/humberto-arellano-N_G2Sqdy9QY-unsplash.jpg', 1, 1, '2025-02-01 14:28:40'),
(11, '91675-11', 'Hya Cynth', 'Genodepa', 'Dojillo', '2025-02-28', '09651168472', NULL, NULL, 24, 2, 'Alegre', 'uploads/pet_679e30e11c8703.86034151.jpg', 1, 1, '2025-02-01 14:34:09'),
(12, '98806-12', 'Hya Cynth', 'Genodepa', 'Dojillo', '2000-08-04', '09651168472', NULL, NULL, 24, 2, 'Bandoja', 'uploads/pet_67a01a91a02657.61506595.png', 1, 1, '2025-02-03 01:23:29'),
(13, '63529-13', 'Hya Cynth', 'Genodepa', 'Dojillo', '2025-02-07', '09651168472', NULL, NULL, 24, 2, 'Importante', 'admin/uploads/owners/pet_67a0276b77c214.66285478.png', 1, 1, '2025-02-03 02:18:19'),
(14, '22119-14', 'Hya Cynth', 'Genodepa', 'Dojillo', '2025-02-07', '09651168472', NULL, NULL, 24, 2, 'Importante', 'uploads/owners/pet_67a027be8f5079.30515634.png', 1, 1, '2025-02-03 02:19:42');

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
(4, 'Hello World', 'New testing statement', '2024-06-28 13:22:00', '2024-06-29 19:22:00'),
(5, 'sdas', 'dasdas', '2025-01-23 09:30:00', '2025-01-24 12:30:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cats`
--
ALTER TABLE `cats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dogs`
--
ALTER TABLE `dogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evidencefiles`
--
ALTER TABLE `evidencefiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incidentreports`
--
ALTER TABLE `incidentreports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_history`
--
ALTER TABLE `log_history`
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
-- AUTO_INCREMENT for table `cats`
--
ALTER TABLE `cats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dogs`
--
ALTER TABLE `dogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `evidencefiles`
--
ALTER TABLE `evidencefiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `incidentreports`
--
ALTER TABLE `incidentreports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `log_history`
--
ALTER TABLE `log_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `owners`
--
ALTER TABLE `owners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `schedule_list`
--
ALTER TABLE `schedule_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
