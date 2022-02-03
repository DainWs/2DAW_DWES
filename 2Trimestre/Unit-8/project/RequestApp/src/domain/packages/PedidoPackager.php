<?php

namespace src\domain\packages;

use Exception;
use src\domain\SessionManager;
use src\domain\ViewConstants;
use src\services\db\DBTablePedidos;

/**
 * This class is used to build an Array of data that will be used in Pedido View.
 */
class PedidoPackager extends DataPackager {
    public function getData(): Array {
        $session = SessionManager::getInstance()->getSession();
        $pedidos = [];
        try {
            $pedidos = (new DBTablePedidos())->queryCompleteOf($session->id);
        } catch(Exception $ex) {}
        $this->add(ViewConstants::LIST_MODEL_PEDIDOS, $pedidos);
        return $this->data;
    }
}