<!DOCTYPE html>
<!--
Escribe una función que reciba una cadena y comprueba si es una matrícula válida. Tiene que tener siete caracteres, los cuatro primeros números y el resto consonantes mayúsculas.
-->
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<?php
			
			function isCharUppercase($cadena, $charAt) {
				$char = $cadena[$charAt];
				return (strtoupper($char) == $cadena[$charAt]);
			}

			function isNumerosMatriculaValidos($cadena) {
				$isValid = true;
				$isValid = $isValid && is_numeric($cadena[0]);
				$isValid = $isValid && is_numeric($cadena[1]);
				$isValid = $isValid && is_numeric($cadena[2]);
				$isValid = $isValid && is_numeric($cadena[3]);
				return $isValid;
			}

			function isLetrasMatriculaValidas($cadena) {
				$i = 0;
				$isValid = true;
				$isValid = $isValid && !is_numeric($cadena[$i]) && isCharUppercase($cadena, $i++);
				$isValid = $isValid && !is_numeric($cadena[$i]) && isCharUppercase($cadena, $i++);
				$isValid = $isValid && !is_numeric($cadena[$i]) && isCharUppercase($cadena, $i++);
				return $isValid;
			}

			function esMatriculaValida($matricula) {
				$esValida = true;
				$esValida = $esValida && (strlen($matricula) == 7);

				$numbers = substr($matricula, 0, 4);
				$esValida = $esValida && (isNumerosMatriculaValidos($numbers));
				
				$letters = substr($matricula, 4);
				$esValida = $esValida && (isLetrasMatriculaValidas($letters));

				/* Con regex
				if (preg_match('/^[0-9]{4}[A-Z]{3}$/i', $matricula) == 0) {
					$esValida = false;
				}
				*/
				return $esValida;
			}

			$matricula = '1234A3C';
			$esValida = esMatriculaValida($matricula);
			echo "La matricula $matricula " . (($esValida) ? 'es' : 'no es') . ' valida.<br/>';

			$matricula = '1234ABC';
			$esValida = esMatriculaValida($matricula);
			echo "La matricula $matricula " . (($esValida) ? 'es' : 'no es') . ' valida.<br/>';

			$matricula = '1A34ABC';
			$esValida = esMatriculaValida($matricula);
			echo "La matricula $matricula " . (($esValida) ? 'es' : 'no es') . ' valida.<br/>';

			$matricula = '1234aBc';
			$esValida = esMatriculaValida($matricula);
			echo "La matricula $matricula " . (($esValida) ? 'es' : 'no es') . ' valida.<br/>';
    	?>
	</body>
</html>