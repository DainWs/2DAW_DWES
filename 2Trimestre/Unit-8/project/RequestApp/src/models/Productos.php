<?php 

namespace src\models;

use DateTime;

class Productos {
    public int $id;
    public int $categoria_id;
    public string $nombre;
    public string $descripcion;
    public float $precio;
    public int $stock;
    public string $oferta;
    public DateTime $fecha;
    public string $imagen;
}