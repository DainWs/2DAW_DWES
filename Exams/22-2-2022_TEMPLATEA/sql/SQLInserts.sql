/*
 * Insert all values into Tienda database
 * Execute this after SQLSentences.sql
 */
USE exam_20-02-2022_JoseDuarte;

INSERT INTO usuarios VALUES(0, 'Jose Antonio', 'Duarte Pérez', 'jose.ant.du@gmail.com', 'c893bad68927b457dbed39460e6afd62');
INSERT INTO usuarios VALUES(0, 'Admin', '', 'admin@gmail.com', 'c893bad68927b457dbed39460e6afd62');
INSERT INTO usuarios VALUES(0, 'Pepito', 'Sanchez', 'pepito@gmail.com', 'c893bad68927b457dbed39460e6afd62');
INSERT INTO usuarios VALUES(0, 'Javier', 'Pérez', 'javier@gmail.com', 'c893bad68927b457dbed39460e6afd62');
INSERT INTO usuarios VALUES(0, 'Alverto', 'Fuentes', 'alverto@gmail.com', 'c893bad68927b457dbed39460e6afd62');
INSERT INTO usuarios VALUES(0, 'MºCarmen', 'Pérez Lorca', 'mcarmen@gmail.com', 'c893bad68927b457dbed39460e6afd62');
INSERT INTO usuarios VALUES(0, 'Sara', 'Martinez', 'sara@gmail.com', 'c893bad68927b457dbed39460e6afd62');
COMMIT;