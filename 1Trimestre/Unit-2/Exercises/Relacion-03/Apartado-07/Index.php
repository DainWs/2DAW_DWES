<!DOCTYPE html>
<!--
Usar foreach para mostrar todos los valores del array $_SERVER en una tabla con dos columnas. 

La primera columna debe contener el nombre de la variable, y la segunda su valor
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
        <table>
            <tr>
                <th>Nombre variable</th>
                <th>Valor variable</th>
            </tr>
            <?php
                foreach ($_SERVER as $key => $value) {
                    echo "<tr><td>$key</td><td>$value</td></tr>";
                }
            ?>
        </table>
	</body>
</html>
