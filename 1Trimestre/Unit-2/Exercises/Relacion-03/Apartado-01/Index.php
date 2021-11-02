<!--
Escribe un script que almacene un array de 8 números enteros:

	a.recorrerá el array y lo mostrará
	b.lo ordenará y lo mostrará
	c.mostrará su longitud
	d.buscará un elemento dentro del array
	e.buscará un elemento dentro del array, pero por el parámetro que llegue a la URL

Para mostrar los elementos del array en cada uno de los apartados se creará una función llamada mostrarArray().
-->
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
			// A
			function mostrarArray($array) {
				echo "array: {<br/>";
				foreach ($array as $key => $value) {
					echo "$key => $value<br/>";
				}
				echo "}<br/>";
			}

			//B
			function sortArray($array) {
				sort($array);
				mostrarArray($array);
			}

			//C
			function showLength($array) {
				echo 'Array size: ' . count($array) . '<br/>';
			}

			//D
			function getBy($array, $value) {
				$myKey = array_search($value, $array);
				echo "The key is: $myKey";
				return $myKey;
			}

			//E
			function get($array) {
				$myKey = null;
				if (isset($_GET['Key'])) {
					$value = $_GET['Key'];
					$myKey = get($array, $value);
				}
				return $myKey;
			}

			function showArrayInformation($array) {
				echo 'Desordenada<br/>';
				mostrarArray($array);
				echo 'Ordenada<br/>';
				sortArray($array);
				showLength($array);
				getBy($array, 5);
				get($array);
			}

			$array = [0,9,2,7,4,"b"=>5,3,8,1];
			showArrayInformation($array);
		?>
	</body>
</html>