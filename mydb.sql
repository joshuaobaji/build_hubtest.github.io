-- creates a database called rex if it doesnt exist
CREATE DATABASE IF NOT EXISTS rex;
-- this code tells the sql to use the rex database
USE rex;
-- Creates a table to store user information
CREATE TABLE rexregister (
    id INT(11) NOT NULL AUTO_INCREMENT,
    first_name VARCHAR(30) NOT NULL,
    last_name VARCHAR(30) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(200) NOT NULL,
    username VARCHAR(30) NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIME,
    PRIMARY KEY (id)
);
