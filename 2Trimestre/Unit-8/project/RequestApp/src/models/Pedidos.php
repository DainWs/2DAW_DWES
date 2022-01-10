<?php 

namespace src\models;

use DateTime;

class Pedidos {
    public int $id;
    public int $usuario_id;
    public string $provincia;
    public string $localidad;
    public string $direccion;
    public float $coste;
    public string $estado;
    public DateTime $fecha;
    public DateTime $hora;
}