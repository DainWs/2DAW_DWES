use biblioteca;
SELECT 
	l0_.id AS id_0, 
	l0_.titulo AS titulo_1, 
	l0_.editorial AS editorial_2, 
	l0_.autor AS autor_3, 
	l0_.genero AS genero_4, 
	l0_.pais AS pais_5, 
	l0_.n_paginas AS n_paginas_6, 
	l0_.year AS year_7, 
	l0_.precio AS precio_8 
FROM libros l0_ 
ORDER BY l0_.id ASC LIMIT 10