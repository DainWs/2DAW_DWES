<?php

namespace src\controllers;

use Exception;
use src\domain\SessionManager;
use src\services\db\DBTableProductos;

class CarritoController extends PostController {
    public function add() {
        $carrito = SessionManager::getInstance()->getCarritoSession();
        $id = $_GET['productID'] ?? '';
        $cantidad = $_GET['cantidad'] ?? 1;

        $product = null;
        try {
            $table = new DBTableProductos();
            $product = $table->queryWith($id)[0];
        } catch(Exception $ex) {}

        if ($product) {
            $carrito->add($product, $cantidad);
        }
        SessionManager::getInstance()->updateCarritoSession($carrito);
    }

    public function remove() {
        $carrito = SessionManager::getInstance()->getCarritoSession();
        $id = $_GET['productID'] ?? '';

        $carrito->remove($id);
        SessionManager::getInstance()->updateCarritoSession($carrito);
    }
}