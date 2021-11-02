<!DOCTYPE html>
<!--
Escribe una  función para calcular potencias. 

La función recibe como argumentos la base y el exponente (que es opcional y tiene por defecto el valor 2)
-->
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<?php
			$num1 = 1;
			if (isset($_GET['num1'])) {
				$num1 = is_numeric($_GET['num1']) ? $_GET['num1'] : $num1;
			}
			
			$num2 = 1;
			if (isset($_GET['num2'])) {
				$num2 = is_numeric($_GET['num2']) ? $_GET['num2'] : $num2;
			}
		?>
		<?php
			function potenciaDe($base, $exponente = 2) {
				for ($i = 1; $i < $exponente ; $i++) { 
					$base *= $base;
				}
				return $base;
			}

			echo 'Potencia de ' . $num1 . ' sobre ' . $num2 . ': ' . potenciaDe($num1, $num2);
			echo '<br/>';
			echo '<br/>';
			echo '<br/>';
			echo '<br/>';
			echo 'Potencia de 3: ' . potenciaDe(3);
			echo '<br/>';
			echo 'Potencia de 2 sobre 4: ' .potenciaDe(2, 4);
			echo '<br/>';
			echo 'Potencia de 10: ' .potenciaDe(10);
			echo '<br/>';
			echo 'Potencia de 3 sobre 3: ' .potenciaDe(3, 3);
		?>
	</body>
</html>