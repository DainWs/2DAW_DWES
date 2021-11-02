<!DOCTYPE html>
<!--
Escribe una función que reciba una cadena y comprueba si es una contraseña válida. Hay que comprobar que tenga: 

– Entre 6 y 15 caracteres.
– Al menos un número. 
– Al menos una letra mayúscula. 
– Al menos una letra minúscula. 
– Al menos un carácter no alfanumérico

-->
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<?php

			function validateSize($cadena) {
				return (6 <= strlen($cadena) && strlen($cadena) <= 15);
			}

			function validateNumbers($cadena) {
				return (countEachChar($cadena, "is_numeric") > 0);
			}

			function validateUppercase($cadena) {
				return (countEachChar($cadena, "ctype_upper") > 0);
			}

			function validateLowercase($cadena) {
				return (countEachChar($cadena, "ctype_lower") > 0);
			}

			function validateAlphanumeric($cadena) {
				return (countEachChar($cadena, "ctype_alnum") > 0);
			}

			function countEachChar($cadena, $func) {
				$count = 0;
				for ($i = 0; $i < strlen($cadena); $i++) { 
					if ($func($cadena[$i])) {
						$count++;
					};
				}
				echo $count;
				return $count;
			}

			function validatePassword($password) {
				$esValida = true;
				$esValida = $esValida && validateSize($password);
				$esValida = $esValida && validateNumbers($password);
				$esValida = $esValida && validateUppercase($password);
				$esValida = $esValida && validateLowercase($password);
				$esValida = $esValida && validateAlphanumeric($password);
				return $esValida;
			}

			$password = '1234AÁ3C';
			echo "the password $password " . (validatePassword($password) ? 'es' : 'no es') . ' valida.<br/>';

			$password = '1234Aá3aC';
			echo "the password $password " . (validatePassword($password) ? 'es' : 'no es') . ' valida.<br/>';

			$password = '1234AÁ3eC';
			echo "the password $password " . (validatePassword($password) ? 'es' : 'no es') . ' valida.<br/>';
    	?>
	</body>
</html>