-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 30, 2024 at 10:04 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kwizera_bonheur_jms`
--

-- --------------------------------------------------------

--
-- Table structure for table `choosen_visitors`
--

CREATE TABLE `choosen_visitors` (
  `prisoner_id` int(10) DEFAULT NULL,
  `fname` varchar(40) DEFAULT NULL,
  `lname` varchar(40) DEFAULT NULL,
  `id_number` varchar(16) DEFAULT NULL,
  `gender` varchar(40) DEFAULT NULL,
  `DoB` date DEFAULT NULL,
  `martial_status` varchar(40) DEFAULT NULL,
  `admission_date` date DEFAULT NULL,
  `release_date` date DEFAULT NULL,
  `prison_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emoployee_view`
--

CREATE TABLE `emoployee_view` (
  `employee_id` int(10) DEFAULT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(16) DEFAULT NULL,
  `id_number` varchar(16) DEFAULT NULL,
  `phone` varchar(13) DEFAULT NULL,
  `gender` varchar(40) DEFAULT NULL,
  `martial_status` varchar(50) DEFAULT NULL,
  `education_level` varchar(40) DEFAULT NULL,
  `DoB` date DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(10) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(16) NOT NULL,
  `id_number` varchar(16) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `gender` varchar(40) NOT NULL,
  `martial_status` varchar(50) NOT NULL,
  `education_level` varchar(40) NOT NULL,
  `DoB` date NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `prison_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `fname`, `lname`, `id_number`, `phone`, `gender`, `martial_status`, `education_level`, `DoB`, `email`, `password`, `prison_id`) VALUES
(1, 'RUKUNDO', 'egide', '1200256765324536', '+250781452545', 'male', 'married', 'Banchelor', '2000-09-04', 'rukundo@gmaol.com', '12345678', 2),
(4, 'KANGABE', 'Ritha', '1200256765678617', '+250781423775', 'female', 'single', 'Banchelor', '2001-09-04', 'rukundo@gmaol.com', '12345678', 2);

--
-- Triggers `employee`
--
DELIMITER $$
CREATE TRIGGER `AfterDeleteEmployee` AFTER DELETE ON `employee` FOR EACH ROW BEGIN
    INSERT INTO employee_audit (employee_id, action, audit_timestamp)
    VALUES (employee_id, 'DELETE', NOW());
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `AfterInsertEmployee` AFTER INSERT ON `employee` FOR EACH ROW BEGIN
    -- You can perform actions here after a new employee is inserted.
    -- For example, you might log the insertion or perform additional data operations.
    -- This is a placeholder for your custom logic.
    
    -- For demonstration purposes, we'll insert a record into an audit table.
    INSERT INTO employee_audit (employee_id, action, audit_timestamp)
    VALUES (NEW.employee_id, 'INSERT', NOW());
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `AfterUpdateEmployee` AFTER UPDATE ON `employee` FOR EACH ROW BEGIN
    INSERT INTO employee_audit (employee_id, action, audit_timestamp)
    VALUES (NEW.employee_id, 'UPDATE', NOW());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `employee_audit`
--

CREATE TABLE `employee_audit` (
  `employee_id` int(10) NOT NULL,
  `action` varchar(50) NOT NULL,
  `audit_timestamp` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_audit`
--

INSERT INTO `employee_audit` (`employee_id`, `action`, `audit_timestamp`) VALUES
(4, 'INSERT', '2023-09-12 21:17:42.000000');

-- --------------------------------------------------------

--
-- Table structure for table `prisoners`
--

CREATE TABLE `prisoners` (
  `prisoner_id` int(10) NOT NULL,
  `fname` varchar(40) NOT NULL,
  `lname` varchar(40) NOT NULL,
  `id_number` varchar(16) NOT NULL,
  `gender` varchar(40) NOT NULL,
  `DoB` date NOT NULL,
  `martial_status` varchar(40) NOT NULL,
  `admission_date` date NOT NULL,
  `release_date` date NOT NULL,
  `prison_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prisoners`
--

INSERT INTO `prisoners` (`prisoner_id`, `fname`, `lname`, `id_number`, `gender`, `DoB`, `martial_status`, `admission_date`, `release_date`, `prison_id`) VALUES
(3, 'RUGAJU', 'Albelt', '1200156583498765', 'male', '2001-09-15', 'single', '2023-09-06', '2023-09-03', 2),
(4, 'MUGABE', 'Ruth', '1200574567892309', 'female', '2002-09-02', 'devorse', '2014-09-16', '2022-09-20', 4),
(101, 'John', 'kwihangana', '123457654314273', 'Male', '1990-01-15', 'Married', '2023-09-01', '2024-09-01', 1),
(102, 'iyvkbhj', 'vjhbknm', '234323', 'Male', '2024-04-10', 'Divorced', '2024-04-19', '2024-04-25', 5),
(103, 'RURANGWA', 'Thimoth', '234323', 'Male', '2024-04-29', 'Single', '2024-04-29', '2024-04-29', 5),
(109, 'iyvkbhj', 'Thimoth', '234323', 'Male', '2024-04-30', 'Single', '2024-04-30', '2024-04-30', 5);

-- --------------------------------------------------------

--
-- Table structure for table `prisoners_view`
--

CREATE TABLE `prisoners_view` (
  `prisoner_id` int(10) DEFAULT NULL,
  `fname` varchar(40) DEFAULT NULL,
  `lname` varchar(40) DEFAULT NULL,
  `id_number` varchar(16) DEFAULT NULL,
  `gender` varchar(40) DEFAULT NULL,
  `DoB` date DEFAULT NULL,
  `martial_status` varchar(40) DEFAULT NULL,
  `admission_date` date DEFAULT NULL,
  `release_date` date DEFAULT NULL,
  `prison_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prisoner_relation`
--

CREATE TABLE `prisoner_relation` (
  `relation_id` int(10) NOT NULL,
  `fname` varchar(40) DEFAULT NULL,
  `lname` varchar(40) DEFAULT NULL,
  `id_number` varchar(16) DEFAULT NULL,
  `prisoner_id` int(10) DEFAULT NULL,
  `gender` varchar(30) DEFAULT NULL,
  `martial_status` varchar(30) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `district` varchar(40) DEFAULT NULL,
  `sector` varchar(40) DEFAULT NULL,
  `cell` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prisoner_relation`
--

INSERT INTO `prisoner_relation` (`relation_id`, `fname`, `lname`, `id_number`, `prisoner_id`, `gender`, `martial_status`, `email`, `district`, `sector`, `cell`) VALUES
(1, 'ISHIMWE', 'Kabebe', '1200232765324536', 3, 'male', 'single', 'kabe@gmail.com', 'RUTSIRO', 'GIHANGO', 'CONGO-NIL'),
(2, 'KABANO', 'Emmy', '1200156213493465', 4, 'female', 'married', 'emmy@gmail.com', 'Karongi', 'kibuyr', 'gisayo'),
(3, 'KANGABE', 'Ritha', '1200574985292309', 2, 'female', 'devorse', 'kagi@gmail.com', 'Huye', 'Ngoma', 'Ngoma');

-- --------------------------------------------------------

--
-- Table structure for table `prisoner_relation_view`
--

CREATE TABLE `prisoner_relation_view` (
  `relation_id` int(10) DEFAULT NULL,
  `fname` varchar(40) DEFAULT NULL,
  `lname` varchar(40) DEFAULT NULL,
  `id_number` varchar(16) DEFAULT NULL,
  `prisoner_id` int(10) DEFAULT NULL,
  `gender` varchar(30) DEFAULT NULL,
  `martial_status` varchar(30) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `district` varchar(40) DEFAULT NULL,
  `sector` varchar(40) DEFAULT NULL,
  `cell` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prisons`
--

CREATE TABLE `prisons` (
  `prison_id` int(10) NOT NULL,
  `prison_name` varchar(50) NOT NULL,
  `prison_district` varchar(50) NOT NULL,
  `prison_sector` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prisons`
--

INSERT INTO `prisons` (`prison_id`, `prison_name`, `prison_district`, `prison_sector`) VALUES
(5, 'Nyarugenge prison', 'Nyarugenge', 'mushubi'),
(7, 'Kigali', 'Nyanza', 'kigali'),
(8, 'Kigali prison', 'Nyanza', 'kigali'),
(9, 'Rubavu prison', 'Rubavu', 'Rubavu'),
(18, 'Kigali', 'Kicukiro', 'kigali'),
(19, 'Rubavu Prison', 'Rubavu', 'Rubavu'),
(20, 'RUBAVU JAIL', 'RUBAVU', 'RUBAVU'),
(21, 'Rubavu', 'Rubavu', 'Rubavu'),
(22, 'KABUTARE Jail', 'Huye', 'Taba'),
(23, 'Huye', 'Huye', 'HIha'),
(24, 'Huye', 'Huye', 'HIha'),
(25, 'Huye', 'Huye', 'HIha');

--
-- Triggers `prisons`
--
DELIMITER $$
CREATE TRIGGER `AfterInsertPrison` AFTER INSERT ON `prisons` FOR EACH ROW BEGIN
    -- You can perform actions here after a new prison is inserted.
    -- For example, you might log the insertion or perform additional data operations.
    -- This is a placeholder for your custom logic.

    -- For demonstration purposes, we'll insert a record into an audit table.
    INSERT INTO prison_audit (prison_id, prison_name, prison_district, prison_sector, action, audit_timestamp)
    VALUES (NEW.prison_id, NEW.prison_name, NEW.prison_district, NEW.prison_sector, 'INSERT', NOW());
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `AfterUpdatePrison` AFTER INSERT ON `prisons` FOR EACH ROW BEGIN
    INSERT INTO prison_audit (prison_id, prison_name, prison_district, prison_sector, action, audit_timestamp)
    VALUES (NEW.prison_id, NEW.prison_name, NEW.prison_district, NEW.prison_sector, 'UPDATE', NOW());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `prisons_view`
--

CREATE TABLE `prisons_view` (
  `prison_id` int(10) DEFAULT NULL,
  `prison_name` varchar(50) DEFAULT NULL,
  `prison_district` varchar(50) DEFAULT NULL,
  `prison_sector` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prison_audit`
--

CREATE TABLE `prison_audit` (
  `prison_id` int(10) NOT NULL,
  `prison_name` varchar(50) NOT NULL,
  `prison_district` varchar(50) NOT NULL,
  `prison_sector` varchar(50) NOT NULL,
  `action` varchar(50) NOT NULL,
  `audit_timestamp` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prison_audit`
--

INSERT INTO `prison_audit` (`prison_id`, `prison_name`, `prison_district`, `prison_sector`, `action`, `audit_timestamp`) VALUES
(7, 'Kigali', 'Nyanza', 'kigali', 'INSERT', '2023-09-12 22:09:14.000000'),
(7, 'Kigali', 'Nyanza', 'kigali', 'UPDATE', '2023-09-12 22:09:14.000000'),
(8, 'Kigali prison', 'Nyanza', 'kigali', 'INSERT', '2023-09-12 22:09:43.000000'),
(8, 'Kigali prison', 'Nyanza', 'kigali', 'UPDATE', '2023-09-12 22:09:43.000000'),
(0, 'Rubavu prison', 'Rubavu', 'Rubavu', 'INSERT', '2024-01-16 11:20:32.000000'),
(0, 'Rubavu prison', 'Rubavu', 'Rubavu', 'UPDATE', '2024-01-16 11:20:32.000000'),
(18, 'Kigali', 'Kicukiro', 'kigali', 'INSERT', '2024-01-16 11:23:05.000000'),
(18, 'Kigali', 'Kicukiro', 'kigali', 'UPDATE', '2024-01-16 11:23:05.000000'),
(19, 'Rubavu Prison', 'Rubavu', 'Rubavu', 'INSERT', '2024-01-16 11:24:20.000000'),
(19, 'Rubavu Prison', 'Rubavu', 'Rubavu', 'UPDATE', '2024-01-16 11:24:20.000000'),
(20, 'RUBAVU JAIL', 'RUBAVU', 'RUBAVU', 'INSERT', '2024-01-16 14:08:20.000000'),
(20, 'RUBAVU JAIL', 'RUBAVU', 'RUBAVU', 'UPDATE', '2024-01-16 14:08:20.000000'),
(21, '', '', '', 'INSERT', '2024-01-16 17:15:39.000000'),
(21, '', '', '', 'UPDATE', '2024-01-16 17:15:39.000000'),
(22, 'KABUTARE Jail', 'Huye', 'Taba', 'INSERT', '2024-01-16 20:37:13.000000'),
(22, 'KABUTARE Jail', 'Huye', 'Taba', 'UPDATE', '2024-01-16 20:37:13.000000'),
(23, 'Kagugu', 'Kigali', 'Kigali', 'INSERT', '2024-01-19 12:55:57.000000'),
(23, 'Kagugu', 'Kigali', 'Kigali', 'UPDATE', '2024-01-19 12:55:57.000000'),
(23, 'Huye', 'Huye', 'HIha', 'INSERT', '2024-04-30 13:33:56.000000'),
(23, 'Huye', 'Huye', 'HIha', 'UPDATE', '2024-04-30 13:33:56.000000'),
(24, 'Huye', 'Huye', 'HIha', 'INSERT', '2024-04-30 13:35:39.000000'),
(24, 'Huye', 'Huye', 'HIha', 'UPDATE', '2024-04-30 13:35:39.000000'),
(25, 'Huye', 'Huye', 'HIha', 'INSERT', '2024-04-30 13:36:09.000000'),
(25, 'Huye', 'Huye', 'HIha', 'UPDATE', '2024-04-30 13:36:09.000000');

-- --------------------------------------------------------

--
-- Table structure for table `prison_view`
--

CREATE TABLE `prison_view` (
  `prison_id` int(10) DEFAULT NULL,
  `prison_name` varchar(50) DEFAULT NULL,
  `prison_district` varchar(50) DEFAULT NULL,
  `prison_sector` varchar(50) DEFAULT NULL,
  `prisoner_id` int(10) DEFAULT NULL,
  `prisoner_fname` varchar(40) DEFAULT NULL,
  `prisoner_lname` varchar(40) DEFAULT NULL,
  `prisoner_id_number` varchar(16) DEFAULT NULL,
  `prisoner_gender` varchar(40) DEFAULT NULL,
  `prisoner_DoB` date DEFAULT NULL,
  `prisoner_martial_status` varchar(40) DEFAULT NULL,
  `admission_date` date DEFAULT NULL,
  `release_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint(100) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `id_number` varchar(16) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `gender` varchar(40) NOT NULL,
  `martial_status` varchar(50) NOT NULL,
  `DoB` date NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(400) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'visitor'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `id_number`, `phone`, `gender`, `martial_status`, `DoB`, `email`, `password`, `role`) VALUES
(3, 'RUKUNDO', 'Aimable', '234323', '0781451223', 'male', 'single', '2024-04-30', 'kbonheur123@gmail.com', '$2y$10$EHlU9WbIaoevXflMjc69NuZSsoxitPMF.GrtBEO7NmK0.qYqqDcbm', 'employee'),
(4, 'iyvkbhj', 'Thimoth', '234323', '1234543w', 'female', 'married', '2024-04-30', 'kbonheur438@gmail.com', '$2y$10$1q9cmFlKLKSGvUWs0JJvoOBhYdFpVCnpMlJHTnfD8OTLni9h9nJ1W', 'visitor'),
(5, 'KWIZERA', 'Bonheur', '234323', '0781451223', 'male', 'single', '2024-04-30', 'kbonheur123@gmail.com', '$2y$10$EHlU9WbIaoevXflMjc69NuZSsoxitPMF.GrtBEO7NmK0.qYqqDcbm', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `prisoners`
--
ALTER TABLE `prisoners`
  ADD PRIMARY KEY (`prisoner_id`);

--
-- Indexes for table `prisons`
--
ALTER TABLE `prisons`
  ADD PRIMARY KEY (`prison_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `prisoners`
--
ALTER TABLE `prisoners`
  MODIFY `prisoner_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `prisons`
--
ALTER TABLE `prisons`
  MODIFY `prison_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
