<!DOCTYPE html>
<!--
Crear tres variables: país, habitantes y continente a los que les darás un valor. Muestra su valor por pantalla junto con el tipo de dato que tiene cada una de ellas
-->
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<?php
            $pais = "Spain";
            $habitantes = 46940000;
            $continente = "Europa";
            echo "Pais: $pais, Tipo : " . getType($pais) . "<br/>";
            echo "Habitantes: $habitantes, Tipo : " . getType($habitantes) . "<br/>";
            echo "Continente: $continente, Tipo : " . getType($continente) . "<br/>";
        ?>
	</body>
</html>