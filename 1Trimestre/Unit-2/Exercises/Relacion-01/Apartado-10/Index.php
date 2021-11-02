<!DOCTYPE html>
<!--
Haz un script para mostrar todos los números comprendidos entre los dos valores que nos lleguen por la URL. Por ejemplo, si llegan el 5 y el 9 mostraremos los valores 6,7 y 8.

Deberemos asegurarnos de que hemos recibido los dos parámetros y que el primer número es menor que el segundo.
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

		Numeros comprendidos entre <?php echo $num1; ?> y <?php echo $num2; ?> <br/>
		<?php
			for ($i=$num1 + 1; $i < $num2; $i++) {
				echo "$i, ";
			}
		?>
	</body>
</html>