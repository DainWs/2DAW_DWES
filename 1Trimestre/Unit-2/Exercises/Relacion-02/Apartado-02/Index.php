<!DOCTYPE html>
<!--
Escribe una función para calcular el factorial de un número que recibirá como argumento
-->
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<?php

			function factorialDe($num) {
				$result = 1;
				for ($i=1; $i <= $num; $i++) { 
					$result *= $i;
				}
				return $result;
			}

			echo factorialDe(3);
		?>
	</body>
</html>