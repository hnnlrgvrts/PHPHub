-- phpMyAdmin SQL Dump
-- version 4.2.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Aug 18, 2015 at 12:58 AM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `db_project`
--
ALTER TABLE `db_project`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `db_project`
--
ALTER TABLE `db_project`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=74;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
