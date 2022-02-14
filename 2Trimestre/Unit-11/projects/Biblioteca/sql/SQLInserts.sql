use biblioteca;
$this->addSql("INSERT INTO LIBROS VALUES (1, 'Don Quijote de La Mancha I', 'Anaya', 'Miguel de Cervantes', 'Caballeresco', 'España', 517, '01-01-1991', 2750);");
$this->addSql("INSERT INTO LIBROS VALUES (2, 'Don Quijote de La Mancha II', 'Anaya', 'Miguel de Cervantes', 'Caballeresco', 'España', 611, '01-01-1991', 3125);");
$this->addSql("INSERT INTO LIBROS VALUES (3, 'Historias de Nueva Orleans', 'Alfaguara', 'William Faulkner', 'Novela', 'Estados Unidos', 186, '01-01-1985', 675);");
$this->addSql("INSERT INTO LIBROS VALUES (4, 'El principito', 'Andina', 'Antoine Saint-Exupery', 'Aventura', 'Francia', 120, '01-01-1996', 750);");
$this->addSql("INSERT INTO LIBROS VALUES (5, 'El príncipe', 'S.M.', 'Maquiavelo', 'Político', 'Italia', 210, '01-01-1995', 1125);");
$this->addSql("INSERT INTO LIBROS VALUES (6, 'Diplomacia', 'S.M.', 'Henry Kissinger', 'Político', 'Alemania', 825, '01-01-1997', 1750);");
$this->addSql("INSERT INTO LIBROS VALUES (7, 'Los Windsor', 'Plaza & Janés', 'Kitty Kelley', 'Biografías', 'Gran Bretaña', 620, '01-01-1998', 1130);");
$this->addSql("INSERT INTO LIBROS VALUES (8, 'El Último Emperador', 'Caralt', 'Pu-Yi', 'Autobiografías', 'China', 353, '01-01-1989', 995);");
$this->addSql("INSERT INTO LIBROS VALUES (9, 'Fortunata y Jacinta', 'Plaza & Janés', 'Pérez Galdós', 'Novela', 'España', 625, '01-01-1984', 72);");

$this->addSql("INSERT INTO USUARIOS VALUES (1, 'Inés', 'Posadas Gil', '42117892S', 'Av. Escaleritas 12', 'Las Palmas G.C.', 'Las Palmas', '7-4-71');");
$this->addSql("INSERT INTO USUARIOS VALUES (2, 'José', 'Sánchez Pons', '31765348D', 'Mesa y López 51', 'Las Palmas G.C.', 'Las Palmas', '6-9-66');");
$this->addSql("INSERT INTO USUARIOS VALUES (3, 'Miguel', 'Gómez Sáez', '11542981G', 'Gran Vía 71', 'Madrid', 'Madrid', '12-9-76');");
$this->addSql("INSERT INTO USUARIOS VALUES (4, 'Eva', 'Santana Páez', '78542450L', 'Pío Baroja 23', 'Bilbao', 'Vizcaya', '23-5-80');");
$this->addSql("INSERT INTO USUARIOS VALUES (5, 'Yolanda', 'Betancor Díaz', '44312870Z', 'El Cid 45', 'Miranda de Ebro', 'Burgos', '17-9-76');");
$this->addSql("INSERT INTO USUARIOS VALUES (6, 'Juan Luis', 'Blasco Pita', '47234471P', 'Jaime I, 65', 'Alcira', 'Valencia', '1-3-82');");

$this->addSql("INSERT INTO PRESTAMOS VALUES (1, 1, 3, '99-11-1', '99-11-15', '99-11-13');");
$this->addSql("INSERT INTO PRESTAMOS VALUES (2, 3, 2, '99-11-3', '99-11-20', '99-11-22');");
$this->addSql("INSERT INTO PRESTAMOS VALUES (3, 2, 5, '99-11-18', '99-11-30', '99-11-25');");
$this->addSql("INSERT INTO PRESTAMOS VALUES (4, 5, 6, '99-11-21', '99-12-3', '99-12-5');");
$this->addSql("INSERT INTO PRESTAMOS VALUES (5, 9, 2, '99-11-21', '99-12-5', '99-11-30');");
$this->addSql("INSERT INTO PRESTAMOS VALUES (6, 2, 4, '99-11-26', '99-12-7', '99-12-1');");
$this->addSql("INSERT INTO PRESTAMOS VALUES (7, 4, 3, '99-11-30', '99-12-7', '99-12-8');");
$this->addSql("INSERT INTO PRESTAMOS VALUES (8, 1, 1, '99-12-1', '99-12-9', '99-12-11');");
$this->addSql("INSERT INTO PRESTAMOS VALUES (9, 3, 6, '99-12-3', '99-12-9', '99-12-9');");
$this->addSql("INSERT INTO PRESTAMOS VALUES (10, 7, 3, '99-12-3', '99-12-18', '99-12-15');");
$this->addSql("INSERT INTO PRESTAMOS VALUES (11, 3, 2, '99-12-5', '99-12-22', '99-12-20');");