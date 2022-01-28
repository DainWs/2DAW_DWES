<?php

namespace src\models;

class Carrito {
    public Array $list;

    public function __construct() {
        $this->list = [];
    }

    public function add(Productos $product, int $cantidad) {
        $this->list[$product->id]['product'] = $product;
        $this->list[$product->id]['cantidad'] = $cantidad;
    }

    public function set($productID, int $cantidad) {
        $this->list[$productID]['cantidad'] = $cantidad;
    }

    public function remove($productID) {
        unset($this->list[$productID]);
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