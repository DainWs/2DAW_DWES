<?php

namespace src\factories;

use src\models\Pedidos;

class PedidoFactory {
    public function create(): Pedidos {
        $pedido = new Pedidos();
        $pedido->id = 0;
        $pedido->fecha = date(DATE_FORMAT);
        $pedido->hora = date(TIME_FORMAT);
        return $pedido;
    }
}