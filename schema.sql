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
  ? desired_price INT
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
	

INSERT INTO categories
	SET name = 'Доски и лыжи', name = 'Крепления', name = 'Ботинки', 
	name = 'Одежда', name = 'Инструменты', name = 'Разное';
	
INSERT INTO lots
	SET title = '2014 Rossignol District Snowboard', image = 'img/lot-1.jpg', price = '10999';
	
INSERT INTO lots
	SET title = 'DC Ply Mens 2016/2017 Snowboard', image = 'img/lot-2.jpg', price = '159999';
	
INSERT INTO lots
	SET title = 'Крепления Union Contact Pro 2015 года размер L/XL', image = 'img/lot-3.jpg', price = '8000';
	
INSERT INTO lots
	SET title = 'Ботинки для сноуборда DC Mutiny Charocal', image = 'img/lot-4.jpg', price = '10999';
	
INSERT INTO lots
	SET title = 'Куртка для сноуборда DC Mutiny Charocal', image = 'img/lot-5.jpg', price = '7500';
	
INSERT INTO lots
	SET title = 'Маска Oakley Canopy', image = 'img/lot-6.jpg', price = '5400';
	
	
INSERT INTO users
	name = 'Юлия', avatar = 'img/user.jpg';
	
	
CREATE UNIQUE INDEX name ON users(name);	
CREATE INDEX all_lots ON lots(title); 


	
