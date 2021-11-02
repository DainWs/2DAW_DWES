<!DOCTYPE html>
<!--
Mostrar la diferencia entre el Echo y el Print
-->
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<?php
		echo 'Hola, soy Jose<br/>';
		echo 'returned value: None<br/>';

		echo 'Una diferencia mas es la ', ', posibilidad de esto', ', pero print no puede pasar varias cadenas de texto del tirón','<br/>','<br/>';

		$returnedValue = print('Hola, soy Jose<br/>');
		print('returned value: ' . $returnedValue . '<br/>');


		?>
	</body>
</html>