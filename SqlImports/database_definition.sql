-- CS5339 - Secure-Web Systems
-- Instructor: Dr Longpre
-- Students: Ernesto Vazquez & George Wood
-- SQL File that creates tables for Assigment 3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- table `tusertypes`
--

CREATE TABLE IF NOT EXISTS `tusertypes` (
	`ID` int auto_increment,
	`Type` varchar(14) DEFAULT NULL,
	`NotFields` varchar(56) DEFAULT NULL,
	PRIMARY KEY (`ID`)
) ENGINE=innoDB DEFAULT CHARSET=utf8;	

--
-- table `tusers`
--

CREATE TABLE IF NOT EXISTS `tusers` (
	`ID` int auto_increment,
	`Username` varchar(100) NOT NULL,
	`UPassword` varchar(256) NOT NULL,
	`UserType` varchar (14) DEFAULT `Logged-in User`,
	`EmailAddress` varchar(256) NOT NULL,
	PRIMARY KEY (`ID`)
) ENGINE=innoDB DEFAULT CHARSET=utf8;

--
-- create type records in table `tusertypes`
--

INSERT INTO `tusertypes` (`ID`, `Type`, `NotFields`) VALUES
(0, 'Visitor', 'PartID, Price, Estimated Shipping Cost, Shipping Weight'), 
(1, 'Logged-in User', 'None'), 
(2, 'Administrator', 'None');

