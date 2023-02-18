-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 18, 2023 at 02:33 PM
-- Server version: 8.0.32-0ubuntu0.22.04.2
-- PHP Version: 8.0.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci4Visa`
--

-- --------------------------------------------------------

--
-- Table structure for table `visa-applicant`
--

CREATE TABLE `visa-applicant` (
  `id` int NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `nationality` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `marital_status` varchar(50) NOT NULL,
  `passport_number` varchar(50) NOT NULL,
  `passport_expiry` date DEFAULT NULL,
  `father_name` varchar(200) NOT NULL,
  `mother_name` varchar(200) NOT NULL,
  `place_of_birth` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(300) NOT NULL,
  `passport_path` varchar(300) NOT NULL,
  `photo_path` varchar(300) NOT NULL,
  `application_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `visa-applicant`
--

INSERT INTO `visa-applicant` (`id`, `first_name`, `middle_name`, `surname`, `date_of_birth`, `nationality`, `gender`, `marital_status`, `passport_number`, `passport_expiry`, `father_name`, `mother_name`, `place_of_birth`, `email`, `password`, `passport_path`, `photo_path`, `application_id`) VALUES
(1, 'FENG', '', 'FAN', '1989-01-01', 'CN', 'm', 'Married', 'ZX345523423', '2030-06-05', 'FAN LING BING', 'FAN LIN MING', 'HENAN', 'fan@gmail.com', '$2y$10$EbeD4/742ZEU.gsgdFWE0ePvF9DLvQ2g22toETo8JXULCU1XLgVBm', '/assets/uploads/applicants/1676388427_f8421ce18c9a71887e46.jpg', '/assets/uploads/applicants/1676388427_61bd71dabffcfb8d86e3.jpg', 1),
(2, 'DELFINO', '', 'THORMALEN', '1989-02-01', 'JP', 'f', 'Married', 'E3324234', '2030-05-12', 'John Doe', 'J SMITHSON', '', 'delfino@gmail.com', '$2y$10$vzFNcjBoWPL3blYWtz7FN.ES97RQxPnDJ00CwTpWreaoqEkEGVvca', '/assets/uploads/applicants/1676395090_ccb83dc7ee31f59db0d0.jpg', '/assets/uploads/applicants/1676395090_6571a274fe8305cbaae3.jpg', 2),
(3, 'Smith', '', 'John', '1989-02-01', 'AR', 'm', 'Married', 'G34394584945', '2030-05-15', 'John Doe', 'Jane Doe', '', 'johnsmith@yahoo.com', '$2y$10$rwlctTwQct6ogh8TniBVdeq6lL9ahcriQspAxigIqWy3Z25Ch9oJC', '', '', 3),
(4, 'Jimmy', '', 'Fernandes', '1990-05-02', 'BR', 'm', 'Single', 'GX34394584', '2032-07-03', 'Fernades JB', 'Mira Maria', 'Rio', 'fernandes@yahoo.com', '$2y$10$RLTYhmSQkTyjYtz3zcVl5OHExfhi7wO64QPg0yF3mdwbrB9S1jDAq', '', '', 4);

-- --------------------------------------------------------

--
-- Table structure for table `visa-application`
--

CREATE TABLE `visa-application` (
  `id` int NOT NULL,
  `date_of_arrival` datetime DEFAULT NULL,
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP,
  `visa_type` int NOT NULL,
  `status` enum('Processing','Approved','Rejected') NOT NULL DEFAULT 'Processing'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `visa-application`
--

INSERT INTO `visa-application` (`id`, `date_of_arrival`, `date_created`, `visa_type`, `status`) VALUES
(1, '2023-03-01 00:00:00', '2023-02-14 18:27:06', 2, 'Processing'),
(2, '2023-02-01 00:00:00', '2023-02-14 20:18:10', 1, 'Approved'),
(3, '2023-03-03 00:00:00', '2023-02-18 14:28:14', 2, 'Processing'),
(4, '2023-06-05 00:00:00', '2023-02-18 14:31:00', 1, 'Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `visa-attachment`
--

CREATE TABLE `visa-attachment` (
  `id` int NOT NULL,
  `applicant_id` int NOT NULL,
  `name` varchar(60) DEFAULT NULL,
  `attachment_path` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `visa-attachment`
--

INSERT INTO `visa-attachment` (`id`, `applicant_id`, `name`, `attachment_path`) VALUES
(1, 1, 'YellowFeverVaccination', '/assets/files/other-files/1676388427_eda4f762067cc0fdbc9d.jpg'),
(2, 1, 'TravelReservation', '/assets/files/other-files/1676388427_fe70ce8d2dafa4b763da.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `visa-migrations`
--

CREATE TABLE `visa-migrations` (
  `id` bigint UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int NOT NULL,
  `batch` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `visa-migrations`
--

INSERT INTO `visa-migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(43, '2023-01-29-185034', 'App\\Database\\Migrations\\Applicant', 'default', 'App', 1676387987, 1),
(44, '2023-01-29-185054', 'App\\Database\\Migrations\\Application', 'default', 'App', 1676387988, 1),
(45, '2023-01-29-185057', 'App\\Database\\Migrations\\Requirement', 'default', 'App', 1676387988, 1),
(46, '2023-01-29-185106', 'App\\Database\\Migrations\\Staff', 'default', 'App', 1676387988, 1),
(47, '2023-01-29-185116', 'App\\Database\\Migrations\\Visa', 'default', 'App', 1676387988, 1),
(48, '2023-01-29-190020', 'App\\Database\\Migrations\\Attachement', 'default', 'App', 1676387988, 1);

-- --------------------------------------------------------

--
-- Table structure for table `visa-requirement`
--

CREATE TABLE `visa-requirement` (
  `id` int NOT NULL,
  `name` varchar(150) NOT NULL,
  `mandatory` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `visa-requirement`
--

INSERT INTO `visa-requirement` (`id`, `name`, `mandatory`) VALUES
(1, 'Yellow Fever Vaccination', 1),
(2, 'Tour Itinerary', 0),
(3, 'Travel Reservation', 0),
(4, 'Invitation Letter', 0),
(5, 'Hotel Accomodation', 0),
(6, 'Academic Admission Letter', 0),
(7, 'Medical Documents', 0);

-- --------------------------------------------------------

--
-- Table structure for table `visa-staff`
--

CREATE TABLE `visa-staff` (
  `id` int NOT NULL,
  `role` enum('Officer','Manager','Admin') NOT NULL DEFAULT 'Officer',
  `first_name` varchar(60) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `profile_picture` varchar(300) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `visa-staff`
--

INSERT INTO `visa-staff` (`id`, `role`, `first_name`, `last_name`, `profile_picture`, `username`, `email`, `password`) VALUES
(1, 'Admin', 'Ivan', 'Sempebwa', './assets/uploads/profiles/1676388338_8d605a72aa7651a7c61c.png', 'ivanssd', 'ivan@gmail.com', '$2y$10$8/EW4GbrxT/z/tKO/S0V0uY4e/RXbpNXBcivnc.v2c3WxSDaYd.i2'),
(2, 'Manager', 'Alex', 'Kinyera', NULL, 'alexk', 'alex@gmail.com', '$2y$10$vbpoo5JrCB73HhCIv/PPseIJKLFNE3bdEu5smKExJAXDieJhbzXOe'),
(3, 'Admin', 'Charles', 'Nkundabeitu', NULL, 'freeman', 'charles@yahoo.com', '$2y$10$q41jCKzbSJ87csTDenjUpue1WjBkMg1D4QJ/06p.Y4YHhpFiMN/W.'),
(4, 'Manager', 'Marion', 'Adong', NULL, 'marion', 'marion@gmail.com', '$2y$10$gins3A9BopeexJqpCU0bp.kIcyrqyRHRWr1lG9GC.pnDUxrtzNm7q'),
(5, 'Admin', 'Alvin', 'Ategyeka', NULL, 'alvin', 'alvin@gmail.com', '$2y$10$oIIABH35PPzdgMVKdnu1quUGHCqaelwkOZDBjYAdRTJmUbPi2klQK'),
(6, 'Admin', 'Josephine', 'Tegamanyi', NULL, 'jowsey', 'jowsey@gmail.com', '$2y$10$CbJgGABuQ9YOqk1SaYNDheylawNgf.gAGGS4qUP8dmhL5CZhuWpNW'),
(7, 'Manager', 'Grace', 'Kyendo', NULL, 'gkyendo', 'grace@yahoo.com', '$2y$10$IIKiBnUCJ3JvbwccLtfQguWyMspZ4FeljuqQ4ZQQ5Z6cabCTmOzSa'),
(8, 'Admin', 'Paddy', 'Ainebyoona', NULL, 'paddy', 'paddy@gmail.com', '$2y$10$0NjgBjsk1GDGGH9Z72nB1ujoLEi0RWBPtFXFQPCubQoPJhtGgmsoq'),
(9, 'Admin', 'John Francis', 'Mbaziira', NULL, 'jfmbazira', 'jonhfranc@yahoo.com', '$2y$10$61yvGPS7O/Lu5NlvS6WxKOFmFJuJY1sOMi7HCc919DFapg1CFEqJW'),
(10, 'Admin', 'Eric', 'Muhwezi', NULL, 'ericm', 'eric@yahoo.com', '$2y$10$l0lgFt0WZT5VGpOuXN7uWe2FiWsI7axRdgetNLPh1vgB9xJ90C73q');

-- --------------------------------------------------------

--
-- Table structure for table `visa-visa`
--

CREATE TABLE `visa-visa` (
  `id` int NOT NULL,
  `category` varchar(150) NOT NULL,
  `fees` int NOT NULL,
  `multiple_entry` tinyint(1) NOT NULL,
  `type` enum('Visa','Pass') NOT NULL,
  `requirements` json DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `visa-visa`
--

INSERT INTO `visa-visa` (`id`, `category`, `fees`, `multiple_entry`, `type`, `requirements`) VALUES
(1, 'Diplomatic / Official', 0, 0, 'Visa', NULL),
(2, 'Ordinary, Transit', 50, 0, 'Visa', '[3]'),
(3, 'East African Tourist', 150, 0, 'Visa', '[2, 3]'),
(4, 'East African Tourist', 200, 1, 'Visa', '[2, 3]'),
(5, 'Students Pass', 100, 0, 'Pass', '[6]'),
(6, 'Intern or research pass', 700, 0, 'Pass', '[6]'),
(7, 'Dependant Pass - Spouse', 350, 0, 'Pass', NULL),
(8, 'Dependant Pass - Child', 200, 0, 'Pass', NULL),
(9, 'Dependant Pass - Other relatives', 1000, 0, 'Pass', NULL),
(10, 'Dependant on a Diplomat and Official', 0, 0, 'Pass', NULL),
(11, 'Sponsored, Individual Special Pass', 400, 0, 'Pass', NULL),
(12, 'Diplomat & Official', 0, 0, 'Pass', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `visa-applicant`
--
ALTER TABLE `visa-applicant`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `passport_number` (`passport_number`),
  ADD KEY `applicationid_fk` (`application_id`);

--
-- Indexes for table `visa-application`
--
ALTER TABLE `visa-application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visa-attachment`
--
ALTER TABLE `visa-attachment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applicantid_fk` (`applicant_id`);

--
-- Indexes for table `visa-migrations`
--
ALTER TABLE `visa-migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visa-requirement`
--
ALTER TABLE `visa-requirement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visa-staff`
--
ALTER TABLE `visa-staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visa-visa`
--
ALTER TABLE `visa-visa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `visa-applicant`
--
ALTER TABLE `visa-applicant`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `visa-application`
--
ALTER TABLE `visa-application`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `visa-attachment`
--
ALTER TABLE `visa-attachment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `visa-migrations`
--
ALTER TABLE `visa-migrations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `visa-requirement`
--
ALTER TABLE `visa-requirement`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `visa-staff`
--
ALTER TABLE `visa-staff`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `visa-visa`
--
ALTER TABLE `visa-visa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `visa-applicant`
--
ALTER TABLE `visa-applicant`
  ADD CONSTRAINT `applicationid_fk` FOREIGN KEY (`application_id`) REFERENCES `visa-application` (`id`);

--
-- Constraints for table `visa-attachment`
--
ALTER TABLE `visa-attachment`
  ADD CONSTRAINT `applicantid_fk` FOREIGN KEY (`applicant_id`) REFERENCES `visa-applicant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
