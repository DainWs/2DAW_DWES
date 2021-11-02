<!DOCTYPE html>
<!--
Programa que compruebe que si una variable esta vacía

en caso de que lo esté se rellenará con una frase en minúscula y a continuación se mostrará por pantalla en mayúscula
si no lo está se saca el contenido de la variable
-->
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<?php
			define("FRASE_MINUSCULA", "frase en minuscula");

			function check(&$var) {
				if (empty($var) || is_null($var)) {
					$var = FRASE_MINUSCULA;
					echo 'En minuscula: ' . FRASE_MINUSCULA . ',';
					echo 'En mayuscula: ' . strtoupper($var);
				} else {
					echo "Sacar contenido de la variable: $var";
				}
			}

			$a = 3;
			check($a);
			echo '<br/>';
			$a = NULL;
			check($a);
			echo '<br/>';
			$a = "hola";
			check($a);
			echo '<br/>';
			$a = "";
			check($a);
		?>
	</body>
</html>