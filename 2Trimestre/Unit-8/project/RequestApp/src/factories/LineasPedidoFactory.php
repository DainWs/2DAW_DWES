<?php

namespace src\factories;

use src\models\Carrito;
use src\models\LineasPedidos;
use src\models\Pedidos;
use src\models\Productos;

class LineasPedidoFactory {
    public function createFrom(Pedidos $pedido, Carrito $carrito): Array {
        $list = $carrito->getList();
        $lineasPedidosList = [];
        $costeCarrito = 0.0;
        foreach ($list as $productID => $data) {
            $product = $data['product'];
            $cantidad = $data['cantidad'];

            $costeCarrito += ($this->calcPrecioProducto($product) * $cantidad);

            $lineaPedido = new LineasPedidos();
            $lineaPedido->id = 0;
            $lineaPedido->pedido_id = $pedido->id;
            $lineaPedido->producto_id = $productID;
            $lineaPedido->unidades = $cantidad;
            
            array_push($lineasPedidosList, $lineaPedido);
        }
        
        $pedido->coste = $carrito->calcCoste();
        return $lineasPedidosList;
    }

    private function calcPrecioProducto(Productos $producto): float {
        $oferta = $producto->oferta/100;
        return $producto->precio*$oferta;
    }
}