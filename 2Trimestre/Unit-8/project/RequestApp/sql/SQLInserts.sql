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
COMMIT;

INSERT INTO productos VALUES(0, 1, 'Bufanda-LR', 'Bufanda de lana roja', 3.5, 15, 20, NOW(), 'Bufanda-LR.png');
INSERT INTO productos VALUES(0, 2, 'Minecraft', 'Juego de supervivencia', 21.99, 999, 0, NOW(), 'Minecraft.png');
INSERT INTO productos VALUES(0, 3, 'MesaR', 'Mesa de madera de roble 1mx3m', 120, 5, 0, NOW(), 'MesaR.png');
INSERT INTO productos VALUES(0, 1, 'Bufanda-LA', 'Bufanda de lana azul', 3.5, 15, 20, NOW(), 'Bufanda-LA.png');
COMMIT;

INSERT INTO pedidos VALUES(0, 1, 'Andalucía', 'Granada', 'Pulianas, La joya, Clle Topacio, Nº9', 123.5, 'Llegando', NOW(), NOW());
INSERT INTO pedidos VALUES(0, 3, 'Andalucía', 'Granada', 'Unkown', 50.98, 'Preparandolo', NOW(), NOW());
COMMIT;

INSERT INTO lineas_pedidos VALUES(0, 1, 1, 1);
INSERT INTO lineas_pedidos VALUES(0, 1, 3, 1);
INSERT INTO lineas_pedidos VALUES(0, 2, 2, 2);
INSERT INTO lineas_pedidos VALUES(0, 2, 4, 2);
COMMIT;