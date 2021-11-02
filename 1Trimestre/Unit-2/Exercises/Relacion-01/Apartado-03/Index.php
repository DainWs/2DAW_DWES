<!DOCTYPE html>
<!--
Escribe un programa que resuelva una ecuación de segundo grado. Aprovecha para ilustrar la diferencia entre echo, print y printf
-->
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<?php
		echo 'La ecuaci&oacute;n es: x<sub>2</sub>+3x-1=0<br/>';
		
        $a = 1; 
        $b = 3; 
        $c = -1; 

        $negativo = -1; 

        $bNegativo = $b * $negativo; 
        $operadorUno = pow($b, 2); 
        $operadorDos = 4 * $a * $c; 
        $resta = $operadorUno - $operadorDos; 
        $raiz = pow($resta, (1/2)); 
        $partido = 2*$a; 
        
        $resultX = ($bNegativo + $raiz)/$partido; 
        $resultXelevadoDos = ($bNegativo - $raiz)/$partido; 
        
        print("X = $resultX<br>"); 
        printf("X<sub>2</sub> = $resultXelevadoDos");

		?>
	</body>
</html>