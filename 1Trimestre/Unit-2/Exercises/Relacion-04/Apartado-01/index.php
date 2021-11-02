<!DOCTYPE html>
<!--
Modifica el ejercicio cálculo de un factorial
para que controle si el argumento es negativo utilizando una excepción.
 Usa: InvalidArgumentException
-->
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<?php

			function factorialDe($num) {
                if ($num < 0) {
                    throw new InvalidArgumentException("No se admiten numeros negativos como $num");
                }

				$result = 1;
				for ($i=1; $i <= $num; $i++) { 
					$result *= $i;
				}
				return $result;
			}

            try {
                echo factorialDe(3);
                echo '<br/>';
                echo factorialDe(5);
                echo '<br/>';
                echo factorialDe(4);
                echo '<br/>';
                echo factorialDe(-4);
            }
            catch(InvalidArgumentException $ex) {
                echo $ex->getMessage();
            }
		?>
	</body>
</html>