-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2016 at 03:53 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `my_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
`articleID` int(11) unsigned NOT NULL,
  `year` year(4) NOT NULL,
  `Title` varchar(150) NOT NULL,
  `language` varchar(20) NOT NULL DEFAULT 'English',
  `file_size` float unsigned NOT NULL,
  `file_name` varchar(30) NOT NULL,
  `file_path` varchar(200) NOT NULL,
  `no_of_translations` int(10) unsigned DEFAULT '0',
  `no_of_pages` int(10) unsigned DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`articleID`, `year`, `Title`, `language`, `file_size`, `file_name`, `file_path`, `no_of_translations`, `no_of_pages`) VALUES
(2, 2014, 'Chip Fabrication', 'english', 224057, '1.pdf', 'C:\\xampp\\htdocs\\language-transltr-mycode\\articles\\1.pdf', 0, 4),
(3, 2014, 'making sc', 'english', 224057, '3.pdf', 'C:\\xampp\\htdocs\\language-transltr-mycode\\articles\\3.pdf', 0, 4),
(4, 2014, 'Digital humanities', 'english', 224057, '4.pdf', 'C:\\xampp\\htdocs\\language-transltr-mycode\\articles\\4.pdf', 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `author_journal`
--

CREATE TABLE IF NOT EXISTS `author_journal` (
  `fid` int(11) NOT NULL DEFAULT '0',
  `title` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
  `fid` int(11) NOT NULL DEFAULT '0',
  `fname` varchar(20) NOT NULL,
  `dname` varchar(20) NOT NULL,
  `email` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`fid`, `fname`, `dname`, `email`) VALUES
(101, 'Ramesh Balaji', 'CSE', 'rudx@gmail.com'),
(102, 'Pranab', 'CSE', 'spice96@gmail.com'),
(103, 'Sayaji Ganesh', 'EE', 'saygan@iiti.ac.in');

-- --------------------------------------------------------

--
-- Table structure for table `journal`
--

CREATE TABLE IF NOT EXISTS `journal` (
  `jname` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `acad_year` varchar(15) DEFAULT NULL,
  `pub_year` int(11) NOT NULL,
  `issue` int(11) NOT NULL,
  `vol` int(11) NOT NULL,
  `pg_start` int(11) NOT NULL,
  `pg_end` int(11) NOT NULL,
  `url` varchar(100) DEFAULT NULL,
  `author_name` varchar(32) DEFAULT NULL,
  `uploader` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `journal`
--

INSERT INTO `journal` (`jname`, `title`, `acad_year`, `pub_year`, `issue`, `vol`, `pg_start`, `pg_end`, `url`, `author_name`, `uploader`) VALUES
('Digital', 'Chip Fabrication', '2014', 2015, 3, 4, 1, 12, '../articles/1.pdf', 'Dr. Sai Teja Anna', 'full'),
('IEEE', 'Digital humanities', '2014', 2015, 1, 2, 12, 13, '../articles/4.pdf', 'Dr Sai', 'full'),
('cryogenic science', 'making sc', '2014', 2015, 2, 3, 45, 47, '../articles/3.pdf', 'Dr. Sai Teja Anna', 'full');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `articleID` int(11) unsigned NOT NULL,
  `page_no` int(11) unsigned NOT NULL,
  `language` varchar(20) NOT NULL,
  `file_name` varchar(30) NOT NULL,
  `file_size` float NOT NULL,
  `file_path` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`articleID`, `page_no`, `language`, `file_name`, `file_size`, `file_path`) VALUES
(2, 1, 'english', '1.pdf_1.txt', 670, 'C:\\xampp\\htdocs\\language-transltr-mycode\\pages\\1.pdf_1.txt'),
(2, 1, 'hindi', '1.pdf_1.txt_translated.txt', 34, 'C:\\xampp\\htdocs\\language-transltr-mycode\\translatedPages\\1.pdf_1.txt_translated.txt'),
(2, 2, 'english', '1.pdf_2.txt', 1316, 'C:\\xampp\\htdocs\\language-transltr-mycode\\pages\\1.pdf_2.txt'),
(2, 2, 'hindi', '1.pdf_2.txt_translated.txt', 18, 'C:\\xampp\\htdocs\\language-transltr-mycode\\translatedPages\\1.pdf_2.txt_translated.txt'),
(2, 3, 'english', '1.pdf_3.txt', 1224, 'C:\\xampp\\htdocs\\language-transltr-mycode\\pages\\1.pdf_3.txt'),
(2, 3, 'hindi', '1.pdf_3.txt_translated.txt', 21, 'C:\\xampp\\htdocs\\language-transltr-mycode\\translatedPages\\1.pdf_3.txt_translated.txt'),
(2, 4, 'english', '1.pdf_4.txt', 525, 'C:\\xampp\\htdocs\\language-transltr-mycode\\pages\\1.pdf_4.txt'),
(2, 4, 'hindi', '1.pdf_4.txt_translated.txt', 15, 'C:\\xampp\\htdocs\\language-transltr-mycode\\translatedPages\\1.pdf_4.txt_translated.txt'),
(3, 1, 'english', '3.pdf_1.txt', 670, 'C:\\xampp\\htdocs\\language-transltr-mycode\\pages\\3.pdf_1.txt'),
(3, 1, 'hindi', '3.pdf_1.txt_translated.txt', 40, 'C:\\xampp\\htdocs\\language-transltr-mycode\\translatedPages\\3.pdf_1.txt_translated.txt'),
(3, 2, 'english', '3.pdf_2.txt', 1316, 'C:\\xampp\\htdocs\\language-transltr-mycode\\pages\\3.pdf_2.txt'),
(3, 3, 'english', '3.pdf_3.txt', 1224, 'C:\\xampp\\htdocs\\language-transltr-mycode\\pages\\3.pdf_3.txt'),
(3, 4, 'english', '3.pdf_4.txt', 525, 'C:\\xampp\\htdocs\\language-transltr-mycode\\pages\\3.pdf_4.txt'),
(4, 1, 'english', '4.pdf_1.txt', 670, 'C:\\xampp\\htdocs\\language-transltr-mycode\\pages\\4.pdf_1.txt'),
(4, 2, 'english', '4.pdf_2.txt', 1316, 'C:\\xampp\\htdocs\\language-transltr-mycode\\pages\\4.pdf_2.txt'),
(4, 3, 'english', '4.pdf_3.txt', 1224, 'C:\\xampp\\htdocs\\language-transltr-mycode\\pages\\4.pdf_3.txt'),
(4, 4, 'english', '4.pdf_4.txt', 525, 'C:\\xampp\\htdocs\\language-transltr-mycode\\pages\\4.pdf_4.txt');

-- --------------------------------------------------------

--
-- Table structure for table `translations`
--

CREATE TABLE IF NOT EXISTS `translations` (
  `articleID` int(11) unsigned NOT NULL,
  `language` varchar(20) NOT NULL,
  `file_size` float unsigned NOT NULL,
  `file_name` varchar(20) NOT NULL,
  `file_path` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `fid` varchar(32) NOT NULL DEFAULT '',
  `password` varchar(50) DEFAULT NULL,
  `name` varchar(32) DEFAULT NULL,
  `email` varchar(32) DEFAULT NULL,
  `phno` varchar(32) DEFAULT NULL,
  `institution` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`fid`, `password`, `name`, `email`, `phno`, `institution`) VALUES
('admin', 'ab8d3aa658cac26fea0a61a52e49e457', NULL, NULL, NULL, NULL),
('full', '86094b61cb9f63b77f982ceae03e95f0', 'Edward Elric', 'edidiot@gmail.com', '5566778899', 'Tokyo School of Alchemy'),
('power', '58649878b7e5f1ee39e9034b8cd6ae5d', 'Enter Name', 'Enter email', 'Enter phone no.', 'Enter Institute');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
 ADD PRIMARY KEY (`articleID`), ADD UNIQUE KEY `Title` (`Title`,`file_name`,`file_path`);

--
-- Indexes for table `author_journal`
--
ALTER TABLE `author_journal`
 ADD PRIMARY KEY (`fid`,`title`), ADD KEY `title` (`title`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
 ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `journal`
--
ALTER TABLE `journal`
 ADD PRIMARY KEY (`title`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
 ADD PRIMARY KEY (`articleID`,`page_no`,`language`), ADD UNIQUE KEY `file_name` (`file_name`), ADD UNIQUE KEY `file_path` (`file_path`);

--
-- Indexes for table `translations`
--
ALTER TABLE `translations`
 ADD PRIMARY KEY (`articleID`,`language`), ADD UNIQUE KEY `file_name` (`file_name`), ADD UNIQUE KEY `file_path` (`file_path`), ADD KEY `articleID` (`articleID`), ADD KEY `articleID_2` (`articleID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`fid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
MODIFY `articleID` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
ADD CONSTRAINT `fak` FOREIGN KEY (`Title`) REFERENCES `journal` (`title`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `author_journal`
--
ALTER TABLE `author_journal`
ADD CONSTRAINT `author_journal_ibfk_1` FOREIGN KEY (`fid`) REFERENCES `faculty` (`fid`),
ADD CONSTRAINT `author_journal_ibfk_2` FOREIGN KEY (`title`) REFERENCES `journal` (`title`);

--
-- Constraints for table `pages`
--
ALTER TABLE `pages`
ADD CONSTRAINT `is_in` FOREIGN KEY (`articleID`) REFERENCES `articles` (`articleID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `translations`
--
ALTER TABLE `translations`
ADD CONSTRAINT `is_of` FOREIGN KEY (`articleID`) REFERENCES `articles` (`articleID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
