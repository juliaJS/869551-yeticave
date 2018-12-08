CREATE DATABASE yeticave
	DEFAULT CHARACTER SET utf8
	DEFAULT COLLATE utf8_general_ci;
 
 
USE yeticave;


CREATE TABLE categories(
	id INT AUTO_INCREMENT PRIMARY KEY,
	name CHAR(64)
);

CREATE TABLE lots(
	id INT AUTO_INCREMENT PRIMARY KEY,
	id_user INT,
	id_category INT,
	dt_add TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	rate_id INT,
	title CHAR(128),
	description CHAR,
    image CHAR(255),
	price INT,
	dt_stop_sale TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    increment_rate INT
);

CREATE TABLE rate(
	id INT AUTO_INCREMENT PRIMARY KEY,
	id_user INT,
	id_lot INT,
	dt_add TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    desired_price INT
);

CREATE TABLE users(
	id INT AUTO_INCREMENT PRIMARY KEY,
	id_lot INT,
	id_rate INT,
	dt_add TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	email CHAR(128)  NOT NULL UNIQUE,
	name CHAR(25),
	password CHAR(64),
    avatar CHAR(255)
);
	
CREATE UNIQUE INDEX name ON users(name);	
CREATE INDEX all_lots ON lots(title); 


	
