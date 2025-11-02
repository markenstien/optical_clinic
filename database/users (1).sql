-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2025 at 01:41 AM
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
-- Table structure for table `users`
--

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_code` (`user_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
