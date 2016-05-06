
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
