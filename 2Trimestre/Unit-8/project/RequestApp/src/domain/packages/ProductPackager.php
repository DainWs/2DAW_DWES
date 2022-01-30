<?php

namespace src\domain\packages;

use Exception;
use src\models\Categorias;
use src\models\Productos;
use src\services\db\DBTableCategorias;
use src\services\db\DBTableProductos;

class ProductPackager extends DataPackager {
    public function getData(...$args): Array {
        $result = [];
        try {
            var_dump($_GET);
            $product = (new DBTableProductos())->queryWith($_GET['productID'] ?? -1)[0] ?? new Productos();
            $category = (new DBTableCategorias())->queryWith($product->categoria_id)[0];
            $result[SELECTED_PRODUCT] = $product ?? new Productos();
            $result[SELECTED_CATEGORY] = $category ?? new Categorias();
        } catch(Exception $ex) {}
        //TODO solve this bro

        return $result;
    }
}