<?php 

namespace src\models;

class Productos {
    public int $id;
    public int $categoria_id;
    public string $nombre;
    public string $descripcion;
    public float $precio;
    public int $stock;
    public string $oferta;
    public string $fecha;
    public string $imagen;
}