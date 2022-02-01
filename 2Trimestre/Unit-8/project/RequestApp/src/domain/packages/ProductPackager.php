<?php

namespace src\domain\packages;

use Exception;
use src\domain\SessionManager;
use src\domain\ViewConstants;
use src\models\Productos;
use src\services\db\DBTableCategorias;
use src\services\db\DBTableProductos;

class ProductPackager extends DataPackager {

    public function getData(): Array {
        $args = SessionManager::getInstance()->getSessionLocation()['args'];
        $product = new Productos();
        $categories = [];
        try {
            $product = (new DBTableProductos())->queryWith($args['productID'] ?? -1)[0] ?? null;
            $categories = (new DBTableCategorias())->query();
        } catch(Exception $ex) {}
        
        $this->add(ViewConstants::MODEL_PRODUCTO, $product);
        $this->add(ViewConstants::LIST_MODEL_CATEGORIAS, $categories);
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