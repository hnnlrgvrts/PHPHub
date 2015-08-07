-- phpMyAdmin SQL Dump
-- version 4.2.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Aug 07, 2015 at 07:27 AM
-- Server version: 5.5.41-log
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `phphub`
--

-- --------------------------------------------------------

--
-- Table structure for table `db_project`
--

CREATE TABLE IF NOT EXISTS `db_project` (
`id` int(11) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `project_company` varchar(255) NOT NULL,
  `project_description` varchar(1000) NOT NULL,
  `project_picture` varchar(255) NOT NULL,
  `img_name` varchar(3000) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `db_project`
--

INSERT INTO `db_project` (`id`, `project_name`, `project_company`, `project_description`, `project_picture`, `img_name`) VALUES
(10, 'Google', '', 'Google is een zoekmachine enzo. ', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `db_request`
--

CREATE TABLE IF NOT EXISTS `db_request` (
`id` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `request` varchar(3000) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `db_request`
--

INSERT INTO `db_request` (`id`, `id_project`, `request`, `id_user`) VALUES
(1, 10, '', 0),
(2, 10, '', 0),
(3, 10, '', 0),
(4, 10, '', 0),
(5, 10, '', 0),
(6, 10, '', 1),
(7, 10, '', 1),
(8, 10, '', 1),
(9, 10, '', 1),
(10, 10, '', 1),
(11, 10, '', 1),
(12, 10, '', 1),
(13, 10, 'Hallo', 1);

-- --------------------------------------------------------

--
-- Table structure for table `db_users`
--

CREATE TABLE IF NOT EXISTS `db_users` (
`id` int(11) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `role` int(3) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `db_users`
--

INSERT INTO `db_users` (`id`, `nickname`, `password`, `email`, `picture`, `role`) VALUES
(1, 'hnnlrgvrts', '$2y$12$xGAYXk7yuZYdHYeFKxUop.wBjKrInKYZDDhvHcXchjqtyA0Mtnra2', '', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `db_project`
--
ALTER TABLE `db_project`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_request`
--
ALTER TABLE `db_request`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_users`
--
ALTER TABLE `db_users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `db_project`
--
ALTER TABLE `db_project`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `db_request`
--
ALTER TABLE `db_request`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `db_users`
--
ALTER TABLE `db_users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
