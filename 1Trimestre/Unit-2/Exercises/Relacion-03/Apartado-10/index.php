<!DOCTYPE html>
<!--
Guarda en un array tus 10 películas favoritas.
Imprime en párrafos con el siguiente formato que incluye la posición de la película: ‘Película 4: Los Vengadores’
Vuelve a mostrar las películas pero en lugar de párrafos usa una tabla.
Añade un poco de CSS para mejorar el diseño. Cada título debe tener un color aleatorio. 
-->
<html lang="es">
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
        <?php
            $peliculas = [
                'Doraemon',
                'Spiderman',
                'Spiderman II',
                'Spiderman III',
                'Jocker',
                'Venom',
                'Venom II',
                'Capitán America',
                'Superman',
                'Superman vs Batman'
            ];
        ?>
        <?php
            foreach ($peliculas as $key => $value) {
                echo "<p>Película $key: $value</p>";
            }
        ?>
        <table>
            <tr>
                <th>Numero</th>
                <th>Nombre</th>
            </tr>
            <?php
                foreach ($peliculas as $key => $value) {
                    $colour = rand(0, 10000000);
                    $colour = dechex($colour);
                    echo "<tr><td style=\"background: $colour\">$key</td><td style=\"background: $colour\">$value</td></tr>";
                }
            ?>
        </table>
	</body>
</html>
