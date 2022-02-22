/*
 * This is the first SQL file to execute, this one will create:
 * - Database
 * - Tables
 * 
 * If you want to have a specific user for this database, 
 * you can execute SQLMyUser.sql after this
 */
/* DROP DATABASE exam_20022022_JoseDuarte; */
SET NAMES UTF8;
CREATE DATABASE IF NOT EXISTS exam_20022022_JoseDuarte;
USE exam_20022022_JoseDuarte;

DROP TABLE IF EXISTS reservas;
DROP TABLE IF EXISTS butacas;
DROP TABLE IF EXISTS usuarios;

CREATE TABLE IF NOT EXISTS usuarios( 
id              int(255) auto_increment not null,
nombre          varchar(100) not null,
email           varchar(255) not null,
password        varchar(255) not null,
CONSTRAINT pk_usuarios PRIMARY KEY(id),
CONSTRAINT uq_email UNIQUE(email),
CONSTRAINT uq_nombre UNIQUE(nombre)
)ENGINE=InnoDb DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
COMMIT;

CREATE TABLE IF NOT EXISTS butacas( 
    id              int(255) auto_increment not null,
    fila            int(255) not null,
    columna         int(255) not null,
    ocupada         boolean not null,
    CONSTRAINT pk_butacas PRIMARY KEY(id),
    CONSTRAINT uq_butacas UNIQUE(fila, columna)
)ENGINE=InnoDb DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
COMMIT;

CREATE TABLE IF NOT EXISTS reservas( 
    usuario_id      int(255) not null,
    butaca_id       int(255) not null,
    CONSTRAINT pk_reserva PRIMARY KEY(usuario_id, butaca_id)
)ENGINE=InnoDb DEFAULT CHARSET=utf8 COLLATE=utf8_bin;