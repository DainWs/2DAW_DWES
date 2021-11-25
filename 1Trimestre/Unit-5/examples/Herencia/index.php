<?php
include("coche.php");

$peugeot = new Coche("Azul oscuro", "Peugeot", "340", "0", "100", 5);
echo $peugeot->__toString();
$peugeot->accelerar();
echo $peugeot->getVelocidad();
$peugeot->frenar();
echo $peugeot->getVelocidad();
