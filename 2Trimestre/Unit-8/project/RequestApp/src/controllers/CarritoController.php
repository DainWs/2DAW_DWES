<?php

namespace src\controllers;

class CarritoController extends PostController {

    public function add() {
        $id = $_POST['productID'] ?? '';
    }
}