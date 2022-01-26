<?php

namespace src\domain\packages;

use Exception;
use src\services\db\DBTableCategorias;
use src\services\db\DBTableProductos;

class ProductPackager extends DataPackager {
    public function getData(...$args): Array {
        $result = [];
        try {
            $product = (new DBTableProductos())->queryWith($_COOKIE['selectedProduct'])[0];
            $category = (new DBTableCategorias())->queryWith($product->categoria_id);
            $result[SELECTED_PRODUCT] = $product;
            $result[SELECTED_CATEGORY] = $category;
        } catch(Exception $ex) {}

        return $result;
    }
}