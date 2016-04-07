-- MySQL dump 10.13  Distrib 5.5.47, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: portal
-- ------------------------------------------------------
-- Server version	5.5.47-0+deb8u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `author_book_chapter`
--

DROP TABLE IF EXISTS `author_book_chapter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `author_book_chapter` (
  `fid` int(11) NOT NULL DEFAULT '0',
  `book_title` varchar(50) NOT NULL DEFAULT '',
  `ch_title` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`fid`,`book_title`,`ch_title`),
  KEY `book_title` (`book_title`,`ch_title`),
  CONSTRAINT `author_book_chapter_ibfk_1` FOREIGN KEY (`fid`) REFERENCES `faculty` (`fid`),
  CONSTRAINT `author_book_chapter_ibfk_2` FOREIGN KEY (`book_title`, `ch_title`) REFERENCES `book_chapter` (`book_title`, `ch_title`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `author_book_chapter`
--

LOCK TABLES `author_book_chapter` WRITE;
/*!40000 ALTER TABLE `author_book_chapter` DISABLE KEYS */;
INSERT INTO `author_book_chapter` VALUES (103,'half blood prince','silver and opals'),(101,'harry potter','minister');
/*!40000 ALTER TABLE `author_book_chapter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `book_chapter`
--

DROP TABLE IF EXISTS `book_chapter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `book_chapter` (
  `book_title` varchar(50) NOT NULL,
  `editor` varchar(20) NOT NULL,
  `ch_title` varchar(50) NOT NULL,
  `pub_year` int(11) NOT NULL,
  `acad_year` varchar(15) DEFAULT NULL,
  `publisher` varchar(50) NOT NULL,
  `url` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`book_title`,`ch_title`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book_chapter`
--

LOCK TABLES `book_chapter` WRITE;
/*!40000 ALTER TABLE `book_chapter` DISABLE KEYS */;
INSERT INTO `book_chapter` VALUES ('half blood prince','Galbraith','silver and opals',2006,'2013','Harper Collins','www.potterheads.com'),('harry potter','jkr','minister',2009,'2009','bloomsbury','www.hp.in');
/*!40000 ALTER TABLE `book_chapter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faculty`
--

DROP TABLE IF EXISTS `faculty`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `faculty` (
  `fid` int(11) NOT NULL DEFAULT '0',
  `fname` varchar(20) NOT NULL,
  `dname` varchar(20) NOT NULL,
  `email` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`fid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faculty`
--

LOCK TABLES `faculty` WRITE;
/*!40000 ALTER TABLE `faculty` DISABLE KEYS */;
INSERT INTO `faculty` VALUES (101,'Ramesh Balaji','CSE','rudx@gmail.com'),(102,'Pranab','CSE','spice96@gmail.com'),(103,'Sayaji Ganesh','EE','saygan@iiti.ac.in');
/*!40000 ALTER TABLE `faculty` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `journal`
--

DROP TABLE IF EXISTS `journal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `journal` (
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
  `uploader` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`title`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `journal`
--

LOCK TABLES `journal` WRITE;
/*!40000 ALTER TABLE `journal` DISABLE KEYS */;
INSERT INTO `journal` VALUES ('bull','bull','64',364,321,54,321,654,'uploads/Tut2.pdf','skdhg',''),('IEEE asia','bur bur cha cha and singapore','2011',2012,2,5,1,4,'uploads/tut-4.pdf','Dr. Sai Teja Anna',NULL),('Digit','coding theory','2012-13',2015,4,4,28,30,'Tut1.pdf','Dr. jesse owens',NULL),('ACP','Cryogenic chip fabrication','2012-13',2015,3,5,12,14,'Tut2.pdf','Dr. Walter White',NULL),('IEEE asia','How to  harness Hurricanes','2013',2015,4,1,12,13,'Tut2.pdf','Dr. Sai Teja Anna',NULL),('ACM','invisible computing','2012',2013,4,3,1,2,'uploads/tut-4.pdf','Dr. Sai Teja Anna',NULL),('ngfd','jhf','32',32,32,32,32,32,'uploads/Tut3.pdf','nmv','full'),('kjh','kjh','98',98,98,98,98,98,'uploads/Tut3.pdf','kjh',''),('hgc','kjhf','65',65,65,65,65,65,'uploads/Tut3.pdf','jhg',''),('sdfhgb','ksjdb','654',65,321,654,654,321,'uploads/tut-5.pdf','kjvb',''),('IEEE','Lithium ion conjugation','2012-13',2015,5,6,31,32,'tut-5.pdf','Dr. Sai Teja Anna',NULL),('granules asia','Stones of the Balkan','2013',2014,1,2,43,45,'/var/www/html/sepro/uploads/visa letter.pdf','Dr. Sai Teja Anna',NULL),('test','test','2013',2014,1,1,1,12,'uploads/Tut7.pdf','test',NULL),('IEEE asia','Thin film Pd+','2013',2105,21,1,23,24,'Tut1.pdf','Dr. Walter White',NULL),('ACM','why engineering rocks','2010-12',2014,1,12,23,29,'Tut1.pdf','Dr. Sai Teja Anna',NULL),('Digit','wireless charging','2009-10',2014,17,3,17,71,'Tut2.pdf','Dr. Sai Teja Anna',NULL);
/*!40000 ALTER TABLE `journal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project` (
  `title` varchar(50) NOT NULL,
  `sponsor` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` varchar(20) DEFAULT 'ongoing',
  `budget` int(11) NOT NULL,
  `type` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`title`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project`
--

LOCK TABLES `project` WRITE;
/*!40000 ALTER TABLE `project` DISABLE KEYS */;
INSERT INTO `project` VALUES ('Internet of things','DST','2014-08-15','',900000000,'commercial'),('ionic emulsion','Elon Musk','2013-07-25','',12000000,'commercial'),('Liquid hydrogen Storage','Thiel foundation','2012-08-22','',5000000,'commercial'),('Project Portal','IITI','2015-10-07','',100,'Academic'),('Solid lightweight Lubricants','DST','2011-08-22','2013-07-20',25000000,'Mechanical');
/*!40000 ALTER TABLE `project` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `fid` varchar(32) NOT NULL DEFAULT '',
  `password` varchar(50) DEFAULT NULL,
  `name` varchar(32) DEFAULT NULL,
  `email` varchar(32) DEFAULT NULL,
  `phno` varchar(32) DEFAULT NULL,
  `institution` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`fid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('admin','ab8d3aa658cac26fea0a61a52e49e457',NULL,NULL,NULL,NULL),('full','86094b61cb9f63b77f982ceae03e95f0','Edward Elric','edidiot@gmail.com','5566778899','Tokyo School of Alchemy');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-04-06 17:12:45
