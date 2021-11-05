# 4. Otras funciones
Analiza el siguiente script de ejemplo y explica qué hace.

```
<?php
  $contenido = file_get_contents("fichero_ejemplo.txt");
	echo "Contenido del fichero: $contenido<br>";
	$res = file_put_contents("fichero_salida.txt", "Fichero creado con file_put_contents");
	if($res){
		echo "Fichero creado con éxito";
	}else{
		echo "Error al crear el fichero";
	}
```

## 1º Esta linea lee el contenido del fichero llamado "fichero_ejemplo.txt":
```
$contenido = file_get_contents("fichero_ejemplo.txt");
```

## 2º Esta linea muestra dicho contenido del fichero:
```
echo "Contenido del fichero: $contenido<br>";
```

## 3º Esta linea crea un archivo nuevo llamado "fichero_salida.txt" con el contenido "Fichero creado con file_put_contents", al acabar la variable $res sera true si se creo correctamente y false si no:
```
$res = file_put_contents("fichero_salida.txt", "Fichero creado con file_put_contents");
```

## 4º En este if, se comprueba si la creacion del fichero anterior se realizo con existo, en caso de que se realizara con exito, se mostrara "Fichero creado con éxito" y en caso de que no sea exitosa se mostrara "Error al crear el fichero".
```
if($res){
	echo "Fichero creado con éxito";
}else{
	echo "Error al crear el fichero";
}
```