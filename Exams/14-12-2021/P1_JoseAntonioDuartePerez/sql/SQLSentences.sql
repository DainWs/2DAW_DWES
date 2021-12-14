DROP DATABASE senderismo;
SET NAMES UTF8;
CREATE DATABASE  IF NOT EXISTS senderismo DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE senderismo;


DROP TABLE IF EXISTS rutas;
CREATE TABLE IF NOT EXISTS rutas (
  id int(11) NOT NULL auto_increment,
  titulo varchar(55) NOT NULL DEFAULT '' ,
  descripcion varchar(200) ,
  desnivel int(6) UNSIGNED NOT NULL DEFAULT '0' ,
  distancia double NOT NULL DEFAULT '0' ,
  notas varchar(200),
  dificultad smallint unsigned NOT NULL DEFAULT '0' ,
  CONSTRAINT pk_rutas PRIMARY KEY(id),
  KEY titulo (titulo)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO rutas VALUES(null,"Cuerda Larga: puerto Navacerrada a Puerto la Morcuera","Cuerda Larga Desde el Puerto de Navacerrada al Puerto de la Morcuera, con sus 9 cumbres superiores a 2000 m.","1000","20.64","Las Montañas o Cumbres que conforman la Cuerda Larga ordenados de Oeste a Este son:
- Bola del Mundo 2.258 m
- Alto de Valdemartin, 2.283 m
- Cabeza de Hierro Menor, 2.376 m
- Cabeza de Hierro Mayor, 2.382 m
- Loma del Pandasco, 2.244 m
- Navahondilla, 2.234 m
- Asomate de Hoyos, 2.242 m
- Bailanderos, 2.133 m
- La Najarra, 2.120 m","2");
INSERT INTO rutas VALUES(null,"De Barcelona a Valldoreix por Collserola","Ruta en bicicleta que cruza Collserola, sale de Barcelona por la carretera de Cerdanyola y nos deja en la estacion de los FGC de Valldoreix","277","20.85","Estupenda ruta para empezar.","1");
INSERT INTO rutas VALUES(null,"Los 4 puentes. ","Manzaneros. Avila","538","43.29","Dehesa del Pinar (Dehesa \"de los perrillos\"), camino paralelo a la via del tren, Castro de las Cogotas, Arco de Conejeros, Cardeñosa (1º puente), encinar (2º, 3º y 4º puente), La Alamedilla, Las porteras, Martiherrero, Dehesa de San Mateo, Avila.","2");


DROP TABLE IF EXISTS rutas_comentarios;
CREATE TABLE IF NOT EXISTS rutas_comentarios (
  id smallint NOT NULL auto_increment,
  id_ruta int(11) NOT NULL DEFAULT '0' ,
  nombre varchar(50) NOT NULL DEFAULT '' ,
  texto varchar(200) NOT NULL,
  fecha date NOT NULL,
  CONSTRAINT pk_rutascomentarios PRIMARY KEY(id),
  CONSTRAINT fk_rutascomentarios FOREIGN KEY(id_ruta) REFERENCES rutas(id)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


INSERT INTO rutas_comentarios VALUES(null,"1","Pedro","¡Me ha encantado la ruta!","2021-06-23");
INSERT INTO rutas_comentarios VALUES(null,"2","Irene","Gracias por la información.","2021-06-23");