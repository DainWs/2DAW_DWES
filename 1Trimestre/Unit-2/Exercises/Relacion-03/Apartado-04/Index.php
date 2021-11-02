<!DOCTYPE html>
<!--
Escriba un script PHP que:

Guarde en un array 20 valores aleatorios entre 0 y 100.
En un segundo array, llamado cuadrados, deberá almacenar los cuadrados de los valores que hay en el primer array.
En un tercer array, llamado cubo, se deben almacenar los cubos de los valores que hay en el primer array.
Por último, se mostrará el contenido de los tres arrays dispuesto en tres columnas paralelas.
-->
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<style type="text/css">
			th {text-align: left;background: #4169E1;color: white;min-width: 90px;}
			td, th, table {	border: 1px solid black;}
			td {min-width: 50px;}
			table {	border-collapse: collapse; }
		</style>
	</head>
	<body>
		<?php
			$array = [];
			do {
				array_push($array, rand(0,100));
			} while (count($array) < 20);

			$cuadrados = [];
			foreach ($array as $key => $value) {
				array_push($cuadrados, pow($value, 2));
			}

			$cubos = [];
			foreach ($array as $key => $value) {
				array_push($cubos, pow($value, 3));
			}
    	?>

    	<table>
    		<tr>
    			<th style="text-align: left;">Numeros</th>
    			<th>Cuadrados</th>
    			<th>Cubos</th>
    		</tr>
    		<tr>
    			<?php
    				for ($i=0; $i < count($array) ; $i++) { 
    					echo "<tr>";
    					echo "<td>".$array[$i]."</td>";
    					echo "<td>".$cuadrados[$i]."</td>";
    					echo "<td>".$cubos[$i]."</td>";
    					echo "</tr>";
    				}
    			?>
    		</tr>
    	</table>

	</body>
</html>
