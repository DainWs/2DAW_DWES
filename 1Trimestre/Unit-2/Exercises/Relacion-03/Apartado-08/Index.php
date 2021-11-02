<!DOCTYPE html>
<!--
Supongamos que guardamos en una array los datos de los profesores de este centro educativo.
Cada elemento de este array a su vez será otro array asociativo que nos permitirá almacenar su
 número de registro personal, su nombre, su apellido/s, su teléfono, y su fecha de nacimiento.
Se desea:

a) Crear un array con al menos los datos de 3 profesores
b) Crear una función que nos permita mostrar el número de registro personal de cada uno de los profesores
c) Modifica la función anterior y conviértela en una función anónima (usa array_map()).
d) Crea una función anónima que nos permita mostrar los profesores que han nacido a partir de 1990. ( Usa strtotime() y array_filter()

NOTA: Ejemplo de uso de funciones anónimas , arrays , array_map() y array_filter().
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
        <?php
            function mostrarDatosProfesor($profesor) {
                echo "<b>Nombre y apellidos</b>: {$profesor['Nombre']} {$profesor['Apellidos']}<br/>";    
                echo "<b>NRP</b>: {$profesor['NRP']}<br/>";
                echo "<b>Telefono: </b> {$profesor['telefono']}<br/>";
            }

            // A
            $profesores = [
                ['NRP' => 'A33247', 'Nombre' => 'Belen', 'Apellidos' => 'Callejon Prieto', 'telefono' => '348274120', 'nacimiento' => ['day' => 07, 'month' => 9, 'year' => 1979]],
                ['NRP' => 'E55369', 'Nombre' => 'Alberto', 'Apellidos' => 'Viego Fuentes', 'telefono' => '654000000', 'nacimiento' => ['day' => 23, 'month' => 10, 'year' => 1995]],
                ['NRP' => 'F12344', 'Nombre' => 'Javier', 'Apellidos' => 'Sanchez Ortega', 'telefono' => '343455620', 'nacimiento' => ['day' => 14, 'month' => 1, 'year' => 1985]]
            ];

            echo 'A <br/>';
            foreach ($profesores as $profesor) {
                mostrarDatosProfesor($profesor);
                echo "<br/>";
            }

            // B
            echo "B <br/>";
            function nrpProfesores($profesor) {
                return $profesor['NRP'] . " " . $profesor['Apellidos'];
            };
            echo implode(", ", array_map("nrpProfesores", $profesores));
            echo "<br/><br/>";

            // C
            echo "C <br/>";
            echo implode(", ", array_map( 
                function($profesor) {
                    return $profesor['NRP'] . " " . $profesor['Apellidos'];
                }, 
                $profesores));
            echo '<br/><br/>';

            // D
            echo "D <br/>";
            $profesoresNacidos1990 = array_filter(
                $profesores, 
                function($profesor) {
                    return ($profesor['nacimiento']['year'] >= 1990);
                });

            echo implode(", ", array_map("mostrarDatosProfesor", $profesoresNacidos1990));
            echo '<br/>';

        ?>
	</body>
</html>
