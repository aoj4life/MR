-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2017 at 12:19 PM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bitfund`
--
CREATE DATABASE IF NOT EXISTS `bitfund` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bitfund`;

-- --------------------------------------------------------

--
-- Table structure for table `bankdetail`
--

CREATE TABLE `bankdetail` (
  `id` int(100) NOT NULL,
  `bankname` varchar(100) NOT NULL,
  `accname` varchar(250) NOT NULL,
  `accnumber` varchar(100) NOT NULL,
  `acctype` varchar(250) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `datecreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `phone` varchar(100) NOT NULL,
  `yourname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bonuses`
--

CREATE TABLE `bonuses` (
  `UserID` int(100) NOT NULL,
  `donorname` varchar(255) NOT NULL,
  `donoremail` varchar(255) NOT NULL,
  `referralemail` varchar(255) NOT NULL,
  `amountdonated` int(255) NOT NULL,
  `rebonus` double NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'unconfirmed',
  `bonustype` varchar(255) NOT NULL DEFAULT 'Referral Bonus',
  `dateput` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `maturetime` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bonuses_balance`
--

CREATE TABLE `bonuses_balance` (
  `id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `bbalance` double NOT NULL,
  `datedone` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `getdonations`
--

CREATE TABLE `getdonations` (
  `sn` int(11) NOT NULL,
  `tID` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `paymedium` varchar(255) DEFAULT NULL,
  `amount` double NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'pending cashout',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `givedonations`
--

CREATE TABLE `givedonations` (
  `donationID` int(11) NOT NULL,
  `UserID` int(250) NOT NULL,
  `email` varchar(255) NOT NULL,
  `paymedium` varchar(10) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `amount` double NOT NULL,
  `box45` double NOT NULL,
  `status` varchar(100) DEFAULT 'unconfirmed',
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `maturedate` timestamp NOT NULL,
  `invite` varchar(255) DEFAULT NULL,
  `referralbonus` double DEFAULT '0',
  `donorname` varchar(255) NOT NULL,
  `bitbonus` double DEFAULT '0',
  `phone` varchar(100) NOT NULL,
  `referral_state` varchar(100) NOT NULL DEFAULT 'unconfirmed',
  `TID` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `matched`
--

CREATE TABLE `matched` (
  `id` int(9) NOT NULL,
  `tID` varchar(255) DEFAULT NULL,
  `donoremail` varchar(255) DEFAULT NULL,
  `donationvalue` double DEFAULT NULL,
  `receiveremail` varchar(250) DEFAULT NULL,
  `receivervalue` double DEFAULT NULL,
  `pop` varchar(255) DEFAULT NULL,
  `datecreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(100) NOT NULL DEFAULT 'cashout_open',
  `due_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `matched1`
--

CREATE TABLE `matched1` (
  `id` int(9) NOT NULL,
  `tID` varchar(255) DEFAULT NULL,
  `donoremail` varchar(255) DEFAULT NULL,
  `donationvalue` double DEFAULT NULL,
  `receiveremail` varchar(250) DEFAULT NULL,
  `receivervalue` double DEFAULT NULL,
  `pop` varchar(255) DEFAULT NULL,
  `datecreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(100) NOT NULL DEFAULT 'cashout_open',
  `due_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `userid` int(15) NOT NULL,
  `yourname` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` char(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  `invite` varchar(200) NOT NULL,
  `medium` bigint(255) NOT NULL,
  `recdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `recstatus` varchar(100) NOT NULL DEFAULT 'Active',
  `integerity` int(3) NOT NULL DEFAULT '100'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='user initial details';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bankdetail`
--
ALTER TABLE `bankdetail`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `accnumber` (`accnumber`);

--
-- Indexes for table `bonuses_balance`
--
ALTER TABLE `bonuses_balance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `getdonations`
--
ALTER TABLE `getdonations`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `givedonations`
--
ALTER TABLE `givedonations`
  ADD PRIMARY KEY (`donationID`);

--
-- Indexes for table `matched`
--
ALTER TABLE `matched`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matched1`
--
ALTER TABLE `matched1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `phone` (`phone`),
  ADD KEY `yourname` (`yourname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bankdetail`
--
ALTER TABLE `bankdetail`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bonuses_balance`
--
ALTER TABLE `bonuses_balance`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `getdonations`
--
ALTER TABLE `getdonations`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `givedonations`
--
ALTER TABLE `givedonations`
  MODIFY `donationID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `matched`
--
ALTER TABLE `matched`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `matched1`
--
ALTER TABLE `matched1`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `userid` int(15) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
