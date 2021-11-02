<!DOCTYPE html>
<!--
Muestra una tabla con los 20 primeros números en diferentes bases: decimal, binario, octal y hexadecimal.

Usa  un bucle y printf  para conseguir presentar de distintas formas la variable que uses en el bucle.
-->
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title></title>
        <style>
            td {border: 1px solid black;}
        </style>
	</head>
	<body>
        <h2>TABLA DE LOS 20 PRIMEROS NÚMEROS EN DIFERENTES BASES</h2>
        <table style="border: 2px solid grey;">
            <tr>
                <th>Decimal</th>
                <th>Binaro</th>
                <th>Octal</th>
                <th>Hexadecimal</th>
            </tr>
            <?php
                for ($i = 0; $i < 20; $i++) {
                    printf("<tr>");
                    printf("<td>". $i . "</td>");
                    printf("<td>". decbin($i) . "</td>");
                    printf("<td>". decoct($i) . "</td>");
                    printf("<td>". dechex($i) . "</td>");
                    printf("</tr>");
                }
            ?>
        </table>
	</body>
</html>