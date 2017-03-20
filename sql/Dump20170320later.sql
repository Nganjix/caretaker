-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: caretaker
-- ------------------------------------------------------
-- Server version	5.7.17-log

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
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accounts` (
  `accId` int(11) NOT NULL AUTO_INCREMENT,
  `accName` varchar(25) NOT NULL,
  `accDesc` varchar(50) DEFAULT NULL,
  `accDateCreated` datetime DEFAULT NULL,
  `accDateModified` datetime DEFAULT NULL,
  PRIMARY KEY (`accId`),
  UNIQUE KEY `accName_UNIQUE` (`accName`),
  UNIQUE KEY `accName` (`accName`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accounts`
--

LOCK TABLES `accounts` WRITE;
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
INSERT INTO `accounts` VALUES (2,'MLP001','mpesa account','2017-02-12 00:00:00','2017-02-12 00:00:00'),(3,'ML002','Mpesa two','2017-02-12 00:00:00','2017-02-12 00:00:00');
/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `apartment`
--

DROP TABLE IF EXISTS `apartment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `apartment` (
  `aprtId` int(11) NOT NULL AUTO_INCREMENT,
  `aprtName` varchar(25) NOT NULL,
  `aprtDesc` varchar(45) DEFAULT NULL,
  `accId` int(11) NOT NULL,
  `tenantId` int(11) DEFAULT NULL,
  `blockId` int(11) DEFAULT NULL,
  `costPerMonth` decimal(20,2) NOT NULL,
  `waterBill` int(11) DEFAULT NULL,
  `elecBill` int(11) DEFAULT NULL,
  `additionalCost` decimal(10,0) DEFAULT NULL,
  `dtstamp` int(15) DEFAULT NULL,
  `dateModified` int(15) DEFAULT NULL,
  PRIMARY KEY (`aprtId`),
  UNIQUE KEY `aprtName_UNIQUE` (`aprtName`),
  UNIQUE KEY `aprtName` (`aprtName`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apartment`
--

LOCK TABLES `apartment` WRITE;
/*!40000 ALTER TABLE `apartment` DISABLE KEYS */;
INSERT INTO `apartment` VALUES (5,'gghhgh','ghffrf5_update',2,1,2,566455.00,555,111,15576,1487273647,1489348495);
/*!40000 ALTER TABLE `apartment` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`dev`@`%`*/ /*!50003 TRIGGER before_apartment_insert
BEFORE INSERT ON apartment 
FOR EACH ROW
BEGIN
SET NEW.dtstamp = UNIX_TIMESTAMP(NOW()); 
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`dev`@`%`*/ /*!50003 TRIGGER before_apartment_update
BEFORE UPDATE ON apartment 
FOR EACH ROW
BEGIN
set NEW.dateModified = UNIX_TIMESTAMP(NOW());
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `blocks`
--

DROP TABLE IF EXISTS `blocks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blocks` (
  `blockId` int(11) NOT NULL AUTO_INCREMENT,
  `blockName` varchar(25) NOT NULL,
  `blockDesc` varchar(45) DEFAULT NULL,
  `estateId` int(11) DEFAULT NULL,
  `dtstamp` int(15) NOT NULL,
  `dateModified` int(15) DEFAULT NULL,
  PRIMARY KEY (`blockId`),
  UNIQUE KEY `blockName_UNIQUE` (`blockName`),
  UNIQUE KEY `blockName` (`blockName`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blocks`
--

LOCK TABLES `blocks` WRITE;
/*!40000 ALTER TABLE `blocks` DISABLE KEYS */;
INSERT INTO `blocks` VALUES (1,'Block Z34','continuation of block 33',6,54654,1489926271),(3,'Block C','the 8 floors block',6,1489917697,NULL),(4,'Block K','setup of block K',6,1489917767,1489926308);
/*!40000 ALTER TABLE `blocks` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`dev`@`%`*/ /*!50003 TRIGGER before_blocks_insert
BEFORE INSERT ON blocks
FOR EACH ROW
BEGIN
SET NEW.dtstamp = UNIX_TIMESTAMP(NOW()); 
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`dev`@`%`*/ /*!50003 TRIGGER before_blocks_update
BEFORE UPDATE ON blocks 
FOR EACH ROW
BEGIN
set NEW.datemodified= UNIX_TIMESTAMP(NOW());
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `c2bvalidate`
--

DROP TABLE IF EXISTS `c2bvalidate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `c2bvalidate` (
  `localTransId` int(11) NOT NULL AUTO_INCREMENT,
  `transType` varchar(15) DEFAULT NULL,
  `transID` int(11) DEFAULT NULL,
  `transTime` datetime DEFAULT NULL,
  `transAmount` decimal(20,2) DEFAULT NULL,
  `businessShortCode` varchar(15) DEFAULT NULL,
  `billRefNumber` varchar(30) DEFAULT NULL,
  `invoiceNumber` varchar(30) DEFAULT NULL,
  `msisdn` int(11) DEFAULT NULL,
  `firstName` varchar(15) DEFAULT NULL,
  `middleName` varchar(15) DEFAULT NULL,
  `lastName` varchar(15) DEFAULT NULL,
  `firstName1` varchar(15) DEFAULT NULL,
  `secondName2` varchar(15) DEFAULT NULL,
  `lastName3` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`localTransId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `c2bvalidate`
--

LOCK TABLES `c2bvalidate` WRITE;
/*!40000 ALTER TABLE `c2bvalidate` DISABLE KEYS */;
/*!40000 ALTER TABLE `c2bvalidate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `c2bvalidateandconfirm`
--

DROP TABLE IF EXISTS `c2bvalidateandconfirm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `c2bvalidateandconfirm` (
  `localTransId` int(11) NOT NULL AUTO_INCREMENT,
  `transType` varchar(15) DEFAULT NULL,
  `transID` int(11) DEFAULT NULL,
  `transTime` datetime DEFAULT NULL,
  `transAmount` decimal(20,2) DEFAULT NULL,
  `businessShortCode` varchar(15) DEFAULT NULL,
  `billRefNumber` varchar(30) DEFAULT NULL,
  `invoiceNumber` varchar(30) DEFAULT NULL,
  `msisdn` int(11) DEFAULT NULL,
  `firstName` varchar(15) DEFAULT NULL,
  `middleName` varchar(15) DEFAULT NULL,
  `lastName` varchar(15) DEFAULT NULL,
  `firstName1` varchar(15) DEFAULT NULL,
  `secondName2` varchar(15) DEFAULT NULL,
  `lastName3` varchar(15) DEFAULT NULL,
  `isValidate` bit(1) DEFAULT NULL,
  PRIMARY KEY (`localTransId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `c2bvalidateandconfirm`
--

LOCK TABLES `c2bvalidateandconfirm` WRITE;
/*!40000 ALTER TABLE `c2bvalidateandconfirm` DISABLE KEYS */;
/*!40000 ALTER TABLE `c2bvalidateandconfirm` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `codes`
--

DROP TABLE IF EXISTS `codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `codes` (
  `resultCode` int(11) NOT NULL,
  `resultDesc` varchar(40) DEFAULT NULL,
  `thirdPartyTransID` int(11) DEFAULT NULL,
  PRIMARY KEY (`resultCode`),
  UNIQUE KEY `resultDesc_UNIQUE` (`resultDesc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `codes`
--

LOCK TABLES `codes` WRITE;
/*!40000 ALTER TABLE `codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `codes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company` (
  `companyId` int(11) NOT NULL AUTO_INCREMENT,
  `companyName` varchar(80) NOT NULL,
  `vatPinId` varchar(20) DEFAULT NULL,
  `systemEmail` varchar(25) DEFAULT NULL,
  `contactPerson` varchar(45) DEFAULT NULL,
  `telephone` int(11) DEFAULT NULL,
  `mainLocation` varchar(25) DEFAULT NULL,
  `postalAddress` varchar(25) DEFAULT NULL,
  `mpesaNoId` varchar(25) DEFAULT NULL,
  `logoname` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`companyId`),
  UNIQUE KEY `companyName_UNIQUE` (`companyName`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company`
--

LOCK TABLES `company` WRITE;
/*!40000 ALTER TABLE `company` DISABLE KEYS */;
INSERT INTO `company` VALUES (2,'Smart Flats Inc','P9878364','info@smart.com','Johny',764527722,'Ibo','623','M09484483','1490003705_pisa_reg_details.PNG');
/*!40000 ALTER TABLE `company` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estates`
--

DROP TABLE IF EXISTS `estates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estates` (
  `estateId` int(11) NOT NULL AUTO_INCREMENT,
  `estateName` varchar(45) NOT NULL,
  `estateDesc` varchar(100) DEFAULT NULL,
  `estateLocation` varchar(45) DEFAULT NULL,
  `dtstamp` int(11) DEFAULT NULL,
  `datemodified` int(11) DEFAULT NULL,
  PRIMARY KEY (`estateId`),
  UNIQUE KEY `estateName_UNIQUE` (`estateName`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estates`
--

LOCK TABLES `estates` WRITE;
/*!40000 ALTER TABLE `estates` DISABLE KEYS */;
INSERT INTO `estates` VALUES (1,'Ruaraka','2 bedroom highrise apartments','Ruaraka',NULL,NULL),(6,'Karen','2nd estate main street road','Karen Main Road',NULL,NULL);
/*!40000 ALTER TABLE `estates` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`dev`@`%`*/ /*!50003 TRIGGER before_estates_insert
BEFORE INSERT ON estates
FOR EACH ROW
BEGIN
SET NEW.dtstamp = UNIX_TIMESTAMP(NOW()); 
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`dev`@`%`*/ /*!50003 TRIGGER before_estates_update
BEFORE UPDATE ON estates 
FOR EACH ROW
BEGIN
set NEW.datemodified= UNIX_TIMESTAMP(NOW());
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `ftptrans`
--

DROP TABLE IF EXISTS `ftptrans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ftptrans` (
  `ftpDocId` int(11) NOT NULL AUTO_INCREMENT,
  `docName` varchar(45) NOT NULL,
  `docDtstamp` varchar(45) DEFAULT NULL,
  `receiptNo` varchar(45) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `details` varchar(60) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `withdrawAmount` decimal(20,2) DEFAULT NULL,
  `paidInAmount` decimal(20,2) DEFAULT NULL,
  `balance` decimal(20,2) DEFAULT NULL,
  `balanceConfirmed` decimal(20,2) DEFAULT NULL,
  `transactionType` varchar(45) DEFAULT NULL,
  `otherPartyInfo` varchar(45) DEFAULT NULL,
  `transactionPartyDetails` varchar(45) DEFAULT NULL,
  `transactionId` varchar(45) DEFAULT NULL,
  `remark` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ftpDocId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ftptrans`
--

LOCK TABLES `ftptrans` WRITE;
/*!40000 ALTER TABLE `ftptrans` DISABLE KEYS */;
/*!40000 ALTER TABLE `ftptrans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `loginDtstamp` int(11) NOT NULL,
  `logoutDtstamp` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `userIp` varchar(20) DEFAULT NULL,
  `session` varchar(55) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES (5,1476965553,1476965555,1,'192.168.0.2','rg928or7tud3fiivteuj1u9vj4'),(6,1476966883,1476967928,1,'192.168.0.2','rg928or7tud3fiivteuj1u9vj4'),(7,1476983372,NULL,2,'192.168.0.2','vm96v1p85ui0hn48dflt3bkmq1'),(8,1477074184,1477074354,1,'::1','nce5ep9aiil4a0ks23a9rl53h1'),(9,1477074406,NULL,1,'::1','nce5ep9aiil4a0ks23a9rl53h1'),(10,1477083661,NULL,1,'::1','nce5ep9aiil4a0ks23a9rl53h1'),(11,1477167792,NULL,1,'192.168.0.2','8h9tre9aomga8hoil6cps3jqh2'),(12,1477217086,NULL,2,'192.168.0.2','oes0sup7q04udof0a4hjhc3lt0'),(13,1477243653,1477258936,1,'::1','mp2vclo2u8giqs5o2n1jruukp3'),(14,1477427684,NULL,2,'192.168.0.2','ag9kuq81rdcfpj3eekk319hb06'),(15,1477499168,1477510325,1,'192.168.0.2','n3s0kuijbehh5550ddlr3tn0i4'),(16,1477510335,1477510346,2,'192.168.0.2','n3s0kuijbehh5550ddlr3tn0i4'),(17,1477510356,NULL,2,'192.168.0.2','n3s0kuijbehh5550ddlr3tn0i4'),(18,1477510545,NULL,1,'192.168.0.2','1s9g9iq3gaq5nlg4h4ti6jam63'),(19,1477596425,NULL,1,'192.168.0.2','rq7u5nm2nr5spdqt9mvn9n93s1'),(20,1477771206,1477771211,2,'192.168.0.2','90gfnd2vmcio6ijlod8kv2cqi1'),(21,1477771530,NULL,1,'192.168.0.2','90gfnd2vmcio6ijlod8kv2cqi1'),(22,1477771680,NULL,1,'192.168.0.2','vli2hbvjbubpmgbtd494dlp8m2'),(23,1477771986,NULL,1,'192.168.0.2',''),(24,1477773799,1477810940,1,'192.168.0.2','8bdmo2kjb1nscmkg1krbn72gc5'),(25,1477810961,NULL,2,'192.168.0.2','8bdmo2kjb1nscmkg1krbn72gc5'),(26,1477836264,NULL,1,'192.168.0.2','mu7pael80uo1k6fm9kqpoicap0'),(27,1478105685,NULL,2,'192.168.0.2','b6nau5tltr2ka770bj7p22f4b2'),(28,1478189706,NULL,1,'192.168.0.2','tcm67avssrih3mqmb9dnaf3e13'),(29,1479150071,1479158473,1,'192.168.0.2','v59ddcukor8sjqjvqurr49ikb3'),(30,1479318600,NULL,2,'192.168.0.2','kdkp9afrrffanalo5hcihhb2u1'),(31,1479319093,NULL,1,'192.168.0.2','bt0tgtpf7rease50n1p1svcts7'),(32,1479631595,NULL,2,'192.168.0.2','v15392o87tjm8kjdtc4c57qem0'),(33,1479647439,1479653380,1,'192.168.0.2','v15392o87tjm8kjdtc4c57qem0'),(34,1479653387,NULL,2,'192.168.0.2','v15392o87tjm8kjdtc4c57qem0'),(35,1479654687,1479655856,1,'192.168.0.2','9d50bc48ea6vtv3bvt568oafs1'),(36,1480007386,NULL,2,'192.168.0.2','nd3ro6pcss07pkbi5igdcc0j37'),(37,1480092349,1480133635,2,'192.168.0.2','iveo9r18ls3igs8vg9ifrg0hn1'),(38,1480439952,NULL,2,'192.168.0.1','bq3pq6a7mejtujfj1cdphiaj71'),(39,1485456424,1485456521,2,'192.168.0.3','iai0ne0uojqqa8a357lua3dtu7'),(40,1486497976,NULL,2,'::1','vm4gbiof6fgtr01ilgl51l07c3'),(41,1486500376,NULL,2,'::1','oclce6get3ulkceh68mj72jt82'),(42,1486500909,NULL,2,'192.168.0.2','9stl4honfthd6c3nk3pb6l39b0'),(43,1486501141,NULL,2,'192.168.0.2','p580mrsucvjcu914ult0m97br5'),(44,1486883408,NULL,2,'192.168.0.2','o529p6r4m435ukkks1n6o8e8h6'),(45,1486903757,NULL,2,'192.168.0.2','fb2lcajpgvei50uuoa8chqgf40'),(46,1487005968,1487018211,2,'192.168.0.2','66438b1rs3umn49ja58ffbt9s4'),(47,1487097837,1487101823,2,'192.168.0.2','2v091ssahgmrpocpsffkmcpjd0'),(48,1487101867,1487102174,2,'192.168.0.2','2v091ssahgmrpocpsffkmcpjd0'),(49,1487102595,1487105917,2,'192.168.0.2','2v091ssahgmrpocpsffkmcpjd0'),(50,1487105970,1487106013,1,'192.168.0.2','2v091ssahgmrpocpsffkmcpjd0'),(51,1487179986,1487197393,1,'192.168.0.2','tf4mm78r9kmgrmbkd91s1r0e94'),(52,1487267104,1487275089,1,'192.168.0.2','rr7jeqm1np4s305is6577otcr6'),(53,1488650082,1488650121,2,'192.168.0.2','dmdtf4v40dk5skcq8ao8n71en5'),(54,1488650150,NULL,2,'192.168.0.2','dmdtf4v40dk5skcq8ao8n71en5'),(55,1488652176,NULL,1,'192.168.0.2','tg3bsp9jp5j722dkq7u062etm6'),(56,1488729072,1488747856,2,'192.168.0.2','39m2b41dht2rb7imv7sqtprj21'),(57,1488747014,1488747920,2,'::1','kno4hi4ukcoo5l0e3iuo42kf95'),(58,1488828201,NULL,2,'192.168.0.2','9ls220ckai6e1lf8665m1agr12'),(59,1489080808,1489081963,2,'192.168.0.2','hahm3uv5tf6dbpfc1kbq4r9lr2'),(60,1489082080,NULL,2,'192.168.0.2','hahm3uv5tf6dbpfc1kbq4r9lr2'),(61,1489248031,1489270253,2,'192.168.0.2','298u9vihrkvmq5k9v4p92jvn56'),(62,1489270265,1489270415,2,'192.168.0.2','298u9vihrkvmq5k9v4p92jvn56'),(63,1489270422,1489270429,2,'192.168.0.2','298u9vihrkvmq5k9v4p92jvn56'),(64,1489270436,NULL,2,'192.168.0.2','298u9vihrkvmq5k9v4p92jvn56'),(65,1489314569,NULL,2,'192.168.0.2','v76b0obo8agu3rbhjs87q9n4f3'),(66,1489325435,1489338549,1,'::1','rml0v5bntuec4tls9r4lee39q0'),(67,1489340676,NULL,2,'192.168.0.2','r2avqcgv17lbq6krjtigibqgu2'),(68,1489431168,1489484691,2,'192.168.0.2','ijlm8gjr2skdvggt40ja04s3o7'),(69,1489484719,NULL,3,'192.168.0.2','ijlm8gjr2skdvggt40ja04s3o7'),(70,1489486375,NULL,3,'192.168.0.2','f3gk1bt54lkdhk7qokt57qbhc4'),(71,1489524536,NULL,3,'192.168.0.2','63lej17mkp0lf1tq50lefush50'),(72,1489549191,NULL,3,'192.168.0.2','aab8fovl1rr5471pb3fd6q53e5'),(73,1489551488,NULL,3,'192.168.0.2','lbu68qple7irag6l57snqlfna1'),(74,1489604343,NULL,3,'192.168.0.2','j2q7rb04samerh8r5pgsn6k7h2'),(75,1489604481,NULL,3,'192.168.0.1','4skoj4fgf82g92p14ql1g70h22'),(76,1489660397,NULL,3,'192.168.0.2','v4kro907f07ldvam4mtjintq46'),(77,1489676139,NULL,3,'192.168.0.2','ec0iqbd3m80la54jf7u29gor33'),(78,1489726212,NULL,3,'192.168.0.2','c158jj59j64sch5tn9d4o9c904'),(79,1489743406,NULL,3,'192.168.0.2','5drhfmo5beoic2k59jhbooq3f2'),(80,1489771171,NULL,3,'192.168.0.2','r8153bvj34gr3bjscnlra4ehp5'),(81,1489815000,1489831139,3,'192.168.0.2','f5vl1rmrusid22eqqtse43qee6'),(82,1489839214,NULL,3,'192.168.0.2','f5vl1rmrusid22eqqtse43qee6'),(83,1489867310,1489924189,3,'192.168.0.2','uovf9nt69fnjsq195alcbvv0n7'),(84,1489924208,NULL,3,'192.168.0.2','uovf9nt69fnjsq195alcbvv0n7'),(85,1489924364,NULL,3,'192.168.0.2','ausc54kk9oh2u26uv63mm6kdk0'),(86,1489987539,NULL,3,'192.168.0.2','7hf66in633of932akfm03vjil7'),(87,1490013500,NULL,3,'::1','6562hjtk6t4blclpvk3jf6vdb5');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notficationtemplates`
--

DROP TABLE IF EXISTS `notficationtemplates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notficationtemplates` (
  `notficationId` int(11) NOT NULL AUTO_INCREMENT,
  `notfication` varchar(20) NOT NULL,
  `subject` varchar(25) DEFAULT NULL,
  `message` varchar(100) NOT NULL,
  `footer` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`notficationId`),
  UNIQUE KEY `notfication_UNIQUE` (`notfication`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notficationtemplates`
--

LOCK TABLES `notficationtemplates` WRITE;
/*!40000 ALTER TABLE `notficationtemplates` DISABLE KEYS */;
/*!40000 ALTER TABLE `notficationtemplates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paymentperiods`
--

DROP TABLE IF EXISTS `paymentperiods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paymentperiods` (
  `paymentPeriodId` int(11) NOT NULL AUTO_INCREMENT,
  `periodName` varchar(45) DEFAULT NULL,
  `periodDesc` varchar(45) DEFAULT NULL,
  `startDate` datetime DEFAULT NULL,
  `endDate` datetime DEFAULT NULL,
  PRIMARY KEY (`paymentPeriodId`),
  UNIQUE KEY `periodName_UNIQUE` (`periodName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paymentperiods`
--

LOCK TABLES `paymentperiods` WRITE;
/*!40000 ALTER TABLE `paymentperiods` DISABLE KEYS */;
/*!40000 ALTER TABLE `paymentperiods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payments` (
  `paymentsId` int(11) NOT NULL AUTO_INCREMENT,
  `isMpesa` bit(1) NOT NULL,
  `isDeposit` bit(1) NOT NULL,
  `localTransId` int(11) DEFAULT NULL,
  `accid` int(11) DEFAULT NULL,
  `tenantId` int(11) DEFAULT NULL,
  `phoneNo` int(11) DEFAULT NULL,
  `paymentAmount` decimal(20,2) NOT NULL,
  `transDtstamp` datetime DEFAULT NULL,
  `modifiedDtstamp` datetime DEFAULT NULL,
  `isValid` bit(1) DEFAULT NULL,
  `notificationSent` bit(1) DEFAULT NULL,
  `paymentPeriod` int(11) DEFAULT NULL,
  PRIMARY KEY (`paymentsId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL DEFAULT 'Guest',
  `roles` json DEFAULT NULL,
  `dtstamp` int(11) NOT NULL,
  `datemodified` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`dev`@`%`*/ /*!50003 TRIGGER before_roles_insert
BEFORE INSERT ON roles 
FOR EACH ROW
BEGIN
SET NEW.dtstamp = UNIX_TIMESTAMP(NOW()); 
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`dev`@`%`*/ /*!50003 TRIGGER before_roles_update
BEFORE UPDATE ON roles 
FOR EACH ROW
BEGIN
set NEW.datemodified = UNIX_TIMESTAMP(NOW());
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `screens`
--

DROP TABLE IF EXISTS `screens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `screens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `desc` varchar(60) DEFAULT NULL,
  `langtype` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `screens`
--

LOCK TABLES `screens` WRITE;
/*!40000 ALTER TABLE `screens` DISABLE KEYS */;
INSERT INTO `screens` VALUES (1,'accounts',NULL,'php'),(2,'apartment',NULL,'php'),(3,'blocks',NULL,'php'),(4,'company',NULL,'php'),(5,'estates',NULL,'php'),(6,'index',NULL,'php'),(7,'validate',NULL,'php'),(8,'notifications',NULL,'php'),(9,'notificationtemplates',NULL,'php'),(10,'paymentperiods',NULL,'php'),(11,'profile',NULL,'php'),(12,'reports',NULL,'php'),(13,'roles',NULL,'php'),(14,'template',NULL,'php'),(15,'tenant',NULL,'php'),(16,'transactions',NULL,'php'),(17,'users',NULL,'php');
/*!40000 ALTER TABLE `screens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tenant`
--

DROP TABLE IF EXISTS `tenant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tenant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(15) NOT NULL,
  `secondName` varchar(15) NOT NULL,
  `lastName` varchar(15) DEFAULT NULL,
  `idNumber` int(11) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `email` varchar(25) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `boardingDate` bigint(20) NOT NULL,
  `isPaymentPeriods` bit(1) DEFAULT NULL,
  `paymentPeriodId` int(11) DEFAULT NULL,
  `paymentPhoneNo1` int(11) DEFAULT NULL,
  `paymentPhoneNo2` int(11) DEFAULT NULL,
  `nextOfKinFname` varchar(15) NOT NULL,
  `nextOfKinSname` varchar(15) NOT NULL,
  `nextOfKinIdNo` int(11) NOT NULL,
  `nextOfKinPhoneId` int(11) NOT NULL,
  `depositNumber` decimal(20,2) DEFAULT NULL,
  `currentAmount` decimal(20,2) DEFAULT NULL,
  `address` varchar(60) DEFAULT NULL,
  `pinvatno` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `idNumber` (`idNumber`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tenant`
--

LOCK TABLES `tenant` WRITE;
/*!40000 ALTER TABLE `tenant` DISABLE KEYS */;
INSERT INTO `tenant` VALUES (1,'Saturn','doejahz',NULL,554445,1,'lol@gmail.com',0,1477947600000,NULL,NULL,65,7867,'mhj','h',76577,76599,500.00,NULL,NULL,NULL),(2,'John','Hancock',NULL,5687,1,'get@gmail.com',1,1479070800000,NULL,NULL,767665,9877777,'Mantra','Lolhjhh',987666,6554434,1200.00,NULL,NULL,NULL);
/*!40000 ALTER TABLE `tenant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test`
--

DROP TABLE IF EXISTS `test`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `infor` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test`
--

LOCK TABLES `test` WRITE;
/*!40000 ALTER TABLE `test` DISABLE KEYS */;
INSERT INTO `test` VALUES (1,'james','james','burrrrrrrrrrrrrrrrrrrrrrrrrrrrrr'),(2,'john','john','burrrrrrrrrrrrrrrrrrrrrrrrrrrrrr');
/*!40000 ALTER TABLE `test` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userdetails`
--

DROP TABLE IF EXISTS `userdetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userdetails` (
  `detailsId` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(15) DEFAULT NULL,
  `secondName` varchar(15) DEFAULT NULL,
  `lastName` varchar(15) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `postalAddress` varchar(45) DEFAULT NULL,
  `idNo` int(11) DEFAULT NULL,
  `roleId` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `position` varchar(60) DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT NULL,
  `profilePhoto` varchar(80) DEFAULT NULL,
  `dtstamp` int(11) NOT NULL,
  `datemodified` int(11) DEFAULT NULL,
  PRIMARY KEY (`detailsId`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userdetails`
--

LOCK TABLES `userdetails` WRITE;
/*!40000 ALTER TABLE `userdetails` DISABLE KEYS */;
INSERT INTO `userdetails` VALUES (12,'John','Mackenzie','Bob','f@gmail.com',56465676,'23 Ken Street',345435,1,3,NULL,1,'1489830543_pisa_reg_details.PNG',1489830543,NULL);
/*!40000 ALTER TABLE `userdetails` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`dev`@`%`*/ /*!50003 TRIGGER before_userdetails_insert
BEFORE INSERT ON userdetails 
FOR EACH ROW
BEGIN
SET NEW.dtstamp = UNIX_TIMESTAMP(NOW()); 
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`dev`@`%`*/ /*!50003 TRIGGER before_userdetails_update
BEFORE UPDATE ON userdetails 
FOR EACH ROW
BEGIN
set NEW.datemodified= UNIX_TIMESTAMP(NOW());
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(70) DEFAULT NULL,
  `createdDtstamp` int(11) DEFAULT NULL,
  `modifiedDtstamp` int(11) DEFAULT NULL,
  PRIMARY KEY (`userid`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (3,'james','$2y$10$8sF34.FSmAJbm4PLiP07PeukCNMxWYNR4RcQIx/UpgHQ7G0TqU.3a',1489484578,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`dev`@`%`*/ /*!50003 TRIGGER before_users_insert
BEFORE INSERT ON users 
FOR EACH ROW
BEGIN
SET NEW.createdDtstamp = UNIX_TIMESTAMP(NOW()); 
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`dev`@`%`*/ /*!50003 TRIGGER before_users_update
BEFORE UPDATE ON users 
FOR EACH ROW
BEGIN
set NEW.modifiedDtstamp = UNIX_TIMESTAMP(NOW());
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Dumping events for database 'caretaker'
--

--
-- Dumping routines for database 'caretaker'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-03-20 20:09:22
