<!DOCTYPE php>
<!--
Escriba un script muestre la tirada de dos dados al azar (usar rand) y diga:

- si ha salido una pareja de valores iguales
- o el mayor de los valores que se han obtenido en la tirada
-->
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title></title>
		<style type="text/css">
			div {
				width: 65px;
				height: 70px;
				object-fit: none;
				overflow: hidden;
			}

			img {
				height: 200px;
				transform: translate(0px, -65px);
			}
		</style>
	</head>
	<body>
		<?php 
			$num1 = rand(1,6);
			$num2 = rand(1,6);
		?>
		<div>
			<img src="images/dados.png" style="transform: translate(<?php echo (-67 * ($num1 - 1));?>px, -65px);">
		</div>
		<div>
			<img src="images/dados.png" style="transform: translate(<?php echo (-67 * ($num2 - 1));?>px, -65px);">
		</div>
		<?php
			echo "El primer dado ha sacado $num1 <br/>";
			echo "El segundo dado ha sacado $num2 <br/><br/>";

			if ($num1 == $num2) {
				echo 'ha salido una pareja de valores iguales';
			}
			else if ($num1 > $num2) {
				echo "El mayor de los valores $num1";
			}
			else {
				echo "El mayor de los valores $num2";
			}	
		?>
	</body>
</html>