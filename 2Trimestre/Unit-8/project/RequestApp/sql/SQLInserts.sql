USE tienda;

INSERT INTO usuarios VALUES(0, 'Jose Antonio', 'Duarte Pérez', 'jose.ant.du@gmail.com', 'c893bad68927b457dbed39460e6afd62', 'Admin');
INSERT INTO usuarios VALUES(0, 'Admin', '', 'admin@gmail.com', 'c893bad68927b457dbed39460e6afd62', 'Admin');
INSERT INTO usuarios VALUES(0, 'Pepito', 'Sanchez', 'pepito@gmail.com', 'c893bad68927b457dbed39460e6afd62', 'comprador');
INSERT INTO usuarios VALUES(0, 'Javier', 'Pérez', 'javier@gmail.com', 'c893bad68927b457dbed39460e6afd62', 'comprador');
INSERT INTO usuarios VALUES(0, 'Alverto', 'Fuentes', 'alverto@gmail.com', 'c893bad68927b457dbed39460e6afd62', 'comprador');
INSERT INTO usuarios VALUES(0, 'MºCarmen', 'Pérez Lorca', 'mcarmen@gmail.com', 'c893bad68927b457dbed39460e6afd62', 'comprador');
INSERT INTO usuarios VALUES(0, 'Sara', 'Martinez', 'sara@gmail.com', 'c893bad68927b457dbed39460e6afd62', 'proveedor');
COMMIT;

INSERT INTO categorias VALUES(0, 'Ropa');
INSERT INTO categorias VALUES(0, 'Videojuegos');
INSERT INTO categorias VALUES(0, 'Muebles');
INSERT INTO categorias VALUES(0, 'Herramientas');
INSERT INTO categorias VALUES(0, 'Disfraces');
INSERT INTO categorias VALUES(0, 'Utensilios');
INSERT INTO categorias VALUES(0, 'Libros');
COMMIT;

INSERT INTO productos VALUES(0, 1, 'Bufanda-LR', 'Bufanda de lana roja', 3.5, 15, 20, NOW(), 'Bufanda-LR.png');
INSERT INTO productos VALUES(0, 2, 'Minecraft', 'Juego de supervivencia', 21.99, 999, 0, NOW(), 'Minecraft.png');
INSERT INTO productos VALUES(0, 3, 'MesaR', 'Mesa de madera de roble 1mx3m', 120, 5, 0, NOW(), 'MesaR.png');
INSERT INTO productos VALUES(0, 1, 'Bufanda-LA', 'Bufanda de lana azul', 3.5, 15, 20, NOW(), 'Bufanda-LA.png');
INSERT INTO productos VALUES(0, 1, 'Bufanda-LV', 'Bufanda de lana verde', 3.5, 15, 20, NOW(), 'Bufanda-LV.png');
INSERT INTO productos VALUES(0, 1, 'Bufanda-LM', 'Bufanda de lana morada', 3.5, 15, 20, NOW(), 'Bufanda-LM.png');
INSERT INTO productos VALUES(0, 3, 'MesaA', 'Mesa de madera de abeto 1mx3m', 120, 19, 0, NOW(), 'MesaA.png');
INSERT INTO productos VALUES(0, 3, 'MesaRF', 'Mesa de madera de roble familiar 2mx6m', 320, 8, 0, NOW(), 'MesaRF.png');
INSERT INTO productos VALUES(0, 3, 'MesaAF', 'Mesa de madera de roble familiar 2mx6m', 320, 10, 0, NOW(), 'MesaAF.png');
INSERT INTO productos VALUES(0, 10, 'TazaMSpiderman', 'Taza Marvel de Spiderman', 3.99, 160, 5, NOW(), 'TazaMSpiderman.png');
INSERT INTO productos VALUES(0, 10, 'TazaMIronman', 'Taza Marvel de Ironman', 3.99, 100, 5, NOW(), 'TazaMIronman.png');
INSERT INTO productos VALUES(0, 9, 'Libro001', 'Libro de cocina', 8.99, 100, 5, NOW(), 'Libro001.png');
INSERT INTO productos VALUES(0, 9, 'Libro002', 'Libro de cocina 2', 8.99, 100, 5, NOW(), 'Libro002.png');
INSERT INTO productos VALUES(0, 9, 'Libro003', 'Libro de cocina 3', 8.99, 100, 5, NOW(), 'Libro003.png');
INSERT INTO productos VALUES(0, 9, 'Libro004', 'Libro de cocina 4', 8.99, 100, 5, NOW(), 'Libro004.png');
INSERT INTO productos VALUES(0, 9, 'Libro101', 'Libro de dibujo', 5.99, 100, 5, NOW(), 'Libro101.png');
INSERT INTO productos VALUES(0, 9, 'Libro102', 'Libro de dibujo 2', 5.99, 100, 5, NOW(), 'Libro102.png');
INSERT INTO productos VALUES(0, 9, 'Libro103', 'Libro de dibujo 3', 5.99, 100, 5, NOW(), 'Libro103.png');
INSERT INTO productos VALUES(0, 9, 'Libro104', 'Libro de dibujo 4', 5.99, 100, 5, NOW(), 'Libro104.png');
INSERT INTO productos VALUES(0, 9, 'Libro201', 'Comic de marvel - Spiderman 1', 9.99, 78, 5, NOW(), 'Libro201.png');
INSERT INTO productos VALUES(0, 9, 'Libro301', 'Comic de marvel - Spiderman 2', 9.99, 100, 5, NOW(), 'Libro301.png');
COMMIT;

INSERT INTO pedidos VALUES(0, 1, 'Andalucía', 'Granada', 'Pulianas, La joya, Clle Topacio, Nº9', 123.5, 'Llegando', NOW(), NOW());
INSERT INTO pedidos VALUES(0, 3, 'Andalucía', 'Granada', 'Unkown', 50.98, 'Preparandolo', NOW(), NOW());
COMMIT;

INSERT INTO lineas_pedidos VALUES(0, 1, 1, 1);
INSERT INTO lineas_pedidos VALUES(0, 1, 3, 1);
INSERT INTO lineas_pedidos VALUES(0, 2, 2, 2);
INSERT INTO lineas_pedidos VALUES(0, 2, 4, 2);
COMMIT;