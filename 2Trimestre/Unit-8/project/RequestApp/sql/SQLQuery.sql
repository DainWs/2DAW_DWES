
USE mysql;
SET global general_log = 0;
SET global log_output = 'table';
USE tienda;



SELECT * FROM usuarios WHERE email = ' jose.ant.du@gmail.com ';