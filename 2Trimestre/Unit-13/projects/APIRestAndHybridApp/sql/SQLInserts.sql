use biblioteca;
INSERT INTO BOOKS VALUES (1, 'Don Quijote de La Mancha I', 'Anaya', 'Miguel de Cervantes', 'Caballeresco', 'España', 517, '1991-01-01', 2750);
INSERT INTO BOOKS VALUES (2, 'Don Quijote de La Mancha II', 'Anaya', 'Miguel de Cervantes', 'Caballeresco', 'España', 611, '1991-01-01', 3125);
INSERT INTO BOOKS VALUES (3, 'Historias de Nueva Orleans', 'Alfaguara', 'William Faulkner', 'Novela', 'Estados Unidos', 186, '1985-01-01', 675);
INSERT INTO BOOKS VALUES (4, 'El principito', 'Andina', 'Antoine Saint-Exupery', 'Aventura', 'Francia', 120, '1996-01-01', 750);
INSERT INTO BOOKS VALUES (5, 'El príncipe', 'S.M.', 'Maquiavelo', 'Político', 'Italia', 210, '1995-01-01', 1125);
INSERT INTO BOOKS VALUES (6, 'Diplomacia', 'S.M.', 'Henry Kissinger', 'Político', 'Alemania', 825, '1997-01-01', 1750);
INSERT INTO BOOKS VALUES (7, 'Los Windsor', 'Plaza & Janés', 'Kitty Kelley', 'Biografías', 'Gran Bretaña', 620, '1998-01-01', 1130);
INSERT INTO BOOKS VALUES (8, 'El Último Emperador', 'Caralt', 'Pu-Yi', 'Autobiografías', 'China', 353, '1989-01-01', 995);
INSERT INTO BOOKS VALUES (9, 'Fortunata y Jacinta', 'Plaza & Janés', 'Pérez Galdós', 'Novela', 'España', 625, '1984-01-01', 72);

INSERT INTO USUARIOS VALUES (1, 'Inés', 'Posadas Gil', '42117892S', 'Av. Escaleritas 12', 'Las Palmas G.C.', 'Las Palmas', '71-4-7');
INSERT INTO USUARIOS VALUES (2, 'José', 'Sánchez Pons', '31765348D', 'Mesa y López 51', 'Las Palmas G.C.', 'Las Palmas', '66-9-6');
INSERT INTO USUARIOS VALUES (3, 'Miguel', 'Gómez Sáez', '11542981G', 'Gran Vía 71', 'Madrid', 'Madrid', '76-9-12');
INSERT INTO USUARIOS VALUES (4, 'Eva', 'Santana Páez', '78542450L', 'Pío Baroja 23', 'Bilbao', 'Vizcaya', '80-5-23');
INSERT INTO USUARIOS VALUES (5, 'Yolanda', 'Betancor Díaz', '44312870Z', 'El Cid 45', 'Miranda de Ebro', 'Burgos', '76-9-17');
INSERT INTO USUARIOS VALUES (6, 'Juan Luis', 'Blasco Pita', '47234471P', 'Jaime I, 65', 'Alcira', 'Valencia', '82-3-1');

INSERT INTO PRESTAMOS VALUES (1, 1, 3, '99-11-1', '99-11-15', '99-11-13');
INSERT INTO PRESTAMOS VALUES (2, 3, 2, '99-11-3', '99-11-20', '99-11-22');
INSERT INTO PRESTAMOS VALUES (3, 2, 5, '99-11-18', '99-11-30', '99-11-25');
INSERT INTO PRESTAMOS VALUES (4, 5, 6, '99-11-21', '99-12-3', '99-12-5');
INSERT INTO PRESTAMOS VALUES (5, 9, 2, '99-11-21', '99-12-5', '99-11-30');
INSERT INTO PRESTAMOS VALUES (6, 2, 4, '99-11-26', '99-12-7', '99-12-1');
INSERT INTO PRESTAMOS VALUES (7, 4, 3, '99-11-30', '99-12-7', '99-12-8');
INSERT INTO PRESTAMOS VALUES (8, 1, 1, '99-12-1', '99-12-9', '99-12-11');
INSERT INTO PRESTAMOS VALUES (9, 3, 6, '99-12-3', '99-12-9', '99-12-9');
INSERT INTO PRESTAMOS VALUES (10, 7, 3, '99-12-3', '99-12-18', '99-12-15');
INSERT INTO PRESTAMOS VALUES (11, 3, 2, '99-12-5', '99-12-22', '99-12-20');