-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 03, 2023 at 09:50 PM
-- Server version: 5.7.42-cll-lve
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trust-haven-crm-new`
--

-- --------------------------------------------------------

--
-- Table structure for table `lead_manage_column`
--

CREATE TABLE `lead_manage_column` (
  `id` int(11) NOT NULL,
  `user_id` int(25) NOT NULL,
  `first_name_col` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-Show Column,0-Hide Column',
  `last_name_col` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-Show Column,0-Hide Column',
  `mobile_1_col` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-Show Column,0-Hide Column',
  `mobile_2_col` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-Show Column,0-Hide Column',
  `email_col` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-Show Column,0-Hide Column',
  `lead_status_col` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-Show Column,0-Hide Column',
  `customer_id_col` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-Show Column,0-Hide Column',
  `email_opt_out_col` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-Show Column,0-Hide Column',
  `plan_status_col` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-Show Column,0-Hide Column',
  `plan_col` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-Show Column,0-Hide Column',
  `amount_col` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-Show Column,0-Hide Column',
  `remote_by_col` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-Show Column,0-Hide Column',
  `sale_by_col` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-Show Column,0-Hide Column',
  `worked_by_col` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-Show Column,0-Hide Column',
  `work_status_col` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-Show Column,0-Hide Column',
  `booking_status_col` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-Show Column,0-Hide Column	',
  `courtesy_col` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-Show Column,0-Hide Column',
  `bbb_col` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-Show Column,0-Hide Column',
  `ha_col` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-Show Column,0-Hide Column',
  `fb_col` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-Show Column,0-Hide Column',
  `google_col` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-Show Column,0-Hide Column',
  `service_col` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-Show Column,0-Hide Column',
  `sale_date_col` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-Show Column,0-Hide Column',
  `description_col` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-Show Column,0-Hide Column',
  `date_col` tinyint(4) DEFAULT '1' COMMENT '1-Show Column,0-Hide Column	',
  `time_col` tinyint(4) DEFAULT '1' COMMENT '1-Show Column,0-Hide Column	',
  `amc_plan_col` tinyint(4) DEFAULT '1' COMMENT '	1-Show Column,0-Hide Column'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lead_manage_column`
--

INSERT INTO `lead_manage_column` (`id`, `user_id`, `first_name_col`, `last_name_col`, `mobile_1_col`, `mobile_2_col`, `email_col`, `lead_status_col`, `customer_id_col`, `email_opt_out_col`, `plan_status_col`, `plan_col`, `amount_col`, `remote_by_col`, `sale_by_col`, `worked_by_col`, `work_status_col`, `booking_status_col`, `courtesy_col`, `bbb_col`, `ha_col`, `fb_col`, `google_col`, `service_col`, `sale_date_col`, `description_col`, `date_col`, `time_col`, `amc_plan_col`) VALUES
(1, 40, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(3, 33, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(4, 34, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(5, 35, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(10, 41, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_authencticate_status`
--

CREATE TABLE `tbl_authencticate_status` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'tbl_users.id',
  `auth_status` tinyint(4) NOT NULL COMMENT '1-Login,2-Sleep mode,3-logout',
  `created_date` datetime NOT NULL,
  `mod_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_authencticate_status`
--

INSERT INTO `tbl_authencticate_status` (`id`, `user_id`, `auth_status`, `created_date`, `mod_date`) VALUES
(1, 1, 3, '2023-08-23 16:14:16', '2023-08-30 10:21:41'),
(2, 1, 3, '2023-08-23 16:17:12', '2023-08-28 10:03:08'),
(3, 33, 3, '2023-08-23 16:18:17', '2023-09-19 17:47:48'),
(4, 33, 3, '2023-08-23 16:19:23', '2023-09-19 17:47:48'),
(5, 1, 3, '2023-08-23 16:21:52', '2023-08-28 10:03:08'),
(6, 35, 3, '2023-08-23 16:23:09', '2023-09-11 17:59:18'),
(7, 33, 3, '2023-08-23 16:47:02', '2023-09-19 17:47:48'),
(8, 1, 3, '2023-08-23 16:54:02', '2023-08-28 10:03:08'),
(9, 1, 3, '2023-08-23 16:56:29', '2023-08-28 10:03:08'),
(10, 1, 3, '2023-08-23 16:56:31', '2023-08-28 10:03:08'),
(11, 1, 3, '2023-08-23 16:57:05', '2023-08-28 10:03:08'),
(12, 1, 3, '2023-08-24 10:11:05', '2023-08-28 10:03:08'),
(13, 1, 3, '2023-08-24 16:13:51', '2023-08-28 10:03:08'),
(14, 1, 3, '2023-08-24 16:14:26', '2023-08-28 10:03:08'),
(15, 1, 3, '2023-08-24 16:17:08', '2023-08-28 10:03:08'),
(16, 1, 3, '2023-08-24 16:17:51', '2023-08-28 10:03:08'),
(17, 1, 3, '2023-08-25 09:55:06', '2023-08-28 10:03:08'),
(18, 1, 3, '2023-08-25 12:57:33', '2023-08-28 10:03:08'),
(19, 1, 3, '2023-08-25 15:00:24', '2023-08-28 10:03:08'),
(20, 1, 3, '2023-08-25 15:08:57', '2023-08-28 10:03:08'),
(21, 1, 3, '2023-08-25 17:13:40', '2023-08-28 10:03:08'),
(22, 1, 3, '2023-08-28 09:48:43', '2023-08-28 10:03:08'),
(23, 1, 3, '2023-08-28 09:49:08', '2023-08-28 10:03:08'),
(24, 1, 3, '2023-08-28 12:34:26', '2023-08-29 11:42:14'),
(25, 35, 3, '2023-08-28 14:54:18', '2023-09-11 17:59:18'),
(26, 35, 3, '2023-08-28 14:57:34', '2023-09-11 17:59:18'),
(27, 35, 3, '2023-08-28 17:38:57', '2023-09-11 17:59:18'),
(28, 1, 3, '2023-08-29 11:43:28', '2023-08-30 09:55:44'),
(29, 1, 3, '2023-08-30 09:55:58', '2023-08-30 10:21:41'),
(30, 35, 3, '2023-08-30 10:22:25', '2023-09-11 17:59:18'),
(31, 40, 3, '2023-08-30 10:23:50', '2023-10-03 19:15:13'),
(32, 40, 3, '2023-09-01 09:50:07', '2023-10-03 19:15:13'),
(33, 33, 3, '2023-09-01 13:30:06', '2023-09-19 17:47:48'),
(34, 40, 3, '2023-09-01 13:30:25', '2023-10-03 19:15:13'),
(35, 34, 3, '2023-09-01 13:31:03', '2023-10-03 18:34:27'),
(36, 40, 3, '2023-09-01 13:38:34', '2023-10-03 19:15:13'),
(37, 40, 3, '2023-09-04 09:47:41', '2023-10-03 19:15:13'),
(38, 40, 3, '2023-09-04 10:13:15', '2023-10-03 19:15:13'),
(39, 33, 3, '2023-09-04 10:14:24', '2023-09-19 17:47:48'),
(40, 35, 3, '2023-09-04 11:30:12', '2023-09-11 17:59:18'),
(41, 34, 3, '2023-09-04 11:30:32', '2023-10-03 18:34:27'),
(42, 33, 3, '2023-09-04 11:39:38', '2023-09-19 17:47:48'),
(43, 40, 3, '2023-09-05 09:38:10', '2023-10-03 19:15:13'),
(44, 40, 3, '2023-09-05 16:56:15', '2023-10-03 19:15:13'),
(45, 40, 3, '2023-09-06 09:45:38', '2023-10-03 19:15:13'),
(46, 40, 3, '2023-09-06 17:20:45', '2023-10-03 19:15:13'),
(47, 40, 3, '2023-09-07 09:59:05', '2023-10-03 19:15:13'),
(48, 40, 3, '2023-09-07 12:51:11', '2023-10-03 19:15:13'),
(49, 40, 3, '2023-09-07 16:16:52', '2023-10-03 19:15:13'),
(50, 40, 3, '2023-09-11 09:48:59', '2023-10-03 19:15:13'),
(51, 40, 3, '2023-09-11 12:47:55', '2023-10-03 19:15:13'),
(52, 35, 3, '2023-09-11 17:13:20', '2023-09-11 17:59:18'),
(53, 35, 3, '2023-09-11 17:15:47', '2023-09-11 17:59:18'),
(54, 35, 3, '2023-09-11 17:16:00', '2023-09-11 17:59:18'),
(55, 35, 3, '2023-09-11 17:16:12', '2023-09-11 17:59:18'),
(56, 35, 3, '2023-09-11 17:18:13', '2023-09-11 17:59:18'),
(57, 35, 3, '2023-09-11 17:23:46', '2023-09-11 17:59:18'),
(58, 35, 3, '2023-09-11 17:23:59', '2023-09-11 17:59:18'),
(59, 35, 3, '2023-09-11 17:24:48', '2023-09-11 17:59:18'),
(60, 35, 3, '2023-09-11 17:28:59', '2023-09-11 17:59:18'),
(61, 35, 3, '2023-09-11 17:29:12', '2023-09-11 17:59:18'),
(62, 35, 3, '2023-09-11 17:29:21', '2023-09-11 17:59:18'),
(63, 35, 3, '2023-09-11 17:29:31', '2023-09-11 17:59:18'),
(64, 35, 3, '2023-09-11 17:53:14', '2023-09-11 17:59:18'),
(65, 40, 3, '2023-09-12 12:06:45', '2023-10-03 19:15:13'),
(66, 40, 3, '2023-09-12 16:09:42', '2023-10-03 19:15:13'),
(67, 40, 3, '2023-09-13 09:42:15', '2023-10-03 19:15:13'),
(68, 40, 3, '2023-09-13 09:47:29', '2023-10-03 19:15:13'),
(69, 40, 3, '2023-09-13 11:06:36', '2023-10-03 19:15:13'),
(70, 40, 3, '2023-09-13 11:06:49', '2023-10-03 19:15:13'),
(71, 40, 3, '2023-09-13 11:06:59', '2023-10-03 19:15:13'),
(72, 40, 3, '2023-09-13 11:07:18', '2023-10-03 19:15:13'),
(73, 40, 3, '2023-09-13 11:08:05', '2023-10-03 19:15:13'),
(74, 40, 3, '2023-09-13 11:08:47', '2023-10-03 19:15:13'),
(75, 40, 3, '2023-09-13 15:36:21', '2023-10-03 19:15:13'),
(76, 40, 3, '2023-09-13 15:36:45', '2023-10-03 19:15:13'),
(77, 40, 3, '2023-09-14 11:01:13', '2023-10-03 19:15:13'),
(78, 40, 3, '2023-09-14 13:52:38', '2023-10-03 19:15:13'),
(79, 40, 3, '2023-09-14 13:54:06', '2023-10-03 19:15:13'),
(80, 40, 3, '2023-09-14 13:55:06', '2023-10-03 19:15:13'),
(81, 40, 3, '2023-09-14 14:41:41', '2023-10-03 19:15:13'),
(82, 40, 3, '2023-09-15 10:21:30', '2023-10-03 19:15:13'),
(83, 40, 3, '2023-09-15 11:53:10', '2023-10-03 19:15:13'),
(84, 40, 3, '2023-09-15 15:36:40', '2023-10-03 19:15:13'),
(85, 40, 3, '2023-09-15 16:44:17', '2023-10-03 19:15:13'),
(86, 40, 3, '2023-09-15 17:26:51', '2023-10-03 19:15:13'),
(87, 40, 3, '2023-09-15 17:37:39', '2023-10-03 19:15:13'),
(88, 40, 3, '2023-09-15 17:41:40', '2023-10-03 19:15:13'),
(89, 40, 3, '2023-09-15 17:46:12', '2023-10-03 19:15:13'),
(90, 40, 3, '2023-09-15 18:00:45', '2023-10-03 19:15:13'),
(91, 40, 3, '2023-09-15 18:06:40', '2023-10-03 19:15:13'),
(92, 40, 3, '2023-09-15 18:12:08', '2023-10-03 19:15:13'),
(93, 40, 3, '2023-09-15 18:13:22', '2023-10-03 19:15:13'),
(94, 40, 3, '2023-09-15 18:15:10', '2023-10-03 19:15:13'),
(95, 40, 3, '2023-09-15 18:18:49', '2023-10-03 19:15:13'),
(96, 40, 3, '2023-09-15 18:19:23', '2023-10-03 19:15:13'),
(97, 40, 3, '2023-09-15 18:22:33', '2023-10-03 19:15:13'),
(98, 40, 3, '2023-09-15 18:22:51', '2023-10-03 19:15:13'),
(99, 40, 3, '2023-09-18 11:29:18', '2023-10-03 19:15:13'),
(100, 40, 3, '2023-09-18 13:08:35', '2023-10-03 19:15:13'),
(101, 40, 3, '2023-09-18 13:11:27', '2023-10-03 19:15:13'),
(102, 40, 3, '2023-09-18 13:12:40', '2023-10-03 19:15:13'),
(103, 41, 3, '2023-09-18 15:46:45', '2023-09-18 15:52:13'),
(104, 40, 3, '2023-09-18 15:52:18', '2023-10-03 19:15:13'),
(105, 33, 3, '2023-09-19 17:45:25', '2023-09-19 17:47:48'),
(106, 40, 3, '2023-09-19 17:48:14', '2023-10-03 19:15:13'),
(107, 40, 3, '2023-09-20 09:55:15', '2023-10-03 19:15:13'),
(108, 40, 3, '2023-09-20 10:17:24', '2023-10-03 19:15:13'),
(109, 40, 3, '2023-09-20 11:04:47', '2023-10-03 19:15:13'),
(110, 40, 3, '2023-09-20 17:00:56', '2023-10-03 19:15:13'),
(111, 40, 3, '2023-09-20 18:28:22', '2023-10-03 19:15:13'),
(112, 40, 3, '2023-09-21 09:46:06', '2023-10-03 19:15:13'),
(113, 40, 3, '2023-09-21 10:09:10', '2023-10-03 19:15:13'),
(114, 40, 3, '2023-09-21 11:05:26', '2023-10-03 19:15:13'),
(115, 40, 3, '2023-09-21 12:28:29', '2023-10-03 19:15:13'),
(116, 40, 3, '2023-09-21 15:50:20', '2023-10-03 19:15:13'),
(117, 40, 3, '2023-09-22 09:40:46', '2023-10-03 19:15:13'),
(118, 40, 3, '2023-09-22 12:28:18', '2023-10-03 19:15:13'),
(119, 40, 3, '2023-09-22 14:52:14', '2023-10-03 19:15:13'),
(120, 40, 3, '2023-09-25 09:39:50', '2023-10-03 19:15:13'),
(121, 40, 3, '2023-09-25 09:51:02', '2023-10-03 19:15:13'),
(122, 40, 3, '2023-09-25 12:00:29', '2023-10-03 19:15:13'),
(123, 40, 3, '2023-09-25 15:49:48', '2023-10-03 19:15:13'),
(124, 40, 3, '2023-09-25 18:26:51', '2023-10-03 19:15:13'),
(125, 40, 3, '2023-09-25 18:27:03', '2023-10-03 19:15:13'),
(126, 40, 3, '2023-09-26 10:00:41', '2023-10-03 19:15:13'),
(127, 40, 3, '2023-09-26 17:51:24', '2023-10-03 19:15:13'),
(128, 40, 3, '2023-09-27 11:08:22', '2023-10-03 19:15:13'),
(129, 40, 3, '2023-09-27 11:08:34', '2023-10-03 19:15:13'),
(130, 40, 3, '2023-09-27 11:12:40', '2023-10-03 19:15:13'),
(131, 40, 3, '2023-09-27 11:12:49', '2023-10-03 19:15:13'),
(132, 40, 3, '2023-09-27 11:15:18', '2023-10-03 19:15:13'),
(133, 40, 3, '2023-09-27 11:15:34', '2023-10-03 19:15:13'),
(134, 40, 3, '2023-09-28 12:28:54', '2023-10-03 19:15:13'),
(135, 40, 3, '2023-09-28 13:29:03', '2023-10-03 19:15:13'),
(136, 40, 3, '2023-09-28 13:29:12', '2023-10-03 19:15:13'),
(137, 40, 3, '2023-09-28 13:29:19', '2023-10-03 19:15:13'),
(138, 40, 3, '2023-09-28 13:30:35', '2023-10-03 19:15:13'),
(139, 40, 3, '2023-09-28 18:47:00', '2023-10-03 19:15:13'),
(140, 40, 3, '2023-09-29 12:08:21', '2023-10-03 19:15:13'),
(141, 40, 3, '2023-09-29 12:14:19', '2023-10-03 19:15:13'),
(142, 40, 3, '2023-09-29 12:27:43', '2023-10-03 19:15:13'),
(143, 40, 3, '2023-09-29 12:28:31', '2023-10-03 19:15:13'),
(144, 40, 3, '2023-09-29 12:33:00', '2023-10-03 19:15:13'),
(145, 40, 3, '2023-09-29 12:33:25', '2023-10-03 19:15:13'),
(146, 40, 3, '2023-09-29 12:37:01', '2023-10-03 19:15:13'),
(147, 40, 3, '2023-09-29 12:44:42', '2023-10-03 19:15:13'),
(148, 40, 3, '2023-09-29 13:46:36', '2023-10-03 19:15:13'),
(149, 40, 3, '2023-09-29 13:50:10', '2023-10-03 19:15:13'),
(150, 40, 3, '2023-09-29 13:52:09', '2023-10-03 19:15:13'),
(151, 40, 3, '2023-09-29 15:23:30', '2023-10-03 19:15:13'),
(152, 40, 3, '2023-09-29 18:02:43', '2023-10-03 19:15:13'),
(153, 40, 3, '2023-10-03 10:26:53', '2023-10-03 19:15:13'),
(154, 40, 3, '2023-10-03 11:54:36', '2023-10-03 19:15:13'),
(155, 40, 3, '2023-10-03 13:40:06', '2023-10-03 19:15:13'),
(156, 40, 3, '2023-10-03 15:11:05', '2023-10-03 19:15:13'),
(157, 40, 3, '2023-10-03 15:11:25', '2023-10-03 19:15:13'),
(158, 40, 3, '2023-10-03 15:36:38', '2023-10-03 19:15:13'),
(159, 40, 3, '2023-10-03 15:45:02', '2023-10-03 19:15:13'),
(160, 40, 3, '2023-10-03 17:35:06', '2023-10-03 19:15:13'),
(161, 40, 3, '2023-10-03 17:35:29', '2023-10-03 19:15:13'),
(162, 40, 3, '2023-10-03 17:44:42', '2023-10-03 19:15:13'),
(163, 40, 3, '2023-10-03 17:48:24', '2023-10-03 19:15:13'),
(164, 40, 3, '2023-10-03 17:52:21', '2023-10-03 19:15:13'),
(165, 40, 3, '2023-10-03 17:52:39', '2023-10-03 19:15:13'),
(166, 40, 3, '2023-10-03 17:53:02', '2023-10-03 19:15:13'),
(167, 40, 3, '2023-10-03 17:53:46', '2023-10-03 19:15:13'),
(168, 40, 3, '2023-10-03 17:54:09', '2023-10-03 19:15:13'),
(169, 40, 3, '2023-10-03 18:00:48', '2023-10-03 19:15:13'),
(170, 40, 3, '2023-10-03 18:10:29', '2023-10-03 19:15:13'),
(171, 40, 3, '2023-10-03 18:12:53', '2023-10-03 19:15:13'),
(172, 40, 3, '2023-10-03 18:29:45', '2023-10-03 19:15:13'),
(173, 40, 3, '2023-10-03 18:31:05', '2023-10-03 19:15:13'),
(174, 34, 3, '2023-10-03 18:32:00', '2023-10-03 18:34:27'),
(175, 34, 3, '2023-10-03 18:32:58', '2023-10-03 18:34:27'),
(176, 34, 3, '2023-10-03 18:34:11', '2023-10-03 18:34:27'),
(177, 40, 3, '2023-10-03 18:35:13', '2023-10-03 19:15:13'),
(178, 40, 3, '2023-10-03 18:36:28', '2023-10-03 19:15:13'),
(179, 34, 3, '2023-10-03 18:36:57', '2023-10-04 09:42:03'),
(180, 40, 3, '2023-10-03 18:57:38', '2023-10-03 19:15:13'),
(181, 40, 3, '2023-10-03 19:15:12', '2023-10-03 19:15:13'),
(182, 40, 1, '2023-10-04 10:12:15', '0000-00-00 00:00:00'),
(183, 40, 1, '2023-10-04 10:19:34', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_billing`
--

CREATE TABLE `tbl_billing` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `address` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zip_code` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-Active,2-InActive,3-Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bookings`
--

CREATE TABLE `tbl_bookings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'tbl_user.id',
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `mobile_1` varchar(25) NOT NULL,
  `mobile_2` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date` varchar(20) NOT NULL,
  `time` varchar(520) DEFAULT NULL,
  `timezone` tinyint(4) DEFAULT '0' COMMENT '1-EST,2-CST,3-PST,4-MST',
  `created_date` datetime NOT NULL,
  `mod_date` datetime NOT NULL,
  `status` tinyint(4) DEFAULT '1' COMMENT '1-Active,2-Inactive,3-Deleted',
  `booking_reminder_status` tinyint(4) DEFAULT '0' COMMENT '1-Active,2-Closed  ',
  `reminder_time` int(11) DEFAULT NULL COMMENT '1-One Time Reminder,2- Two Time Reminder',
  `remind_time_status` int(11) DEFAULT NULL COMMENT '1-One Time,2-Two Time',
  `reminder_status` int(11) DEFAULT NULL COMMENT '1-Active,2-InActive',
  `booking_status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-Open,2-Pending,3-Close'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_bookings`
--

INSERT INTO `tbl_bookings` (`id`, `user_id`, `first_name`, `last_name`, `mobile_1`, `mobile_2`, `email`, `date`, `time`, `timezone`, `created_date`, `mod_date`, `status`, `booking_reminder_status`, `reminder_time`, `remind_time_status`, `reminder_status`, `booking_status`) VALUES
(1, 40, '4', 'Jaiswal', '9988552211', '9966332211', 'ankit.cotginanalytics@gmail.com', '09-29-2023', '13:01', 3, '2023-09-29 01:59:10', '2023-09-29 04:09:24', 1, 2, 2, NULL, 2, 1),
(2, 40, '2', 'Jaiswal', '7011929337', '8855669988', 'ankit.cotginanalytics@gmail.com', '09-29-2023', '16:12', 2, '2023-09-29 04:09:56', '0000-00-00 00:00:00', 1, 2, 2, NULL, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_email`
--

CREATE TABLE `tbl_email` (
  `id` int(11) NOT NULL,
  `lead_id` varchar(255) DEFAULT NULL,
  `sender_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'tbl_user.id',
  `module_type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-Lead Module,2-Callback,3-New Lead Module,4 techcrm-Lead-Module,5-techcrm-Contact-Module,6-techcrm-Booking-Module',
  `too` varchar(255) DEFAULT NULL,
  `cc` varchar(255) DEFAULT NULL,
  `bcc` varchar(250) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `sent_by_email` varchar(555) NOT NULL,
  `sent_by_name` varchar(555) NOT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `mail_status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-Send Email , 2-Draft Email',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-Active,2-Inactive,3-Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_email`
--

INSERT INTO `tbl_email` (`id`, `lead_id`, `sender_id`, `user_id`, `module_type`, `too`, `cc`, `bcc`, `subject`, `message`, `sent_by_email`, `sent_by_name`, `created_at`, `mail_status`, `status`) VALUES
(1, '3', 1, 40, 4, 'testinguser@gmail.com', '', '', 'testing mail', '<p>testing mail&nbsp;testing mail&nbsp;testing mail&nbsp;testing mail&nbsp;</p>\r\n', 'cotginanalytics@gmail.com', 'Trust Haven Solution', '2023-10-04 10:15:13', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_email_setup`
--

CREATE TABLE `tbl_email_setup` (
  `id` int(11) NOT NULL,
  `sender_name` varchar(200) NOT NULL,
  `sender_email` varchar(255) NOT NULL,
  `sender_status` enum('1','2') NOT NULL DEFAULT '2' COMMENT '1=Active For Mail, 2= Deactive For Mail',
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `mod_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-Active,2-InActive,3-Deleted	'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_email_setup`
--

INSERT INTO `tbl_email_setup` (`id`, `sender_name`, `sender_email`, `sender_status`, `created_date`, `mod_date`, `status`) VALUES
(1, 'Trust Haven Solution', 'cotginanalytics@gmail.com', '1', '2023-08-25 11:54:59', '2023-08-23 04:40:29', 1),
(6, 'reply mail trust haven', 'trusthavensolution@gmail.com', '2', '2023-09-20 11:56:40', '2023-09-20 11:56:40', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoice`
--

CREATE TABLE `tbl_invoice` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_number` varchar(100) NOT NULL,
  `order_number` varchar(20) DEFAULT NULL,
  `first_name` varchar(150) NOT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `mobile_1` varchar(20) NOT NULL,
  `mobile_2` varchar(20) DEFAULT NULL,
  `date` varchar(100) NOT NULL,
  `due_date` varchar(30) DEFAULT NULL,
  `description` longtext,
  `tax_percentage` int(11) DEFAULT NULL,
  `taxable` varchar(50) DEFAULT NULL COMMENT '1-taxable,0-non taxable',
  `other_charges` varchar(50) DEFAULT NULL,
  `discount` varchar(50) DEFAULT NULL,
  `discount_amount` varchar(50) DEFAULT NULL,
  `invoice_status` int(11) NOT NULL DEFAULT '1' COMMENT '1-send,2-save as draft',
  `created_date` datetime NOT NULL,
  `mod_date` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-active,2-inactive,3-deleted',
  `payment_status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-Pending,2-Paid',
  `payment_date` varchar(25) DEFAULT NULL,
  `subject` text,
  `custom_notes` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_invoice`
--

INSERT INTO `tbl_invoice` (`id`, `user_id`, `invoice_number`, `order_number`, `first_name`, `last_name`, `email`, `mobile_1`, `mobile_2`, `date`, `due_date`, `description`, `tax_percentage`, `taxable`, `other_charges`, `discount`, `discount_amount`, `invoice_status`, `created_date`, `mod_date`, `status`, `payment_status`, `payment_date`, `subject`, `custom_notes`) VALUES
(1, 40, 'INV-0100', 'ORDER-0100', '2', 'Jaiswal', 'ankit.cotginanalytics@gmail.com', '7011929337', '', '2023-09-29', '2023-10-31', 'All the payments made for repair and service can only be partially refunded within 30 days. Payments made against any software purchases cannot be refunded once software is installed on the customer\'s device. Products once sold cannot be returned. Exchange only in 3 days from Invoice Date.', 10, '97100', '2000', '5', '51000', 1, '2023-09-29 03:53:08', '0000-00-00 00:00:00', 3, 1, NULL, 'Invoice Testing', 'All the payments made for repair and service can only be partially refunded within 30 days. Payments made against any software purchases cannot be refunded once software is installed on the customer\'s device. Products once sold cannot be returned. Exchange only in 3 days from Invoice Date.'),
(2, 40, 'INV-01001', 'ORDER-01001', '2', 'Jaiswal', 'ankit.cotginanalytics@gmail.com', '7011929337', '', '2023-09-29', '2023-10-29', 'All the payments made for repair and service can only be partially refunded within 30 days. Payments made against any software purchases cannot be refunded once software is installed on the customer\'s device. Products once sold cannot be returned. Exchange only in 3 days from Invoice Date.', 0, '0', '0', '0100', '10000', 1, '2023-09-29 03:59:16', '0000-00-00 00:00:00', 1, 1, NULL, 'testing', 'All the payments made for repair and service can only be partially refunded within 30 days. Payments made against any software purchases cannot be refunded once software is installed on the customer\'s device. Products once sold cannot be returned. Exchange only in 3 days from Invoice Date.'),
(3, 40, 'INV-01002', 'ORDER-01002', '2', 'Jaiswal', 'ankit.cotginanalytics@gmail.com', '7011929337', '', '2023-09-29', '2023-09-29', 'All the payments made for repair and service can only be partially refunded within 30 days. Payments made against any software purchases cannot be refunded once software is installed on the customer\'s device. Products once sold cannot be returned. Exchange only in 3 days from Invoice Date.', 0, '0', '0', '0100', '10000', 1, '2023-09-29 04:01:28', '0000-00-00 00:00:00', 1, 1, NULL, 'Testing', 'All the payments made for repair and service can only be partially refunded within 30 days. Payments made against any software purchases cannot be refunded once software is installed on the customer\'s device. Products once sold cannot be returned. Exchange only in 3 days from Invoice Date.'),
(4, 40, 'INV-01003', 'ORDER-01003', '5', '0', 'fazlu.cotginanalytics@gmail.com', '2', '8699826396', '2023-09-29', '2023-10-29', 'All the payments made for repair and service can only be partially refunded within 30 days. Payments made against any software purchases cannot be refunded once software is installed on the customer\'s device. Products once sold cannot be returned. Exchange only in 3 days from Invoice Date.', 0, '0', '0', '0', '0', 1, '2023-09-29 04:59:53', '0000-00-00 00:00:00', 3, 1, NULL, 'testing invoice', 'All the payments made for repair and service can only be partially refunded within 30 days. Payments made against any software purchases cannot be refunded once software is installed on the customer\'s device. Products once sold cannot be returned. Exchange only in 3 days from Invoice Date.'),
(8, 40, 'INV-01004', 'ORDER-01004', '2', 'Jaiswal', 'ankit.cotginanalytics@gmail.com', '7011929337', '', '2023-09-30', '2023-11-13', 'All the payments made for repair and service can only be partially refunded within 30 days. Payments made against any software purchases cannot be refunded once software is installed on the customer\'s device. Products once sold cannot be returned. Exchange only in 3 days from Invoice Date.', 5, '550', '2000', '10', '1000', 1, '2023-09-29 06:17:49', '0000-00-00 00:00:00', 1, 1, NULL, 'Testing', 'All the payments made for repair and service can only be partially refunded within 30 days. Payments made against any software purchases cannot be refunded once software is installed on the customer\'s device. Products once sold cannot be returned. Exchange only in 3 days from Invoice Date.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_items`
--

CREATE TABLE `tbl_items` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `item` text NOT NULL,
  `description` text,
  `quantity` int(11) NOT NULL,
  `amount` decimal(16,4) NOT NULL,
  `created_date` datetime NOT NULL,
  `mod_date` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-Active,2-Inactive,3-Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_items`
--

INSERT INTO `tbl_items` (`id`, `user_id`, `invoice_id`, `item`, `description`, `quantity`, `amount`, `created_date`, `mod_date`, `status`) VALUES
(1, 40, 1, 'Laptop', NULL, 10, '20000.0000', '2023-09-29 03:53:08', '0000-00-00 00:00:00', 1),
(2, 40, 1, 'Desktop', NULL, 10, '30000.0000', '2023-09-29 03:53:08', '0000-00-00 00:00:00', 1),
(3, 40, 1, 'Keyboard & Mouse', NULL, 20, '1000.0000', '2023-09-29 03:53:08', '0000-00-00 00:00:00', 1),
(4, 40, 1, 'Charger', NULL, 10, '50000.0000', '2023-09-29 03:53:08', '0000-00-00 00:00:00', 1),
(5, 40, 2, 'Laptop', NULL, 1, '10000.0000', '2023-09-29 03:59:16', '0000-00-00 00:00:00', 1),
(6, 40, 3, 'Laptop', NULL, 1, '10000.0000', '2023-09-29 04:01:28', '0000-00-00 00:00:00', 1),
(7, 40, 4, 'Laptop', NULL, 1, '10.2000', '2023-09-29 04:59:53', '0000-00-00 00:00:00', 1),
(12, 40, 8, 'Laptop', NULL, 1, '10000.0000', '2023-09-29 06:17:49', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leads`
--

CREATE TABLE `tbl_leads` (
  `lead_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'tbl_users.id',
  `name` varchar(255) NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `other_phone` varchar(255) DEFAULT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `issue` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `date_of_sale` varchar(255) DEFAULT NULL,
  `lead_status` tinyint(4) NOT NULL COMMENT '1-Call Back,2-Sale,3-Not interested,4-VM,5-DND',
  `address` longtext NOT NULL,
  `lead_callback_date` varchar(255) DEFAULT NULL,
  `callback_time` varchar(255) DEFAULT NULL,
  `time_zone` tinyint(4) DEFAULT NULL COMMENT '	1-PST,2-MST,3-CST,4-EST',
  `type_of_lead` tinyint(4) NOT NULL COMMENT '1-lead,2-callback,3-newlead,4-imported',
  `description` longtext,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-Active,2-Inactive,3-Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leads_duplicate`
--

CREATE TABLE `tbl_leads_duplicate` (
  `lead_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'tbl_users.id',
  `duplicate_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `other_phone` varchar(255) DEFAULT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `issue` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `date_of_sale` varchar(255) DEFAULT NULL,
  `lead_status` tinyint(4) NOT NULL COMMENT '1-Call Back,2-Sale,3-Not interested,4-VM,5-DND',
  `address` longtext NOT NULL,
  `time_zone` tinyint(4) DEFAULT NULL COMMENT '	1-PST,2-MST,3-CST,4-EST',
  `type_of_lead` tinyint(4) NOT NULL COMMENT '1-lead,2-callback,3-newlead,4-imported',
  `description` longtext,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-Active,2-Inactive,3-Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leads_note`
--

CREATE TABLE `tbl_leads_note` (
  `id` int(11) NOT NULL,
  `lead_id` varchar(255) DEFAULT NULL,
  `module_type` tinyint(4) NOT NULL COMMENT '1-Lead,2-Callback,3-New Lead',
  `note` longtext,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-Active,2-Inactive,3-Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lead_contact_user`
--

CREATE TABLE `tbl_lead_contact_user` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'tbl_user.id',
  `lead_id` int(11) DEFAULT NULL COMMENT 'tbl_leads.id',
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `mobile_1` varchar(50) NOT NULL,
  `mobile_2` varchar(50) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `type_of_lead` tinyint(4) NOT NULL COMMENT '1-salescrm-import,2-techcrm,3-sales-crm-manual',
  `customer_id` varchar(255) DEFAULT NULL,
  `email_opt_out` tinyint(4) DEFAULT '0' COMMENT '1-Email-Opt-Out',
  `plan_status` tinyint(4) DEFAULT NULL COMMENT '1-Active,2-Refunded Or Cancelled,3-DND,4-Voided',
  `plan` varchar(255) DEFAULT NULL,
  `amc_plan` int(11) DEFAULT NULL,
  `amount` decimal(16,2) DEFAULT NULL,
  `remote_id` int(11) DEFAULT NULL COMMENT 'tbl_remote.id',
  `sale_id` int(11) DEFAULT NULL COMMENT 'tbl_sale_status.id',
  `worked_id` int(11) DEFAULT NULL COMMENT 'tbl_work_status.id',
  `work_status` tinyint(11) DEFAULT NULL COMMENT '1-Pending,2-Done',
  `courtesy` tinyint(11) DEFAULT NULL COMMENT '1-Pending,2-Done',
  `bbb` tinyint(4) DEFAULT NULL COMMENT '1-True',
  `ha` tinyint(4) DEFAULT NULL COMMENT '1-True',
  `fb` tinyint(4) DEFAULT NULL COMMENT '1-True',
  `google` tinyint(4) DEFAULT NULL COMMENT '1-True',
  `service` tinyint(4) DEFAULT NULL COMMENT '1-True',
  `sale_date` varchar(255) DEFAULT NULL,
  `user_type` tinyint(4) NOT NULL COMMENT '1-Lead User,2-Contacts User',
  `data_type` tinyint(4) DEFAULT '1' COMMENT '1-Normal user detail,2-custom user detail',
  `lead_status` tinyint(4) DEFAULT NULL COMMENT '1-Call Back,2-Sale,3-Not interested,4-VM,5-DND',
  `tech_user_id` int(11) DEFAULT NULL,
  `transfer_lead_status` tinyint(4) DEFAULT '1' COMMENT '1-Not Transfer,2-Transfer to tech',
  `tech_lead_status` tinyint(4) DEFAULT NULL COMMENT '1-Close,2-Pending',
  `tech_lead_notes` text,
  `description` longtext,
  `created_date` datetime NOT NULL,
  `mod_date` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-Active,2-Inactive,3-Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_lead_contact_user`
--

INSERT INTO `tbl_lead_contact_user` (`id`, `user_id`, `lead_id`, `first_name`, `last_name`, `mobile_1`, `mobile_2`, `email`, `address`, `type_of_lead`, `customer_id`, `email_opt_out`, `plan_status`, `plan`, `amc_plan`, `amount`, `remote_id`, `sale_id`, `worked_id`, `work_status`, `courtesy`, `bbb`, `ha`, `fb`, `google`, `service`, `sale_date`, `user_type`, `data_type`, `lead_status`, `tech_user_id`, `transfer_lead_status`, `tech_lead_status`, `tech_lead_notes`, `description`, `created_date`, `mod_date`, `status`) VALUES
(2, 40, NULL, 'Ankit', 'Jaiswal', '7011929337', '', 'ankit.cotginanalytics@gmail.com', NULL, 2, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 4, NULL, 1, NULL, NULL, 'Testing Purpose Only', '2023-09-29 12:43:27', '0000-00-00 00:00:00', 1),
(3, 40, NULL, 'Testing ', 'User', '9876543210', '9123456789', 'testinguser@gmail.com', NULL, 2, 'Test9876', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 4, NULL, 1, NULL, NULL, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus facere earum illum dolore, atque, excepturi pariatur natus sunt accusantium maxime eius et, eaque temporibus impedit nemo possimus doloremque. Veniam quidem voluptates eius molestias ipsam nesciunt id maiores. Autem amet dicta har', '2023-09-29 12:44:16', '2023-09-29 01:09:07', 1),
(4, 40, NULL, 'Ankit ', 'Jaiswal', '9988552211', '9966332211', 'ankit.cotginanalytic@gmail.com', NULL, 0, 'Anki9988', 0, 1, 'Testing Plan', 5, '85000.00', 38, 2, 7, 1, 1, 0, 0, 0, 0, 0, '09-29-2023', 2, 1, NULL, NULL, 1, NULL, NULL, '    Testing Contact detail', '2023-09-29 01:43:20', '0000-00-00 00:00:00', 1),
(5, 40, NULL, 'ssss', '0', '2', '8699826396', 'fazlu.cotginanalytics@gmail.com', NULL, 0, 'ssss2', 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, '09-29-2023', 2, 2, 2, NULL, 1, NULL, NULL, NULL, '2023-09-29 04:59:53', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_log`
--

CREATE TABLE `tbl_log` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL COMMENT 'tbl_register.id',
  `insert_id` int(11) NOT NULL,
  `authentication_status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-Login,2-Sleep Mode,3-Logout',
  `title` text NOT NULL,
  `created_date` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-Active,2-Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_log`
--

INSERT INTO `tbl_log` (`id`, `user_id`, `insert_id`, `authentication_status`, `title`, `created_date`, `status`) VALUES
(1, 35, 35, 1, 'Login User Name  - fazlu.ths', '2023-08-30 10:22:25', 1),
(2, 35, 35, 1, 'Logout User Name  - fazlu.ths', '2023-08-30 10:23:42', 1),
(3, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-08-30 10:23:50', 1),
(4, 40, 20, 1, 'Add Lead  - {\"first_name\":\"Fazlu \",\"last_name\":\"Rehman\",\"mobile_1\":\"3298482348\",\"mobile_2\":\"2389423898\",\"email\":\"fazlu.cotginanalytics@gmail.com\",\"description\":\"Fazlu description\",\"lead_status\":\"1\",\"created_date\":\"2023-08-30,10:25:46\",\"user_type\":1,\"user_id\":\"40\"}', '2023-08-30 10:25:46', 1),
(5, 40, 20, 1, 'Update Lead  - {\"first_name\":\"Fazlu \",\"last_name\":\"Rehman\",\"mobile_1\":\"3298482348\",\"mobile_2\":\"2389423898\",\"email\":\"fazlu.cotginanalytics@gmail.com\",\"description\":\"Fazlu description\",\"lead_status\":\"1\",\"created_date\":\"2023-08-30,10:26:41\",\"user_type\":1,\"customer_id\":\"Fazl3298\",\"user_id\":\"40\"}', '2023-08-30 10:26:41', 1),
(6, 40, 21, 1, 'Add Lead  - {\"first_name\":\"fazlu\",\"last_name\":\"rehman\",\"mobile_1\":\"2349848923\",\"mobile_2\":\"8948948948\",\"email\":\"fazlu.cotginanalystic@gmail.com\",\"description\":\"fazlu description\",\"lead_status\":\"3\",\"created_date\":\"2023-08-30,10:27:09\",\"user_type\":1,\"user_id\":\"40\"}', '2023-08-30 10:27:09', 1),
(7, 40, 22, 1, 'Add Lead  - {\"first_name\":\"fazlu\",\"last_name\":\"Rehman\",\"mobile_1\":\"9834908549\",\"mobile_2\":\"9898985895\",\"email\":\"fazlu.cotginanalystic@gmail.com\",\"description\":\"Fazlu Description\",\"lead_status\":\"3\",\"created_date\":\"2023-08-30,11:27:24\",\"user_type\":1,\"user_id\":\"40\"}', '2023-08-30 11:27:24', 1),
(8, 40, 22, 1, 'Update Detail Page Lead  - {\"first_name\":\"fazlu\",\"last_name\":\"Rehman\",\"mobile_1\":\"9834908549\",\"mobile_2\":\"9898985895\",\"email\":\"fazlu.cotginanalystic@gmail.com\",\"lead_status\":\"2\",\"created_date\":\"2023-08-30,11:55:25\",\"user_type\":2,\"work_status\":2,\"plan_status\":1,\"sale_date\":\"08-30-2023\",\"customer_id\":\"fazl9834\",\"user_id\":\"40\"}', '2023-08-30 11:55:27', 1),
(9, 40, 22, 1, 'Update Contact  - {\"first_name\":\"fazlu\",\"last_name\":\"Rehman\",\"mobile_1\":\"9834908549\",\"mobile_2\":\"9898985895\",\"email\":\"fazlu.cotginanalystic@gmail.com\",\"customer_id\":\"fazl9834\",\"email_opt_out\":null,\"plan_status\":\"1\",\"plan\":\"\",\"amount\":\"\",\"remote_id\":\"\",\"sale_id\":\"\",\"worked_id\":\"\",\"work_status\":\"2\",\"courtesy\":\"2\",\"bbb\":\"1\",\"ha\":null,\"fb\":null,\"google\":\"1\",\"service\":\"1\",\"sale_date\":\"08-30-2023\",\"description\":\" Fazlu Description\",\"created_date\":\"2023-08-30,11:56:19\",\"user_type\":2,\"user_id\":\"40\"}', '2023-08-30 11:56:19', 1),
(10, 40, 22, 1, 'Update Contact Detail Page  - {\"first_name\":\"fazlu\",\"last_name\":\"Rehman\",\"mobile_1\":\"9834908549\",\"mobile_2\":\"9898985895\",\"email\":\"fazlu.cotginanalystic@gmail.com\",\"customer_id\":\"fazl9834\",\"email_opt_out\":null,\"plan_status\":\"1\",\"plan\":\"\",\"amount\":\"0.00\",\"remote_id\":\"\",\"sale_id\":\"\",\"worked_id\":\"\",\"work_status\":\"2\",\"courtesy\":\"2\",\"bbb\":\"1\",\"ha\":\"0\",\"fb\":\"0\",\"google\":\"1\",\"service\":\"1\",\"sale_date\":\"01-01-1970\"}', '2023-08-30 12:25:48', 1),
(11, 40, 22, 1, 'Update Contact Detail Page  - {\"first_name\":\"fazlu\",\"last_name\":\"Rehman\",\"mobile_1\":\"9834908549\",\"mobile_2\":\"9898985895\",\"email\":\"fazlu.cotginanalystic@gmail.com\",\"customer_id\":\"fazl9834\",\"email_opt_out\":null,\"plan_status\":\"1\",\"plan\":\"\",\"amount\":\"0.00\",\"remote_id\":\"\",\"sale_id\":\"\",\"worked_id\":\"\",\"work_status\":\"2\",\"courtesy\":\"2\",\"bbb\":\"1\",\"ha\":\"0\",\"fb\":\"0\",\"google\":\"1\",\"service\":\"1\",\"sale_date\":\"01-01-1970\"}', '2023-08-30 12:25:49', 1),
(12, 40, 22, 1, 'Update Contact Detail Page  - {\"first_name\":\"fazlu\",\"last_name\":\"Rehman\",\"mobile_1\":\"9834908549\",\"mobile_2\":\"9898985895\",\"email\":\"fazlu.cotginanalystic@gmail.com\",\"customer_id\":\"fazl9834\",\"email_opt_out\":null,\"plan_status\":\"1\",\"plan\":\"\",\"amount\":\"0.00\",\"remote_id\":\"\",\"sale_id\":\"\",\"worked_id\":\"\",\"work_status\":\"2\",\"courtesy\":\"2\",\"bbb\":\"1\",\"ha\":\"0\",\"fb\":\"0\",\"google\":\"1\",\"service\":\"1\",\"sale_date\":\"01-01-1970\"}', '2023-08-30 12:36:57', 1),
(13, 40, 22, 1, 'Update Contact Detail Page  - {\"first_name\":\"fazlu\",\"last_name\":\"Rehman\",\"mobile_1\":\"9834908549\",\"mobile_2\":\"9898985895\",\"email\":\"fazlu.cotginanalystic@gmail.com\",\"customer_id\":\"fazl9834\",\"email_opt_out\":null,\"plan_status\":\"1\",\"plan\":\"\",\"amount\":\"0.00\",\"remote_id\":\"\",\"sale_id\":\"\",\"worked_id\":\"\",\"work_status\":\"2\",\"courtesy\":\"2\",\"bbb\":\"1\",\"ha\":\"0\",\"fb\":\"0\",\"google\":\"1\",\"service\":\"1\",\"sale_date\":\"01-01-1970\"}', '2023-08-30 12:39:40', 1),
(14, 40, 23, 1, 'Add Lead  - {\"first_name\":\"Fazlu\",\"last_name\":\"Rehman\",\"mobile_1\":\"9837353492\",\"mobile_2\":\"8957493007\",\"email\":\"fazlu.cotginanalytics@gmail.com\",\"description\":\"fazlu description\",\"lead_status\":\"3\",\"created_date\":\"2023-08-30,12:46:41\",\"user_type\":1,\"type_of_lead\":2,\"user_id\":\"40\"}', '2023-08-30 12:46:41', 1),
(15, 40, 3, 1, 'Add Lead Sales Crm - {\"created_at\":\"2023-08-30 12:48:19\",\"user_id\":\"40\",\"name\":\"atul\",\"last_name\":\"kumar\",\"date_of_sale\":\"2023-08-30\",\"phone\":\"7568416166\",\"type_of_lead\":1,\"payment_method\":\"Cash\",\"other_phone\":\"2415153165\",\"company_name\":\"Cotgin Analytics\",\"email\":\"atul.cotginanalytics@gmail.com\",\"password\":\"fazlu@123\",\"issue\":\"No Issue\",\"amount\":\"9233992\",\"description\":\" fazlu description  \",\"lead_status\":\"4\",\"address\":\"mustafabad\"}', '2023-08-30 12:48:19', 1),
(16, NULL, 3, 1, 'Update Lead Sales Crm  - {\"updated_at\":\"2023-08-30 12:48:40\",\"name\":\"atul\",\"last_name\":\"kumar\",\"date_of_sale\":\"2023-08-30\",\"phone\":\"7568416166\",\"other_phone\":\"2415153165\",\"payment_method\":\"Cash\",\"company_name\":\"Cotgin Analytics\",\"email\":\"atul.cotginanalytics@gmail.com\",\"type_of_lead\":1,\"password\":\"fazlu@123\",\"issue\":\"No Issue\",\"amount\":\"9233992\",\"description\":\"  fazlu description  \",\"lead_status\":\"2\",\"address\":\"mustafabad\"}', '2023-08-30 12:48:42', 1),
(17, 40, 4, 1, 'Update Lead Sales Crm  - {\"updated_at\":\"2023-08-30 12:53:59\",\"name\":\"Fazlu \",\"last_name\":\"Rehman\",\"date_of_sale\":\"2023-08-30\",\"phone\":\"7428059960\",\"other_phone\":\"7291067314\",\"payment_method\":\"Test\",\"company_name\":\"Cotgin\",\"email\":\"fazlu11.cotginanalytics@gmail.com\",\"type_of_lead\":1,\"password\":\"fazlu@123\",\"issue\":\"no issue\",\"amount\":\"600$\",\"description\":\" Fazlu Description\",\"lead_status\":\"4\",\"address\":\"Bhajanpura\"}', '2023-08-30 12:53:59', 1),
(18, NULL, 4, 1, 'Update Lead Sales Crm  - {\"updated_at\":\"2023-08-30 12:54:31\",\"name\":\"Fazlu \",\"last_name\":\"Rehman\",\"date_of_sale\":\"2023-08-30\",\"phone\":\"7428059960\",\"other_phone\":\"7291067314\",\"payment_method\":\"Test\",\"company_name\":\"Cotgin\",\"email\":\"fazlu11.cotginanalytics@gmail.com\",\"type_of_lead\":1,\"password\":\"fazlu@123\",\"issue\":\"no issue\",\"amount\":\"600$\",\"description\":\"  Fazlu Description\",\"lead_status\":\"2\",\"address\":\"Bhajanpura\"}', '2023-08-30 12:54:33', 1),
(19, NULL, 6, 1, 'Update Lead Sales Crm  - {\"updated_at\":\"2023-08-30 01:00:00\",\"name\":\"Fazlu \",\"last_name\":\"Rehman\",\"date_of_sale\":\"2023-08-24\",\"phone\":\"4444444444\",\"other_phone\":\"7291067314\",\"payment_method\":\"Test\",\"company_name\":\"Cotgin\",\"email\":\"fazsslu11.cotginanalytics@gmail.com\",\"type_of_lead\":1,\"password\":\"fazlu@123\",\"issue\":\"no issue\",\"amount\":\"600$\",\"description\":\" Fazlu Description\",\"lead_status\":\"2\",\"address\":\"Bhajanpura\"}', '2023-08-30 13:00:02', 1),
(20, 40, 27, 1, 'Add Lead  - {\"first_name\":\"Ankit\",\"last_name\":\"Jaiswal\",\"mobile_1\":\"9834893298\",\"mobile_2\":\"8489348998\",\"email\":\"ankit.cotginanalytics@gmail.com\",\"description\":\"asdf\",\"lead_status\":\"3\",\"created_date\":\"2023-08-30,01:29:24\",\"user_type\":1,\"type_of_lead\":2,\"user_id\":\"40\"}', '2023-08-30 13:29:24', 1),
(21, 40, 27, 1, 'Update Lead  - {\"first_name\":\"Ankit\",\"last_name\":\"Jaiswal\",\"mobile_1\":\"9834893298\",\"mobile_2\":\"8489348998\",\"email\":\"ankit.cotginanalytics@gmail.com\",\"description\":\"asdf\",\"lead_status\":\"3\",\"created_date\":\"2023-08-30,04:50:52\",\"user_type\":1,\"type_of_lead\":2,\"customer_id\":\"Anki9834\",\"user_id\":\"40\"}', '2023-08-30 16:50:53', 1),
(22, 40, 23, 1, 'Add Invoice  - {\"first_name\":\"24\",\"last_name\":\"kumar\",\"mobile_1\":\"7568416166\",\"mobile_2\":\"2415153165\",\"invoice_number\":\"INV-0100\",\"order_number\":\"ORDER-0100\",\"email\":\"atul.cotginanalytics@gmail.com\",\"date\":\"2023-08-30\",\"due_date\":\"2023-08-30\",\"description\":\"All the payments made for repair and service can only be partially refunded within 30 days. Payments made against any software purchases cannot be refunded once software is installed on the customer\'s device. Products once sold cannot be returned. Exchange only in 3 days from Invoice Date.\",\"taxable\":0,\"tax_percentage\":\"0\",\"discount\":\"0\",\"discount_amount\":0,\"other_charges\":\"0\",\"custom_notes\":\"All the payments made for repair and service can only be partially refunded within 30 days. Payments made against any software purchases cannot be refunded once software is installed on the customer\'s device. Products once sold cannot be returned. Exchange only in 3 days from Invoice Date.\",\"subject\":\"d\",\"created_date\":\"2023-08-30,05:32:34\",\"user_id\":\"40\"}', '2023-08-30 17:32:34', 1),
(23, 40, 24, 1, 'Add Invoice  - {\"first_name\":\"26\",\"last_name\":\"Rehman\",\"mobile_1\":\"4444444444\",\"mobile_2\":\"7291067314\",\"invoice_number\":\"INV-010023\",\"order_number\":\"ORDER-010023\",\"email\":\"fazsslu11.cotginanalytics@gmail.com\",\"date\":\"2023-08-30\",\"due_date\":\"2023-08-30\",\"description\":\"All the payments made for repair and service can only be partially refunded within 30 days. Payments made against any software purchases cannot be refunded once software is installed on the customer\'s device. Products once sold cannot be returned. Exchange only in 3 days from Invoice Date.\",\"taxable\":0,\"tax_percentage\":\"0\",\"discount\":\"0\",\"discount_amount\":0,\"other_charges\":\"0\",\"custom_notes\":\"All the payments made for repair and service can only be partially refunded within 30 days. Payments made against any software purchases cannot be refunded once software is installed on the customer\'s device. Products once sold cannot be returned. Exchange only in 3 days from Invoice Date.\",\"subject\":\"asdf\",\"created_date\":\"2023-08-30,05:33:02\",\"user_id\":\"40\"}', '2023-08-30 17:33:02', 1),
(24, 40, 25, 1, 'Add Invoice  - {\"first_name\":\"26\",\"last_name\":\"Rehman\",\"mobile_1\":\"4444444444\",\"mobile_2\":\"7291067314\",\"invoice_number\":\"INV-010023\",\"order_number\":\"ORDER-010023\",\"email\":\"fazsslu11.cotginanalytics@gmail.com\",\"date\":\"2023-08-30\",\"due_date\":\"2023-08-30\",\"description\":\"All the payments made for repair and service can only be partially refunded within 30 days. Payments made against any software purchases cannot be refunded once software is installed on the customer\'s device. Products once sold cannot be returned. Exchange only in 3 days from Invoice Date.\",\"taxable\":0,\"tax_percentage\":\"0\",\"discount\":\"0\",\"discount_amount\":0,\"other_charges\":\"0\",\"custom_notes\":\"All the payments made for repair and service can only be partially refunded within 30 days. Payments made against any software purchases cannot be refunded once software is installed on the customer\'s device. Products once sold cannot be returned. Exchange only in 3 days from Invoice Date.\",\"subject\":\"asdf\",\"created_date\":\"2023-08-30,05:33:03\",\"user_id\":\"40\"}', '2023-08-30 17:33:03', 1),
(25, 40, 26, 1, 'Add Invoice  - {\"first_name\":\"26\",\"last_name\":\"Rehman\",\"mobile_1\":\"4444444444\",\"mobile_2\":\"7291067314\",\"invoice_number\":\"INV-010025\",\"order_number\":\"ORDER-010025\",\"email\":\"fazsslu11.cotginanalytics@gmail.com\",\"date\":\"2023-08-30\",\"due_date\":\"2023-10-14\",\"description\":\"All the payments made for repair and service can only be partially refunded within 30 days. Payments made against any software purchases cannot be refunded once software is installed on the customer\'s device. Products once sold cannot be returned. Exchange only in 3 days from Invoice Date.\",\"taxable\":0,\"tax_percentage\":\"0\",\"discount\":\"0\",\"discount_amount\":0,\"other_charges\":\"0\",\"custom_notes\":\"All the payments made for repair and service can only be partially refunded within 30 days. Payments made against any software purchases cannot be refunded once software is installed on the customer\'s device. Products once sold cannot be returned. Exchange only in 3 days from Invoice Date.\",\"subject\":\"\",\"created_date\":\"2023-08-30,05:33:52\",\"user_id\":\"40\"}', '2023-08-30 17:33:52', 1),
(26, 40, 27, 1, 'Add Invoice  - {\"first_name\":\"25\",\"last_name\":\"Rehman\",\"mobile_1\":\"7428059960\",\"mobile_2\":\"7291067314\",\"invoice_number\":\"INV-010026\",\"order_number\":\"ORDER-010026\",\"email\":\"fazlu11.cotginanalytics@gmail.com\",\"date\":\"2023-08-30\",\"due_date\":\"2023-08-30\",\"description\":\"All the payments made for repair and service can only be partially refunded within 30 days. Payments made against any software purchases cannot be refunded once software is installed on the customer\'s device. Products once sold cannot be returned. Exchange only in 3 days from Invoice Date.\",\"taxable\":0,\"tax_percentage\":\"0\",\"discount\":\"0\",\"discount_amount\":0,\"other_charges\":\"0\",\"custom_notes\":\"All the payments made for repair and service can only be partially refunded within 30 days. Payments made against any software purchases cannot be refunded once software is installed on the customer\'s device. Products once sold cannot be returned. Exchange only in 3 days from Invoice Date.\",\"subject\":\"\",\"created_date\":\"2023-08-30,05:45:59\",\"user_id\":\"40\"}', '2023-08-30 17:45:59', 1),
(27, 40, 28, 1, 'Add Invoice  - {\"first_name\":\"25\",\"last_name\":\"Rehman\",\"mobile_1\":\"7428059960\",\"mobile_2\":\"7291067314\",\"invoice_number\":\"INV-010026\",\"order_number\":\"ORDER-010026\",\"email\":\"fazlu11.cotginanalytics@gmail.com\",\"date\":\"2023-08-30\",\"due_date\":\"2023-08-30\",\"description\":\"All the payments made for repair and service can only be partially refunded within 30 days. Payments made against any software purchases cannot be refunded once software is installed on the customer\'s device. Products once sold cannot be returned. Exchange only in 3 days from Invoice Date.\",\"taxable\":0,\"tax_percentage\":\"0\",\"discount\":\"0\",\"discount_amount\":0,\"other_charges\":\"0\",\"custom_notes\":\"All the payments made for repair and service can only be partially refunded within 30 days. Payments made against any software purchases cannot be refunded once software is installed on the customer\'s device. Products once sold cannot be returned. Exchange only in 3 days from Invoice Date.\",\"subject\":\"\",\"created_date\":\"2023-08-30,05:46:02\",\"user_id\":\"40\"}', '2023-08-30 17:46:02', 1),
(28, 40, 26, 1, 'Update Contact Detail Page  - {\"first_name\":\"Fazlu \",\"last_name\":\"Rehman\",\"mobile_1\":\"3342223334\",\"mobile_2\":\"7291067314\",\"email\":\"admin@gmail.com\",\"customer_id\":\"Fazl4444\",\"email_opt_out\":\"0\",\"plan_status\":\"1\",\"plan\":\"\",\"amount\":\"\",\"remote_id\":\"\",\"sale_id\":\"\",\"worked_id\":\"\",\"work_status\":\"2\",\"courtesy\":\"1\",\"bbb\":\"0\",\"ha\":\"0\",\"fb\":\"0\",\"google\":\"0\",\"service\":\"0\",\"sale_date\":\"01-01-1970\"}', '2023-08-30 18:13:09', 1),
(29, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-01 09:50:07', 1),
(30, 40, 29, 1, 'Add Invoice  - {\"first_name\":\"26\",\"last_name\":\"\",\"mobile_1\":\"\",\"mobile_2\":\"\",\"invoice_number\":\"INV-010028\",\"order_number\":\"ORDER-010028\",\"email\":\"\",\"date\":\"2023-09-01\",\"due_date\":\"2023-09-01\",\"description\":\"All the payments made for repair and service can only be partially refunded within 30 days. Payments made against any software purchases cannot be refunded once software is installed on the customer\'s device. Products once sold cannot be returned. Exchange only in 3 days from Invoice Date.\",\"taxable\":0,\"tax_percentage\":\"0\",\"discount\":\"0\",\"discount_amount\":0,\"other_charges\":\"0\",\"custom_notes\":\"All the payments made for repair and service can only be partially refunded within 30 days. Payments made against any software purchases cannot be refunded once software is installed on the customer\'s device. Products once sold cannot be returned. Exchange only in 3 days from Invoice Date.\",\"subject\":\"\",\"created_date\":\"2023-09-01,10:00:21\",\"user_id\":\"40\"}', '2023-09-01 10:00:21', 1),
(31, 40, 30, 1, 'Add Invoice  - {\"first_name\":\"25\",\"last_name\":\"Rehman\",\"mobile_1\":\"7428059960\",\"mobile_2\":\"7291067314\",\"invoice_number\":\"INV-010029\",\"order_number\":\"ORDER-010029\",\"email\":\"fazlu11.cotginanalytics@gmail.com\",\"date\":\"2023-09-01\",\"due_date\":\"2023-10-01\",\"description\":\"All the payments made for repair and service can only be partially refunded within 30 days. Payments made against any software purchases cannot be refunded once software is installed on the customer\'s device. Products once sold cannot be returned. Exchange only in 3 days from Invoice Date.\",\"taxable\":0,\"tax_percentage\":\"0\",\"discount\":\"0\",\"discount_amount\":0,\"other_charges\":\"0\",\"custom_notes\":\"All the payments made for repair and service can only be partially refunded within 30 days. Payments made against any software purchases cannot be refunded once software is installed on the customer\'s device. Products once sold cannot be returned. Exchange only in 3 days from Invoice Date.\",\"subject\":\"subject\",\"created_date\":\"2023-09-01,10:06:08\",\"user_id\":\"40\"}', '2023-09-01 10:06:08', 1),
(32, 40, 34, 1, 'Add Notes Lead Module  - {\"module_id\":\"26\",\"user_id\":\"40\",\"module_type\":\"2\",\"title\":\"sadfgsdfgdfsg\",\"module_name\":\"Contact\",\"created_date\":\"September 1, 2023, 10:53 AM\"}', '2023-09-01 10:53:26', 1),
(33, 40, 35, 1, 'Add Notes Lead Module  - {\"module_id\":\"26\",\"user_id\":\"40\",\"module_type\":\"2\",\"title\":\"asdfasdfasdfasddf\",\"module_name\":\"Contact\",\"created_date\":\"September 1, 2023, 10:53 AM\"}', '2023-09-01 10:53:28', 1),
(34, 40, 36, 1, 'Add Notes Lead Module  - {\"module_id\":\"26\",\"user_id\":\"40\",\"module_type\":\"2\",\"title\":\"asdfasdfsdfsdf\",\"module_name\":\"Contact\",\"created_date\":\"September 1, 2023, 10:53 AM\"}', '2023-09-01 10:53:32', 1),
(35, 40, 37, 1, 'Add Notes Lead Module  - {\"module_id\":\"26\",\"user_id\":\"40\",\"module_type\":\"2\",\"title\":\"adfasdffasdffasdfsdffsdf\",\"module_name\":\"Contact\",\"created_date\":\"September 1, 2023, 10:53 AM\"}', '2023-09-01 10:53:35', 1),
(36, 40, 38, 1, 'Add Notes Lead Module  - {\"module_id\":\"26\",\"user_id\":\"40\",\"module_type\":\"2\",\"title\":\"asdfasdfsdfsdf\",\"module_name\":\"Contact\",\"created_date\":\"September 1, 2023, 10:53 AM\"}', '2023-09-01 10:53:38', 1),
(37, 40, 39, 1, 'Add Notes Lead Module  - {\"module_id\":\"27\",\"user_id\":\"40\",\"module_type\":\"1\",\"title\":\"sdfgsdfgsdfgdfddsdfgsdfgsdfgdfddsdfgsdfgsdfgdfddsdfgsdfgsdfgdfddsdfgsdfgsdfgdfddsdfgsdfgsdfgdfddsdfgsdfgsdfgdfddsdfgsdfgsdfgdfddsdfgsdfgsdfgdfddsdfgsdfgsdfgdfddsdfgsdfgsdfgdfddsdfgsdfgsdfgdfddsdfgsdfgsdfgdfddsdfgsdfgsdfgdfddsdfgsdfgsdfgdfddsdfgsdfgsdfgdfddsdfgsdfgsdfgdfddsdfgsdfgsdfgdfddsdfgsdfgsdfgdfddsdfgsdfgsdfgdfddsdfgsdfgsdfgdfddsdfgsdfgsdfgdfddsdfgsdfgsdfgdfddsdfgsdfgsdfgdfddsdfgsdfgsdfgdfddsdfgsdfgsdfgdfddsdfgsdfgsdfgdfddsdfgsdfgsdfgdfddsdfgsdfgsdfgdfddsdfgsdfgsdfgdfdd\",\"module_name\":\"Lead\",\"created_date\":\"September 1, 2023, 10:53 AM\"}', '2023-09-01 10:54:13', 1),
(38, 40, 40, 1, 'Add Notes Lead Module  - {\"module_id\":\"26\",\"user_id\":\"40\",\"module_type\":\"2\",\"title\":\"sdfgsdfgsdfgdfddsdfgsdfgsdfgdfddsdfgsdfgsdfgdfddsdfgsdfgsdfgdfddsdfgsdfgsdfgdfddsdfgsdfgsdfgdfddsdfgsdfgsdfgdfddsdfgsdfgsdfgdfddsdfgsdfgsdfgdfddsdfgsdfgsdfgdfddsdfgsdfgsdfgdfddsdfgsdfgsdfgdfddsdfgsdfgsdfgdfddsdfgsdfgsdfgdfddsdfgsdfgsdfgdfddsdfgsdfgsdfgdfddsdfgsdfgsdfgdfddsdfgsdfgsdfgdfddsdfgsdfgsdfgdfddsdfgsdfgsdfgdfddsdfgsdfgsdfgdfddsdfgsdfgsdfgdfddsdfgsdfgsdfgdfddsdfgsdfgsdfgdfddsdfgsdfgsdfgdfddsdfgsdfgsdfgdfddsdfgsdfgsdfgdfddsdfgsdfgsdfgdfddsdfgsdfgsdfgdfddsdfgsdfgsdfgdfdd\",\"module_name\":\"Contact\",\"created_date\":\"September 1, 2023, 11:00 AM\"}', '2023-09-01 11:00:26', 1),
(39, 40, 4, 1, 'Add Booking  - {\"first_name\":\"25\",\"last_name\":\"Rehman\",\"mobile_1\":\"7428059960\",\"mobile_2\":\"7291067314\",\"email\":\"fazlu11.cotginanalytics@gmail.com\",\"date\":\"09-01-2023\",\"time\":\"23:23\",\"timezone\":\"2\",\"booking_status\":\"2\",\"created_date\":\"2023-09-01,11:23:47\",\"user_id\":\"40\"}', '2023-09-01 11:23:47', 1),
(40, 40, 41, 1, 'Add Notes Lead Module  - {\"module_id\":\"4\",\"user_id\":\"40\",\"module_type\":\"3\",\"title\":\"hi\",\"module_name\":\"Booking\",\"created_date\":\"September 1, 2023, 11:23 AM\"}', '2023-09-01 11:23:57', 1),
(41, 40, 38, 1, 'Add Remote Title - e', '2023-09-01 11:54:31', 1),
(42, 40, 1, 1, 'Update Work Title - Done', '2023-09-01 11:56:35', 1),
(43, 40, 6, 1, 'Add Work Title - asdfsd', '2023-09-01 11:56:39', 1),
(44, 40, 6, 1, 'Update Work Title - asdfsdasff', '2023-09-01 11:56:54', 1),
(45, 40, 39, 1, 'Add Remote Title - asdf', '2023-09-01 12:19:10', 1),
(46, 40, 1, 1, 'Add Plan  - sdasd', '2023-09-01 12:19:36', 1),
(47, 40, 1, 1, 'Delete Work Title id - 1', '2023-09-01 12:22:17', 1),
(48, 40, 2, 1, 'Add Plan  - akjshdflksdjflkks', '2023-09-01 12:22:30', 1),
(49, 40, 2, 1, 'Update Plan Title - monthly Plan', '2023-09-01 12:27:44', 1),
(50, 40, 2, 1, 'Delete Remote Title id - 2', '2023-09-01 12:28:42', 1),
(51, 40, 2, 1, 'Delete Remote Title id - 2', '2023-09-01 12:28:46', 1),
(52, 40, 2, 1, 'Delete Remote Title id - 2', '2023-09-01 12:28:49', 1),
(53, 40, 2, 1, 'Delete Plan  id - 2', '2023-09-01 12:29:29', 1),
(54, 40, 2, 1, 'Delete Work Title id - 2', '2023-09-01 12:29:59', 1),
(55, 40, 2, 1, 'Delete Remote Title id - 2', '2023-09-01 12:31:11', 1),
(56, 40, 2, 1, 'Delete Plan  id - 2', '2023-09-01 12:31:39', 1),
(57, 40, 1, 1, 'Delete Plan  id - 1', '2023-09-01 12:31:51', 1),
(58, 40, 2, 1, 'Delete Work Title id - 2', '2023-09-01 12:36:24', 1),
(59, 40, 2, 1, 'Delete Work Title id - 2', '2023-09-01 12:36:27', 1),
(60, 40, 6, 1, 'Delete Work Title id - 6', '2023-09-01 12:37:14', 1),
(61, 40, 6, 1, 'Delete Work Title id - 6', '2023-09-01 12:37:16', 1),
(62, 40, 6, 1, 'Delete Work Title id - 6', '2023-09-01 12:37:20', 1),
(63, 40, 3, 1, 'Add Plan  - Monthly Plan', '2023-09-01 12:37:48', 1),
(64, 40, 3, 1, 'Delete Plan  id - 3', '2023-09-01 12:37:59', 1),
(65, 40, 4, 1, 'Add Plan  - 1 Month Plan', '2023-09-01 12:38:17', 1),
(66, 40, 5, 1, 'Add Plan  - 3 Month Plan', '2023-09-01 12:38:23', 1),
(67, 40, 4, 1, 'Update Plan Title - Monthly Plan', '2023-09-01 12:38:43', 1),
(68, 40, 5, 1, 'Update Plan Title - 3 Month Plan', '2023-09-01 12:38:51', 1),
(69, 40, 5, 1, 'Update Plan Title - 3 Month Plan', '2023-09-01 12:39:03', 1),
(70, 40, 5, 1, 'Delete Plan  id - 5', '2023-09-01 12:39:08', 1),
(71, 40, 6, 1, 'Add Plan  - 6 Month Plan', '2023-09-01 12:39:43', 1),
(72, 40, 7, 1, 'Add Plan  - Yearly Plan', '2023-09-01 12:39:59', 1),
(73, 40, 7, 1, 'Update Plan Title - Year Plan', '2023-09-01 12:45:28', 1),
(74, 40, 25, 1, 'Update Contact  - {\"first_name\":\"Fazlu \",\"last_name\":\"Rehman\",\"mobile_1\":\"2323232323\",\"mobile_2\":\"7291067314\",\"email\":\"fazlu11222.cotginanalytics@gmail.com\",\"customer_id\":\"Fazl2323\",\"email_opt_out\":null,\"plan_status\":\"1\",\"plan\":\"4\",\"amount\":\"\",\"remote_id\":\"\",\"sale_id\":\"\",\"worked_id\":\"\",\"work_status\":\"2\",\"courtesy\":null,\"bbb\":null,\"ha\":null,\"fb\":null,\"google\":null,\"service\":null,\"sale_date\":\"08-30-2023\",\"description\":\"   \",\"created_date\":\"2023-09-01,12:48:06\",\"user_type\":2,\"user_id\":\"40\"}', '2023-09-01 12:48:06', 1),
(75, 40, 25, 1, 'Update Contact  - {\"first_name\":\"Fazlu \",\"last_name\":\"Rehman\",\"mobile_1\":\"3453453453\",\"mobile_2\":\"7291067314\",\"email\":\"fazlusfsddddd11222.cotginanalytics@gmail.com\",\"customer_id\":\"Fazl3453\",\"email_opt_out\":null,\"plan_status\":\"1\",\"plan\":\"5\",\"amount\":\"0.00\",\"remote_id\":\"\",\"sale_id\":\"\",\"worked_id\":\"\",\"work_status\":\"2\",\"courtesy\":null,\"bbb\":null,\"ha\":null,\"fb\":null,\"google\":null,\"service\":null,\"sale_date\":\"08-30-2023\",\"description\":\"     \",\"created_date\":\"2023-09-01,01:00:17\",\"user_type\":2,\"user_id\":\"40\"}', '2023-09-01 13:00:17', 1),
(76, 40, 28, 1, 'Add Lead  - {\"first_name\":\"Fazlu\",\"last_name\":\"Rehman\",\"mobile_1\":\"8934923489\",\"mobile_2\":\"9423942378\",\"email\":\"fazlu.cotginanalystic@gmail.com\",\"description\":\"Fazlu  Description\",\"lead_status\":\"1\",\"created_date\":\"2023-09-01,01:20:44\",\"user_type\":1,\"type_of_lead\":2,\"user_id\":\"40\"}', '2023-09-01 13:20:44', 1),
(77, 40, 28, 1, 'Update Detail Page Lead  - {\"first_name\":\"Fazlu\",\"last_name\":\"Rehman\",\"mobile_1\":\"8934923489\",\"mobile_2\":\"9423942378\",\"email\":\"fazlu.cotginanalystic@gmail.com\",\"lead_status\":\"2\",\"created_date\":\"2023-09-01,01:20:51\",\"user_type\":2,\"work_status\":2,\"plan_status\":1,\"type_of_lead\":2,\"sale_date\":\"09-01-2023\",\"customer_id\":\"Fazl8934\",\"user_id\":\"40\"}', '2023-09-01 13:20:52', 1),
(78, 40, 28, 1, 'Update Contact Detail Page  - {\"first_name\":\"Fazlu\",\"last_name\":\"Rehman\",\"mobile_1\":\"8934923489\",\"mobile_2\":\"9423942378\",\"email\":\"fazlu.cotginanalystic@gmail.com\",\"customer_id\":\"Fazl8934\",\"email_opt_out\":\"0\",\"plan_status\":\"1\",\"plan\":\"4\",\"amount\":\"\",\"remote_id\":\"\",\"sale_id\":\"\",\"worked_id\":\"\",\"work_status\":\"2\",\"courtesy\":\"1\",\"bbb\":\"0\",\"ha\":\"0\",\"fb\":\"0\",\"google\":\"0\",\"service\":\"0\",\"sale_date\":\"01-09-2023\"}', '2023-09-01 13:21:03', 1),
(79, 40, 28, 1, 'Update Contact  - {\"first_name\":\"Fazlu\",\"last_name\":\"Rehman\",\"mobile_1\":\"8934923489\",\"mobile_2\":\"9423942378\",\"email\":\"fazlu.cotginanalystic@gmail.com\",\"customer_id\":\"Fazl8934\",\"email_opt_out\":null,\"plan_status\":\"1\",\"plan\":\"5\",\"amount\":\"0.00\",\"remote_id\":\"\",\"sale_id\":\"\",\"worked_id\":\"\",\"work_status\":\"2\",\"courtesy\":null,\"bbb\":null,\"ha\":null,\"fb\":null,\"google\":null,\"service\":null,\"sale_date\":\"01-09-2023\",\"description\":\" Fazlu  Description\",\"created_date\":\"2023-09-01,01:21:12\",\"user_type\":2,\"user_id\":\"40\"}', '2023-09-01 13:21:12', 1),
(80, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-09-01 13:29:56', 1),
(81, 33, 33, 1, 'Login User Name  - ankit.ths', '2023-09-01 13:30:06', 1),
(82, 33, 33, 1, 'Logout User Name  - ankit.ths', '2023-09-01 13:30:10', 1),
(83, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-01 13:30:25', 1),
(84, 40, 34, 1, 'Update User - Atul', '2023-09-01 13:30:52', 1),
(85, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-09-01 13:30:55', 1),
(86, 34, 34, 1, 'Login User Name  - atul.ths', '2023-09-01 13:31:03', 1),
(87, 34, 29, 1, 'Add Lead  - {\"first_name\":\"Tech\",\"last_name\":\"khan\",\"mobile_1\":\"8945934534\",\"mobile_2\":\"9849834723\",\"email\":\"tech@gmail.com\",\"description\":\"tech description\",\"lead_status\":\"3\",\"created_date\":\"2023-09-01,01:38:00\",\"user_type\":1,\"type_of_lead\":2,\"user_id\":\"34\"}', '2023-09-01 13:38:00', 1),
(88, 34, 29, 1, 'Update Detail Page Lead  - {\"first_name\":\"Tech\",\"last_name\":\"khan\",\"mobile_1\":\"8945934534\",\"mobile_2\":\"9849834723\",\"email\":\"tech@gmail.com\",\"lead_status\":\"2\",\"created_date\":\"2023-09-01,01:38:09\",\"user_type\":2,\"work_status\":2,\"plan_status\":1,\"type_of_lead\":2,\"sale_date\":\"09-01-2023\",\"customer_id\":\"Tech8945\",\"user_id\":\"34\"}', '2023-09-01 13:38:11', 1),
(89, 34, 29, 1, 'Update Contact  - {\"first_name\":\"Tech\",\"last_name\":\"khan\",\"mobile_1\":\"8945934534\",\"mobile_2\":\"9849834723\",\"email\":\"tech@gmail.com\",\"customer_id\":\"Tech8945\",\"email_opt_out\":null,\"plan_status\":\"1\",\"plan\":\"7\",\"amount\":\"\",\"remote_id\":\"\",\"sale_id\":\"\",\"worked_id\":\"\",\"work_status\":\"2\",\"courtesy\":null,\"bbb\":null,\"ha\":null,\"fb\":null,\"google\":null,\"service\":null,\"sale_date\":\"09-01-2023\",\"description\":\" tech description\",\"created_date\":\"2023-09-01,01:38:19\",\"user_type\":2,\"user_id\":\"34\"}', '2023-09-01 13:38:19', 1),
(90, 34, 34, 1, 'Logout User Name  - atul.ths', '2023-09-01 13:38:26', 1),
(91, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-01 13:38:33', 1),
(92, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-04 09:47:41', 1),
(93, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-04 10:13:15', 1),
(94, 40, 30, 1, 'Add Lead  - {\"first_name\":\"Fazlu\",\"last_name\":\"Rehman\",\"mobile_1\":\"9889896968\",\"mobile_2\":\"8687678686\",\"email\":\"aa.cotginanalystic@gmail.com\",\"description\":\"a\",\"lead_status\":\"1\",\"created_date\":\"2023-09-04,10:13:51\",\"user_type\":1,\"type_of_lead\":2,\"user_id\":\"40\"}', '2023-09-04 10:13:51', 1),
(95, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-09-04 10:14:12', 1),
(96, 33, 33, 1, 'Login User Name  - ankit.ths', '2023-09-04 10:14:24', 1),
(97, 33, 8, 1, 'Add Lead Sales Crm - {\"created_at\":\"2023-09-04 10:15:38\",\"user_id\":\"33\",\"name\":\"amit\",\"last_name\":\"kumar\",\"date_of_sale\":\"2023-09-04\",\"phone\":\"4464665656\",\"type_of_lead\":1,\"payment_method\":\"Cash\",\"other_phone\":\"4987531354\",\"company_name\":\"Cotgin Analytics\",\"email\":\"amit.cotginanalytics@gmil.com\",\"password\":\"amit@123\",\"issue\":\"No Issue\",\"amount\":\"200\",\"description\":\"  aa\",\"lead_status\":\"3\",\"address\":\"mustafabad\"}', '2023-09-04 10:15:38', 1),
(98, 33, 33, 1, 'Logout User Name  - ankit.ths', '2023-09-04 11:30:01', 1),
(99, 35, 35, 1, 'Login User Name  - fazlu.ths', '2023-09-04 11:30:12', 1),
(100, 35, 35, 1, 'Logout User Name  - fazlu.ths', '2023-09-04 11:30:24', 1),
(101, 34, 34, 1, 'Login User Name  - atul.ths', '2023-09-04 11:30:31', 1),
(102, 34, 34, 1, 'Logout User Name  - atul.ths', '2023-09-04 11:38:50', 1),
(103, 33, 33, 1, 'Login User Name  - ankit.ths', '2023-09-04 11:39:38', 1),
(104, 33, 8, 1, 'Update Lead Sales Crm  - {\"updated_at\":\"2023-09-04 12:11:32\",\"name\":\"amit\",\"last_name\":\"kumar\",\"date_of_sale\":\"2023-09-04\",\"phone\":\"4464665656\",\"other_phone\":\"4987531354\",\"payment_method\":\"Cash\",\"company_name\":\"Cotgin Analytics\",\"email\":\"amitkumar.cotginanalytics@gmail.com\",\"type_of_lead\":1,\"password\":\"amit@123\",\"issue\":\"No Issue\",\"amount\":\"200\",\"description\":\"   aa\",\"lead_status\":\"3\",\"address\":\"mustafabad\"}', '2023-09-04 12:11:32', 1),
(105, 33, 9, 1, 'Add New Lead Sales Crm - {\"created_at\":\"2023-09-04 12:38:18\",\"user_id\":\"33\",\"type_of_lead\":3,\"name\":\"Ankit\",\"last_name\":\"Kumar\",\"email\":\"ankit.cotginanalytics@gmail.com\",\"phone\":\"2398448932\",\"other_phone\":\"4988794798\",\"issue\":\"No Issue\",\"time_zone\":\"1\",\"address\":\"Mustafabad\",\"lead_status\":\"3\",\"description\":\"ankit description \"}', '2023-09-04 12:38:18', 1),
(106, 33, 8, 1, 'Update Lead Sales Crm  - {\"updated_at\":\"2023-09-04 12:40:14\",\"name\":\"amit\",\"last_name\":\"kumar\",\"date_of_sale\":\"2023-09-04\",\"phone\":\"4464665656\",\"other_phone\":\"4987531354\",\"payment_method\":\"Cash\",\"company_name\":\"Cotgin Analytics\",\"email\":\"amitkumar.cotginanalytics@gmail.com\",\"type_of_lead\":1,\"password\":\"amit@123\",\"issue\":\"No Issue\",\"amount\":\"200\",\"description\":\"    aa\",\"lead_status\":\"1\",\"address\":\"mustafabad\"}', '2023-09-04 12:40:14', 1),
(107, 33, 33, 1, 'Logout User Name  - ankit.ths', '2023-09-04 13:27:43', 1),
(108, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-05 09:38:10', 1),
(109, 40, 8, 1, 'Update Lead Sales Crm  - {\"updated_at\":\"2023-09-05 01:15:51\",\"name\":\"amit\",\"last_name\":\"kumar\",\"date_of_sale\":\"2023-09-04\",\"phone\":\"4464665656\",\"other_phone\":\"4987531354\",\"payment_method\":\"Cash\",\"company_name\":\"Cotgin Analytics\",\"email\":\"amitkumar.cotginanalytics@gmail.com\",\"type_of_lead\":1,\"password\":\"amit@123\",\"issue\":\"No Issue\",\"amount\":\"200\",\"description\":\"     aa\",\"lead_status\":\"1\",\"address\":\"mustafabad\"}', '2023-09-05 13:15:51', 1),
(110, 40, 42, 1, 'Add Notes Lead Module  - {\"module_id\":\"29\",\"user_id\":\"34\",\"module_type\":\"2\",\"title\":\"hlo\",\"module_name\":\"Contact\",\"created_date\":\"September 5, 2023, 1:29 PM\"}', '2023-09-05 13:29:35', 1),
(111, 40, 42, 1, 'Update Notes Lead Module  - {\"title\":\"hlo test\",\"module_name\":\"Contact\",\"created_date\":\"5 September, 2023, 1:29 pm\",\"user_detail\":{\"id\":\"40\",\"role_id\":\"1\",\"name\":\"Fazlu\",\"email\":null,\"username\":\"admin@gmail.com\",\"password\":\"e6e061838856bf47e1de730719fb2609\",\"image\":null,\"created_date\":\"2023-08-23 04:10:43\",\"mod_date\":\"0000-00-00 00:00:00\",\"status\":\"1\",\"role_type\":\"Super Admin\"}}', '2023-09-05 13:29:41', 1),
(112, 40, 42, 1, 'Delete Notes id Lead Module  - 42', '2023-09-05 13:29:51', 1),
(113, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-05 16:56:15', 1),
(114, 40, 43, 1, 'Add Notes Lead Module  - {\"module_id\":\"30\",\"user_id\":\"40\",\"module_type\":\"1\",\"title\":\"hlo\",\"module_name\":\"Lead\",\"created_date\":\"September 5, 2023, 6:31 PM\"}', '2023-09-05 18:31:33', 1),
(115, 40, 44, 1, 'Add Notes Lead Module  - {\"module_id\":\"30\",\"user_id\":\"40\",\"module_type\":\"1\",\"title\":\"hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo hlo\",\"module_name\":\"Lead\",\"created_date\":\"September 5, 2023, 6:31 PM\"}', '2023-09-05 18:32:04', 1),
(116, 40, 45, 1, 'Add Notes Lead Module  - {\"module_id\":\"29\",\"user_id\":\"34\",\"module_type\":\"2\",\"title\":\"adfs\",\"module_name\":\"Contact\",\"created_date\":\"September 5, 2023, 6:32 PM\"}', '2023-09-05 18:32:14', 1),
(117, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-06 09:45:38', 1),
(118, 40, 8, 1, 'Update Lead Sales Crm  - {\"updated_at\":\"2023-09-06 01:39:34\",\"name\":\"amit\",\"last_name\":\"kumar\",\"date_of_sale\":\"2023-09-04\",\"phone\":\"4464665656\",\"other_phone\":\"4987531354\",\"payment_method\":\"Cash\",\"company_name\":\"Cotgin Analytics\",\"email\":\"jkdjkdjkd@gmail.com\",\"type_of_lead\":1,\"password\":\"amit@123\",\"issue\":\"No Issue\",\"amount\":\"200\",\"description\":\"      aa\",\"lead_status\":\"1\",\"address\":\"mustafabad\"}', '2023-09-06 13:39:34', 1),
(119, 40, 8, 1, 'Update Lead Sales Crm  - {\"updated_at\":\"2023-09-06 01:42:44\",\"name\":\"amit\",\"last_name\":\"kumar\",\"date_of_sale\":\"2023-09-04\",\"phone\":\"4464665656\",\"other_phone\":\"4987531354\",\"payment_method\":\"Cash\",\"company_name\":\"Cotgin Analytics\",\"email\":\"amitkumar.cotginanalytics@gmail.com\",\"type_of_lead\":1,\"password\":\"amit@123\",\"issue\":\"No Issue\",\"amount\":\"200\",\"description\":\"        aa\",\"lead_status\":\"1\",\"address\":\"mustafabad\"}', '2023-09-06 13:42:44', 1),
(120, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-06 17:20:45', 1),
(121, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-07 09:59:05', 1),
(122, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-09-07 12:50:36', 1),
(123, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-07 12:51:11', 1),
(124, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-07 16:16:52', 1),
(125, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-11 09:48:59', 1),
(126, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-11 12:47:55', 1),
(127, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-09-11 13:02:57', 1),
(128, 35, 35, 1, 'Login User Name  - fazlu.ths', '2023-09-11 17:13:20', 1),
(129, 35, 35, 1, 'Logout User Name  - fazlu.ths', '2023-09-11 17:13:30', 1),
(130, 35, 35, 1, 'Login User Name  - fazlu.ths', '2023-09-11 17:15:47', 1),
(131, 35, 35, 1, 'Logout User Name  - fazlu.ths', '2023-09-11 17:15:55', 1),
(132, 35, 35, 1, 'Login User Name  - fazlu.ths', '2023-09-11 17:16:00', 1),
(133, 35, 35, 1, 'Logout User Name  - fazlu.ths', '2023-09-11 17:16:06', 1),
(134, 35, 35, 1, 'Login User Name  - fazlu.ths', '2023-09-11 17:16:12', 1),
(135, 35, 35, 1, 'Logout User Name  - fazlu.ths', '2023-09-11 17:16:16', 1),
(136, 35, 35, 1, 'Login User Name  - fazlu.ths', '2023-09-11 17:18:13', 1),
(137, 35, 35, 1, 'Logout User Name  - fazlu.ths', '2023-09-11 17:22:42', 1),
(138, 35, 35, 1, 'Google Login User Name  - fazlu.ths', '2023-09-11 17:23:46', 1),
(139, 35, 35, 1, 'Logout User Name  - fazlu.ths', '2023-09-11 17:23:49', 1),
(140, 35, 35, 1, 'Google Login User Name  - fazlu.ths', '2023-09-11 17:23:58', 1),
(141, 35, 35, 1, 'Logout User Name  - fazlu.ths', '2023-09-11 17:24:29', 1),
(142, 35, 35, 1, 'Google Login User Name  - fazlu.ths', '2023-09-11 17:24:48', 1),
(143, 35, 35, 1, 'Logout User Name  - fazlu.ths', '2023-09-11 17:24:50', 1),
(144, 35, 35, 1, 'Google Login User Name  - fazlu.ths', '2023-09-11 17:28:59', 1),
(145, 35, 35, 1, 'Logout User Name  - fazlu.ths', '2023-09-11 17:29:07', 1),
(146, 35, 35, 1, 'Google Login User Name  - fazlu.ths', '2023-09-11 17:29:12', 1),
(147, 35, 35, 1, 'Logout User Name  - fazlu.ths', '2023-09-11 17:29:16', 1),
(148, 35, 35, 1, 'Google Login User Name  - fazlu.ths', '2023-09-11 17:29:21', 1),
(149, 35, 35, 1, 'Logout User Name  - fazlu.ths', '2023-09-11 17:29:24', 1),
(150, 35, 35, 1, 'Google Login User Name  - fazlu.ths', '2023-09-11 17:29:31', 1),
(151, 35, 35, 1, 'Logout User Name  - fazlu.ths', '2023-09-11 17:29:34', 1),
(152, 35, 35, 1, 'Google Login User Name  - fazlu.ths', '2023-09-11 17:53:14', 1),
(153, 35, 35, 1, 'Logout User Name  - fazlu.ths', '2023-09-11 17:59:18', 1),
(154, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-12 12:06:44', 1),
(155, 40, 8, 1, 'Delete Lead id Sales Crm - 8', '2023-09-12 12:43:30', 1),
(156, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-09-12 16:05:19', 1),
(157, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-12 16:09:41', 1),
(158, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-13 09:42:14', 1),
(159, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-09-13 09:42:31', 1),
(160, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-13 09:47:29', 1),
(161, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-09-13 10:44:17', 1),
(162, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-13 11:06:36', 1),
(163, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-09-13 11:06:42', 1),
(164, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-13 11:06:49', 1),
(165, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-09-13 11:06:52', 1),
(166, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-13 11:06:59', 1),
(167, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-09-13 11:07:10', 1),
(168, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-13 11:07:18', 1),
(169, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-09-13 11:07:57', 1),
(170, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-13 11:08:05', 1),
(171, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-09-13 11:08:32', 1),
(172, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-13 11:08:47', 1),
(173, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-09-13 11:08:53', 1),
(174, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-13 15:36:20', 1),
(175, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-09-13 15:36:37', 1),
(176, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-13 15:36:45', 1),
(177, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-14 11:01:13', 1),
(178, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-09-14 12:58:38', 1),
(179, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-14 13:52:38', 1),
(180, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-09-14 13:53:42', 1),
(181, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-14 13:54:06', 1),
(182, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-09-14 13:54:59', 1),
(183, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-14 13:55:06', 1),
(184, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-09-14 13:55:17', 1),
(185, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-14 14:41:41', 1),
(186, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-09-14 14:42:27', 1),
(187, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-15 10:21:30', 1),
(188, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-15 11:53:10', 1),
(189, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-09-15 12:52:33', 1),
(190, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-15 15:36:39', 1),
(191, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-09-15 16:44:10', 1),
(192, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-15 16:44:17', 1),
(193, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-09-15 16:44:58', 1),
(194, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-15 17:26:51', 1),
(195, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-09-15 17:32:02', 1),
(196, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-15 17:37:39', 1),
(197, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-09-15 17:41:35', 1),
(198, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-15 17:41:40', 1),
(199, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-09-15 17:44:04', 1),
(200, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-15 17:46:12', 1),
(201, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-09-15 17:49:06', 1),
(202, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-15 18:00:45', 1),
(203, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-09-15 18:06:35', 1),
(204, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-15 18:06:40', 1),
(205, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-09-15 18:10:15', 1),
(206, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-15 18:12:08', 1),
(207, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-09-15 18:12:38', 1),
(208, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-15 18:13:22', 1),
(209, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-09-15 18:14:19', 1),
(210, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-15 18:15:10', 1),
(211, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-09-15 18:16:43', 1),
(212, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-15 18:18:49', 1),
(213, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-15 18:19:23', 1),
(214, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-15 18:20:10', 1),
(215, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-09-15 18:21:19', 1),
(216, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-09-15 18:21:30', 1),
(217, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-15 18:22:33', 1),
(218, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-15 18:22:51', 1),
(219, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-18 11:29:18', 1),
(220, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-18 13:08:35', 1),
(221, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-09-18 13:09:57', 1),
(222, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-18 13:11:27', 1),
(223, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-09-18 13:12:34', 1),
(224, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-09-18 13:12:34', 1),
(225, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-18 13:12:40', 1),
(226, 40, 7, 1, 'Chat Panel - hello - {\"message\":\"hello\",\"senderID\":\"40\",\"receiverID\":\"35\"}', '2023-09-18 13:44:05', 1),
(227, 40, 8, 1, 'Chat Panel - hello - {\"message\":\"hello\",\"senderID\":\"40\",\"receiverID\":\"33\"}', '2023-09-18 13:44:17', 1),
(228, 40, 9, 1, 'Chat Panel - hello - {\"message\":\"hello\",\"senderID\":\"40\",\"receiverID\":\"33\"}', '2023-09-18 13:44:18', 1),
(229, 40, 10, 1, 'Chat Panel - aa - {\"message\":\"aa\",\"senderID\":\"40\",\"receiverID\":\"35\"}', '2023-09-18 13:44:22', 1),
(230, 40, 11, 1, 'Chat Panel - adfasdf - {\"message\":\"adfasdf\",\"senderID\":\"40\",\"receiverID\":\"35\"}', '2023-09-18 13:44:28', 1),
(231, 40, 12, 1, 'Chat Panel - adsfasdfsdfaasdfasdfsd - {\"message\":\"adsfasdfsdfaasdfasdfsd\",\"senderID\":\"40\",\"receiverID\":\"35\"}', '2023-09-18 13:44:55', 1),
(232, 40, 13, 1, 'Chat Panel - adsfasdfsdfaasdfasdfsd - {\"message\":\"adsfasdfsdfaasdfasdfsd\",\"senderID\":\"40\",\"receiverID\":\"35\"}', '2023-09-18 13:44:55', 1),
(233, 40, 41, 1, 'Add User - Satendra', '2023-09-18 15:43:41', 1),
(234, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-09-18 15:46:35', 1),
(235, 41, 41, 1, 'Login User Name  - satendra.ths', '2023-09-18 15:46:45', 1),
(236, 41, 10, 1, 'Add Lead Sales Crm - {\"created_at\":\"2023-09-18 03:47:37\",\"user_id\":\"41\",\"name\":\"Amit \",\"last_name\":\"kumar\",\"date_of_sale\":\"2023-09-18\",\"phone\":\"4649849134\",\"type_of_lead\":1,\"payment_method\":\"cash\",\"other_phone\":\"4648463896\",\"company_name\":\"cotginanalytics\",\"email\":\"amitkumar.cotginanalytics@gmail.com\",\"password\":\"amit@123\",\"issue\":\"technical issues\",\"amount\":\"2500\",\"description\":\"x\\r\\n  \",\"lead_status\":\"4\",\"address\":\"Delhi\"}', '2023-09-18 15:47:37', 1),
(237, 41, 11, 1, 'Add Lead Sales Crm - {\"created_at\":\"2023-09-18 03:48:13\",\"user_id\":\"41\",\"name\":\"atul\",\"last_name\":\"Kumar\",\"date_of_sale\":\"2023-09-18\",\"phone\":\"4654334352\",\"type_of_lead\":1,\"payment_method\":\"online\",\"other_phone\":\"4649849849\",\"company_name\":\"cotginanalytics\",\"email\":\"atul.cotginanalytics@gmail.com\",\"password\":\"12345678\",\"issue\":\"technical issues\",\"amount\":\"2500\",\"description\":\"ss\",\"lead_status\":\"3\",\"address\":\"Delhi\"}', '2023-09-18 15:48:13', 1),
(238, 41, 12, 1, 'Add Lead Sales Crm - {\"created_at\":\"2023-09-18 03:51:19\",\"user_id\":\"41\",\"name\":\"fazlu\",\"last_name\":\"Kumar\",\"date_of_sale\":\"2023-12-31\",\"phone\":\"7988979899\",\"type_of_lead\":1,\"payment_method\":\"2500\",\"other_phone\":\"9787999898\",\"company_name\":\"cotginanalytics\",\"email\":\"fazlu.cotginanalytics@gmail.com\",\"password\":\"12345678\",\"issue\":\"technical issues\",\"amount\":\"2500\",\"description\":\"      aa\",\"lead_status\":\"4\",\"address\":\"Delhi\"}', '2023-09-18 15:51:19', 1),
(239, 41, 13, 1, 'Add Lead Sales Crm - {\"created_at\":\"2023-09-18 03:51:55\",\"user_id\":\"41\",\"name\":\"Ankit\",\"last_name\":\"Kumar\",\"date_of_sale\":\"2023-11-30\",\"phone\":\"8222817455\",\"type_of_lead\":1,\"payment_method\":\"2500\",\"other_phone\":\"8941981819\",\"company_name\":\"cotginanalytics\",\"email\":\"ankit.cotginanalytics@gmail.com\",\"password\":\"12345678\",\"issue\":\"technical issues\",\"amount\":\"2500\",\"description\":\"dd\",\"lead_status\":\"1\",\"address\":\"Delhi\"}', '2023-09-18 15:51:55', 1),
(240, 41, 41, 1, 'Logout User Name  - satendra.ths', '2023-09-18 15:52:13', 1),
(241, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-18 15:52:18', 1),
(242, 40, 31, 1, 'Add Lead  - {\"first_name\":\"amit\",\"last_name\":\"kumar\",\"mobile_1\":\"4784612316\",\"mobile_2\":\"6432164969\",\"email\":\"amitkumar.cotginanalytics@gmail.com\",\"description\":\"d\",\"lead_status\":\"4\",\"created_date\":\"2023-09-18,05:33:23\",\"user_type\":1,\"type_of_lead\":2,\"user_id\":\"40\"}', '2023-09-18 17:33:23', 1),
(243, 40, 14, 1, 'Chat Panel - hlo - {\"message\":\"hlo\",\"senderID\":\"40\",\"receiverID\":\"33\"}', '2023-09-19 12:10:32', 1),
(244, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-09-19 17:45:17', 1),
(245, 33, 33, 1, 'Login User Name  - ankit.ths', '2023-09-19 17:45:25', 1),
(246, 33, 14, 1, 'Add Lead Sales Crm - {\"created_at\":\"2023-09-19 05:47:22\",\"user_id\":\"33\",\"name\":\"atul\",\"last_name\":\"Rehman\",\"date_of_sale\":\"2023-12-31\",\"phone\":\"3432234232\",\"type_of_lead\":1,\"payment_method\":\"cash\",\"other_phone\":\"6564633212\",\"company_name\":\"Cotgin Analytics\",\"email\":\"admin@gmail.com\",\"password\":\"asdfasdf@123\",\"issue\":\"No Issue\",\"amount\":\"9233992\",\"description\":\"   \\r\\n\\r\\n\",\"lead_status\":\"1\",\"address\":\"asdfasdfsdd\"}', '2023-09-19 17:47:22', 1),
(247, 33, 15, 1, 'Add Lead Sales Crm - {\"created_at\":\"2023-09-19 05:47:45\",\"user_id\":\"33\",\"name\":\"fazlu\",\"last_name\":\"Rehman\",\"date_of_sale\":\"2023-12-31\",\"phone\":\"3454353422\",\"type_of_lead\":1,\"payment_method\":\"Cash\",\"other_phone\":\"3422222222\",\"company_name\":\"Cotgin Analytics\",\"email\":\"aaadmin@gmail.com\",\"password\":\"fazlu@123\",\"issue\":\"No Issue\",\"amount\":\"9233992\",\"description\":\" \",\"lead_status\":\"1\",\"address\":\"asdfasdfsdd\"}', '2023-09-19 17:47:45', 1),
(248, 33, 33, 1, 'Logout User Name  - ankit.ths', '2023-09-19 17:47:48', 1),
(249, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-19 17:48:14', 1),
(250, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-20 09:55:15', 1);
INSERT INTO `tbl_log` (`id`, `user_id`, `insert_id`, `authentication_status`, `title`, `created_date`, `status`) VALUES
(251, 40, 15, 1, 'Chat Panel - aaaaaaaa - {\"message\":\"aaaaaaaa\",\"senderID\":\"40\",\"receiverID\":\"35\"}', '2023-09-20 10:07:41', 1),
(252, 40, 1, 1, 'Add Notes Lead Module Sales Crm  - ssss', '2023-09-20 10:08:38', 1),
(253, 40, 1, 1, 'Update Notes Lead Module  Sales Crm - sssss', '2023-09-20 10:08:43', 1),
(254, 40, 1, 1, 'Delete Notes id Lead Module Sales Crm - 1', '2023-09-20 10:08:46', 1),
(255, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-09-20 10:17:17', 1),
(256, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-20 10:17:24', 1),
(257, 40, 16, 1, 'Chat Panel - g - {\"message\":\"g\",\"senderID\":\"40\",\"receiverID\":\"34\"}', '2023-09-20 10:30:21', 1),
(258, 40, 17, 1, 'Chat Panel - g - {\"message\":\"g\",\"senderID\":\"40\",\"receiverID\":\"34\"}', '2023-09-20 10:30:25', 1),
(259, 40, 18, 1, 'Chat Panel - ggg - {\"message\":\"ggg\",\"senderID\":\"40\",\"receiverID\":\"35\"}', '2023-09-20 10:30:30', 1),
(260, 40, 19, 1, 'Chat Panel - ggg - {\"message\":\"ggg\",\"senderID\":\"40\",\"receiverID\":\"35\"}', '2023-09-20 10:30:35', 1),
(261, 40, 20, 1, 'Chat Panel - s - {\"message\":\"s\",\"senderID\":\"40\",\"receiverID\":\"35\"}', '2023-09-20 10:30:41', 1),
(262, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-09-20 11:04:04', 1),
(263, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-20 11:04:47', 1),
(264, 40, 21, 1, 'Chat Panel - fff\n - {\"message\":\"fff\\n\",\"senderID\":\"40\",\"receiverID\":\"33\"}', '2023-09-20 11:11:16', 1),
(265, 40, 22, 1, 'Chat Panel - \nf\n - {\"message\":\"\\nf\\n\",\"senderID\":\"40\",\"receiverID\":\"33\"}', '2023-09-20 11:11:19', 1),
(266, 40, 23, 1, 'Chat Panel - \nf\n - {\"message\":\"\\nf\\n\",\"senderID\":\"40\",\"receiverID\":\"33\"}', '2023-09-20 11:11:21', 1),
(267, 40, 24, 1, 'Chat Panel - \nf\n - {\"message\":\"\\nf\\n\",\"senderID\":\"40\",\"receiverID\":\"33\"}', '2023-09-20 11:11:21', 1),
(268, 40, 25, 1, 'Chat Panel - \nf\n - {\"message\":\"\\nf\\n\",\"senderID\":\"40\",\"receiverID\":\"33\"}', '2023-09-20 11:11:22', 1),
(269, 40, 26, 1, 'Chat Panel - f\n - {\"message\":\"f\\n\",\"senderID\":\"40\",\"receiverID\":\"33\"}', '2023-09-20 11:11:22', 1),
(270, 40, 27, 1, 'Chat Panel - f\n - {\"message\":\"f\\n\",\"senderID\":\"40\",\"receiverID\":\"33\"}', '2023-09-20 11:11:22', 1),
(271, 40, 28, 1, 'Chat Panel - f\n - {\"message\":\"f\\n\",\"senderID\":\"40\",\"receiverID\":\"33\"}', '2023-09-20 11:11:23', 1),
(272, 40, 29, 1, 'Chat Panel - f - {\"message\":\"f\",\"senderID\":\"40\",\"receiverID\":\"33\"}', '2023-09-20 11:11:23', 1),
(273, 40, 30, 1, 'Chat Panel -  File Uploaded - 30', '2023-09-20 11:14:54', 1),
(274, 40, 6, 1, 'Add Sender Email  - {\"sender_name\":\"reply mail trust haven\",\"sender_email\":\"trusthavensolution@gmail.com\",\"status\":\"1\",\"created_date\":\"2023-09-20,11:56:40\"}', '2023-09-20 11:56:40', 1),
(275, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-20 17:00:56', 1),
(276, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-20 18:25:22', 1),
(277, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-09-20 18:25:22', 1),
(278, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-20 18:28:22', 1),
(279, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-21 09:46:06', 1),
(280, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-21 10:09:10', 1),
(281, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-21 11:05:19', 1),
(282, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-09-21 11:05:19', 1),
(283, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-21 11:05:26', 1),
(284, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-09-21 12:18:09', 1),
(285, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-21 12:28:29', 1),
(286, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-09-21 15:17:40', 1),
(287, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-21 15:50:20', 1),
(288, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-22 09:40:46', 1),
(289, 40, 31, 1, 'Chat Panel - ddddddd\n - {\"message\":\"ddddddd\\n\",\"senderID\":\"40\",\"receiverID\":\"33\"}', '2023-09-22 09:59:59', 1),
(290, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-09-22 10:19:49', 1),
(291, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-22 12:28:18', 1),
(292, 40, 1, 1, 'Account Update By Admin  - {\"name\":\"Admin\",\"email\":\"fazlu.cotginanalytics@gmail.com\",\"mod_date\":\"2023-09-22,12:31:34\"}', '2023-09-22 12:31:34', 1),
(293, 40, 1, 1, 'Account Update By Admin  - {\"name\":\"Admin\",\"email\":\"fazlu.cotginanalytics@gmail.com\",\"mod_date\":\"2023-09-22,12:31:34\"}', '2023-09-22 12:31:34', 1),
(294, 40, 1, 1, 'Account Update By Admin  - {\"name\":\"Admin\",\"email\":\"fazlu.cotginanalytics@gmail.com\",\"mobile\":\"4655464646\",\"mod_date\":\"2023-09-22,12:35:55\"}', '2023-09-22 12:35:55', 1),
(295, 40, 1, 1, 'Account Update By Admin  - {\"name\":\"Admin\",\"email\":\"fazlu.cotginanalytics@gmail.com\",\"mobile\":\"2147483647\",\"mod_date\":\"2023-09-22,12:35:57\"}', '2023-09-22 12:35:57', 1),
(296, 40, 1, 1, 'Account Update By Admin  - {\"name\":\"Admin\",\"email\":\"fazlu.cotginanalytics@gmail.com\",\"mobile\":\"2147483647\",\"mod_date\":\"2023-09-22,12:35:58\"}', '2023-09-22 12:35:58', 1),
(297, 40, 1, 1, 'Account Update By Admin  - {\"name\":\"Admin\",\"email\":\"fazlu.cotginanalytics@gmail.com\",\"mobile\":\"2147483647\",\"mod_date\":\"2023-09-22,12:35:59\"}', '2023-09-22 12:35:59', 1),
(298, 40, 1, 1, 'Account Update By Admin  - {\"name\":\"Admin\",\"email\":\"fazlu.cotginanalytics@gmail.com\",\"mobile\":\"7428059960\",\"mod_date\":\"2023-09-22,12:37:15\"}', '2023-09-22 12:37:15', 1),
(299, 40, 1, 1, 'Account Update By Admin  - {\"name\":\"Admin\",\"email\":\"fazlu.cotginanalytics@gmail.com\",\"mobile\":\"7428059960\",\"mod_date\":\"2023-09-22,12:37:35\"}', '2023-09-22 12:37:35', 1),
(300, 40, 1, 1, 'Account Update By Admin  - {\"name\":\"Admin\",\"email\":\"fazlu.cotginanalytics@gmail.com\",\"mobile\":\"7428059960\",\"mod_date\":\"2023-09-22,12:38:43\"}', '2023-09-22 12:38:43', 1),
(301, 40, 1, 1, 'Account Update By Admin  - {\"name\":\"Admin\",\"email\":\"fazlu.cotginanalytics@gmail.com\",\"mobile\":\"2147483647\",\"mod_date\":\"2023-09-22,12:39:05\"}', '2023-09-22 12:39:05', 1),
(302, 40, 1, 1, 'Account Update By Admin  - {\"name\":\"Admin\",\"email\":\"fazlu.cotginanalytics@gmail.com\",\"mobile\":\"2147483647\",\"mod_date\":\"2023-09-22,12:39:06\"}', '2023-09-22 12:39:06', 1),
(303, 40, 1, 1, 'Account Update By Admin  - {\"name\":\"Admin\",\"email\":\"fazlu.cotginanalytics@gmail.com\",\"mobile\":\"2147483647\",\"mod_date\":\"2023-09-22,12:39:07\"}', '2023-09-22 12:39:07', 1),
(304, 40, 1, 1, 'Account Update By Admin  - {\"name\":\"Admin\",\"email\":\"fazlu.cotginanalytics@gmail.com\",\"mobile\":\"2147483647\",\"mod_date\":\"2023-09-22,12:39:08\"}', '2023-09-22 12:39:08', 1),
(305, 40, 1, 1, 'Account Update By Admin  - {\"name\":\"Admin\",\"email\":\"fazlu.cotginanalytics@gmail.com\",\"mobile\":\"7428059960\",\"mod_date\":\"2023-09-22,12:41:13\"}', '2023-09-22 12:41:13', 1),
(306, 40, 1, 1, 'Account Update By Admin  - {\"name\":\"Admin\",\"email\":\"fazlu.cotginanalytics@gmail.com\",\"mobile\":\"7428059960\",\"mod_date\":\"2023-09-22,12:42:41\"}', '2023-09-22 12:42:41', 1),
(307, 40, 1, 1, 'Account Update By Admin  - {\"name\":\"Admin\",\"email\":\"fazlu.cotginanalytics@gmail.com\",\"mobile\":\"4946546456\",\"mod_date\":\"2023-09-22,12:42:47\"}', '2023-09-22 12:42:47', 1),
(308, 40, 1, 1, 'Account Update By Admin  - {\"name\":\"Admin\",\"email\":\"fazlu.cotginanalytics@gmail.com\",\"mobile\":\"7428059960\",\"mod_date\":\"2023-09-22,12:42:58\"}', '2023-09-22 12:42:58', 1),
(309, 40, 1, 1, 'Account Update By Admin  - {\"name\":\"Admin\",\"email\":\"fazlu.cotginanalyticsa@gmail.com\",\"mobile\":\"7428059960\",\"mod_date\":\"2023-09-22,12:43:11\"}', '2023-09-22 12:43:11', 1),
(310, 40, 1, 1, 'Account Update By Admin  - {\"name\":\"Admin\",\"email\":\"fazlu.cotginanalytics@gmail.com\",\"mobile\":\"7428059960\",\"mod_date\":\"2023-09-22,12:43:15\"}', '2023-09-22 12:43:15', 1),
(311, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-09-22 13:48:36', 1),
(312, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-22 14:52:14', 1),
(313, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-25 09:39:50', 1),
(314, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-09-25 09:50:55', 1),
(315, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-25 09:51:02', 1),
(316, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-25 12:00:29', 1),
(317, 40, 32, 1, 'Add Lead  - {\"first_name\":\"Fazlu \",\"last_name\":\"Rehman\",\"mobile_1\":\"3984923992\",\"mobile_2\":\"8937939498\",\"email\":\"fazlu.cotginanalystic@gmail.com\",\"description\":\"A\",\"lead_status\":\"1\",\"created_date\":\"2023-09-25,01:35:21\",\"user_type\":1,\"type_of_lead\":2,\"user_id\":\"40\"}', '2023-09-25 13:35:21', 1),
(318, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-09-25 15:49:21', 1),
(319, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-25 15:49:48', 1),
(320, 40, 32, 1, 'Update Detail Page Lead  - {\"first_name\":\"Fazlu \",\"last_name\":\"Rehman\",\"mobile_1\":\"3984922222\",\"mobile_2\":\"8937939498\",\"email\":\"fazlu.cotginanalystic@gmail.com\",\"lead_status\":\"1\",\"created_date\":\"2023-09-25,04:44:25\",\"user_type\":1,\"type_of_lead\":2,\"customer_id\":\"Fazl3984\",\"user_id\":\"40\"}', '2023-09-25 16:44:25', 1),
(321, 40, 32, 1, 'Update Detail Page Lead  - {\"first_name\":\"Fazlu \",\"last_name\":\"Rehman\",\"mobile_1\":\"3984922233\",\"mobile_2\":\"8937939498\",\"email\":\"fazlu.cotginanalystic@gmail.com\",\"lead_status\":\"1\",\"created_date\":\"2023-09-25,04:46:29\",\"user_type\":1,\"type_of_lead\":2,\"customer_id\":\"Fazl3984\",\"user_id\":\"40\"}', '2023-09-25 16:46:29', 1),
(322, 40, 32, 1, 'Update Detail Page Lead  - {\"first_name\":\"Fazlu \",\"last_name\":\"Rehman\",\"mobile_1\":\"3984922233\",\"mobile_2\":\"8937939498\",\"email\":\"fazlu.cotginanalystic@gmail.coma\",\"lead_status\":\"1\",\"created_date\":\"2023-09-25,04:47:06\",\"user_type\":1,\"type_of_lead\":2,\"customer_id\":\"Fazl3984\",\"user_id\":\"40\"}', '2023-09-25 16:47:06', 1),
(323, 40, 32, 1, 'Update Detail Page Lead  - {\"first_name\":\"Fazlu xx\",\"last_name\":\"Rehman\",\"mobile_1\":\"3984922233\",\"mobile_2\":\"8937939498\",\"email\":\"fazlu.cotginanalystic@gmail.coma\",\"lead_status\":\"1\",\"mod_date\":\"2023-09-25,04:48:06\",\"user_type\":1,\"type_of_lead\":2,\"customer_id\":\"Fazl3984\",\"user_id\":\"40\"}', '2023-09-25 16:48:06', 1),
(324, 40, 32, 1, 'Update Detail Page Lead  - {\"first_name\":\"Fazlu xx\",\"last_name\":\"Rehman\",\"mobile_1\":\"3984922233\",\"mobile_2\":\"8937939498\",\"email\":\"fazlu.cotginanalystic@gmail.coma\",\"lead_status\":\"2\",\"mod_date\":\"2023-09-25,04:57:45\",\"user_type\":2,\"work_status\":2,\"plan_status\":1,\"type_of_lead\":2,\"sale_date\":\"09-25-2023\",\"customer_id\":\"Fazl3984\",\"user_id\":\"40\"}', '2023-09-25 16:57:45', 1),
(325, 40, 32, 1, 'Update Contact Detail Page  - {\"first_name\":\"Fazlu xx\",\"last_name\":\"Rehman\",\"mobile_1\":\"3984922233\",\"mobile_2\":\"8937939498\",\"email\":\"fazlu.cotginanalystic@gmail.coma\",\"customer_id\":\"Fazl3984\",\"email_opt_out\":\"0\",\"plan_status\":\"1\",\"plan\":\"\",\"amc_plan\":\"\",\"amount\":null,\"remote_id\":\"\",\"sale_id\":\"\",\"worked_id\":\"\",\"work_status\":\"2\",\"courtesy\":null,\"bbb\":null,\"ha\":null,\"fb\":null,\"google\":null,\"service\":null,\"sale_date\":\"01-01-1970\"}', '2023-09-25 16:57:56', 1),
(326, 40, 32, 1, 'Update Contact Detail Page  - {\"first_name\":\"Fazlu xx\",\"last_name\":\"Rehman\",\"mobile_1\":\"3984922233\",\"mobile_2\":\"8937939498\",\"email\":\"fazlu.cotginanalystic@gmail.coma\",\"customer_id\":\"Fazl3984\",\"email_opt_out\":\"0\",\"plan_status\":\"1\",\"plan\":\"\",\"amc_plan\":\"\",\"amount\":\"3333\",\"remote_id\":\"\",\"sale_id\":\"\",\"worked_id\":\"\",\"work_status\":\"2\",\"courtesy\":null,\"bbb\":null,\"ha\":null,\"fb\":null,\"google\":null,\"service\":null,\"sale_date\":\"01-01-1970\"}', '2023-09-25 16:58:21', 1),
(327, 40, 32, 1, 'Update Contact Detail Page  - {\"first_name\":\"Fazlu xx\",\"last_name\":\"Rehman\",\"mobile_1\":\"3984922233\",\"mobile_2\":\"8937939498\",\"email\":\"fazlu.cotginanalystic@gmail.coma\",\"customer_id\":\"Fazl3984\",\"email_opt_out\":\"0\",\"plan_status\":\"1\",\"plan\":\"ad3432as\",\"amc_plan\":\"\",\"amount\":\"3333.00\",\"remote_id\":\"\",\"sale_id\":\"\",\"worked_id\":\"\",\"work_status\":\"2\",\"courtesy\":null,\"bbb\":null,\"ha\":null,\"fb\":null,\"google\":null,\"service\":null,\"sale_date\":\"01-01-1970\"}', '2023-09-25 16:58:56', 1),
(328, 40, 32, 1, 'Update Contact Detail Page  - {\"first_name\":\"Fazlu xx\",\"last_name\":\"Rehman\",\"mobile_1\":\"3984922233\",\"mobile_2\":\"8937939498\",\"email\":\"fazlu.cotginanalystic@gmail.coma\",\"customer_id\":\"Fazl3984\",\"email_opt_out\":\"0\",\"plan_status\":\"1\",\"plan\":\"ad3432as\",\"amc_plan\":\"4\",\"amount\":\"3333.00\",\"remote_id\":\"\",\"sale_id\":\"\",\"worked_id\":\"\",\"work_status\":\"2\",\"courtesy\":null,\"bbb\":null,\"ha\":null,\"fb\":null,\"google\":null,\"service\":null,\"sale_date\":\"01-01-1970\"}', '2023-09-25 17:07:03', 1),
(329, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-09-25 18:25:12', 1),
(330, 40, 40, 1, 'Login User Name ( First Time Login ) - admin@gmail.com', '2023-09-25 18:26:51', 1),
(331, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-09-25 18:26:57', 1),
(332, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-25 18:27:03', 1),
(333, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-26 10:00:41', 1),
(334, 40, 7, 1, 'Add Work Title - dddd', '2023-09-26 11:44:59', 1),
(335, 40, 5, 1, 'Add Booking  - {\"first_name\":\"32\",\"last_name\":\"Rehman\",\"mobile_1\":\"3984922233\",\"mobile_2\":\"8937939498\",\"email\":\"fazlu.cotginanalystic@gmail.coma\",\"date\":\"09-27-2023\",\"time\":\"04:47\",\"timezone\":\"1\",\"booking_status\":\"1\",\"created_date\":\"2023-09-26,04:47:17\",\"user_id\":\"40\"}', '2023-09-26 16:47:17', 1),
(336, 40, 31, 1, 'Add Invoice  - {\"first_name\":\"31\",\"last_name\":\"kumar\",\"mobile_1\":\"4784612316\",\"mobile_2\":\"6432164969\",\"invoice_number\":\"INV-010030\",\"order_number\":\"ORDER-010030\",\"email\":\"amitkumar.cotginanalytics@gmail.com\",\"date\":\"2023-09-26\",\"due_date\":\"2023-10-26\",\"description\":\"All the payments made for repair and service can only be partially refunded within 30 days. Payments made against any software purchases cannot be refunded once software is installed on the customer\'s device. Products once sold cannot be returned. Exchange only in 3 days from Invoice Date.\",\"taxable\":280,\"tax_percentage\":\"10\",\"discount\":\"10\",\"discount_amount\":200,\"other_charges\":\"1000\",\"custom_notes\":\"All the payments made for repair and service can only be partially refunded within 30 days. Payments made against any software purchases cannot be refunded once software is installed on the customer\'s device. Products once sold cannot be returned. Exchange only in 3 days from Invoice Date.\",\"subject\":\"subject\",\"created_date\":\"2023-09-26,05:32:43\",\"user_id\":\"40\"}', '2023-09-26 17:32:44', 1),
(337, 40, 40, 1, 'Login User Name ( First Time Login ) - admin@gmail.com', '2023-09-26 17:51:24', 1),
(338, 40, 32, 1, 'Add Invoice  - {\"first_name\":\"31\",\"last_name\":\"kumar\",\"mobile_1\":\"4784612316\",\"mobile_2\":\"6432164969\",\"invoice_number\":\"INV-010031\",\"order_number\":\"ORDER-010031\",\"email\":\"amitkumar.cotginanalytics@gmail.com\",\"date\":\"2023-09-26\",\"due_date\":\"2023-10-11\",\"description\":\"All the payments made for repair and service can only be partially refunded within 30 days. Payments made against any software purchases cannot be refunded once software is installed on the customer\'s device. Products once sold cannot be returned. Exchange only in 3 days from Invoice Date.\",\"taxable\":127,\"tax_percentage\":\"10\",\"discount\":\"10\",\"discount_amount\":140,\"other_charges\":\"10\",\"custom_notes\":\"All the payments made for repair and service can only be partially refunded within 30 days. Payments made against any software purchases cannot be refunded once software is installed on the customer\'s device. Products once sold cannot be returned. Exchange only in 3 days from Invoice Date.\",\"subject\":\"Invoice\",\"created_date\":\"2023-09-26,05:52:21\",\"user_id\":\"40\"}', '2023-09-26 17:52:21', 1),
(339, 40, 40, 1, 'Login User Name ( First Time Login ) - admin@gmail.com', '2023-09-27 11:08:22', 1),
(340, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-09-27 11:08:29', 1),
(341, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-27 11:08:34', 1),
(342, 40, 40, 1, 'Login User Name ( First Time Login ) - admin@gmail.com', '2023-09-27 11:12:40', 1),
(343, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-09-27 11:12:46', 1),
(344, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-27 11:12:49', 1),
(345, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-09-27 11:15:12', 1),
(346, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-27 11:15:18', 1),
(347, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-09-27 11:15:30', 1),
(348, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-27 11:15:34', 1),
(349, 40, 40, 1, 'Login User Name ( First Time Login ) - admin@gmail.com', '2023-09-28 12:28:54', 1),
(350, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-09-28 12:29:33', 1),
(351, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-28 13:29:03', 1),
(352, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-09-28 13:29:09', 1),
(353, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-28 13:29:12', 1),
(354, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-09-28 13:29:14', 1),
(355, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-28 13:29:19', 1),
(356, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-09-28 13:30:32', 1),
(357, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-28 13:30:35', 1),
(358, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-09-28 13:30:46', 1),
(359, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-28 18:47:00', 1),
(360, 40, 40, 1, 'Login User Name ( First Time Login ) - admin@gmail.com', '2023-09-29 12:08:21', 1),
(361, 40, 40, 1, 'Login User Name ( First Time Login ) - admin@gmail.com', '2023-09-29 12:14:19', 1),
(362, 40, 40, 1, 'Login User Name ( First Time Login ) - admin@gmail.com', '2023-09-29 12:25:54', 1),
(363, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-09-29 12:25:54', 1),
(364, 40, 40, 1, 'Login User Name ( First Time Login ) - admin@gmail.com', '2023-09-29 12:27:43', 1),
(365, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-29 12:28:31', 1),
(366, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-29 12:31:36', 1),
(367, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-09-29 12:31:37', 1),
(368, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-29 12:33:00', 1),
(369, 40, 40, 1, 'Login User Name ( First Time Login ) - admin@gmail.com', '2023-09-29 12:33:25', 1),
(370, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-09-29 12:34:38', 1),
(371, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-29 12:37:01', 1),
(372, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-09-29 12:38:05', 1),
(373, 40, 1, 1, 'Add Lead  - {\"first_name\":\"Ankit\",\"last_name\":\"Jaiswal\",\"mobile_1\":\"7011929337\",\"mobile_2\":\"\",\"email\":\"ankit.cotginanalytics@gmail.com\",\"description\":\"Testing Purpose Only\",\"lead_status\":\"4\",\"created_date\":\"2023-09-29,12:42:47\",\"user_type\":1,\"type_of_lead\":2,\"user_id\":\"40\"}', '2023-09-29 12:42:47', 1),
(374, 40, 2, 1, 'Add Lead  - {\"first_name\":\"Ankit\",\"last_name\":\"Jaiswal\",\"mobile_1\":\"7011929337\",\"mobile_2\":\"\",\"email\":\"ankit.cotginanalytics@gmail.com\",\"description\":\"Testing Purpose Only\",\"lead_status\":\"4\",\"created_date\":\"2023-09-29,12:43:27\",\"user_type\":1,\"type_of_lead\":2,\"user_id\":\"40\"}', '2023-09-29 12:43:27', 1),
(375, 40, 3, 1, 'Add Lead  - {\"first_name\":\"Testing \",\"last_name\":\"User\",\"mobile_1\":\"9876543210\",\"mobile_2\":\"\",\"email\":\"testinguser@gmail.com\",\"description\":\"testing Purpose Only\",\"lead_status\":\"4\",\"created_date\":\"2023-09-29,12:44:16\",\"user_type\":1,\"type_of_lead\":2,\"user_id\":\"40\"}', '2023-09-29 12:44:16', 1),
(376, 40, 40, 1, 'Login User Name ( First Time Login ) - admin@gmail.com', '2023-09-29 12:44:42', 1),
(377, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-29 12:52:32', 1),
(378, 40, 3, 1, 'Update Lead  - {\"first_name\":\"Testing \",\"last_name\":\"User\",\"mobile_1\":\"9876543210\",\"mobile_2\":\"9123456789\",\"email\":\"testinguser@gmail.com\",\"description\":\"testing Purpose Only\",\"lead_status\":\"4\",\"mod_date\":\"2023-09-29,01:03:57\",\"user_type\":1,\"type_of_lead\":2,\"customer_id\":\"Test9876\",\"user_id\":\"40\"}', '2023-09-29 13:03:57', 1),
(379, 40, 3, 1, 'Update Lead  - {\"first_name\":\"Testing \",\"last_name\":\"User\",\"mobile_1\":\"9876543210\",\"mobile_2\":\"9123456789\",\"email\":\"testinguser@gmail.com\",\"description\":\"testing Purpose Only\",\"lead_status\":\"4\",\"mod_date\":\"2023-09-29,01:07:34\",\"user_type\":1,\"type_of_lead\":2,\"customer_id\":\"Test9876\",\"user_id\":\"40\"}', '2023-09-29 13:07:34', 1),
(380, 40, 3, 1, 'Update Lead  - {\"first_name\":\"Testing \",\"last_name\":\"User\",\"mobile_1\":\"9876543210\",\"mobile_2\":\"9123456789\",\"email\":\"testinguser@gmail.com\",\"description\":\"Lorem ipsum dolor sit amet consectetur adipisicing elit. In culpa ea possimus tempore omnis corrupti obcaecati, et pariatur ad. Ex sint dicta rem provident voluptas. Quaerat cum distinctio temporibus. Rem fugit ex, repellendus aspernatur, temporibus cupiditate reprehenderit sequi perspiciatis at eaq\",\"lead_status\":\"4\",\"mod_date\":\"2023-09-29,01:08:27\",\"user_type\":1,\"type_of_lead\":2,\"customer_id\":\"Test9876\",\"user_id\":\"40\"}', '2023-09-29 13:08:27', 1),
(381, 40, 3, 1, 'Update Lead  - {\"first_name\":\"Testing \",\"last_name\":\"User\",\"mobile_1\":\"9876543210\",\"mobile_2\":\"9123456789\",\"email\":\"testinguser@gmail.com\",\"description\":\"Lorem ipsum dolor sit amet consectetur adipisicing elit. In culpa ea possimus tempore omnis corrupti obcaecati, et pariatur ad. Ex sint dicta rem provident voluptas. Quaerat cum distinctio temporibus. Rem fugit ex, repellendus aspernatur, temporibus cupiditate reprehenderit sequi perspiciatis at eaq\",\"lead_status\":\"4\",\"mod_date\":\"2023-09-29,01:08:28\",\"user_type\":1,\"type_of_lead\":2,\"customer_id\":\"Test9876\",\"user_id\":\"40\"}', '2023-09-29 13:08:28', 1),
(382, 40, 3, 1, 'Update Lead  - {\"first_name\":\"Testing \",\"last_name\":\"User\",\"mobile_1\":\"9876543210\",\"mobile_2\":\"9123456789\",\"email\":\"testinguser@gmail.com\",\"description\":\"Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus facere earum illum dolore, atque, excepturi pariatur natus sunt accusantium maxime eius et, eaque temporibus impedit nemo possimus doloremque. Veniam quidem voluptates eius molestias ipsam nesciunt id maiores. Autem amet dicta har\",\"lead_status\":\"4\",\"mod_date\":\"2023-09-29,01:09:07\",\"user_type\":1,\"type_of_lead\":2,\"customer_id\":\"Test9876\",\"user_id\":\"40\"}', '2023-09-29 13:09:07', 1),
(383, 40, 1, 1, 'Add Notes Lead Module  - {\"module_id\":\"3\",\"user_id\":\"40\",\"module_type\":\"1\",\"title\":\"Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime eligendi voluptas molestiae pariatur praesentium earum repudiandae quis labore officia error nostrum assumenda a id, repellendus cupiditate magnam saepe fuga quod excepturi voluptatem dolor modi incidunt obcaecati! Impedit commodi illo\",\"module_name\":\"Lead\",\"created_date\":\"September 29, 2023, 1:10 PM\"}', '2023-09-29 13:10:56', 1),
(384, 40, 2, 1, 'Add Notes Lead Module  - {\"module_id\":\"3\",\"user_id\":\"40\",\"module_type\":\"1\",\"title\":\"Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime eligendi voluptas molestiae pariatur praesentium earum repudiandae quis labore officia error nostrum assumenda a id, repellendus cupiditate magnam saepe fuga quod excepturi voluptatem dolor modi incidunt obcaecati! Impedit commodi illo totam quidem voluptate ea unde sit aperiam harum optio magni exercitationem molestiae vel accusamus, facilis eos obcaecati omnis, cumque modi enim. Nostrum hic aut a cupiditate ipsum, minima commodi laborum natus autem accusamus eum dicta id vitae earum eos cum! Ratione, qui fugit tempora adipisci explicabo eum illo, alias laboriosam hic, cum quos quam iste libero voluptatem voluptas dolorum eius. Ipsa laborum est eum vel explicabo error omnis voluptates quis atque, recusandae cupiditate incidunt officia iusto qui repudiandae nostrum beatae veniam corrupti dolorem labore unde perspiciatis illo tenetur laboriosam. Similique accusantium numquam praesentium quam laudantium illo temporibus accusamus commodi et ad ratione explicabo debitis nemo beatae, vitae blanditiis dicta porro exercitationem facilis aliquam. Hic repudiandae, dolorem non, explicabo, saepe necessitatibus sint distinctio soluta facere aspernatur nulla cupiditate ipsam! Neque, dolorum! Excepturi, inventore numquam! At voluptas eveniet ea nihil provident, numquam placeat iure sequi! Vitae earum dolor inventore sapiente, sit, doloribus tenetur beatae quas aspernatur ex quos, ea pariatur! Eius assumenda a repellat tenetur. Nihil, soluta sunt delectus necessitatibus commodi voluptate odit, error cupiditate repellendus magni in architecto asperiores perferendis quibusdam atque at fuga quam, amet eos hic maiores nesciunt itaque. Nesciunt laboriosam explicabo fugit, alias numquam vero, minus autem inventore voluptatibus omnis consectetur provident assumenda quod fuga eius saepe et perferendis cumque reprehenderit illum impedit voluptas earum quas quam! Nisi quam quis qui. Adipisci accusamus officiis dolorem eos, commodi soluta odit dolor quos quibusdam ipsam ut. Consequuntur ducimus quas, corporis nostrum dignissimos error earum. Quibusdam architecto est sapiente voluptas laborum dolore rem tempora fugiat esse minima. Voluptas sunt, placeat sit ducimus magni dolor quod consequuntur perferendis rerum non. Voluptatum, odio tempore hic nam, dignissimos corrupti in repudiandae culpa aliquid reiciendis earum deleniti, vel nihil eaque sapiente ullam labore dolore veniam harum exercitationem temporibus et. Fugit ea id molestiae debitis excepturi necessitatibus quod, provident omnis doloribus natus tenetur eaque iure architecto non ad quam placeat earum nesciunt repudiandae, hic facilis, et aliquid! Vitae est fuga rem tempore totam autem doloribus dicta nemo omnis aliquid aut culpa eligendi error minima, voluptatum assumenda excepturi explicabo mollitia, velit tempora, unde laborum. Ratione quae a quasi delectus officiis minima repellendus perferendis est culpa distinctio, perspiciatis id. Laboriosam excepturi a expedita repellat vero temporibus veniam ut velit dolore provident. Aperiam nostrum, corrupti explicabo tenetur recusandae molestias et reiciendis quam voluptatem labore, quae facere? A consequatur nulla excepturi, tempore quaerat iure maxime iusto ratione dolore hic aliquid porro molestiae inventore quo optio reprehenderit ex nam dolores ab iste obcaecati itaque sint! Debitis similique error modi nesciunt sunt cum iste mollitia rerum odio, asperiores provident. Natus libero at ea repellat fugiat mollitia consequatur ducimus iure veritatis facere ullam cumque minima, impedit voluptatibus accusamus. Nisi, excepturi qui. Non soluta dignissimos totam tempore dolores aspernatur animi. Minus nemo eos esse veritatis sapiente. Sequi ab at quaerat officia doloribus dolores maiores? Harum quas incidunt, unde ipsum perspiciatis quo. Omnis quis maiores aperiam optio tempora possimus, eligendi at, sequi aut vel in ducimus alias cum saepe vero dicta! Vel voluptatibus, excepturi, exercitationem molestias eos pariatur a eligendi architecto suscipit quia at quos adipisci id reiciendis. Molestias, vitae rerum sed facere voluptatem distinctio qui excepturi, optio, repellendus consectetur perspiciatis? Omnis possimus ducimus dolorum dolore expedita veritatis sequi a delectus, est molestiae qui eius obcaecati hic tempore, nihil eveniet magni quam cum, quos neque consequuntur consequatur alias ab. Labore unde ullam optio consequuntur, quaerat ducimus blanditiis facilis quibusdam iusto debitis! Earum, et perspiciatis numquam architecto quis, consequatur voluptatum delectus voluptatibus quasi odio adipisci culpa quam eaque est cum placeat repellat non sint illo. Voluptatum, temporibus repudiandae enim, aliquam ut numquam laudantium eius reprehenderit tempore quidem ullam vel voluptatibus amet molestias expedita exercitationem, nobis quo. Ab corporis reprehenderit expedita tenetur, dolorem ratione aperiam quam ullam voluptatem doloremque reiciendis cumque similique vitae officiis ea iusto, nostrum explicabo. Quam amet explicabo laborum, quidem alias temporibus nobis numquam repudiandae, repellendus enim cumque. Voluptatem velit harum quibusdam maiores consectetur a doloremque! Corrupti voluptatem officia asperiores molestiae blanditiis ullam voluptates earum dolore! In est eaque deleniti praesentium, quaerat sed earum unde obcaecati laudantium commodi expedita sapiente aspernatur magni suscipit animi libero, quos voluptas soluta minus voluptatum veritatis provident. Aspernatur unde eum quam nisi possimus ut autem accusamus perferendis saepe sequi tempora illum vitae veniam obcaecati facere cumque sapiente vel quos deserunt blanditiis, voluptates recusandae eligendi! Voluptates enim accusamus dolorum! Qui ipsam enim, quisquam totam perspiciatis accusantium facilis tenetur provident cumque commodi ipsa! Ipsa rerum aperiam dolorem ab deleniti doloremque culpa quia voluptates quas neque repudiandae animi numquam magni nobis corrupti, accusantium nihil? Voluptatibus eveniet quaerat reiciendis ab dicta temporibus atque eligendi est quam modi accusantium nam ex unde labore ipsam, architecto rem mollitia? Provident dolorum aliquam, laudantium id consequuntur aliquid! Ut ipsam perferendis officia blanditiis sequi, animi fugiat doloribus nisi culpa rerum beatae aliquid nobis nulla veniam inventore explicabo, itaque nihil rem, saepe adipisci! Natus numquam explicabo animi voluptatum et assumenda unde ea eligendi laborum tempora! Sunt dignissimos deleniti dolor eaque molestias fugiat libero quidem aliquid assumenda. Quos beatae perferendis necessitatibus veniam dolorem quae, velit corrupti et magni mollitia autem impedit dolorum numquam quasi ipsam porro incidunt repellat nam eveniet pariatur, dicta adipisci aliquid nihil! Est, accusantium! Nam, reiciendis beatae magnam aspernatur earum nostrum ducimus alias ea, aperiam harum doloribus repellendus. Laborum doloremque odio dolor culpa ab aut eum ratione quos repellendus. Exercitationem cumque provident aliquid cupiditate nemo voluptatibus rerum nostrum qui expedita voluptatum dolorem assumenda, distinctio consectetur dicta voluptates! Saepe eos ea labore voluptatem optio voluptate velit nemo qui itaque sed culpa nisi, quaerat aperiam eius, quibusdam distinctio fugit. Ratione omnis eligendi eos et ipsa asperiores nemo, ad blanditiis porro molestias similique distinctio sapiente explicabo hic magnam quasi facilis neque rerum quae officiis, labore maxime cumque. Quia labore non facere, magnam, esse optio, assumenda qui expedita iusto inventore atque! Nisi.\",\"module_name\":\"Lead\",\"created_date\":\"September 29, 2023, 1:10 PM\"}', '2023-09-29 13:11:10', 1),
(385, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-09-29 13:40:27', 1),
(386, 40, 4, 1, 'Add Contact  - {\"first_name\":\"Ankit \",\"last_name\":\"Jaiswal\",\"mobile_1\":\"9988552211\",\"mobile_2\":\"9966332211\",\"email\":\"ankit.cotginanalytic@gmail.com\",\"customer_id\":\"Anki9988\",\"email_opt_out\":0,\"plan_status\":\"1\",\"plan\":\"Testing Plan\",\"amc_plan\":\"5\",\"amount\":\"85000\",\"remote_id\":\"38\",\"sale_id\":\"2\",\"worked_id\":\"7\",\"work_status\":\"1\",\"courtesy\":1,\"bbb\":0,\"ha\":0,\"fb\":0,\"google\":0,\"service\":0,\"sale_date\":\"09-29-2023\",\"description\":\"    Testing Contact detail\",\"created_date\":\"2023-09-29,01:43:20\",\"user_type\":2,\"user_id\":\"40\"}', '2023-09-29 13:43:21', 1),
(387, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-29 13:46:36', 1),
(388, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-09-29 13:49:54', 1),
(389, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-29 13:50:10', 1),
(390, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-09-29 13:50:47', 1),
(391, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-29 13:52:09', 1),
(392, 40, 1, 1, 'Add Booking  - {\"first_name\":\"4\",\"last_name\":\"Jaiswal\",\"mobile_1\":\"9988552211\",\"mobile_2\":\"9966332211\",\"email\":\"ankit.cotginanalytic@gmail.com\",\"date\":\"09-29-2023\",\"time\":\"13:01\",\"timezone\":\"3\",\"booking_status\":\"1\",\"created_date\":\"2023-09-29,01:59:10\",\"user_id\":\"40\"}', '2023-09-29 13:59:10', 1),
(393, 40, 1, 1, 'Update Booking Detail Page  - {\"first_name\":\"4\",\"last_name\":\"Jaiswal\",\"mobile_1\":\"9988552211\",\"mobile_2\":\"9966332211\",\"email\":\"ankit.cotginanalytics@gmail.com\",\"date\":\"09-29-2023\",\"mod_date\":\"2023-09-29,01:59:40\",\"time\":\"13:01\",\"timezone\":\"3\",\"booking_status\":\"1\"}', '2023-09-29 13:59:40', 1),
(394, 40, 1, 1, 'Update Booking Detail Page  - {\"first_name\":\"4\",\"last_name\":\"Jaiswal\",\"mobile_1\":\"9988552211\",\"mobile_2\":\"9966332211\",\"email\":\"ankit.cotginanalytics@gmail.com\",\"date\":\"09-29-2023\",\"mod_date\":\"2023-09-29,01:59:51\",\"time\":\"13:01\",\"timezone\":\"3\",\"booking_status\":\"1\"}', '2023-09-29 13:59:51', 1),
(395, 40, 1, 1, 'Update Booking Detail Page  - {\"first_name\":\"4\",\"last_name\":\"Jaiswal\",\"mobile_1\":\"9988552211\",\"mobile_2\":\"9966332211\",\"email\":\"ankit.cotginanalytics@gmail.com\",\"date\":\"09-29-2023\",\"mod_date\":\"2023-09-29,01:59:55\",\"time\":\"13:01\",\"timezone\":\"3\",\"booking_status\":\"1\"}', '2023-09-29 13:59:55', 1),
(396, 40, 40, 1, 'Login User Name ( First Time Login ) - admin@gmail.com', '2023-09-29 15:23:30', 1),
(397, 40, 1, 1, 'Update Booking Detail Page  - {\"first_name\":\"4\",\"last_name\":\"Jaiswal\",\"mobile_1\":\"3453453453\",\"mobile_2\":\"9966332211\",\"email\":\"ankit.cotginanalytic@gmail.com\",\"date\":\"09-29-2023\",\"mod_date\":\"2023-09-29,03:25:20\",\"time\":\"13:01\",\"timezone\":\"3\",\"booking_status\":\"1\"}', '2023-09-29 15:25:20', 1),
(398, 40, 1, 1, 'Update Booking Detail Page  - {\"first_name\":\"4\",\"last_name\":\"Jaiswal\",\"mobile_1\":\"9988552211\",\"mobile_2\":\"9966332211\",\"email\":\"ankit.cotginanalytic@gmail.com\",\"date\":\"09-29-2023\",\"mod_date\":\"2023-09-29,03:25:30\",\"time\":\"13:01\",\"timezone\":\"2\",\"booking_status\":\"1\"}', '2023-09-29 15:25:30', 1),
(399, 40, 1, 1, 'Update Booking Detail Page  - {\"first_name\":\"4\",\"last_name\":\"Jaiswal\",\"mobile_1\":\"9988552211\",\"mobile_2\":\"9966332211\",\"email\":\"ankit.cotginanalytic@gmail.com\",\"date\":\"09-29-2023\",\"mod_date\":\"2023-09-29,03:25:37\",\"time\":\"13:01\",\"timezone\":\"3\",\"booking_status\":\"2\"}', '2023-09-29 15:25:37', 1),
(400, 40, 1, 1, 'Update Booking Detail Page  - {\"first_name\":\"4\",\"last_name\":\"Jaiswal\",\"mobile_1\":\"9988552211\",\"mobile_2\":\"9966332211\",\"email\":\"ankit.cotginanalytic@gmail.com\",\"date\":\"09-29-2023\",\"mod_date\":\"2023-09-29,03:25:40\",\"time\":\"13:01\",\"timezone\":\"3\",\"booking_status\":\"2\"}', '2023-09-29 15:25:40', 1),
(401, 40, 1, 1, 'Update Booking Detail Page  - {\"first_name\":\"4\",\"last_name\":\"Jaiswal\",\"mobile_1\":\"9988552211\",\"mobile_2\":\"9966332211\",\"email\":\"ankit.cotginanalytic@gmail.com\",\"date\":\"09-29-2023\",\"mod_date\":\"2023-09-29,03:25:40\",\"time\":\"13:01\",\"timezone\":\"3\",\"booking_status\":\"2\"}', '2023-09-29 15:25:40', 1),
(402, 40, 1, 1, 'Update Booking Detail Page  - {\"first_name\":\"4\",\"last_name\":\"Jaiswal\",\"mobile_1\":\"9988552222\",\"mobile_2\":\"9966332211\",\"email\":\"ankit.cotginanalytic@gmail.com\",\"date\":\"09-29-2023\",\"mod_date\":\"2023-09-29,03:28:12\",\"time\":\"13:01\",\"timezone\":\"3\",\"booking_status\":\"1\"}', '2023-09-29 15:28:12', 1),
(403, 40, 1, 1, 'Update Booking  - {\"first_name\":\"4\",\"last_name\":\"Jaiswal\",\"mobile_1\":\"9988552211\",\"mobile_2\":\"9966332211\",\"email\":\"ankit.cotginanalytic@gmail.com\",\"date\":\"09-29-2023\",\"mod_date\":\"2023-09-29,03:29:04\",\"time\":\"13:01\",\"timezone\":\"3\",\"booking_status\":\"1\",\"user_id\":\"40\"}', '2023-09-29 15:29:04', 1),
(404, 40, 1, 1, 'Update Booking Detail Page  - {\"first_name\":\"4\",\"last_name\":\"Jaiswal\",\"mobile_1\":\"9988552211\",\"mobile_2\":\"9966332211\",\"email\":\"ankit.cotginanalytic@gmail.csom\",\"date\":\"09-29-2023\",\"mod_date\":\"2023-09-29,03:35:10\",\"time\":\"13:01\",\"timezone\":\"3\",\"booking_status\":\"1\"}', '2023-09-29 15:35:10', 1),
(405, 40, 1, 1, 'Update Booking Detail Page  - {\"first_name\":\"4\",\"last_name\":\"Jaiswal\",\"mobile_1\":\"9988552211\",\"mobile_2\":\"9966332211\",\"email\":\"ankit.cotginanalytic@gmail.comsdfnsdkjf\",\"date\":\"09-29-2023\",\"mod_date\":\"2023-09-29,03:35:16\",\"time\":\"13:01\",\"timezone\":\"3\",\"booking_status\":\"1\"}', '2023-09-29 15:35:16', 1),
(406, 40, 1, 1, 'Update Booking Detail Page  - {\"first_name\":\"4\",\"last_name\":\"Jaiswal\",\"mobile_1\":\"9988552211\",\"mobile_2\":\"9966332211\",\"email\":\"ankit.cotginanalytic@gmail.comsdfnsdkjf\",\"date\":\"09-29-2023\",\"mod_date\":\"2023-09-29,03:35:31\",\"time\":\"13:01\",\"timezone\":\"3\",\"booking_status\":\"1\"}', '2023-09-29 15:35:31', 1),
(407, 40, 1, 1, 'Update Booking Detail Page  - {\"first_name\":\"4\",\"last_name\":\"Jaiswal\",\"mobile_1\":\"9988552211\",\"mobile_2\":\"9966332211\",\"email\":\"ankit.cotginanalytic@gmail.comsdfnsdkjf\",\"date\":\"09-29-2023\",\"mod_date\":\"2023-09-29,03:35:32\",\"time\":\"13:01\",\"timezone\":\"3\",\"booking_status\":\"1\"}', '2023-09-29 15:35:32', 1),
(408, 40, 1, 1, 'Update Booking Detail Page  - {\"first_name\":\"4\",\"last_name\":\"Jaiswal\",\"mobile_1\":\"9988552211\",\"mobile_2\":\"9966332211\",\"email\":\"ankit.cotginanalytic@gmail.comsdfnsdkjf\",\"date\":\"09-29-2023\",\"mod_date\":\"2023-09-29,03:35:32\",\"time\":\"13:01\",\"timezone\":\"3\",\"booking_status\":\"1\"}', '2023-09-29 15:35:32', 1),
(409, 40, 1, 1, 'Update Booking Detail Page  - {\"first_name\":\"4\",\"last_name\":\"Jaiswal\",\"mobile_1\":\"9988552216\",\"mobile_2\":\"9966332211\",\"email\":\"ankit.cotginanalytic@gmail.com\",\"date\":\"09-29-2023\",\"mod_date\":\"2023-09-29,03:46:56\",\"time\":\"13:01\",\"timezone\":\"3\",\"booking_status\":\"1\"}', '2023-09-29 15:46:56', 1),
(410, 40, 1, 1, 'Update Booking Detail Page  - {\"first_name\":\"4\",\"last_name\":\"Jaiswal\",\"mobile_1\":\"9988552234\",\"mobile_2\":\"9966332211\",\"email\":\"ankit.cotginanalytic@gmail.com\",\"date\":\"09-29-2023\",\"mod_date\":\"2023-09-29,03:48:42\",\"time\":\"13:01\",\"timezone\":\"3\",\"booking_status\":\"1\"}', '2023-09-29 15:48:42', 1),
(411, 40, 1, 1, 'Update Booking Detail Page  - {\"first_name\":\"4\",\"last_name\":\"Jaiswal\",\"mobile_1\":\"9988552234\",\"mobile_2\":\"9966332211\",\"email\":\"ankit.cotginanalytic@gmail.com\",\"date\":\"09-29-2023\",\"mod_date\":\"2023-09-29,03:49:29\",\"time\":\"13:01\",\"timezone\":\"3\",\"booking_status\":\"1\"}', '2023-09-29 15:49:29', 1),
(412, 40, 1, 1, 'Update Booking Detail Page  - {\"first_name\":\"4\",\"last_name\":\"Jaiswal\",\"mobile_1\":\"9988553223\",\"mobile_2\":\"9966332211\",\"email\":\"ankit.cotginanalytic@gmail.com\",\"date\":\"09-29-2023\",\"mod_date\":\"2023-09-29,03:50:17\",\"time\":\"13:01\",\"timezone\":\"3\",\"booking_status\":\"1\"}', '2023-09-29 15:50:17', 1),
(413, 40, 1, 1, 'Update Booking Detail Page  - {\"first_name\":\"4\",\"last_name\":\"Jaiswal\",\"mobile_1\":\"9988553223\",\"mobile_2\":\"9966332211\",\"email\":\"ankit.cotginanalytic@gmail.comaf\",\"date\":\"09-29-2023\",\"mod_date\":\"2023-09-29,03:50:30\",\"time\":\"13:01\",\"timezone\":\"3\",\"booking_status\":\"1\"}', '2023-09-29 15:50:30', 1),
(414, 40, 1, 1, 'Update Booking Detail Page  - {\"first_name\":\"4\",\"last_name\":\"Jaiswal\",\"mobile_1\":\"9988553223\",\"mobile_2\":\"9966332211\",\"email\":\"ankit.cotginanalytic@gmail.comaf33\",\"date\":\"09-29-2023\",\"mod_date\":\"2023-09-29,03:50:43\",\"time\":\"13:01\",\"timezone\":\"3\",\"booking_status\":\"1\"}', '2023-09-29 15:50:43', 1),
(415, 40, 1, 1, 'Update Booking Detail Page  - {\"first_name\":\"4\",\"last_name\":\"Jaiswal\",\"mobile_1\":\"9988552211\",\"mobile_2\":\"9966332211\",\"email\":\"ankit.cotginanalytic@gmail.com33\",\"date\":\"09-29-2023\",\"mod_date\":\"2023-09-29,03:51:03\",\"time\":\"13:01\",\"timezone\":\"3\",\"booking_status\":\"1\"}', '2023-09-29 15:51:03', 1),
(416, 40, 1, 1, 'Update Booking Detail Page  - {\"first_name\":\"4\",\"last_name\":\"Jaiswal\",\"mobile_1\":\"9988552211\",\"mobile_2\":\"9966332211\",\"email\":\"ankit.cotginanalytic@gmail.com33\",\"date\":\"09-29-2023\",\"mod_date\":\"2023-09-29,03:51:03\",\"time\":\"13:01\",\"timezone\":\"3\",\"booking_status\":\"1\"}', '2023-09-29 15:51:03', 1),
(417, 40, 1, 1, 'Update Booking Detail Page  - {\"first_name\":\"4\",\"last_name\":\"Jaiswal\",\"mobile_1\":\"9988552211\",\"mobile_2\":\"9966332211\",\"email\":\"ankit.cotginanalytic@gmail.com33\",\"date\":\"09-29-2023\",\"mod_date\":\"2023-09-29,03:51:03\",\"time\":\"13:01\",\"timezone\":\"3\",\"booking_status\":\"1\"}', '2023-09-29 15:51:03', 1),
(418, 40, 1, 1, 'Update Booking Detail Page  - {\"first_name\":\"4\",\"last_name\":\"Jaiswal\",\"mobile_1\":\"9988333333\",\"mobile_2\":\"9966332211\",\"email\":\"ankit.cotginanalytic@gmail.com33\",\"date\":\"09-29-2023\",\"mod_date\":\"2023-09-29,03:53:04\",\"time\":\"13:01\",\"timezone\":\"3\",\"booking_status\":\"1\"}', '2023-09-29 15:53:04', 1),
(419, 40, 1, 1, 'Add Invoice  - {\"first_name\":\"2\",\"last_name\":\"Jaiswal\",\"mobile_1\":\"7011929337\",\"mobile_2\":\"\",\"invoice_number\":\"INV-0100\",\"order_number\":\"ORDER-0100\",\"email\":\"ankit.cotginanalytics@gmail.com\",\"date\":\"2023-09-29\",\"due_date\":\"2023-10-31\",\"description\":\"All the payments made for repair and service can only be partially refunded within 30 days. Payments made against any software purchases cannot be refunded once software is installed on the customer\'s device. Products once sold cannot be returned. Exchange only in 3 days from Invoice Date.\",\"taxable\":97100,\"tax_percentage\":\"10\",\"discount\":\"5\",\"discount_amount\":51000,\"other_charges\":\"2000\",\"custom_notes\":\"All the payments made for repair and service can only be partially refunded within 30 days. Payments made against any software purchases cannot be refunded once software is installed on the customer\'s device. Products once sold cannot be returned. Exchange only in 3 days from Invoice Date.\",\"subject\":\"Invoice Testing\",\"created_date\":\"2023-09-29,03:53:08\",\"user_id\":\"40\"}', '2023-09-29 15:53:08', 1),
(420, 40, 3, 1, 'Add Notes Lead Module  - {\"module_id\":\"1\",\"user_id\":\"40\",\"module_type\":\"3\",\"title\":\"ss\",\"module_name\":\"Booking\",\"created_date\":\"September 29, 2023, 3:55 PM\"}', '2023-09-29 15:55:39', 1),
(421, 40, 1, 1, 'Update Booking Detail Page  - {\"first_name\":\"4\",\"last_name\":\"Jaiswal\",\"mobile_1\":\"9988552232\",\"mobile_2\":\"9966332211\",\"email\":\"ankit.cotginanalytic@gmail.com\",\"date\":\"09-29-2023\",\"mod_date\":\"2023-09-29,03:55:50\",\"time\":\"13:01\",\"timezone\":\"3\",\"booking_status\":\"1\"}', '2023-09-29 15:55:50', 1),
(422, 40, 1, 1, 'Delete Invoice  id - 1', '2023-09-29 15:58:20', 1),
(423, 40, 1, 1, 'Update Booking Detail Page  - {\"first_name\":\"4\",\"last_name\":\"Jaiswal\",\"mobile_1\":\"9983345343\",\"mobile_2\":\"9966332211\",\"email\":\"ankit.cotginanalytic@gmail.com\",\"date\":\"09-29-2023\",\"mod_date\":\"2023-09-29,03:58:31\",\"time\":\"13:01\",\"timezone\":\"3\",\"booking_status\":\"1\"}', '2023-09-29 15:58:31', 1),
(424, 40, 1, 1, 'Update Booking Detail Page  - {\"first_name\":\"4\",\"last_name\":\"Jaiswal\",\"mobile_1\":\"9983345343\",\"mobile_2\":\"9966332211\",\"email\":\"ankit.cotginanalytic@gmail.com\",\"date\":\"09-29-2023\",\"mod_date\":\"2023-09-29,03:58:33\",\"time\":\"13:01\",\"timezone\":\"3\",\"booking_status\":\"1\"}', '2023-09-29 15:58:33', 1),
(425, 40, 1, 1, 'Update Booking Detail Page  - {\"first_name\":\"4\",\"last_name\":\"Jaiswal\",\"mobile_1\":\"9983345343\",\"mobile_2\":\"9966332211\",\"email\":\"ankit.cotginanalytic@gmail.com\",\"date\":\"09-29-2023\",\"mod_date\":\"2023-09-29,03:58:35\",\"time\":\"13:01\",\"timezone\":\"3\",\"booking_status\":\"1\"}', '2023-09-29 15:58:35', 1),
(426, 40, 1, 1, 'Update Booking Detail Page  - {\"first_name\":\"4\",\"last_name\":\"Jaiswal\",\"mobile_1\":\"9988552211\",\"mobile_2\":\"9966332211\",\"email\":\"ankit.cotginanalytic@gmail.com\",\"date\":\"09-29-2023\",\"mod_date\":\"2023-09-29,03:58:42\",\"time\":\"13:01\",\"timezone\":\"3\",\"booking_status\":\"1\"}', '2023-09-29 15:58:42', 1),
(427, 40, 2, 1, 'Add Invoice  - {\"first_name\":\"2\",\"last_name\":\"Jaiswal\",\"mobile_1\":\"7011929337\",\"mobile_2\":\"\",\"invoice_number\":\"INV-01001\",\"order_number\":\"ORDER-01001\",\"email\":\"ankit.cotginanalytics@gmail.com\",\"date\":\"2023-09-29\",\"due_date\":\"2023-10-29\",\"description\":\"All the payments made for repair and service can only be partially refunded within 30 days. Payments made against any software purchases cannot be refunded once software is installed on the customer\'s device. Products once sold cannot be returned. Exchange only in 3 days from Invoice Date.\",\"taxable\":0,\"tax_percentage\":\"0\",\"discount\":\"0100\",\"discount_amount\":10000,\"other_charges\":\"0\",\"custom_notes\":\"All the payments made for repair and service can only be partially refunded within 30 days. Payments made against any software purchases cannot be refunded once software is installed on the customer\'s device. Products once sold cannot be returned. Exchange only in 3 days from Invoice Date.\",\"subject\":\"testing\",\"created_date\":\"2023-09-29,03:59:16\",\"user_id\":\"40\"}', '2023-09-29 15:59:16', 1),
(428, 40, 1, 1, 'Update Booking Detail Page  - {\"first_name\":\"4\",\"last_name\":\"Jaiswal\",\"mobile_1\":\"9988552434\",\"mobile_2\":\"9966332211\",\"email\":\"ankit.cotginanalytic@gmail.com\",\"date\":\"09-29-2023\",\"mod_date\":\"2023-09-29,04:00:02\",\"time\":\"13:01\",\"timezone\":\"3\",\"booking_status\":\"1\"}', '2023-09-29 16:00:02', 1),
(429, 40, 3, 1, 'Add Invoice  - {\"first_name\":\"2\",\"last_name\":\"Jaiswal\",\"mobile_1\":\"7011929337\",\"mobile_2\":\"\",\"invoice_number\":\"INV-01002\",\"order_number\":\"ORDER-01002\",\"email\":\"ankit.cotginanalytics@gmail.com\",\"date\":\"2023-09-29\",\"due_date\":\"2023-09-29\",\"description\":\"All the payments made for repair and service can only be partially refunded within 30 days. Payments made against any software purchases cannot be refunded once software is installed on the customer\'s device. Products once sold cannot be returned. Exchange only in 3 days from Invoice Date.\",\"taxable\":0,\"tax_percentage\":\"0\",\"discount\":\"0100\",\"discount_amount\":10000,\"other_charges\":\"0\",\"custom_notes\":\"All the payments made for repair and service can only be partially refunded within 30 days. Payments made against any software purchases cannot be refunded once software is installed on the customer\'s device. Products once sold cannot be returned. Exchange only in 3 days from Invoice Date.\",\"subject\":\"Testing\",\"created_date\":\"2023-09-29,04:01:28\",\"user_id\":\"40\"}', '2023-09-29 16:01:28', 1),
(430, 40, 1, 1, 'Update Booking Detail Page  - {\"first_name\":\"4\",\"last_name\":\"Jaiswal\",\"mobile_1\":\"9988552211\",\"mobile_2\":\"9966332211\",\"email\":\"ankit.cotginanalytics@gmail.com\",\"date\":\"09-29-2023\",\"mod_date\":\"2023-09-29,04:09:24\",\"time\":\"13:01\",\"timezone\":\"3\",\"booking_status\":\"1\"}', '2023-09-29 16:09:24', 1),
(431, 40, 2, 1, 'Add Booking  - {\"first_name\":\"2\",\"last_name\":\"Jaiswal\",\"mobile_1\":\"7011929337\",\"mobile_2\":\"8855669988\",\"email\":\"ankit.cotginanalytics@gmail.com\",\"date\":\"09-29-2023\",\"time\":\"16:12\",\"timezone\":\"2\",\"booking_status\":\"2\",\"created_date\":\"2023-09-29,04:09:56\",\"user_id\":\"40\"}', '2023-09-29 16:09:56', 1),
(432, 40, 4, 1, 'Add Invoice  - {\"first_name\":5,\"last_name\":\"0\",\"mobile_1\":\"2\",\"mobile_2\":\"8699826396\",\"invoice_number\":\"INV-01003\",\"order_number\":\"ORDER-01003\",\"email\":\"fazlu.cotginanalytics@gmail.com\",\"date\":\"2023-09-29\",\"due_date\":\"2023-10-29\",\"description\":\"All the payments made for repair and service can only be partially refunded within 30 days. Payments made against any software purchases cannot be refunded once software is installed on the customer\'s device. Products once sold cannot be returned. Exchange only in 3 days from Invoice Date.\",\"taxable\":0,\"tax_percentage\":\"0\",\"discount\":\"0\",\"discount_amount\":0,\"other_charges\":\"0\",\"custom_notes\":\"All the payments made for repair and service can only be partially refunded within 30 days. Payments made against any software purchases cannot be refunded once software is installed on the customer\'s device. Products once sold cannot be returned. Exchange only in 3 days from Invoice Date.\",\"subject\":\"testing invoice\",\"created_date\":\"2023-09-29,04:59:53\",\"user_id\":\"40\"}', '2023-09-29 16:59:53', 1),
(433, 40, 4, 1, 'Delete Invoice  id - 4', '2023-09-29 17:00:11', 1),
(435, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-29 18:02:27', 1),
(436, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-09-29 18:02:27', 1);
INSERT INTO `tbl_log` (`id`, `user_id`, `insert_id`, `authentication_status`, `title`, `created_date`, `status`) VALUES
(437, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-09-29 18:02:43', 1),
(440, 40, 8, 1, 'Add Invoice  - {\"first_name\":\"2\",\"last_name\":\"Jaiswal\",\"mobile_1\":\"7011929337\",\"mobile_2\":\"\",\"invoice_number\":\"INV-01004\",\"order_number\":\"ORDER-01004\",\"email\":\"ankit.cotginanalytics@gmail.com\",\"date\":\"2023-09-30\",\"due_date\":\"2023-11-13\",\"description\":\"All the payments made for repair and service can only be partially refunded within 30 days. Payments made against any software purchases cannot be refunded once software is installed on the customer\'s device. Products once sold cannot be returned. Exchange only in 3 days from Invoice Date.\",\"taxable\":550,\"tax_percentage\":\"5\",\"discount\":\"10\",\"discount_amount\":1000,\"other_charges\":\"2000\",\"custom_notes\":\"All the payments made for repair and service can only be partially refunded within 30 days. Payments made against any software purchases cannot be refunded once software is installed on the customer\'s device. Products once sold cannot be returned. Exchange only in 3 days from Invoice Date.\",\"subject\":\"Testing\",\"created_date\":\"2023-09-29,06:17:49\",\"user_id\":\"40\"}', '2023-09-29 18:17:49', 1),
(441, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-10-03 10:26:53', 1),
(442, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-10-03 11:54:29', 1),
(443, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-10-03 11:54:36', 1),
(444, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-10-03 13:39:25', 1),
(445, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-10-03 13:40:06', 1),
(446, 40, 40, 1, 'Login User Name ( First Time Login ) - admin@gmail.com', '2023-10-03 15:11:05', 1),
(447, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-10-03 15:11:20', 1),
(448, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-10-03 15:11:25', 1),
(449, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-10-03 15:36:34', 1),
(450, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-10-03 15:36:38', 1),
(451, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-10-03 15:44:58', 1),
(452, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-10-03 15:45:02', 1),
(453, 40, 1, 1, 'Delete Sale Title id - 1', '2023-10-03 16:52:42', 1),
(454, 40, 1, 1, 'Delete Sale Title id - 1', '2023-10-03 16:52:47', 1),
(455, 40, 2, 1, 'Delete Sale Title id - 2', '2023-10-03 16:52:47', 1),
(456, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-10-03 17:31:32', 1),
(457, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-10-03 17:35:06', 1),
(458, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-10-03 17:35:07', 1),
(459, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-10-03 17:35:29', 1),
(460, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-10-03 17:43:38', 1),
(461, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-10-03 17:44:42', 1),
(462, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-10-03 17:47:57', 1),
(463, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-10-03 17:48:24', 1),
(464, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-10-03 17:48:26', 1),
(465, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-10-03 17:52:21', 1),
(466, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-10-03 17:52:29', 1),
(467, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-10-03 17:52:39', 1),
(468, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-10-03 17:52:58', 1),
(469, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-10-03 17:53:02', 1),
(470, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-10-03 17:53:04', 1),
(471, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-10-03 17:53:46', 1),
(472, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-10-03 17:53:47', 1),
(473, 40, 40, 1, 'Login User Name  - admin@gmail.com', '2023-10-03 17:54:09', 1),
(474, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-10-03 17:58:04', 1),
(475, 40, 40, 1, 'Login User Name ( First Time Login ) - admin@gmail.com', '2023-10-03 18:00:48', 1),
(476, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-10-03 18:01:03', 1),
(477, 40, 40, 1, 'Login User Name ( First Time Login ) - admin@gmail.com', '2023-10-03 18:10:29', 1),
(478, 40, 40, 1, 'Login User Name ( First Time Login ) - admin@gmail.com', '2023-10-03 18:12:53', 1),
(479, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-10-03 18:12:54', 1),
(480, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-10-03 18:27:00', 1),
(481, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-10-03 18:27:00', 1),
(482, 40, 40, 1, 'Login User Name ( First Time Login ) - admin@gmail.com', '2023-10-03 18:29:45', 1),
(483, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-10-03 18:30:24', 1),
(484, 40, 40, 1, 'Login User Name ( First Time Login ) - admin@gmail.com', '2023-10-03 18:31:05', 1),
(485, 34, 34, 1, 'Login User Name ( First Time Login ) - atul.ths', '2023-10-03 18:32:00', 1),
(486, 34, 34, 1, 'Logout User Name  - atul.ths', '2023-10-03 18:32:14', 1),
(487, 34, 34, 1, 'Login User Name ( First Time Login ) - atul.ths', '2023-10-03 18:32:58', 1),
(488, 34, 34, 1, 'Logout User Name  - atul.ths', '2023-10-03 18:33:17', 1),
(489, 34, 34, 1, 'Login User Name  - atul.ths', '2023-10-03 18:34:11', 1),
(490, 34, 34, 1, 'Logout User Name  - atul.ths', '2023-10-03 18:34:27', 1),
(491, 40, 40, 1, 'Login User Name ( First Time Login ) - admin@gmail.com', '2023-10-03 18:35:13', 1),
(492, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-10-03 18:35:14', 1),
(493, 40, 40, 1, 'Login User Name ( First Time Login ) - admin@gmail.com', '2023-10-03 18:36:28', 1),
(494, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-10-03 18:36:29', 1),
(495, 34, 34, 1, 'Login User Name ( First Time Login ) - atul.ths', '2023-10-03 18:36:57', 1),
(496, 40, 32, 1, 'Chat Panel - H\ney Atul - {\"message\":\"H\\ney Atul\",\"senderID\":\"40\",\"receiverID\":\"34\"}', '2023-10-03 18:37:27', 1),
(497, 34, 33, 1, 'Chat Panel - hi\n - {\"message\":\"hi\\n\",\"senderID\":\"34\",\"receiverID\":\"33\"}', '2023-10-03 18:37:33', 1),
(498, 34, 34, 1, 'Chat Panel - hi\n - {\"message\":\"hi\\n\",\"senderID\":\"34\",\"receiverID\":\"40\"}', '2023-10-03 18:37:50', 1),
(499, 40, 35, 1, 'Chat Panel - kaise ho Amit\n - {\"message\":\"kaise ho Amit\\n\",\"senderID\":\"40\",\"receiverID\":\"34\"}', '2023-10-03 18:37:56', 1),
(500, 34, 36, 1, 'Chat Panel - i am fine and you\n - {\"message\":\"i am fine and you\\n\",\"senderID\":\"34\",\"receiverID\":\"40\"}', '2023-10-03 18:38:11', 1),
(501, 40, 37, 1, 'Chat Panel - im also fine\n - {\"message\":\"im also fine\\n\",\"senderID\":\"40\",\"receiverID\":\"34\"}', '2023-10-03 18:38:16', 1),
(502, 40, 1, 1, 'Account Update By Admin  - {\"name\":\"Admin\",\"email\":\"cotginanalytics@gmail.com\",\"mobile\":\"7428059960\",\"mod_date\":\"2023-10-03,06:45:13\"}', '2023-10-03 18:45:13', 1),
(503, 40, 1, 1, 'Account Update By Admin  - {\"name\":\"Admin\",\"email\":\"fazlu.cotginanalytics@gmail.com\",\"mobile\":\"7428059960\",\"mod_date\":\"2023-10-03,06:55:56\"}', '2023-10-03 18:55:56', 1),
(504, 40, 40, 1, 'Login User Name ( First Time Login ) - admin@gmail.com', '2023-10-03 18:57:38', 1),
(505, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-10-03 18:57:40', 1),
(506, 40, 1, 1, 'Account Update By Admin  - {\"name\":\"Admin\",\"email\":\"fazlu.cotginanalytics@gmail.com\",\"mobile\":\"7699000006\",\"mod_date\":\"2023-10-03,07:14:17\",\"password\":\"e6e061838856bf47e1de730719fb2609\"}', '2023-10-03 19:14:17', 1),
(507, 40, 40, 1, 'Login User Name ( First Time Login ) - admin@gmail.com', '2023-10-03 19:15:12', 1),
(508, 40, 40, 1, 'Logout User Name  - admin@gmail.com', '2023-10-03 19:15:13', 1),
(509, 40, 1, 1, 'Account Update By Admin  - {\"name\":\"Admin\",\"email\":\"cotginanalytics@gmail.com\",\"mobile\":\"7699000006\",\"mod_date\":\"2023-10-03,07:15:47\"}', '2023-10-03 19:15:47', 1),
(510, 40, 40, 1, 'Login User Name ( First Time Login ) - admin@gmail.com', '2023-10-04 10:12:15', 1),
(511, 40, 40, 1, 'Login User Name ( First Time Login ) - admin@gmail.com', '2023-10-04 10:19:34', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_manage_plan`
--

CREATE TABLE `tbl_manage_plan` (
  `id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL COMMENT 'tbl_plan.id',
  `lead_id` int(11) NOT NULL COMMENT 'tbl_lead_contact_user.id',
  `plan_date` varchar(255) NOT NULL,
  `plan_days` int(11) NOT NULL COMMENT 'tbl_plan.days',
  `created_date` datetime DEFAULT NULL,
  `mod_date` datetime DEFAULT NULL,
  `status` tinyint(4) NOT NULL COMMENT '1-Active,2-Inactive,3-Deleted',
  `plan_status` tinyint(4) DEFAULT NULL COMMENT '1-Not Expire,2-Expire'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_manage_plan`
--

INSERT INTO `tbl_manage_plan` (`id`, `plan_id`, `lead_id`, `plan_date`, `plan_days`, `created_date`, `mod_date`, `status`, `plan_status`) VALUES
(1, 5, 4, '2023-09-29', 90, '2023-09-29 13:43:21', NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mass_email`
--

CREATE TABLE `tbl_mass_email` (
  `id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `template_id` int(11) NOT NULL COMMENT '1-Cacellation,2-follow-up,3-Schedule',
  `from_email` varchar(555) NOT NULL COMMENT 'tbl_email_setup.sender_email',
  `reply_email` varchar(555) NOT NULL COMMENT 'tbl_email_setup.sender_email',
  `mass_email_type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-Send Immediate,2-Send scheduled later',
  `schedule_date` varchar(255) DEFAULT NULL,
  `schedule_time` varchar(255) DEFAULT NULL,
  `mass_status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-Sent,2-Schedule,3-Stopped',
  `created_date` datetime NOT NULL,
  `mod_date` datetime DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-Active,2-InActive,3-Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_mass_email`
--

INSERT INTO `tbl_mass_email` (`id`, `agent_id`, `template_id`, `from_email`, `reply_email`, `mass_email_type`, `schedule_date`, `schedule_time`, `mass_status`, `created_date`, `mod_date`, `status`) VALUES
(1, 41, 1, 'cotginanalytics@gmail.com', 'trusthavensolution@gmail.com', 0, '2023-09-22', '00:36', 1, '2023-09-20 12:47:27', NULL, 1),
(2, 41, 2, 'cotginanalytics@gmail.com', 'trusthavensolution@gmail.com', 1, '', '', 1, '2023-09-20 12:48:09', NULL, 1),
(3, 41, 1, 'cotginanalytics@gmail.com', 'trusthavensolution@gmail.com', 1, '', '', 1, '2023-09-20 12:54:11', NULL, 1),
(4, 41, 1, 'cotginanalytics@gmail.com', 'trusthavensolution@gmail.com', 2, '2023-09-20', '12:58', 1, '2023-09-20 12:56:40', NULL, 1),
(5, 41, 2, 'cotginanalytics@gmail.com', 'trusthavensolution@gmail.com', 2, '2023-09-20', '13:02', 1, '2023-09-20 01:00:32', NULL, 1),
(6, 41, 1, 'cotginanalytics@gmail.com', 'trusthavensolution@gmail.com', 0, '2023-09-22', '00:36', 1, '2023-09-20 12:47:27', NULL, 1),
(7, 41, 2, 'cotginanalytics@gmail.com', 'trusthavensolution@gmail.com', 1, '', '', 1, '2023-09-20 12:48:09', NULL, 1),
(8, 41, 1, 'cotginanalytics@gmail.com', 'trusthavensolution@gmail.com', 1, '', '', 1, '2023-09-20 12:54:11', NULL, 1),
(9, 41, 1, 'cotginanalytics@gmail.com', 'trusthavensolution@gmail.com', 2, '2023-09-20', '12:58', 1, '2023-09-20 12:56:40', NULL, 1),
(10, 41, 2, 'cotginanalytics@gmail.com', 'trusthavensolution@gmail.com', 2, '2023-09-20', '13:02', 1, '2023-09-20 01:00:32', NULL, 1),
(11, 41, 1, 'cotginanalytics@gmail.com', 'trusthavensolution@gmail.com', 0, '2023-09-22', '00:36', 1, '2023-09-20 12:47:27', NULL, 1),
(12, 41, 2, 'cotginanalytics@gmail.com', 'trusthavensolution@gmail.com', 1, '', '', 1, '2023-09-20 12:48:09', NULL, 1),
(13, 41, 1, 'cotginanalytics@gmail.com', 'trusthavensolution@gmail.com', 1, '', '', 1, '2023-09-20 12:54:11', NULL, 1),
(14, 41, 1, 'cotginanalytics@gmail.com', 'trusthavensolution@gmail.com', 2, '2023-09-20', '12:58', 1, '2023-09-20 12:56:40', NULL, 1),
(15, 41, 2, 'cotginanalytics@gmail.com', 'trusthavensolution@gmail.com', 2, '2023-09-20', '13:02', 1, '2023-09-20 01:00:32', NULL, 1),
(16, 41, 1, 'cotginanalytics@gmail.com', 'trusthavensolution@gmail.com', 0, '2023-09-22', '00:36', 1, '2023-09-20 12:47:27', NULL, 1),
(17, 41, 2, 'cotginanalytics@gmail.com', 'trusthavensolution@gmail.com', 1, '', '', 1, '2023-09-20 12:48:09', NULL, 1),
(18, 41, 1, 'cotginanalytics@gmail.com', 'trusthavensolution@gmail.com', 1, '', '', 1, '2023-09-20 12:54:11', NULL, 1),
(19, 41, 1, 'cotginanalytics@gmail.com', 'trusthavensolution@gmail.com', 2, '2023-09-20', '12:58', 1, '2023-09-20 12:56:40', NULL, 1),
(20, 41, 2, 'cotginanalytics@gmail.com', 'trusthavensolution@gmail.com', 2, '2023-09-20', '13:02', 1, '2023-09-20 01:00:32', NULL, 1),
(21, 41, 1, 'cotginanalytics@gmail.com', 'trusthavensolution@gmail.com', 2, '2023-09-22', '14:55', 1, '2023-09-22 02:53:37', NULL, 1),
(22, 41, 1, 'cotginanalytics@gmail.com', 'trusthavensolution@gmail.com', 1, '', '', 1, '2023-09-25 05:18:19', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mass_lead`
--

CREATE TABLE `tbl_mass_lead` (
  `id` int(11) NOT NULL,
  `mass_email_id` int(11) NOT NULL COMMENT 'tbl_mass_email.id',
  `api_response_id` varchar(255) NOT NULL,
  `agent_id` int(11) NOT NULL COMMENT 'tbl_users.id',
  `lead_id` int(11) NOT NULL COMMENT 'tbl_lead_contact_user.id,tbl_lead.id',
  `lead_type` tinyint(4) NOT NULL COMMENT '1-tbl_lead_contact_users,2-tbl_lead',
  `email_status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-Sent,2-Schedule,3-Stopped',
  `created_date` datetime NOT NULL,
  `mod_date` datetime DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'Active,2-InActive,3-Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_mass_lead`
--

INSERT INTO `tbl_mass_lead` (`id`, `mass_email_id`, `api_response_id`, `agent_id`, `lead_id`, `lead_type`, `email_status`, `created_date`, `mod_date`, `status`) VALUES
(1, 1, '<202309200717.71950451348@smtp-relay.mailin.fr>', 41, 10, 2, 1, '2023-09-20 12:47:29', NULL, 1),
(2, 1, '<202309200717.53351338510@smtp-relay.mailin.fr>', 41, 11, 2, 1, '2023-09-20 12:47:30', NULL, 1),
(3, 1, '<202309200717.24084945942@smtp-relay.mailin.fr>', 41, 12, 2, 1, '2023-09-20 12:47:31', NULL, 1),
(4, 1, '<202309200717.88403534443@smtp-relay.mailin.fr>', 41, 13, 2, 1, '2023-09-20 12:47:31', NULL, 1),
(5, 2, '<202309200718.58697666087@smtp-relay.mailin.fr>', 41, 10, 2, 1, '2023-09-20 12:48:10', NULL, 1),
(6, 2, '<202309200718.31790539613@smtp-relay.mailin.fr>', 41, 11, 2, 1, '2023-09-20 12:48:11', NULL, 1),
(7, 2, '<202309200718.66005159175@smtp-relay.mailin.fr>', 41, 12, 2, 1, '2023-09-20 12:48:12', NULL, 1),
(8, 2, '<202309200718.19654475321@smtp-relay.mailin.fr>', 41, 13, 2, 1, '2023-09-20 12:48:13', NULL, 1),
(9, 3, '<202309200724.91952914511@smtp-relay.mailin.fr>', 41, 10, 2, 1, '2023-09-20 12:54:12', NULL, 1),
(10, 3, '<202309200724.28391792043@smtp-relay.mailin.fr>', 41, 11, 2, 1, '2023-09-20 12:54:13', NULL, 1),
(11, 3, '<202309200724.78720338003@smtp-relay.mailin.fr>', 41, 12, 2, 1, '2023-09-20 12:54:13', NULL, 1),
(12, 3, '<202309200724.93089017168@smtp-relay.mailin.fr>', 41, 13, 2, 1, '2023-09-20 12:54:14', NULL, 1),
(13, 4, '<202309200728.58496400507@smtp-relay.mailin.fr>', 41, 10, 2, 2, '0000-00-00 00:00:00', '2023-09-20 12:58:12', 1),
(14, 4, '<202309200728.74045481545@smtp-relay.mailin.fr>', 41, 11, 2, 2, '0000-00-00 00:00:00', '2023-09-20 12:58:13', 1),
(15, 4, '<202309200728.98158916981@smtp-relay.mailin.fr>', 41, 12, 2, 2, '0000-00-00 00:00:00', '2023-09-20 12:58:14', 1),
(16, 4, '<202309200728.67737762644@smtp-relay.mailin.fr>', 41, 13, 2, 2, '0000-00-00 00:00:00', '2023-09-20 12:58:15', 1),
(17, 4, '<202309200728.89696811675@smtp-relay.mailin.fr>', 41, 10, 2, 2, '0000-00-00 00:00:00', '2023-09-20 12:58:16', 1),
(18, 4, '<202309200728.15005319873@smtp-relay.mailin.fr>', 41, 11, 2, 2, '0000-00-00 00:00:00', '2023-09-20 12:58:17', 1),
(19, 4, '<202309200728.76990164002@smtp-relay.mailin.fr>', 41, 12, 2, 2, '0000-00-00 00:00:00', '2023-09-20 12:58:18', 1),
(20, 4, '<202309200728.13833395181@smtp-relay.mailin.fr>', 41, 13, 2, 2, '0000-00-00 00:00:00', '2023-09-20 12:58:19', 1),
(21, 4, '<202309200728.45586564725@smtp-relay.mailin.fr>', 41, 10, 2, 2, '0000-00-00 00:00:00', '2023-09-20 12:58:21', 1),
(22, 4, '<202309200728.57404882859@smtp-relay.mailin.fr>', 41, 11, 2, 2, '0000-00-00 00:00:00', '2023-09-20 12:58:22', 1),
(23, 4, '<202309200728.64245158524@smtp-relay.mailin.fr>', 41, 12, 2, 2, '0000-00-00 00:00:00', '2023-09-20 12:58:23', 1),
(24, 4, '<202309200728.49254622236@smtp-relay.mailin.fr>', 41, 13, 2, 2, '0000-00-00 00:00:00', '2023-09-20 12:58:24', 1),
(25, 4, '<202309200728.35618365320@smtp-relay.mailin.fr>', 41, 10, 2, 2, '0000-00-00 00:00:00', '2023-09-20 12:58:42', 1),
(26, 4, '<202309200728.46311805795@smtp-relay.mailin.fr>', 41, 11, 2, 2, '0000-00-00 00:00:00', '2023-09-20 12:58:43', 1),
(27, 4, '<202309200728.31820924212@smtp-relay.mailin.fr>', 41, 12, 2, 2, '0000-00-00 00:00:00', '2023-09-20 12:58:44', 1),
(28, 4, '<202309200728.99343034165@smtp-relay.mailin.fr>', 41, 13, 2, 2, '0000-00-00 00:00:00', '2023-09-20 12:58:45', 1),
(29, 5, '<202309200732.11186311008@smtp-relay.mailin.fr>', 41, 10, 2, 2, '0000-00-00 00:00:00', '2023-09-20 01:02:31', 1),
(30, 5, '<202309200732.55374179757@smtp-relay.mailin.fr>', 41, 11, 2, 2, '0000-00-00 00:00:00', '2023-09-20 01:02:32', 1),
(31, 5, '<202309200732.46415345602@smtp-relay.mailin.fr>', 41, 12, 2, 2, '0000-00-00 00:00:00', '2023-09-20 01:02:33', 1),
(32, 5, '<202309200732.54182237381@smtp-relay.mailin.fr>', 41, 13, 2, 2, '0000-00-00 00:00:00', '2023-09-20 01:02:34', 1),
(33, 5, '<202309200732.37579107362@smtp-relay.mailin.fr>', 41, 10, 2, 2, '0000-00-00 00:00:00', '2023-09-20 01:02:36', 1),
(34, 5, '<202309200732.86162042209@smtp-relay.mailin.fr>', 41, 11, 2, 2, '0000-00-00 00:00:00', '2023-09-20 01:02:37', 1),
(35, 5, '<202309200732.44705417889@smtp-relay.mailin.fr>', 41, 12, 2, 2, '0000-00-00 00:00:00', '2023-09-20 01:02:38', 1),
(36, 5, '<202309200732.54976309956@smtp-relay.mailin.fr>', 41, 13, 2, 2, '0000-00-00 00:00:00', '2023-09-20 01:02:39', 1),
(37, 21, '<202309220925.41472294666@smtp-relay.mailin.fr>', 41, 10, 2, 2, '0000-00-00 00:00:00', '2023-09-22 02:55:46', 1),
(38, 21, '<202309220925.72763087576@smtp-relay.mailin.fr>', 41, 11, 2, 2, '0000-00-00 00:00:00', '2023-09-22 02:55:47', 1),
(39, 21, '<202309220925.55461502725@smtp-relay.mailin.fr>', 41, 12, 2, 2, '0000-00-00 00:00:00', '2023-09-22 02:55:47', 1),
(40, 21, '<202309220925.22609487069@smtp-relay.mailin.fr>', 41, 13, 2, 2, '0000-00-00 00:00:00', '2023-09-22 02:55:49', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_messages`
--

CREATE TABLE `tbl_messages` (
  `id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `message` text,
  `attachment` varchar(255) DEFAULT NULL,
  `message_date` datetime NOT NULL,
  `status` enum('1','2','3') NOT NULL COMMENT '1-Active,2-Inactive,3-Deleted',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `typing_status` enum('1','0') DEFAULT '0' COMMENT '	1 = Typing , 0 = No Typing	'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_messages`
--

INSERT INTO `tbl_messages` (`id`, `receiver_id`, `sender_id`, `message`, `attachment`, `message_date`, `status`, `created_at`, `typing_status`) VALUES
(7, 35, 40, 'hello', NULL, '2023-09-18 13:44:05', '1', '2023-09-18 13:44:05', '1'),
(8, 33, 40, 'hello', NULL, '2023-09-18 13:44:17', '1', '2023-09-18 13:44:17', '0'),
(9, 33, 40, 'hello', NULL, '2023-09-18 13:44:17', '1', '2023-09-18 13:44:17', '1'),
(10, 35, 40, 'aa', NULL, '2023-09-18 13:44:22', '1', '2023-09-18 13:44:22', '1'),
(11, 35, 40, 'adfasdf', NULL, '2023-09-18 13:44:28', '1', '2023-09-18 13:44:28', '1'),
(12, 35, 40, 'adsfasdfsdfaasdfasdfsd', NULL, '2023-09-18 13:44:55', '1', '2023-09-18 13:44:55', '0'),
(13, 35, 40, 'adsfasdfsdfaasdfasdfsd', NULL, '2023-09-18 13:44:55', '1', '2023-09-18 13:44:55', '1'),
(14, 33, 40, 'hlo', NULL, '2023-09-19 12:10:32', '1', '2023-09-19 12:10:32', '1'),
(15, 35, 40, 'aaaaaaaa', NULL, '2023-09-20 10:07:41', '1', '2023-09-20 10:07:41', '1'),
(16, 34, 40, 'g', NULL, '2023-09-20 10:30:21', '1', '2023-09-20 10:30:21', '0'),
(17, 34, 40, 'g', NULL, '2023-09-20 10:30:25', '1', '2023-09-20 10:30:25', '1'),
(18, 35, 40, 'ggg', NULL, '2023-09-20 10:30:30', '1', '2023-09-20 10:30:30', '0'),
(19, 35, 40, 'ggg', NULL, '2023-09-20 10:30:35', '1', '2023-09-20 10:30:35', '0'),
(20, 35, 40, 's', NULL, '2023-09-20 10:30:40', '1', '2023-09-20 10:30:40', '1'),
(21, 33, 40, 'fff\n', NULL, '2023-09-20 11:11:16', '1', '2023-09-20 11:11:16', '1'),
(22, 33, 40, '\nf\n', NULL, '2023-09-20 11:11:19', '1', '2023-09-20 11:11:19', '1'),
(23, 33, 40, '\nf\n', NULL, '2023-09-20 11:11:21', '1', '2023-09-20 11:11:21', '1'),
(24, 33, 40, '\nf\n', NULL, '2023-09-20 11:11:21', '1', '2023-09-20 11:11:21', '1'),
(25, 33, 40, '\nf\n', NULL, '2023-09-20 11:11:22', '1', '2023-09-20 11:11:22', '0'),
(26, 33, 40, 'f\n', NULL, '2023-09-20 11:11:22', '1', '2023-09-20 11:11:22', '0'),
(27, 33, 40, 'f\n', NULL, '2023-09-20 11:11:22', '1', '2023-09-20 11:11:22', '0'),
(28, 33, 40, 'f\n', NULL, '2023-09-20 11:11:23', '3', '2023-09-20 11:11:23', '0'),
(29, 33, 40, 'f', NULL, '2023-09-20 11:11:23', '3', '2023-09-20 11:11:23', '1'),
(30, 41, 40, NULL, 'banner-01.jpg', '2023-09-20 11:14:54', '1', '2023-09-20 11:14:54', '0'),
(31, 33, 40, 'ddddddd\n', NULL, '2023-09-22 09:59:59', '1', '2023-09-22 09:59:59', '0'),
(32, 34, 40, 'H\ney Atul', NULL, '2023-10-03 18:37:27', '1', '2023-10-03 06:07:27', '0'),
(33, 33, 34, 'hi\n', NULL, '2023-10-03 18:37:33', '1', '2023-10-03 06:07:33', '0'),
(34, 40, 34, 'hi\n', NULL, '2023-10-03 18:37:50', '1', '2023-10-03 06:07:50', '0'),
(35, 34, 40, 'kaise ho Amit\n', NULL, '2023-10-03 18:37:56', '1', '2023-10-03 06:07:56', '1'),
(36, 40, 34, 'i am fine and you\n', NULL, '2023-10-03 18:38:11', '1', '2023-10-03 06:08:11', '0'),
(37, 34, 40, 'im also fine\n', NULL, '2023-10-03 18:38:16', '1', '2023-10-03 06:08:16', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_monthly_check`
--

CREATE TABLE `tbl_monthly_check` (
  `id` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL COMMENT 'tbl_lead_contact_user.id',
  `sale_date` varchar(30) NOT NULL COMMENT 'tbl_lead_contact_user.sale_date',
  `mail_status` tinyint(4) NOT NULL COMMENT '1-Sent,0-NoSent',
  `created_date` datetime DEFAULT NULL,
  `user_created_date` datetime DEFAULT NULL,
  `mod_date` datetime DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1-Active,2-InActive,3-Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_monthly_check`
--

INSERT INTO `tbl_monthly_check` (`id`, `contact_id`, `sale_date`, `mail_status`, `created_date`, `user_created_date`, `mod_date`, `status`) VALUES
(2, 26, '01-01-1970', 1, '2023-08-30 18:13:09', '2023-08-30 01:00:00', NULL, 1),
(3, 28, '01-09-2023', 1, '2023-09-01 13:21:03', '2023-09-01 01:20:51', NULL, 1),
(4, 32, '01-01-1970', 1, '2023-09-25 16:57:57', '2023-09-25 04:47:06', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notes`
--

CREATE TABLE `tbl_notes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `module_type` int(11) NOT NULL,
  `title` text NOT NULL,
  `created_date` varchar(200) NOT NULL,
  `mod_date` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1-active,2-inactive,3-deleted',
  `module_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_notes`
--

INSERT INTO `tbl_notes` (`id`, `user_id`, `module_id`, `module_type`, `title`, `created_date`, `mod_date`, `status`, `module_name`) VALUES
(1, 40, 3, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime eligendi voluptas molestiae pariatur praesentium earum repudiandae quis labore officia error nostrum assumenda a id, repellendus cupiditate magnam saepe fuga quod excepturi voluptatem dolor modi incidunt obcaecati! Impedit commodi illo', 'September 29, 2023, 1:10 PM', '', 1, 'Lead'),
(2, 40, 3, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime eligendi voluptas molestiae pariatur praesentium earum repudiandae quis labore officia error nostrum assumenda a id, repellendus cupiditate magnam saepe fuga quod excepturi voluptatem dolor modi incidunt obcaecati! Impedit commodi illo totam quidem voluptate ea unde sit aperiam harum optio magni exercitationem molestiae vel accusamus, facilis eos obcaecati omnis, cumque modi enim. Nostrum hic aut a cupiditate ipsum, minima commodi laborum natus autem accusamus eum dicta id vitae earum eos cum! Ratione, qui fugit tempora adipisci explicabo eum illo, alias laboriosam hic, cum quos quam iste libero voluptatem voluptas dolorum eius. Ipsa laborum est eum vel explicabo error omnis voluptates quis atque, recusandae cupiditate incidunt officia iusto qui repudiandae nostrum beatae veniam corrupti dolorem labore unde perspiciatis illo tenetur laboriosam. Similique accusantium numquam praesentium quam laudantium illo temporibus accusamus commodi et ad ratione explicabo debitis nemo beatae, vitae blanditiis dicta porro exercitationem facilis aliquam. Hic repudiandae, dolorem non, explicabo, saepe necessitatibus sint distinctio soluta facere aspernatur nulla cupiditate ipsam! Neque, dolorum! Excepturi, inventore numquam! At voluptas eveniet ea nihil provident, numquam placeat iure sequi! Vitae earum dolor inventore sapiente, sit, doloribus tenetur beatae quas aspernatur ex quos, ea pariatur! Eius assumenda a repellat tenetur. Nihil, soluta sunt delectus necessitatibus commodi voluptate odit, error cupiditate repellendus magni in architecto asperiores perferendis quibusdam atque at fuga quam, amet eos hic maiores nesciunt itaque. Nesciunt laboriosam explicabo fugit, alias numquam vero, minus autem inventore voluptatibus omnis consectetur provident assumenda quod fuga eius saepe et perferendis cumque reprehenderit illum impedit voluptas earum quas quam! Nisi quam quis qui. Adipisci accusamus officiis dolorem eos, commodi soluta odit dolor quos quibusdam ipsam ut. Consequuntur ducimus quas, corporis nostrum dignissimos error earum. Quibusdam architecto est sapiente voluptas laborum dolore rem tempora fugiat esse minima. Voluptas sunt, placeat sit ducimus magni dolor quod consequuntur perferendis rerum non. Voluptatum, odio tempore hic nam, dignissimos corrupti in repudiandae culpa aliquid reiciendis earum deleniti, vel nihil eaque sapiente ullam labore dolore veniam harum exercitationem temporibus et. Fugit ea id molestiae debitis excepturi necessitatibus quod, provident omnis doloribus natus tenetur eaque iure architecto non ad quam placeat earum nesciunt repudiandae, hic facilis, et aliquid! Vitae est fuga rem tempore totam autem doloribus dicta nemo omnis aliquid aut culpa eligendi error minima, voluptatum assumenda excepturi explicabo mollitia, velit tempora, unde laborum. Ratione quae a quasi delectus officiis minima repellendus perferendis est culpa distinctio, perspiciatis id. Laboriosam excepturi a expedita repellat vero temporibus veniam ut velit dolore provident. Aperiam nostrum, corrupti explicabo tenetur recusandae molestias et reiciendis quam voluptatem labore, quae facere? A consequatur nulla excepturi, tempore quaerat iure maxime iusto ratione dolore hic aliquid porro molestiae inventore quo optio reprehenderit ex nam dolores ab iste obcaecati itaque sint! Debitis similique error modi nesciunt sunt cum iste mollitia rerum odio, asperiores provident. Natus libero at ea repellat fugiat mollitia consequatur ducimus iure veritatis facere ullam cumque minima, impedit voluptatibus accusamus. Nisi, excepturi qui. Non soluta dignissimos totam tempore dolores aspernatur animi. Minus nemo eos esse veritatis sapiente. Sequi ab at quaerat officia doloribus dolores maiores? Harum quas incidunt, unde ipsum perspiciatis quo. Omnis quis maiores aperiam optio tempora possimus, eligendi at, sequi aut vel in ducimus alias cum saepe vero dicta! Vel voluptatibus, excepturi, exercitationem molestias eos pariatur a eligendi architecto suscipit quia at quos adipisci id reiciendis. Molestias, vitae rerum sed facere voluptatem distinctio qui excepturi, optio, repellendus consectetur perspiciatis? Omnis possimus ducimus dolorum dolore expedita veritatis sequi a delectus, est molestiae qui eius obcaecati hic tempore, nihil eveniet magni quam cum, quos neque consequuntur consequatur alias ab. Labore unde ullam optio consequuntur, quaerat ducimus blanditiis facilis quibusdam iusto debitis! Earum, et perspiciatis numquam architecto quis, consequatur voluptatum delectus voluptatibus quasi odio adipisci culpa quam eaque est cum placeat repellat non sint illo. Voluptatum, temporibus repudiandae enim, aliquam ut numquam laudantium eius reprehenderit tempore quidem ullam vel voluptatibus amet molestias expedita exercitationem, nobis quo. Ab corporis reprehenderit expedita tenetur, dolorem ratione aperiam quam ullam voluptatem doloremque reiciendis cumque similique vitae officiis ea iusto, nostrum explicabo. Quam amet explicabo laborum, quidem alias temporibus nobis numquam repudiandae, repellendus enim cumque. Voluptatem velit harum quibusdam maiores consectetur a doloremque! Corrupti voluptatem officia asperiores molestiae blanditiis ullam voluptates earum dolore! In est eaque deleniti praesentium, quaerat sed earum unde obcaecati laudantium commodi expedita sapiente aspernatur magni suscipit animi libero, quos voluptas soluta minus voluptatum veritatis provident. Aspernatur unde eum quam nisi possimus ut autem accusamus perferendis saepe sequi tempora illum vitae veniam obcaecati facere cumque sapiente vel quos deserunt blanditiis, voluptates recusandae eligendi! Voluptates enim accusamus dolorum! Qui ipsam enim, quisquam totam perspiciatis accusantium facilis tenetur provident cumque commodi ipsa! Ipsa rerum aperiam dolorem ab deleniti doloremque culpa quia voluptates quas neque repudiandae animi numquam magni nobis corrupti, accusantium nihil? Voluptatibus eveniet quaerat reiciendis ab dicta temporibus atque eligendi est quam modi accusantium nam ex unde labore ipsam, architecto rem mollitia? Provident dolorum aliquam, laudantium id consequuntur aliquid! Ut ipsam perferendis officia blanditiis sequi, animi fugiat doloribus nisi culpa rerum beatae aliquid nobis nulla veniam inventore explicabo, itaque nihil rem, saepe adipisci! Natus numquam explicabo animi voluptatum et assumenda unde ea eligendi laborum tempora! Sunt dignissimos deleniti dolor eaque molestias fugiat libero quidem aliquid assumenda. Quos beatae perferendis necessitatibus veniam dolorem quae, velit corrupti et magni mollitia autem impedit dolorum numquam quasi ipsam porro incidunt repellat nam eveniet pariatur, dicta adipisci aliquid nihil! Est, accusantium! Nam, reiciendis beatae magnam aspernatur earum nostrum ducimus alias ea, aperiam harum doloribus repellendus. Laborum doloremque odio dolor culpa ab aut eum ratione quos repellendus. Exercitationem cumque provident aliquid cupiditate nemo voluptatibus rerum nostrum qui expedita voluptatum dolorem assumenda, distinctio consectetur dicta voluptates! Saepe eos ea labore voluptatem optio voluptate velit nemo qui itaque sed culpa nisi, quaerat aperiam eius, quibusdam distinctio fugit. Ratione omnis eligendi eos et ipsa asperiores nemo, ad blanditiis porro molestias similique distinctio sapiente explicabo hic magnam quasi facilis neque rerum quae officiis, labore maxime cumque. Quia labore non facere, magnam, esse optio, assumenda qui expedita iusto inventore atque! Nisi.', 'September 29, 2023, 1:10 PM', '', 1, 'Lead'),
(3, 40, 1, 3, 'ss', 'September 29, 2023, 3:55 PM', '', 1, 'Booking');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_otp`
--

CREATE TABLE `tbl_otp` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'tbl_user.id',
  `user_role` int(11) NOT NULL COMMENT 'tbl_role.id',
  `user_name` varchar(255) NOT NULL,
  `otp` varchar(255) NOT NULL,
  `otp_status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-Valid,2-Invalid,3-Expired',
  `verify_otp` tinyint(4) NOT NULL DEFAULT '2' COMMENT '1-Verified,2-Not Verified\r\n\r\n',
  `otp_date_time` datetime NOT NULL,
  `otp_verify_step` tinyint(4) NOT NULL COMMENT '1-first step , 2 - 2nd step',
  `otp_type` tinyint(4) NOT NULL COMMENT '1-Email Otp,2-Mobile Otp',
  `status` tinyint(4) DEFAULT '1' COMMENT '1-Active,2-Inactive,3-Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_otp`
--

INSERT INTO `tbl_otp` (`id`, `user_id`, `user_role`, `user_name`, `otp`, `otp_status`, `verify_otp`, `otp_date_time`, `otp_verify_step`, `otp_type`, `status`) VALUES
(2, 40, 1, 'admin@gmail.com', '446730', 2, 1, '2023-09-21 06:22:18', 1, 2, 2),
(3, 40, 1, 'admin@gmail.com', '224919', 1, 2, '2023-09-22 10:20:16', 1, 1, 1),
(4, 40, 1, 'admin@gmail.com', '267343', 1, 2, '2023-09-22 10:21:10', 1, 2, 1),
(5, 40, 1, 'admin@gmail.com', '962481', 1, 2, '2023-09-22 10:23:27', 1, 1, 1),
(6, 40, 1, 'admin@gmail.com', '764906', 1, 2, '2023-09-22 10:59:53', 1, 1, 1),
(7, 40, 1, 'admin@gmail.com', '284121', 1, 1, '2023-09-22 01:48:57', 1, 2, 2),
(8, 40, 1, 'admin@gmail.com', '298217', 1, 1, '2023-09-22 01:49:53', 2, 1, 2),
(9, 40, 1, 'admin@gmail.com', '493166', 1, 1, '2023-09-25 06:25:29', 1, 1, 2),
(10, 40, 1, 'admin@gmail.com', '181709', 1, 2, '2023-09-25 06:25:51', 2, 2, 1),
(11, 40, 1, 'admin@gmail.com', '523428', 1, 1, '2023-09-25 06:26:29', 1, 2, 2),
(12, 40, 1, 'admin@gmail.com', '632061', 1, 1, '2023-09-25 06:26:41', 2, 1, 2),
(13, 40, 1, 'admin@gmail.com', '231435', 1, 1, '2023-09-26 05:50:57', 1, 1, 2),
(14, 40, 1, 'admin@gmail.com', '656251', 1, 1, '2023-09-26 05:51:08', 2, 2, 2),
(15, 40, 1, 'admin@gmail.com', '937267', 1, 1, '2023-09-27 11:07:23', 1, 1, 2),
(16, 40, 1, 'admin@gmail.com', '446372', 1, 1, '2023-09-27 11:07:46', 2, 2, 2),
(17, 40, 1, 'admin@gmail.com', '897056', 1, 1, '2023-09-27 11:09:16', 1, 1, 2),
(18, 40, 1, 'admin@gmail.com', '843262', 1, 2, '2023-09-27 11:09:27', 2, 2, 1),
(19, 40, 1, 'admin@gmail.com', '370923', 1, 1, '2023-09-27 11:11:52', 1, 1, 2),
(20, 40, 1, 'admin@gmail.com', '588400', 1, 1, '2023-09-27 11:12:01', 2, 2, 2),
(21, 40, 1, 'admin@gmail.com', '851615', 1, 1, '2023-09-28 12:25:05', 1, 1, 2),
(22, 40, 1, 'admin@gmail.com', '235256', 1, 1, '2023-09-28 12:25:23', 2, 2, 2),
(23, 40, 1, 'admin@gmail.com', '281444', 1, 1, '2023-09-29 11:56:36', 1, 1, 2),
(24, 40, 1, 'admin@gmail.com', '756470', 1, 2, '2023-09-29 12:00:23', 2, 2, 1),
(25, 40, 1, 'admin@gmail.com', '576569', 1, 1, '2023-09-29 12:07:26', 1, 1, 2),
(26, 40, 1, 'admin@gmail.com', '450041', 1, 1, '2023-09-29 12:08:05', 2, 2, 2),
(27, 40, 1, 'admin@gmail.com', '794431', 1, 1, '2023-09-29 12:11:32', 1, 1, 2),
(28, 40, 1, 'admin@gmail.com', '635510', 1, 1, '2023-09-29 12:13:04', 2, 2, 2),
(29, 40, 1, 'admin@gmail.com', '344947', 1, 1, '2023-09-29 12:16:55', 1, 1, 2),
(30, 40, 1, 'admin@gmail.com', '226363', 1, 1, '2023-09-29 12:17:11', 2, 2, 2),
(31, 40, 1, 'admin@gmail.com', '925549', 1, 1, '2023-09-29 12:24:49', 1, 1, 2),
(32, 40, 1, 'admin@gmail.com', '100090', 1, 1, '2023-09-29 12:25:11', 2, 2, 2),
(33, 40, 1, 'admin@gmail.com', '948226', 1, 1, '2023-09-29 12:26:35', 1, 1, 2),
(34, 40, 1, 'admin@gmail.com', '217741', 1, 1, '2023-09-29 12:27:30', 2, 2, 2),
(35, 40, 1, 'admin@gmail.com', '515698', 1, 1, '2023-09-29 12:30:16', 1, 1, 2),
(36, 40, 1, 'admin@gmail.com', '559817', 1, 1, '2023-09-29 12:30:34', 2, 2, 2),
(37, 40, 1, 'admin@gmail.com', '644101', 1, 1, '2023-09-29 12:33:04', 1, 1, 2),
(38, 40, 1, 'admin@gmail.com', '534785', 1, 1, '2023-09-29 12:33:13', 2, 2, 2),
(39, 40, 1, 'admin@gmail.com', '210174', 1, 1, '2023-09-29 12:35:19', 1, 1, 2),
(40, 40, 1, 'admin@gmail.com', '262785', 1, 1, '2023-09-29 12:35:31', 2, 2, 1),
(41, 40, 1, 'admin@gmail.com', '384000', 1, 1, '2023-09-29 03:22:40', 1, 2, 2),
(42, 40, 1, 'admin@gmail.com', '634342', 1, 1, '2023-09-29 03:22:56', 2, 1, 2),
(43, 40, 1, 'admin@gmail.com', '993480', 1, 2, '2023-09-29 06:56:54', 1, 1, 1),
(44, 40, 1, 'admin@gmail.com', '805862', 1, 2, '2023-09-29 06:57:36', 1, 2, 1),
(45, 40, 1, 'admin@gmail.com', '165297', 1, 1, '2023-10-03 03:10:10', 1, 1, 2),
(46, 40, 1, 'admin@gmail.com', '465347', 1, 1, '2023-10-03 03:10:26', 2, 2, 2),
(47, 40, 1, 'admin@gmail.com', '631922', 1, 1, '2023-10-03 05:58:18', 1, 1, 2),
(48, 40, 1, 'admin@gmail.com', '353709', 1, 1, '2023-10-03 05:58:37', 2, 2, 2),
(49, 40, 1, 'admin@gmail.com', '404161', 1, 1, '2023-10-03 06:01:13', 1, 1, 2),
(50, 40, 1, 'admin@gmail.com', '896889', 1, 1, '2023-10-03 06:01:36', 2, 2, 2),
(51, 40, 1, 'admin@gmail.com', '236895', 1, 1, '2023-10-03 06:05:07', 1, 1, 2),
(52, 40, 1, 'admin@gmail.com', '639581', 1, 1, '2023-10-03 06:05:21', 2, 2, 2),
(53, 40, 1, 'admin@gmail.com', '408228', 1, 1, '2023-10-03 06:09:47', 1, 1, 2),
(54, 40, 1, 'admin@gmail.com', '525261', 1, 1, '2023-10-03 06:10:16', 2, 2, 2),
(55, 40, 1, 'admin@gmail.com', '777780', 1, 1, '2023-10-03 06:12:27', 1, 1, 2),
(56, 40, 1, 'admin@gmail.com', '495047', 1, 1, '2023-10-03 06:12:41', 2, 2, 2),
(57, 40, 1, 'admin@gmail.com', '318818', 1, 1, '2023-10-03 06:27:53', 1, 1, 2),
(58, 40, 1, 'admin@gmail.com', '372464', 1, 1, '2023-10-03 06:28:33', 2, 2, 2),
(59, 40, 1, 'admin@gmail.com', '524665', 1, 1, '2023-10-03 06:30:40', 1, 1, 2),
(60, 40, 1, 'admin@gmail.com', '993085', 1, 1, '2023-10-03 06:30:54', 2, 2, 2),
(61, 34, 3, 'atul.ths', '742621', 1, 1, '2023-10-03 06:31:32', 1, 1, 2),
(62, 34, 3, 'atul.ths', '124875', 1, 1, '2023-10-03 06:31:46', 2, 2, 2),
(63, 34, 3, 'atul.ths', '320079', 1, 1, '2023-10-03 06:32:36', 1, 1, 2),
(64, 34, 3, 'atul.ths', '944605', 1, 1, '2023-10-03 06:32:48', 2, 2, 2),
(65, 40, 1, 'admin@gmail.com', '726608', 1, 1, '2023-10-03 06:34:40', 1, 1, 2),
(66, 40, 1, 'admin@gmail.com', '880888', 1, 1, '2023-10-03 06:34:58', 2, 2, 2),
(67, 40, 1, 'admin@gmail.com', '271770', 1, 1, '2023-10-03 06:36:01', 1, 1, 2),
(68, 40, 1, 'admin@gmail.com', '600157', 1, 1, '2023-10-03 06:36:16', 2, 2, 2),
(69, 34, 3, 'atul.ths', '603000', 1, 1, '2023-10-03 06:36:42', 1, 1, 2),
(70, 34, 3, 'atul.ths', '570701', 1, 1, '2023-10-03 06:36:51', 2, 2, 2),
(71, 40, 1, 'admin@gmail.com', '663212', 1, 2, '2023-10-03 06:49:56', 1, 1, 1),
(72, 40, 1, 'admin@gmail.com', '716285', 1, 2, '2023-10-03 06:54:55', 1, 1, 1),
(73, 40, 1, 'admin@gmail.com', '769012', 1, 1, '2023-10-03 06:56:07', 1, 1, 2),
(74, 40, 1, 'admin@gmail.com', '666840', 1, 1, '2023-10-03 06:56:33', 2, 2, 2),
(75, 40, 1, 'admin@gmail.com', '161478', 1, 1, '2023-10-03 06:59:15', 1, 1, 2),
(76, 40, 1, 'admin@gmail.com', '890673', 1, 2, '2023-10-03 07:03:41', 2, 2, 1),
(77, 40, 1, 'admin@gmail.com', '122545', 1, 1, '2023-10-03 07:07:14', 1, 1, 2),
(78, 40, 1, 'admin@gmail.com', '347979', 1, 2, '2023-10-03 07:07:38', 2, 2, 1),
(79, 40, 1, 'admin@gmail.com', '579673', 1, 1, '2023-10-03 07:10:04', 1, 1, 2),
(80, 40, 1, 'admin@gmail.com', '598059', 1, 2, '2023-10-03 07:10:53', 2, 2, 1),
(81, 40, 1, 'admin@gmail.com', '766521', 1, 2, '2023-10-03 07:11:32', 1, 1, 1),
(82, 40, 1, 'admin@gmail.com', '647947', 1, 1, '2023-10-03 07:11:32', 1, 1, 2),
(83, 40, 1, 'admin@gmail.com', '830525', 1, 2, '2023-10-03 07:11:50', 2, 2, 1),
(84, 40, 1, 'admin@gmail.com', '517383', 1, 1, '2023-10-03 07:12:22', 1, 1, 2),
(85, 40, 1, 'admin@gmail.com', '847357', 1, 2, '2023-10-03 07:12:33', 2, 2, 1),
(86, 40, 1, 'admin@gmail.com', '497330', 1, 2, '2023-10-03 07:13:30', 1, 1, 1),
(87, 40, 1, 'admin@gmail.com', '919515', 1, 1, '2023-10-03 07:14:42', 1, 1, 2),
(88, 40, 1, 'admin@gmail.com', '330061', 1, 1, '2023-10-03 07:15:00', 2, 2, 2),
(89, 40, 1, 'admin@gmail.com', '404319', 1, 1, '2023-10-04 10:11:51', 1, 1, 2),
(90, 40, 1, 'admin@gmail.com', '723898', 1, 1, '2023-10-04 10:12:01', 2, 2, 2),
(91, 40, 1, 'admin@gmail.com', '427970', 1, 1, '2023-10-04 10:18:19', 1, 1, 2),
(92, 40, 1, 'admin@gmail.com', '747735', 1, 1, '2023-10-04 10:19:24', 2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment_info`
--

CREATE TABLE `tbl_payment_info` (
  `id` int(11) NOT NULL,
  `card_number` varchar(25) NOT NULL,
  `expiry` varchar(10) NOT NULL,
  `cvv` varchar(10) NOT NULL,
  `created_date` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-Active,2-InActive,3-Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_permission`
--

CREATE TABLE `tbl_permission` (
  `id` int(11) NOT NULL,
  `permission_cat_id` int(11) NOT NULL COMMENT 'tbl_permission_category.id',
  `title` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `mod_date` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-Active,2-InActive,3-Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_permission`
--

INSERT INTO `tbl_permission` (`id`, `permission_cat_id`, `title`, `created_date`, `mod_date`, `status`) VALUES
(1, 1, 'Create Lead', '2023-06-14 01:50:17', '0000-00-00 00:00:00', 1),
(2, 1, 'Edit Leads', '2023-06-14 01:50:49', '0000-00-00 00:00:00', 1),
(3, 1, 'Create Leads Notes', '2023-06-14 01:51:02', '2023-06-14 01:51:22', 1),
(4, 1, 'Edit Lead Notes', '2023-06-14 01:51:48', '0000-00-00 00:00:00', 1),
(5, 2, 'Create Contacts', '2023-06-14 03:34:32', '0000-00-00 00:00:00', 1),
(6, 2, 'Edit Contacts', '2023-06-14 03:34:58', '0000-00-00 00:00:00', 1),
(7, 2, 'Create Contacts Notes', '2023-06-14 03:37:18', '0000-00-00 00:00:00', 1),
(8, 2, 'Edit Contacts Notes', '2023-06-14 03:37:27', '0000-00-00 00:00:00', 1),
(9, 1, 'Delete Leads', '2023-06-14 03:37:58', '0000-00-00 00:00:00', 1),
(10, 1, 'Delete Lead Notes ', '2023-06-14 03:38:45', '0000-00-00 00:00:00', 1),
(11, 2, 'Update Contacts', '2023-06-14 03:39:36', '0000-00-00 00:00:00', 1),
(12, 2, 'Update Contacts Notes', '2023-06-14 03:39:48', '0000-00-00 00:00:00', 1),
(13, 1, 'Update Leads', '2023-06-14 03:39:55', '0000-00-00 00:00:00', 1),
(14, 3, 'Create Booking', '2023-06-14 03:40:17', '0000-00-00 00:00:00', 1),
(15, 3, 'Delete Booking', '2023-06-14 03:40:24', '0000-00-00 00:00:00', 1),
(16, 3, 'Update Booking', '2023-06-14 03:40:32', '0000-00-00 00:00:00', 1),
(17, 3, 'Create Booking Notes', '2023-06-14 03:40:48', '0000-00-00 00:00:00', 1),
(18, 3, 'Delete Booking Notes', '2023-06-14 03:41:14', '0000-00-00 00:00:00', 1),
(19, 3, 'Update Booking Notes', '2023-06-14 03:41:45', '2023-06-14 03:41:56', 1),
(20, 4, 'Create Users', '2023-06-14 03:42:08', '0000-00-00 00:00:00', 1),
(21, 4, 'Update Users', '2023-06-14 03:42:18', '0000-00-00 00:00:00', 1),
(22, 4, 'Delete Users', '2023-06-14 03:42:24', '0000-00-00 00:00:00', 1),
(23, 5, 'Permission Category Create', '2023-06-14 03:43:15', '0000-00-00 00:00:00', 1),
(24, 5, 'Permission Category Update', '2023-06-14 03:43:25', '0000-00-00 00:00:00', 1),
(25, 5, 'Permission Category Delete', '2023-06-14 03:43:33', '0000-00-00 00:00:00', 1),
(26, 5, 'Permission Module Create', '2023-06-14 03:44:06', '0000-00-00 00:00:00', 1),
(27, 5, 'Permission Module Update', '2023-06-14 03:44:13', '0000-00-00 00:00:00', 1),
(28, 5, 'Permission Module Delete', '2023-06-14 03:44:19', '0000-00-00 00:00:00', 1),
(29, 5, 'Role Create', '2023-06-14 03:44:41', '2023-06-14 03:44:56', 1),
(30, 5, 'Role Update', '2023-06-14 03:45:05', '0000-00-00 00:00:00', 1),
(31, 5, 'Role Delete', '2023-06-14 03:45:12', '0000-00-00 00:00:00', 1),
(32, 5, 'Manage Permission Role Listing', '2023-06-14 03:45:32', '0000-00-00 00:00:00', 1),
(33, 5, 'Manage System Log', '2023-06-14 03:46:41', '0000-00-00 00:00:00', 1),
(34, 6, 'Remote Status Create', '2023-06-14 03:48:14', '0000-00-00 00:00:00', 1),
(35, 6, 'Remote Status Update', '2023-06-14 03:48:23', '0000-00-00 00:00:00', 1),
(36, 6, 'Remote Status Delete', '2023-06-14 03:48:32', '0000-00-00 00:00:00', 1),
(37, 6, 'Work Status Create', '2023-06-14 03:48:42', '0000-00-00 00:00:00', 1),
(38, 6, 'Work Status Update', '2023-06-14 03:48:51', '0000-00-00 00:00:00', 1),
(39, 6, 'Work Status Delete', '2023-06-14 03:49:00', '0000-00-00 00:00:00', 1),
(40, 6, 'Sale Status Create', '2023-06-14 03:49:15', '0000-00-00 00:00:00', 1),
(41, 6, 'Sale Status Update', '2023-06-14 03:49:26', '0000-00-00 00:00:00', 1),
(42, 6, 'Sale Status Delete', '2023-06-14 03:49:41', '0000-00-00 00:00:00', 1),
(43, 1, 'dsfgsd', '2023-06-14 03:52:43', '0000-00-00 00:00:00', 3),
(44, 2, 'tryujtryhjety', '2023-06-14 03:53:21', '0000-00-00 00:00:00', 3),
(45, 3, 'sdfgsd', '2023-06-14 03:53:53', '0000-00-00 00:00:00', 3),
(46, 1, 'Lead View', '2023-06-14 06:33:25', '0000-00-00 00:00:00', 1),
(47, 1, 'Lead Notes View', '2023-06-14 06:33:46', '0000-00-00 00:00:00', 1),
(48, 4, 'View Users', '2023-06-15 10:48:05', '0000-00-00 00:00:00', 1),
(49, 2, 'View Contacts', '2023-06-15 10:50:19', '0000-00-00 00:00:00', 1),
(50, 2, 'View Contact Notes', '2023-06-15 10:50:32', '0000-00-00 00:00:00', 1),
(51, 3, 'View Booking', '2023-06-15 10:50:58', '0000-00-00 00:00:00', 1),
(52, 3, 'View Booking Notes', '2023-06-15 10:51:08', '0000-00-00 00:00:00', 1),
(53, 12, 'Create Invoice', '2023-07-21 10:42:33', '0000-00-00 00:00:00', 1),
(54, 12, 'View Invoice', '2023-07-21 10:42:42', '0000-00-00 00:00:00', 1),
(55, 1, 'aaaa', '2023-08-25 12:52:01', '2023-08-25 12:52:07', 3),
(56, 1, 'asdfasdf', '2023-08-25 12:59:47', '0000-00-00 00:00:00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_permission_category`
--

CREATE TABLE `tbl_permission_category` (
  `id` int(11) NOT NULL,
  `title` varchar(55) NOT NULL,
  `created_date` datetime NOT NULL,
  `mod_date` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-Active,2-InActive,3-Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_permission_category`
--

INSERT INTO `tbl_permission_category` (`id`, `title`, `created_date`, `mod_date`, `status`) VALUES
(1, 'Leads Permission', '2023-06-14 01:02:56', '0000-00-00 00:00:00', 1),
(2, 'Contacts', '2023-06-14 01:03:20', '0000-00-00 00:00:00', 1),
(3, 'Booking', '2023-06-14 01:03:24', '0000-00-00 00:00:00', 1),
(4, 'Users', '2023-06-14 01:03:41', '0000-00-00 00:00:00', 1),
(5, 'Security Control', '2023-06-14 01:04:06', '0000-00-00 00:00:00', 1),
(6, 'Modules and Fields', '2023-06-14 01:49:23', '0000-00-00 00:00:00', 1),
(12, 'Invoice', '2023-07-21 10:42:22', '0000-00-00 00:00:00', 1),
(13, 'asdfasddf', '2023-08-25 12:50:02', '0000-00-00 00:00:00', 3),
(14, 'asdf', '2023-08-25 12:50:27', '0000-00-00 00:00:00', 3),
(15, 'ddddddddddd', '2023-08-25 12:50:37', '0000-00-00 00:00:00', 3),
(16, 'asdfasdfasdfasdf', '2023-08-25 12:51:09', '0000-00-00 00:00:00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_permission_role`
--

CREATE TABLE `tbl_permission_role` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL COMMENT 'tbl_role.id',
  `permission_id` int(11) NOT NULL COMMENT 'tbl_permission.id',
  `created_date` datetime NOT NULL,
  `mod_date` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-Active,2-InActive,3-Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_permission_role`
--

INSERT INTO `tbl_permission_role` (`id`, `role_id`, `permission_id`, `created_date`, `mod_date`, `status`) VALUES
(1, 3, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(2, 3, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(3, 3, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(4, 3, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(5, 3, 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(6, 3, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(7, 3, 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(8, 3, 46, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(9, 3, 47, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(10, 3, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(11, 3, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(12, 3, 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(13, 3, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(14, 3, 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(15, 3, 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(16, 3, 49, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(17, 3, 50, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(18, 3, 14, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(19, 3, 15, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(20, 3, 16, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(21, 3, 17, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(22, 3, 18, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(23, 3, 19, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(24, 3, 51, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(25, 3, 52, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(26, 3, 20, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(27, 3, 21, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(28, 3, 22, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(29, 3, 48, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(30, 3, 23, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(31, 3, 24, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(32, 3, 25, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(33, 3, 26, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(34, 3, 27, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(35, 3, 28, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(36, 3, 29, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(37, 3, 30, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(38, 3, 31, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(39, 3, 32, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(40, 3, 33, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(41, 3, 34, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(42, 3, 35, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(43, 3, 36, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(44, 3, 37, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(45, 3, 38, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(46, 3, 39, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(47, 3, 40, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(48, 3, 41, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(49, 3, 42, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(50, 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(51, 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(52, 2, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(53, 2, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(54, 2, 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(55, 2, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(56, 2, 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(57, 2, 46, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(58, 2, 47, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(59, 2, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(60, 2, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(61, 2, 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(62, 2, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(63, 2, 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(64, 2, 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(65, 2, 49, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(66, 2, 50, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(67, 2, 14, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(68, 2, 15, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(69, 2, 16, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(70, 2, 17, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(71, 2, 18, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(72, 2, 19, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(73, 2, 51, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(74, 2, 52, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(75, 2, 20, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(76, 2, 21, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(77, 2, 22, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(78, 2, 48, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(79, 2, 23, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(80, 2, 24, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(81, 2, 25, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(82, 2, 26, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(83, 2, 27, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(84, 2, 28, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(85, 2, 29, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(86, 2, 30, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(87, 2, 31, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(88, 2, 32, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(89, 2, 33, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(90, 2, 34, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(91, 2, 35, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(92, 2, 36, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(93, 2, 37, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(94, 2, 38, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(95, 2, 39, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(96, 2, 40, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(97, 2, 41, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(98, 2, 42, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(99, 4, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(100, 4, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(101, 4, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(102, 4, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(103, 4, 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(104, 4, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(105, 4, 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(106, 4, 46, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(107, 4, 47, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(108, 4, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(109, 4, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(110, 4, 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(111, 4, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(112, 4, 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(113, 4, 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(114, 4, 49, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(115, 4, 50, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(116, 4, 14, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(117, 4, 15, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(118, 4, 16, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(119, 4, 17, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(120, 4, 18, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(121, 4, 19, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(122, 4, 51, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(123, 4, 52, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(124, 4, 20, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(125, 4, 21, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(126, 4, 22, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(127, 4, 48, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(128, 4, 23, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(129, 4, 24, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(130, 4, 25, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(131, 4, 26, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(132, 4, 27, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(133, 4, 28, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(134, 4, 29, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(135, 4, 30, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(136, 4, 31, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(137, 4, 32, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(138, 4, 33, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(139, 4, 34, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(140, 4, 35, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(141, 4, 36, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(142, 4, 37, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(143, 4, 38, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(144, 4, 39, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(145, 4, 40, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(146, 4, 41, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2),
(147, 4, 42, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_plan`
--

CREATE TABLE `tbl_plan` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `days` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `mod_date` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-Active,2-Inactive,3-Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_plan`
--

INSERT INTO `tbl_plan` (`id`, `title`, `days`, `created_date`, `mod_date`, `status`) VALUES
(4, 'Monthly Plan', 30, '2023-09-01 12:38:17', '2023-09-01 12:38:43', 1),
(5, '3 Month Plan', 90, '2023-09-01 12:38:23', '2023-09-01 12:39:03', 1),
(6, '6 Month Plan', 180, '2023-09-01 12:39:43', '0000-00-00 00:00:00', 1),
(7, 'Year Plan', 365, '2023-09-01 12:39:59', '2023-09-01 12:45:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_remote`
--

CREATE TABLE `tbl_remote` (
  `id` int(11) NOT NULL,
  `title` varchar(80) NOT NULL,
  `created_date` datetime NOT NULL,
  `mod_date` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-Active,2-InActive,3-Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_remote`
--

INSERT INTO `tbl_remote` (`id`, `title`, `created_date`, `mod_date`, `status`) VALUES
(1, 'Done', '2023-08-23 04:57:50', '0000-00-00 00:00:00', 3),
(38, 'e', '2023-09-01 11:54:31', '0000-00-00 00:00:00', 1),
(39, 'asdf', '2023-09-01 12:19:10', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id` int(11) NOT NULL,
  `title` varchar(80) NOT NULL,
  `created_date` datetime NOT NULL,
  `mod_date` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-Active,2-InActive,3-deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`id`, `title`, `created_date`, `mod_date`, `status`) VALUES
(1, 'Super Admin', '2023-06-15 13:23:06', '2023-06-15 13:23:06', 1),
(2, 'Sales', '2023-06-15 04:57:21', '0000-00-00 00:00:00', 1),
(3, 'Tech', '2023-06-15 05:49:21', '0000-00-00 00:00:00', 1),
(4, 'Manager', '2023-06-15 05:49:26', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sale_status`
--

CREATE TABLE `tbl_sale_status` (
  `id` int(11) NOT NULL,
  `title` varchar(80) NOT NULL,
  `created_date` datetime NOT NULL,
  `mod_date` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-Active,2-InActive,3-Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sale_status`
--

INSERT INTO `tbl_sale_status` (`id`, `title`, `created_date`, `mod_date`, `status`) VALUES
(1, 'Done', '2023-08-23 05:02:15', '0000-00-00 00:00:00', 2),
(2, 'Pending', '2023-08-23 05:02:21', '0000-00-00 00:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_template`
--

CREATE TABLE `tbl_template` (
  `template_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `module_name` tinyint(4) NOT NULL COMMENT '1-salesleadmodule,2-salescallbackmodule,3-salesnewleadmodule',
  `template_name` varchar(255) NOT NULL,
  `template_subject` varchar(255) NOT NULL,
  `template_code` longtext NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-Active,2-Inactive,3-Deleted',
  `created_at` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaction`
--

CREATE TABLE `tbl_transaction` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL COMMENT 'tbl_user.id',
  `payment_id` int(11) NOT NULL COMMENT 'tbl_payment_info.id',
  `billing_id` int(11) NOT NULL COMMENT 'tbl_billing.id',
  `transaction_id` int(11) NOT NULL COMMENT 'transaction id authrizenet',
  `invoice_id` int(11) NOT NULL COMMENT 'tbl_invoice.id',
  `invoice_number` varchar(20) NOT NULL COMMENT 'tbl_invoice.invoice_number',
  `created_date` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-Active,2-InActive,3-Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL COMMENT 'tbl_role.id',
  `name` varchar(100) NOT NULL,
  `email` varchar(225) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(55) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_date` datetime NOT NULL,
  `mod_date` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1-Active,2-InActive,3-Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `role_id`, `name`, `email`, `mobile`, `username`, `password`, `image`, `created_date`, `mod_date`, `status`) VALUES
(33, 2, 'Ankit', 'ankit.cotginanalytics@gmail.com', NULL, 'ankit.ths', '7a93c72bd34581071685fa715a9841b5', NULL, '2023-08-23 04:09:56', '0000-00-00 00:00:00', 1),
(34, 3, 'Atul', 'atul.cotginanalytics@gmail.com', NULL, 'atul.ths', '9763d3de0df49d64fcba1835d7457ce1', NULL, '2023-09-01 01:30:51', '0000-00-00 00:00:00', 1),
(35, 4, 'Fazlu', 'fazlu.cotginanalytics@gmail.com', NULL, 'fazlu.ths', '1a3a62f51f6a48c696831b76c8facaf6', NULL, '2023-08-23 04:10:43', '0000-00-00 00:00:00', 1),
(40, 1, 'Admin', 'cotginanalytics@gmail.com', '7699000006', 'admin@gmail.com', 'e6e061838856bf47e1de730719fb2609', NULL, '2023-08-23 04:10:43', '2023-10-03 07:15:47', 1),
(41, 2, 'Satendra', 'satendra@gmail.com', NULL, 'satendra.ths', 'fc3b0feeedb51e167180f759ab1fc2e7', NULL, '2023-09-18 03:43:41', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_auth`
--

CREATE TABLE `tbl_user_auth` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'tbl_user.id',
  `ip_address` varchar(100) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `cookie_expire_status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-Active,2-Deleted,3-logout',
  `cookies_expire_time` datetime DEFAULT NULL,
  `expiry_days` int(11) NOT NULL DEFAULT '30' COMMENT 'user expiry days\r\n',
  `created_date` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-Active,2-Inactive,3-Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_auth`
--

INSERT INTO `tbl_user_auth` (`id`, `user_id`, `ip_address`, `user_agent`, `location`, `cookie_expire_status`, `cookies_expire_time`, `expiry_days`, `created_date`, `status`) VALUES
(1, 40, '122.161.43.43', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'New Delhi', 3, '2023-10-04 10:19:34', 30, '2023-10-03 15:11:05', 1),
(2, 40, '122.161.43.43', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'New Delhi', 3, '2023-10-04 10:19:34', 30, '2023-10-03 18:00:48', 1),
(3, 40, '122.161.43.43', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'New Delhi', 3, '2023-10-04 10:19:34', 30, '2023-10-03 18:05:33', 1),
(4, 40, '122.161.43.43', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'New Delhi', 3, '2023-10-04 10:19:34', 30, '2023-10-03 18:10:29', 1),
(5, 40, '122.161.43.43', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/117.0', 'New Delhi', 3, '2023-10-04 10:19:34', 30, '2023-10-03 18:12:53', 1),
(6, 40, '122.179.196.122', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'Delhi', 3, '2023-10-04 10:19:34', 30, '2023-10-03 18:29:45', 1),
(7, 40, '122.179.196.122', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'Delhi', 3, '2023-10-04 10:19:34', 30, '2023-10-03 18:31:05', 1),
(8, 34, '122.179.196.122', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'Delhi', 3, '2023-10-03 18:36:57', 30, '2023-10-03 18:32:00', 1),
(9, 34, '122.179.196.122', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'Delhi', 3, '2023-10-03 18:36:57', 30, '2023-10-03 18:32:58', 1),
(10, 40, '122.179.196.122', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'Delhi', 3, '2023-10-04 10:19:34', 30, '2023-10-03 18:35:13', 1),
(11, 40, '122.179.196.122', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'Delhi', 3, '2023-10-04 10:19:34', 30, '2023-10-03 18:36:28', 1),
(12, 34, '122.161.43.43', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/117.0', 'New Delhi', 1, NULL, 30, '2023-10-03 18:36:57', 1),
(13, 40, '122.161.43.43', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'New Delhi', 3, '2023-10-04 10:19:34', 30, '2023-10-03 18:57:38', 1),
(14, 40, '122.179.196.122', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'Delhi', 3, '2023-10-04 10:19:34', 30, '2023-10-03 19:15:12', 1),
(15, 40, '122.179.196.122', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'Delhi', 3, '2023-10-04 10:19:34', 30, '2023-10-04 10:12:15', 1),
(16, 40, '122.179.196.122', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'Delhi', 1, NULL, 30, '2023-10-04 10:19:34', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_login_activity`
--

CREATE TABLE `tbl_user_login_activity` (
  `id` int(11) NOT NULL,
  `user_auth_id` int(11) NOT NULL COMMENT 'tbl_user_auth.id',
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `device_name` varchar(150) DEFAULT NULL,
  `os_name` varchar(150) DEFAULT NULL,
  `browser` varchar(150) DEFAULT NULL,
  `hostname` varchar(150) DEFAULT NULL,
  `city` varchar(150) DEFAULT NULL,
  `region` varchar(150) DEFAULT NULL,
  `country` varchar(150) DEFAULT NULL,
  `loc` varchar(150) DEFAULT NULL,
  `org` varchar(150) DEFAULT NULL,
  `postal` varchar(150) DEFAULT NULL,
  `timezone` varchar(150) DEFAULT NULL,
  `login_status` tinyint(4) NOT NULL COMMENT '1-First time login,2-Already Login,3-Logout',
  `login_date` datetime NOT NULL,
  `logout_date` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-Active,2-InActive,3-Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_login_activity`
--

INSERT INTO `tbl_user_login_activity` (`id`, `user_auth_id`, `ip_address`, `user_agent`, `device_name`, `os_name`, `browser`, `hostname`, `city`, `region`, `country`, `loc`, `org`, `postal`, `timezone`, `login_status`, `login_date`, `logout_date`, `status`) VALUES
(1, 1, '122.161.43.43', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'Computer', 'Windows 10', 'Chrome', 'abts-north-dynamic-043.43.161.122.airtelbroadband.in', 'New Delhi', 'Delhi', 'IN', '28.6358,77.2245', 'AS24560 Bharti Airtel Ltd., Telemedia Services', '110001', 'Asia/Kolkata', 1, '2023-10-03 15:11:05', '0000-00-00 00:00:00', 1),
(2, 1, '122.161.43.43', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'Computer', 'Windows 10', 'Chrome', 'abts-north-dynamic-043.43.161.122.airtelbroadband.in', 'New Delhi', 'Delhi', 'IN', '28.6358,77.2245', 'AS24560 Bharti Airtel Ltd., Telemedia Services', '110001', 'Asia/Kolkata', 3, '2023-10-03 15:11:05', '2023-10-03 15:11:20', 1),
(3, 1, '122.161.43.43', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'Computer', 'Windows 10', 'Chrome', 'abts-north-dynamic-043.43.161.122.airtelbroadband.in', 'New Delhi', 'Delhi', 'IN', '28.6358,77.2245', 'AS24560 Bharti Airtel Ltd., Telemedia Services', '110001', 'Asia/Kolkata', 2, '2023-10-03 15:11:05', '2023-10-03 15:11:25', 1),
(4, 1, '122.161.43.43', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'Computer', 'Windows 10', 'Chrome', 'abts-north-dynamic-043.43.161.122.airtelbroadband.in', 'New Delhi', 'Delhi', 'IN', '28.6358,77.2245', 'AS24560 Bharti Airtel Ltd., Telemedia Services', '110001', 'Asia/Kolkata', 3, '2023-10-03 15:36:34', '2023-10-03 15:36:34', 1),
(5, 1, '122.161.43.43', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'Computer', 'Windows 10', 'Chrome', 'abts-north-dynamic-043.43.161.122.airtelbroadband.in', 'New Delhi', 'Delhi', 'IN', '28.6358,77.2245', 'AS24560 Bharti Airtel Ltd., Telemedia Services', '110001', 'Asia/Kolkata', 2, '2023-10-03 15:36:38', '2023-10-03 15:36:38', 1),
(6, 1, '122.161.43.43', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'Computer', 'Windows 10', 'Chrome', 'abts-north-dynamic-043.43.161.122.airtelbroadband.in', 'New Delhi', 'Delhi', 'IN', '28.6358,77.2245', 'AS24560 Bharti Airtel Ltd., Telemedia Services', '110001', 'Asia/Kolkata', 3, '2023-10-03 15:44:58', '2023-10-03 15:44:58', 1),
(7, 1, '122.161.43.43', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'Computer', 'Windows 10', 'Chrome', 'abts-north-dynamic-043.43.161.122.airtelbroadband.in', 'New Delhi', 'Delhi', 'IN', '28.6358,77.2245', 'AS24560 Bharti Airtel Ltd., Telemedia Services', '110001', 'Asia/Kolkata', 2, '2023-10-03 15:45:02', '2023-10-03 15:45:02', 1),
(8, 1, '122.161.43.43', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'Computer', 'Windows 10', 'Chrome', 'abts-north-dynamic-043.43.161.122.airtelbroadband.in', 'New Delhi', 'Delhi', 'IN', '28.6358,77.2245', 'AS24560 Bharti Airtel Ltd., Telemedia Services', '110001', 'Asia/Kolkata', 3, '2023-10-03 17:31:32', '2023-10-03 17:31:32', 1),
(9, 1, '122.161.43.43', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'Computer', 'Windows 10', 'Chrome', 'abts-north-dynamic-043.43.161.122.airtelbroadband.in', 'New Delhi', 'Delhi', 'IN', '28.6358,77.2245', 'AS24560 Bharti Airtel Ltd., Telemedia Services', '110001', 'Asia/Kolkata', 2, '2023-10-03 17:35:06', '2023-10-03 17:35:06', 1),
(10, 1, '122.161.43.43', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'Computer', 'Windows 10', 'Chrome', 'abts-north-dynamic-043.43.161.122.airtelbroadband.in', 'New Delhi', 'Delhi', 'IN', '28.6358,77.2245', 'AS24560 Bharti Airtel Ltd., Telemedia Services', '110001', 'Asia/Kolkata', 3, '2023-10-03 17:35:07', '2023-10-03 17:35:07', 1),
(11, 1, '122.161.43.43', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'Computer', 'Windows 10', 'Chrome', 'abts-north-dynamic-043.43.161.122.airtelbroadband.in', 'New Delhi', 'Delhi', 'IN', '28.6358,77.2245', 'AS24560 Bharti Airtel Ltd., Telemedia Services', '110001', 'Asia/Kolkata', 2, '2023-10-03 17:35:29', '2023-10-03 17:35:29', 1),
(12, 1, '122.161.43.43', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'Computer', 'Windows 10', 'Chrome', 'abts-north-dynamic-043.43.161.122.airtelbroadband.in', 'New Delhi', 'Delhi', 'IN', '28.6358,77.2245', 'AS24560 Bharti Airtel Ltd., Telemedia Services', '110001', 'Asia/Kolkata', 3, '2023-10-03 17:43:38', '2023-10-03 17:43:38', 1),
(13, 1, '122.161.43.43', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'Computer', 'Windows 10', 'Chrome', 'abts-north-dynamic-043.43.161.122.airtelbroadband.in', 'New Delhi', 'Delhi', 'IN', '28.6358,77.2245', 'AS24560 Bharti Airtel Ltd., Telemedia Services', '110001', 'Asia/Kolkata', 2, '2023-10-03 17:44:42', '2023-10-03 17:44:42', 1),
(14, 1, '122.161.43.43', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'Computer', 'Windows 10', 'Chrome', 'abts-north-dynamic-043.43.161.122.airtelbroadband.in', 'New Delhi', 'Delhi', 'IN', '28.6358,77.2245', 'AS24560 Bharti Airtel Ltd., Telemedia Services', '110001', 'Asia/Kolkata', 3, '2023-10-03 17:47:57', '2023-10-03 17:47:57', 1),
(15, 1, '122.161.43.43', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'Computer', 'Windows 10', 'Chrome', 'abts-north-dynamic-043.43.161.122.airtelbroadband.in', 'New Delhi', 'Delhi', 'IN', '28.6358,77.2245', 'AS24560 Bharti Airtel Ltd., Telemedia Services', '110001', 'Asia/Kolkata', 2, '2023-10-03 17:48:24', '2023-10-03 17:48:24', 1),
(16, 1, '122.161.43.43', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'Computer', 'Windows 10', 'Chrome', 'abts-north-dynamic-043.43.161.122.airtelbroadband.in', 'New Delhi', 'Delhi', 'IN', '28.6358,77.2245', 'AS24560 Bharti Airtel Ltd., Telemedia Services', '110001', 'Asia/Kolkata', 3, '2023-10-03 17:48:26', '2023-10-03 17:48:26', 1),
(17, 1, '122.161.43.43', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'Computer', 'Windows 10', 'Chrome', 'abts-north-dynamic-043.43.161.122.airtelbroadband.in', 'New Delhi', 'Delhi', 'IN', '28.6358,77.2245', 'AS24560 Bharti Airtel Ltd., Telemedia Services', '110001', 'Asia/Kolkata', 2, '2023-10-03 17:52:21', '2023-10-03 17:52:21', 1),
(18, 1, '122.161.43.43', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'Computer', 'Windows 10', 'Chrome', 'abts-north-dynamic-043.43.161.122.airtelbroadband.in', 'New Delhi', 'Delhi', 'IN', '28.6358,77.2245', 'AS24560 Bharti Airtel Ltd., Telemedia Services', '110001', 'Asia/Kolkata', 3, '2023-10-03 17:52:29', '2023-10-03 17:52:29', 1),
(19, 1, '122.161.43.43', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'Computer', 'Windows 10', 'Chrome', 'abts-north-dynamic-043.43.161.122.airtelbroadband.in', 'New Delhi', 'Delhi', 'IN', '28.6358,77.2245', 'AS24560 Bharti Airtel Ltd., Telemedia Services', '110001', 'Asia/Kolkata', 2, '2023-10-03 17:52:39', '2023-10-03 17:52:39', 1),
(20, 1, '122.161.43.43', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'Computer', 'Windows 10', 'Chrome', 'abts-north-dynamic-043.43.161.122.airtelbroadband.in', 'New Delhi', 'Delhi', 'IN', '28.6358,77.2245', 'AS24560 Bharti Airtel Ltd., Telemedia Services', '110001', 'Asia/Kolkata', 3, '2023-10-03 17:52:58', '2023-10-03 17:52:58', 1),
(21, 1, '122.161.43.43', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'Computer', 'Windows 10', 'Chrome', 'abts-north-dynamic-043.43.161.122.airtelbroadband.in', 'New Delhi', 'Delhi', 'IN', '28.6358,77.2245', 'AS24560 Bharti Airtel Ltd., Telemedia Services', '110001', 'Asia/Kolkata', 2, '2023-10-03 17:53:02', '2023-10-03 17:53:02', 1),
(22, 1, '122.161.43.43', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'Computer', 'Windows 10', 'Chrome', 'abts-north-dynamic-043.43.161.122.airtelbroadband.in', 'New Delhi', 'Delhi', 'IN', '28.6358,77.2245', 'AS24560 Bharti Airtel Ltd., Telemedia Services', '110001', 'Asia/Kolkata', 3, '2023-10-03 17:53:04', '2023-10-03 17:53:04', 1),
(23, 1, '122.161.43.43', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'Computer', 'Windows 10', 'Chrome', 'abts-north-dynamic-043.43.161.122.airtelbroadband.in', 'New Delhi', 'Delhi', 'IN', '28.6358,77.2245', 'AS24560 Bharti Airtel Ltd., Telemedia Services', '110001', 'Asia/Kolkata', 2, '2023-10-03 17:53:46', '2023-10-03 17:53:46', 1),
(24, 1, '122.161.43.43', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'Computer', 'Windows 10', 'Chrome', 'abts-north-dynamic-043.43.161.122.airtelbroadband.in', 'New Delhi', 'Delhi', 'IN', '28.6358,77.2245', 'AS24560 Bharti Airtel Ltd., Telemedia Services', '110001', 'Asia/Kolkata', 3, '2023-10-03 17:53:47', '2023-10-03 17:53:47', 1),
(25, 1, '122.161.43.43', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'Computer', 'Windows 10', 'Chrome', 'abts-north-dynamic-043.43.161.122.airtelbroadband.in', 'New Delhi', 'Delhi', 'IN', '28.6358,77.2245', 'AS24560 Bharti Airtel Ltd., Telemedia Services', '110001', 'Asia/Kolkata', 2, '2023-10-03 17:54:09', '2023-10-03 17:54:09', 1),
(26, 2, '122.161.43.43', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'Computer', 'Windows 10', 'Chrome', 'abts-north-dynamic-043.43.161.122.airtelbroadband.in', 'New Delhi', 'Delhi', 'IN', '28.6358,77.2245', 'AS24560 Bharti Airtel Ltd., Telemedia Services', '110001', 'Asia/Kolkata', 1, '2023-10-03 18:00:48', '0000-00-00 00:00:00', 1),
(27, 3, '122.161.43.43', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'Computer', 'Windows 10', 'Chrome', 'abts-north-dynamic-043.43.161.122.airtelbroadband.in', 'New Delhi', 'Delhi', 'IN', '28.6358,77.2245', 'AS24560 Bharti Airtel Ltd., Telemedia Services', '110001', 'Asia/Kolkata', 1, '2023-10-03 18:05:33', '0000-00-00 00:00:00', 1),
(28, 4, '122.161.43.43', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'Computer', 'Windows 10', 'Chrome', 'abts-north-dynamic-043.43.161.122.airtelbroadband.in', 'New Delhi', 'Delhi', 'IN', '28.6358,77.2245', 'AS24560 Bharti Airtel Ltd., Telemedia Services', '110001', 'Asia/Kolkata', 1, '2023-10-03 18:10:29', '0000-00-00 00:00:00', 1),
(29, 5, '122.161.43.43', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/117.0', 'Computer', 'Windows 10', 'Firefox', 'abts-north-dynamic-043.43.161.122.airtelbroadband.in', 'New Delhi', 'Delhi', 'IN', '28.6358,77.2245', 'AS24560 Bharti Airtel Ltd., Telemedia Services', '110001', 'Asia/Kolkata', 1, '2023-10-03 18:12:53', '0000-00-00 00:00:00', 1),
(30, 6, '122.179.196.122', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'Computer', 'Windows 10', 'Chrome', NULL, 'Delhi', 'Delhi', 'IN', '28.6519,77.2315', 'AS24560 Bharti Airtel Ltd., Telemedia Services', '110001', 'Asia/Kolkata', 1, '2023-10-03 18:29:45', '0000-00-00 00:00:00', 1),
(31, 7, '122.179.196.122', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'Computer', 'Windows 10', 'Chrome', NULL, 'Delhi', 'Delhi', 'IN', '28.6519,77.2315', 'AS24560 Bharti Airtel Ltd., Telemedia Services', '110001', 'Asia/Kolkata', 1, '2023-10-03 18:31:05', '0000-00-00 00:00:00', 1),
(32, 8, '122.179.196.122', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'Computer', 'Windows 10', 'Chrome', NULL, 'Delhi', 'Delhi', 'IN', '28.6519,77.2315', 'AS24560 Bharti Airtel Ltd., Telemedia Services', '110001', 'Asia/Kolkata', 1, '2023-10-03 18:32:00', '0000-00-00 00:00:00', 1),
(33, 9, '122.179.196.122', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'Computer', 'Windows 10', 'Chrome', NULL, 'Delhi', 'Delhi', 'IN', '28.6519,77.2315', 'AS24560 Bharti Airtel Ltd., Telemedia Services', '110001', 'Asia/Kolkata', 1, '2023-10-03 18:32:58', '0000-00-00 00:00:00', 1),
(34, 9, '122.179.196.122', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'Computer', 'Windows 10', 'Chrome', NULL, 'Delhi', 'Delhi', 'IN', '28.6519,77.2315', 'AS24560 Bharti Airtel Ltd., Telemedia Services', '110001', 'Asia/Kolkata', 3, '2023-10-03 18:33:17', '2023-10-03 18:33:17', 1),
(35, 9, '122.179.196.122', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'Computer', 'Windows 10', 'Chrome', NULL, 'Delhi', 'Delhi', 'IN', '28.6519,77.2315', 'AS24560 Bharti Airtel Ltd., Telemedia Services', '110001', 'Asia/Kolkata', 2, '2023-10-03 18:34:11', '2023-10-03 18:34:11', 1),
(36, 10, '122.179.196.122', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'Computer', 'Windows 10', 'Chrome', NULL, 'Delhi', 'Delhi', 'IN', '28.6519,77.2315', 'AS24560 Bharti Airtel Ltd., Telemedia Services', '110001', 'Asia/Kolkata', 1, '2023-10-03 18:35:13', '0000-00-00 00:00:00', 1),
(37, 11, '122.179.196.122', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'Computer', 'Windows 10', 'Chrome', NULL, 'Delhi', 'Delhi', 'IN', '28.6519,77.2315', 'AS24560 Bharti Airtel Ltd., Telemedia Services', '110001', 'Asia/Kolkata', 1, '2023-10-03 18:36:28', '0000-00-00 00:00:00', 1),
(38, 12, '122.161.43.43', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/117.0', 'Computer', 'Windows 10', 'Firefox', 'abts-north-dynamic-043.43.161.122.airtelbroadband.in', 'New Delhi', 'Delhi', 'IN', '28.6358,77.2245', 'AS24560 Bharti Airtel Ltd., Telemedia Services', '110001', 'Asia/Kolkata', 1, '2023-10-03 18:36:57', '0000-00-00 00:00:00', 1),
(39, 13, '122.161.43.43', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'Computer', 'Windows 10', 'Chrome', 'abts-north-dynamic-043.43.161.122.airtelbroadband.in', 'New Delhi', 'Delhi', 'IN', '28.6358,77.2245', 'AS24560 Bharti Airtel Ltd., Telemedia Services', '110001', 'Asia/Kolkata', 1, '2023-10-03 18:57:38', '0000-00-00 00:00:00', 1),
(40, 14, '122.179.196.122', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'Computer', 'Windows 10', 'Chrome', NULL, 'Delhi', 'Delhi', 'IN', '28.6519,77.2315', 'AS24560 Bharti Airtel Ltd., Telemedia Services', '110001', 'Asia/Kolkata', 1, '2023-10-03 19:15:12', '0000-00-00 00:00:00', 1),
(41, 15, '122.179.196.122', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'Computer', 'Windows 10', 'Chrome', NULL, 'Delhi', 'Delhi', 'IN', '28.6519,77.2315', 'AS24560 Bharti Airtel Ltd., Telemedia Services', '110001', 'Asia/Kolkata', 1, '2023-10-04 10:12:15', '0000-00-00 00:00:00', 1),
(42, 16, '122.179.196.122', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'Computer', 'Windows 10', 'Chrome', NULL, 'Delhi', 'Delhi', 'IN', '28.6519,77.2315', 'AS24560 Bharti Airtel Ltd., Telemedia Services', '110001', 'Asia/Kolkata', 1, '2023-10-04 10:19:34', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_work_status`
--

CREATE TABLE `tbl_work_status` (
  `id` int(11) NOT NULL,
  `title` varchar(80) NOT NULL,
  `created_date` datetime NOT NULL,
  `mod_date` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-Active,2-InActive,3-Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_work_status`
--

INSERT INTO `tbl_work_status` (`id`, `title`, `created_date`, `mod_date`, `status`) VALUES
(1, 'Done', '2023-08-23 05:02:31', '2023-09-01 11:56:35', 3),
(2, 'Pending', '2023-08-23 05:02:35', '0000-00-00 00:00:00', 3),
(6, 'asdfsdasff', '2023-09-01 11:56:39', '2023-09-01 11:56:54', 3),
(7, 'dddd', '2023-09-26 11:44:59', '0000-00-00 00:00:00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lead_manage_column`
--
ALTER TABLE `lead_manage_column`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_authencticate_status`
--
ALTER TABLE `tbl_authencticate_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_billing`
--
ALTER TABLE `tbl_billing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_bookings`
--
ALTER TABLE `tbl_bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_email`
--
ALTER TABLE `tbl_email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_email_setup`
--
ALTER TABLE `tbl_email_setup`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sender_email` (`sender_email`);

--
-- Indexes for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_items`
--
ALTER TABLE `tbl_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_leads`
--
ALTER TABLE `tbl_leads`
  ADD PRIMARY KEY (`lead_id`);

--
-- Indexes for table `tbl_leads_duplicate`
--
ALTER TABLE `tbl_leads_duplicate`
  ADD PRIMARY KEY (`lead_id`);

--
-- Indexes for table `tbl_leads_note`
--
ALTER TABLE `tbl_leads_note`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_lead_contact_user`
--
ALTER TABLE `tbl_lead_contact_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_log`
--
ALTER TABLE `tbl_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_manage_plan`
--
ALTER TABLE `tbl_manage_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_mass_email`
--
ALTER TABLE `tbl_mass_email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_mass_lead`
--
ALTER TABLE `tbl_mass_lead`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_messages`
--
ALTER TABLE `tbl_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_monthly_check`
--
ALTER TABLE `tbl_monthly_check`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_notes`
--
ALTER TABLE `tbl_notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_otp`
--
ALTER TABLE `tbl_otp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_payment_info`
--
ALTER TABLE `tbl_payment_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_permission`
--
ALTER TABLE `tbl_permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_permission_category`
--
ALTER TABLE `tbl_permission_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_permission_role`
--
ALTER TABLE `tbl_permission_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_plan`
--
ALTER TABLE `tbl_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_remote`
--
ALTER TABLE `tbl_remote`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sale_status`
--
ALTER TABLE `tbl_sale_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_template`
--
ALTER TABLE `tbl_template`
  ADD PRIMARY KEY (`template_id`);

--
-- Indexes for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_auth`
--
ALTER TABLE `tbl_user_auth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_login_activity`
--
ALTER TABLE `tbl_user_login_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_work_status`
--
ALTER TABLE `tbl_work_status`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lead_manage_column`
--
ALTER TABLE `lead_manage_column`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_authencticate_status`
--
ALTER TABLE `tbl_authencticate_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT for table `tbl_billing`
--
ALTER TABLE `tbl_billing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_bookings`
--
ALTER TABLE `tbl_bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_email`
--
ALTER TABLE `tbl_email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_email_setup`
--
ALTER TABLE `tbl_email_setup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_items`
--
ALTER TABLE `tbl_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_leads`
--
ALTER TABLE `tbl_leads`
  MODIFY `lead_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_leads_duplicate`
--
ALTER TABLE `tbl_leads_duplicate`
  MODIFY `lead_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_leads_note`
--
ALTER TABLE `tbl_leads_note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_lead_contact_user`
--
ALTER TABLE `tbl_lead_contact_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_log`
--
ALTER TABLE `tbl_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=512;

--
-- AUTO_INCREMENT for table `tbl_manage_plan`
--
ALTER TABLE `tbl_manage_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_mass_email`
--
ALTER TABLE `tbl_mass_email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_mass_lead`
--
ALTER TABLE `tbl_mass_lead`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tbl_messages`
--
ALTER TABLE `tbl_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_monthly_check`
--
ALTER TABLE `tbl_monthly_check`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_notes`
--
ALTER TABLE `tbl_notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_otp`
--
ALTER TABLE `tbl_otp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `tbl_payment_info`
--
ALTER TABLE `tbl_payment_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_permission`
--
ALTER TABLE `tbl_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `tbl_permission_category`
--
ALTER TABLE `tbl_permission_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_permission_role`
--
ALTER TABLE `tbl_permission_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `tbl_plan`
--
ALTER TABLE `tbl_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_remote`
--
ALTER TABLE `tbl_remote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_sale_status`
--
ALTER TABLE `tbl_sale_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_template`
--
ALTER TABLE `tbl_template`
  MODIFY `template_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_user_auth`
--
ALTER TABLE `tbl_user_auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_user_login_activity`
--
ALTER TABLE `tbl_user_login_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_work_status`
--
ALTER TABLE `tbl_work_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
