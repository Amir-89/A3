#File:	images.sql

#Create table named images

CREATE TABLE if not exists images
(
	id INT NOT NULL AUTO_INCREMENT,
	image VARCHAR(50) NOT NULL,
	PRIMARY KEY (id)
); 

