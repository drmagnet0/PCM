-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2017 at 03:43 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pcm`
--

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `status` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `parent_id`, `name`, `status`) VALUES
(1, 0, 'veeva', 'enabled'),
(2, 0, 'polaris', 'enabled');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `country` varchar(50) NOT NULL,
  `image` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `bussinesaccount_id` int(11) NOT NULL,
  `project_resources` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `slides` int(11) NOT NULL,
  `static` int(11) NOT NULL,
  `basic` int(11) NOT NULL,
  `animation` int(11) NOT NULL,
  `app` int(11) NOT NULL,
  `startdate` int(11) NOT NULL,
  `enddate` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `wavefor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `country`, `image`, `category_id`, `bussinesaccount_id`, `project_resources`, `status`, `slides`, `static`, `basic`, `animation`, `app`, `startdate`, `enddate`, `created`, `wavefor`) VALUES
(1, 'FertilityNewCampaign', 'KSA', 'd98eedb1f06c5466ff6a5ac5460622eeac513080_3bc4a5c78a452908fc86651ce050a389070db276.jpg', 1, 18, '1,17', 'enabled', 10, 5, 1, 1, 3, 6, 6, 1496507360, 3),
(3, 'for test', 'EGY', '441323028fc4010988368835060db75346028ad5_0f172548dbeb25c71b1a69b6b4f1fc3d50372266.jpg', 2, 18, '1,17', 'enabled', 10, 5, 1, 1, 3, 6, 6, 1496533688, 1);

-- --------------------------------------------------------

--
-- Table structure for table `project_bg`
--

CREATE TABLE `project_bg` (
  `project_id` int(11) NOT NULL,
  `image` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_manager`
--

CREATE TABLE `project_manager` (
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_resources`
--

CREATE TABLE `project_resources` (
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_slides` int(11) NOT NULL,
  `user_hours` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_thumbs`
--

CREATE TABLE `project_thumbs` (
  `project_id` int(11) NOT NULL,
  `image` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `resources_users_group_id` int(11) NOT NULL,
  `accounts_users_group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `users_group_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(96) NOT NULL,
  `image` varchar(255) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `password` varchar(128) NOT NULL,
  `created` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `ip` varchar(32) NOT NULL,
  `code` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `users_group_id`, `name`, `email`, `image`, `gender`, `password`, `created`, `status`, `ip`, `code`) VALUES
(1, 5, 'Abdelrahman', 'abdelrahman.ui@gmail.com', 'a.jpg', 'male', '$2y$10$2so6vdaw0CY1i5gbvXkpSOEJ/fGkM2we.cisN6Y71LZsEhKxf0Wo.', 1494888883, 'enabled', '', '5b58f1e437b915c9d56ef6d3ab0580038d16d091'),
(17, 5, 'Ahmed', 'Ahmed@Mohamed.com', '95c6ef16868b7bc5ee8b7b57a1c609ed8f2bc7e5_463117eb200cec41f3f2a4b6450ee1985ced41a1.jpg', 'male', '$2y$10$/gJL1s1Phg0cFUf/njRTbe/hDkqedm/bqcG4z0dyCc8kLdMdaoT.S', 1496281149, 'disabled', '::1', '72eabd7a9f0eada86867bab852c73947f18f2aa3'),
(18, 4, 'Marina Selim', 'marina.selim@intermark-corp.com', '608810f2f42330e76da5d2cb4d530df2c496eb8d_10d79680162e7c14b5640c316a14dd9e9ba11a64.jpg', 'femal', '$2y$10$vSWL0Ex4CfridWHxGmw4e.UswA8DP1u1.xlrxIiTY92YG2Cy96J9a', 1496423741, 'enabled', '::1', 'a13b0fb93a2b8acbd187b193d5b48b0a397d9ab3');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `name`) VALUES
(1, 'Super Adminstrator'),
(3, 'just for fun'),
(4, 'Account Managers'),
(5, 'Resources');

-- --------------------------------------------------------

--
-- Table structure for table `users_group_permissions`
--

CREATE TABLE `users_group_permissions` (
  `id` int(11) NOT NULL,
  `users_group_id` int(11) NOT NULL,
  `page` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_group_permissions`
--

INSERT INTO `users_group_permissions` (`id`, `users_group_id`, `page`) VALUES
(1, 1, '/admin/login'),
(2, 1, '/admin/login/submit'),
(3, 1, '/admin'),
(4, 1, '/admin/dashboard'),
(5, 1, '/admin/submit'),
(6, 1, '/admin/users'),
(7, 1, '/admin/users/add'),
(8, 1, '/admin/users/submit'),
(9, 1, '/admin/users/edit/:id'),
(10, 1, '/admin/users/save/:id'),
(11, 1, '/admin/users/delete/:id'),
(12, 1, '/admin/users-groups'),
(13, 1, '/admin/users-groups/add'),
(14, 1, '/admin/users-groups/submit'),
(15, 1, '/admin/users-groups/edit/:id'),
(16, 1, '/admin/users-groups/save/:id'),
(17, 1, '/admin/users-groups/delete/:id'),
(18, 1, '/admin/projects'),
(19, 1, '/admin/projects/add'),
(20, 1, '/admin/projects/submit'),
(21, 1, '/admin/projects/edit/:id'),
(22, 1, '/admin/projects/save/:id'),
(23, 1, '/admin/projects/delete/:id'),
(24, 1, '/admin/projects/:id/comments'),
(25, 1, '/admin/projects/comments/edit/:id'),
(26, 1, '/admin/projects/comments/save/:id'),
(27, 1, '/admin/projects/comments/delete/:id'),
(28, 1, '/admin/categories'),
(29, 1, '/admin/categories/add'),
(30, 1, '/admin/categories/submit'),
(31, 1, '/admin/categories/edit/:id'),
(32, 1, '/admin/categories/save/:id'),
(33, 1, '/admin/categories/delete/:id'),
(34, 1, '/admin/settings'),
(35, 1, '/admin/settings/save'),
(36, 1, '/admin/contacts'),
(37, 1, '/admin/contacts/reply/:id'),
(38, 1, '/admin/contacts/send/:id'),
(39, 1, '/admin/logout'),
(40, 2, '/admin/login'),
(41, 2, '/admin/login/submit'),
(42, 3, '/admin/login'),
(43, 3, '/admin/login/submit'),
(44, 3, '/admin/dashboard'),
(45, 4, '/admin/login/submit'),
(46, 8, '/admin/login'),
(47, 8, '/admin/login/submit'),
(48, 8, '/admin'),
(49, 8, '/admin/dashboard'),
(50, 8, '/admin/submit'),
(51, 8, '/admin/users'),
(52, 8, '/admin/users/add'),
(53, 8, '/admin/users/submit'),
(54, 8, '/admin/users/edit/:id'),
(55, 8, '/admin/users/save/:id'),
(56, 8, '/admin/users/delete/:id'),
(57, 8, '/admin/users-groups'),
(58, 8, '/admin/users-groups/add'),
(59, 8, '/admin/users-groups/submit'),
(60, 8, '/admin/users-groups/edit/:id'),
(61, 8, '/admin/users-groups/save/:id'),
(62, 8, '/admin/users-groups/delete/:id'),
(63, 8, '/admin/projects'),
(64, 8, '/admin/projects/add'),
(65, 8, '/admin/projects/submit'),
(66, 8, '/admin/projects/edit/:id'),
(67, 8, '/admin/projects/save/:id'),
(68, 8, '/admin/projects/delete/:id'),
(69, 8, '/admin/projects/:id/comments'),
(70, 8, '/admin/projects/comments/edit/:id'),
(71, 8, '/admin/projects/comments/save/:id'),
(72, 8, '/admin/projects/comments/delete/:id'),
(73, 8, '/admin/categories'),
(74, 8, '/admin/categories/add'),
(75, 8, '/admin/categories/submit'),
(76, 8, '/admin/categories/edit/:id'),
(77, 8, '/admin/categories/save/:id'),
(78, 8, '/admin/categories/delete/:id'),
(79, 8, '/admin/settings'),
(80, 8, '/admin/settings/save'),
(81, 8, '/admin/contacts'),
(82, 8, '/admin/contacts/reply/:id'),
(83, 8, '/admin/contacts/send/:id'),
(84, 8, '/admin/logout');

-- --------------------------------------------------------

--
-- Table structure for table `waves`
--

CREATE TABLE `waves` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `wave` int(11) NOT NULL,
  `created` text NOT NULL,
  `status` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_group_permissions`
--
ALTER TABLE `users_group_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `waves`
--
ALTER TABLE `waves`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users_group_permissions`
--
ALTER TABLE `users_group_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT for table `waves`
--
ALTER TABLE `waves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
