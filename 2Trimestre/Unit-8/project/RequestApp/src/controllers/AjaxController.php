<?php

namespace src\controllers;

use src\services\db\DBTableCategorias;
use src\services\db\DBTablePedidos;
use src\services\db\DBTableProductos;

class AjaxController extends PostController {

    public function getProducts() {
        $page = $_POST['page'] ?? 0;
        $limit = $_POST['limit'] ?? 10;
        $order = $_POST['order'] ?? 'id';
        $orderType = $_POST['orderType'] ?? SQL_ORDER_ASC;

        $table = new DBTableProductos();
        $products = $table->queryPage($page, $limit, $order, $orderType);

        echo json_encode($products);
        exit(0);
    }

    public function getCategorias() {
        $table = new DBTableCategorias();
        $categories = $table->query();

        echo json_encode($categories);
        exit(0);
    }

    public function getPedidos() {
        $table = new DBTablePedidos();
        $categories = $table->query();

        echo json_encode($categories);
        exit(0);
    }
}