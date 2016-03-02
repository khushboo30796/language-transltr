-- MySQL dump 10.13  Distrib 5.5.46, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: portal
-- ------------------------------------------------------
-- Server version	5.5.46-0ubuntu0.14.04.2

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
-- Table structure for table `author_book`
--

DROP TABLE IF EXISTS `author_book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `author_book` (
  `fid` int(11) NOT NULL DEFAULT '0',
  `title` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`fid`,`title`),
  KEY `title` (`title`),
  CONSTRAINT `author_book_ibfk_1` FOREIGN KEY (`fid`) REFERENCES `faculty` (`fid`),
  CONSTRAINT `author_book_ibfk_2` FOREIGN KEY (`title`) REFERENCES `book` (`title`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `author_book`
--

LOCK TABLES `author_book` WRITE;
/*!40000 ALTER TABLE `author_book` DISABLE KEYS */;
INSERT INTO `author_book` VALUES (103,'Governing buisness and relationships'),(101,'harry potter'),(102,'Mechanics of solids'),(103,'Snow white');
/*!40000 ALTER TABLE `author_book` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Table structure for table `author_conf`
--

DROP TABLE IF EXISTS `author_conf`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `author_conf` (
  `fid` int(11) NOT NULL DEFAULT '0',
  `title` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`fid`,`title`),
  KEY `title` (`title`),
  CONSTRAINT `author_conf_ibfk_1` FOREIGN KEY (`fid`) REFERENCES `faculty` (`fid`),
  CONSTRAINT `author_conf_ibfk_2` FOREIGN KEY (`title`) REFERENCES `conference` (`title`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `author_conf`
--

LOCK TABLES `author_conf` WRITE;
/*!40000 ALTER TABLE `author_conf` DISABLE KEYS */;
INSERT INTO `author_conf` VALUES (103,'Cloud Computing'),(101,'heat in computers'),(101,'IITI'),(102,'Quantum computing');
/*!40000 ALTER TABLE `author_conf` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `author_journal`
--

DROP TABLE IF EXISTS `author_journal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `author_journal` (
  `fid` int(11) NOT NULL DEFAULT '0',
  `title` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`fid`,`title`),
  KEY `title` (`title`),
  CONSTRAINT `author_journal_ibfk_1` FOREIGN KEY (`fid`) REFERENCES `faculty` (`fid`),
  CONSTRAINT `author_journal_ibfk_2` FOREIGN KEY (`title`) REFERENCES `journal` (`title`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `author_journal`
--

LOCK TABLES `author_journal` WRITE;
/*!40000 ALTER TABLE `author_journal` DISABLE KEYS */;
INSERT INTO `author_journal` VALUES (102,'coding theory'),(101,'Cryogenic chip fabrication'),(101,'dialects in code'),(102,'how to sloder'),(101,'Lithium ion conjugation'),(102,'why engineering rocks'),(101,'wireless charging');
/*!40000 ALTER TABLE `author_journal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `book`
--

DROP TABLE IF EXISTS `book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `book` (
  `title` varchar(50) NOT NULL,
  `publisher` varchar(50) NOT NULL,
  `pub_year` int(11) NOT NULL,
  `acad_year` varchar(15) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`title`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book`
--

LOCK TABLES `book` WRITE;
/*!40000 ALTER TABLE `book` DISABLE KEYS */;
INSERT INTO `book` VALUES ('Governing buisness and relationships','Harper Collins',2014,'1999','www.guvbiz.com'),('harry potter','bloomsbury',2009,'2009','www.hp.com'),('Mechanics of solids','Wiley uk',2011,'2010-11','www.wileyj.uk'),('Snow white','Harper Collins',2014,'2015','www.disney.com');
/*!40000 ALTER TABLE `book` ENABLE KEYS */;
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
-- Table structure for table `conference`
--

DROP TABLE IF EXISTS `conference`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `conference` (
  `title` varchar(50) NOT NULL,
  `conf_name` varchar(50) NOT NULL,
  `place` varchar(50) NOT NULL,
  `conf_date` date NOT NULL,
  `acad_year` varchar(15) DEFAULT NULL,
  `pg_no` int(11) NOT NULL,
  PRIMARY KEY (`title`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conference`
--

LOCK TABLES `conference` WRITE;
/*!40000 ALTER TABLE `conference` DISABLE KEYS */;
INSERT INTO `conference` VALUES ('Cloud Computing','ACN','Pattaya','2015-09-20','1999',10),('heat in computers','ACN','Pattaya','2014-09-20','2014',98),('IITI','IITI','Indore','2015-10-24','2015',25),('Quantum computing','ACN','Pattaya','2015-09-20','2014',84);
/*!40000 ALTER TABLE `conference` ENABLE KEYS */;
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
-- Table structure for table `invents`
--

DROP TABLE IF EXISTS `invents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invents` (
  `fid` int(11) NOT NULL DEFAULT '0',
  `patent_no` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`fid`,`patent_no`),
  KEY `patent_no` (`patent_no`),
  CONSTRAINT `invents_ibfk_1` FOREIGN KEY (`fid`) REFERENCES `faculty` (`fid`),
  CONSTRAINT `invents_ibfk_2` FOREIGN KEY (`patent_no`) REFERENCES `patents` (`patent_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invents`
--

LOCK TABLES `invents` WRITE;
/*!40000 ALTER TABLE `invents` DISABLE KEYS */;
INSERT INTO `invents` VALUES (101,101),(101,123),(101,132),(102,240),(101,789),(103,1251),(102,2048),(102,3030);
/*!40000 ALTER TABLE `invents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `investigator`
--

DROP TABLE IF EXISTS `investigator`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `investigator` (
  `fid` int(11) NOT NULL DEFAULT '0',
  `title` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`fid`,`title`),
  KEY `title` (`title`),
  CONSTRAINT `investigator_ibfk_1` FOREIGN KEY (`fid`) REFERENCES `faculty` (`fid`),
  CONSTRAINT `investigator_ibfk_2` FOREIGN KEY (`title`) REFERENCES `project` (`title`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `investigator`
--

LOCK TABLES `investigator` WRITE;
/*!40000 ALTER TABLE `investigator` DISABLE KEYS */;
INSERT INTO `investigator` VALUES (102,'Internet of things'),(102,'ionic emulsion'),(102,'Liquid hydrogen Storage'),(101,'Project Portal'),(101,'Solid lightweight Lubricants');
/*!40000 ALTER TABLE `investigator` ENABLE KEYS */;
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
  PRIMARY KEY (`title`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `journal`
--

LOCK TABLES `journal` WRITE;
/*!40000 ALTER TABLE `journal` DISABLE KEYS */;
INSERT INTO `journal` VALUES ('Digit','coding theory','2012-13',2015,4,4,28,30,'Tut1.pdf'),('ACP','Cryogenic chip fabrication','2012-13',2015,3,5,12,14,'Tut2.pdf'),('Engineering','dialects in code','2014-15',2015,2,1,1,600,'Tut3.pdf'),('PCB','how to sloder','2014-15',2014,1,2,78,89,'tut-4.pdf'),('IEEE','Lithium ion conjugation','2012-13',2015,5,6,31,32,'tut-5.pdf'),('ACM','why engineering rocks','2010-12',2014,1,12,23,29,'Tut1.pdf'),('Digit','wireless charging','2009-10',2014,17,3,17,71,'Tut2.pdf');
/*!40000 ALTER TABLE `journal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `patents`
--

DROP TABLE IF EXISTS `patents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `patents` (
  `title` varchar(50) NOT NULL,
  `patent_no` int(11) NOT NULL DEFAULT '0',
  `pub_date` date NOT NULL,
  `acad_year` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`patent_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patents`
--

LOCK TABLES `patents` WRITE;
/*!40000 ALTER TABLE `patents` DISABLE KEYS */;
INSERT INTO `patents` VALUES ('project portal',101,'2015-10-24','2015-2016'),('blah',123,'2015-09-14','2013-14'),('Automated Sewing machine',132,'2015-09-14','2013-14'),('Hover Board',240,'2014-01-23','2012-13'),('abc',789,'2015-09-21','2013-15'),('palmtop',1251,'2015-12-25','2013-14'),('snow in a can',2048,'2015-09-14','2014-15'),('robocheetah',3030,'2015-03-12','2013-14');
/*!40000 ALTER TABLE `patents` ENABLE KEYS */;
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
  `fid` int(11) NOT NULL DEFAULT '0',
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`fid`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`fid`) REFERENCES `faculty` (`fid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (101,'stud'),(102,'astro'),(103,'purple');
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

-- Dump completed on 2016-03-01  1:36:02
