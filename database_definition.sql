/*
CS5339 - Secure-Web Systems
Instructor: Dr Longpre
Student: Ernesto Vazquez
SQL File that creates tables for Assigment 3
*/
use evazquezgalarza_f19_db;

create table tuser_type (
	id int auto_increment,
	user_type varchar(30) not null,
	primary key (id),
	unique (user_type)
);	

insert into tuser_type (user_type) values ('Visitor'), 
	('Logged-in User'), ('Administrator');

create table tuser (
	id int auto_increment,
	username varchar(100) not null,
	upassword varchar(256) not null,
	user_type varhcarh (30) not null,
	primary key (id),
	unique (username),
	foreign key user_type references tuser_type (user_type) on update cascade
);

