-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2025 at 01:49 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `th_health_care_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

DROP TABLE IF EXISTS `address`;
CREATE TABLE `address` (
  `id` int(10) NOT NULL,
  `block_house_number` varchar(100) DEFAULT NULL,
  `street` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `barangay` varchar(100) DEFAULT NULL,
  `zip` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
CREATE TABLE `appointments` (
  `id` int(10) NOT NULL,
  `reference` varchar(100) NOT NULL,
  `type` enum('online','walk-in') DEFAULT NULL,
  `status` enum('pending','arrived','cancelled','scheduled') DEFAULT NULL,
  `date` date DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `guest_name` varchar(100) DEFAULT NULL,
  `guest_email` varchar(100) DEFAULT NULL,
  `guest_phone` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `notes` text DEFAULT NULL,
  `reservation_fee` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `reference`, `type`, `status`, `date`, `end_time`, `start_time`, `user_id`, `remark`, `guest_name`, `guest_email`, `guest_phone`, `created_at`, `notes`, `reservation_fee`) VALUES
(1, 'APT-A5C570C', 'online', 'pending', '2023-06-28', NULL, '05:47:00', 0, '', 'Jhon Dee', 'tst@email.com', '906338745', '2023-06-25 06:47:08', 'test', '0.00'),
(2, 'APT-FD66480', 'online', 'pending', '2023-06-28', NULL, '05:47:19', 0, '', 'Jhon Dee', 'testuser@email.com', '906338745', '2023-06-25 06:47:42', 'test', '0.00'),
(3, 'APT-3849E10', 'online', 'pending', '2023-08-21', NULL, '09:17:58', 0, '', 'Jade Marie D. Dela Cruz', 'jademariedelacruz6@gmail.com', '09365546653', '2023-08-18 10:24:14', 'eyeglass', '0.00'),
(4, 'APT-7E978A7', 'online', 'pending', '2023-08-21', NULL, '11:50:33', 0, '', 'JuanDelacruz', 'vimeva1105@backva.com', '09212032928', '2023-08-18 13:06:11', 'Frame Glass ', '50.00'),
(5, 'APT-7B3A249', 'online', 'pending', '2023-08-22', NULL, '03:58:59', 0, '', 'JuanDiaz', 'JuanDiaz@gmail.com', '09212032927', '2023-08-18 13:44:39', 'Lens fitting ', '50.00'),
(6, 'APT-940CB00', 'online', 'pending', '2023-08-22', NULL, '12:00:28', 0, '', 'JuanDelacruz', 'vimeva1105@backva.com', '09212032927', '2023-08-18 13:55:50', 'Lens fitting', '50.00'),
(7, 'APT-CDF5F6C', 'online', 'pending', '2023-08-23', NULL, '10:03:00', 0, '', 'Pedro Juan ', 'vimeva1105@backva.com', '0921203295', '2023-08-18 14:04:55', 'Contact-lens', NULL),
(8, 'APT-7C32EC9', 'online', 'arrived', '2023-08-24', NULL, '04:23:12', 56, '', 'Mark Angelo Gonzales', 'gonzalesmarkangeloph@gmail.com', '09063387458', '2023-08-20 17:23:17', '09063387458', '50.00'),
(9, 'APT-8A3E684', 'online', 'pending', '2023-08-31', NULL, '04:34:38', 56, '', 'Mark Angelo Gonzales', 'gonzalesmarkangeloph@gmail.com', '09063387458', '2023-08-20 17:34:42', '09063387458', '50.00'),
(10, 'APT-3931D67', 'online', 'arrived', '2023-09-01', NULL, '04:34:38', 56, '', 'Mark Angelo Gonzales', 'gonzalesmarkangeloph@gmail.com', '09063387458', '2023-08-20 17:35:56', '09063387458', '50.00'),
(11, 'APT-DCDA6D5', 'online', 'arrived', '2023-08-30', NULL, '01:03:32', 56, '', 'Mark Angelo Gonzales', 'gonzalesmarkangeloph@gmail.com', '09063387458', '2023-08-24 14:03:44', '09063387458', '50.00'),
(12, 'APT-0619A48', 'online', 'arrived', '2023-08-30', NULL, '07:15:39', 62, '', 'Jade Marie D. Dela Cruz', 'jademariedelacruz01091966@gmail.com', '09517552291', '2023-08-27 08:17:18', 'change of frame', '50.00'),
(13, 'APT-FD70359', 'online', 'pending', '2023-08-30', NULL, '01:54:33', 0, '', 'Miguel Angel Bautista', 'haroo234@email.com', '09226645656', '2023-08-27 14:56:59', 'Pagmasdan si doktora', '50.00'),
(14, 'APT-19BBC45', 'online', 'arrived', '2023-08-30', NULL, '10:00:43', 65, '', 'Juan ', 'vogol43743@vikinoko.com', '09506432749', '2023-08-27 15:39:44', 'Adjustment ', '50.00'),
(15, 'APT-24F8D16', 'online', 'arrived', '2023-08-31', NULL, '10:00:43', 50, '', 'BertongBatomBakal', 'dacano6817@wlmycn.com', '09506432749', '2023-08-27 16:29:32', 'Nadapa Uno Ulo ', '50.00'),
(16, 'APT-09896C5', 'online', 'arrived', '2023-08-31', NULL, '10:00:00', 0, '', 'JuanManuel', 'dacano6817@wlmycn.com', '09506432749', '2023-08-27 16:43:20', 'Anti Radiation Glasses ', NULL),
(17, 'APT-E94EEC9', 'online', 'arrived', '2023-08-31', NULL, '00:00:00', 0, '', 'bertongBaluga ', 'dacano6817@wlmycn.com', '09506432749', '2023-08-27 16:49:32', 'Papasadya ', NULL),
(18, 'APT-667525C', 'online', 'pending', '2023-10-20', NULL, '08:09:47', 0, '', 'Juan Delacruz', 'Juandelacruz123@gmail.com', '0921203925', '2023-10-17 09:11:46', 'Check up ', '50.00'),
(19, 'APT-417DD7F', 'online', 'pending', '2024-04-19', NULL, '05:33:52', 67, '', 'The Rock', 'championinnovation2022@gmail.com', '09945510322', '2024-04-16 06:33:59', '09945510322', '50.00'),
(20, 'APT-F222400', 'online', 'pending', '2024-04-22', NULL, '05:33:52', 67, '', 'The Rock', 'championinnovation2022@gmail.com', '09945510322', '2024-04-16 06:36:22', '09945510322', '50.00'),
(21, 'APT-FB98213', 'online', 'pending', '2024-04-23', NULL, '05:37:23', 67, '', 'Jhon Dee', 'championinnovation2022@gmail.com', '09945510322', '2024-04-16 06:38:22', 'test', '50.00'),
(22, 'APT-4D3844D', 'online', 'arrived', '2024-04-20', NULL, '10:59:08', 48, '', 'Jade Marie D. Dela Cruz', 'jademariedelacruz6@gmail.com', '09517552292', '2024-04-16 07:25:13', 'changing glass frame', '50.00'),
(23, 'APT-F87B140', 'online', 'arrived', '2024-04-21', NULL, '13:02:12', 48, '', 'Jade Dizon', 'jademariedelacruz6@gmail.com', '09185246177', '2024-04-16 10:02:40', '09185246177', '50.00'),
(24, 'APT-A18BA63', 'online', 'pending', '2024-04-20', NULL, '07:01:41', 48, '', 'Jade Dizon', 'jademariedelacruz6@gmail.com', '09185246177', '2024-04-16 10:05:20', '09185246177', '50.00'),
(25, 'APT-69BE3A6', 'online', 'arrived', '2024-04-24', NULL, '13:09:34', 69, '', 'Jade Dela Cruz', 'jademariedelacruz6@gmail.com', '09517552292', '2024-04-16 11:13:53', 'changing of glass frame', '50.00'),
(26, 'APT-F24E61B', 'online', 'arrived', '2024-04-24', NULL, '13:08:48', 62, '', 'Jade Dizon', 'Jademariedelacruz01091966@gmail.com', '09517552291', '2024-04-16 11:31:14', '09517552291', '50.00'),
(27, 'APT-CC4A909', 'online', 'arrived', '2024-05-03', NULL, '11:51:06', 71, '', 'Jade Dela Cruz', 'jademariedelacruz6@gmail.com', '09517552292', '2024-04-30 03:51:51', NULL, NULL),
(28, 'APT-A85C641', 'online', 'arrived', '2024-05-21', NULL, '15:30:00', 0, '', 'mannypaquiao', 'mannypaquiao@gmail.com', '09660070041', '2024-05-18 06:32:53', 'Consultation', NULL),
(29, 'APT-D5F73B3', 'online', 'arrived', '2024-05-23', NULL, '07:13:10', 0, '', 'JogratDeguzman', 'JogratDeguzman@gmail.com', '09660070055', '2024-05-18 08:13:53', 'CONSULTATION', '50.00'),
(30, 'APT-D62B87E', 'online', 'arrived', '2024-05-24', NULL, '09:19:19', 0, '', 'Jade Marie D. Dela Cruz', 'jademariedelacruz6@gmail.com', '09945510322', '2024-05-18 08:19:59', 'change of lens', '50.00'),
(31, 'APT-13C705D', 'online', 'arrived', '2024-05-25', NULL, '15:00:00', 0, '', 'JoeRogan', 'JoeRogan@gmail.com', '09660069994', '2024-05-20 06:19:55', 'Consultation', NULL),
(32, 'APT-4A73DF5', 'online', 'arrived', '2024-05-29', NULL, '11:13:45', 87, '', 'Jade Marie D. Dela Cruz', 'jademariedelacruz6@gmail.com', '09945510322', '2024-05-21 06:16:58', 'change of lenses', '50.00'),
(33, 'APT-8DC82DC', 'online', 'pending', '2024-06-07', NULL, '10:33:43', 90, '', 'THORSTEN KAYE MERIDA MATIGA', 'tinmatiga@gmail.com', '09123456789', '2024-06-04 11:34:35', 'eyeglasess', '50.00'),
(34, 'APT-59327E8', 'online', 'arrived', '2024-06-10', NULL, '02:40:39', 91, '', 'Johnace  Rosales', 'rjohnace30@gmail.com', '09660070056', '2024-06-04 18:41:06', NULL, NULL),
(35, 'APT-EF0F34B', 'online', 'pending', '2024-06-13', NULL, '09:06:02', 91, '', 'Digong pagong ', 'Digongpagong@gmail.com', '092268787520', '2024-06-04 22:06:34', 'Head ache', '50.00'),
(36, 'APT-EEA6C69', 'online', 'pending', '2024-06-14', NULL, '09:08:35', 91, '', 'Digong', 'digongpagong@gmail.com', '09660070019', '2024-06-04 22:13:50', '09660070019', '50.00'),
(37, 'APT-FA922FB', 'online', 'pending', '2024-06-14', NULL, '16:25:18', 93, '', 'Erlynda ', 'erlyndaMariano@outlook.com', '09212032955', '2024-06-10 17:26:27', 'Eye Examination ', '50.00'),
(38, 'APT-6E86B91', 'online', 'arrived', '2024-06-15', NULL, '04:27:37', 93, '', 'Erlynda  Mariano', 'erlyndaMariano@outlook.com', '09212032955', '2024-06-10 17:27:54', '09212032955', '50.00'),
(39, 'APT-5D35A37', 'online', 'arrived', '2024-06-15', NULL, '15:54:35', 91, '', 'Johnace  Rosales', 'rjohnace30@gmail.com', '09660070019', '2024-06-10 17:55:06', 'Eye Adjustment', '50.00'),
(40, 'APT-625E594', 'online', 'pending', '2024-06-15', NULL, '14:04:25', 0, '', 'Erlynda ', 'erlyndmaMariano@outlook.com', '09660070019', '2024-06-11 03:03:03', 'Eye Examination', '50.00'),
(41, 'APT-BEC140A', 'online', 'pending', '2024-06-14', NULL, '14:04:08', 0, '', 'Erlynda ', 'erlyndmaMariano@outlook.com', '09660070019', '2024-06-11 03:04:42', 'Eye Examination ', '50.00'),
(42, 'APT-22EE8EE', 'online', 'arrived', '2024-06-17', NULL, '14:13:39', 95, '', 'Erlynda  Mariano ', 'erlyndmaMariano@outlook.com', '09660070019', '2024-06-11 03:14:09', '09660070019', '50.00'),
(43, 'APT-4A14685', 'online', 'arrived', '2024-06-18', NULL, '09:12:22', 99, '', 'ABCD ABCDD', 'erlyndaMariano@outlook.com', '09262052724', '2024-06-11 08:12:55', '09262052724', '50.00'),
(44, 'APT-AA60539', 'online', 'pending', '2024-07-10', NULL, '07:18:33', 99, '', 'ABCD ABCDD', 'erlyndaMariano@outlook.com', '09262052724', '2024-06-11 08:19:21', '09262052724', '50.00'),
(45, 'APT-42C9BA7', 'online', 'pending', '2024-07-05', NULL, '07:20:31', 99, '', 'ABCD ABCDD', 'erlyndaMariano@outlook.com', '09262052724', '2024-06-11 08:20:43', '09262052724', '50.00'),
(46, 'APT-7889B35', 'online', 'pending', '2024-07-17', NULL, '04:29:33', 99, '', 'ABCD ABCDD', 'erlyndaMariano@outlook.com', '09262052724', '2024-06-11 08:31:16', NULL, NULL),
(47, 'APT-D2955A2', 'online', 'arrived', '2024-06-17', NULL, '07:35:21', 100, '', 'Jade Marie Dela Cruz', 'jademariedelacruz6@gmail.com', '09517552292', '2024-06-13 08:35:45', 'Eye contact ', '50.00'),
(48, 'APT-9B09B7D', 'online', 'arrived', '2024-06-17', NULL, '05:36:10', 100, '', 'Jade Marie Dela Cruz', 'jademariedelacruz6@gmail.com', '09517552292', '2024-06-13 09:36:29', NULL, NULL),
(49, 'APT-D2A5332', 'online', 'arrived', '2024-07-17', NULL, '15:44:02', 100, '', 'Jade Marie Dela Cruz', 'jademariedelacruz6@gmail.com', '09517552292', '2024-06-13 09:45:06', NULL, NULL),
(50, 'APT-2C83CC0', 'online', 'arrived', '2024-07-01', NULL, '03:20:20', 101, '', 'Cherry Dela Cruz', 'charitodelacruz0109@gmail.com', '09279443054', '2024-06-23 04:20:36', '09279443054', '50.00'),
(51, 'APT-A1C74A2', 'online', 'arrived', '2024-08-06', NULL, '12:50:32', 100, '', 'Jade Marie Dela Cruz', 'jademariedelacruz6@gmail.com', '09517552292', '2024-07-09 13:51:01', '09517552292', '50.00'),
(52, 'APT-FD87BAA', 'online', 'arrived', '2024-07-16', NULL, '12:50:32', 100, '', 'Jade Marie Dela Cruz', 'jademariedelacruz6@gmail.com', '09517552292', '2024-07-09 13:51:42', '09517552292', '50.00'),
(53, 'APT-AA830A0', 'online', 'pending', '2024-07-18', NULL, '05:40:07', 58, '', 'Mark Angelo Gonzales', 'gonzalesmarkangeloph@gmail.com', '09063387451', '2024-07-14 18:40:20', '123123', '50.00'),
(54, 'APT-C4358CE', 'online', 'arrived', '2024-07-25', NULL, '05:53:06', 58, '', 'tester solo', 'gonzalesmarkangeloph@gmail.com', '09063387433', '2024-07-14 18:53:11', '09063387433', '50.00'),
(55, 'APT-21B63DC', 'online', 'arrived', '2024-08-01', NULL, '06:11:37', 100, '', 'Jade Marie Dela Cruz', 'jademariedelacruz6@gmail.com', '09517552292', '2024-07-15 07:11:56', '09517552292', '50.00'),
(56, 'APT-11E847D', 'online', 'arrived', '2024-07-29', NULL, '02:44:37', 100, '', 'Jade Marie Dela Cruz', 'jademariedelacruz6@gmail.com', '09517552292', '2024-07-23 15:44:58', '09517552292', '50.00'),
(57, 'APT-2A324DE', 'online', 'pending', '2024-07-29', NULL, '02:47:55', 101, '', 'Cherry Dela Cruz', 'charitodelacruz0109@gmail.com', '09279443054', '2024-07-23 15:48:19', 'Eye check', '50.00'),
(58, 'APT-5F4E4E9', 'online', 'pending', '2024-07-30', NULL, '09:00:43', 100, '', 'Jade Marie Dela Cruz', 'jademariedelacruz6@gmail.com', '09517552292', '2024-07-23 16:10:22', '09517552292', '50.00'),
(59, 'APT-E5AFDA4', 'online', 'arrived', '2024-07-31', NULL, '13:00:32', 100, '', 'Jade Marie Dela Cruz', 'jademariedelacruz6@gmail.com', '09517552292', '2024-07-23 16:11:25', '09517552292', '50.00'),
(60, 'APT-7200CAE', 'online', 'arrived', '2024-08-01', NULL, '09:00:47', 100, '', 'Jade Marie Dela Cruz', 'jademariedelacruz6@gmail.com', '09517552292', '2024-07-23 16:16:17', NULL, NULL),
(61, 'APT-8B3BD87', 'online', 'pending', '2024-07-31', NULL, '10:00:11', 100, '', 'Jade Marie Dela Cruz', 'jademariedelacruz6@gmail.com', '09517552292', '2024-07-28 14:08:02', '09517552292', '50.00'),
(62, 'APT-059E31C', 'online', 'pending', '2024-08-19', NULL, '10:00:31', 101, '', 'Cherry Dela Cruz', 'charitodelacruz0109@gmail.com', '09279443054', '2024-07-28 14:12:11', '09279443054', '50.00'),
(63, 'APT-72A6A3C', 'online', 'pending', '2024-08-19', NULL, '10:00:45', 100, '', 'Jade Marie Dela Cruz', 'jademariedelacruz6@gmail.com', '09517552292', '2024-07-28 14:13:32', '09517552292', '50.00'),
(64, 'APT-D88E1F6', 'online', 'pending', '2024-08-20', NULL, '10:00:00', 101, '', 'Cherry Dela Cruz', 'charitodelacruz0109@gmail.com', '09279443054', '2024-07-28 14:15:32', '09279443054', '50.00'),
(65, 'APT-A1AB9F4', 'online', 'scheduled', '2024-08-20', NULL, '10:00:15', 100, '', 'Jade Marie Dela Cruz', 'jademariedelacruz6@gmail.com', '09517552292', '2024-07-28 14:16:56', '09517552292', '50.00'),
(66, 'APT-381ACD4', 'online', 'pending', '2024-09-02', NULL, '12:00:00', 96, '', 'abc', 'abc@abc.abc', '0952743965273', '2024-07-29 02:16:48', 'eye', NULL),
(67, 'APT-15F98F6', 'online', 'pending', '2024-09-02', NULL, '12:00:00', 0, '', 'def', 'def@abc.abc', '09762963492', '2024-07-29 02:18:08', 'eye', NULL),
(68, 'APT-BAAFD5E', 'online', 'arrived', '2024-09-03', NULL, '13:00:45', 100, '', 'Jade Marie Dela Cruz', 'jademariedelacruz6@gmail.com', '09517552292', '2024-07-29 02:23:09', '09517552292', '50.00'),
(69, 'APT-A68AAE5', 'online', 'arrived', '2024-09-03', NULL, '13:00:46', 101, '', 'Cherry Dela Cruz', 'charitodelacruz0109@gmail.com', '09279443054', '2024-07-29 02:24:29', '09279443054', '50.00'),
(70, 'APT-54231FC', 'online', 'arrived', '2024-08-05', NULL, '14:12:19', 102, '', 'Johnace Rosales', 'rjohnace30@gmail.com', '09212032924', '2024-07-31 03:12:52', '09660070066', '50.00'),
(71, 'APT-B0489DB', 'online', 'arrived', '2024-08-07', NULL, '02:22:19', 102, '', 'Johnace Rosales', 'rjohnace30@gmail.com', '09212032924', '2024-07-31 03:22:26', '09212032924', '50.00'),
(72, 'APT-EB23897', 'online', 'arrived', '2024-08-07', NULL, '11:30:29', 102, '', 'Johnace Rosales', 'rjohnace30@gmail.com', '09212032924', '2024-07-31 03:30:59', NULL, NULL),
(73, 'APT-89E0F23', 'online', 'scheduled', '2024-08-09', NULL, '14:59:38', 103, '', 'Johnace Rosales', 'rjohnace30@gmail.com', '09212032924', '2024-07-31 03:59:46', '09212032924', '50.00'),
(74, 'APT-D6DE20D', 'online', 'arrived', '2024-08-10', NULL, '04:19:50', 105, '', 'Johnace Rosales', 'rjohnace30@gmail.com', '09212032924', '2024-08-05 17:50:44', 'Eye examination', '50.00'),
(75, 'APT-539C865', 'online', 'arrived', '2024-08-15', NULL, '04:52:01', 105, '', 'Johnace Rosales', 'rjohnace30@gmail.com', '09212032924', '2024-08-05 17:52:17', 'Eye examination ', '50.00');

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

DROP TABLE IF EXISTS `attachments`;
CREATE TABLE `attachments` (
  `id` int(10) NOT NULL,
  `label` varchar(100) DEFAULT NULL,
  `filename` varchar(100) DEFAULT NULL,
  `file_type` varchar(100) DEFAULT NULL,
  `display_name` varchar(100) DEFAULT NULL,
  `search_key` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `global_key` varchar(100) DEFAULT NULL,
  `global_id` int(10) DEFAULT NULL,
  `path` text DEFAULT NULL,
  `url` text DEFAULT NULL,
  `full_path` text DEFAULT NULL,
  `full_url` text DEFAULT NULL,
  `is_visible` tinyint(1) DEFAULT NULL,
  `created_by` int(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attachments`
--

INSERT INTO `attachments` (`id`, `label`, `filename`, `file_type`, `display_name`, `search_key`, `description`, `global_key`, `global_id`, `path`, `url`, `full_path`, `full_url`, `is_visible`, `created_by`, `created_at`) VALUES
(1, 'RESERVATION_PAYMENT_PHOTO', '08_A18F067B680B3F1.PNG', 'png', 'PMT-90E7B33', NULL, NULL, 'RESERVATION_PAYMENT_PHOTO', 5, '/home/korpzpru/vividoptical.online/public/uploads', 'https://www.vividoptical.online/public/uploads', '/home/korpzpru/vividoptical.online/public/uploads/08_A18F067B680B3F1.PNG', 'https://www.vividoptical.online/public/uploads/08_A18F067B680B3F1.PNG', NULL, NULL, '2023-08-20 17:37:02'),
(2, 'prescription', '08_DE917412FF15A1C.JPG', 'jpg', 'test-prescription.jpg', NULL, 'this the prescription image on this session', 'PATIENT_SESSION', 6, '/home/korpzpru/vividoptical.online/public/uploads', 'https://www.vividoptical.online/public/uploads', '/home/korpzpru/vividoptical.online/public/uploads/08_DE917412FF15A1C.JPG', 'https://www.vividoptical.online/public/uploads/08_DE917412FF15A1C.JPG', NULL, NULL, '2023-08-20 17:42:29'),
(4, 'Prescription', '08_6C9B3035FCACA8F.JPG', 'jpg', 'sample_.jpg', NULL, '', 'PATIENT_SESSION', 7, '/home/korpzpru/vividoptical.online/public/uploads', 'https://www.vividoptical.online/public/uploads', '/home/korpzpru/vividoptical.online/public/uploads/08_6C9B3035FCACA8F.JPG', 'https://www.vividoptical.online/public/uploads/08_6C9B3035FCACA8F.JPG', NULL, NULL, '2023-08-24 13:53:32'),
(5, NULL, '0e58fb0040719fabf29dcb2373b39720.jpg', 'jpg', 'artworks-000082317098-omf3wu-t500x500.jpg', NULL, NULL, 'PRODUCT_IMAGES', 11, '/home/korpzpru/vividoptical.online/public/uploads', 'https://www.vividoptical.online/public/uploads', '/home/korpzpru/vividoptical.online/public/uploads/0e58fb0040719fabf29dcb2373b39720.jpg', 'https://www.vividoptical.online/public/uploads/0e58fb0040719fabf29dcb2373b39720.jpg', NULL, NULL, '2023-08-24 13:55:23'),
(6, 'RESERVATION_PAYMENT_PHOTO', '08_9BFEB64D84864FB.PNG', 'png', 'PMT-6F1A0C2', NULL, NULL, 'RESERVATION_PAYMENT_PHOTO', 9, '/home/korpzpru/vividoptical.online/public/uploads', 'https://www.vividoptical.online/public/uploads', '/home/korpzpru/vividoptical.online/public/uploads/08_9BFEB64D84864FB.PNG', 'https://www.vividoptical.online/public/uploads/08_9BFEB64D84864FB.PNG', NULL, NULL, '2023-08-24 14:03:52'),
(7, 'RESERVATION_PAYMENT_PHOTO', '08_CB9304EA17BA313.JPG', 'jpg', 'PMT-AEFAF4D', NULL, NULL, 'RESERVATION_PAYMENT_PHOTO', 10, '/home/korpzpru/vividoptical.online/public/uploads', 'https://www.vividoptical.online/public/uploads', '/home/korpzpru/vividoptical.online/public/uploads/08_CB9304EA17BA313.JPG', 'https://www.vividoptical.online/public/uploads/08_CB9304EA17BA313.JPG', NULL, NULL, '2023-08-27 08:18:29'),
(8, 'RESERVATION_PAYMENT_PHOTO', '08_9D477FE8BE7D97A.PNG', 'png', 'PMT-7F610EC', NULL, NULL, 'RESERVATION_PAYMENT_PHOTO', 11, '/home/korpzpru/vividoptical.online/public/uploads', 'https://www.vividoptical.online/public/uploads', '/home/korpzpru/vividoptical.online/public/uploads/08_9D477FE8BE7D97A.PNG', 'https://www.vividoptical.online/public/uploads/08_9D477FE8BE7D97A.PNG', NULL, NULL, '2023-08-27 15:40:06'),
(9, 'RESERVATION_PAYMENT_PHOTO', '08_4103D32C2D633C0.PNG', 'png', 'PMT-2A22DC9', NULL, NULL, 'RESERVATION_PAYMENT_PHOTO', 12, '/home/korpzpru/vividoptical.online/public/uploads', 'https://www.vividoptical.online/public/uploads', '/home/korpzpru/vividoptical.online/public/uploads/08_4103D32C2D633C0.PNG', 'https://www.vividoptical.online/public/uploads/08_4103D32C2D633C0.PNG', NULL, NULL, '2023-08-27 16:29:40'),
(10, NULL, '20f9e2fc92330d9d8306b9c6d338f391.png', 'png', 'contact lens.png', NULL, NULL, 'PRODUCT_IMAGES', 12, '/home/korpzpru/vividoptical.online/public/uploads', 'https://www.vividoptical.online/public/uploads', '/home/korpzpru/vividoptical.online/public/uploads/20f9e2fc92330d9d8306b9c6d338f391.png', 'https://www.vividoptical.online/public/uploads/20f9e2fc92330d9d8306b9c6d338f391.png', NULL, NULL, '2023-08-27 17:13:42'),
(11, 'RESERVATION_PAYMENT_PHOTO', '04_5A99DB756B8F29C.JPG', 'jpg', 'PMT-21F10F4', NULL, NULL, 'RESERVATION_PAYMENT_PHOTO', 15, '/home/korpzpru/vividoptical.online/public/uploads', 'https://www.vividoptical.online/public/uploads', '/home/korpzpru/vividoptical.online/public/uploads/04_5A99DB756B8F29C.JPG', 'https://www.vividoptical.online/public/uploads/04_5A99DB756B8F29C.JPG', NULL, NULL, '2024-04-16 07:29:36'),
(12, 'RESERVATION_PAYMENT_PHOTO', '04_9BF9983B68153F1.JPG', 'jpg', 'PMT-0DB2DAF', NULL, NULL, 'RESERVATION_PAYMENT_PHOTO', 16, '/home/korpzpru/vividoptical.online/public/uploads', 'https://www.vividoptical.online/public/uploads', '/home/korpzpru/vividoptical.online/public/uploads/04_9BF9983B68153F1.JPG', 'https://www.vividoptical.online/public/uploads/04_9BF9983B68153F1.JPG', NULL, NULL, '2024-04-16 11:15:07'),
(13, 'RESERVATION_PAYMENT_PHOTO', '04_3956D1BA0A9CEF7.JPG', 'jpg', 'PMT-F7FC811', NULL, NULL, 'RESERVATION_PAYMENT_PHOTO', 17, '/home/korpzpru/vividoptical.online/public/uploads', 'https://www.vividoptical.online/public/uploads', '/home/korpzpru/vividoptical.online/public/uploads/04_3956D1BA0A9CEF7.JPG', 'https://www.vividoptical.online/public/uploads/04_3956D1BA0A9CEF7.JPG', NULL, NULL, '2024-04-16 11:31:27'),
(14, 'graded contacts', '04_791824C2DECD925.JPG', 'jpg', '438245757_1788162821706348_3394259215488978018_n.jpg', NULL, 'if feel dizziness, back to the clinic', 'PATIENT_SESSION', 12, '/home/korpzpru/vividoptical.online/public/uploads', 'https://www.vividoptical.online/public/uploads', '/home/korpzpru/vividoptical.online/public/uploads/04_791824C2DECD925.JPG', 'https://www.vividoptical.online/public/uploads/04_791824C2DECD925.JPG', NULL, NULL, '2024-04-16 12:26:17'),
(15, NULL, '391004b749c1c3ff24cf8a9cbdefd3a7.png', 'png', 'pic1.png', NULL, NULL, 'PRODUCT_IMAGES', 13, '/home/korpzpru/vividoptical.online/public/uploads', 'https://www.vividoptical.online/public/uploads', '/home/korpzpru/vividoptical.online/public/uploads/391004b749c1c3ff24cf8a9cbdefd3a7.png', 'https://www.vividoptical.online/public/uploads/391004b749c1c3ff24cf8a9cbdefd3a7.png', NULL, NULL, '2024-04-30 03:27:24'),
(16, NULL, '41b081905fa7e6eb5680f61c4565188c.png', 'png', 'pic2.png', NULL, NULL, 'PRODUCT_IMAGES', 14, '/home/korpzpru/vividoptical.online/public/uploads', 'https://www.vividoptical.online/public/uploads', '/home/korpzpru/vividoptical.online/public/uploads/41b081905fa7e6eb5680f61c4565188c.png', 'https://www.vividoptical.online/public/uploads/41b081905fa7e6eb5680f61c4565188c.png', NULL, NULL, '2024-04-30 03:34:22'),
(17, NULL, '19947b4bbc28b40fab13d5451ab29ec4.png', 'png', 'pic3.png', NULL, NULL, 'PRODUCT_IMAGES', 15, '/home/korpzpru/vividoptical.online/public/uploads', 'https://www.vividoptical.online/public/uploads', '/home/korpzpru/vividoptical.online/public/uploads/19947b4bbc28b40fab13d5451ab29ec4.png', 'https://www.vividoptical.online/public/uploads/19947b4bbc28b40fab13d5451ab29ec4.png', NULL, NULL, '2024-04-30 03:37:27'),
(18, NULL, '880349b17b2f11d20eb14454dcf6545d.png', 'png', 'pic4.png', NULL, NULL, 'PRODUCT_IMAGES', 16, '/home/korpzpru/vividoptical.online/public/uploads', 'https://www.vividoptical.online/public/uploads', '/home/korpzpru/vividoptical.online/public/uploads/880349b17b2f11d20eb14454dcf6545d.png', 'https://www.vividoptical.online/public/uploads/880349b17b2f11d20eb14454dcf6545d.png', NULL, NULL, '2024-04-30 03:40:15'),
(19, NULL, '677006c15453b6c60c6e4e812ee2ce44.png', 'png', 'pic5.png', NULL, NULL, 'PRODUCT_IMAGES', 17, '/home/korpzpru/vividoptical.online/public/uploads', 'https://www.vividoptical.online/public/uploads', '/home/korpzpru/vividoptical.online/public/uploads/677006c15453b6c60c6e4e812ee2ce44.png', 'https://www.vividoptical.online/public/uploads/677006c15453b6c60c6e4e812ee2ce44.png', NULL, NULL, '2024-04-30 03:42:43'),
(20, NULL, '284c371dcd48181699072c8e764ecb31.png', 'png', 'pic6.png', NULL, NULL, 'PRODUCT_IMAGES', 18, '/home/korpzpru/vividoptical.online/public/uploads', 'https://www.vividoptical.online/public/uploads', '/home/korpzpru/vividoptical.online/public/uploads/284c371dcd48181699072c8e764ecb31.png', 'https://www.vividoptical.online/public/uploads/284c371dcd48181699072c8e764ecb31.png', NULL, NULL, '2024-04-30 03:45:10'),
(21, NULL, '25dc51c8e88b57e7f031c3c632fe2ee9.png', 'png', 'pic7.png', NULL, NULL, 'PRODUCT_IMAGES', 19, '/home/korpzpru/vividoptical.online/public/uploads', 'https://www.vividoptical.online/public/uploads', '/home/korpzpru/vividoptical.online/public/uploads/25dc51c8e88b57e7f031c3c632fe2ee9.png', 'https://www.vividoptical.online/public/uploads/25dc51c8e88b57e7f031c3c632fe2ee9.png', NULL, NULL, '2024-04-30 03:47:17'),
(22, NULL, '952e7b2cc8c0f473eace48c0367e1872.png', 'png', 'Air Optix.png', NULL, NULL, 'PRODUCT_IMAGES', 20, '/home/korpzpru/vividoptical.online/public/uploads', 'https://www.vividoptical.online/public/uploads', '/home/korpzpru/vividoptical.online/public/uploads/952e7b2cc8c0f473eace48c0367e1872.png', 'https://www.vividoptical.online/public/uploads/952e7b2cc8c0f473eace48c0367e1872.png', NULL, NULL, '2024-05-01 01:21:20'),
(23, '', '05_5798BB258E2060A.PNG', 'png', 'Air Optix Colors.png', NULL, '', 'PRODUCT_IMAGES', 21, '/home/korpzpru/vividoptical.online/public/uploads', 'https://www.vividoptical.online/public/uploads', '/home/korpzpru/vividoptical.online/public/uploads/05_5798BB258E2060A.PNG', 'https://www.vividoptical.online/public/uploads/05_5798BB258E2060A.PNG', NULL, NULL, '2024-05-01 01:29:26'),
(24, '', '05_552B6FD3842AF19.PNG', 'png', 'Air Optix Colors Brown.png', NULL, '', 'PRODUCT_IMAGES', 22, '/home/korpzpru/vividoptical.online/public/uploads', 'https://www.vividoptical.online/public/uploads', '/home/korpzpru/vividoptical.online/public/uploads/05_552B6FD3842AF19.PNG', 'https://www.vividoptical.online/public/uploads/05_552B6FD3842AF19.PNG', NULL, NULL, '2024-05-01 01:40:08'),
(25, '', '05_7AAB518FE69F461.PNG', 'png', 'Air Optix Colors Grey.png', NULL, '', 'PRODUCT_IMAGES', 23, '/home/korpzpru/vividoptical.online/public/uploads', 'https://www.vividoptical.online/public/uploads', '/home/korpzpru/vividoptical.online/public/uploads/05_7AAB518FE69F461.PNG', 'https://www.vividoptical.online/public/uploads/05_7AAB518FE69F461.PNG', NULL, NULL, '2024-05-01 01:42:49'),
(26, '', '05_B1C97C584300C19.PNG', 'png', 'Beautiful Eye Black.png', NULL, '', 'PRODUCT_IMAGES', 24, '/home/korpzpru/vividoptical.online/public/uploads', 'https://www.vividoptical.online/public/uploads', '/home/korpzpru/vividoptical.online/public/uploads/05_B1C97C584300C19.PNG', 'https://www.vividoptical.online/public/uploads/05_B1C97C584300C19.PNG', NULL, NULL, '2024-05-01 01:51:44'),
(27, '', '05_817F58A3630F483.PNG', 'png', 'Beautiful Eye Black.png', NULL, '', 'PRODUCT_IMAGES', 25, '/home/korpzpru/vividoptical.online/public/uploads', 'https://www.vividoptical.online/public/uploads', '/home/korpzpru/vividoptical.online/public/uploads/05_817F58A3630F483.PNG', 'https://www.vividoptical.online/public/uploads/05_817F58A3630F483.PNG', NULL, NULL, '2024-05-01 01:54:11'),
(28, NULL, 'ecdb6e45b6d04716a1ff7ea5fb604382.png', 'png', 'FreshLook Illuminated.png', NULL, NULL, 'PRODUCT_IMAGES', 26, '/home/korpzpru/vividoptical.online/public/uploads', 'https://www.vividoptical.online/public/uploads', '/home/korpzpru/vividoptical.online/public/uploads/ecdb6e45b6d04716a1ff7ea5fb604382.png', 'https://www.vividoptical.online/public/uploads/ecdb6e45b6d04716a1ff7ea5fb604382.png', NULL, NULL, '2024-05-01 01:56:44'),
(29, NULL, '02dc150278a826fa366fe455b83ba324.png', 'png', 'FreshLook Illuminated.png', NULL, NULL, 'PRODUCT_IMAGES', 27, '/home/korpzpru/vividoptical.online/public/uploads', 'https://www.vividoptical.online/public/uploads', '/home/korpzpru/vividoptical.online/public/uploads/02dc150278a826fa366fe455b83ba324.png', 'https://www.vividoptical.online/public/uploads/02dc150278a826fa366fe455b83ba324.png', NULL, NULL, '2024-05-01 02:01:42'),
(30, NULL, '22796fc608f20d63099db3a0c33d01d8.png', 'png', 'SEE CLEAR.png', NULL, NULL, 'PRODUCT_IMAGES', 28, '/home/korpzpru/vividoptical.online/public/uploads', 'https://www.vividoptical.online/public/uploads', '/home/korpzpru/vividoptical.online/public/uploads/22796fc608f20d63099db3a0c33d01d8.png', 'https://www.vividoptical.online/public/uploads/22796fc608f20d63099db3a0c33d01d8.png', NULL, NULL, '2024-05-01 02:05:49'),
(31, NULL, '59085cc73d2e62d11c53ef20e9c15f66.png', 'png', 'SEE CLEAR.png', NULL, NULL, 'PRODUCT_IMAGES', 29, '/home/korpzpru/vividoptical.online/public/uploads', 'https://www.vividoptical.online/public/uploads', '/home/korpzpru/vividoptical.online/public/uploads/59085cc73d2e62d11c53ef20e9c15f66.png', 'https://www.vividoptical.online/public/uploads/59085cc73d2e62d11c53ef20e9c15f66.png', NULL, NULL, '2024-05-01 02:08:16'),
(32, NULL, '171c6d30ae94b6ba0feaa7ddf307e3d6.png', 'png', 'SEE CLEAR.png', NULL, NULL, 'PRODUCT_IMAGES', 30, '/home/korpzpru/vividoptical.online/public/uploads', 'https://www.vividoptical.online/public/uploads', '/home/korpzpru/vividoptical.online/public/uploads/171c6d30ae94b6ba0feaa7ddf307e3d6.png', 'https://www.vividoptical.online/public/uploads/171c6d30ae94b6ba0feaa7ddf307e3d6.png', NULL, NULL, '2024-05-01 02:10:57'),
(33, NULL, '7f9968710022cc07d78cfde23a430f16.png', 'png', 'SEE CLEAR.png', NULL, NULL, 'PRODUCT_IMAGES', 31, '/home/korpzpru/vividoptical.online/public/uploads', 'https://www.vividoptical.online/public/uploads', '/home/korpzpru/vividoptical.online/public/uploads/7f9968710022cc07d78cfde23a430f16.png', 'https://www.vividoptical.online/public/uploads/7f9968710022cc07d78cfde23a430f16.png', NULL, NULL, '2024-05-01 02:12:56'),
(34, NULL, 'f0221ed706152aac0fa969ef5973b724.png', 'png', 'SEE CLEAR.png', NULL, NULL, 'PRODUCT_IMAGES', 32, '/home/korpzpru/vividoptical.online/public/uploads', 'https://www.vividoptical.online/public/uploads', '/home/korpzpru/vividoptical.online/public/uploads/f0221ed706152aac0fa969ef5973b724.png', 'https://www.vividoptical.online/public/uploads/f0221ed706152aac0fa969ef5973b724.png', NULL, NULL, '2024-05-01 02:15:05'),
(35, NULL, 'c974343602b15cd5025ac4dcbc45fd4a.jpg', 'jpg', 'verra y2k glasess.jpg', NULL, NULL, 'PRODUCT_IMAGES', 34, '/home/korpzpru/vividoptical.live/public/uploads', 'https://www.vividoptical.live/public/uploads', '/home/korpzpru/vividoptical.live/public/uploads/c974343602b15cd5025ac4dcbc45fd4a.jpg', 'https://www.vividoptical.live/public/uploads/c974343602b15cd5025ac4dcbc45fd4a.jpg', NULL, NULL, '2024-06-04 12:40:27'),
(36, NULL, '4c9981fae7cdb30ff060b9c0a77cc81d.jpg', 'jpg', 'ceroflex.jpg', NULL, NULL, 'PRODUCT_IMAGES', 35, '/home/korpzpru/vividoptical.live/public/uploads', 'https://www.vividoptical.live/public/uploads', '/home/korpzpru/vividoptical.live/public/uploads/4c9981fae7cdb30ff060b9c0a77cc81d.jpg', 'https://www.vividoptical.live/public/uploads/4c9981fae7cdb30ff060b9c0a77cc81d.jpg', NULL, NULL, '2024-06-04 12:50:23'),
(37, NULL, '44c39c474ac53901ee57745f5f4f51a5.jpg', 'jpg', 'MOSO.jpg', NULL, NULL, 'PRODUCT_IMAGES', 36, '/home/korpzpru/vividoptical.live/public/uploads', 'https://www.vividoptical.live/public/uploads', '/home/korpzpru/vividoptical.live/public/uploads/44c39c474ac53901ee57745f5f4f51a5.jpg', 'https://www.vividoptical.live/public/uploads/44c39c474ac53901ee57745f5f4f51a5.jpg', NULL, NULL, '2024-06-04 13:12:26'),
(38, NULL, '322aa0baabec7b81dca4ba8e82c25ca8.jpg', 'jpg', 'Urbane.jpg', NULL, NULL, 'PRODUCT_IMAGES', 37, '/home/korpzpru/vividoptical.live/public/uploads', 'https://www.vividoptical.live/public/uploads', '/home/korpzpru/vividoptical.live/public/uploads/322aa0baabec7b81dca4ba8e82c25ca8.jpg', 'https://www.vividoptical.live/public/uploads/322aa0baabec7b81dca4ba8e82c25ca8.jpg', NULL, NULL, '2024-06-04 13:17:42'),
(39, NULL, 'ff8baf1d9f447587d165b736e88c5072.jpg', 'jpg', 'BELLE BELLE.jpg', NULL, NULL, 'PRODUCT_IMAGES', 38, '/home/korpzpru/vividoptical.live/public/uploads', 'https://www.vividoptical.live/public/uploads', '/home/korpzpru/vividoptical.live/public/uploads/ff8baf1d9f447587d165b736e88c5072.jpg', 'https://www.vividoptical.live/public/uploads/ff8baf1d9f447587d165b736e88c5072.jpg', NULL, NULL, '2024-06-04 13:25:28'),
(40, NULL, '625565f8a53b59205bebaf9aa6fe9ef1.jpg', 'jpg', 'OVALLE.jpg', NULL, NULL, 'PRODUCT_IMAGES', 39, '/home/korpzpru/vividoptical.live/public/uploads', 'https://www.vividoptical.live/public/uploads', '/home/korpzpru/vividoptical.live/public/uploads/625565f8a53b59205bebaf9aa6fe9ef1.jpg', 'https://www.vividoptical.live/public/uploads/625565f8a53b59205bebaf9aa6fe9ef1.jpg', NULL, NULL, '2024-06-04 13:27:23'),
(41, NULL, '999d9896f7e15095184a2dea84c86598.jpg', 'jpg', 'PRIII.jpg', NULL, NULL, 'PRODUCT_IMAGES', 40, '/home/korpzpru/vividoptical.live/public/uploads', 'https://www.vividoptical.live/public/uploads', '/home/korpzpru/vividoptical.live/public/uploads/999d9896f7e15095184a2dea84c86598.jpg', 'https://www.vividoptical.live/public/uploads/999d9896f7e15095184a2dea84c86598.jpg', NULL, NULL, '2024-06-04 13:32:21'),
(42, NULL, '09ef204a02bfb520318348b1da6e6242.jpg', 'jpg', 'LEOPARD.jpg', NULL, NULL, 'PRODUCT_IMAGES', 41, '/home/korpzpru/vividoptical.live/public/uploads', 'https://www.vividoptical.live/public/uploads', '/home/korpzpru/vividoptical.live/public/uploads/09ef204a02bfb520318348b1da6e6242.jpg', 'https://www.vividoptical.live/public/uploads/09ef204a02bfb520318348b1da6e6242.jpg', NULL, NULL, '2024-06-04 13:36:49'),
(43, NULL, 'f8917cfafd4e74593bae26edd892bed8.jpg', 'jpg', 'VERVE.jpg', NULL, NULL, 'PRODUCT_IMAGES', 42, '/home/korpzpru/vividoptical.live/public/uploads', 'https://www.vividoptical.live/public/uploads', '/home/korpzpru/vividoptical.live/public/uploads/f8917cfafd4e74593bae26edd892bed8.jpg', 'https://www.vividoptical.live/public/uploads/f8917cfafd4e74593bae26edd892bed8.jpg', NULL, NULL, '2024-06-04 13:40:49'),
(44, NULL, 'ff64c500e5d5dfd40a5514e121a70826.jpg', 'jpg', 'BASICC.jpg', NULL, NULL, 'PRODUCT_IMAGES', 43, '/home/korpzpru/vividoptical.live/public/uploads', 'https://www.vividoptical.live/public/uploads', '/home/korpzpru/vividoptical.live/public/uploads/ff64c500e5d5dfd40a5514e121a70826.jpg', 'https://www.vividoptical.live/public/uploads/ff64c500e5d5dfd40a5514e121a70826.jpg', NULL, NULL, '2024-06-04 13:44:31'),
(45, NULL, '65b399997880e897ceefe4786f4fe57c.jpg', 'jpg', 'AIR.jpg', NULL, NULL, 'PRODUCT_IMAGES', 44, '/home/korpzpru/vividoptical.live/public/uploads', 'https://www.vividoptical.live/public/uploads', '/home/korpzpru/vividoptical.live/public/uploads/65b399997880e897ceefe4786f4fe57c.jpg', 'https://www.vividoptical.live/public/uploads/65b399997880e897ceefe4786f4fe57c.jpg', NULL, NULL, '2024-06-04 13:47:38'),
(46, NULL, '41c9ba2ece11f4f8e82ef9c7d64a74fb.jpg', 'jpg', 'RETRA.jpg', NULL, NULL, 'PRODUCT_IMAGES', 45, '/home/korpzpru/vividoptical.live/public/uploads', 'https://www.vividoptical.live/public/uploads', '/home/korpzpru/vividoptical.live/public/uploads/41c9ba2ece11f4f8e82ef9c7d64a74fb.jpg', 'https://www.vividoptical.live/public/uploads/41c9ba2ece11f4f8e82ef9c7d64a74fb.jpg', NULL, NULL, '2024-06-04 13:52:33'),
(47, NULL, 'dd0dc9d419c22226801a2bab2d1a7b1f.jpg', 'jpg', 'PETITE PRO.jpg', NULL, NULL, 'PRODUCT_IMAGES', 46, '/home/korpzpru/vividoptical.live/public/uploads', 'https://www.vividoptical.live/public/uploads', '/home/korpzpru/vividoptical.live/public/uploads/dd0dc9d419c22226801a2bab2d1a7b1f.jpg', 'https://www.vividoptical.live/public/uploads/dd0dc9d419c22226801a2bab2d1a7b1f.jpg', NULL, NULL, '2024-06-04 13:55:53'),
(48, NULL, 'b53040f2e0e078e560fa338ab808c0a6.jpg', 'jpg', 'ALL IN.jpg', NULL, NULL, 'PRODUCT_IMAGES', 47, '/home/korpzpru/vividoptical.live/public/uploads', 'https://www.vividoptical.live/public/uploads', '/home/korpzpru/vividoptical.live/public/uploads/b53040f2e0e078e560fa338ab808c0a6.jpg', 'https://www.vividoptical.live/public/uploads/b53040f2e0e078e560fa338ab808c0a6.jpg', NULL, NULL, '2024-06-04 14:04:13'),
(49, NULL, 'ddf20f6bc46fa77fd552f6caae48f645.jpg', 'jpg', 'APART.jpg', NULL, NULL, 'PRODUCT_IMAGES', 48, '/home/korpzpru/vividoptical.live/public/uploads', 'https://www.vividoptical.live/public/uploads', '/home/korpzpru/vividoptical.live/public/uploads/ddf20f6bc46fa77fd552f6caae48f645.jpg', 'https://www.vividoptical.live/public/uploads/ddf20f6bc46fa77fd552f6caae48f645.jpg', NULL, NULL, '2024-06-04 14:07:40'),
(50, NULL, '160456adc4fea2ecb45039c60bd0e4a1.jpg', 'jpg', 'CAT EYE.jpg', NULL, NULL, 'PRODUCT_IMAGES', 49, '/home/korpzpru/vividoptical.live/public/uploads', 'https://www.vividoptical.live/public/uploads', '/home/korpzpru/vividoptical.live/public/uploads/160456adc4fea2ecb45039c60bd0e4a1.jpg', 'https://www.vividoptical.live/public/uploads/160456adc4fea2ecb45039c60bd0e4a1.jpg', NULL, NULL, '2024-06-04 14:12:56'),
(51, NULL, '4ae516b5d149ed1c2b70343697821589.jpg', 'jpg', 'PATTERN.jpg', NULL, NULL, 'PRODUCT_IMAGES', 50, '/home/korpzpru/vividoptical.live/public/uploads', 'https://www.vividoptical.live/public/uploads', '/home/korpzpru/vividoptical.live/public/uploads/4ae516b5d149ed1c2b70343697821589.jpg', 'https://www.vividoptical.live/public/uploads/4ae516b5d149ed1c2b70343697821589.jpg', NULL, NULL, '2024-06-04 16:31:24'),
(52, NULL, '904d915a98223b1be176aa265d98b2c7.jpg', 'jpg', 'POLAXPUS.jpg', NULL, NULL, 'PRODUCT_IMAGES', 51, '/home/korpzpru/vividoptical.live/public/uploads', 'https://www.vividoptical.live/public/uploads', '/home/korpzpru/vividoptical.live/public/uploads/904d915a98223b1be176aa265d98b2c7.jpg', 'https://www.vividoptical.live/public/uploads/904d915a98223b1be176aa265d98b2c7.jpg', NULL, NULL, '2024-06-04 16:34:46'),
(53, NULL, 'c377c13d8b2fa5848809172554f754dc.jpg', 'jpg', 'QUIRKY.jpg', NULL, NULL, 'PRODUCT_IMAGES', 52, '/home/korpzpru/vividoptical.live/public/uploads', 'https://www.vividoptical.live/public/uploads', '/home/korpzpru/vividoptical.live/public/uploads/c377c13d8b2fa5848809172554f754dc.jpg', 'https://www.vividoptical.live/public/uploads/c377c13d8b2fa5848809172554f754dc.jpg', NULL, NULL, '2024-06-04 16:37:31'),
(54, 'RESERVATION_PAYMENT_PHOTO', '06_FC34FA91D541409.JPG', 'jpg', 'PMT-AE7F222', NULL, NULL, 'RESERVATION_PAYMENT_PHOTO', 23, '/home/korpzpru/vividoptical.live/public/uploads', 'https://www.vividoptical.live/public/uploads', '/home/korpzpru/vividoptical.live/public/uploads/06_FC34FA91D541409.JPG', 'https://www.vividoptical.live/public/uploads/06_FC34FA91D541409.JPG', NULL, NULL, '2024-06-04 22:14:06'),
(55, 'RESERVATION_PAYMENT_PHOTO', '06_94A993CD3857881.PNG', 'png', 'PMT-F8B7F15', NULL, NULL, 'RESERVATION_PAYMENT_PHOTO', 26, '/home/korpzpru/vividoptical.live/public/uploads', 'https://www.vividoptical.live/public/uploads', '/home/korpzpru/vividoptical.live/public/uploads/06_94A993CD3857881.PNG', 'https://www.vividoptical.live/public/uploads/06_94A993CD3857881.PNG', NULL, NULL, '2024-06-10 17:28:56'),
(56, 'RESERVATION_PAYMENT_PHOTO', '06_8EBBDE848AD7C9A.PNG', 'png', 'PMT-7A91E23', NULL, NULL, 'RESERVATION_PAYMENT_PHOTO', 27, '/home/korpzpru/vividoptical.live/public/uploads', 'https://www.vividoptical.live/public/uploads', '/home/korpzpru/vividoptical.live/public/uploads/06_8EBBDE848AD7C9A.PNG', 'https://www.vividoptical.live/public/uploads/06_8EBBDE848AD7C9A.PNG', NULL, NULL, '2024-06-10 17:29:34'),
(57, 'RESERVATION_PAYMENT_PHOTO', '06_95CEE1A91CA4352.JPG', 'jpg', 'PMT-DA3BA72', NULL, NULL, 'RESERVATION_PAYMENT_PHOTO', 28, '/home/korpzpru/vividoptical.live/public/uploads', 'https://www.vividoptical.live/public/uploads', '/home/korpzpru/vividoptical.live/public/uploads/06_95CEE1A91CA4352.JPG', 'https://www.vividoptical.live/public/uploads/06_95CEE1A91CA4352.JPG', NULL, NULL, '2024-06-10 17:55:17'),
(58, 'RESERVATION_PAYMENT_PHOTO', '06_BF3E0BB88DBCC51.JPG', 'jpg', 'PMT-FCD46FD', NULL, NULL, 'RESERVATION_PAYMENT_PHOTO', 29, '/home/korpzpru/vividoptical.live/public/uploads', 'https://www.vividoptical.live/public/uploads', '/home/korpzpru/vividoptical.live/public/uploads/06_BF3E0BB88DBCC51.JPG', 'https://www.vividoptical.live/public/uploads/06_BF3E0BB88DBCC51.JPG', NULL, NULL, '2024-06-11 03:14:21'),
(59, 'RESERVATION_PAYMENT_PHOTO', '06_2BD8ED03F385164.JPG', 'jpg', 'PMT-9FFE2BD', NULL, NULL, 'RESERVATION_PAYMENT_PHOTO', 30, '/home/korpzpru/vividoptical.live/public/uploads', 'https://www.vividoptical.live/public/uploads', '/home/korpzpru/vividoptical.live/public/uploads/06_2BD8ED03F385164.JPG', 'https://www.vividoptical.live/public/uploads/06_2BD8ED03F385164.JPG', NULL, NULL, '2024-06-11 08:13:12'),
(60, 'RESERVATION_PAYMENT_PHOTO', '06_B8E15F1AC515056.JPG', 'jpg', 'PMT-9975499', NULL, NULL, 'RESERVATION_PAYMENT_PHOTO', 31, '/home/korpzpru/vividoptical.live/public/uploads', 'https://www.vividoptical.live/public/uploads', '/home/korpzpru/vividoptical.live/public/uploads/06_B8E15F1AC515056.JPG', 'https://www.vividoptical.live/public/uploads/06_B8E15F1AC515056.JPG', NULL, NULL, '2024-06-11 08:19:50'),
(61, 'RESERVATION_PAYMENT_PHOTO', '06_066D7E8C07AF69A.JPG', 'jpg', 'PMT-E36D85D', NULL, NULL, 'RESERVATION_PAYMENT_PHOTO', 32, '/home/korpzpru/vividoptical.live/public/uploads', 'https://www.vividoptical.live/public/uploads', '/home/korpzpru/vividoptical.live/public/uploads/06_066D7E8C07AF69A.JPG', 'https://www.vividoptical.live/public/uploads/06_066D7E8C07AF69A.JPG', NULL, NULL, '2024-06-11 08:20:52'),
(62, 'RESERVATION_PAYMENT_PHOTO', '06_1DBDB083A729186.JPEG', 'jpeg', 'PMT-25682F2', NULL, NULL, 'RESERVATION_PAYMENT_PHOTO', 33, '/home/korpzpru/vividoptical.live/public/uploads', 'https://www.vividoptical.live/public/uploads', '/home/korpzpru/vividoptical.live/public/uploads/06_1DBDB083A729186.JPEG', 'https://www.vividoptical.live/public/uploads/06_1DBDB083A729186.JPEG', NULL, NULL, '2024-06-13 08:36:29'),
(63, 'RESERVATION_PAYMENT_PHOTO', '06_8DA2073B0F69EF0.JPEG', 'jpeg', 'PMT-C0F555F', NULL, NULL, 'RESERVATION_PAYMENT_PHOTO', 34, '/home/korpzpru/vividoptical.live/public/uploads', 'https://www.vividoptical.live/public/uploads', '/home/korpzpru/vividoptical.live/public/uploads/06_8DA2073B0F69EF0.JPEG', 'https://www.vividoptical.live/public/uploads/06_8DA2073B0F69EF0.JPEG', NULL, NULL, '2024-06-23 04:21:20'),
(64, 'RESERVATION_PAYMENT_PHOTO', '07_51A4FB8AAB528E0.PNG', 'png', 'PMT-D1A295F', NULL, NULL, 'RESERVATION_PAYMENT_PHOTO', 35, '/home/korpzpru/vividoptical.live/public/uploads', 'https://vividoptical.live/public/uploads', '/home/korpzpru/vividoptical.live/public/uploads/07_51A4FB8AAB528E0.PNG', 'https://vividoptical.live/public/uploads/07_51A4FB8AAB528E0.PNG', NULL, NULL, '2024-07-14 18:53:24'),
(65, 'RESERVATION_PAYMENT_PHOTO', '07_D4F9AAFAD98F195.PNG', 'png', 'PMT-45D634E', NULL, NULL, 'RESERVATION_PAYMENT_PHOTO', 36, '/home/korpzpru/vividoptical.live/public/uploads', 'https://vividoptical.live/public/uploads', '/home/korpzpru/vividoptical.live/public/uploads/07_D4F9AAFAD98F195.PNG', 'https://vividoptical.live/public/uploads/07_D4F9AAFAD98F195.PNG', NULL, NULL, '2024-07-15 07:12:18'),
(66, 'RESERVATION_PAYMENT_PHOTO', '07_B7E01361262B0A0.PNG', 'png', 'PMT-ABDBF61', NULL, NULL, 'RESERVATION_PAYMENT_PHOTO', 37, '/home/korpzpru/vividoptical.live/public/uploads', 'https://vividoptical.live/public/uploads', '/home/korpzpru/vividoptical.live/public/uploads/07_B7E01361262B0A0.PNG', 'https://vividoptical.live/public/uploads/07_B7E01361262B0A0.PNG', NULL, NULL, '2024-07-23 15:45:42'),
(67, 'RESERVATION_PAYMENT_PHOTO', '07_5579D50F077BDF1.PNG', 'png', 'PMT-3402F2E', NULL, NULL, 'RESERVATION_PAYMENT_PHOTO', 38, '/home/korpzpru/vividoptical.live/public/uploads', 'https://vividoptical.live/public/uploads', '/home/korpzpru/vividoptical.live/public/uploads/07_5579D50F077BDF1.PNG', 'https://vividoptical.live/public/uploads/07_5579D50F077BDF1.PNG', NULL, NULL, '2024-07-28 14:08:16'),
(68, 'RESERVATION_PAYMENT_PHOTO', '07_FFCE58700188E6F.PNG', 'png', 'PMT-93D3612', NULL, NULL, 'RESERVATION_PAYMENT_PHOTO', 39, '/home/korpzpru/vividoptical.live/public/uploads', 'https://vividoptical.live/public/uploads', '/home/korpzpru/vividoptical.live/public/uploads/07_FFCE58700188E6F.PNG', 'https://vividoptical.live/public/uploads/07_FFCE58700188E6F.PNG', NULL, NULL, '2024-07-28 14:12:19'),
(69, 'RESERVATION_PAYMENT_PHOTO', '07_CF8CF1A64694084.PNG', 'png', 'PMT-862DF65', NULL, NULL, 'RESERVATION_PAYMENT_PHOTO', 40, '/home/korpzpru/vividoptical.live/public/uploads', 'https://vividoptical.live/public/uploads', '/home/korpzpru/vividoptical.live/public/uploads/07_CF8CF1A64694084.PNG', 'https://vividoptical.live/public/uploads/07_CF8CF1A64694084.PNG', NULL, NULL, '2024-07-28 14:13:41'),
(70, 'RESERVATION_PAYMENT_PHOTO', '07_7374DBC7893E77B.PNG', 'png', 'PMT-17958F8', NULL, NULL, 'RESERVATION_PAYMENT_PHOTO', 41, '/home/korpzpru/vividoptical.live/public/uploads', 'https://vividoptical.live/public/uploads', '/home/korpzpru/vividoptical.live/public/uploads/07_7374DBC7893E77B.PNG', 'https://vividoptical.live/public/uploads/07_7374DBC7893E77B.PNG', NULL, NULL, '2024-07-28 14:15:40'),
(71, 'RESERVATION_PAYMENT_PHOTO', '07_CE742A51ECB15AD.PNG', 'png', 'PMT-2DD9CA2', NULL, NULL, 'RESERVATION_PAYMENT_PHOTO', 42, '/home/korpzpru/vividoptical.live/public/uploads', 'https://vividoptical.live/public/uploads', '/home/korpzpru/vividoptical.live/public/uploads/07_CE742A51ECB15AD.PNG', 'https://vividoptical.live/public/uploads/07_CE742A51ECB15AD.PNG', NULL, NULL, '2024-07-28 14:17:05'),
(72, 'RESERVATION_PAYMENT_PHOTO', '07_78279776A28DB00.PNG', 'png', 'PMT-95C93E7', NULL, NULL, 'RESERVATION_PAYMENT_PHOTO', 43, '/home/korpzpru/vividoptical.live/public/uploads', 'https://vividoptical.live/public/uploads', '/home/korpzpru/vividoptical.live/public/uploads/07_78279776A28DB00.PNG', 'https://vividoptical.live/public/uploads/07_78279776A28DB00.PNG', NULL, NULL, '2024-07-29 02:23:20'),
(73, 'RESERVATION_PAYMENT_PHOTO', '07_07095CB6E5248B0.PNG', 'png', 'PMT-2BCB50D', NULL, NULL, 'RESERVATION_PAYMENT_PHOTO', 44, '/home/korpzpru/vividoptical.live/public/uploads', 'https://vividoptical.live/public/uploads', '/home/korpzpru/vividoptical.live/public/uploads/07_07095CB6E5248B0.PNG', 'https://vividoptical.live/public/uploads/07_07095CB6E5248B0.PNG', NULL, NULL, '2024-07-29 02:24:36'),
(74, 'RESERVATION_PAYMENT_PHOTO', '07_5E769654AA30125.JPG', 'jpg', 'PMT-67CC83C', NULL, NULL, 'RESERVATION_PAYMENT_PHOTO', 45, '/home/korpzpru/vividoptical.live/public/uploads', 'https://vividoptical.live/public/uploads', '/home/korpzpru/vividoptical.live/public/uploads/07_5E769654AA30125.JPG', 'https://vividoptical.live/public/uploads/07_5E769654AA30125.JPG', NULL, NULL, '2024-07-31 03:13:15'),
(75, 'RESERVATION_PAYMENT_PHOTO', '07_764C999B4CA0897.PNG', 'png', 'PMT-EAEEB10', NULL, NULL, 'RESERVATION_PAYMENT_PHOTO', 46, '/home/korpzpru/vividoptical.live/public/uploads', 'https://vividoptical.live/public/uploads', '/home/korpzpru/vividoptical.live/public/uploads/07_764C999B4CA0897.PNG', 'https://vividoptical.live/public/uploads/07_764C999B4CA0897.PNG', NULL, NULL, '2024-07-31 03:23:17'),
(76, 'RESERVATION_PAYMENT_PHOTO', '07_8EC2C70F118BA83.PNG', 'png', 'PMT-756117E', NULL, NULL, 'RESERVATION_PAYMENT_PHOTO', 47, '/home/korpzpru/vividoptical.live/public/uploads', 'https://vividoptical.live/public/uploads', '/home/korpzpru/vividoptical.live/public/uploads/07_8EC2C70F118BA83.PNG', 'https://vividoptical.live/public/uploads/07_8EC2C70F118BA83.PNG', NULL, NULL, '2024-07-31 03:59:53'),
(77, 'RESERVATION_PAYMENT_PHOTO', '08_30A6BDB896CD688.PNG', 'png', 'PMT-BD87D36', NULL, NULL, 'RESERVATION_PAYMENT_PHOTO', 48, '/home/korpzpru/vividoptical.live/public/uploads', 'https://vividoptical.live/public/uploads', '/home/korpzpru/vividoptical.live/public/uploads/08_30A6BDB896CD688.PNG', 'https://vividoptical.live/public/uploads/08_30A6BDB896CD688.PNG', NULL, NULL, '2024-08-05 17:51:35');

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

DROP TABLE IF EXISTS `bills`;
CREATE TABLE `bills` (
  `id` int(10) NOT NULL,
  `reference` varchar(50) DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `payment_status` enum('paid','unpaid') DEFAULT NULL,
  `payment_method` enum('online','cash','na') DEFAULT NULL,
  `bill_to_name` varchar(50) DEFAULT NULL,
  `bill_to_email` varchar(50) DEFAULT NULL,
  `bill_to_phone` varchar(50) DEFAULT NULL,
  `appointment_id` int(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bill_items`
--

DROP TABLE IF EXISTS `bill_items`;
CREATE TABLE `bill_items` (
  `id` int(10) NOT NULL,
  `bill_id` int(10) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(10) NOT NULL,
  `category` varchar(100) NOT NULL,
  `cat_key` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `created_by` int(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `cat_key`, `description`, `created_by`, `created_at`) VALUES
(8, 'Eye Drop', 'PRODUCT', NULL, NULL, '2024-04-30 03:23:52'),
(9, 'Contact Lenses', 'PRODUCT', NULL, NULL, '2024-04-30 03:24:22'),
(10, 'Frames', 'PRODUCT', NULL, NULL, '2024-06-04 12:14:06');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

DROP TABLE IF EXISTS `doctors`;
CREATE TABLE `doctors` (
  `id` int(10) NOT NULL,
  `license_number` varchar(100) NOT NULL,
  `user_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctors_specializations`
--

DROP TABLE IF EXISTS `doctors_specializations`;
CREATE TABLE `doctors_specializations` (
  `id` int(10) NOT NULL,
  `doctor_id` int(10) NOT NULL,
  `specialty_id` int(10) NOT NULL,
  `notes` text DEFAULT NULL,
  `created_by` int(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `tmp_token` varchar(50) DEFAULT NULL,
  `order_reference` varchar(100) DEFAULT NULL,
  `customer_name` varchar(100) DEFAULT NULL,
  `customer_number` varchar(100) DEFAULT NULL,
  `customer_email` varchar(100) DEFAULT NULL,
  `customer_address` text DEFAULT NULL,
  `initial_amount` decimal(10,2) DEFAULT NULL,
  `current_balance` decimal(10,2) DEFAULT NULL,
  `discount_amount` decimal(10,2) DEFAULT NULL,
  `discount_type` varchar(100) DEFAULT NULL,
  `discount_notes` varchar(100) DEFAULT NULL,
  `customer_id` int(10) DEFAULT NULL COMMENT 'fill only if customer user exists',
  `user_id` int(10) NOT NULL COMMENT 'processed by',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `return_id` int(10) DEFAULT NULL COMMENT 'if item is returned add the new order record id here',
  `order_status` enum('shipped','pending','cancelled','completed') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `tmp_token`, `order_reference`, `customer_name`, `customer_number`, `customer_email`, `customer_address`, `initial_amount`, `current_balance`, `discount_amount`, `discount_type`, `discount_notes`, `customer_id`, `user_id`, `created_at`, `updated_at`, `return_id`, `order_status`) VALUES
(1, '71989645ce5c', 'ORDR-0002', 'Jade Thors', '09812311', '', '', '800.00', '0.00', '10.00', 'DISCOUNT_PWD', 'ID# : 01010101', NULL, 0, '2023-07-18 11:42:50', '2024-05-14 05:49:04', NULL, 'pending'),
(2, 'df0abff0b239', 'ORDR-0003', 'Mark Angelo Gonzales', '09063387458', 'gonzalesmarkangeloph@gmail.com', 'sample', '800.00', '-200.00', '289.99', 'DISCOUNT_CUSTOM', 'test', NULL, 56, '2023-08-20 17:39:19', '2023-08-20 17:40:10', NULL, 'pending'),
(3, 'e6f65dc12d77', 'ORDR-0004', 'Mark Angelo Gonzales', '09063387458', 'gonzalesmarkangeloph@gmail.com', '', '200.00', '-75.00', '25.00', 'DISCOUNT_PWD', 'has cataract discounted by gov', NULL, 56, '2023-08-24 13:49:47', '2023-08-24 14:01:24', NULL, 'pending'),
(4, 'ddc49e9f5325', 'ORDR-0005', 'Mark Angelo', '09063387451', 'gonzalesmarkangeloph@gmail.com', 'quzon city, quzon city', '900.00', '0.00', '0.00', '', '', NULL, 54, '2023-08-24 13:57:34', '2023-08-24 13:58:17', NULL, 'pending'),
(5, 'a902e9b8637b', 'ORDR-0006', 'Berto ', '09506432749', 'dacano6817@wlmycn.com', '', '450.00', '0.00', '0.00', '', '', NULL, 50, '2023-08-27 16:33:36', '2023-08-27 16:35:47', NULL, 'pending'),
(6, '9b159a098472', 'ORDR-0007', 'JuanManuel', '09506432749', 'dacano6817@wlmycn.com', '', '200.00', '-100.00', '150.00', 'DISCOUNT_SENIOR', 'Matandang Nilalang sa Planeta ', NULL, 50, '2023-08-27 16:45:14', '2023-08-27 16:46:37', NULL, 'pending'),
(7, 'b4f41d6f3c6a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2023-08-27 16:56:19', '2023-08-27 16:56:19', NULL, 'pending'),
(8, '9e7b35c95c49', 'ORDR-0009', 'Mark', '09660090070', 'markgonzales@gmail.com', '17 A marcos Roxas QC. ', '3790.00', '0.00', '0.00', '', '', NULL, 0, '2024-05-18 06:25:52', '2024-05-18 06:27:29', NULL, 'pending'),
(9, 'f741fef7460a', 'ORDR-0010', 'Guess123', '09660069995', 'Guess@gmail.com', 'Quezon city ', '400.00', '0.00', '0.00', '', 'Sample product order Inventory ', NULL, 0, '2024-05-20 06:48:54', '2024-05-20 06:50:14', NULL, 'pending'),
(10, 'd84a67bd3812', 'ORDR-0011', 'Guess23', '09660069998', 'Guess23@gmail.com', 'Manila \r\n', '3590.00', '3590.00', '0.00', '', '', NULL, 0, '2024-05-20 06:54:39', '2024-05-20 06:58:54', NULL, 'pending'),
(11, '002d065e3f81', 'ORDR-0012', 'Jade Dela Cruz', '09945510322', 'jademariedelacruz6@gmail.com', '', '1895.00', '0.00', '1800.00', 'DISCOUNT_CUSTOM', '', NULL, 67, '2024-05-27 02:47:26', '2024-05-27 02:50:58', NULL, 'pending'),
(12, '9d45866d98bc', 'ORDR-0013', 'John', '09660070019', 'johnace.live@ama.edu.ph', 'Quezon city', '1599.00', '0.00', '0.00', '', '', NULL, 91, '2024-06-04 21:15:48', '2024-06-04 21:17:06', NULL, 'pending'),
(13, 'd0f26bc87887', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2024-06-04 22:48:13', '2024-06-04 22:48:13', NULL, 'pending'),
(14, 'c85072d3a1df', 'ORDR-0015', 'Julliene', '09660080019', 'julliene@gmail.com', 'Manila, Ermita st. ', '3198.00', '0.00', '0.00', '', '', NULL, 0, '2024-06-08 17:41:26', '2024-06-08 17:42:34', NULL, 'pending'),
(15, 'e1f88ddbf3f0', 'ORDR-0016', 'Damoran,Monica', '092268747325', 'Damoranmonica@gmail.com', 'Santol,Quezon City', '12400.00', '0.00', '0.00', '', '', NULL, 0, '2024-06-10 16:41:44', '2024-06-10 16:45:12', NULL, 'pending'),
(16, '3c25b9b29986', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2024-06-11 02:17:42', '2024-06-11 02:17:42', NULL, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE `order_items` (
  `id` int(10) NOT NULL,
  `order_id` int(10) DEFAULT NULL,
  `item_id` int(10) DEFAULT NULL,
  `purchased_amount` decimal(10,2) DEFAULT NULL,
  `quantity` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `item_id`, `purchased_amount`, `quantity`) VALUES
(1, 1, 9, '200.00', 4),
(2, 2, 10, '200.00', 4),
(3, 3, 9, '200.00', 1),
(4, 4, 11, '450.00', 2),
(5, 5, 11, '450.00', 1),
(6, 6, 9, '200.00', 1),
(7, 7, 9, '200.00', 1),
(8, 8, 18, '0.00', 2),
(9, 9, 33, '0.00', 2),
(10, 10, 22, '0.00', 2),
(11, 11, 18, '0.00', 1),
(13, 13, 22, '0.00', 2),
(14, 14, 44, '0.00', 1),
(15, 15, 45, '0.00', 4),
(16, 16, 22, '0.00', 4);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE `payments` (
  `id` int(10) NOT NULL,
  `reference` varchar(100) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `method` enum('online','cash') DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `org` varchar(100) DEFAULT NULL,
  `external_reference` varchar(100) DEFAULT NULL,
  `acc_no` varchar(100) DEFAULT NULL,
  `acc_name` varchar(100) DEFAULT NULL,
  `bill_id` int(10) DEFAULT NULL,
  `created_by` int(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('for-approval','approved','invalid') DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  `origin` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `reference`, `amount`, `method`, `notes`, `org`, `external_reference`, `acc_no`, `acc_name`, `bill_id`, `created_by`, `created_at`, `status`, `remarks`, `origin`) VALUES
(1, 'PMT-5CD86F1', '300.00', 'cash', NULL, '', '', NULL, NULL, 1, NULL, '2023-07-18 11:44:13', NULL, NULL, NULL),
(2, 'PMT-CB73B29', '50.00', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-18 13:07:59', NULL, NULL, NULL),
(3, 'PMT-963E55A', '50.00', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-18 13:44:55', NULL, NULL, NULL),
(4, 'PMT-A9B36C7', '50.00', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-18 13:55:59', NULL, NULL, NULL),
(5, 'PMT-90E7B33', '50.00', 'online', NULL, NULL, NULL, NULL, NULL, 10, NULL, '2023-08-20 17:37:02', 'approved', NULL, 'RESERVATION_FEE'),
(6, 'PMT-8FBFB96', '710.01', 'cash', NULL, 'test', 'good!', NULL, NULL, 2, NULL, '2023-08-20 17:39:50', NULL, NULL, 'ORDER'),
(7, 'PMT-38CBC8E', '250.00', 'cash', NULL, '', '', NULL, NULL, 3, NULL, '2023-08-24 13:51:15', NULL, NULL, 'ORDER'),
(8, 'PMT-1ED8529', '900.00', 'cash', NULL, '', '', NULL, NULL, 4, NULL, '2023-08-24 13:58:17', NULL, NULL, 'ORDER'),
(9, 'PMT-6F1A0C2', '50.00', 'online', NULL, NULL, NULL, NULL, NULL, 11, NULL, '2023-08-24 14:03:52', 'approved', NULL, 'RESERVATION_FEE'),
(10, 'PMT-AEFAF4D', '50.00', 'online', NULL, NULL, NULL, NULL, NULL, 12, NULL, '2023-08-27 08:18:29', 'approved', NULL, 'RESERVATION_FEE'),
(11, 'PMT-7F610EC', '50.00', 'online', NULL, NULL, NULL, NULL, NULL, 14, NULL, '2023-08-27 15:40:06', 'for-approval', NULL, 'RESERVATION_FEE'),
(12, 'PMT-2A22DC9', '50.00', 'online', NULL, NULL, NULL, NULL, NULL, 15, NULL, '2023-08-27 16:29:40', 'approved', NULL, 'RESERVATION_FEE'),
(13, 'PMT-4939791', '450.00', 'cash', NULL, 'LGBTQHDTV++', 'n/a ', NULL, NULL, 5, NULL, '2023-08-27 16:35:47', NULL, NULL, 'ORDER'),
(14, 'PMT-09D9076', '150.00', 'cash', NULL, 'INC ', 'n/a ', NULL, NULL, 6, NULL, '2023-08-27 16:46:37', NULL, NULL, 'ORDER'),
(15, 'PMT-21F10F4', '50.00', 'online', NULL, NULL, NULL, NULL, NULL, 22, NULL, '2024-04-16 07:29:36', 'approved', NULL, 'RESERVATION_FEE'),
(16, 'PMT-0DB2DAF', '50.00', 'online', NULL, NULL, NULL, NULL, NULL, 25, NULL, '2024-04-16 11:15:07', 'approved', NULL, 'RESERVATION_FEE'),
(17, 'PMT-F7FC811', '50.00', 'online', NULL, NULL, NULL, NULL, NULL, 26, NULL, '2024-04-16 11:31:27', 'approved', NULL, 'RESERVATION_FEE'),
(18, 'PMT-C6DC070', '490.00', '', NULL, 'BDO ', '', NULL, NULL, 1, NULL, '2024-05-14 05:49:04', NULL, NULL, 'ORDER'),
(19, 'PMT-2931149', '3790.00', 'cash', NULL, '', '', NULL, NULL, 8, NULL, '2024-05-18 06:27:29', NULL, NULL, 'ORDER'),
(20, 'PMT-723313C', '400.00', 'cash', NULL, '', '', NULL, NULL, 9, NULL, '2024-05-20 06:50:13', NULL, NULL, 'ORDER'),
(21, 'PMT-A7A7548', '1895.00', 'cash', NULL, '', '', NULL, NULL, 11, NULL, '2024-05-27 02:50:58', NULL, NULL, 'ORDER'),
(22, 'PMT-3EC10B3', '1599.00', 'cash', NULL, 'Manila Corp', '', NULL, NULL, 12, NULL, '2024-06-04 21:17:06', NULL, NULL, 'ORDER'),
(23, 'PMT-AE7F222', '50.00', 'online', NULL, NULL, NULL, NULL, NULL, 36, NULL, '2024-06-04 22:14:06', 'for-approval', NULL, 'RESERVATION_FEE'),
(24, 'PMT-EACB72C', '3198.00', 'cash', NULL, 'GCASH ', '', NULL, NULL, 14, NULL, '2024-06-08 17:42:34', NULL, NULL, 'ORDER'),
(25, 'PMT-6D3DFE3', '12400.00', 'cash', NULL, 'GCASH ', '522-689-551-85', NULL, NULL, 15, NULL, '2024-06-10 16:45:12', NULL, NULL, 'ORDER'),
(26, 'PMT-F8B7F15', '50.00', 'online', NULL, NULL, NULL, NULL, NULL, 38, NULL, '2024-06-10 17:28:56', 'for-approval', NULL, 'RESERVATION_FEE'),
(27, 'PMT-7A91E23', '50.00', 'online', NULL, NULL, NULL, NULL, NULL, 38, NULL, '2024-06-10 17:29:34', 'for-approval', NULL, 'RESERVATION_FEE'),
(28, 'PMT-DA3BA72', '50.00', 'online', NULL, NULL, NULL, NULL, NULL, 39, NULL, '2024-06-10 17:55:17', 'for-approval', NULL, 'RESERVATION_FEE'),
(29, 'PMT-FCD46FD', '50.00', 'online', NULL, NULL, NULL, NULL, NULL, 42, NULL, '2024-06-11 03:14:21', 'approved', NULL, 'RESERVATION_FEE'),
(30, 'PMT-9FFE2BD', '50.00', 'online', NULL, NULL, NULL, NULL, NULL, 43, NULL, '2024-06-11 08:13:12', 'for-approval', NULL, 'RESERVATION_FEE'),
(31, 'PMT-9975499', '50.00', 'online', NULL, NULL, NULL, NULL, NULL, 44, NULL, '2024-06-11 08:19:50', 'for-approval', NULL, 'RESERVATION_FEE'),
(32, 'PMT-E36D85D', '50.00', 'online', NULL, NULL, NULL, NULL, NULL, 45, NULL, '2024-06-11 08:20:52', 'for-approval', NULL, 'RESERVATION_FEE'),
(33, 'PMT-25682F2', '50.00', 'online', NULL, NULL, NULL, NULL, NULL, 47, NULL, '2024-06-13 08:36:29', 'approved', NULL, 'RESERVATION_FEE'),
(34, 'PMT-C0F555F', '50.00', 'online', NULL, NULL, NULL, NULL, NULL, 50, NULL, '2024-06-23 04:21:20', 'approved', NULL, 'RESERVATION_FEE'),
(35, 'PMT-D1A295F', '50.00', 'online', NULL, NULL, NULL, NULL, NULL, 54, NULL, '2024-07-14 18:53:24', 'approved', NULL, 'RESERVATION_FEE'),
(36, 'PMT-45D634E', '50.00', 'online', NULL, NULL, NULL, NULL, NULL, 55, NULL, '2024-07-15 07:12:18', 'for-approval', NULL, 'RESERVATION_FEE'),
(37, 'PMT-ABDBF61', '50.00', 'online', NULL, NULL, NULL, NULL, NULL, 56, NULL, '2024-07-23 15:45:42', 'approved', NULL, 'RESERVATION_FEE'),
(38, 'PMT-3402F2E', '50.00', 'online', NULL, NULL, NULL, NULL, NULL, 61, NULL, '2024-07-28 14:08:16', 'for-approval', NULL, 'RESERVATION_FEE'),
(39, 'PMT-93D3612', '50.00', 'online', NULL, NULL, NULL, NULL, NULL, 62, NULL, '2024-07-28 14:12:19', 'for-approval', NULL, 'RESERVATION_FEE'),
(40, 'PMT-862DF65', '50.00', 'online', NULL, NULL, NULL, NULL, NULL, 63, NULL, '2024-07-28 14:13:41', 'for-approval', NULL, 'RESERVATION_FEE'),
(41, 'PMT-17958F8', '50.00', 'online', NULL, NULL, NULL, NULL, NULL, 64, NULL, '2024-07-28 14:15:40', 'for-approval', NULL, 'RESERVATION_FEE'),
(42, 'PMT-2DD9CA2', '50.00', 'online', NULL, NULL, NULL, NULL, NULL, 65, NULL, '2024-07-28 14:17:05', 'approved', NULL, 'RESERVATION_FEE'),
(43, 'PMT-95C93E7', '50.00', 'online', NULL, NULL, NULL, NULL, NULL, 68, NULL, '2024-07-29 02:23:20', 'approved', NULL, 'RESERVATION_FEE'),
(44, 'PMT-2BCB50D', '50.00', 'online', NULL, NULL, NULL, NULL, NULL, 69, NULL, '2024-07-29 02:24:36', 'approved', NULL, 'RESERVATION_FEE'),
(45, 'PMT-67CC83C', '50.00', 'online', NULL, NULL, NULL, NULL, NULL, 70, NULL, '2024-07-31 03:13:15', 'approved', NULL, 'RESERVATION_FEE'),
(46, 'PMT-EAEEB10', '50.00', 'online', NULL, NULL, NULL, NULL, NULL, 71, NULL, '2024-07-31 03:23:17', 'for-approval', NULL, 'RESERVATION_FEE'),
(47, 'PMT-756117E', '50.00', 'online', NULL, NULL, NULL, NULL, NULL, 73, NULL, '2024-07-31 03:59:53', 'approved', NULL, 'RESERVATION_FEE'),
(48, 'PMT-BD87D36', '50.00', 'online', NULL, NULL, NULL, NULL, NULL, 74, NULL, '2024-08-05 17:51:35', 'approved', NULL, 'RESERVATION_FEE');

-- --------------------------------------------------------

--
-- Table structure for table `reservation_fee_setting`
--

DROP TABLE IF EXISTS `reservation_fee_setting`;
CREATE TABLE `reservation_fee_setting` (
  `id` int(10) NOT NULL,
  `display_name` varchar(100) DEFAULT 'RESERVATION CONVINIENCE FEE',
  `amount_fee` decimal(10,2) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `description` text DEFAULT NULL,
  `last_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservation_fee_setting`
--

INSERT INTO `reservation_fee_setting` (`id`, `display_name`, `amount_fee`, `is_active`, `description`, `last_updated`) VALUES
(1, 'CONVINIENCE FEE', '50.00', 1, 'Reservation Fee payment', '2023-08-18 11:02:04');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_setting`
--

DROP TABLE IF EXISTS `schedule_setting`;
CREATE TABLE `schedule_setting` (
  `id` int(10) NOT NULL,
  `day` varchar(100) DEFAULT NULL,
  `opening_time` time DEFAULT NULL,
  `closing_time` time DEFAULT NULL,
  `max_visitor_count` int(10) DEFAULT NULL,
  `is_shop_closed` tinyint(1) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule_setting`
--

INSERT INTO `schedule_setting` (`id`, `day`, `opening_time`, `closing_time`, `max_visitor_count`, `is_shop_closed`, `updated_at`) VALUES
(1, 'monday', '09:00:00', '17:00:00', 100, 0, '2024-04-16 07:48:34'),
(2, 'tuesday', '09:00:00', '17:00:00', 100, 0, '2024-04-16 07:48:34'),
(3, 'wednesday', '09:00:00', '17:00:00', 100, 0, '2024-04-16 07:48:34'),
(4, 'thursday', '09:00:00', '17:00:00', 100, 0, '2024-04-16 07:48:34'),
(5, 'friday', '09:00:00', '17:00:00', 100, 0, '2024-04-16 07:48:34'),
(6, 'saturday', '09:00:00', '17:00:00', 100, 0, '2024-04-16 07:48:34'),
(7, 'sunday', '10:00:00', '18:00:00', 0, 0, '2024-05-27 02:53:29');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE `services` (
  `id` int(10) NOT NULL,
  `service` varchar(50) DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `status` enum('available','not-available') DEFAULT NULL,
  `description` text DEFAULT NULL,
  `category_id` int(10) DEFAULT NULL,
  `is_visible` tinyint(1) DEFAULT 1,
  `created_by` int(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service`, `code`, `price`, `status`, `description`, `category_id`, `is_visible`, `created_by`, `created_at`) VALUES
(13, 'Belcon 60% UV Lite 6 Months | 2pcs | Contact Lense', 'BELCPQJ', '2080.00', 'available', 'Brand: Belcon\r\nDescription: Belcon 60% UV Lite soft contact lens is designed for the most sensitive daily wearer who is looking for stability and comfort in their soft contact lenses.\r\nType: 6 Months\r\nLens Per Bottle: 1pc\r\nDiameter: 14.00mm\r\nBase Curve: 8.10mm / 8.40mm / 8.70mm\r\nNote: For special order. Minimum 3 weeks up to 4 weeks processing excluding weekends and holidays.\r\nBefore ordering this item please send your grade to our Live Chat for availability.\r\nGood for 6 months use, disposable contact lens', 9, 1, NULL, '2024-04-30 03:27:24'),
(14, 'Belcon 60% UV Lite Astigmatism/Toric 6 Months | 2p', 'BELCFGS', '4120.00', 'available', 'Brand: Belcon\r\nDescription: Belcon 60% UV Lite soft contact lens is designed for the most sensitive daily wearer who is looking for stability and comfort in their soft contact lenses.\r\nType: 6 Months\r\nLens Per Bottle: 1pc\r\nDiameter: 14.00mm\r\nBase Curve: 8.10mm / 8.40mm / 8.70mm\r\nNote: For special order. Minimum 3 weeks up to 4 weeks processing excluding weekends and holidays.\r\nBefore ordering this item please send your grade to our Live Chat for availability.\r\nGood for 6 months use, disposable contact lens\r\nNegative (-) for Nearsighted\r\nPositive (+) for Farsighted', 9, 1, NULL, '2024-04-30 03:34:22'),
(15, 'Belcon 60% Comfort 6 Months | 2pcs | Contact Lense', 'BELCGKI', '2600.00', 'available', 'Brand: Belcon\r\nDescription: Belcon Comfort Soft contact lenses are the first custom made Silicone Hydrogel lenses that are manufactured using lathe cut technology.\r\nThese lenses provide Breathability, as it delivers much higher oxygen permeability. Wettability, as it does not dehydrate on the eye during wear. Comfortability, since this is made of high- water content and low modulus, making it extremely soft with the same stiffness as a conventional mid-water content hydrogel contact lenses.\r\nType: 6 Months\r\nLens Per Bottle: 1pc\r\nBase Curve: 8.10mm / 8.40mm / 8.70mm\r\nNote: For special order. Minimum 3 weeks up to 4 weeks processing excluding weekends and holidays.\r\nBefore ordering this item please send your grade to our Live Chat for availability.\r\nGood for 6 months use, disposable contact lens', 9, 1, NULL, '2024-04-30 03:37:27'),
(16, 'Belcon 60% Comfort Astigmatism/Toric 6 Months | 2p', 'BELCEOG', '2760.00', 'available', 'Brand: Belcon\r\nDescription: Belcon Comfort Soft contact lenses are the first custom made Silicone Hydrogel lenses that are manufactured using lathe cut technology.\r\nThese lenses provide Breathability, as it delivers much higher oxygen permeability. Wettability, as it does not dehydrate on the eye during wear. Comfortability, since this is made of high- water content and low modulus, making it extremely soft with the same stiffness as a conventional mid-water content hydrogel contact lenses.\r\nType: 6 Months\r\nLens Per Bottle: 1pc\r\nBase Curve: 8.10mm / 8.40mm / 8.70mm\r\nNote: For special order. Minimum 3 weeks up to 4 weeks processing excluding weekends and holidays.\r\nBefore ordering this item please send your grade to our Live Chat for availability.\r\nGood for 6 months use, disposable contact lens\r\nNegative (-) for Nearsighted\r\nPositive (+) for Farsighted', 9, 1, NULL, '2024-04-30 03:40:15'),
(17, 'Cellufresh MD Lubricant Eye Drops 15ml', 'CELLEBF', '455.00', 'available', 'Description:\r\n\r\n - CELLUFRESH® MD lubricant eye drops are specially formulated to moisturize, comfort, and protect dry eyes.\r\n– It provides temporary relief of burning, irritation, and discomfort due to dryness of the eye or due to exposure to wind or sun.\r\n– It is safe to use and FDA Approved\r\n- Contact lens safe\r\n– It is suitable for use with or without contact lenses.\r\n– It is compatible with any type of contact lenses\r\n– Instill 1-2 drops in the affected eye(s) as needed or as prescribed by your doctor\r\n– Discard 1 month after opening\r\nExpiration: October 2025', 8, 1, NULL, '2024-04-30 03:42:43'),
(18, 'Acuvue Oasys 6’s per Box Contact Lens', 'ACUVVAR', '1895.00', 'available', 'Brand:	Acuvue\r\nGender:	MEN, WOMEN\r\nType:	2 Weeks\r\nLens Per Pack:	6pcs\r\nBase Curve:	8.8\r\nDiameter:	14.0\r\nNote:	Positive (+) grade is by special order (at least 2 weeks lead time)\r\n2-week or bi-weekly disposable contact lens\r\nNegative (-) for Nearsighted\r\nPositive (+) for Farsighted', 9, 1, NULL, '2024-04-30 03:45:10'),
(19, 'All Comfort Formula 500ml FREE CONTACT LENS CASE', 'ALL NBY', '349.00', 'available', 'All Comfort Formula 500ml FREE CONTACT LENS CASE', 8, 1, NULL, '2024-04-30 03:47:17'),
(20, 'Air Optix Hydraglyde for Astigmatism Contact Lens', 'AIR DFX', '2495.00', 'available', 'For special order. Before ordering this item please send your grade to our Facebook messenger for availability.\r\nMonthly disposable contact lens\r\nNegative (-) for Nearsighted\r\nPositive (+) for Farsighted\r\n\r\n', 9, 1, NULL, '2024-05-01 01:21:20'),
(21, 'Air Optix Colors Breathable Contact Lens Pure Haze', 'AIR JPN', '1795.00', 'available', 'Monthly disposable contact lens\r\nNegative (-) for Nearsighted\r\nPositive (+) for Farsighted\r\n', 9, 1, NULL, '2024-05-01 01:27:43'),
(22, 'Air Optix Colors Breathable Contact Lens Brown', 'AIR HLZ', '1795.00', 'available', 'Monthly disposable contact lens\r\nNegative (-) for Nearsighted\r\nPositive (+) for Farsighted\r\n', 9, 1, NULL, '2024-05-01 01:38:45'),
(23, 'Air Optix Colors Breathable Contact Lens Grey', 'AIR NBR', '1795.00', 'available', 'Monthly disposable contact lens\r\nNegative (-) for Nearsighted\r\nPositive (+) for Farsighted\r\n', 9, 1, NULL, '2024-05-01 01:41:32'),
(24, 'Beautiful Eye Non-Graded Colored Contact Lens Blac', 'BEAUCOV', '495.00', 'available', '1 Box per order\r\nMonthly disposable contact lens\r\nNegative (-) for Nearsighted\r\nPositive (+) for Farsighted\r\n', 9, 1, NULL, '2024-05-01 01:50:13'),
(25, 'Beautiful Eye Non-Graded Colored Contact Lens  Bro', 'BEAUATD', '495.00', 'available', '1 Box per order\r\nMonthly disposable contact lens\r\nNegative (-) for Nearsighted\r\nPositive (+) for Farsighted\r\n', 9, 1, NULL, '2024-05-01 01:52:54'),
(26, 'Freshlook Illuminate Contact Lens DIAMOND BLACK', 'FRESGYQ', '895.00', 'available', 'Brand:	Alcon\r\nGender:	MEN, WOMEN\r\nType: 	Daily\r\nLens Per Pack:	10\r\n', 9, 1, NULL, '2024-05-01 01:56:44'),
(27, 'Freshlook Illuminate Daily Contact Lens Espresso G', 'FRESARQ', '895.00', 'available', 'Brand:	Alcon\r\nGender:	MEN, WOMEN\r\nType:	Daily\r\nLens Per Pack:	10\r\n', 9, 1, NULL, '2024-05-01 02:01:42'),
(28, 'See Clear Color Contact Lens - GRAY', 'SEE TYA', '1200.00', 'available', 'Brand:	See Clear\r\nGender:	MEN, WOMEN\r\nType:	6 Months\r\nBase Curve:	8.6\r\nDiameter:	14.2\r\n', 9, 1, NULL, '2024-05-01 02:05:49'),
(29, 'See Clear Color Contact Lens - BROWN', 'SEE UQS', '1200.00', 'available', 'Brand:	See Clear\r\nGender:	MEN, WOMEN\r\nType:	6 Months\r\nBase Curve:	8.6\r\nDiameter:	14.2', 9, 1, NULL, '2024-05-01 02:08:16'),
(30, 'See Clear Color Contact Lens - BLUE', 'SEE NBA', '1200.00', 'available', 'Brand:	See Clear\r\nGender:	MEN, WOMEN\r\nType:	6 Months\r\nBase Curve:	8.6\r\nDiameter:	14.2', 9, 1, NULL, '2024-05-01 02:10:57'),
(31, 'See Clear Color Contact Lens - GREEN', 'SEE ONI', '1200.00', 'available', 'Brand:	See Clear\r\nGender:	MEN, WOMEN\r\nType:	6 Months\r\nBase Curve:	8.6\r\nDiameter:	14.2\r\n', 9, 1, NULL, '2024-05-01 02:12:56'),
(32, 'See Clear Color Contact Lens - VIOLET', 'SEE DPQ', '1200.00', 'available', '\r\nBrand:	See Clear\r\nGender:	MEN, WOMEN\r\nType:	6 Months\r\nBase Curve:	8.6\r\nDiameter:	14.2', 9, 1, NULL, '2024-05-01 02:15:05'),
(33, 'Sample Product ', 'SAMPVJA', '200.00', 'available', 'Sample Product ', 9, 1, NULL, '2024-05-18 07:08:08'),
(34, 'Verra  Y2K glasess', 'VERRVAJ', '2100.00', 'available', 'a rigid structure that surrounds or encloses something such as a door or window.\r\n', 10, 1, NULL, '2024-06-04 12:40:27'),
(35, 'Ceroflex', 'CEROVQA', '1200.00', 'available', 'a rigid structure that surrounds or encloses something such as a door or window.\r\n', 10, 1, NULL, '2024-06-04 12:50:23'),
(36, 'MOSO', 'MOSOJZD', '580.00', 'available', 'a rigid structure that surrounds or encloses something such as a door or window.\r\n', 10, 1, NULL, '2024-06-04 13:12:26'),
(37, 'Urbane', 'URBACKN', '1300.00', 'available', 'a rigid structure that surrounds or encloses something such as a door or window.\r\n', 10, 1, NULL, '2024-06-04 13:17:42'),
(38, 'BELLE BELLE', 'BELLPXY', '1850.00', 'available', 'a rigid structure that surrounds or encloses something such as a door or window.\r\n', 10, 1, NULL, '2024-06-04 13:25:28'),
(39, 'OVALLE', 'OVALRCM', '1999.00', 'available', 'a rigid structure that surrounds or encloses something such as a door or window.\r\n', 10, 1, NULL, '2024-06-04 13:27:23'),
(40, 'PRII', 'PRIIEIZ', '1350.00', 'available', 'a rigid structure that surrounds or encloses something such as a door or window.\r\n', 10, 1, NULL, '2024-06-04 13:32:21'),
(41, 'LEOPARD', 'LEOPTML', '900.00', 'available', 'a rigid structure that surrounds or encloses something such as a door or window.\r\n', 10, 1, NULL, '2024-06-04 13:36:49'),
(42, 'VERVE', 'VERVXPB', '1550.00', 'available', 'a rigid structure that surrounds or encloses something such as a door or window.\r\n', 10, 1, NULL, '2024-06-04 13:40:49'),
(43, 'BASICC', 'BASIDPN', '950.00', 'available', 'a rigid structure that surrounds or encloses something such as a door or window.\r\n', 10, 1, NULL, '2024-06-04 13:44:31'),
(44, 'AIR', 'AIRHIP', '1599.00', 'available', 'a rigid structure that surrounds or encloses something such as a door or window.\r\n', 10, 1, NULL, '2024-06-04 13:47:38'),
(45, 'RETRA', 'RETRQED', '3100.00', 'available', 'a rigid structure that surrounds or encloses something such as a door or window.\r\n', 10, 1, NULL, '2024-06-04 13:52:33'),
(46, 'PETITE PRO', 'PETIWOG', '1888.00', 'available', 'a rigid structure that surrounds or encloses something such as a door or window.\r\n', 10, 1, NULL, '2024-06-04 13:55:53'),
(47, 'ALL IN', 'ALL XLG', '1555.00', 'available', 'a rigid structure that surrounds or encloses something such as a door or window.\r\n', 10, 1, NULL, '2024-06-04 14:04:13'),
(48, 'APART', 'APAROZR', '1999.00', 'available', 'a rigid structure that surrounds or encloses something such as a door or window.\r\n', 10, 1, NULL, '2024-06-04 14:07:40'),
(49, 'CAT EYE ', 'CAT MEB', '2499.00', 'available', 'a rigid structure that surrounds or encloses something such as a door or window.\r\n', 10, 1, NULL, '2024-06-04 14:12:56'),
(50, 'PATTERN', 'PATTEAL', '1999.00', 'available', 'A frame is a rigid structure that surrounds or encloses something such as a door or window.', 10, 1, NULL, '2024-06-04 16:31:24'),
(51, 'POLAXPUS', 'POLAEXR', '2300.00', 'available', 'A frame is a rigid structure that surrounds or encloses something such as a door or window.', 10, 1, NULL, '2024-06-04 16:34:46'),
(52, 'QUIRKY', 'QUIRHTD', '900.00', 'available', 'A frame is a rigid structure that surrounds or encloses something such as a door or window.', 10, 1, NULL, '2024-06-04 16:37:31'),
(53, 'Sample Product 101', 'SAMPOVR', '200.00', 'available', 'new arrival product', 10, 1, NULL, '2024-06-08 17:25:39'),
(54, 'abc', 'ABCNBP', '10.00', 'available', 'abcs', 8, 1, NULL, '2024-06-11 08:25:45');

-- --------------------------------------------------------

--
-- Table structure for table `service_bundles`
--

DROP TABLE IF EXISTS `service_bundles`;
CREATE TABLE `service_bundles` (
  `id` int(10) NOT NULL,
  `code` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `price_custom` decimal(10,2) DEFAULT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` enum('available','unavailable') DEFAULT NULL,
  `is_visible` tinyint(1) DEFAULT 1,
  `created_by` int(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `category_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_bundle_items`
--

DROP TABLE IF EXISTS `service_bundle_items`;
CREATE TABLE `service_bundle_items` (
  `id` int(10) NOT NULL,
  `service_id` int(10) NOT NULL,
  `bundle_id` int(10) NOT NULL,
  `created_by` int(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_cart`
--

DROP TABLE IF EXISTS `service_cart`;
CREATE TABLE `service_cart` (
  `id` int(10) NOT NULL,
  `session_token` varchar(50) DEFAULT NULL,
  `service_id` int(10) NOT NULL,
  `type` enum('service','bundle') DEFAULT NULL,
  `user_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_cart`
--

INSERT INTO `service_cart` (`id`, `session_token`, `service_id`, `type`, `user_id`, `created_at`) VALUES
(1, '75808f1f2ba9b4e5c96c', 13, '', 71, '2024-04-30 03:51:02'),
(6, '63284b977c022b545986', 13, '', 91, '2024-06-04 18:40:20'),
(7, '63284b977c022b545986', 47, '', 91, '2024-06-04 18:40:29'),
(8, '9d40a29bf1f5bb30c7e5', 54, '', 99, '2024-06-11 08:28:26'),
(11, '437ff0465b23bff07ab5', 13, '', 100, '2024-07-23 16:14:39'),
(12, 'dc589dca7c3d0ceb9298', 13, '', 102, '2024-07-31 03:28:55');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` int(10) NOT NULL,
  `doctor_id` int(10) NOT NULL,
  `guest_name` varchar(100) DEFAULT NULL,
  `guest_phone` varchar(100) DEFAULT NULL,
  `guest_email` varchar(100) DEFAULT NULL,
  `guest_address` varchar(100) DEFAULT NULL,
  `guest_gender` enum('male','female') DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `time_created` time DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `doctor_recommendations` text DEFAULT NULL,
  `appointment_id` int(10) DEFAULT NULL COMMENT 'nullable',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `doctor_id`, `guest_name`, `guest_phone`, `guest_email`, `guest_address`, `guest_gender`, `user_id`, `date_created`, `time_created`, `remarks`, `doctor_recommendations`, `appointment_id`, `created_at`) VALUES
(1, 35, 'Jade Marie D. Dela Cruz', '09365546653', 'jademariedelacruz6@gmail.com', 'test', 'male', 0, '2023-08-18', NULL, NULL, NULL, NULL, '2023-08-18 11:01:17'),
(2, 50, 'JuanDelacruz', '09212032928', 'vimeva1105@backva.com', 'Quezon City ', 'male', 0, '2023-08-18', NULL, NULL, NULL, NULL, '2023-08-18 13:16:26'),
(3, 50, 'JuanDelacruz', '09212032928', 'vimeva1105@backva.com', 'Binondo Manila ', 'male', 0, '2023-08-18', NULL, NULL, NULL, NULL, '2023-08-18 13:31:27'),
(4, 50, 'JuanDelacruz', '09212032928', 'vimeva1105@backva.com', 'Binondo Manila ', 'male', 0, '2023-08-18', NULL, NULL, NULL, NULL, '2023-08-18 13:32:11'),
(5, 44, 'JuanDiaz', '09212032927', 'JuanDiaz@gmail.com', 'Tondo, Manila ', 'male', 0, '2023-08-18', NULL, NULL, NULL, NULL, '2023-08-18 13:48:44'),
(6, 50, 'Mark Angelo Gonzales', '09063387458', 'gonzalesmarkangeloph@gmail.com', 'test address', 'male', 56, '2023-08-21', NULL, 'Ordered Pair of eye glasses #ORDR-0003', 'eye 150 grade left and right, must have a bluelight lens soon.', 10, '2023-08-20 17:38:47'),
(7, 45, 'Mark Angelo Gonzales', '09063387458', 'gonzalesmarkangeloph@gmail.com', 'test', 'male', 56, '2023-08-24', NULL, 'has catarata, needs glasses correction; made an order\r\n#ORDR-0004', 'wag na manood ng alam mo na, para di lumabo mata.', 8, '2023-08-24 13:48:29'),
(8, 50, 'Juan  Jandog', '09212032922', 'vogol43743@vikinoko.com', 'Phillipines,Manila ', 'male', 65, '2023-08-28', NULL, NULL, NULL, 14, '2023-08-27 16:17:08'),
(9, 50, 'Berto ', '09506432749', 'dacano6817@wlmycn.com', 'Manila ', 'male', 50, '2023-08-30', NULL, NULL, NULL, 15, '2023-08-27 16:33:14'),
(10, 50, 'JuanManuel', '09506432749', 'dacano6817@wlmycn.com', 'Manila, Binondo ', 'male', 0, '2023-08-28', NULL, NULL, NULL, 16, '2023-08-27 16:44:38'),
(11, 50, 'bertongBaluga ', '09506432749', 'dacano6817@wlmycn.com', 'Manila', 'male', 0, '2023-08-28', NULL, 'Stigmatism ', 'Drink Milo Everyday \r\n', 17, '2023-08-27 16:51:10'),
(12, 50, 'Jade Dela Cruz', '09517552292', 'jademariedelacruz6@gmail.com', 'Road 20 Projecy 8', 'female', 69, '2024-04-16', NULL, 'rest well, and if you feel dizziness go back to the clinic', 'drink water regularly', 25, '2024-04-16 11:48:21'),
(13, 45, 'mannypaquiao', '09660070041', 'mannypaquiao@gmail.com', 'Quezon city manila ', 'male', 0, '2024-05-18', NULL, NULL, NULL, 28, '2024-05-18 06:37:08'),
(14, 45, 'JoeRogan', '09660069994', 'JoeRogan@gmail.com', 'Quezon city ', 'male', 0, '2024-05-20', NULL, NULL, NULL, 31, '2024-05-20 06:26:06'),
(15, 45, 'JoeRogan', '09660069994', 'JoeRogan@gmail.com', 'Quezon city ', 'male', 0, '2024-05-20', NULL, NULL, NULL, 31, '2024-05-20 06:28:18'),
(16, 45, 'JoeRogan', '09660069994', 'JoeRogan@gmail.com', 'Quezon city ', 'male', 0, '2024-05-20', NULL, NULL, NULL, 31, '2024-05-20 06:30:29'),
(17, 45, ' Jade Marie Dela Cruz', '09945510322', 'jademariedelacruz6@gmail.com', '119 Road 20', 'female', 0, '2024-05-21', NULL, NULL, NULL, 27, '2024-05-21 13:21:32'),
(18, 45, ' Jade Marie Dela Cruz', '09945510322', 'jademariedelacruz6@gmail.com', '119 Road 20', 'female', 0, '2024-05-21', NULL, NULL, NULL, 23, '2024-05-21 13:28:02'),
(19, 45, ' Jade Marie Dela Cruz', '+63 09945510322', '', '', 'female', 0, '2024-05-22', NULL, NULL, NULL, 26, '2024-05-22 01:17:47'),
(20, 35, 'Jade Marie D. Dela Cruz', '09945510322', 'jademariedelacruz6@gmail.com', '', 'female', 0, '2024-05-22', NULL, NULL, NULL, 30, '2024-05-22 01:20:32'),
(21, 45, 'Jade Dela Cruz', '09945510322', 'jademariedelacruz6@gmail.com', 'road 20', 'female', 87, '2024-05-24', NULL, NULL, NULL, 32, '2024-05-24 05:27:31'),
(22, 45, 'JogratDeguzman', '09660070055', 'JogratDeguzman@gmail.com', '', 'male', 0, '2024-06-05', NULL, NULL, NULL, 29, '2024-06-04 18:25:03'),
(23, 83, 'Wilma, Reyes', '0921203263', 'rjohnace30@gmail.com', 'San Juan, Quezon City ', 'male', 83, '2024-06-09', NULL, NULL, NULL, NULL, '2024-06-08 17:59:34'),
(24, 35, 'Johnace  Rosales', '09660070019', 'rjohnace30@gmail.com', 'Visayas avenue Quezon city ', 'male', 91, '2024-06-09', NULL, NULL, NULL, NULL, '2024-06-08 18:21:09'),
(25, 83, 'Ace Rosales', '09660070019', 'rjohnace30@gmail.com', 'Avenida santolan, Quezon city', 'male', 91, '2024-06-09', NULL, NULL, NULL, NULL, '2024-06-08 18:24:29'),
(26, 83, 'Ace Rosales', '09660070019', 'rjohnace30@gmail.com', 'new Sta.mesa Quezon City ', 'male', 91, '2024-06-11', NULL, NULL, NULL, 39, '2024-06-10 17:57:00'),
(27, 94, 'Erlynda  Mariano ', '09660070019', 'erlyndmaMariano@outlook.com', '', 'female', 95, '2024-06-11', NULL, NULL, NULL, 42, '2024-06-11 03:16:14'),
(28, 94, 'Erlynda  Mariano', '09212032955', 'erlyndaMariano@outlook.com', 'Manila, Quezon City ', 'male', 93, '2024-06-11', NULL, NULL, NULL, 38, '2024-06-11 03:18:44'),
(29, 94, 'ABCD ABCDD', '09262052724', 'erlyndaMariano@outlook.com', 'QC', 'male', 99, '2024-06-11', NULL, NULL, NULL, 43, '2024-06-11 08:15:47'),
(30, 94, 'Jade Marie Dela Cruz', '09517552292', 'jademariedelacruz6@gmail.com', '', 'female', 100, '2024-06-17', NULL, NULL, NULL, 47, '2024-06-13 08:40:22'),
(31, 45, ' Jade Marie Dela Cruz', '77777777777', 'abc@abc.abc', '', 'female', 0, '2024-06-17', NULL, NULL, NULL, 22, '2024-06-13 09:41:58'),
(32, 45, 'Jade Marie Dela Cruz', '09517552292', 'jademariedelacruz6@gmail.com', '', 'female', 100, '2024-07-17', NULL, NULL, NULL, 49, '2024-06-13 09:46:20'),
(33, 96, 'Cherry Dela Cruz', '09279443054', 'charitodelacruz0109@gmail.com', '', 'female', 101, '2024-06-23', NULL, NULL, NULL, 50, '2024-06-23 04:24:49'),
(34, 45, 'Jade Marie Dela Cruz', '09517552292', 'jademariedelacruz6@gmail.com', '', 'female', 100, '2024-07-09', NULL, NULL, NULL, 52, '2024-07-09 13:54:12'),
(35, 45, 'Jade Marie Dela Cruz', '09517552292', 'jademariedelacruz6@gmail.com', '', 'male', 100, '2024-07-09', NULL, NULL, NULL, 51, '2024-07-09 13:55:28'),
(36, 45, 'Jade Marie Dela Cruz', '09517552292', 'jademariedelacruz6@gmail.com', 'eye check-up', 'female', 100, '2024-08-01', NULL, NULL, NULL, 55, '2024-07-15 07:13:48'),
(37, 45, ' Jade Marie Dela Cruz', '09988888888', '', '', 'female', 0, '2024-07-23', NULL, NULL, NULL, 12, '2024-07-23 15:36:54'),
(38, 45, 'Mark Angelo Gonzales', '09332110009', 'gonzalesmarkangeloph333333@gmail.com', '', 'male', 56, '2024-07-23', NULL, NULL, NULL, 11, '2024-07-23 15:37:32'),
(39, 45, 'Jade Marie Dela Cruz', '09517552292', 'jademariedelacruz6@gmail.com', '', 'female', 100, '2024-07-23', NULL, NULL, NULL, 48, '2024-07-23 15:39:06'),
(40, 45, 'tester solo', '09063387433', 'gonzalesmarkangeloph@gmail.com', '', 'female', 58, '2024-07-23', NULL, NULL, NULL, 54, '2024-07-23 15:51:46'),
(41, 45, 'Jade Marie Dela Cruz', '09517552292', 'jademariedelacruz6@gmail.com', '', 'female', 100, '2024-07-23', NULL, NULL, NULL, 56, '2024-07-23 15:55:34'),
(42, 96, 'Jade Marie Dela Cruz', '09517552292', 'jademariedelacruz6@gmail.com', '', 'male', 100, '2024-07-28', NULL, NULL, NULL, 60, '2024-07-28 14:03:56'),
(43, 96, 'Jade Marie Dela Cruz', '09517552292', 'jademariedelacruz6@gmail.com', '', 'female', 100, '2024-07-28', NULL, NULL, NULL, 59, '2024-07-28 14:04:15'),
(44, 96, 'Jade Marie Dela Cruz', '09517552292', 'jademariedelacruz6@gmail.com', '', 'male', 100, '2024-07-29', NULL, NULL, NULL, 68, '2024-07-29 05:59:37'),
(45, 96, 'Cherry Dela Cruz', '09279443054', 'charitodelacruz0109@gmail.com', '', 'male', 101, '2024-07-30', NULL, NULL, NULL, 69, '2024-07-30 06:53:49'),
(46, 96, 'Johnace Rosales', '09212032924', 'rjohnace30@gmail.com', '', 'male', 102, '2024-07-31', NULL, NULL, NULL, 70, '2024-07-31 03:16:49'),
(47, 96, 'Johnace Rosales', '09212032924', 'rjohnace30@gmail.com', '', 'male', 102, '2024-07-31', NULL, NULL, NULL, NULL, '2024-07-31 03:24:02'),
(48, 96, 'Johnace Rosales', '09212032924', 'rjohnace30@gmail.com', '', 'male', 102, '2024-07-31', NULL, NULL, NULL, 71, '2024-07-31 03:26:06'),
(49, 96, 'Johnace Rosales', '09212032924', 'rjohnace30@gmail.com', '', 'male', 102, '2024-07-31', NULL, NULL, NULL, 72, '2024-07-31 03:32:48'),
(50, 45, ' ace', '09212032924', 'rjohnace30@gmail.com', 'Quezon City', 'male', 0, '2024-08-06', NULL, NULL, NULL, 34, '2024-08-05 19:13:25'),
(51, 45, 'John Rosales', '09660070585', 'rjohnace30@gmail.com', '', 'male', 105, '2024-08-06', NULL, NULL, NULL, 75, '2024-08-05 19:14:28'),
(52, 96, 'John Rosales', '09660070585', 'rjohnace30@gmail.com', '', 'male', 105, '2024-08-06', NULL, NULL, NULL, NULL, '2024-08-05 19:44:21'),
(53, 104, 'John Rosales', '09660070585', 'rjohnace30@gmail.com', '', 'male', 105, '2024-08-06', NULL, NULL, NULL, NULL, '2024-08-05 19:46:24'),
(54, 96, 'John Rosales', '09660070585', 'rjohnace30@gmail.com', '', 'male', 105, '2024-08-06', NULL, NULL, NULL, 74, '2024-08-05 22:36:13');

-- --------------------------------------------------------

--
-- Table structure for table `specialties`
--

DROP TABLE IF EXISTS `specialties`;
CREATE TABLE `specialties` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `category_id` int(10) DEFAULT NULL,
  `created_by` int(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

DROP TABLE IF EXISTS `stocks`;
CREATE TABLE `stocks` (
  `id` int(10) NOT NULL,
  `item_id` int(10) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `purchase_order_number` varchar(50) DEFAULT NULL,
  `entry_type` enum('DEDUCT','ADD') DEFAULT NULL,
  `entry_origin` text DEFAULT NULL,
  `created_by` int(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `supply_order_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `item_id`, `quantity`, `remarks`, `date`, `purchase_order_number`, `entry_type`, `entry_origin`, `created_by`, `created_at`, `updated_at`, `supply_order_id`) VALUES
(1, 1, 5, '5 pieces ', '2023-05-05', NULL, 'ADD', 'PURCHASE_ITEM', NULL, '2023-05-04 17:07:07', '2023-05-04 17:07:07', NULL),
(2, 2, 50, 'delivered from quiapo', '2023-05-01', NULL, 'ADD', 'PURCHASE_ITEM', NULL, '2023-05-05 13:58:10', '2023-05-05 13:58:10', NULL),
(3, 2, -13, 'sira pag sinusuot hindi makakita customer ', '2023-05-05', NULL, 'DEDUCT', 'DEFECTIVE_ITEM', NULL, '2023-05-05 13:59:22', '2023-05-05 13:59:22', NULL),
(4, 3, 10, 'from baclaran ', '2023-05-08', NULL, 'ADD', 'PURCHASE_ITEM', NULL, '2023-05-15 16:34:15', '2023-05-15 16:34:15', NULL),
(5, 4, 15, '', '2023-05-08', NULL, 'ADD', 'PURCHASE_ITEM', NULL, '2023-05-18 13:20:31', '2023-05-18 13:20:31', NULL),
(6, 5, 50, 'A sunglass strap is also known as an eyewear retainer. These straps are commonly used to hang your sunglasses around your neck when you don\'t want to wear them but wish to keep them handy. It can slide at the sides of your glasses and rest around your neck.', '2023-05-21', NULL, 'ADD', 'PURCHASE_ITEM', NULL, '2023-05-21 08:57:17', '2023-05-21 08:57:17', NULL),
(7, 6, 85, '', '2023-02-05', NULL, 'ADD', 'PURCHASE_ITEM', NULL, '2023-05-21 15:18:54', '2023-05-21 15:18:54', NULL),
(8, 7, 10, 'New Delivered Items ', '2023-04-20', NULL, 'ADD', 'PURCHASE_ITEM', NULL, '2023-05-21 16:46:01', '2023-05-21 16:46:01', NULL),
(9, 7, 5, 'Sold ', '2023-04-20', NULL, 'ADD', 'PURCHASE_ITEM', NULL, '2023-05-21 16:46:50', '2023-05-21 16:46:50', NULL),
(10, 7, 5, 'Sold ', '2023-04-20', NULL, 'ADD', 'PURCHASE_ITEM', NULL, '2023-05-21 16:47:59', '2023-05-21 16:47:59', NULL),
(11, 7, -10, 'Sold ', '2023-04-20', NULL, 'DEDUCT', 'PURCHASE_ITEM', NULL, '2023-05-21 16:48:35', '2023-05-21 16:48:35', NULL),
(12, 6, 12, 'all available ', '2023-04-26', NULL, 'ADD', 'PURCHASE_ITEM', NULL, '2023-05-22 05:08:35', '2023-05-22 05:08:35', NULL),
(13, 8, 10, 'Delivery of Stocks ', '2023-04-28', NULL, 'ADD', 'PURCHASE_ITEM', NULL, '2023-05-22 06:10:06', '2023-05-22 06:10:06', NULL),
(14, 9, 100, 'Delivery J&T', '2023-04-20', NULL, 'ADD', 'PURCHASE_ITEM', NULL, '2023-05-22 06:13:21', '2023-05-22 06:13:21', NULL),
(15, 9, -10, 'Defective items ', '2023-04-21', NULL, 'DEDUCT', 'DEFECTIVE_ITEM', NULL, '2023-05-22 06:14:28', '2023-05-22 06:14:28', NULL),
(16, 10, 200, 'New Items \r\n', '2023-04-20', NULL, 'ADD', 'PURCHASE_ITEM', NULL, '2023-05-22 06:19:35', '2023-05-22 06:19:35', NULL),
(17, 9, 10, '', '0000-00-00', NULL, 'ADD', 'PURCHASE_ITEM', NULL, '2023-05-22 07:42:22', '2023-05-22 07:42:22', NULL),
(18, 8, -10, 'defective', '2023-04-20', NULL, 'DEDUCT', 'DEFECTIVE_ITEM', NULL, '2023-05-22 08:02:19', '2023-05-22 08:02:19', NULL),
(19, 9, -4, 'Order Reference : #ORDR-0002', '2023-07-18', NULL, 'DEDUCT', 'PURCHASE_ITEM', NULL, '2023-07-18 11:43:32', '2023-07-18 11:43:32', NULL),
(20, 10, -5, 'Order Reference : #ORDR-0003', '2023-08-21', NULL, 'DEDUCT', 'PURCHASE_ITEM', NULL, '2023-08-20 17:39:36', '2023-08-20 17:39:36', NULL),
(21, 10, 1, 'Defective Item', NULL, NULL, 'ADD', 'CHANGE_ITEM', NULL, '2023-08-20 17:40:10', '2023-08-20 17:40:10', NULL),
(22, 10, -1, 'Reason : DEFECTIVE_ITEM \n sira', NULL, NULL, 'DEDUCT', 'DEFECTIVE_ITEM', NULL, '2023-08-20 17:40:10', '2023-08-20 17:40:10', NULL),
(23, 9, -2, 'Order Reference : #ORDR-0004', '2023-08-24', NULL, 'DEDUCT', 'PURCHASE_ITEM', NULL, '2023-08-24 13:50:22', '2023-08-24 13:50:22', NULL),
(24, 11, 100, 'shopee', '2023-08-14', NULL, 'ADD', 'PURCHASE_ORDER', NULL, '2023-08-24 13:56:29', '2023-08-24 13:56:29', NULL),
(25, 11, -10, 'HIndi tubig laman, betadine', '2023-08-23', NULL, 'DEDUCT', 'DEFECTIVE_ITEM', NULL, '2023-08-24 13:56:57', '2023-08-24 13:56:57', NULL),
(26, 11, -2, 'Order Reference : #ORDR-0005', '2023-08-24', NULL, 'DEDUCT', 'PURCHASE_ITEM', NULL, '2023-08-24 13:58:05', '2023-08-24 13:58:05', NULL),
(27, 9, 1, 'Defective Item', NULL, NULL, 'ADD', 'CHANGE_ITEM', NULL, '2023-08-24 14:01:24', '2023-08-24 14:01:24', NULL),
(28, 9, -1, 'Reason : DEFECTIVE_ITEM \n test ito ngayon dapat lalabas sa logs 08/24/2023', NULL, NULL, 'DEDUCT', 'DEFECTIVE_ITEM', NULL, '2023-08-24 14:01:24', '2023-08-24 14:01:24', NULL),
(29, 11, -1, 'Order Reference : #ORDR-0006', '2023-08-28', NULL, 'DEDUCT', 'PURCHASE_ITEM', NULL, '2023-08-27 16:33:50', '2023-08-27 16:33:50', NULL),
(30, 9, -1, 'Order Reference : #ORDR-0007', '2023-08-28', NULL, 'DEDUCT', 'PURCHASE_ITEM', NULL, '2023-08-27 16:45:48', '2023-08-27 16:45:48', NULL),
(31, 8, -1, 'defective items ', '2023-08-29', NULL, 'DEDUCT', 'DEFECTIVE_ITEM', NULL, '2023-08-27 17:10:48', '2023-08-27 17:10:48', NULL),
(32, 13, 500, '', '2024-04-01', NULL, 'ADD', 'PURCHASE_ITEM', NULL, '2024-04-30 03:29:31', '2024-04-30 03:29:31', NULL),
(33, 14, 500, '', '2024-04-01', NULL, 'ADD', 'PURCHASE_ITEM', NULL, '2024-04-30 03:35:01', '2024-04-30 03:35:01', NULL),
(34, 15, 500, '', '2024-04-01', NULL, 'ADD', 'PURCHASE_ITEM', NULL, '2024-04-30 03:38:04', '2024-04-30 03:38:04', NULL),
(35, 16, 500, '', '2024-04-01', NULL, 'ADD', 'PURCHASE_ITEM', NULL, '2024-04-30 03:40:44', '2024-04-30 03:40:44', NULL),
(36, 17, 655, '', '2024-04-01', NULL, 'ADD', 'PURCHASE_ITEM', NULL, '2024-04-30 03:43:09', '2024-04-30 03:43:09', NULL),
(37, 18, 300, '', '2024-04-01', NULL, 'ADD', 'PURCHASE_ITEM', NULL, '2024-04-30 03:45:43', '2024-04-30 03:45:43', NULL),
(38, 19, 300, '', '2024-04-01', NULL, 'ADD', 'PURCHASE_ITEM', NULL, '2024-04-30 03:47:37', '2024-04-30 03:47:37', NULL),
(39, 20, 500, 'For special order. Before ordering this item please send your grade to our Facebook messenger for availability.\r\nMonthly disposable contact lens\r\nNegative (-) for Nearsighted\r\nPositive (+) for Farsighted\r\n', '2024-02-20', NULL, 'ADD', 'PURCHASE_ORDER', NULL, '2024-05-01 01:22:31', '2024-05-01 01:22:31', NULL),
(40, 21, 150, '', '2023-12-28', NULL, 'ADD', 'PURCHASE_ORDER', NULL, '2024-05-01 01:28:31', '2024-05-01 01:28:31', NULL),
(41, 22, 175, '', '2023-05-20', NULL, 'ADD', 'PURCHASE_ORDER', NULL, '2024-05-01 01:39:21', '2024-05-01 01:39:21', NULL),
(42, 23, 163, 'Monthly disposable contact lens\r\nNegative (-) for Nearsighted\r\nPositive (+) for Farsighted\r\n', '2023-03-24', NULL, 'ADD', 'PURCHASE_ORDER', NULL, '2024-05-01 01:42:00', '2024-05-01 01:42:00', NULL),
(43, 24, 163, '', '2024-04-02', NULL, 'ADD', 'PURCHASE_ORDER', NULL, '2024-05-01 01:50:34', '2024-05-01 01:50:34', NULL),
(44, 25, 163, 'Brand	Beautiful Eyes\r\nGender	MEN, WOMEN\r\nType	Monthly\r\nLens Per Pack	2 PCS\r\nBase Curve	8.9\r\nDiameter	14.8\r\nNote	1 Box per order\r\nMonthly disposable contact lens\r\nNegative (-) for Nearsighted\r\nPositive (+) for Farsighted\r\n', '2023-06-13', NULL, 'ADD', 'PURCHASE_ORDER', NULL, '2024-05-01 01:53:58', '2024-05-01 01:53:58', NULL),
(45, 26, 165, '', '2023-08-23', NULL, 'ADD', 'PURCHASE_ORDER', NULL, '2024-05-01 01:57:10', '2024-05-01 01:57:10', NULL),
(46, 27, 165, '', '2023-10-20', NULL, 'ADD', 'PURCHASE_ORDER', NULL, '2024-05-01 02:06:19', '2024-05-01 02:06:19', NULL),
(47, 28, 100, '', '2023-05-18', NULL, 'ADD', 'PURCHASE_ORDER', NULL, '2024-05-01 02:06:45', '2024-05-01 02:06:45', NULL),
(48, 29, 150, '', '2023-09-20', NULL, 'ADD', 'PURCHASE_ORDER', NULL, '2024-05-01 02:08:46', '2024-05-01 02:08:46', NULL),
(49, 30, 55, 'Brand:	See Clear\r\nGender:	MEN, WOMEN\r\nType:	6 Months\r\nBase Curve:	8.6\r\nDiameter:	14.2', '2023-08-16', NULL, 'ADD', 'PURCHASE_ORDER', NULL, '2024-05-01 02:11:32', '2024-05-01 02:11:32', NULL),
(50, 31, 22, 'Brand:	See Clear\r\nGender:	MEN, WOMEN\r\nType:	6 Months\r\nBase Curve:	8.6\r\nDiameter:	14.2\r\n', '2023-07-12', NULL, 'ADD', 'PURCHASE_ORDER', NULL, '2024-05-01 02:13:28', '2024-05-01 02:13:28', NULL),
(51, 32, 55, '', '2023-06-02', NULL, 'ADD', 'PURCHASE_ORDER', NULL, '2024-05-01 02:15:33', '2024-05-01 02:15:33', NULL),
(52, 18, -2, 'Order Reference : #ORDR-0009', '2024-05-18', NULL, 'DEDUCT', 'PURCHASE_ITEM', NULL, '2024-05-18 06:27:15', '2024-05-18 06:27:15', NULL),
(53, 33, -2, 'Order Reference : #ORDR-0010', '2024-05-20', NULL, 'DEDUCT', 'PURCHASE_ITEM', NULL, '2024-05-20 06:50:03', '2024-05-20 06:50:03', NULL),
(54, 22, -2, 'Order Reference : #ORDR-0011', '2024-05-20', NULL, 'DEDUCT', 'PURCHASE_ITEM', NULL, '2024-05-20 06:58:54', '2024-05-20 06:58:54', NULL),
(55, 18, -1, 'Order Reference : #ORDR-0012', '2024-05-27', NULL, 'DEDUCT', 'PURCHASE_ITEM', NULL, '2024-05-27 02:48:24', '2024-05-27 02:48:24', NULL),
(56, 34, 10, '', '2024-05-28', NULL, 'ADD', 'PURCHASE_ITEM', NULL, '2024-06-04 12:46:36', '2024-06-04 12:46:36', NULL),
(57, 35, 10, 'a rigid structure that surrounds or encloses something such as a door or window.\r\n', '2024-05-17', NULL, 'ADD', 'PURCHASE_ITEM', NULL, '2024-06-04 12:50:55', '2024-06-04 12:50:55', NULL),
(58, 36, 13, '', '2024-03-07', NULL, 'ADD', 'PURCHASE_ITEM', NULL, '2024-06-04 13:13:26', '2024-06-04 13:13:26', NULL),
(59, 37, 15, '', '2024-06-06', NULL, 'ADD', 'PURCHASE_ITEM', NULL, '2024-06-04 13:18:56', '2024-06-04 13:18:56', NULL),
(60, 38, 12, '', '2024-06-26', NULL, 'ADD', 'PURCHASE_ITEM', NULL, '2024-06-04 13:28:39', '2024-06-04 13:28:39', NULL),
(61, 40, 18, '', '2024-04-20', NULL, 'ADD', 'PURCHASE_ITEM', NULL, '2024-06-04 13:33:01', '2024-06-04 13:33:01', NULL),
(62, 41, 14, '', '2024-05-26', NULL, 'ADD', 'PURCHASE_ITEM', NULL, '2024-06-04 13:37:38', '2024-06-04 13:37:38', NULL),
(63, 42, 11, '', '2024-05-09', NULL, 'ADD', 'PURCHASE_ITEM', NULL, '2024-06-04 13:41:27', '2024-06-04 13:41:27', NULL),
(64, 43, 12, '', '2024-05-16', NULL, 'ADD', 'PURCHASE_ITEM', NULL, '2024-06-04 13:45:19', '2024-06-04 13:45:19', NULL),
(65, 44, 19, '', '2024-04-11', NULL, 'ADD', 'PURCHASE_ITEM', NULL, '2024-06-04 13:53:53', '2024-06-04 13:53:53', NULL),
(66, 48, 9, '', '2024-04-17', NULL, 'ADD', 'PURCHASE_ITEM', NULL, '2024-06-04 14:10:39', '2024-06-04 14:10:39', NULL),
(67, 49, 14, '', '2024-05-10', NULL, 'ADD', 'PURCHASE_ITEM', NULL, '2024-06-04 14:18:03', '2024-06-04 14:18:03', NULL),
(68, 50, 23, '', '2024-05-09', NULL, 'ADD', 'PURCHASE_ITEM', NULL, '2024-06-04 16:34:03', '2024-06-04 16:34:03', NULL),
(69, 51, 9, '', '2024-05-25', NULL, 'ADD', 'PURCHASE_ITEM', NULL, '2024-06-04 16:35:24', '2024-06-04 16:35:24', NULL),
(70, 52, 9, '', '2024-04-17', NULL, 'ADD', 'PURCHASE_ITEM', NULL, '2024-06-04 16:38:05', '2024-06-04 16:38:05', NULL),
(71, 44, -1, 'Order Reference : #ORDR-0013', '2024-06-05', NULL, 'DEDUCT', 'PURCHASE_ITEM', NULL, '2024-06-04 21:16:43', '2024-06-04 21:16:43', NULL),
(72, 44, -2, 'Order Reference : #ORDR-0015', '2024-06-09', NULL, 'DEDUCT', 'PURCHASE_ITEM', NULL, '2024-06-08 17:42:20', '2024-06-08 17:42:20', NULL),
(73, 44, 1, 'Reason : CHANGE_ITEM \n One piece is all he need ', NULL, NULL, 'ADD', 'CHANGE_ITEM', NULL, '2024-06-08 17:43:12', '2024-06-08 17:43:12', NULL),
(74, 44, 1, 'Defective Item', NULL, NULL, 'ADD', 'CHANGE_ITEM', NULL, '2024-06-08 18:17:59', '2024-06-08 18:17:59', NULL),
(75, 44, -1, 'Reason : DEFECTIVE_ITEM \n the Item was not Good', NULL, NULL, 'DEDUCT', 'DEFECTIVE_ITEM', NULL, '2024-06-08 18:17:59', '2024-06-08 18:17:59', NULL),
(76, 45, 2, 'Purchase for supply ', '2023-12-01', NULL, 'ADD', 'PURCHASE_ORDER', NULL, '2024-06-10 16:41:11', '2024-06-10 16:41:11', NULL),
(77, 45, -4, 'Order Reference : #ORDR-0016', '2024-06-11', NULL, 'DEDUCT', 'PURCHASE_ITEM', NULL, '2024-06-10 16:44:05', '2024-06-10 16:44:05', NULL),
(78, 54, 100, '', '2024-06-11', NULL, 'ADD', 'PURCHASE_ITEM', NULL, '2024-06-11 08:26:22', '2024-06-11 08:26:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `system_notifications`
--

DROP TABLE IF EXISTS `system_notifications`;
CREATE TABLE `system_notifications` (
  `id` int(10) NOT NULL,
  `message` text DEFAULT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `color` varchar(100) DEFAULT NULL,
  `heading` varchar(100) DEFAULT NULL,
  `subtext` varchar(100) DEFAULT NULL,
  `href` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `system_notifications`
--

INSERT INTO `system_notifications` (`id`, `message`, `icon`, `color`, `heading`, `subtext`, `href`, `created_at`, `updated_at`) VALUES
(1, 'Appointment to vitalcare is submitted .#APT-A5C570C appointment reference', '', '', '', '', '/AppointmentController/show/1?', '2023-06-25 06:47:08', '2023-06-25 06:47:08'),
(2, 'Appointment to vitalcare is submitted .#APT-FD66480 appointment reference', '', '', '', '', '/AppointmentController/show/2?', '2023-06-25 06:47:42', '2023-06-25 06:47:42'),
(3, 'Category Sun Glasses has been created', '', '', '', '', '', '2023-07-18 11:39:16', '2023-07-18 11:39:16'),
(4, 'Category ANTI RADIATON LENS  has been created', '', '', '', '', '', '2023-08-17 11:33:13', '2023-08-17 11:33:13'),
(5, 'Category NORMAL LENSE  has been created', '', '', '', '', '', '2023-08-17 11:33:25', '2023-08-17 11:33:25'),
(6, 'Appointment to vitalcare is submitted .#APT-3849E10 appointment reference', '', '', '', '', '/AppointmentController/show/3?', '2023-08-18 10:24:14', '2023-08-18 10:24:14'),
(7, 'DRA/DR.  . started a session with you', '', '', '', '', '/SessionController/show/1?', '2023-08-18 11:01:17', '2023-08-18 11:01:17'),
(8, ' \'DRA/DR. \'.Tom started a session with Jade Marie D. Dela Cruz', '', '', '', '', '/SessionController/show/1?', '2023-08-18 11:01:18', '2023-08-18 11:01:18'),
(9, 'Appointment to vitalcare is submitted .#APT-7E978A7 appointment reference', '', '', '', '', '/AppointmentController/show/4?', '2023-08-18 13:06:11', '2023-08-18 13:06:11'),
(10, 'DRA/DR.  . started a session with you', '', '', '', '', '/SessionController/show/2?', '2023-08-18 13:16:26', '2023-08-18 13:16:26'),
(11, ' \'DRA/DR. \'.Staff started a session with JuanDelacruz', '', '', '', '', '/SessionController/show/2?', '2023-08-18 13:16:28', '2023-08-18 13:16:28'),
(12, 'DRA/DR.  . started a session with you', '', '', '', '', '/SessionController/show/3?', '2023-08-18 13:31:27', '2023-08-18 13:31:27'),
(13, ' \'DRA/DR. \'.Staff started a session with JuanDelacruz', '', '', '', '', '/SessionController/show/3?', '2023-08-18 13:31:28', '2023-08-18 13:31:28'),
(14, 'DRA/DR.  . started a session with you', '', '', '', '', '/SessionController/show/4?', '2023-08-18 13:32:11', '2023-08-18 13:32:11'),
(15, ' \'DRA/DR. \'.Staff started a session with JuanDelacruz', '', '', '', '', '/SessionController/show/4?', '2023-08-18 13:32:13', '2023-08-18 13:32:13'),
(16, 'Appointment to vitalcare is submitted .#APT-7B3A249 appointment reference', '', '', '', '', '/AppointmentController/show/5?', '2023-08-18 13:44:39', '2023-08-18 13:44:39'),
(17, 'DRA/DR.  . started a session with you', '', '', '', '', '/SessionController/show/5?', '2023-08-18 13:48:44', '2023-08-18 13:48:44'),
(18, ' \'DRA/DR. \'.Thorsten started a session with JuanDiaz', '', '', '', '', '/SessionController/show/5?', '2023-08-18 13:48:45', '2023-08-18 13:48:45'),
(19, 'Appointment to vitalcare is submitted .#APT-940CB00 appointment reference', '', '', '', '', '/AppointmentController/show/6?', '2023-08-18 13:55:50', '2023-08-18 13:55:50'),
(20, 'Appointment to vitalcare is submitted .#APT-CDF5F6C appointment reference', '', '', '', '', '/AppointmentController/show/7?', '2023-08-18 14:04:55', '2023-08-18 14:04:55'),
(21, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-7C32EC9 appointment reference', '', '', '', '', '/AppointmentController/show/8?', '2023-08-20 17:23:17', '2023-08-20 17:23:17'),
(22, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-7C32EC9 appointment reference', '', '', '', '', '/AppointmentController/show/8?', '2023-08-20 17:23:17', '2023-08-20 17:23:17'),
(23, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-8A3E684 appointment reference', '', '', '', '', '/AppointmentController/show/9?', '2023-08-20 17:34:42', '2023-08-20 17:34:42'),
(24, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-8A3E684 appointment reference', '', '', '', '', '/AppointmentController/show/9?', '2023-08-20 17:34:42', '2023-08-20 17:34:42'),
(25, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-3931D67 appointment reference', '', '', '', '', '/AppointmentController/show/10?', '2023-08-20 17:35:56', '2023-08-20 17:35:56'),
(26, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-3931D67 appointment reference', '', '', '', '', '/AppointmentController/show/10?', '2023-08-20 17:35:56', '2023-08-20 17:35:56'),
(27, 'DRA/DR.  . started a session with you', '', '', '', '', '/SessionController/show/6?', '2023-08-20 17:38:47', '2023-08-20 17:38:47'),
(28, ' \'DRA/DR. \'.Staff started a session with Mark Angelo Gonzales', '', '', '', '', '/SessionController/show/6?', '2023-08-20 17:38:47', '2023-08-20 17:38:47'),
(29, 'DRA/DR.  . started a session with you', '', '', '', '', '/SessionController/show/7?', '2023-08-24 13:48:29', '2023-08-24 13:48:29'),
(30, ' \'DRA/DR. \'.Thorsten started a session with Mark Angelo Gonzales', '', '', '', '', '/SessionController/show/7?', '2023-08-24 13:48:29', '2023-08-24 13:48:29'),
(31, 'Category Medical Liquid has been created', '', '', '', '', '', '2023-08-24 13:54:47', '2023-08-24 13:54:47'),
(32, 'admin added a service Eyedrops', '', '', '', '', '', '2023-08-24 13:55:23', '2023-08-24 13:55:23'),
(33, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-DCDA6D5 appointment reference', '', '', '', '', '/AppointmentController/show/11?', '2023-08-24 14:03:44', '2023-08-24 14:03:44'),
(34, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-DCDA6D5 appointment reference', '', '', '', '', '/AppointmentController/show/11?', '2023-08-24 14:03:44', '2023-08-24 14:03:44'),
(35, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-0619A48 appointment reference', '', '', '', '', '/AppointmentController/show/12?', '2023-08-27 08:17:18', '2023-08-27 08:17:18'),
(36, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-0619A48 appointment reference', '', '', '', '', '/AppointmentController/show/12?', '2023-08-27 08:17:18', '2023-08-27 08:17:18'),
(37, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-FD70359 appointment reference', '', '', '', '', '/AppointmentController/show/13?', '2023-08-27 14:56:59', '2023-08-27 14:56:59'),
(38, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-FD70359 appointment reference', '', '', '', '', '/AppointmentController/show/13?', '2023-08-27 14:56:59', '2023-08-27 14:56:59'),
(39, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-19BBC45 appointment reference', '', '', '', '', '/AppointmentController/show/14?', '2023-08-27 15:39:44', '2023-08-27 15:39:44'),
(40, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-19BBC45 appointment reference', '', '', '', '', '/AppointmentController/show/14?', '2023-08-27 15:39:44', '2023-08-27 15:39:44'),
(41, 'DRA/DR.  . started a session with you', '', '', '', '', '/SessionController/show/8?', '2023-08-27 16:17:08', '2023-08-27 16:17:08'),
(42, ' \'DRA/DR. \'.Staff02 started a session with Juan  Jandog', '', '', '', '', '/SessionController/show/8?', '2023-08-27 16:17:08', '2023-08-27 16:17:08'),
(43, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-24F8D16 appointment reference', '', '', '', '', '/AppointmentController/show/15?', '2023-08-27 16:29:32', '2023-08-27 16:29:32'),
(44, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-24F8D16 appointment reference', '', '', '', '', '/AppointmentController/show/15?', '2023-08-27 16:29:32', '2023-08-27 16:29:32'),
(45, 'DRA/DR.  . started a session with you', '', '', '', '', '/SessionController/show/9?', '2023-08-27 16:33:14', '2023-08-27 16:33:14'),
(46, ' \'DRA/DR. \'.Staff02 started a session with Berto ', '', '', '', '', '/SessionController/show/9?', '2023-08-27 16:33:14', '2023-08-27 16:33:14'),
(47, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-09896C5 appointment reference', '', '', '', '', '/AppointmentController/show/16?', '2023-08-27 16:43:20', '2023-08-27 16:43:20'),
(48, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-09896C5 appointment reference', '', '', '', '', '/AppointmentController/show/16?', '2023-08-27 16:43:20', '2023-08-27 16:43:20'),
(49, 'DRA/DR.  . started a session with you', '', '', '', '', '/SessionController/show/10?', '2023-08-27 16:44:38', '2023-08-27 16:44:38'),
(50, ' \'DRA/DR. \'.John  started a session with JuanManuel', '', '', '', '', '/SessionController/show/10?', '2023-08-27 16:44:38', '2023-08-27 16:44:38'),
(51, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-E94EEC9 appointment reference', '', '', '', '', '/AppointmentController/show/17?', '2023-08-27 16:49:32', '2023-08-27 16:49:32'),
(52, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-E94EEC9 appointment reference', '', '', '', '', '/AppointmentController/show/17?', '2023-08-27 16:49:32', '2023-08-27 16:49:32'),
(53, 'DRA/DR.  . started a session with you', '', '', '', '', '/SessionController/show/11?', '2023-08-27 16:51:10', '2023-08-27 16:51:10'),
(54, ' \'DRA/DR. \'.John  started a session with bertongBaluga ', '', '', '', '', '/SessionController/show/11?', '2023-08-27 16:51:10', '2023-08-27 16:51:10'),
(55, 'Category Eye Wear has been created', '', '', '', '', '', '2023-08-27 17:09:22', '2023-08-27 17:09:22'),
(56, 'Category Eye Solutions  has been created', '', '', '', '', '', '2023-08-27 17:09:34', '2023-08-27 17:09:34'),
(57, 'Category Lens   has been created', '', '', '', '', '', '2023-08-27 17:09:49', '2023-08-27 17:09:49'),
(58, 'admin added a service Contact Lens Cleaner', '', '', '', '', '', '2023-08-27 17:13:42', '2023-08-27 17:13:42'),
(59, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-667525C appointment reference', '', '', '', '', '/AppointmentController/show/18?', '2023-10-17 09:11:46', '2023-10-17 09:11:46'),
(60, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-667525C appointment reference', '', '', '', '', '/AppointmentController/show/18?', '2023-10-17 09:11:47', '2023-10-17 09:11:47'),
(61, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-417DD7F appointment reference', '', '', '', '', '/AppointmentController/show/19?', '2024-04-16 06:33:59', '2024-04-16 06:33:59'),
(62, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-417DD7F appointment reference', '', '', '', '', '/AppointmentController/show/19?', '2024-04-16 06:34:00', '2024-04-16 06:34:00'),
(63, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-F222400 appointment reference', '', '', '', '', '/AppointmentController/show/20?', '2024-04-16 06:36:22', '2024-04-16 06:36:22'),
(64, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-F222400 appointment reference', '', '', '', '', '/AppointmentController/show/20?', '2024-04-16 06:36:23', '2024-04-16 06:36:23'),
(65, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-FB98213 appointment reference', '', '', '', '', '/AppointmentController/show/21?', '2024-04-16 06:38:22', '2024-04-16 06:38:22'),
(66, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-FB98213 appointment reference', '', '', '', '', '/AppointmentController/show/21?', '2024-04-16 06:38:23', '2024-04-16 06:38:23'),
(67, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-4D3844D appointment reference', '', '', '', '', '/AppointmentController/show/22?', '2024-04-16 07:25:13', '2024-04-16 07:25:13'),
(68, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-4D3844D appointment reference', '', '', '', '', '/AppointmentController/show/22?', '2024-04-16 07:25:14', '2024-04-16 07:25:14'),
(69, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-F87B140 appointment reference', '', '', '', '', '/AppointmentController/show/23?', '2024-04-16 10:02:40', '2024-04-16 10:02:40'),
(70, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-F87B140 appointment reference', '', '', '', '', '/AppointmentController/show/23?', '2024-04-16 10:02:41', '2024-04-16 10:02:41'),
(71, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-A18BA63 appointment reference', '', '', '', '', '/AppointmentController/show/24?', '2024-04-16 10:05:20', '2024-04-16 10:05:20'),
(72, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-A18BA63 appointment reference', '', '', '', '', '/AppointmentController/show/24?', '2024-04-16 10:05:21', '2024-04-16 10:05:21'),
(73, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-69BE3A6 appointment reference', '', '', '', '', '/AppointmentController/show/25?', '2024-04-16 11:13:53', '2024-04-16 11:13:53'),
(74, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-69BE3A6 appointment reference', '', '', '', '', '/AppointmentController/show/25?', '2024-04-16 11:13:54', '2024-04-16 11:13:54'),
(75, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-F24E61B appointment reference', '', '', '', '', '/AppointmentController/show/26?', '2024-04-16 11:31:14', '2024-04-16 11:31:14'),
(76, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-F24E61B appointment reference', '', '', '', '', '/AppointmentController/show/26?', '2024-04-16 11:31:15', '2024-04-16 11:31:15'),
(77, 'DRA/DR.  . started a session with you', '', '', '', '', '/SessionController/show/12?', '2024-04-16 11:48:21', '2024-04-16 11:48:21'),
(78, ' \'DRA/DR. \'.John  started a session with Jade Dela Cruz', '', '', '', '', '/SessionController/show/12?', '2024-04-16 11:48:21', '2024-04-16 11:48:21'),
(79, 'Category Contact Lenses has been created', '', '', '', '', '', '2024-04-30 03:23:52', '2024-04-30 03:23:52'),
(80, 'Category Contact Lenses has been created', '', '', '', '', '', '2024-04-30 03:24:22', '2024-04-30 03:24:22'),
(81, 'admin added a service Belcon 60% UV Lite 6 Months | 2pcs | Contact Lenses', '', '', '', '', '', '2024-04-30 03:27:24', '2024-04-30 03:27:24'),
(82, 'admin added a service Belcon 60% UV Lite Astigmatism/Toric 6 Months | 2pcs | Contact Lenses', '', '', '', '', '', '2024-04-30 03:34:22', '2024-04-30 03:34:22'),
(83, 'admin added a service Belcon 60% Comfort 6 Months | 2pcs | Contact Lenses', '', '', '', '', '', '2024-04-30 03:37:27', '2024-04-30 03:37:27'),
(84, 'admin added a service Belcon 60% Comfort Astigmatism/Toric 6 Months | 2pcs | Contact Lenses', '', '', '', '', '', '2024-04-30 03:40:15', '2024-04-30 03:40:15'),
(85, 'admin added a service Cellufresh MD Lubricant Eye Drops 15ml', '', '', '', '', '', '2024-04-30 03:42:43', '2024-04-30 03:42:43'),
(86, 'admin added a service Acuvue Oasys 6’s per Box Contact Lens', '', '', '', '', '', '2024-04-30 03:45:10', '2024-04-30 03:45:10'),
(87, 'admin added a service All Comfort Formula 500ml FREE CONTACT LENS CASE', '', '', '', '', '', '2024-04-30 03:47:17', '2024-04-30 03:47:17'),
(88, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-CC4A909 appointment reference', '', '', '', '', '/AppointmentController/show/27?', '2024-04-30 03:51:51', '2024-04-30 03:51:51'),
(89, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-CC4A909 appointment reference', '', '', '', '', '/AppointmentController/show/27?', '2024-04-30 03:51:52', '2024-04-30 03:51:52'),
(90, 'admin added a service Air Optix Hydraglyde for Astigmatism Contact Lens', '', '', '', '', '', '2024-05-01 01:21:20', '2024-05-01 01:21:20'),
(91, 'admin added a service Air Optix Colors Breathable Contact Lens 2’s per Box| Color Pure Hazel', '', '', '', '', '', '2024-05-01 01:27:43', '2024-05-01 01:27:43'),
(92, 'admin added a service Air Optix Colors Breathable Contact Lens 2’s per Box| Color Brown', '', '', '', '', '', '2024-05-01 01:38:45', '2024-05-01 01:38:45'),
(93, 'admin added a service Air Optix Colors Breathable Contact Lens 2’s per Box| Color Gray', '', '', '', '', '', '2024-05-01 01:41:32', '2024-05-01 01:41:32'),
(94, 'admin added a service Beautiful Eye Non-Graded Colored Contact Lens Black', '', '', '', '', '', '2024-05-01 01:50:13', '2024-05-01 01:50:13'),
(95, 'admin added a service Beautiful Eye Non-Graded Colored Contact Lens  Brown', '', '', '', '', '', '2024-05-01 01:52:54', '2024-05-01 01:52:54'),
(96, 'admin added a service Freshlook Illuminate Daily Non-Graded Contact Lens Diamon Black', '', '', '', '', '', '2024-05-01 01:56:44', '2024-05-01 01:56:44'),
(97, 'admin added a service Freshlook Illuminate Daily Contact Lens Espresso Gold', '', '', '', '', '', '2024-05-01 02:01:42', '2024-05-01 02:01:42'),
(98, 'admin added a service See Clear Color Contact Lens GRAY', '', '', '', '', '', '2024-05-01 02:05:49', '2024-05-01 02:05:49'),
(99, 'admin added a service See Clear Color Contact Lens - BROWN', '', '', '', '', '', '2024-05-01 02:08:16', '2024-05-01 02:08:16'),
(100, 'admin added a service See Clear Color Contact Lens - BLUE', '', '', '', '', '', '2024-05-01 02:10:57', '2024-05-01 02:10:57'),
(101, 'admin added a service See Clear Color Contact Lens - GREEN', '', '', '', '', '', '2024-05-01 02:12:56', '2024-05-01 02:12:56'),
(102, 'admin added a service See Clear Color Contact Lens - VIOLET', '', '', '', '', '', '2024-05-01 02:15:05', '2024-05-01 02:15:05'),
(103, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-A85C641 appointment reference', '', '', '', '', '/AppointmentController/show/28?', '2024-05-18 06:32:53', '2024-05-18 06:32:53'),
(104, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-A85C641 appointment reference', '', '', '', '', '/AppointmentController/show/28?', '2024-05-18 06:35:03', '2024-05-18 06:35:03'),
(105, 'DRA/DR.  . started a session with you', '', '', '', '', '/SessionController/show/13?', '2024-05-18 06:37:08', '2024-05-18 06:37:08'),
(106, ' \'DRA/DR. \'.Thorsten started a session with mannypaquiao', '', '', '', '', '/SessionController/show/13?', '2024-05-18 06:39:16', '2024-05-18 06:39:16'),
(107, 'admin added a service Sample Product ', '', '', '', '', '', '2024-05-18 07:08:08', '2024-05-18 07:08:08'),
(108, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-D5F73B3 appointment reference', '', '', '', '', '/AppointmentController/show/29?', '2024-05-18 08:13:53', '2024-05-18 08:13:53'),
(109, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-D5F73B3 appointment reference', '', '', '', '', '/AppointmentController/show/29?', '2024-05-18 08:16:05', '2024-05-18 08:16:05'),
(110, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-D62B87E appointment reference', '', '', '', '', '/AppointmentController/show/30?', '2024-05-18 08:19:59', '2024-05-18 08:19:59'),
(111, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-D62B87E appointment reference', '', '', '', '', '/AppointmentController/show/30?', '2024-05-18 08:22:10', '2024-05-18 08:22:10'),
(112, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-13C705D appointment reference', '', '', '', '', '/AppointmentController/show/31?', '2024-05-20 06:19:55', '2024-05-20 06:19:55'),
(113, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-13C705D appointment reference', '', '', '', '', '/AppointmentController/show/31?', '2024-05-20 06:22:06', '2024-05-20 06:22:06'),
(114, 'DRA/DR.  . started a session with you', '', '', '', '', '/SessionController/show/14?', '2024-05-20 06:26:06', '2024-05-20 06:26:06'),
(115, ' \'DRA/DR. \'.Danica Mae started a session with JoeRogan', '', '', '', '', '/SessionController/show/14?', '2024-05-20 06:28:18', '2024-05-20 06:28:18'),
(116, 'DRA/DR.  . started a session with you', '', '', '', '', '/SessionController/show/15?', '2024-05-20 06:28:18', '2024-05-20 06:28:18'),
(117, ' \'DRA/DR. \'.Danica Mae started a session with JoeRogan', '', '', '', '', '/SessionController/show/15?', '2024-05-20 06:30:29', '2024-05-20 06:30:29'),
(118, 'DRA/DR.  . started a session with you', '', '', '', '', '/SessionController/show/16?', '2024-05-20 06:30:29', '2024-05-20 06:30:29'),
(119, ' \'DRA/DR. \'.Danica Mae started a session with JoeRogan', '', '', '', '', '/SessionController/show/16?', '2024-05-20 06:32:40', '2024-05-20 06:32:40'),
(120, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-4A73DF5 appointment reference', '', '', '', '', '/AppointmentController/show/32?', '2024-05-21 06:16:58', '2024-05-21 06:16:58'),
(121, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-4A73DF5 appointment reference', '', '', '', '', '/AppointmentController/show/32?', '2024-05-21 06:19:11', '2024-05-21 06:19:11'),
(122, 'DRA/DR.  . started a session with you', '', '', '', '', '/SessionController/show/17?', '2024-05-21 13:21:32', '2024-05-21 13:21:32'),
(123, ' \'DRA/DR. \'.Danica Mae started a session with  Jade Marie Dela Cruz', '', '', '', '', '/SessionController/show/17?', '2024-05-21 13:23:42', '2024-05-21 13:23:42'),
(124, 'DRA/DR.  . started a session with you', '', '', '', '', '/SessionController/show/18?', '2024-05-21 13:28:02', '2024-05-21 13:28:02'),
(125, ' \'DRA/DR. \'.Danica Mae started a session with  Jade Marie Dela Cruz', '', '', '', '', '/SessionController/show/18?', '2024-05-21 13:30:11', '2024-05-21 13:30:11'),
(126, 'DRA/DR.  . started a session with you', '', '', '', '', '/SessionController/show/19?', '2024-05-22 01:17:47', '2024-05-22 01:17:47'),
(127, ' \'DRA/DR. \'.Danica Mae started a session with  Jade Marie Dela Cruz', '', '', '', '', '/SessionController/show/19?', '2024-05-22 01:17:47', '2024-05-22 01:17:47'),
(128, 'DRA/DR.  . started a session with you', '', '', '', '', '/SessionController/show/20?', '2024-05-22 01:20:32', '2024-05-22 01:20:32'),
(129, ' \'DRA/DR. \'.Tom started a session with Jade Marie D. Dela Cruz', '', '', '', '', '/SessionController/show/20?', '2024-05-22 01:22:41', '2024-05-22 01:22:41'),
(130, 'DRA/DR.  . started a session with you', '', '', '', '', '/SessionController/show/21?', '2024-05-24 05:27:31', '2024-05-24 05:27:31'),
(131, ' \'DRA/DR. \'.Danica Mae started a session with Jade Dela Cruz', '', '', '', '', '/SessionController/show/21?', '2024-05-24 05:27:31', '2024-05-24 05:27:31'),
(132, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-8DC82DC appointment reference', '', '', '', '', '/AppointmentController/show/33?', '2024-06-04 11:34:35', '2024-06-04 11:34:35'),
(133, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-8DC82DC appointment reference', '', '', '', '', '/AppointmentController/show/33?', '2024-06-04 11:34:36', '2024-06-04 11:34:36'),
(134, 'Category Frames has been created', '', '', '', '', '', '2024-06-04 12:14:06', '2024-06-04 12:14:06'),
(135, 'admin added a service Verra  Y2K glasess', '', '', '', '', '', '2024-06-04 12:40:27', '2024-06-04 12:40:27'),
(136, 'admin added a service Ceroflex', '', '', '', '', '', '2024-06-04 12:50:23', '2024-06-04 12:50:23'),
(137, 'admin added a service MOSO', '', '', '', '', '', '2024-06-04 13:12:26', '2024-06-04 13:12:26'),
(138, 'admin added a service Urbane', '', '', '', '', '', '2024-06-04 13:17:42', '2024-06-04 13:17:42'),
(139, 'admin added a service BELLE BELLE', '', '', '', '', '', '2024-06-04 13:25:28', '2024-06-04 13:25:28'),
(140, 'admin added a service OVALLE', '', '', '', '', '', '2024-06-04 13:27:23', '2024-06-04 13:27:23'),
(141, 'admin added a service PRII', '', '', '', '', '', '2024-06-04 13:32:21', '2024-06-04 13:32:21'),
(142, 'admin added a service LEOPARD', '', '', '', '', '', '2024-06-04 13:36:49', '2024-06-04 13:36:49'),
(143, 'admin added a service VERVE', '', '', '', '', '', '2024-06-04 13:40:49', '2024-06-04 13:40:49'),
(144, 'admin added a service BASICC', '', '', '', '', '', '2024-06-04 13:44:31', '2024-06-04 13:44:31'),
(145, 'admin added a service AIR', '', '', '', '', '', '2024-06-04 13:47:38', '2024-06-04 13:47:38'),
(146, 'admin added a service RETRA', '', '', '', '', '', '2024-06-04 13:52:33', '2024-06-04 13:52:33'),
(147, 'admin added a service PETITE PRO', '', '', '', '', '', '2024-06-04 13:55:53', '2024-06-04 13:55:53'),
(148, 'admin added a service ALL IN', '', '', '', '', '', '2024-06-04 14:04:13', '2024-06-04 14:04:13'),
(149, 'admin added a service APART', '', '', '', '', '', '2024-06-04 14:07:40', '2024-06-04 14:07:40'),
(150, 'admin added a service CAT EYE ', '', '', '', '', '', '2024-06-04 14:12:56', '2024-06-04 14:12:56'),
(151, 'admin added a service PATTERN', '', '', '', '', '', '2024-06-04 16:31:24', '2024-06-04 16:31:24'),
(152, 'admin added a service POLAXPUS', '', '', '', '', '', '2024-06-04 16:34:46', '2024-06-04 16:34:46'),
(153, 'admin added a service QUIRKY', '', '', '', '', '', '2024-06-04 16:37:31', '2024-06-04 16:37:31'),
(154, 'DRA/DR.  . started a session with you', '', '', '', '', '/SessionController/show/22?', '2024-06-04 18:25:03', '2024-06-04 18:25:03'),
(155, ' \'DRA/DR. \'.Danica Mae started a session with JogratDeguzman', '', '', '', '', '/SessionController/show/22?', '2024-06-04 18:25:03', '2024-06-04 18:25:03'),
(156, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-59327E8 appointment reference', '', '', '', '', '/AppointmentController/show/34?', '2024-06-04 18:41:06', '2024-06-04 18:41:06'),
(157, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-59327E8 appointment reference', '', '', '', '', '/AppointmentController/show/34?', '2024-06-04 18:41:08', '2024-06-04 18:41:08'),
(158, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-EF0F34B appointment reference', '', '', '', '', '/AppointmentController/show/35?', '2024-06-04 22:06:34', '2024-06-04 22:06:34'),
(159, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-EF0F34B appointment reference', '', '', '', '', '/AppointmentController/show/35?', '2024-06-04 22:06:35', '2024-06-04 22:06:35'),
(160, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-EEA6C69 appointment reference', '', '', '', '', '/AppointmentController/show/36?', '2024-06-04 22:13:50', '2024-06-04 22:13:50'),
(161, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-EEA6C69 appointment reference', '', '', '', '', '/AppointmentController/show/36?', '2024-06-04 22:13:51', '2024-06-04 22:13:51'),
(162, 'John added a service Sample Product 101', '', '', '', '', '', '2024-06-08 17:25:39', '2024-06-08 17:25:39'),
(163, 'DRA/DR.  . started a session with you', '', '', '', '', '/SessionController/show/23?', '2024-06-08 17:59:34', '2024-06-08 17:59:34'),
(164, ' \'DRA/DR. \'.John started a session with Wilma, Reyes', '', '', '', '', '/SessionController/show/23?', '2024-06-08 17:59:34', '2024-06-08 17:59:34'),
(165, 'DRA/DR.  . started a session with you', '', '', '', '', '/SessionController/show/24?', '2024-06-08 18:21:09', '2024-06-08 18:21:09'),
(166, ' \'DRA/DR. \'.Tom started a session with Johnace  Rosales', '', '', '', '', '/SessionController/show/24?', '2024-06-08 18:21:10', '2024-06-08 18:21:10'),
(167, 'DRA/DR.  . started a session with you', '', '', '', '', '/SessionController/show/25?', '2024-06-08 18:24:29', '2024-06-08 18:24:29'),
(168, ' \'DRA/DR. \'.John started a session with Ace Rosales', '', '', '', '', '/SessionController/show/25?', '2024-06-08 18:24:30', '2024-06-08 18:24:30'),
(169, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-FA922FB appointment reference', '', '', '', '', '/AppointmentController/show/37?', '2024-06-10 17:26:27', '2024-06-10 17:26:27'),
(170, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-FA922FB appointment reference', '', '', '', '', '/AppointmentController/show/37?', '2024-06-10 17:26:28', '2024-06-10 17:26:28'),
(171, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-6E86B91 appointment reference', '', '', '', '', '/AppointmentController/show/38?', '2024-06-10 17:27:54', '2024-06-10 17:27:54'),
(172, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-6E86B91 appointment reference', '', '', '', '', '/AppointmentController/show/38?', '2024-06-10 17:27:55', '2024-06-10 17:27:55'),
(173, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-5D35A37 appointment reference', '', '', '', '', '/AppointmentController/show/39?', '2024-06-10 17:55:06', '2024-06-10 17:55:06'),
(174, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-5D35A37 appointment reference', '', '', '', '', '/AppointmentController/show/39?', '2024-06-10 17:55:07', '2024-06-10 17:55:07'),
(175, 'DRA/DR.  . started a session with you', '', '', '', '', '/SessionController/show/26?', '2024-06-10 17:57:00', '2024-06-10 17:57:00'),
(176, ' \'DRA/DR. \'.John started a session with Ace Rosales', '', '', '', '', '/SessionController/show/26?', '2024-06-10 17:57:00', '2024-06-10 17:57:00'),
(177, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-625E594 appointment reference', '', '', '', '', '/AppointmentController/show/40?', '2024-06-11 03:03:03', '2024-06-11 03:03:03'),
(178, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-625E594 appointment reference', '', '', '', '', '/AppointmentController/show/40?', '2024-06-11 03:03:04', '2024-06-11 03:03:04'),
(179, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-BEC140A appointment reference', '', '', '', '', '/AppointmentController/show/41?', '2024-06-11 03:04:42', '2024-06-11 03:04:42'),
(180, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-BEC140A appointment reference', '', '', '', '', '/AppointmentController/show/41?', '2024-06-11 03:04:43', '2024-06-11 03:04:43'),
(181, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-22EE8EE appointment reference', '', '', '', '', '/AppointmentController/show/42?', '2024-06-11 03:14:09', '2024-06-11 03:14:09'),
(182, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-22EE8EE appointment reference', '', '', '', '', '/AppointmentController/show/42?', '2024-06-11 03:14:10', '2024-06-11 03:14:10'),
(183, 'DRA/DR.  . started a session with you', '', '', '', '', '/SessionController/show/27?', '2024-06-11 03:16:14', '2024-06-11 03:16:14'),
(184, ' \'DRA/DR. \'.JR started a session with Erlynda  Mariano ', '', '', '', '', '/SessionController/show/27?', '2024-06-11 03:16:14', '2024-06-11 03:16:14'),
(185, 'DRA/DR.  . started a session with you', '', '', '', '', '/SessionController/show/28?', '2024-06-11 03:18:44', '2024-06-11 03:18:44'),
(186, ' \'DRA/DR. \'.JR started a session with Erlynda  Mariano', '', '', '', '', '/SessionController/show/28?', '2024-06-11 03:18:45', '2024-06-11 03:18:45'),
(187, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-4A14685 appointment reference', '', '', '', '', '/AppointmentController/show/43?', '2024-06-11 08:12:55', '2024-06-11 08:12:55'),
(188, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-4A14685 appointment reference', '', '', '', '', '/AppointmentController/show/43?', '2024-06-11 08:12:56', '2024-06-11 08:12:56'),
(189, 'DRA/DR.  . started a session with you', '', '', '', '', '/SessionController/show/29?', '2024-06-11 08:15:47', '2024-06-11 08:15:47'),
(190, ' \'DRA/DR. \'.JR started a session with ABCD ABCDD', '', '', '', '', '/SessionController/show/29?', '2024-06-11 08:15:47', '2024-06-11 08:15:47'),
(191, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-AA60539 appointment reference', '', '', '', '', '/AppointmentController/show/44?', '2024-06-11 08:19:21', '2024-06-11 08:19:21'),
(192, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-AA60539 appointment reference', '', '', '', '', '/AppointmentController/show/44?', '2024-06-11 08:19:22', '2024-06-11 08:19:22'),
(193, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-42C9BA7 appointment reference', '', '', '', '', '/AppointmentController/show/45?', '2024-06-11 08:20:43', '2024-06-11 08:20:43'),
(194, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-42C9BA7 appointment reference', '', '', '', '', '/AppointmentController/show/45?', '2024-06-11 08:20:44', '2024-06-11 08:20:44'),
(195, 'ADMINISTRATOR added a service abc', '', '', '', '', '', '2024-06-11 08:25:45', '2024-06-11 08:25:45'),
(196, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-7889B35 appointment reference', '', '', '', '', '/AppointmentController/show/46?', '2024-06-11 08:31:16', '2024-06-11 08:31:16'),
(197, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-7889B35 appointment reference', '', '', '', '', '/AppointmentController/show/46?', '2024-06-11 08:31:17', '2024-06-11 08:31:17'),
(198, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-D2955A2 appointment reference', '', '', '', '', '/AppointmentController/show/47?', '2024-06-13 08:35:45', '2024-06-13 08:35:45'),
(199, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-D2955A2 appointment reference', '', '', '', '', '/AppointmentController/show/47?', '2024-06-13 08:35:46', '2024-06-13 08:35:46'),
(200, 'DRA/DR.  . started a session with you', '', '', '', '', '/SessionController/show/30?', '2024-06-13 08:40:22', '2024-06-13 08:40:22'),
(201, ' \'DRA/DR. \'.JR started a session with Jade Marie Dela Cruz', '', '', '', '', '/SessionController/show/30?', '2024-06-13 08:40:22', '2024-06-13 08:40:22'),
(202, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-9B09B7D appointment reference', '', '', '', '', '/AppointmentController/show/48?', '2024-06-13 09:36:29', '2024-06-13 09:36:29'),
(203, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-9B09B7D appointment reference', '', '', '', '', '/AppointmentController/show/48?', '2024-06-13 09:36:30', '2024-06-13 09:36:30'),
(204, 'DRA/DR.  . started a session with you', '', '', '', '', '/SessionController/show/31?', '2024-06-13 09:41:58', '2024-06-13 09:41:58'),
(205, ' \'DRA/DR. \'.Danica Mae started a session with  Jade Marie Dela Cruz', '', '', '', '', '/SessionController/show/31?', '2024-06-13 09:41:58', '2024-06-13 09:41:58'),
(206, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-D2A5332 appointment reference', '', '', '', '', '/AppointmentController/show/49?', '2024-06-13 09:45:06', '2024-06-13 09:45:06'),
(207, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-D2A5332 appointment reference', '', '', '', '', '/AppointmentController/show/49?', '2024-06-13 09:45:07', '2024-06-13 09:45:07'),
(208, 'DRA/DR.  . started a session with you', '', '', '', '', '/SessionController/show/32?', '2024-06-13 09:46:20', '2024-06-13 09:46:20'),
(209, ' \'DRA/DR. \'.Danica Mae started a session with Jade Marie Dela Cruz', '', '', '', '', '/SessionController/show/32?', '2024-06-13 09:46:20', '2024-06-13 09:46:20'),
(210, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-2C83CC0 appointment reference', '', '', '', '', '/AppointmentController/show/50?', '2024-06-23 04:20:36', '2024-06-23 04:20:36'),
(211, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-2C83CC0 appointment reference', '', '', '', '', '/AppointmentController/show/50?', '2024-06-23 04:20:36', '2024-06-23 04:20:36'),
(212, 'DRA/DR.  . started a session with you', '', '', '', '', '/SessionController/show/33?', '2024-06-23 04:24:49', '2024-06-23 04:24:49'),
(213, ' \'DRA/DR. \'.Abc started a session with Cherry Dela Cruz', '', '', '', '', '/SessionController/show/33?', '2024-06-23 04:24:49', '2024-06-23 04:24:49'),
(214, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-A1C74A2 appointment reference', '', '', '', '', '/AppointmentController/show/51?', '2024-07-09 13:51:01', '2024-07-09 13:51:01'),
(215, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-A1C74A2 appointment reference', '', '', '', '', '/AppointmentController/show/51?', '2024-07-09 13:51:02', '2024-07-09 13:51:02'),
(216, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-FD87BAA appointment reference', '', '', '', '', '/AppointmentController/show/52?', '2024-07-09 13:51:42', '2024-07-09 13:51:42'),
(217, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-FD87BAA appointment reference', '', '', '', '', '/AppointmentController/show/52?', '2024-07-09 13:51:43', '2024-07-09 13:51:43'),
(218, 'DRA/DR.  . started a session with you', '', '', '', '', '/SessionController/show/34?', '2024-07-09 13:54:12', '2024-07-09 13:54:12'),
(219, ' \'DRA/DR. \'.Danica Mae started a session with Jade Marie Dela Cruz', '', '', '', '', '/SessionController/show/34?', '2024-07-09 13:54:12', '2024-07-09 13:54:12'),
(220, 'DRA/DR.  . started a session with you', '', '', '', '', '/SessionController/show/35?', '2024-07-09 13:55:28', '2024-07-09 13:55:28'),
(221, ' \'DRA/DR. \'.Danica Mae started a session with Jade Marie Dela Cruz', '', '', '', '', '/SessionController/show/35?', '2024-07-09 13:55:28', '2024-07-09 13:55:28'),
(222, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-AA830A0 appointment reference', '', '', '', '', '/AppointmentController/show/53?', '2024-07-14 18:40:20', '2024-07-14 18:40:20'),
(223, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-AA830A0 appointment reference', '', '', '', '', '/AppointmentController/show/53?', '2024-07-14 18:40:20', '2024-07-14 18:40:20'),
(224, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-C4358CE appointment reference', '', '', '', '', '/AppointmentController/show/54?', '2024-07-14 18:53:11', '2024-07-14 18:53:11'),
(225, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-C4358CE appointment reference', '', '', '', '', '/AppointmentController/show/54?', '2024-07-14 18:53:11', '2024-07-14 18:53:11'),
(226, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-21B63DC appointment reference', '', '', '', '', '/AppointmentController/show/55?', '2024-07-15 07:11:56', '2024-07-15 07:11:56'),
(227, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-21B63DC appointment reference', '', '', '', '', '/AppointmentController/show/55?', '2024-07-15 07:11:56', '2024-07-15 07:11:56'),
(228, 'DRA/DR. Danica Mae . started a session with you', '', '', '', '', '/SessionController/show/36?', '2024-07-15 07:13:48', '2024-07-15 07:13:48'),
(229, ' \'DRA/DR. \'.Danica Mae started a session with Jade Marie Dela Cruz', '', '', '', '', '/SessionController/show/36?', '2024-07-15 07:13:48', '2024-07-15 07:13:48'),
(230, 'DRA/DR. Danica Mae . started a session with you', '', '', '', '', '/SessionController/show/37?', '2024-07-23 15:36:54', '2024-07-23 15:36:54'),
(231, ' \'DRA/DR. \'.Danica Mae started a session with  Jade Marie Dela Cruz', '', '', '', '', '/SessionController/show/37?', '2024-07-23 15:36:55', '2024-07-23 15:36:55'),
(232, 'DRA/DR. Danica Mae . started a session with you', '', '', '', '', '/SessionController/show/38?', '2024-07-23 15:37:32', '2024-07-23 15:37:32'),
(233, ' \'DRA/DR. \'.Danica Mae started a session with Mark Angelo Gonzales', '', '', '', '', '/SessionController/show/38?', '2024-07-23 15:37:33', '2024-07-23 15:37:33'),
(234, 'DRA/DR. Danica Mae . started a session with you', '', '', '', '', '/SessionController/show/39?', '2024-07-23 15:39:06', '2024-07-23 15:39:06'),
(235, ' \'DRA/DR. \'.Danica Mae started a session with Jade Marie Dela Cruz', '', '', '', '', '/SessionController/show/39?', '2024-07-23 15:39:07', '2024-07-23 15:39:07'),
(236, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-11E847D appointment reference', '', '', '', '', '/AppointmentController/show/56?', '2024-07-23 15:44:58', '2024-07-23 15:44:58'),
(237, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-11E847D appointment reference', '', '', '', '', '/AppointmentController/show/56?', '2024-07-23 15:44:59', '2024-07-23 15:44:59'),
(238, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-2A324DE appointment reference', '', '', '', '', '/AppointmentController/show/57?', '2024-07-23 15:48:19', '2024-07-23 15:48:19'),
(239, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-2A324DE appointment reference', '', '', '', '', '/AppointmentController/show/57?', '2024-07-23 15:48:19', '2024-07-23 15:48:19'),
(240, 'DRA/DR. Danica Mae . started a session with you', '', '', '', '', '/SessionController/show/40?', '2024-07-23 15:51:46', '2024-07-23 15:51:46'),
(241, ' \'DRA/DR. \'.Danica Mae started a session with tester solo', '', '', '', '', '/SessionController/show/40?', '2024-07-23 15:51:46', '2024-07-23 15:51:46'),
(242, 'DRA/DR. Danica Mae . started a session with you', '', '', '', '', '/SessionController/show/41?', '2024-07-23 15:55:34', '2024-07-23 15:55:34'),
(243, ' \'DRA/DR. \'.Danica Mae started a session with Jade Marie Dela Cruz', '', '', '', '', '/SessionController/show/41?', '2024-07-23 15:55:34', '2024-07-23 15:55:34'),
(244, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-5F4E4E9 appointment reference', '', '', '', '', '/AppointmentController/show/58?', '2024-07-23 16:10:22', '2024-07-23 16:10:22'),
(245, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-5F4E4E9 appointment reference', '', '', '', '', '/AppointmentController/show/58?', '2024-07-23 16:10:23', '2024-07-23 16:10:23'),
(246, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-E5AFDA4 appointment reference', '', '', '', '', '/AppointmentController/show/59?', '2024-07-23 16:11:25', '2024-07-23 16:11:25'),
(247, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-E5AFDA4 appointment reference', '', '', '', '', '/AppointmentController/show/59?', '2024-07-23 16:11:26', '2024-07-23 16:11:26'),
(248, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-7200CAE appointment reference', '', '', '', '', '/AppointmentController/show/60?', '2024-07-23 16:16:17', '2024-07-23 16:16:17'),
(249, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-7200CAE appointment reference', '', '', '', '', '/AppointmentController/show/60?', '2024-07-23 16:16:17', '2024-07-23 16:16:17'),
(250, 'DRA/DR. Abc . started a session with you', '', '', '', '', '/SessionController/show/42?', '2024-07-28 14:03:56', '2024-07-28 14:03:56'),
(251, ' \'DRA/DR. \'.Abc started a session with Jade Marie Dela Cruz', '', '', '', '', '/SessionController/show/42?', '2024-07-28 14:03:57', '2024-07-28 14:03:57'),
(252, 'DRA/DR. Abc . started a session with you', '', '', '', '', '/SessionController/show/43?', '2024-07-28 14:04:15', '2024-07-28 14:04:15'),
(253, ' \'DRA/DR. \'.Abc started a session with Jade Marie Dela Cruz', '', '', '', '', '/SessionController/show/43?', '2024-07-28 14:04:15', '2024-07-28 14:04:15'),
(254, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-8B3BD87 appointment reference', '', '', '', '', '/AppointmentController/show/61?', '2024-07-28 14:08:02', '2024-07-28 14:08:02'),
(255, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-8B3BD87 appointment reference', '', '', '', '', '/AppointmentController/show/61?', '2024-07-28 14:08:03', '2024-07-28 14:08:03'),
(256, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-059E31C appointment reference', '', '', '', '', '/AppointmentController/show/62?', '2024-07-28 14:12:11', '2024-07-28 14:12:11'),
(257, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-059E31C appointment reference', '', '', '', '', '/AppointmentController/show/62?', '2024-07-28 14:12:12', '2024-07-28 14:12:12'),
(258, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-72A6A3C appointment reference', '', '', '', '', '/AppointmentController/show/63?', '2024-07-28 14:13:32', '2024-07-28 14:13:32'),
(259, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-72A6A3C appointment reference', '', '', '', '', '/AppointmentController/show/63?', '2024-07-28 14:13:33', '2024-07-28 14:13:33'),
(260, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-D88E1F6 appointment reference', '', '', '', '', '/AppointmentController/show/64?', '2024-07-28 14:15:32', '2024-07-28 14:15:32'),
(261, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-D88E1F6 appointment reference', '', '', '', '', '/AppointmentController/show/64?', '2024-07-28 14:15:32', '2024-07-28 14:15:32'),
(262, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-A1AB9F4 appointment reference', '', '', '', '', '/AppointmentController/show/65?', '2024-07-28 14:16:56', '2024-07-28 14:16:56'),
(263, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-A1AB9F4 appointment reference', '', '', '', '', '/AppointmentController/show/65?', '2024-07-28 14:16:56', '2024-07-28 14:16:56'),
(264, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-381ACD4 appointment reference', '', '', '', '', '/AppointmentController/show/66?', '2024-07-29 02:16:48', '2024-07-29 02:16:48'),
(265, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-381ACD4 appointment reference', '', '', '', '', '/AppointmentController/show/66?', '2024-07-29 02:16:49', '2024-07-29 02:16:49'),
(266, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-15F98F6 appointment reference', '', '', '', '', '/AppointmentController/show/67?', '2024-07-29 02:18:08', '2024-07-29 02:18:08'),
(267, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-15F98F6 appointment reference', '', '', '', '', '/AppointmentController/show/67?', '2024-07-29 02:18:09', '2024-07-29 02:18:09'),
(268, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-BAAFD5E appointment reference', '', '', '', '', '/AppointmentController/show/68?', '2024-07-29 02:23:09', '2024-07-29 02:23:09'),
(269, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-BAAFD5E appointment reference', '', '', '', '', '/AppointmentController/show/68?', '2024-07-29 02:23:09', '2024-07-29 02:23:09'),
(270, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-A68AAE5 appointment reference', '', '', '', '', '/AppointmentController/show/69?', '2024-07-29 02:24:29', '2024-07-29 02:24:29'),
(271, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-A68AAE5 appointment reference', '', '', '', '', '/AppointmentController/show/69?', '2024-07-29 02:24:29', '2024-07-29 02:24:29'),
(272, 'DRA/DR. Abc . started a session with you', '', '', '', '', '/SessionController/show/44?', '2024-07-29 05:59:37', '2024-07-29 05:59:37'),
(273, ' \'DRA/DR. \'.Abc started a session with Jade Marie Dela Cruz', '', '', '', '', '/SessionController/show/44?', '2024-07-29 05:59:38', '2024-07-29 05:59:38'),
(274, 'DRA/DR. Abc . started a session with you', '', '', '', '', '/SessionController/show/45?', '2024-07-30 06:53:50', '2024-07-30 06:53:50'),
(275, ' \'DRA/DR. \'.Abc started a session with Cherry Dela Cruz', '', '', '', '', '/SessionController/show/45?', '2024-07-30 06:53:51', '2024-07-30 06:53:51'),
(276, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-54231FC appointment reference', '', '', '', '', '/AppointmentController/show/70?', '2024-07-31 03:12:52', '2024-07-31 03:12:52'),
(277, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-54231FC appointment reference', '', '', '', '', '/AppointmentController/show/70?', '2024-07-31 03:12:53', '2024-07-31 03:12:53'),
(278, 'DRA/DR. Abc . started a session with you', '', '', '', '', '/SessionController/show/46?', '2024-07-31 03:16:49', '2024-07-31 03:16:49'),
(279, ' \'DRA/DR. \'.Abc started a session with Johnace Rosales', '', '', '', '', '/SessionController/show/46?', '2024-07-31 03:16:49', '2024-07-31 03:16:49'),
(280, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-B0489DB appointment reference', '', '', '', '', '/AppointmentController/show/71?', '2024-07-31 03:22:26', '2024-07-31 03:22:26'),
(281, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-B0489DB appointment reference', '', '', '', '', '/AppointmentController/show/71?', '2024-07-31 03:22:27', '2024-07-31 03:22:27'),
(282, 'DRA/DR. Abc . started a session with you', '', '', '', '', '/SessionController/show/47?', '2024-07-31 03:24:02', '2024-07-31 03:24:02'),
(283, ' \'DRA/DR. \'.Abc started a session with Johnace Rosales', '', '', '', '', '/SessionController/show/47?', '2024-07-31 03:24:03', '2024-07-31 03:24:03'),
(284, 'DRA/DR. Abc . started a session with you', '', '', '', '', '/SessionController/show/48?', '2024-07-31 03:26:06', '2024-07-31 03:26:06'),
(285, ' \'DRA/DR. \'.Abc started a session with Johnace Rosales', '', '', '', '', '/SessionController/show/48?', '2024-07-31 03:26:06', '2024-07-31 03:26:06'),
(286, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-EB23897 appointment reference', '', '', '', '', '/AppointmentController/show/72?', '2024-07-31 03:30:59', '2024-07-31 03:30:59'),
(287, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-EB23897 appointment reference', '', '', '', '', '/AppointmentController/show/72?', '2024-07-31 03:30:59', '2024-07-31 03:30:59'),
(288, 'DRA/DR. Abc . started a session with you', '', '', '', '', '/SessionController/show/49?', '2024-07-31 03:32:48', '2024-07-31 03:32:48'),
(289, ' \'DRA/DR. \'.Abc started a session with Johnace Rosales', '', '', '', '', '/SessionController/show/49?', '2024-07-31 03:32:49', '2024-07-31 03:32:49'),
(290, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-89E0F23 appointment reference', '', '', '', '', '/AppointmentController/show/73?', '2024-07-31 03:59:46', '2024-07-31 03:59:46'),
(291, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-89E0F23 appointment reference', '', '', '', '', '/AppointmentController/show/73?', '2024-07-31 03:59:46', '2024-07-31 03:59:46'),
(292, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-D6DE20D appointment reference', '', '', '', '', '/AppointmentController/show/74?', '2024-08-05 17:50:44', '2024-08-05 17:50:44'),
(293, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-D6DE20D appointment reference', '', '', '', '', '/AppointmentController/show/74?', '2024-08-05 17:50:45', '2024-08-05 17:50:45'),
(294, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-539C865 appointment reference', '', '', '', '', '/AppointmentController/show/75?', '2024-08-05 17:52:17', '2024-08-05 17:52:17'),
(295, 'Appointment to Vivid Motion Optical Clinic is submitted .#APT-539C865 appointment reference', '', '', '', '', '/AppointmentController/show/75?', '2024-08-05 17:52:17', '2024-08-05 17:52:17'),
(296, 'DRA/DR. Danica Mae . started a session with you', '', '', '', '', '/SessionController/show/50?', '2024-08-05 19:13:25', '2024-08-05 19:13:25'),
(297, ' \'DRA/DR. \'.Danica Mae started a session with  ace', '', '', '', '', '/SessionController/show/50?', '2024-08-05 19:13:26', '2024-08-05 19:13:26'),
(298, 'DRA/DR. Danica Mae . started a session with you', '', '', '', '', '/SessionController/show/51?', '2024-08-05 19:14:28', '2024-08-05 19:14:28');
INSERT INTO `system_notifications` (`id`, `message`, `icon`, `color`, `heading`, `subtext`, `href`, `created_at`, `updated_at`) VALUES
(299, ' \'DRA/DR. \'.Danica Mae started a session with John Rosales', '', '', '', '', '/SessionController/show/51?', '2024-08-05 19:14:28', '2024-08-05 19:14:28'),
(300, 'DRA/DR. Abc . started a session with you', '', '', '', '', '/SessionController/show/52?', '2024-08-05 19:44:21', '2024-08-05 19:44:21'),
(301, ' \'DRA/DR. \'.Abc started a session with John Rosales', '', '', '', '', '/SessionController/show/52?', '2024-08-05 19:44:22', '2024-08-05 19:44:22'),
(302, 'DRA/DR. Jade . started a session with you', '', '', '', '', '/SessionController/show/53?', '2024-08-05 19:46:24', '2024-08-05 19:46:24'),
(303, ' \'DRA/DR. \'.Jade started a session with John Rosales', '', '', '', '', '/SessionController/show/53?', '2024-08-05 19:46:25', '2024-08-05 19:46:25'),
(304, 'DRA/DR. Abc . started a session with you', '', '', '', '', '/SessionController/show/54?', '2024-08-05 22:36:13', '2024-08-05 22:36:13'),
(305, ' \'DRA/DR. \'.Abc started a session with John Rosales', '', '', '', '', '/SessionController/show/54?', '2024-08-05 22:36:14', '2024-08-05 22:36:14');

-- --------------------------------------------------------

--
-- Table structure for table `system_notification_recipients`
--

DROP TABLE IF EXISTS `system_notification_recipients`;
CREATE TABLE `system_notification_recipients` (
  `id` int(10) NOT NULL,
  `notification_id` int(10) DEFAULT NULL,
  `recipient_id` int(10) DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT 0,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `system_notification_recipients`
--

INSERT INTO `system_notification_recipients` (`id`, `notification_id`, `recipient_id`, `is_read`, `updated_at`) VALUES
(1, 1, 4, 0, '2023-06-25 06:47:08'),
(2, 2, 4, 0, '2023-06-25 06:47:42'),
(3, 3, 4, 0, '2023-07-18 11:39:16'),
(4, 4, 4, 0, '2023-08-17 11:33:13'),
(5, 5, 4, 0, '2023-08-17 11:33:25'),
(6, 6, 4, 0, '2023-08-18 10:24:14'),
(7, 7, 0, 0, '2023-08-18 11:01:17'),
(8, 8, 4, 0, '2023-08-18 11:01:18'),
(9, 9, 4, 0, '2023-08-18 13:06:11'),
(10, 10, 0, 0, '2023-08-18 13:16:26'),
(11, 11, 4, 0, '2023-08-18 13:16:28'),
(12, 12, 0, 0, '2023-08-18 13:31:27'),
(13, 13, 4, 0, '2023-08-18 13:31:28'),
(14, 14, 0, 0, '2023-08-18 13:32:11'),
(15, 15, 4, 0, '2023-08-18 13:32:13'),
(16, 16, 4, 0, '2023-08-18 13:44:39'),
(17, 17, 0, 0, '2023-08-18 13:48:44'),
(18, 18, 4, 0, '2023-08-18 13:48:45'),
(19, 19, 4, 0, '2023-08-18 13:55:50'),
(20, 20, 4, 0, '2023-08-18 14:04:55'),
(21, 21, 56, 0, '2023-08-20 17:23:17'),
(22, 22, 4, 0, '2023-08-20 17:23:17'),
(23, 23, 56, 0, '2023-08-20 17:34:42'),
(24, 24, 4, 0, '2023-08-20 17:34:42'),
(25, 25, 56, 0, '2023-08-20 17:35:56'),
(26, 26, 4, 0, '2023-08-20 17:35:56'),
(27, 27, 56, 0, '2023-08-20 17:38:47'),
(28, 28, 4, 0, '2023-08-20 17:38:47'),
(29, 29, 56, 0, '2023-08-24 13:48:29'),
(30, 30, 4, 0, '2023-08-24 13:48:29'),
(31, 31, 4, 0, '2023-08-24 13:54:47'),
(32, 32, 4, 0, '2023-08-24 13:55:23'),
(33, 33, 56, 0, '2023-08-24 14:03:44'),
(34, 34, 4, 0, '2023-08-24 14:03:44'),
(35, 35, 0, 0, '2023-08-27 08:17:18'),
(36, 36, 4, 0, '2023-08-27 08:17:18'),
(37, 37, 0, 0, '2023-08-27 14:56:59'),
(38, 38, 4, 0, '2023-08-27 14:56:59'),
(39, 39, 0, 0, '2023-08-27 15:39:44'),
(40, 40, 4, 0, '2023-08-27 15:39:44'),
(41, 41, 65, 0, '2023-08-27 16:17:08'),
(42, 42, 4, 0, '2023-08-27 16:17:08'),
(43, 43, 0, 0, '2023-08-27 16:29:32'),
(44, 44, 4, 0, '2023-08-27 16:29:32'),
(45, 45, 50, 0, '2023-08-27 16:33:14'),
(46, 46, 4, 0, '2023-08-27 16:33:14'),
(47, 47, 0, 0, '2023-08-27 16:43:20'),
(48, 48, 4, 0, '2023-08-27 16:43:20'),
(49, 49, 0, 0, '2023-08-27 16:44:38'),
(50, 50, 4, 0, '2023-08-27 16:44:38'),
(51, 51, 0, 0, '2023-08-27 16:49:32'),
(52, 52, 4, 0, '2023-08-27 16:49:32'),
(53, 53, 0, 0, '2023-08-27 16:51:10'),
(54, 54, 4, 0, '2023-08-27 16:51:10'),
(55, 55, 4, 0, '2023-08-27 17:09:22'),
(56, 56, 4, 0, '2023-08-27 17:09:34'),
(57, 57, 4, 0, '2023-08-27 17:09:49'),
(58, 58, 4, 0, '2023-08-27 17:13:42'),
(59, 59, 0, 0, '2023-10-17 09:11:46'),
(60, 60, 4, 0, '2023-10-17 09:11:47'),
(61, 61, 67, 0, '2024-04-16 06:33:59'),
(62, 62, 4, 0, '2024-04-16 06:34:00'),
(63, 63, 67, 0, '2024-04-16 06:36:22'),
(64, 64, 4, 0, '2024-04-16 06:36:23'),
(65, 65, 0, 0, '2024-04-16 06:38:22'),
(66, 66, 4, 0, '2024-04-16 06:38:23'),
(67, 67, 48, 0, '2024-04-16 07:25:13'),
(68, 68, 4, 0, '2024-04-16 07:25:14'),
(69, 69, 48, 0, '2024-04-16 10:02:40'),
(70, 70, 4, 0, '2024-04-16 10:02:41'),
(71, 71, 48, 0, '2024-04-16 10:05:20'),
(72, 72, 4, 0, '2024-04-16 10:05:21'),
(73, 73, 69, 0, '2024-04-16 11:13:53'),
(74, 74, 4, 0, '2024-04-16 11:13:54'),
(75, 75, 62, 0, '2024-04-16 11:31:14'),
(76, 76, 4, 0, '2024-04-16 11:31:15'),
(77, 77, 69, 0, '2024-04-16 11:48:21'),
(78, 78, 4, 0, '2024-04-16 11:48:21'),
(79, 79, 4, 0, '2024-04-30 03:23:52'),
(80, 80, 4, 0, '2024-04-30 03:24:22'),
(81, 81, 4, 0, '2024-04-30 03:27:24'),
(82, 82, 4, 0, '2024-04-30 03:34:22'),
(83, 83, 4, 0, '2024-04-30 03:37:27'),
(84, 84, 4, 0, '2024-04-30 03:40:15'),
(85, 85, 4, 0, '2024-04-30 03:42:43'),
(86, 86, 4, 0, '2024-04-30 03:45:10'),
(87, 87, 4, 0, '2024-04-30 03:47:17'),
(88, 88, 71, 0, '2024-04-30 03:51:51'),
(89, 89, 4, 0, '2024-04-30 03:51:52'),
(90, 90, 4, 0, '2024-05-01 01:21:20'),
(91, 91, 4, 0, '2024-05-01 01:27:43'),
(92, 92, 4, 0, '2024-05-01 01:38:45'),
(93, 93, 4, 0, '2024-05-01 01:41:32'),
(94, 94, 4, 0, '2024-05-01 01:50:13'),
(95, 95, 4, 0, '2024-05-01 01:52:54'),
(96, 96, 4, 0, '2024-05-01 01:56:44'),
(97, 97, 4, 0, '2024-05-01 02:01:42'),
(98, 98, 4, 0, '2024-05-01 02:05:49'),
(99, 99, 4, 0, '2024-05-01 02:08:16'),
(100, 100, 4, 0, '2024-05-01 02:10:57'),
(101, 101, 4, 0, '2024-05-01 02:12:56'),
(102, 102, 4, 0, '2024-05-01 02:15:05'),
(103, 103, 0, 0, '2024-05-18 06:32:53'),
(104, 104, 4, 0, '2024-05-18 06:35:03'),
(105, 105, 0, 0, '2024-05-18 06:37:08'),
(106, 106, 4, 0, '2024-05-18 06:39:16'),
(107, 107, 4, 0, '2024-05-18 07:08:08'),
(108, 108, 0, 0, '2024-05-18 08:13:53'),
(109, 109, 4, 0, '2024-05-18 08:16:05'),
(110, 110, 0, 0, '2024-05-18 08:19:59'),
(111, 111, 4, 0, '2024-05-18 08:22:10'),
(112, 112, 0, 0, '2024-05-20 06:19:55'),
(113, 113, 4, 0, '2024-05-20 06:22:06'),
(114, 114, 0, 0, '2024-05-20 06:26:06'),
(115, 115, 4, 0, '2024-05-20 06:28:18'),
(116, 116, 0, 0, '2024-05-20 06:28:18'),
(117, 117, 4, 0, '2024-05-20 06:30:29'),
(118, 118, 0, 0, '2024-05-20 06:30:29'),
(119, 119, 4, 0, '2024-05-20 06:32:40'),
(120, 120, 0, 0, '2024-05-21 06:16:58'),
(121, 121, 4, 0, '2024-05-21 06:19:11'),
(122, 122, 0, 0, '2024-05-21 13:21:32'),
(123, 123, 4, 0, '2024-05-21 13:23:42'),
(124, 124, 0, 0, '2024-05-21 13:28:02'),
(125, 125, 4, 0, '2024-05-21 13:30:11'),
(126, 126, 0, 0, '2024-05-22 01:17:47'),
(127, 127, 4, 0, '2024-05-22 01:17:47'),
(128, 128, 0, 0, '2024-05-22 01:20:32'),
(129, 129, 4, 0, '2024-05-22 01:22:41'),
(130, 130, 87, 0, '2024-05-24 05:27:31'),
(131, 131, 4, 0, '2024-05-24 05:27:31'),
(132, 132, 0, 0, '2024-06-04 11:34:35'),
(133, 133, 4, 0, '2024-06-04 11:34:36'),
(134, 134, 4, 0, '2024-06-04 12:14:06'),
(135, 135, 4, 0, '2024-06-04 12:40:27'),
(136, 136, 4, 0, '2024-06-04 12:50:23'),
(137, 137, 4, 0, '2024-06-04 13:12:26'),
(138, 138, 4, 0, '2024-06-04 13:17:42'),
(139, 139, 4, 0, '2024-06-04 13:25:28'),
(140, 140, 4, 0, '2024-06-04 13:27:23'),
(141, 141, 4, 0, '2024-06-04 13:32:21'),
(142, 142, 4, 0, '2024-06-04 13:36:49'),
(143, 143, 4, 0, '2024-06-04 13:40:49'),
(144, 144, 4, 0, '2024-06-04 13:44:31'),
(145, 145, 4, 0, '2024-06-04 13:47:38'),
(146, 146, 4, 0, '2024-06-04 13:52:33'),
(147, 147, 4, 0, '2024-06-04 13:55:53'),
(148, 148, 4, 0, '2024-06-04 14:04:13'),
(149, 149, 4, 0, '2024-06-04 14:07:40'),
(150, 150, 4, 0, '2024-06-04 14:12:56'),
(151, 151, 4, 0, '2024-06-04 16:31:24'),
(152, 152, 4, 0, '2024-06-04 16:34:46'),
(153, 153, 4, 0, '2024-06-04 16:37:31'),
(154, 154, 0, 0, '2024-06-04 18:25:03'),
(155, 155, 4, 0, '2024-06-04 18:25:03'),
(156, 156, 91, 0, '2024-06-04 18:41:06'),
(157, 157, 4, 0, '2024-06-04 18:41:08'),
(158, 158, 91, 0, '2024-06-04 22:06:34'),
(159, 159, 4, 0, '2024-06-04 22:06:35'),
(160, 160, 91, 0, '2024-06-04 22:13:50'),
(161, 161, 4, 0, '2024-06-04 22:13:51'),
(162, 162, 4, 0, '2024-06-08 17:25:39'),
(163, 163, 83, 0, '2024-06-08 17:59:34'),
(164, 164, 4, 0, '2024-06-08 17:59:34'),
(165, 165, 91, 0, '2024-06-08 18:21:09'),
(166, 166, 4, 0, '2024-06-08 18:21:10'),
(167, 167, 91, 0, '2024-06-08 18:24:29'),
(168, 168, 4, 0, '2024-06-08 18:24:30'),
(169, 169, 0, 0, '2024-06-10 17:26:27'),
(170, 170, 4, 0, '2024-06-10 17:26:28'),
(171, 171, 93, 0, '2024-06-10 17:27:54'),
(172, 172, 4, 0, '2024-06-10 17:27:55'),
(173, 173, 91, 0, '2024-06-10 17:55:06'),
(174, 174, 4, 0, '2024-06-10 17:55:07'),
(175, 175, 91, 0, '2024-06-10 17:57:00'),
(176, 176, 4, 0, '2024-06-10 17:57:00'),
(177, 177, 0, 0, '2024-06-11 03:03:03'),
(178, 178, 4, 0, '2024-06-11 03:03:04'),
(179, 179, 0, 0, '2024-06-11 03:04:42'),
(180, 180, 4, 0, '2024-06-11 03:04:43'),
(181, 181, 95, 0, '2024-06-11 03:14:09'),
(182, 182, 4, 0, '2024-06-11 03:14:10'),
(183, 183, 95, 0, '2024-06-11 03:16:14'),
(184, 184, 4, 0, '2024-06-11 03:16:14'),
(185, 185, 93, 0, '2024-06-11 03:18:44'),
(186, 186, 4, 0, '2024-06-11 03:18:45'),
(187, 187, 99, 0, '2024-06-11 08:12:55'),
(188, 188, 4, 0, '2024-06-11 08:12:56'),
(189, 189, 99, 0, '2024-06-11 08:15:47'),
(190, 190, 4, 0, '2024-06-11 08:15:47'),
(191, 191, 99, 0, '2024-06-11 08:19:21'),
(192, 192, 4, 0, '2024-06-11 08:19:22'),
(193, 193, 99, 0, '2024-06-11 08:20:43'),
(194, 194, 4, 0, '2024-06-11 08:20:44'),
(195, 195, 4, 0, '2024-06-11 08:25:45'),
(196, 196, 99, 0, '2024-06-11 08:31:16'),
(197, 197, 4, 0, '2024-06-11 08:31:17'),
(198, 198, 100, 0, '2024-06-13 08:35:45'),
(199, 199, 4, 0, '2024-06-13 08:35:46'),
(200, 200, 100, 0, '2024-06-13 08:40:22'),
(201, 201, 4, 0, '2024-06-13 08:40:22'),
(202, 202, 100, 0, '2024-06-13 09:36:29'),
(203, 203, 4, 0, '2024-06-13 09:36:30'),
(204, 204, 0, 0, '2024-06-13 09:41:58'),
(205, 205, 4, 0, '2024-06-13 09:41:58'),
(206, 206, 100, 0, '2024-06-13 09:45:06'),
(207, 207, 4, 0, '2024-06-13 09:45:07'),
(208, 208, 100, 0, '2024-06-13 09:46:20'),
(209, 209, 4, 0, '2024-06-13 09:46:20'),
(210, 210, 101, 0, '2024-06-23 04:20:36'),
(211, 211, 4, 0, '2024-06-23 04:20:36'),
(212, 212, 101, 0, '2024-06-23 04:24:49'),
(213, 213, 4, 0, '2024-06-23 04:24:49'),
(214, 214, 100, 0, '2024-07-09 13:51:01'),
(215, 215, 4, 0, '2024-07-09 13:51:02'),
(216, 216, 100, 0, '2024-07-09 13:51:42'),
(217, 217, 4, 0, '2024-07-09 13:51:43'),
(218, 218, 100, 0, '2024-07-09 13:54:12'),
(219, 219, 4, 0, '2024-07-09 13:54:12'),
(220, 220, 100, 0, '2024-07-09 13:55:28'),
(221, 221, 4, 0, '2024-07-09 13:55:28'),
(222, 222, 0, 0, '2024-07-14 18:40:20'),
(223, 223, 4, 0, '2024-07-14 18:40:20'),
(224, 224, 58, 0, '2024-07-14 18:53:11'),
(225, 225, 4, 0, '2024-07-14 18:53:11'),
(226, 226, 100, 0, '2024-07-15 07:11:56'),
(227, 227, 4, 0, '2024-07-15 07:11:56'),
(228, 228, 100, 0, '2024-07-15 07:13:48'),
(229, 229, 4, 0, '2024-07-15 07:13:48'),
(230, 230, 0, 0, '2024-07-23 15:36:54'),
(231, 231, 4, 0, '2024-07-23 15:36:55'),
(232, 232, 56, 0, '2024-07-23 15:37:32'),
(233, 233, 4, 0, '2024-07-23 15:37:33'),
(234, 234, 100, 0, '2024-07-23 15:39:06'),
(235, 235, 4, 0, '2024-07-23 15:39:07'),
(236, 236, 100, 0, '2024-07-23 15:44:58'),
(237, 237, 4, 0, '2024-07-23 15:44:59'),
(238, 238, 101, 0, '2024-07-23 15:48:19'),
(239, 239, 4, 0, '2024-07-23 15:48:19'),
(240, 240, 58, 0, '2024-07-23 15:51:46'),
(241, 241, 4, 0, '2024-07-23 15:51:46'),
(242, 242, 100, 0, '2024-07-23 15:55:34'),
(243, 243, 4, 0, '2024-07-23 15:55:34'),
(244, 244, 100, 0, '2024-07-23 16:10:22'),
(245, 245, 4, 0, '2024-07-23 16:10:23'),
(246, 246, 100, 0, '2024-07-23 16:11:25'),
(247, 247, 4, 0, '2024-07-23 16:11:26'),
(248, 248, 100, 0, '2024-07-23 16:16:17'),
(249, 249, 4, 0, '2024-07-23 16:16:17'),
(250, 250, 100, 0, '2024-07-28 14:03:56'),
(251, 251, 4, 0, '2024-07-28 14:03:57'),
(252, 252, 100, 0, '2024-07-28 14:04:15'),
(253, 253, 4, 0, '2024-07-28 14:04:15'),
(254, 254, 100, 0, '2024-07-28 14:08:02'),
(255, 255, 4, 0, '2024-07-28 14:08:03'),
(256, 256, 101, 0, '2024-07-28 14:12:11'),
(257, 257, 4, 0, '2024-07-28 14:12:12'),
(258, 258, 100, 0, '2024-07-28 14:13:32'),
(259, 259, 4, 0, '2024-07-28 14:13:33'),
(260, 260, 101, 0, '2024-07-28 14:15:32'),
(261, 261, 4, 0, '2024-07-28 14:15:32'),
(262, 262, 100, 0, '2024-07-28 14:16:56'),
(263, 263, 4, 0, '2024-07-28 14:16:56'),
(264, 264, 0, 0, '2024-07-29 02:16:48'),
(265, 265, 4, 0, '2024-07-29 02:16:49'),
(266, 266, 0, 0, '2024-07-29 02:18:08'),
(267, 267, 4, 0, '2024-07-29 02:18:09'),
(268, 268, 100, 0, '2024-07-29 02:23:09'),
(269, 269, 4, 0, '2024-07-29 02:23:09'),
(270, 270, 101, 0, '2024-07-29 02:24:29'),
(271, 271, 4, 0, '2024-07-29 02:24:29'),
(272, 272, 100, 0, '2024-07-29 05:59:37'),
(273, 273, 4, 0, '2024-07-29 05:59:38'),
(274, 274, 101, 0, '2024-07-30 06:53:50'),
(275, 275, 4, 0, '2024-07-30 06:53:51'),
(276, 276, 102, 0, '2024-07-31 03:12:52'),
(277, 277, 4, 0, '2024-07-31 03:12:53'),
(278, 278, 102, 0, '2024-07-31 03:16:49'),
(279, 279, 4, 0, '2024-07-31 03:16:49'),
(280, 280, 102, 0, '2024-07-31 03:22:26'),
(281, 281, 4, 0, '2024-07-31 03:22:27'),
(282, 282, 102, 0, '2024-07-31 03:24:02'),
(283, 283, 4, 0, '2024-07-31 03:24:03'),
(284, 284, 102, 0, '2024-07-31 03:26:06'),
(285, 285, 4, 0, '2024-07-31 03:26:06'),
(286, 286, 102, 0, '2024-07-31 03:30:59'),
(287, 287, 4, 0, '2024-07-31 03:30:59'),
(288, 288, 102, 0, '2024-07-31 03:32:48'),
(289, 289, 4, 0, '2024-07-31 03:32:49'),
(290, 290, 103, 0, '2024-07-31 03:59:46'),
(291, 291, 4, 0, '2024-07-31 03:59:46'),
(292, 292, 0, 0, '2024-08-05 17:50:44'),
(293, 293, 4, 0, '2024-08-05 17:50:45'),
(294, 294, 0, 0, '2024-08-05 17:52:17'),
(295, 295, 4, 0, '2024-08-05 17:52:17'),
(296, 296, 0, 0, '2024-08-05 19:13:25'),
(297, 297, 4, 0, '2024-08-05 19:13:26'),
(298, 298, 105, 0, '2024-08-05 19:14:28'),
(299, 299, 4, 0, '2024-08-05 19:14:28'),
(300, 300, 105, 0, '2024-08-05 19:44:21'),
(301, 301, 4, 0, '2024-08-05 19:44:22'),
(302, 302, 105, 0, '2024-08-05 19:46:24'),
(303, 303, 4, 0, '2024-08-05 19:46:25'),
(304, 304, 105, 0, '2024-08-05 22:36:13'),
(305, 305, 4, 0, '2024-08-05 22:36:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `user_code` varchar(25) NOT NULL,
  `user_type` enum('staff','patient','sub_admin','admin') DEFAULT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `address` text DEFAULT NULL,
  `phone_number` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(12) NOT NULL,
  `password` varchar(150) NOT NULL,
  `profile` text DEFAULT NULL,
  `created_by` int(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_verified` tinyint(1) DEFAULT 0,
  `address_id` int(10) DEFAULT NULL,
  `backer_id` int(10) DEFAULT NULL,
  `user_preference` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_code`, `user_type`, `first_name`, `middle_name`, `last_name`, `birthdate`, `gender`, `address`, `phone_number`, `email`, `username`, `password`, `profile`, `created_by`, `created_at`, `updated_at`, `is_verified`, `address_id`, `backer_id`, `user_preference`) VALUES
(4, 'ADMN589C3', 'admin', 'ADMINISTRATOR', ' ', '___SUPER_USER', '2021-12-07', 'Male', 'sample address', '09660070028', 'admin@gmail.com', 'admin', 'admin', 'profile', NULL, '2021-12-02 08:58:11', '2024-06-10 17:51:20', 1, NULL, NULL, NULL),
(35, '1D4C4', 'staff', 'Tom', '', 'Doctor', '1996-05-05', 'Male', NULL, '09063387453', 'admin@paintmanconstruction.com', '', '', NULL, NULL, '2023-05-04 16:54:28', '2024-04-29 20:44:49', 1, 0, NULL, 'staff'),
(38, 'CX1D7837', 'patient', 'RAFFY', '', 'TULFO', '1981-05-13', 'Male', NULL, '09781625172', 'OFLUT@tulfix.com', '', '1111', 'profile', NULL, '2023-05-11 18:03:34', '2024-04-29 20:44:54', 1, 0, 37, 'client'),
(44, '8F1F38', 'patient', 'Thorsten', 'Ben10', 'Thors10', '2000-12-28', 'Female', NULL, '09212032956', 'stuff@mail.com', '', 'Rosales30', 'profile', NULL, '2023-05-21 15:36:01', '2024-05-18 05:50:34', 1, 0, NULL, 'client'),
(45, '6FA144', 'staff', 'Danica Mae', '', 'Olarte', '2000-10-30', 'Female', NULL, '09667435352', 'DanMaeOlarte30@gmail.com', '', '123abc', 'profile', NULL, '2023-05-21 15:38:17', '2024-05-18 08:33:48', 1, 0, NULL, 'staff01'),
(46, 'CX55CD45', 'patient', 'Test123', 'Test321', 'TestModule', '2000-12-28', 'Male', NULL, '09212032928', 'test123@gmail.com', '', 'test@123', NULL, NULL, '2023-05-22 06:25:15', '2024-04-29 20:44:54', 1, 0, 38, 'client'),
(51, 'F4E950', 'patient', 'Mailene', 'mato', 'rosales', '2000-12-28', 'Male', NULL, '09212032929', 'stephenChow@gmail.com', '', 'Mailene', 'profile', NULL, '2023-07-25 12:30:39', '2024-04-29 20:44:54', 1, 0, NULL, 'client'),
(52, 'CX408451', 'patient', 'Mark Angelo', '', 'Gonzales', NULL, 'Male', NULL, '', 'markgonzalespersonal@gmail.com', '', '1111', NULL, NULL, '2023-08-18 11:04:02', '2024-04-29 20:44:54', 1, 0, NULL, 'client'),
(53, 'CX0E0452', 'patient', 'Juan ', '', 'Delacruz', NULL, 'Male', NULL, '', 'vimeva1105@backva.com', '', 'Juandelacruz', NULL, NULL, '2023-08-18 13:51:52', '2024-04-29 20:44:54', 1, 0, 48, 'client'),
(54, 'CX4ADE53', 'patient', 'tester', '', 'tester', NULL, 'Male', NULL, '09063387451', 'gonzalesmarkangelophl@gmail.com', '', '1111', NULL, NULL, '2023-08-20 13:24:54', '2024-04-29 20:44:54', 0, NULL, NULL, 'client'),
(56, 'CXD7A054', 'patient', 'Mark Angelo', '', 'Gonzales', '0000-00-00', 'Male', NULL, '09332110009', 'gonzalesmarkangeloph333333@gmail.com', '', '1111', 'profile', NULL, '2023-08-20 17:22:48', '2024-04-29 20:44:54', 1, NULL, NULL, 'client'),
(58, 'CX3A7B57', 'patient', 'tester', '', 'solo', NULL, 'Male', NULL, '09063387433', 'gonzalesmarkangeloph@gmail.com', '', '1111', NULL, NULL, '2023-08-24 14:30:49', '2024-04-29 20:44:54', 1, NULL, NULL, 'client'),
(59, 'CXE6EF58', 'patient', 'Arnold', '', 'Diaz', NULL, 'Male', NULL, '09212032926', 'pejapa2953@poverts.com', '', '1234', NULL, NULL, '2023-08-24 14:42:12', '2024-04-29 20:44:54', 0, NULL, NULL, 'client'),
(60, 'CXE8DE59', 'patient', 'Dona', '', 'Lisa', NULL, 'Female', NULL, '09506969648', 'donalisaantoniza24@gmail.com', '', '1111', NULL, NULL, '2023-08-24 18:39:19', '2024-04-29 20:44:54', 0, NULL, NULL, 'client'),
(61, 'CXB84460', 'patient', 'Mark ', '', 'Gonzales ', NULL, 'Male', NULL, '09124675335', 'Chromaticsoftwares@gmail.com', '', '1111', NULL, NULL, '2023-08-25 08:54:37', '2024-04-29 20:44:54', 1, NULL, NULL, 'client'),
(63, 'CX966162', 'patient', 'Miguel', '', 'Bautista', NULL, 'Male', NULL, '09226645656', 'haroo234@email.com', '', 'helloworld123', NULL, NULL, '2023-08-27 14:58:35', '2024-04-29 20:44:54', 0, NULL, NULL, 'client'),
(64, 'CXA12B63', 'patient', 'MIGUEL ANGEL', '', 'BAUTISTA', NULL, 'Male', NULL, '09652866079', 'migerudaily24@gmail.com', '', 'helloworld123', NULL, NULL, '2023-08-27 14:59:35', '2024-04-29 20:44:54', 1, NULL, NULL, 'client'),
(65, 'CX8B9164', 'patient', 'Juan ', '', 'Jandog', NULL, 'Male', NULL, '09212032922', 'vogol43743@vikinoko.com', '', 'admin ', NULL, NULL, '2023-08-27 15:30:52', '2024-04-29 20:44:54', 1, NULL, NULL, 'client'),
(67, 'CX534666', 'patient', 'The', '', 'Rock', NULL, 'Male', NULL, '09945510322', 'championinnovation2022@gmail.com', '', '1111', NULL, NULL, '2024-04-16 06:33:38', '2024-04-29 20:44:54', 1, NULL, NULL, 'client'),
(72, 'CX3E6E71', 'patient', 'John Paul ', '', 'Gatchalian ', NULL, 'Male', NULL, '09706803403', 'jpgatchalian1101901@gmail.com', '', 'johnpaul1', NULL, NULL, '2024-05-01 03:50:56', '2024-05-01 03:51:20', 1, NULL, NULL, NULL),
(74, 'CX3CB473', 'patient', 'Micheal', '', 'Pangilinan', NULL, 'Male', NULL, '09761058182', 'joshuapanget@gmail.com', '', 'Jan12322', NULL, NULL, '2024-05-14 12:04:23', '2024-05-14 12:04:23', 0, NULL, NULL, NULL),
(75, 'CXD0FB74', 'patient', 'Jodhua', '', 'Angatep', NULL, 'Male', NULL, '09300550470', 'sherlickhome@gmail.com', '', 'sherlickhome', NULL, NULL, '2024-05-14 12:18:38', '2024-05-14 12:18:38', 0, NULL, NULL, NULL),
(76, 'CXFA7A75', 'patient', 'Spam', '', 'Spamsample', NULL, 'Male', NULL, '09660070020', 'gegabal488@facais.com', '', 'Rosales30', NULL, NULL, '2024-05-15 06:02:28', '2024-05-15 06:02:28', 0, NULL, NULL, NULL),
(77, 'CXEE6676', 'patient', 'Sample02', '', 'Sampletemp', NULL, 'Male', NULL, '09660070021', 'kukkazeydu@gufum.com', '', 'Rosales30', NULL, NULL, '2024-05-15 06:19:15', '2024-05-15 06:19:15', 0, NULL, NULL, NULL),
(78, 'CX863B77', 'patient', 'Jonash', '', 'bambino', '0000-00-00', 'Male', NULL, '09660070023', 'bewiludu@clip.lat', '', 'Rosales30', 'profile', NULL, '2024-05-15 06:22:24', '2024-05-18 06:23:41', 0, NULL, NULL, 'client'),
(79, 'CX07B778', 'patient', 'Rondue ', '', 'Diaz', NULL, 'Male', NULL, '09660070024', 'bufwjolbh6@rentforsale7.com', '', 'Rosales30', NULL, NULL, '2024-05-15 06:57:46', '2024-05-15 06:57:46', 0, NULL, NULL, NULL),
(84, 'CX229D83', 'patient', 'Rosales', 'Mato', 'Lopez', '2000-12-28', 'Male', NULL, '09660070026', 'rosalesjohnace123@gmail.com', '', 'Rosales30', NULL, NULL, '2024-05-18 05:53:06', '2024-05-18 05:53:06', 0, NULL, NULL, 'client'),
(85, '378284', 'sub_admin', 'Beverly', '', 'Sawit', '1999-11-16', 'Female', NULL, '09959048125', 'Sawitbeverly16@gmail.com', '', '123abc', NULL, NULL, '2024-05-18 08:29:20', '2024-05-18 08:29:20', 0, NULL, NULL, 'staff01'),
(86, '6B7385', 'sub_admin', 'Dr. Ralf Christian', 'V.', 'Padua', '0000-00-00', 'Male', NULL, '09924281017', 'ralfpadua3@gmail.com', '', '123abc', NULL, NULL, '2024-05-18 08:37:49', '2024-05-18 08:37:49', 0, NULL, NULL, 'physician'),
(88, 'A0E187', 'sub_admin', 'Dra. Jahaziel', '', 'Lagrimas', '0000-00-00', 'Female', NULL, '09283407684', 'jahaziellagrimas23@gmail.com', '', '123abc', NULL, NULL, '2024-05-22 00:43:29', '2024-05-22 00:43:29', 0, NULL, NULL, 'physician'),
(90, 'CX0BF888', 'patient', 'Hev', 'MERIDA', 'Abi', '2024-06-04', 'Male', NULL, '09293998019', 'tinmatiga@gmail.com', '', 'baliw', 'https://www.vividoptical.live/public/uploads/06_9B91DA665AF9E52.JPEG', NULL, '2024-06-04 11:25:18', '2024-06-04 11:25:18', 0, NULL, NULL, 'client'),
(92, 'CX533D91', 'patient', 'Ralfy', '', 'Paz', NULL, 'Male', NULL, '09605589332', 'ralfpadua2@gmail.com', '', 'ralf', NULL, NULL, '2024-06-05 06:23:57', '2024-06-05 06:23:57', 0, NULL, 59, NULL),
(93, 'CX339492', 'patient', 'Erlynda ', '', 'Mariano', '0000-00-00', 'Female', NULL, '09212032955', 'erlyndaMariano1@outlook.com', '', 'mariano@1528', 'profile', NULL, '2024-06-10 17:22:14', '2024-06-11 08:08:14', 1, NULL, 91, NULL),
(94, '12B393', 'staff', 'JR', '', 'Rosales', '2000-12-28', 'Male', NULL, '09660070041', 'johnace.rosales@live.ama.edu.ph', '', 'Rosales@30', 'profile', NULL, '2024-06-11 01:49:51', '2024-06-11 02:01:21', 1, NULL, NULL, 'staff01'),
(95, 'CX58A394', 'patient', 'Erlynda ', '', 'Mariano ', NULL, 'Male', NULL, '09660070019', 'erlyndmaMariano@outlook.com', '', 'mariano@1528', NULL, NULL, '2024-06-11 03:06:25', '2024-06-11 03:13:33', 1, NULL, 91, NULL),
(96, '1E6A95', 'staff', 'Abc', 'Abc', 'ABC', '1111-12-12', 'Female', NULL, '09555555555', 'abc@abc.abc', '', 'admin', NULL, NULL, '2024-06-11 07:53:13', '2024-06-11 07:53:13', 0, NULL, NULL, 'physician'),
(97, 'CX6C4196', 'patient', 'c1', '', 'c1', NULL, 'Female', NULL, '09222222222', 'c1@c1.c1', '', 'admin', NULL, NULL, '2024-06-11 08:01:29', '2024-06-11 08:01:29', 0, NULL, NULL, NULL),
(98, 'CXA34D97', 'patient', 'ABCCD', '', 'ABCDDF', NULL, 'Male', NULL, '09273387594', 'thosteenkaye@gmail.com', '', 'admin', NULL, NULL, '2024-06-11 08:06:26', '2024-06-11 08:06:26', 0, NULL, NULL, NULL),
(99, 'CX9DB398', 'patient', 'ABCD', '', 'ABCDD', NULL, 'Female', NULL, '09262052724', 'erlyndaMariano@outlook.com', '', 'admin', NULL, NULL, '2024-06-11 08:09:53', '2024-06-11 08:10:20', 1, NULL, NULL, NULL),
(100, 'CX056E99', 'patient', 'Jade Marie', '', 'Dela Cruz', NULL, 'Female', NULL, '09517552292', 'jademariedelacruz6@gmail.com', '', '123abc', NULL, NULL, '2024-06-13 08:34:35', '2024-06-13 08:35:04', 1, NULL, NULL, NULL),
(101, 'CX781B100', 'patient', 'Cherry', '', 'Dela Cruz', NULL, 'Female', NULL, '09279443054', 'charitodelacruz0109@gmail.com', '', '123abc', NULL, NULL, '2024-06-23 04:15:06', '2024-06-23 04:17:03', 1, NULL, NULL, NULL),
(104, 'B57C103', 'staff', 'Jade', 'D.', 'Sawit', '0000-00-00', '', NULL, '09185246188', 'jademariedelacruz01091966@gmail.com', '', '123abc', NULL, NULL, '2024-08-04 17:10:38', '2024-08-04 17:12:13', 1, NULL, NULL, 'staff01'),
(105, 'CX6FC4104', 'patient', 'John', '', 'Rosales', NULL, 'Male', NULL, '09660070585', 'rjohnace30@gmail.com', '', 'Rosales30', NULL, NULL, '2024-08-05 15:38:03', '2024-08-05 15:44:13', 1, NULL, NULL, NULL),
(106, 'E84C105', '', '', '', '', NULL, 'Male', NULL, '', 'lijzmrbzeuj@dont-reply.me', '', 'yhduIgmqbhd5', NULL, NULL, '2024-10-19 07:17:54', '2024-10-19 07:17:54', 0, NULL, NULL, NULL),
(107, 'E0E8106', NULL, '', '', '', NULL, 'Male', NULL, '', '', '', '', NULL, NULL, '2024-10-19 20:59:02', '2024-10-19 20:59:02', 0, NULL, NULL, NULL),
(108, '17CD107', NULL, '', '', '', NULL, 'Male', NULL, '', '', '', '', NULL, NULL, '2024-10-27 08:08:47', '2024-10-27 08:08:47', 0, NULL, NULL, NULL),
(109, '3989108', NULL, '', '', '', NULL, 'Male', NULL, '', '', '', '', NULL, NULL, '2024-11-01 08:41:59', '2024-11-01 08:41:59', 0, NULL, NULL, NULL),
(110, 'CE35109', NULL, '', '', '', NULL, 'Male', NULL, '', '', '', '', NULL, NULL, '2024-11-07 01:51:25', '2024-11-07 01:51:25', 0, NULL, NULL, NULL),
(111, '8BEF110', NULL, '', '', '', NULL, 'Male', NULL, '', '', '', '', NULL, NULL, '2024-11-08 10:24:43', '2024-11-08 10:24:43', 0, NULL, NULL, NULL),
(112, '3F83111', NULL, '', '', '', NULL, 'Male', NULL, '', '', '', '', NULL, NULL, '2024-11-10 02:05:09', '2024-11-10 02:05:09', 0, NULL, NULL, NULL),
(113, '6741112', NULL, '', '', '', NULL, 'Male', NULL, '', '', '', '', NULL, NULL, '2024-11-11 13:46:22', '2024-11-11 13:46:22', 0, NULL, NULL, NULL),
(114, '96FA113', NULL, '', '', '', NULL, 'Male', NULL, '', '', '', '', NULL, NULL, '2024-11-15 02:08:47', '2024-11-15 02:08:47', 0, NULL, NULL, NULL),
(115, 'C57C114', NULL, '', '', '', NULL, 'Male', NULL, '', '', '', '', NULL, NULL, '2024-11-16 00:01:59', '2024-11-16 00:01:59', 0, NULL, NULL, NULL),
(116, '7EAD115', '', '', '', '', NULL, 'Male', NULL, '', 'zmblrbbzljuj@dont-reply.me', '', 'w6beNAqb07V7', NULL, NULL, '2024-11-16 17:03:04', '2024-11-16 17:03:04', 0, NULL, NULL, NULL),
(117, '51E9116', NULL, '', '', '', NULL, 'Male', NULL, '', '', '', '', NULL, NULL, '2024-11-16 22:06:05', '2024-11-16 22:06:05', 0, NULL, NULL, NULL),
(118, '99D6117', NULL, '', '', '', NULL, 'Male', NULL, '', '', '', '', NULL, NULL, '2024-11-18 03:00:12', '2024-11-18 03:00:12', 0, NULL, NULL, NULL),
(119, '5D9A118', NULL, '', '', '', NULL, 'Male', NULL, '', '', '', '', NULL, NULL, '2024-11-23 04:04:00', '2024-11-23 04:04:00', 0, NULL, NULL, NULL),
(120, '658F119', NULL, '', '', '', NULL, 'Male', NULL, '', '', '', '', NULL, NULL, '2024-11-24 08:00:33', '2024-11-24 08:00:33', 0, NULL, NULL, NULL),
(121, '4536120', NULL, '', '', '', NULL, 'Male', NULL, '', '', '', '', NULL, NULL, '2024-11-25 04:37:56', '2024-11-25 04:37:56', 0, NULL, NULL, NULL),
(122, '41D3121', NULL, '', '', '', NULL, 'Male', NULL, '', '', '', '', NULL, NULL, '2024-11-26 03:34:52', '2024-11-26 03:34:52', 0, NULL, NULL, NULL),
(123, '48FE122', NULL, '', '', '', NULL, 'Male', NULL, '', '', '', '', NULL, NULL, '2024-11-27 02:02:07', '2024-11-27 02:02:07', 0, NULL, NULL, NULL),
(124, 'F74B123', NULL, '', '', '', NULL, 'Male', NULL, '', '', '', '', NULL, NULL, '2024-11-28 00:54:35', '2024-11-28 00:54:35', 0, NULL, NULL, NULL),
(125, '39A4124', NULL, '', '', '', NULL, 'Male', NULL, '', '', '', '', NULL, NULL, '2024-11-28 20:51:15', '2024-11-28 20:51:15', 0, NULL, NULL, NULL),
(126, '747D125', NULL, '', '', '', NULL, 'Male', NULL, '', '', '', '', NULL, NULL, '2024-11-29 16:15:34', '2024-11-29 16:15:34', 0, NULL, NULL, NULL),
(127, 'C6BC126', '', '', '', '', NULL, 'Male', NULL, '', 'errmrsijbeuj@dont-reply.me', '', '8p_M0JwXrPi6', NULL, NULL, '2024-11-29 20:46:22', '2024-11-29 20:46:22', 0, NULL, NULL, NULL),
(128, 'DDB4127', NULL, '', '', '', NULL, 'Male', NULL, '', '', '', '', NULL, NULL, '2024-11-30 11:10:24', '2024-11-30 11:10:24', 0, NULL, NULL, NULL),
(129, '3E0F128', NULL, '', '', '', NULL, 'Male', NULL, '', '', '', '', NULL, NULL, '2024-12-01 05:23:33', '2024-12-01 05:23:33', 0, NULL, NULL, NULL),
(130, '4E44129', NULL, '', '', '', NULL, 'Male', NULL, '', '', '', '', NULL, NULL, '2024-12-01 23:21:46', '2024-12-01 23:21:46', 0, NULL, NULL, NULL),
(131, 'C6C9130', '', '', '', '', NULL, 'Male', NULL, '', 'eablselaajuj@do-not-respond.me', '', 'EJUEsvLN7KCJ', NULL, NULL, '2024-12-02 03:03:57', '2024-12-02 03:03:57', 0, NULL, NULL, NULL),
(132, '125B131', NULL, '', '', '', NULL, 'Male', NULL, '', '', '', '', NULL, NULL, '2024-12-02 15:16:19', '2024-12-02 15:16:19', 0, NULL, NULL, NULL),
(133, '9DC5132', NULL, '', '', '', NULL, 'Male', NULL, '', '', '', '', NULL, NULL, '2024-12-03 09:39:32', '2024-12-03 09:39:32', 0, NULL, NULL, NULL),
(134, '4E71133', NULL, '', '', '', NULL, 'Male', NULL, '', '', '', '', NULL, NULL, '2024-12-04 03:18:44', '2024-12-04 03:18:44', 0, NULL, NULL, NULL),
(135, 'E557134', NULL, '', '', '', NULL, 'Male', NULL, '', '', '', '', NULL, NULL, '2024-12-04 19:17:07', '2024-12-04 19:17:07', 0, NULL, NULL, NULL),
(136, 'B211135', NULL, '', '', '', NULL, 'Male', NULL, '', '', '', '', NULL, NULL, '2024-12-05 13:25:18', '2024-12-05 13:25:18', 0, NULL, NULL, NULL),
(137, '10A1136', NULL, '', '', '', NULL, 'Male', NULL, '', '', '', '', NULL, NULL, '2024-12-06 09:50:42', '2024-12-06 09:50:42', 0, NULL, NULL, NULL),
(138, '05AE137', NULL, '', '', '', NULL, 'Male', NULL, '', '', '', '', NULL, NULL, '2024-12-07 04:53:03', '2024-12-07 04:53:03', 0, NULL, NULL, NULL),
(139, '2C30138', NULL, '', '', '', NULL, 'Male', NULL, '', '', '', '', NULL, NULL, '2024-12-07 22:39:52', '2024-12-07 22:39:52', 0, NULL, NULL, NULL),
(140, 'B200139', NULL, '', '', '', NULL, 'Male', NULL, '', '', '', '', NULL, NULL, '2024-12-08 15:43:11', '2024-12-08 15:43:11', 0, NULL, NULL, NULL),
(141, '3C6B140', NULL, '', '', '', NULL, 'Male', NULL, '', '', '', '', NULL, NULL, '2024-12-09 14:50:35', '2024-12-09 14:50:35', 0, NULL, NULL, NULL),
(142, 'F121141', NULL, '', '', '', NULL, 'Male', NULL, '', '', '', '', NULL, NULL, '2024-12-11 16:28:32', '2024-12-11 16:28:32', 0, NULL, NULL, NULL),
(143, '4D16142', '', '', '', '', NULL, 'Male', NULL, '', 'emmasrzimjuj@dont-reply.me', '', 'HgGy7I8eVeM', NULL, NULL, '2024-12-12 16:15:11', '2024-12-12 16:15:11', 0, NULL, NULL, NULL),
(144, '5534143', NULL, '', '', '', NULL, 'Male', NULL, '', '', '', '', NULL, NULL, '2024-12-12 22:08:23', '2024-12-12 22:08:23', 0, NULL, NULL, NULL),
(145, 'E09D144', NULL, '', '', '', NULL, 'Male', NULL, '', '', '', '', NULL, NULL, '2024-12-13 23:23:13', '2024-12-13 23:23:13', 0, NULL, NULL, NULL),
(146, 'F814145', NULL, '', '', '', NULL, 'Male', NULL, '', '', '', '', NULL, NULL, '2024-12-14 19:38:43', '2024-12-14 19:38:43', 0, NULL, NULL, NULL),
(147, 'A507146', NULL, '', '', '', NULL, 'Male', NULL, '', '', '', '', NULL, NULL, '2024-12-14 19:44:52', '2024-12-14 19:44:52', 0, NULL, NULL, NULL),
(148, 'E3F9147', NULL, '', '', '', NULL, 'Male', NULL, '', '', '', '', NULL, NULL, '2024-12-15 14:37:30', '2024-12-15 14:37:30', 0, NULL, NULL, NULL),
(149, '5D43148', NULL, '', '', '', NULL, 'Male', NULL, '', '', '', '', NULL, NULL, '2024-12-16 15:05:54', '2024-12-16 15:05:54', 0, NULL, NULL, NULL),
(150, 'E6D8149', '', '', '', '', NULL, 'Male', NULL, '', 'beererleijuj@do-not-respond.me', '', 'FF_d2NrU4hw', NULL, NULL, '2024-12-17 18:38:21', '2024-12-17 18:38:21', 0, NULL, NULL, NULL),
(151, '4F14150', NULL, '', '', '', NULL, 'Male', NULL, '', '', '', '', NULL, NULL, '2024-12-19 02:01:11', '2024-12-19 02:01:11', 0, NULL, NULL, NULL),
(152, 'D6E4151', NULL, '', '', '', NULL, 'Male', NULL, '', '', '', '', NULL, NULL, '2024-12-20 02:07:51', '2024-12-20 02:07:51', 0, NULL, NULL, NULL),
(153, 'EA25152', NULL, '', '', '', NULL, 'Male', NULL, '', '', '', '', NULL, NULL, '2024-12-21 00:40:45', '2024-12-21 00:40:45', 0, NULL, NULL, NULL),
(154, '1E4D153', NULL, '', '', '', NULL, 'Male', NULL, '', '', '', '', NULL, NULL, '2024-12-21 19:07:42', '2024-12-21 19:07:42', 0, NULL, NULL, NULL),
(155, '4758154', NULL, '', '', '', NULL, 'Male', NULL, '', '', '', '', NULL, NULL, '2024-12-22 13:53:26', '2024-12-22 13:53:26', 0, NULL, NULL, NULL),
(156, 'DC8B155', '', '', '', '', NULL, 'Male', NULL, '', 'braesarlbjuj@dont-reply.me', '', 'ykyizU833II', NULL, NULL, '2024-12-22 14:49:47', '2024-12-22 14:49:47', 0, NULL, NULL, NULL),
(157, '39D3156', NULL, '', '', '', NULL, 'Male', NULL, '', '', '', '', NULL, NULL, '2024-12-23 08:07:54', '2024-12-23 08:07:54', 0, NULL, NULL, NULL),
(158, '588A157', NULL, '', '', '', NULL, 'Male', NULL, '', '', '', '', NULL, NULL, '2024-12-24 11:03:48', '2024-12-24 11:03:48', 0, NULL, NULL, NULL),
(159, '95A7158', NULL, '', '', '', NULL, 'Male', NULL, '', '', '', '', NULL, NULL, '2024-12-25 07:57:35', '2024-12-25 07:57:35', 0, NULL, NULL, NULL),
(160, '2FD9159', NULL, '', '', '', NULL, 'Male', NULL, '', '', '', '', NULL, NULL, '2024-12-26 03:24:31', '2024-12-26 03:24:31', 0, NULL, NULL, NULL),
(161, '6D54160', NULL, '', '', '', NULL, 'Male', NULL, '', '', '', '', NULL, NULL, '2024-12-27 02:31:23', '2024-12-27 02:31:23', 0, NULL, NULL, NULL),
(162, '627F161', NULL, '', '', '', NULL, 'Male', NULL, '', '', '', '', NULL, NULL, '2024-12-28 01:51:11', '2024-12-28 01:51:11', 0, NULL, NULL, NULL),
(163, '0A30162', NULL, '', '', '', NULL, 'Male', NULL, '', '', '', '', NULL, NULL, '2024-12-29 21:15:33', '2024-12-29 21:15:33', 0, NULL, NULL, NULL),
(164, 'BF65163', NULL, '', '', '', NULL, 'Male', NULL, '', '', '', '', NULL, NULL, '2024-12-30 19:15:25', '2024-12-30 19:15:25', 0, NULL, NULL, NULL),
(165, '0BF5164', NULL, '', '', '', NULL, 'Male', NULL, '', '', '', '', NULL, NULL, '2024-12-31 13:22:34', '2024-12-31 13:22:34', 0, NULL, NULL, NULL),
(166, 'C869165', NULL, '', '', '', NULL, 'Male', NULL, '', '', '', '', NULL, NULL, '2025-01-01 06:55:40', '2025-01-01 06:55:40', 0, NULL, NULL, NULL),
(167, 'D6EC166', NULL, '', '', '', NULL, 'Male', NULL, '', '', '', '', NULL, NULL, '2025-01-02 00:28:06', '2025-01-02 00:28:06', 0, NULL, NULL, NULL),
(168, '8F2E167', '', '', '', '', NULL, 'Male', NULL, '', 'bmjmsismsjuj@do-not-respond.me', '', 'FzT0FO_u8A0', NULL, NULL, '2025-01-02 01:22:41', '2025-01-02 01:22:41', 0, NULL, NULL, NULL),
(169, 'A964168', NULL, '', '', '', NULL, 'Male', NULL, '', '', '', '', NULL, NULL, '2025-01-02 19:54:51', '2025-01-02 19:54:51', 0, NULL, NULL, NULL),
(170, '4545169', NULL, '', '', '', NULL, 'Male', NULL, '', '', '', '', NULL, NULL, '2025-01-04 16:28:14', '2025-01-04 16:28:14', 0, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill_items`
--
ALTER TABLE `bill_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors_specializations`
--
ALTER TABLE `doctors_specializations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation_fee_setting`
--
ALTER TABLE `reservation_fee_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule_setting`
--
ALTER TABLE `schedule_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_bundles`
--
ALTER TABLE `service_bundles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_bundle_items`
--
ALTER TABLE `service_bundle_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_cart`
--
ALTER TABLE `service_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specialties`
--
ALTER TABLE `specialties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_notifications`
--
ALTER TABLE `system_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_notification_recipients`
--
ALTER TABLE `system_notification_recipients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_code` (`user_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bill_items`
--
ALTER TABLE `bill_items`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctors_specializations`
--
ALTER TABLE `doctors_specializations`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `reservation_fee_setting`
--
ALTER TABLE `reservation_fee_setting`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `schedule_setting`
--
ALTER TABLE `schedule_setting`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `service_bundles`
--
ALTER TABLE `service_bundles`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_bundle_items`
--
ALTER TABLE `service_bundle_items`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_cart`
--
ALTER TABLE `service_cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `specialties`
--
ALTER TABLE `specialties`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `system_notifications`
--
ALTER TABLE `system_notifications`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=306;

--
-- AUTO_INCREMENT for table `system_notification_recipients`
--
ALTER TABLE `system_notification_recipients`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=306;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
