<!DOCTYPE html>
<!--
Escribe un script que muestre por pantalla todos los números pares del 1 al 100
-->
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<?php
			for ($i=0; $i <= 100; $i++) { 
				if($i%2==0){
					echo "$i<br/>";
				}
			}
		?>
	</body>
</html>