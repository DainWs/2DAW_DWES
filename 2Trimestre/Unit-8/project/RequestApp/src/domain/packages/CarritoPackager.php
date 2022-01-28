<?php

namespace src\domain\packages;

use src\domain\SessionManager;

class CarritoPackager extends DataPackager {
    public function getData(...$args): Array {
        $data = [];
        $data[CARRITO] = SessionManager::getInstance()->getCarritoSession();
        return $data;
    }
}