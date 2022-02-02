<?php 

namespace src\models;

class LineasPedidos {
    public int $id;
    public int $pedido_id;
    public int $producto_id;
    public int $unidades;

    public string $nombreProducto;

    public Productos $producto;

    public function __construct() {
        $this->id = 0;
        $this->pedido_id = 0;
        $this->producto_id = 0;
        $this->unidades = 1;
    }

    public function getProducto(): Productos {
        return $this->producto;
    }

    public function setProducto(Productos $producto): void {
        $this->producto = $producto;
        $this->producto_id = $producto->id;
    }
}