<?php
$profesores = [
    ['NRP' => 'A33247', 'Nombre' => 'Belen', 'Apellidos' => 'Callejon Prieto', 'telefono' => '348274120', 'nacimiento' => ['day' => 07, 'month' => 9, 'year' => 1979]],
    ['NRP' => 'E55369', 'Nombre' => 'Alberto', 'Apellidos' => 'Viego Fuentes', 'telefono' => '654000000', 'nacimiento' => ['day' => 23, 'month' => 10, 'year' => 1990]],
    ['NRP' => 'F12344', 'Nombre' => 'Javier', 'Apellidos' => 'Sanchez Ortega', 'telefono' => '343455620', 'nacimiento' => ['day' => 14, 'month' => 1, 'year' => 1985]]
];

echo '# Foreach<br/>';
foreach ($profesores as $profesor) {
    echo "Nombre y apellidos: {$profesor['Nombre']} {$profesor['Apellidos']}<br/>";    
    echo "NRP y apellidos: {$profesor['NRP']}, {$profesor['Apellidos']}<br/><br/>";
}

$nombresYApellidos = function($profesor) {
    return $profesor['Nombre'] . " " . $profesor['Apellidos'];
};

echo implode(", ", array_map($nombresYApellidos, $profesores));
echo '<br/>';

$nrpYNomre = function($profesor) {
    return $profesor['NRP'] . " " . $profesor['Apellidos'];
};

echo implode(", ", array_map($nrpYNomre, $profesores));
echo '<br/>';
echo '<br/>';
echo '<br/>';

$filtraApellido = function($profesor) {
    return preg_match('/.*Viego.*/', $profesor['Apellidos']);
};

$filtro = array_filter($profesores, $filtraApellido);
echo implode(", ", $filtro);