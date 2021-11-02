<!DOCTYPE html>
<!--
Escribe una función que calcule el máximo común divisor de dos números y un programa para probarla.
-->
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<?php
			
			function getMCD($num1, $num2) {
				while($num1 != $num2) {
					if ($num1 > $num2) {
						$num1 = $num1 - $num2;
					}
					else {
						$num2 = $num2 - $num1;
					}
				} 
				return $num1;
			}

			$num1 = 10;
			$num2 = 6;
			echo "El MCD de $num1 y $num2 es " . getMCD($num1, $num2) . '<br/>';
			$num1 = 5;
			$num2 = 25;
			echo "El MCD de $num1 y $num2 es " . getMCD($num1, $num2) . '<br/>';
			$num1 = 54;
			$num2 = 23;
			echo "El MCD de $num1 y $num2 es " . getMCD($num1, $num2) . '<br/>';
			$num1 = 56;
			$num2 = 80;
			echo "El MCD de $num1 y $num2 es " . getMCD($num1, $num2) . '<br/>';
    	?>
	</body>
</html>