<?php

namespace src\domain\packages;

use Exception;
use src\domain\ViewConstants;
use src\models\Productos;
use src\services\db\DBTableProductos;

class ProductPackager extends DataPackager {

    public function getData(): Array {
        $product = new Productos();
        try {
            $product = (new DBTableProductos())->queryWith($_GET['productID'] ?? -1)[0] ?? new Productos();
        } catch(Exception $ex) {}
        
        $this->add(ViewConstants::MODEL_PRODUCTO, $product);
        $this->add(ViewConstants::URL, $this->getPostControllerURL($product));

        return $this->data;
    }

    private function getPostControllerURL($product): String {
        $method = ($product) ? 'doEditProductPost' : 'doAddProductPost';
        $controller = 'ProductController';
        $baseURL = $_SERVER['APP_BASE_URL'];
        return "$baseURL/$controller/$method";
    }
}