
/*
USE mysql;
SET global general_log = 0;
SET global log_output = 'table';
*/
USE tienda;

SELECT * FROM usuarios ORDER BY nombre LIMIT 4 OFFSET 2 ;