<!DOCTYPE html>
<!--
Modificación del ejercicio  7  para mostrar todos los números impares entre dos números que nos lleguen  por la URL usando parámetros con GET
-->
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<?php 
			$num1 = 0;
			if (isset($_GET['num1'])) {
				$num1 = is_numeric($_GET['num1']) ? $_GET['num1'] : 0;
			}

			$num2 = 0;
			if (isset($_GET['num2'])) {
				$num2 = is_numeric($_GET['num2']) ? $_GET['num2'] : 0;

				if ($num2 <= $num1) {
					$num2 = $num1 + 1;
				}
			}
		?>
		<?php
			for ($i=$num1; $i <= $num2; $i++) { 
				if($i%2!=0){
					echo "$i<br/>";
				}
			}
		?>
	</body>
</html>