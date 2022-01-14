<?php

namespace src\controllers;

use src\domain\SessionManager;
use src\services\db\DBTableProductos;

class AjaxController extends PostController {

    public function getProducts() {
        $table = new DBTableProductos();
        $products = $table->query();

        //TODO Return here the json
        return "{}";
    }
}