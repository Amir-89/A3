#File:	applications.sql

#Create table named applications

CREATE TABLE if not exists applications
(
	fname varchar(50) not null,
	lname varchar(50) not null,
	age int not null,
	country varchar(20) not null,
	university varchar(20) not null,
	gpa decimal(10,2) not null,
  email varchar(50) primary key,
  password varchar(30) not null
); 

#End users.sql
