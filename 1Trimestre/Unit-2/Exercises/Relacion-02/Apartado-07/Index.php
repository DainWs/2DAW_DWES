<!DOCTYPE html>
<!--
Escribe una función para comprobar si un número es primo y un programa para probarla
-->
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<?php
			
			function esPrimo($num) {
				$esPrimo = true;
				for ($i=2; $i < $num ; $i++) { 
					if ($num%$i == 0) {
						$esPrimo = false;
					}
				}
				return $esPrimo;
			}

			$num = 10;
			echo 'El numero ' . $num . ((esPrimo($num)) ? ' es ' : ' no es ') . 'primo.<br/>';
			$num = 5;
			echo 'El numero ' . $num . ((esPrimo($num)) ? ' es ' : ' no es ') . 'primo.<br/>';
			$num = 20;
			echo 'El numero ' . $num . ((esPrimo($num)) ? ' es ' : ' no es ') . 'primo.<br/>';
			$num = 60;
			echo 'El numero ' . $num . ((esPrimo($num)) ? ' es ' : ' no es ') . 'primo.<br/>';
    	?>
	</body>
</html>