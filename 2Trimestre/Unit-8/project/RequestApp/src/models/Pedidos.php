<?php 

namespace src\models;

use DateTime;
use src\factories\LineasPedidoFactory;

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

    public Array $lineas;

    public function __construct() {
        $this->lineas = [];
    }

    public function add(Productos $product): void {
        $lineaPedido = new LineasPedidos();
        $lineaPedido->setProducto($product);
        $this->lineas[$product->id] = $lineaPedido;
    }

    public function set($productID, int $unidades): void {
        if (isset($this->lineas[$productID])) {
            $this->lineas[$productID]->unidades = $unidades;
        }
    }

    public function remove($productID): void {
        unset($this->lineas[$productID]);
    }

    /**
     * Get the value of lineas
     * @return Array
     */
    public function getLineas(): Array {
        return $this->lineas;
    }

    public function calcCoste(): float {
        $costeCarrito = 0.0;
        foreach ($this->lineas as $data) {
            $product = $data['product'];
            $oferta = $product->oferta/100;
            $precio = $product->precio*$oferta;
            $costeCarrito += $precio*$data['cantidad'];
        }
        return $costeCarrito;
    }
}