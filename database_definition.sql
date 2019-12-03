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
-- user types table
--

CREATE TABLE IF NOT EXISTS `usertypes` (
	`ID` int auto_increment,
	`Type` varchar(14) DEFAULT NULL,
	`NotFields` varchar(56) DEFAULT NULL,
	PRIMARY KEY (`ID`)
) ENGINE=innoDB DEFAULT CHARSET=utf8;	

--
-- user table
--

CREATE TABLE IF NOT EXISTS `users` (
	`ID` int auto_increment,
	`Username` varchar(100) not null,
	`UPassword` varchar(256) not null,
	`UserType` varchar (14) not null,
	PRIMARY KEY (`ID`)
) ENGINE=innoDB DEFAULT CHARSET=utf8;

--
-- create type records in table `usertypes`
--

INSERT INTO `usertypes` (`ID`, `Type`, `NotFields`) VALUES
(0, 'Visitor', 'PartID, Price, Estimated Shipping Cost, Shipping Weight'), 
(1, 'Logged-in User', 'None'), 
(2, 'Administrator', 'None');

