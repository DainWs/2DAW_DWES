<?php

namespace src\controllers;

use Exception;
use src\domain\SessionManager;
use src\services\db\DBTableProductos;

class CarritoController extends PostController {
    public function add() {
        $carrito = SessionManager::getInstance()->getCarritoSession();
        $id = $_POST['productID'] ?? '';
        $cantidad = $_POST['cantidad'] ?? 1;

        $product = null;
        try {
            $table = new DBTableProductos();
            $product = $table->queryWith($id);
        } catch(Exception $ex) {}

        if ($product) {
            $carrito->set($product, $cantidad);
        }
        SessionManager::getInstance()->updateCarritoSession($carrito);
    }

    public function remove() {
        $carrito = SessionManager::getInstance()->getCarritoSession();
        $id = $_POST['productID'] ?? '';

        $carrito->set($id, 0);
        SessionManager::getInstance()->updateCarritoSession($carrito);
    }
}