-- phpMyAdmin SQL Dump
-- version 4.2.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Aug 18, 2015 at 01:22 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=74 ;

--
-- Dumping data for table `db_project`
--

INSERT INTO `db_project` (`id`, `project_name`, `project_company`, `project_description`, `project_picture`, `img_name`) VALUES
(68, 'Youtube', 'Google', 'YouTube is a video-sharing website headquartered in San Bruno, California, United States. The service was created by three former PayPal employees in February 2005. In November 2006, it was bought by Google for US$1.65 billion.[4] YouTube now operates as one of Google''s subsidiaries.[5] The site allows users to upload, view, and share videos, and it makes use of WebM, H.264/MPEG-4 AVC, and Adobe Flash Video technology to display a wide variety of user-generated and corporate media video. Available content includes video clips, TV clips, music videos, and other content such as video blogging, short original videos, and educational videos.\r\n\r\n', 'YoutubeGoogle.png', 'The Youtube logo.'),
(69, 'Facebook', 'Facebook', 'Facebook is an online social networking service headquartered in Menlo Park, California. Its website was launched on February 4, 2004, by Mark Zuckerberg with his Harvard College roommates and fellow students Eduardo Saverin, Andrew McCollum, Dustin Moskovitz and Chris Hughes. The founders had initially limited the website''s membership to Harvard students, but later expanded it to colleges in the Boston area, the Ivy League, and Stanford University. It gradually added support for students at various other universities and later to high-school students. Since 2006, anyone who is at least 13 years old is allowed to become a registered user of the website, though the age requirement may be higher depending on applicable local laws. Its name comes from a colloquialism for the directory given to it by American universities'' students.', 'FacebookFacebook.png', 'The Facebook logo'),
(70, 'Evernote', 'Evernote Co.', 'Evernote is an American independent, private company offering a closed source freemium suite of software and services, designed for notetaking and archiving.[3] The company''s flagship product allows users to create a "note" which can be a piece of formatted text, a full webpage or webpage excerpt, a photograph, a voice memo, or a handwritten "ink" note. Notes can also have file attachments. Notes can be sorted into folders, tagged, annotated, edited, given comments, searched, and exported as part of a notebook.', 'EvernoteEvernote Co..png', 'The Evernote logo'),
(71, '9GAG', '9GAG', '9GAG, Inc. operates an online platform and social media website. Users upload and share content either user-generated or found on other social media websites. 9GAG, Inc. is based in Mountain View, California. Since the website was launched on April 23, 2008, it has grown in popularity, reaching more than 20 million Facebook â€œlikesâ€[2] and over 3 million Twitter followers in mid-September 2014.[3]', '9GAG9GAG.png', 'The 9GAG logo'),
(72, 'Imgur', 'Imgur', 'Imgur (pronounced /ËˆÉªmÉ™dÊ’É™r/ like image-er; imager[2] and stylized as imgur) is an online image sharing community and image host founded by Alan Schaaf in 2009 in Athens, Ohio, United States. Imgur describes itself as "the home to the web''s most popular image content, curated in real time by a dedicated community through commenting, voting and sharing."[3] It offers free image hosting to millions of users[4] a day, and a comment-based social community. The company supports itself with revenue generated from ad sales, commercial hosting and merchandise.[5]', 'ImgurImgur.png', 'The Imgur logo'),
(73, 'Twitter', 'Twitter', 'Twitter (/ËˆtwÉªtÉ™r/) is an online social networking service that enables users to send and read short 140-character messages called "tweets".\r\n\r\nRegistered users can read and post tweets, but unregistered users can only read them. Users access Twitter through the website interface, SMS, or mobile device app.[10] Twitter Inc. is based in San Francisco and has more than 25 offices around the world.[11]', 'TwitterTwitter.png', 'The Twitter logo');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `db_request`
--

INSERT INTO `db_request` (`id`, `id_project`, `request`, `id_user`, `score`) VALUES
(4, 68, 'Don''t stop playing the video when closing the app.', 23, 4),
(6, 69, 'Change the color scheme', 23, 2),
(7, 69, 'Dislike button', 23, -1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `db_users`
--

INSERT INTO `db_users` (`id`, `nickname`, `password`, `email`, `picture`, `role`) VALUES
(23, 'hnnlrgvrts', '$2y$12$aWwqtKlnSVeWQWj1ccOEv.N2h.ORjrdhZJE/6CpZmlS/WqwnEk4KG', 'hnnlrgvrts@hotmail.com', 'avhnnlrgvrts.png', 1),
(25, 'JakeTheDog', '$2y$12$y70h3rnsMfdaUNqGErMwUOkp3FQyYSM4sRDI2mn8Z5PwMSkBkabse', 'JakeTheDog@hotmail.com', 'avJakeTheDog.png', 0),
(26, 'FinnTheHuman', '$2y$12$b2yz3I1lUQY61MTx1zsXj.EH4g8i38Ipw92tMs5OxJOOkIGp9Ar3S', 'FinnTheHuman@hotmail.com', 'avFinnTheHuman.png', 0),
(28, 'PakitoPapulo', '$2y$12$LLRAqU8.v2k0Bw1.ixuB6eB/iPXQ31BBCbTs.zbL7Pn92elLfvvPO', 'PakitoPapulo@Papulomail.com', 'avPakitoPapulo.png', 0),
(32, 'BlackWidow', '$2y$12$AjEdblmCR8dVuL2zUi6eaO//NU6ky63RTJBnerny/XwoTayp7tZHK', 'BlackWidow@TheAvengers.com', 'avBlackWidow.png', 2),
(33, 'Borat', '$2y$12$7fOC5KTBY7rcut6weVUdiOFjlS815kpV9umCR79mFr90gbTNXxyzC', 'Borat@Kazachmail.org', 'avBorat.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `db_voting`
--

CREATE TABLE IF NOT EXISTS `db_voting` (
`id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_votedrequest` int(11) NOT NULL,
  `type` tinyint(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=80 ;

--
-- Dumping data for table `db_voting`
--

INSERT INTO `db_voting` (`id`, `id_user`, `id_votedrequest`, `type`) VALUES
(71, 23, 4, 1),
(72, 23, 6, 1),
(73, 23, 7, 0),
(74, 26, 6, 1),
(75, 26, 7, 0),
(76, 26, 4, 1),
(77, 32, 4, 1),
(78, 28, 4, 1),
(79, 28, 7, 1);

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `db_request`
--
ALTER TABLE `db_request`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `db_users`
--
ALTER TABLE `db_users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `db_voting`
--
ALTER TABLE `db_voting`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=80;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
