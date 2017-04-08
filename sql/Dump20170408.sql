-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: caretaker
-- ------------------------------------------------------
-- Server version	5.7.14

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
  `active` tinyint(1) NOT NULL,
  `accDateCreated` datetime DEFAULT NULL,
  `accDateModified` datetime DEFAULT NULL,
  PRIMARY KEY (`accId`),
  UNIQUE KEY `accName_UNIQUE` (`accName`),
  UNIQUE KEY `accName` (`accName`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accounts`
--

LOCK TABLES `accounts` WRITE;
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
INSERT INTO `accounts` VALUES (2,'MLP001','mpesa account devel',1,'2017-02-12 00:00:00','2017-02-12 00:00:00'),(4,'KCB 47477hghHHDJ#','this is a test message ooooh',0,NULL,NULL),(6,'Victoria Bank','test bank victoria of africa',1,NULL,NULL);
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
INSERT INTO `apartment` VALUES (5,'gghhgh','ghffrf5_update yaaay',2,1,3,566455.00,555,111,15576,1487273647,1490560541);
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
INSERT INTO `blocks` VALUES (1,'Block Z34','continuation of block 33',6,54654,1489926271),(3,'Block C','the 8 floors blockl',6,1489917697,1490557549),(4,'Block K','setup of block Kilo',6,1489917767,1490560580);
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
-- Table structure for table `cumulativepayments`
--

DROP TABLE IF EXISTS `cumulativepayments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cumulativepayments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `paymentperiod` int(11) NOT NULL,
  `tenantid` int(11) DEFAULT NULL,
  `cumullamt` decimal(25,0) NOT NULL DEFAULT '0',
  `eleccost` decimal(25,0) NOT NULL DEFAULT '0',
  `watercost` decimal(25,0) NOT NULL DEFAULT '0',
  `extracosts` decimal(25,0) NOT NULL DEFAULT '0',
  `datecreated` int(11) DEFAULT NULL,
  `datemodified` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cumulativepayments`
--

LOCK TABLES `cumulativepayments` WRITE;
/*!40000 ALTER TABLE `cumulativepayments` DISABLE KEYS */;
/*!40000 ALTER TABLE `cumulativepayments` ENABLE KEYS */;
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
/*!50003 CREATE*/ /*!50017 DEFINER=`dev`@`%`*/ /*!50003 TRIGGER before_cumulativepayments_insert
BEFORE INSERT ON cumulativepayments
FOR EACH ROW
BEGIN
SET NEW.datecreated = UNIX_TIMESTAMP(NOW()); 
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
/*!50003 CREATE*/ /*!50017 DEFINER=`dev`@`%`*/ /*!50003 TRIGGER before_cumulativepayments_update
BEFORE UPDATE ON cumulativepayments 
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
INSERT INTO `estates` VALUES (1,'Ruaraka','2 bedroom highrise apartments pop','Ruaraka',NULL,1490560735),(6,'Karen','2nd estate main street road','Karen Main Road',NULL,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=191 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES (5,1476965553,1476965555,1,'192.168.0.2','rg928or7tud3fiivteuj1u9vj4'),(6,1476966883,1476967928,1,'192.168.0.2','rg928or7tud3fiivteuj1u9vj4'),(7,1476983372,NULL,2,'192.168.0.2','vm96v1p85ui0hn48dflt3bkmq1'),(8,1477074184,1477074354,1,'::1','nce5ep9aiil4a0ks23a9rl53h1'),(9,1477074406,NULL,1,'::1','nce5ep9aiil4a0ks23a9rl53h1'),(10,1477083661,NULL,1,'::1','nce5ep9aiil4a0ks23a9rl53h1'),(11,1477167792,NULL,1,'192.168.0.2','8h9tre9aomga8hoil6cps3jqh2'),(12,1477217086,NULL,2,'192.168.0.2','oes0sup7q04udof0a4hjhc3lt0'),(13,1477243653,1477258936,1,'::1','mp2vclo2u8giqs5o2n1jruukp3'),(14,1477427684,NULL,2,'192.168.0.2','ag9kuq81rdcfpj3eekk319hb06'),(15,1477499168,1477510325,1,'192.168.0.2','n3s0kuijbehh5550ddlr3tn0i4'),(16,1477510335,1477510346,2,'192.168.0.2','n3s0kuijbehh5550ddlr3tn0i4'),(17,1477510356,NULL,2,'192.168.0.2','n3s0kuijbehh5550ddlr3tn0i4'),(18,1477510545,NULL,1,'192.168.0.2','1s9g9iq3gaq5nlg4h4ti6jam63'),(19,1477596425,NULL,1,'192.168.0.2','rq7u5nm2nr5spdqt9mvn9n93s1'),(20,1477771206,1477771211,2,'192.168.0.2','90gfnd2vmcio6ijlod8kv2cqi1'),(21,1477771530,NULL,1,'192.168.0.2','90gfnd2vmcio6ijlod8kv2cqi1'),(22,1477771680,NULL,1,'192.168.0.2','vli2hbvjbubpmgbtd494dlp8m2'),(23,1477771986,NULL,1,'192.168.0.2',''),(24,1477773799,1477810940,1,'192.168.0.2','8bdmo2kjb1nscmkg1krbn72gc5'),(25,1477810961,NULL,2,'192.168.0.2','8bdmo2kjb1nscmkg1krbn72gc5'),(26,1477836264,NULL,1,'192.168.0.2','mu7pael80uo1k6fm9kqpoicap0'),(27,1478105685,NULL,2,'192.168.0.2','b6nau5tltr2ka770bj7p22f4b2'),(28,1478189706,NULL,1,'192.168.0.2','tcm67avssrih3mqmb9dnaf3e13'),(29,1479150071,1479158473,1,'192.168.0.2','v59ddcukor8sjqjvqurr49ikb3'),(30,1479318600,NULL,2,'192.168.0.2','kdkp9afrrffanalo5hcihhb2u1'),(31,1479319093,NULL,1,'192.168.0.2','bt0tgtpf7rease50n1p1svcts7'),(32,1479631595,NULL,2,'192.168.0.2','v15392o87tjm8kjdtc4c57qem0'),(33,1479647439,1479653380,1,'192.168.0.2','v15392o87tjm8kjdtc4c57qem0'),(34,1479653387,NULL,2,'192.168.0.2','v15392o87tjm8kjdtc4c57qem0'),(35,1479654687,1479655856,1,'192.168.0.2','9d50bc48ea6vtv3bvt568oafs1'),(36,1480007386,NULL,2,'192.168.0.2','nd3ro6pcss07pkbi5igdcc0j37'),(37,1480092349,1480133635,2,'192.168.0.2','iveo9r18ls3igs8vg9ifrg0hn1'),(38,1480439952,NULL,2,'192.168.0.1','bq3pq6a7mejtujfj1cdphiaj71'),(39,1485456424,1485456521,2,'192.168.0.3','iai0ne0uojqqa8a357lua3dtu7'),(40,1486497976,NULL,2,'::1','vm4gbiof6fgtr01ilgl51l07c3'),(41,1486500376,NULL,2,'::1','oclce6get3ulkceh68mj72jt82'),(42,1486500909,NULL,2,'192.168.0.2','9stl4honfthd6c3nk3pb6l39b0'),(43,1486501141,NULL,2,'192.168.0.2','p580mrsucvjcu914ult0m97br5'),(44,1486883408,NULL,2,'192.168.0.2','o529p6r4m435ukkks1n6o8e8h6'),(45,1486903757,NULL,2,'192.168.0.2','fb2lcajpgvei50uuoa8chqgf40'),(46,1487005968,1487018211,2,'192.168.0.2','66438b1rs3umn49ja58ffbt9s4'),(47,1487097837,1487101823,2,'192.168.0.2','2v091ssahgmrpocpsffkmcpjd0'),(48,1487101867,1487102174,2,'192.168.0.2','2v091ssahgmrpocpsffkmcpjd0'),(49,1487102595,1487105917,2,'192.168.0.2','2v091ssahgmrpocpsffkmcpjd0'),(50,1487105970,1487106013,1,'192.168.0.2','2v091ssahgmrpocpsffkmcpjd0'),(51,1487179986,1487197393,1,'192.168.0.2','tf4mm78r9kmgrmbkd91s1r0e94'),(52,1487267104,1487275089,1,'192.168.0.2','rr7jeqm1np4s305is6577otcr6'),(53,1488650082,1488650121,2,'192.168.0.2','dmdtf4v40dk5skcq8ao8n71en5'),(54,1488650150,NULL,2,'192.168.0.2','dmdtf4v40dk5skcq8ao8n71en5'),(55,1488652176,NULL,1,'192.168.0.2','tg3bsp9jp5j722dkq7u062etm6'),(56,1488729072,1488747856,2,'192.168.0.2','39m2b41dht2rb7imv7sqtprj21'),(57,1488747014,1488747920,2,'::1','kno4hi4ukcoo5l0e3iuo42kf95'),(58,1488828201,NULL,2,'192.168.0.2','9ls220ckai6e1lf8665m1agr12'),(59,1489080808,1489081963,2,'192.168.0.2','hahm3uv5tf6dbpfc1kbq4r9lr2'),(60,1489082080,NULL,2,'192.168.0.2','hahm3uv5tf6dbpfc1kbq4r9lr2'),(61,1489248031,1489270253,2,'192.168.0.2','298u9vihrkvmq5k9v4p92jvn56'),(62,1489270265,1489270415,2,'192.168.0.2','298u9vihrkvmq5k9v4p92jvn56'),(63,1489270422,1489270429,2,'192.168.0.2','298u9vihrkvmq5k9v4p92jvn56'),(64,1489270436,NULL,2,'192.168.0.2','298u9vihrkvmq5k9v4p92jvn56'),(65,1489314569,NULL,2,'192.168.0.2','v76b0obo8agu3rbhjs87q9n4f3'),(66,1489325435,1489338549,1,'::1','rml0v5bntuec4tls9r4lee39q0'),(67,1489340676,NULL,2,'192.168.0.2','r2avqcgv17lbq6krjtigibqgu2'),(68,1489431168,1489484691,2,'192.168.0.2','ijlm8gjr2skdvggt40ja04s3o7'),(69,1489484719,NULL,3,'192.168.0.2','ijlm8gjr2skdvggt40ja04s3o7'),(70,1489486375,NULL,3,'192.168.0.2','f3gk1bt54lkdhk7qokt57qbhc4'),(71,1489524536,NULL,3,'192.168.0.2','63lej17mkp0lf1tq50lefush50'),(72,1489549191,NULL,3,'192.168.0.2','aab8fovl1rr5471pb3fd6q53e5'),(73,1489551488,NULL,3,'192.168.0.2','lbu68qple7irag6l57snqlfna1'),(74,1489604343,NULL,3,'192.168.0.2','j2q7rb04samerh8r5pgsn6k7h2'),(75,1489604481,NULL,3,'192.168.0.1','4skoj4fgf82g92p14ql1g70h22'),(76,1489660397,NULL,3,'192.168.0.2','v4kro907f07ldvam4mtjintq46'),(77,1489676139,NULL,3,'192.168.0.2','ec0iqbd3m80la54jf7u29gor33'),(78,1489726212,NULL,3,'192.168.0.2','c158jj59j64sch5tn9d4o9c904'),(79,1489743406,NULL,3,'192.168.0.2','5drhfmo5beoic2k59jhbooq3f2'),(80,1489771171,NULL,3,'192.168.0.2','r8153bvj34gr3bjscnlra4ehp5'),(81,1489815000,1489831139,3,'192.168.0.2','f5vl1rmrusid22eqqtse43qee6'),(82,1489839214,NULL,3,'192.168.0.2','f5vl1rmrusid22eqqtse43qee6'),(83,1489867310,1489924189,3,'192.168.0.2','uovf9nt69fnjsq195alcbvv0n7'),(84,1489924208,NULL,3,'192.168.0.2','uovf9nt69fnjsq195alcbvv0n7'),(85,1489924364,NULL,3,'192.168.0.2','ausc54kk9oh2u26uv63mm6kdk0'),(86,1489987539,NULL,3,'192.168.0.2','7hf66in633of932akfm03vjil7'),(87,1490013500,NULL,3,'::1','6562hjtk6t4blclpvk3jf6vdb5'),(88,1490110025,1490114147,3,'192.168.0.2','ok3f7l30tqj3fnqsc0uaqibhq0'),(89,1490114164,1490114363,3,'192.168.0.2','ok3f7l30tqj3fnqsc0uaqibhq0'),(90,1490114371,1490118081,3,'192.168.0.2','ok3f7l30tqj3fnqsc0uaqibhq0'),(91,1490118090,1490118189,3,'192.168.0.2','ok3f7l30tqj3fnqsc0uaqibhq0'),(92,1490118248,1490118381,3,'192.168.0.2','ok3f7l30tqj3fnqsc0uaqibhq0'),(93,1490118392,1490119352,3,'192.168.0.2','ok3f7l30tqj3fnqsc0uaqibhq0'),(94,1490119363,1490119411,3,'192.168.0.2','ok3f7l30tqj3fnqsc0uaqibhq0'),(95,1490119662,1490120556,3,'192.168.0.2','ok3f7l30tqj3fnqsc0uaqibhq0'),(96,1490120565,1490122579,3,'192.168.0.2','ok3f7l30tqj3fnqsc0uaqibhq0'),(97,1490122604,1490122671,3,'192.168.0.2','ok3f7l30tqj3fnqsc0uaqibhq0'),(98,1490122686,1490122800,3,'192.168.0.2','ok3f7l30tqj3fnqsc0uaqibhq0'),(99,1490123013,1490123603,3,'192.168.0.2','ok3f7l30tqj3fnqsc0uaqibhq0'),(100,1490123615,1490124720,3,'192.168.0.2','ok3f7l30tqj3fnqsc0uaqibhq0'),(101,1490124734,1490124851,3,'192.168.0.2','ok3f7l30tqj3fnqsc0uaqibhq0'),(102,1490124861,1490126421,3,'192.168.0.2','ok3f7l30tqj3fnqsc0uaqibhq0'),(103,1490126436,1490127561,3,'192.168.0.2','ok3f7l30tqj3fnqsc0uaqibhq0'),(104,1490127572,1490127648,3,'192.168.0.2','ok3f7l30tqj3fnqsc0uaqibhq0'),(105,1490127658,1490127673,3,'192.168.0.2','ok3f7l30tqj3fnqsc0uaqibhq0'),(106,1490127776,1490127901,3,'192.168.0.2','ok3f7l30tqj3fnqsc0uaqibhq0'),(107,1490127910,1490128153,3,'192.168.0.2','ok3f7l30tqj3fnqsc0uaqibhq0'),(108,1490128160,1490128231,3,'192.168.0.2','ok3f7l30tqj3fnqsc0uaqibhq0'),(109,1490128240,1490128937,3,'192.168.0.2','ok3f7l30tqj3fnqsc0uaqibhq0'),(110,1490128955,1490129633,3,'192.168.0.2','ok3f7l30tqj3fnqsc0uaqibhq0'),(111,1490163013,1490163528,3,'192.168.0.2','ab41977ukhf9hc4b9efjcu6r01'),(112,1490163578,1490165200,3,'192.168.0.2','ab41977ukhf9hc4b9efjcu6r01'),(113,1490165240,1490165436,3,'192.168.0.2','ab41977ukhf9hc4b9efjcu6r01'),(114,1490165447,1490166949,3,'192.168.0.2','ab41977ukhf9hc4b9efjcu6r01'),(115,1490166956,1490176754,3,'192.168.0.2','ab41977ukhf9hc4b9efjcu6r01'),(116,1490176767,1490177088,3,'192.168.0.2','ab41977ukhf9hc4b9efjcu6r01'),(117,1490177102,NULL,3,'192.168.0.2','ab41977ukhf9hc4b9efjcu6r01'),(118,1490205423,1490210596,3,'192.168.0.2','lo78mvtdebthvk8rirdunh0q37'),(119,1490210608,1490210743,3,'192.168.0.2','lo78mvtdebthvk8rirdunh0q37'),(120,1490210754,1490210846,3,'192.168.0.2','lo78mvtdebthvk8rirdunh0q37'),(121,1490210858,1490215114,3,'192.168.0.2','lo78mvtdebthvk8rirdunh0q37'),(122,1490215130,1490252677,3,'192.168.0.2','lo78mvtdebthvk8rirdunh0q37'),(123,1490252687,1490252992,3,'192.168.0.2','lo78mvtdebthvk8rirdunh0q37'),(124,1490253002,1490253043,3,'192.168.0.2','lo78mvtdebthvk8rirdunh0q37'),(125,1490253055,1490253088,3,'192.168.0.2','lo78mvtdebthvk8rirdunh0q37'),(126,1490253102,1490253177,3,'192.168.0.2','lo78mvtdebthvk8rirdunh0q37'),(127,1490253192,1490253274,3,'192.168.0.2','lo78mvtdebthvk8rirdunh0q37'),(128,1490253286,1490253705,3,'192.168.0.2','lo78mvtdebthvk8rirdunh0q37'),(129,1490253713,1490253809,3,'192.168.0.2','lo78mvtdebthvk8rirdunh0q37'),(130,1490253833,1490254088,3,'192.168.0.2','lo78mvtdebthvk8rirdunh0q37'),(131,1490254099,1490254249,3,'192.168.0.2','lo78mvtdebthvk8rirdunh0q37'),(132,1490254261,1490254318,3,'192.168.0.2','lo78mvtdebthvk8rirdunh0q37'),(133,1490254333,1490254379,3,'192.168.0.2','lo78mvtdebthvk8rirdunh0q37'),(134,1490254394,1490254745,3,'192.168.0.2','lo78mvtdebthvk8rirdunh0q37'),(135,1490254755,1490255321,3,'192.168.0.2','lo78mvtdebthvk8rirdunh0q37'),(136,1490255331,1490255621,3,'192.168.0.2','lo78mvtdebthvk8rirdunh0q37'),(137,1490255630,1490255653,3,'192.168.0.2','lo78mvtdebthvk8rirdunh0q37'),(138,1490255661,1490256297,3,'192.168.0.2','lo78mvtdebthvk8rirdunh0q37'),(139,1490256306,1490256804,3,'192.168.0.2','lo78mvtdebthvk8rirdunh0q37'),(140,1490256815,1490256848,3,'192.168.0.2','lo78mvtdebthvk8rirdunh0q37'),(141,1490256856,1490256900,3,'192.168.0.2','lo78mvtdebthvk8rirdunh0q37'),(142,1490256911,1490257383,3,'192.168.0.2','lo78mvtdebthvk8rirdunh0q37'),(143,1490257393,1490257416,3,'192.168.0.2','lo78mvtdebthvk8rirdunh0q37'),(144,1490257425,1490258508,3,'192.168.0.2','lo78mvtdebthvk8rirdunh0q37'),(145,1490258537,1490265925,3,'192.168.0.2','lo78mvtdebthvk8rirdunh0q37'),(146,1490265937,1490266021,3,'192.168.0.2','lo78mvtdebthvk8rirdunh0q37'),(147,1490266029,1490266047,4,'192.168.0.2','lo78mvtdebthvk8rirdunh0q37'),(148,1490266058,1490266104,3,'192.168.0.2','lo78mvtdebthvk8rirdunh0q37'),(149,1490266113,1490266125,4,'192.168.0.2','lo78mvtdebthvk8rirdunh0q37'),(150,1490274046,1490274099,3,'::1','vonhga634n20mdr6d88fcaplt5'),(151,1490274111,1490274160,3,'::1','vonhga634n20mdr6d88fcaplt5'),(152,1490274176,1490274201,5,'::1','vonhga634n20mdr6d88fcaplt5'),(153,1490274210,1490274244,3,'::1','vonhga634n20mdr6d88fcaplt5'),(154,1490274252,1490284683,5,'::1','vonhga634n20mdr6d88fcaplt5'),(155,1490299067,NULL,3,'192.168.0.2','abrbcq60to81affq5n42l9gul5'),(156,1490334097,NULL,3,'192.168.0.2','lfufb4qtkv12f6q8kjo98i13h1'),(157,1490339177,NULL,3,'192.168.0.2','bublrgtiljs562crkk22khq8l3'),(158,1490353548,NULL,3,'::1','m7rgpuete8fjp7miaoq3lbo7b7'),(159,1490363838,1490363857,5,'192.168.0.2','39i4jsf9n0pv52cs7lss1ctg16'),(160,1490363881,1490363910,3,'192.168.0.2','39i4jsf9n0pv52cs7lss1ctg16'),(161,1490363926,1490364451,4,'192.168.0.2','39i4jsf9n0pv52cs7lss1ctg16'),(162,1490365361,1490365658,4,'192.168.0.2','39i4jsf9n0pv52cs7lss1ctg16'),(163,1490365927,1490366021,4,'192.168.0.2','39i4jsf9n0pv52cs7lss1ctg16'),(164,1490366153,1490366266,4,'192.168.0.2','39i4jsf9n0pv52cs7lss1ctg16'),(165,1490388074,NULL,3,'192.168.0.2','ofcel7ii9vto9gu9lbeq2psi11'),(166,1490477553,1490477583,3,'192.168.0.2','t6jg9jpqms5snop0d554gidi82'),(167,1490477591,NULL,3,'192.168.0.2','t6jg9jpqms5snop0d554gidi82'),(168,1490551909,1490553411,3,'192.168.0.2','54os43v7bbpstctpuin37a91c6'),(169,1490553429,NULL,3,'192.168.0.2','54os43v7bbpstctpuin37a91c6'),(170,1490596200,NULL,3,'192.168.0.2','2nds7hevp61bfk1apj47dlmsj4'),(171,1490683543,NULL,3,'192.168.0.2','c2qdarq6cb1hsu92v38ccftfg5'),(172,1490730333,1490733080,3,'192.168.0.2','of4326o0bpjpbmhsev4mlp60r0'),(173,1490733092,1490736642,3,'192.168.0.2','of4326o0bpjpbmhsev4mlp60r0'),(174,1490889215,1490906580,3,'192.168.0.2','mmug4so7khj8ce134j4h5biau4'),(175,1491030773,NULL,3,'192.168.0.2','04l6dc48osfg4gfhriot268i97'),(176,1491053760,NULL,3,'192.168.0.2','jrpu3838m5hsr0vumdgjshhsr5'),(177,1491141490,NULL,3,'192.168.0.2','las5jbr4qkuq8ilslidbjuk8g4'),(178,1491195222,1491198597,3,'::1','mkl9kbbbvfl8m7d96c3ep8sv74'),(179,1491198605,1491198744,3,'::1','mkl9kbbbvfl8m7d96c3ep8sv74'),(180,1491198752,1491198967,3,'::1','mkl9kbbbvfl8m7d96c3ep8sv74'),(181,1491198974,1491218757,3,'::1','mkl9kbbbvfl8m7d96c3ep8sv74'),(182,1491218765,NULL,3,'::1','mkl9kbbbvfl8m7d96c3ep8sv74'),(183,1491476060,1491491119,3,'::1','jrjtmtcok2tfea83r7tbtt7q90'),(184,1491491134,NULL,3,'::1','jrjtmtcok2tfea83r7tbtt7q90'),(185,1491504758,NULL,3,'192.168.0.2','ioqv629uannjnkclf6qfpjm9j5'),(186,1491549344,NULL,3,'::1','ptq6e5cagdiiq4ra6stpt72ea7'),(187,1491565631,NULL,3,'192.168.0.2','d4g0ja51l2naec4sqobftuhkr5'),(188,1491587828,NULL,3,'192.168.0.2','2gkckh57h7cnau367uukngkut5'),(189,1491590131,NULL,3,'192.168.0.2','vm3nvlg161gu68j42mlq5e1133'),(190,1491638092,NULL,3,'::1','vvpv5qlj0f6vl37jej8m7pkai1');
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
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `periodName` varchar(45) DEFAULT NULL,
  `periodDesc` varchar(45) DEFAULT NULL,
  `startDay` int(25) DEFAULT NULL,
  `lastDay` int(25) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `year` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `periodName_UNIQUE` (`periodName`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paymentperiods`
--

LOCK TABLES `paymentperiods` WRITE;
/*!40000 ALTER TABLE `paymentperiods` DISABLE KEYS */;
INSERT INTO `paymentperiods` VALUES (13,'1','january',1,31,NULL,2017),(14,'2','february',1,28,NULL,2017),(15,'3','march',1,31,NULL,2017),(16,'4','april',1,30,NULL,2017),(17,'5','may',1,31,NULL,2017),(18,'6','june',1,30,NULL,2017),(19,'7','july',1,31,NULL,2017),(20,'8','august',1,31,NULL,2017),(21,'9','september',1,30,NULL,2017),(22,'10','october',1,31,NULL,2017),(23,'11','november',1,30,NULL,2017),(24,'12','december',1,31,NULL,2017);
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
  `transId` varchar(45) NOT NULL,
  `tranDesc` varchar(5) NOT NULL,
  `accid` int(11) DEFAULT NULL,
  `tenantId` int(11) DEFAULT NULL,
  `phoneNo` int(11) DEFAULT NULL,
  `paymentAmount` decimal(20,2) NOT NULL,
  `Status` int(10) DEFAULT NULL,
  `notificationSent` tinyint(1) DEFAULT NULL,
  `paymentPeriod` int(11) DEFAULT NULL,
  `paymentDate` int(11) NOT NULL,
  `documentname` varchar(80) DEFAULT NULL,
  `waterbill` decimal(15,2) DEFAULT '0.00',
  `elecbill` decimal(15,2) DEFAULT '0.00',
  `extracosts` decimal(15,2) DEFAULT '0.00',
  `transDtstamp` int(11) NOT NULL,
  `modifiedDtstamp` int(11) DEFAULT NULL,
  PRIMARY KEY (`paymentsId`),
  UNIQUE KEY `transId` (`transId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
INSERT INTO `payments` VALUES (4,'00000004','c',2,1,98876765,6700.00,2,NULL,16,1491508782,'1491574657_pisa_reg_details.PNG',90.00,5678.00,567.00,1491508782,1491653036),(5,'0000015','c',2,2,9876766,7888.00,2,NULL,16,1491509098,'1491574152_Capture.PNG',89.00,450.00,90.00,1491509098,1491653738),(6,'00000006','k',6,1,99877,6001.40,2,NULL,16,1491588607,NULL,6000.00,4500.00,478.00,1491588607,1491653231);
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
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
/*!50003 CREATE*/ /*!50017 DEFINER=`dev`@`%`*/ /*!50003 TRIGGER before_payments_insert
BEFORE INSERT ON payments
FOR EACH ROW
BEGIN
SET NEW.transDtstamp = UNIX_TIMESTAMP(NOW()); 
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
/*!50003 CREATE*/ /*!50017 DEFINER=`dev`@`%`*/ /*!50003 TRIGGER before_payments_update
BEFORE UPDATE ON payments 
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
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `screenid` int(11) NOT NULL,
  `dtstamp` int(11) NOT NULL,
  `datemodified` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `rolesbinder` (`userid`,`screenid`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (40,3,2,1490477580,NULL),(36,5,1,1490274237,NULL),(7,3,8,1490252580,NULL),(4,3,13,1490128927,NULL),(5,3,4,1490166932,NULL),(11,3,6,1490253257,NULL),(21,3,1,1490257411,NULL),(34,4,5,1490266082,NULL),(17,3,11,1490255303,NULL),(25,3,9,1490258501,NULL),(26,3,10,1490258501,NULL),(33,4,4,1490266082,NULL),(32,4,1,1490266082,NULL),(29,3,15,1490258501,NULL),(30,3,16,1490258501,NULL),(31,3,17,1490258501,NULL),(37,5,2,1490274237,NULL),(38,5,4,1490274237,NULL),(39,5,6,1490274237,NULL),(41,3,3,1490553402,NULL),(42,3,5,1490553402,NULL),(43,3,12,1490553402,NULL),(44,3,19,1490733072,NULL);
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
  `screenDesc` varchar(60) NOT NULL,
  `langtype` varchar(40) NOT NULL,
  `allowed` tinyint(1) NOT NULL,
  `sortorder` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `screenDesc` (`screenDesc`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `screens`
--

LOCK TABLES `screens` WRITE;
/*!40000 ALTER TABLE `screens` DISABLE KEYS */;
INSERT INTO `screens` VALUES (1,'accounts','Accounts','php',1,19),(2,'apartment','Apartment','php',1,19),(3,'blocks','Blocks','php',1,19),(4,'company','Company','php',1,19),(5,'estates','Estates','php',1,19),(6,'index','Overview','php',1,1),(7,'validate','validate','php',0,19),(8,'notifications','Notifications','php',1,19),(9,'notificationtemplates','Notification Templates','php',1,19),(10,'paymentperiods','Payment Periods','php',1,19),(11,'profile','Users Profile','php',1,19),(12,'reports','Reports','php',1,19),(13,'roles','Access Permissions','php',1,19),(14,'template','Template','php',0,19),(15,'tenant','Tenant Details','php',1,19),(16,'transactions','Transactions','php',1,2),(17,'users','Users','php',1,19),(18,'tester','Tester','php',0,19),(19,'addpayment','Add Payment','php',1,19);
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
  `graceperiod` int(10) NOT NULL DEFAULT '3',
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
INSERT INTO `tenant` VALUES (1,'Saturn','doejah',NULL,554445,1,'lol@gmail.com',1,1477947600000,NULL,NULL,65,7867,'mhj','h',76577,76599,500.00,3,NULL,NULL,NULL),(2,'John','Hancock',NULL,5687,1,'get@gmail.com',1,1479070800000,NULL,NULL,767665,9877777,'Mantra','Lolhjhh',987666,6554434,1200.00,3,NULL,NULL,NULL);
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
-- Table structure for table `tickedsettings`
--

DROP TABLE IF EXISTS `tickedsettings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tickedsettings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page` varchar(45) NOT NULL,
  `field` varchar(45) NOT NULL,
  `checked` tinyint(1) NOT NULL,
  `dtstamp` int(11) DEFAULT NULL,
  `datemodified` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tickedsettings`
--

LOCK TABLES `tickedsettings` WRITE;
/*!40000 ALTER TABLE `tickedsettings` DISABLE KEYS */;
INSERT INTO `tickedsettings` VALUES (1,'addpayments','referenceid',1,75654,NULL),(4,'test','test',1,NULL,NULL);
/*!40000 ALTER TABLE `tickedsettings` ENABLE KEYS */;
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
  `roleId` int(11) DEFAULT NULL,
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
INSERT INTO `userdetails` VALUES (12,'John','Mackenzie','Bob','f@gmail.com',56465676,'23 Ken Street',34543545,1,4,NULL,1,'1491225737_Dark_Elf.jpg',1489830543,1491225738);
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (3,'james','$2y$10$Zk/4EzZ2k4sNyQRlmtnE0ugjLmwPKKMPvlY0RzKjjuKpg.uTKuDyu',1489484578,1490559295),(4,'modal','$2y$10$ysQk.wCQETPXeQtXYDYijOqKLBQOfM5YM1cuogdClqtIC52JMNeB2',1490265973,NULL),(5,'Test','$2y$10$n.lUigaiTV378O79rbkgFuvpte0Ew0vgOhNh4cHeYis40jqBRV0n2',1490274155,1490559450);
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

-- Dump completed on 2017-04-08 15:36:40
