-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 03, 2015 at 07:23 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `water_bill`
--
CREATE DATABASE IF NOT EXISTS `water_bill` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `water_bill`;

-- --------------------------------------------------------

--
-- Table structure for table `wb_m_customer`
--

CREATE TABLE IF NOT EXISTS `wb_m_customer` (
  `cus_id` int(11) NOT NULL,
  `nic` varchar(10) DEFAULT NULL,
  `name` varchar(150) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `owner_name` varchar(150) DEFAULT NULL,
  `tax_no` varchar(50) DEFAULT NULL,
  `reg_date` date DEFAULT NULL,
  `sub_road` int(11) NOT NULL,
  `nature` int(11) NOT NULL,
  `security_deposit` double DEFAULT NULL,
  `estimate_amount` double DEFAULT NULL,
  PRIMARY KEY (`cus_id`),
  KEY `FK_NATURE` (`nature`),
  KEY `FK_SUB_RD` (`sub_road`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `wb_m_main_road`
--

CREATE TABLE IF NOT EXISTS `wb_m_main_road` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `road_name` varchar(250) NOT NULL,
  `date_created` date DEFAULT NULL,
  `date_modified` date DEFAULT NULL,
  `modified_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `wb_m_meter_reader`
--

CREATE TABLE IF NOT EXISTS `wb_m_meter_reader` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nic` varchar(10) DEFAULT NULL,
  `name` varchar(150) DEFAULT NULL,
  `tel` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `wb_m_nature`
--

CREATE TABLE IF NOT EXISTS `wb_m_nature` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nature` varchar(50) DEFAULT NULL,
  `charge` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `wb_m_nature`
--

INSERT INTO `wb_m_nature` (`id`, `nature`, `charge`) VALUES
(1, 'Business', NULL),
(2, 'Commercial', NULL),
(3, 'Construction', NULL),
(4, 'Domestic', NULL),
(5, 'Education', NULL),
(6, 'Festival', NULL),
(7, 'Religious', NULL),
(8, 'Tourism', NULL),
(9, 'Other', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wb_m_sub_road`
--

CREATE TABLE IF NOT EXISTS `wb_m_sub_road` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_road` varchar(250) DEFAULT NULL,
  `main_road_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_MAIN_ROAD` (`main_road_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `wb_m_users`
--

CREATE TABLE IF NOT EXISTS `wb_m_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(15) DEFAULT NULL,
  `user_level` int(11) DEFAULT NULL,
  `pwd` varchar(255) DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `date_modified` date DEFAULT NULL,
  `approved` int(1) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `UNIQUE_USER` (`user_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `wb_m_users`
--

INSERT INTO `wb_m_users` (`user_id`, `user_name`, `user_level`, `pwd`, `date_created`, `date_modified`, `approved`) VALUES
(1, 'Admin', 1, 'da700c9c46319353b1f124d338501668472ab2375214006ef', '2015-05-30', NULL, 1),
(2, 'User', 2, 'da700c9c46319353b1f124d338501668472ab2375214006ef', '2015-05-30', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `wb_t_charge_scheme`
--

CREATE TABLE IF NOT EXISTS `wb_t_charge_scheme` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nature_id` int(11) NOT NULL,
  `range_start` int(11) DEFAULT NULL,
  `range_end` int(11) DEFAULT NULL,
  `unti_price` double DEFAULT NULL,
  `fix_charge` double DEFAULT NULL,
  `unlimit_flag` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_NATURE_CHARGE` (`nature_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `wb_t_customer_payment`
--

CREATE TABLE IF NOT EXISTS `wb_t_customer_payment` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `cus_id` int(11) NOT NULL,
  `amount_paid` double DEFAULT NULL,
  `date_paid` date DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `created_by` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_CUS_PAY` (`cus_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `wb_t_customer_road`
--

CREATE TABLE IF NOT EXISTS `wb_t_customer_road` (
  `cus_id` int(11) NOT NULL,
  `reader_id` int(11) NOT NULL,
  `sub_road_id` int(11) NOT NULL,
  PRIMARY KEY (`cus_id`,`reader_id`,`sub_road_id`),
  KEY `FK_CUS_RD_READER` (`reader_id`),
  KEY `FK_CUS_RD_SUB` (`sub_road_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `wb_t_invoice`
--

CREATE TABLE IF NOT EXISTS `wb_t_invoice` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `cus_id` int(11) NOT NULL,
  `invoice_no` bigint(20) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `month` date DEFAULT NULL,
  `tax` double DEFAULT NULL,
  `balance_brought_forward` double DEFAULT NULL,
  `total_due` double DEFAULT NULL,
  `current_pay_amount` double DEFAULT NULL,
  `balance_carry_forward` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_CUS_INVOICE` (`cus_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `wb_t_meter_reading`
--

CREATE TABLE IF NOT EXISTS `wb_t_meter_reading` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `cus_id` int(11) NOT NULL,
  `date_read` date DEFAULT NULL,
  `current_read` bigint(20) DEFAULT NULL,
  `previos_read` bigint(20) DEFAULT NULL,
  `consumption` int(11) DEFAULT NULL,
  `tax` double DEFAULT NULL,
  `water_charge` double DEFAULT NULL,
  `total_payable` double DEFAULT NULL,
  `date_created` datetime NOT NULL,
  `created_by` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_CUST_METER` (`cus_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `wb_m_customer`
--
ALTER TABLE `wb_m_customer`
  ADD CONSTRAINT `FK_NATURE` FOREIGN KEY (`nature`) REFERENCES `wb_m_nature` (`id`),
  ADD CONSTRAINT `FK_SUB_RD` FOREIGN KEY (`sub_road`) REFERENCES `wb_m_sub_road` (`id`);

--
-- Constraints for table `wb_m_sub_road`
--
ALTER TABLE `wb_m_sub_road`
  ADD CONSTRAINT `FK_MAIN_ROAD` FOREIGN KEY (`main_road_id`) REFERENCES `wb_m_main_road` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `wb_t_charge_scheme`
--
ALTER TABLE `wb_t_charge_scheme`
  ADD CONSTRAINT `FK_NATURE_CHARGE` FOREIGN KEY (`nature_id`) REFERENCES `wb_m_nature` (`id`);

--
-- Constraints for table `wb_t_customer_payment`
--
ALTER TABLE `wb_t_customer_payment`
  ADD CONSTRAINT `FK_CUS_PAY` FOREIGN KEY (`cus_id`) REFERENCES `wb_m_customer` (`cus_id`);

--
-- Constraints for table `wb_t_customer_road`
--
ALTER TABLE `wb_t_customer_road`
  ADD CONSTRAINT `FK_CUS_ID` FOREIGN KEY (`cus_id`) REFERENCES `wb_m_customer` (`cus_id`),
  ADD CONSTRAINT `FK_CUS_RD_READER` FOREIGN KEY (`reader_id`) REFERENCES `wb_m_meter_reader` (`id`),
  ADD CONSTRAINT `FK_CUS_RD_SUB` FOREIGN KEY (`sub_road_id`) REFERENCES `wb_m_sub_road` (`id`);

--
-- Constraints for table `wb_t_invoice`
--
ALTER TABLE `wb_t_invoice`
  ADD CONSTRAINT `FK_CUS_INVOICE` FOREIGN KEY (`cus_id`) REFERENCES `wb_m_customer` (`cus_id`);

--
-- Constraints for table `wb_t_meter_reading`
--
ALTER TABLE `wb_t_meter_reading`
  ADD CONSTRAINT `FK_CUST_METER` FOREIGN KEY (`cus_id`) REFERENCES `wb_m_customer` (`cus_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
