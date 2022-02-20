/*
 * This is the first SQL file to execute, this one will create:
 * - Database
 * - Tables
 * 
 * If you want to have a specific user for this database, 
 * you can execute SQLMyUser.sql after this
 */
/* DROP DATABASE exam_20-02-2022_JoseDuarte; */
SET NAMES UTF8;
CREATE DATABASE IF NOT EXISTS exam_20-02-2022_JoseDuarte;
USE exam_20-02-2022_JoseDuarte;

DROP TABLE IF EXISTS usuarios;

CREATE TABLE IF NOT EXISTS usuarios( 
id              int(255) auto_increment not null,
nombre          varchar(100) not null,
apellidos       varchar(255),
email           varchar(255) not null,
password        varchar(255) not null,
CONSTRAINT pk_usuarios PRIMARY KEY(id),
CONSTRAINT uq_email UNIQUE(email)  
)ENGINE=InnoDb DEFAULT CHARSET=utf8 COLLATE=utf8_bin;