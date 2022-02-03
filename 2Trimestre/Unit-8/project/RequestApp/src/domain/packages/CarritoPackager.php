<?php

namespace src\domain\packages;

use src\domain\SessionManager;
use src\domain\ViewConstants;

/**
 * This class is used to build an Array of data that will be used in Carrito View.
 */
class CarritoPackager extends DataPackager {
    public function getData(): Array {
        $this->add(ViewConstants::MODEL_CARRITO, SessionManager::getInstance()->getCarritoSession());
        return $this->data;
    }
}