<?php

namespace src\models;

class Carrito {
    private Array $list;

    public function __construct() {
    }

    public function add(Productos $product, int $cantidad) {
        $this->list[$product->id]['product'] = $product;
        $this->list[$product->id]['cantidad'] = $cantidad;
    }

    public function set($productID, int $cantidad) {
        $this->list[$productID]['cantidad'] = $cantidad;
    }

    /**
     * Get the value of list
     * @return Array
     */
    public function getList(): Array {
        return $this->list;
    }

    public function calcCoste(): float {
        $costeCarrito = 0.0;
        foreach ($this->list as $data) {
            $product = $data['product'];
            $oferta = $product->oferta/100;
            $precio = $product->precio*$oferta;
            $costeCarrito += $precio*$data['cantidad'];
        }
        return $costeCarrito;
    }
}