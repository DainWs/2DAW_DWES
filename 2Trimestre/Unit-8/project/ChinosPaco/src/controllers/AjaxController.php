<?php

namespace src\controllers;

use src\domain\SessionManager;
use src\services\db\DBTableCategorias;
use src\services\db\DBTablePedidos;
use src\services\db\DBTableProductos;

/**
 * This is the controller of Ajax requests
 */
class AjaxController extends PostController {

    /**
     * Return a page of limited product objects in JSON format
     */
    public function getProducts(): void {
        $page = $_POST['page'] ?? 0;
        $limit = $_POST['limit'] ?? 10;
        $order = $_POST['order'] ?? 'id';
        $orderType = $_POST['orderType'] ?? SQL_ORDER_ASC;
        $category = SessionManager::getInstance()->getSessionLocation()['args']['category'] ?? -1;

        $table = new DBTableProductos();
        $products = $table->queryPage($page, $limit, $category, $order, $orderType);
        echo json_encode($products);
        exit(0);
    }

    /**
     * Return all categories in JSON format
     */
    public function getCategorias(): void {
        $table = new DBTableCategorias();
        $categories = $table->query();

        echo json_encode($categories);
        exit(0);
    }

    /**
     * Return all pedidos for the logged user in JSON format
     */
    public function getPedidos(): void {
        $table = new DBTablePedidos();
        $categories = $table->query();

        echo json_encode($categories);
        exit(0);
    }
}