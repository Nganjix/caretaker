-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2016 at 08:49 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `caretaker`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `accId` int(11) NOT NULL,
  `accName` varchar(25) DEFAULT NULL,
  `accDesc` varchar(50) DEFAULT NULL,
  `accDateCreated` datetime DEFAULT NULL,
  `accDateModified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `apartment`
--

CREATE TABLE `apartment` (
  `aprtId` int(11) NOT NULL,
  `aprtName` varchar(25) DEFAULT NULL,
  `aprtDesc` varchar(45) DEFAULT NULL,
  `accId` int(11) DEFAULT NULL,
  `tenantId` int(11) DEFAULT NULL,
  `blockId` int(11) DEFAULT NULL,
  `costPerMonth` decimal(20,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `blocks`
--

CREATE TABLE `blocks` (
  `blockId` int(11) NOT NULL,
  `blockName` varchar(25) DEFAULT NULL,
  `blockDesc` varchar(45) DEFAULT NULL,
  `estateId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `c2bvalidate`
--

CREATE TABLE `c2bvalidate` (
  `localTransId` int(11) NOT NULL,
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
  `lastName3` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `c2bvalidateandconfirm`
--

CREATE TABLE `c2bvalidateandconfirm` (
  `localTransId` int(11) NOT NULL,
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
  `isValidate` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `codes`
--

CREATE TABLE `codes` (
  `resultCode` int(11) NOT NULL,
  `resultDesc` varchar(40) DEFAULT NULL,
  `thirdPartyTransID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `companyId` int(11) NOT NULL,
  `companyName` varchar(80) NOT NULL,
  `vatPinId` varchar(20) DEFAULT NULL,
  `systemEmail` varchar(25) DEFAULT NULL,
  `contactPerson` varchar(45) DEFAULT NULL,
  `telephone` int(11) DEFAULT NULL,
  `mainLocation` varchar(25) DEFAULT NULL,
  `postalAddress` varchar(25) DEFAULT NULL,
  `mpesaNoId` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `estates`
--

CREATE TABLE `estates` (
  `estateId` int(11) NOT NULL,
  `estateName` varchar(45) DEFAULT NULL,
  `estateDesc` varchar(80) DEFAULT NULL,
  `estateLocation` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ftptrans`
--

CREATE TABLE `ftptrans` (
  `ftpDocId` int(11) NOT NULL,
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
  `remark` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `Id` int(11) NOT NULL,
  `loginDtstamp` int(11) NOT NULL,
  `logoutDtstamp` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `userIp` varchar(20) DEFAULT NULL,
  `session` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`Id`, `loginDtstamp`, `logoutDtstamp`, `userId`, `userIp`, `session`) VALUES
(5, 1476965553, 1476965555, 1, '192.168.0.2', 'rg928or7tud3fiivteuj1u9vj4'),
(6, 1476966883, 1476967928, 1, '192.168.0.2', 'rg928or7tud3fiivteuj1u9vj4'),
(7, 1476983372, NULL, 2, '192.168.0.2', 'vm96v1p85ui0hn48dflt3bkmq1'),
(8, 1477074184, 1477074354, 1, '::1', 'nce5ep9aiil4a0ks23a9rl53h1'),
(9, 1477074406, NULL, 1, '::1', 'nce5ep9aiil4a0ks23a9rl53h1');

-- --------------------------------------------------------

--
-- Table structure for table `notficationtemplates`
--

CREATE TABLE `notficationtemplates` (
  `notficationId` int(11) NOT NULL,
  `notfication` varchar(20) NOT NULL,
  `subject` varchar(25) DEFAULT NULL,
  `message` varchar(100) NOT NULL,
  `footer` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `paymentperiods`
--

CREATE TABLE `paymentperiods` (
  `paymentPeriodId` int(11) NOT NULL,
  `periodName` varchar(45) DEFAULT NULL,
  `periodDesc` varchar(45) DEFAULT NULL,
  `startDate` datetime DEFAULT NULL,
  `endDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `paymentsId` int(11) NOT NULL,
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
  `paymentPeriod` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tenant`
--

CREATE TABLE `tenant` (
  `tenantId` int(11) NOT NULL,
  `firstName` varchar(15) NOT NULL,
  `secondName` varchar(15) NOT NULL,
  `lastName` varchar(15) NOT NULL,
  `idNumber` int(11) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `email` varchar(25) NOT NULL,
  `isActive` bit(1) DEFAULT NULL,
  `boardingDate` date NOT NULL,
  `isPaymentPeriods` bit(1) NOT NULL,
  `paymentPeriodId` int(11) DEFAULT NULL,
  `paymentPhoneNo1` int(11) DEFAULT NULL,
  `paymentPhoneNo2` int(11) DEFAULT NULL,
  `nextOfKinFname` varchar(15) NOT NULL,
  `nextOfKinSname` varchar(15) NOT NULL,
  `nextOfKinIdNo` int(11) NOT NULL,
  `nextOfKinPhoneId` int(11) NOT NULL,
  `depositNumber` decimal(20,2) DEFAULT NULL,
  `currentAmount` decimal(20,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `infor` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `name`, `pass`, `infor`) VALUES
(1, 'james', 'james', 'burrrrrrrrrrrrrrrrrrrrrrrrrrrrrr'),
(2, 'john', 'john', 'burrrrrrrrrrrrrrrrrrrrrrrrrrrrrr');

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `detailsId` int(11) NOT NULL,
  `firstName` varchar(15) DEFAULT NULL,
  `secondName` varchar(15) DEFAULT NULL,
  `lastName` varchar(15) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `postalAddress` varchar(45) DEFAULT NULL,
  `idNo` int(11) DEFAULT NULL,
  `isAdmin` bit(1) DEFAULT NULL,
  `isTenant` bit(1) DEFAULT NULL,
  `isActive` bit(1) DEFAULT NULL,
  `profilePhoto` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `createdDtstamp` datetime DEFAULT NULL,
  `modifiedDtstamp` datetime DEFAULT NULL,
  `userDetailsId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `createdDtstamp`, `modifiedDtstamp`, `userDetailsId`) VALUES
(1, 'jam', 'jam', NULL, NULL, NULL),
(2, 'kik', 'kik', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`accId`),
  ADD UNIQUE KEY `accName_UNIQUE` (`accName`);

--
-- Indexes for table `apartment`
--
ALTER TABLE `apartment`
  ADD PRIMARY KEY (`aprtId`),
  ADD UNIQUE KEY `aprtName_UNIQUE` (`aprtName`);

--
-- Indexes for table `blocks`
--
ALTER TABLE `blocks`
  ADD PRIMARY KEY (`blockId`),
  ADD UNIQUE KEY `blockName_UNIQUE` (`blockName`);

--
-- Indexes for table `c2bvalidate`
--
ALTER TABLE `c2bvalidate`
  ADD PRIMARY KEY (`localTransId`);

--
-- Indexes for table `c2bvalidateandconfirm`
--
ALTER TABLE `c2bvalidateandconfirm`
  ADD PRIMARY KEY (`localTransId`);

--
-- Indexes for table `codes`
--
ALTER TABLE `codes`
  ADD PRIMARY KEY (`resultCode`),
  ADD UNIQUE KEY `resultDesc_UNIQUE` (`resultDesc`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`companyId`),
  ADD UNIQUE KEY `companyName_UNIQUE` (`companyName`);

--
-- Indexes for table `estates`
--
ALTER TABLE `estates`
  ADD PRIMARY KEY (`estateId`),
  ADD UNIQUE KEY `estateName_UNIQUE` (`estateName`);

--
-- Indexes for table `ftptrans`
--
ALTER TABLE `ftptrans`
  ADD PRIMARY KEY (`ftpDocId`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `notficationtemplates`
--
ALTER TABLE `notficationtemplates`
  ADD PRIMARY KEY (`notficationId`),
  ADD UNIQUE KEY `notfication_UNIQUE` (`notfication`);

--
-- Indexes for table `paymentperiods`
--
ALTER TABLE `paymentperiods`
  ADD PRIMARY KEY (`paymentPeriodId`),
  ADD UNIQUE KEY `periodName_UNIQUE` (`periodName`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`paymentsId`);

--
-- Indexes for table `tenant`
--
ALTER TABLE `tenant`
  ADD PRIMARY KEY (`tenantId`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`detailsId`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `accId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `apartment`
--
ALTER TABLE `apartment`
  MODIFY `aprtId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `blocks`
--
ALTER TABLE `blocks`
  MODIFY `blockId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `c2bvalidate`
--
ALTER TABLE `c2bvalidate`
  MODIFY `localTransId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `c2bvalidateandconfirm`
--
ALTER TABLE `c2bvalidateandconfirm`
  MODIFY `localTransId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `companyId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `estates`
--
ALTER TABLE `estates`
  MODIFY `estateId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ftptrans`
--
ALTER TABLE `ftptrans`
  MODIFY `ftpDocId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `notficationtemplates`
--
ALTER TABLE `notficationtemplates`
  MODIFY `notficationId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `paymentperiods`
--
ALTER TABLE `paymentperiods`
  MODIFY `paymentPeriodId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `paymentsId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tenant`
--
ALTER TABLE `tenant`
  MODIFY `tenantId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `userdetails`
--
ALTER TABLE `userdetails`
  MODIFY `detailsId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
