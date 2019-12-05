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

drop database test;
CREATE DATABASE test;
use test;

CREATE TABLE usertype (
	id int auto_increment,
	utype varchar(10) not null,
	primary key (id),
	unique (utype)
);

insert into usertype (utype) values ('admin'), ('user');

CREATE TABLE tusers (
	ID int auto_increment,
	Username varchar(100) NOT NULL,
	UPassword varchar(256) NOT NULL,
	EmailAddress varchar(100) NOT NULL,
	utype varchar(10) not null,
	PRIMARY KEY (ID),
	UNIQUE (Username),
	UNIQUE (EmailAddress),
	foreign key (utype) references usertype(utype)
)

INSERT INTO tusers (Username, UPassword, EmailAddress, utype) VALUES ('longpre','55251d1743e6e43faba8515ca264dea8d588d633edc062e7bf546cc8578fb1e1','longpre@utep.edu','admin'), ('dreyes15','55251d1743e6e43faba8515ca264dea8d588d633edc062e7bf546cc8578fb1e1','dreyes15@miners.utep.edu','admin'), ('user1','55251d1743e6e43faba8515ca264dea8d588d633edc062e7bf546cc8578fb1e1','email1@miners.utep.edu','user');

