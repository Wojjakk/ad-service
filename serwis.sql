DROP DATABASE IF EXISTS serwis;

CREATE DATABASE serwis CHARACTER SET utf8 COLLATE utf8_polish_ci;

CREATE TABLE users( 
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username varchar(255) UNIQUE NOT NULL,
    imie varchar(255),
    nazwisko varchar(255),
    email varchar(255) UNIQUE NOT NULL,
    haslo varchar(255)
);

