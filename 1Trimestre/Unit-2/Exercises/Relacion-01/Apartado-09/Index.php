<!DOCTYPE html>
<!--
Escribe un programa que permita realizar las operaciones básicas de una calculadora: suma, resta, multiplicación y división. (Deberemos recoger dos números por URL con GET)
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
			}

			$operator = 'All';
			if (isset($_GET['operator'])) {
				$operator = $_GET['operator'];
			}
		?>

		<?php 
			switch ($operator) {
			 case '+':
			 	echo 'suma : ';
				echo $num1 + $num2;
				echo '<br/>';
				break; 
			 case '-': 
			 	echo 'resta : ';
				echo $num1 - $num2; 
				echo '<br/>';
				break; 
			 case '*': 
			 	echo 'multiplicacion : ';
				echo $num1 * $num2; 
				echo '<br/>';
				break; 
			 case '/': 
			 	echo 'division : ';
				echo $num1 / $num2; 
				echo '<br/>';
				break; 
			 case 'All': 
			 	echo 'suma : ';
				echo $num1 + $num2; 
				echo '<br/>';
				echo 'resta : ';
				echo $num1 - $num2;
				echo '<br/>';
				echo 'multiplicacion : ';
				echo $num1 * $num2;
				echo '<br/>';
				echo 'division : ';
				echo $num1 / $num2;
				break;
			}
		?>
		

	</body>
</html>