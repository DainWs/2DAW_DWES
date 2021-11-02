<!DOCTYPE html>
<!--
En el ejercicio 5 se creó una función que nos devolvía la fecha en castellano. Guarda esa función en un archivo y crea una nueva página PHP que incluya este fichero y utilice la función para mostrar en pantalla la fecha obtenida. 

Uso de include.
-->
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<?php include('../Apartado-05/index.php'); ?>
		<?php
			echo "la fecha actual: " . getCurrentDate();
    	?>
	</body>
</html>
