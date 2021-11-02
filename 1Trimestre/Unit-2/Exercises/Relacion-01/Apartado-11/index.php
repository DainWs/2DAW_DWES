<!DOCTYPE html>
<!--
 Imprimir por pantalla todas las tablas de multiplicar de 1 a 10 dentro de una tabla HTML
-->
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title></title>
		<style type="text/css">
			table, th, tr, td {border: 1px solid black;}
			
		</style>
	</head>
	<body>
		<table>
			<tr>
				<?php
					for ($i=1; $i <= 10; $i++) { 
						echo "<th>Tabla del $i</th>";
					}
				?>
			</tr>
			<tr>
				<?php
					for ($i=1; $i <= 10; $i++) { 
						echo "<td>";
						for ($j=1; $j <= 10; $j++) { 
							echo "$j x $i = " . ($j * $i) . "<br/>";
						}
						echo "</td>";
					}
				?>
			</tr>
		</table>
	</body>
</html>