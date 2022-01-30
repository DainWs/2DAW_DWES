<?php

namespace src\domain\packages;

use src\domain\SessionManager;
use src\domain\ViewConstants;

class CarritoPackager extends DataPackager {
    public function getData(): Array {
        $this->add(ViewConstants::MODEL_CARRITO, SessionManager::getInstance()->getCarritoSession());
        return $this->data;
    }
}