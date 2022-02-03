<?php

namespace src\domain\packages;

use Exception;
use src\domain\SessionManager;
use src\domain\ViewConstants;
use src\models\Productos;
use src\services\db\DBTableProductos;

/**
 * This class is used to build an Array of data that will be used in Product View.
 */
class ProductPackager extends DataPackager {

    public function getData(): Array {
        $args = SessionManager::getInstance()->getSessionLocation()['args'];
        $product = new Productos();
        try {
            $product = (new DBTableProductos())->queryWith($args['productID'] ?? -1)[0] ?? null;
        } catch(Exception $ex) {}
        
        $this->add(ViewConstants::MODEL_PRODUCTO, $product);
        $this->add(ViewConstants::URL, $this->getPostControllerURL($product));

        return $this->data;
    }

    /**
     * Return a url for a future post request, this url is builded according to some conditions
     * @return string the usl as string
     */
    private function getPostControllerURL($product): String {
        $method = ($product) ? 'doEditProductPost' : 'doAddProductPost';
        $controller = 'ProductController';
        $baseURL = $_SERVER['APP_BASE_URL'];
        return "$baseURL/$controller/$method";
    }
}