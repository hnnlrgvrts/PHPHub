-- phpMyAdmin SQL Dump
-- version 4.2.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Aug 10, 2015 at 08:43 PM
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
  `id_user` int(11) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `db_request`
--

INSERT INTO `db_request` (`id`, `id_project`, `request`, `id_user`, `score`) VALUES
(25, 10, 'Request 1', 3, 0),
(26, 10, 'Request 2', 9, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `db_users`
--

INSERT INTO `db_users` (`id`, `nickname`, `password`, `email`, `picture`, `role`) VALUES
(1, 'hnnlrgvrts', '$2y$12$xGAYXk7yuZYdHYeFKxUop.wBjKrInKYZDDhvHcXchjqtyA0Mtnra2', '', '', 1),
(2, 'test', '$2y$12$dWT7fAhWX5w3SIfiP6LOv.DzvfY4uCM3TjASQyuxrK1w/kTuFB2n6', '', '', 0),
(3, 'Guades', '$2y$12$Kexdq.KwvGhedeb2/47ULudVttVrpHBrTxG.kU2hJNXYKT5E8t2p2', '', '', 0),
(4, 'konijn', '$2y$12$x.n2e9vgZBCj7C8sLOUHvOlhin7dQMeHjeaYakG9B8L.RFPREQrLK', '', '', 0),
(5, 'Adolf', '$2y$12$dVzjLikKZczar7Q7RtrK.O2AOEpX4TmAQlsvsUPyRtfvOuK7Cbq6e', '', '', 0),
(6, 'Stalin', '$2y$12$SPBA5leBZjflOBRFbAiH1u3W/XI0wogfw2Ki4VTzP1HFxNk99H3h.', '', '', 0),
(7, 'Lenin', '$2y$12$OZA8uxy8ZmTZYt0y/s61Te2FC4YpbUATsu/mPbtiPd8jqNHaWp/T.', '', '', 0),
(8, 'Lenin', '$2y$12$4jh379SI9bs8VNvtmox1xuG.AVwuU4Fj7ymaYzHSc6.ZtZro2RcSW', '', '', 0),
(9, 'Chegev', '$2y$12$h0QVbXKAwEWX.tSYA2FjcOvxATWLxWy/MqAjdI4aSFHzg8iK4znOa', '', '', 0),
(10, 'Chegev', '$2y$12$QgOHQJtKwVqxC50bCixgfuI9mt1RBM3aIdRYCRz5HpeHUWUnxcq8K', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `db_voting`
--

CREATE TABLE IF NOT EXISTS `db_voting` (
`id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_votedrequest` int(11) NOT NULL,
  `type` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

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
-- Indexes for table `db_voting`
--
ALTER TABLE `db_voting`
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `db_users`
--
ALTER TABLE `db_users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `db_voting`
--
ALTER TABLE `db_voting`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
