<?php

function tablaMultiplicar($num) {
	echo "<h3>Table de multiplicar del numero: $num <h3>";
	for ($i=1; $i <= 10; $i++) { 
		$result = $num * $i;
		echo "$num x $i = $result <br/>";
	}
}

for ($i=1; $i <= 10; $i++) { 
	#tablaMultiplicar($i);	
}

function saludar($persona = 'Pedro') {
	echo "hola $persona <br/>";
}

saludar();
saludar('Jose');

function getNombre() {
	return 'Pedro';
}

function getApellidos() {
	return 'Alvarez';
}

function mostrarSaludo() {
	$nombre = getNombre();
	$apellidos = getApellidos();
	echo "hola $nombre $apellidos";
}

mostrarSaludo();


function getYear()
{
	$year = 2021;
	return $year;
}

echo getYear();

echo "<br/>";

$what = "Saludo";
$miFuncion = "mostrar".$what;
$miFuncion();