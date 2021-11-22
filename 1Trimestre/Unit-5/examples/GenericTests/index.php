<?php
include('persona.php');

$person = new Persona("a", "a", 18);
$metodos = get_class_methods($person);
foreach ($metodos as $key => $value) {
    echo "$key y $value";
}

