<!DOCTYPE html>
<!--
Crea un script que añada valores a un array mientras que su longitud sea menor que 120.
Después mostrará la información del array por pantalla
-->
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<?php
			$array = [];
			do {
				array_push($array,rand(1,200));
			} while (count($array) < 120);
			
			echo "array: {<br/>";
			foreach ($array as $key => $value) {
				echo "$key => $value<br/>";
			}
			echo "}<br/>";
    	?>
	</body>
</html>
