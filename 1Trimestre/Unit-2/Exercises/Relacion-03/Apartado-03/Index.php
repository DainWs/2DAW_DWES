<!DOCTYPE html>
<!--
Escribe un script que rellene un array con valores aleatorios (0,1) y lo muestre. A continuación, calcularemos su complementario y también la mostraremos.
-->
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<?php
			function complementario($array) {
				$complementario = [];
				echo "complementario: ";
				foreach ($array as $key => $value) {
					$num = 0;
					if ($value == 0) {
						$num = 1;
					}
					echo "$num";
					array_push($complementario, $num);
				}
				echo "<br/>";

				$complementario = array_reverse($complementario);
				$i = 0;
				$sum = 1;
				do {
					if(count($complementario) <= $i) {
						array_push($complementario, $sum);
						$sum = 0;
					}
					else {
						$result = $complementario[$i] + $sum;
						$sum = 0;
						if($result > 1) {
							$result = 0;
							$sum = 1;
						}
						$complementario[$i++] = $result;
					}
				} while ($sum != 0);

				return array_reverse($complementario);

			}

			$array = [];
			$max = rand(2,10);
			while (count($array) < $max) {
				array_push($array, rand(0,1));
			} 
			
			echo "array: ";
			foreach ($array as $key => $value) {
				echo "$value";
			}
			echo "<br/>";

			$complementario = complementario($array);

			echo "complementario + 1: ";
			foreach ($complementario as $key => $value) {
				echo "$value";
			}
			echo "<br/>";
    	?>
	</body>
</html>
