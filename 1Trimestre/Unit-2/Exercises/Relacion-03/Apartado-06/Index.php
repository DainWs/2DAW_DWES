<!DOCTYPE html>
<!--
Escriba un script que cree un array con 15 números aleatorios y los muestre en pantalla. 

A continuación, rotará los elementos de ese array una posición. Es decir, el elemento de la posición 0 debe pasar a la posición 1, el de al 1 a la 2, …, el elemento de la última posición pasará a la posición 0. 

Por último, mostrará el nuevo contenido del array.
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
				array_push($array, rand(0,100));
			} while (count($array) < 15);

			echo "array antes de rotar: {<br/>";
			foreach ($array as $key => $value) {
				echo "$key => $value<br/>";
			}
			echo "}<br/>";

			$last = $array[count($array) - 1];
			for ($i = (count($array) - 1); $i > 0; $i--) { 
				$array[$i] = $array[$i - 1];
			}
			$array[0] = $last;

			echo "array despues de rotar: {<br/>";
			foreach ($array as $key => $value) {
				echo "$key => $value<br/>";
			}
			echo "}<br/>";
    	?>
	</body>
</html>
