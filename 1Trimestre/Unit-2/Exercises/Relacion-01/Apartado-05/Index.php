<!DOCTYPE html>
<!--
Realiza un conversor de euros a dólares
-->
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<?php
            $euros = 10;
            $dolarXEuro = 1.17;
            $dolares = $euros * $dolarXEuro;
            echo "conversión de euros a dolares<br/>";
            echo "Euros: $euros<br/>";
            echo "En dolares: $dolares";
        ?>
	</body>
</html>