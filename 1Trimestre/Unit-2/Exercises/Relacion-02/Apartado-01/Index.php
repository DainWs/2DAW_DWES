<!DOCTYPE html>
<!--
Escribe la función calculador:
la función calculador recibe como argumentos dos números y  la operación que debe de aplicarles ( en realidad, la función que queremos aplicar). Según que función se le pase como argumento, devolverá un valor u otro. Suma, resta, multiplicación, etc.
-->
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<?php
			function suma($num1, $num2) {
				return $num1 + $num2;
			}

			function resta($num1, $num2) {
				return $num1 - $num2;
			}

			function multiplicacion($num1, $num2) {
				return $num1 * $num2;
			}

			function division($num1, $num2) {
				return $num1 / $num2;
			}

			function calculadora($num1, $num2, $operation) {
				return $operation($num1, $num2);
			}

			echo 'suma: ';
			echo calculadora(5, 6, 'suma');
			echo '<br/>resta: ' ;
			echo calculadora(5, 6, 'resta');
			echo '<br/>multiplicacion: ' ;
			echo calculadora(5, 6, 'multiplicacion');
			echo '<br/>division: ' ;
			echo calculadora(5, 10, 'division');
		?>
	</body>
</html>
