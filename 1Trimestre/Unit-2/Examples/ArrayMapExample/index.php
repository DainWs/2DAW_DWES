<?php

$array = range(1, 10);
$array = array_map(
    function($n) { return ($n * 2) - 1;},
    $array
);

echo implode(", ", $array);


$profesores = [
    ['NRP' => 'A33247', 'Nombre' => 'Belen', 'Apellidos' => 'Callejon Prieto', 'telefono' => '348274120'],
    ['NRP' => 'E55369', 'Nombre' => 'Alberto', 'Apellidos' => 'Viego Fuentes', 'telefono' => '654000000'],
    ['NRP' => 'F12344', 'Nombre' => 'Javier', 'Apellidos' => 'Sanchez Ortega', 'telefono' => '343455620']
];

echo '# Foreach';
foreach ($profesores as $profesor) {
    echo "Nombre y apellidos: {$profesor['nombre']}";    
}

$nombresYApellidos = function($profesor) {
    return $profesor['Nombre'] + " " + $profesor['Apellidos'];
};

$nrpYNomre = function($profesor) {
    return $profesor['nrp'] + " " + $profesor['Apellidos'];
};

echo implode(", ", array_map($nombresYApellidos, $profesores));
echo '<br/>';

echo '<br/>';

echo '<br/>';