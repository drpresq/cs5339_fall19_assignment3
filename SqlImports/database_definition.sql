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
-- table `tusers`
--

CREATE TABLE IF NOT EXISTS `tusers` (
	`ID` int auto_increment,
	`Username` varchar(100) NOT NULL,
	`UPassword` varchar(256) NOT NULL,
	`EmailAddress` varchar(100) NOT NULL,
	`Admin` BOOLEAN NOT NULL DEFAULT 0,
	PRIMARY KEY (`ID`),
	UNIQUE (`Username`),
	UNIQUE (`EmailAddress`)
) ENGINE=innoDB DEFAULT CHARSET=utf8;

--
-- Add Admin Users to `tusers`
--

INSERT INTO `tusers` (`Username`,`UPassword`,`EmailAddress`,`Admin`) VALUES
('longpre','Password123456','longpre@utep.edu','1'),
('dreyes15','Password123456','dreyes15@miners.utep.edu','1')

