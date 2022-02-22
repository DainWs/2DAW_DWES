<?php

namespace exam\src\domain\packages;

use exam\src\domain\CookiesManager;
use exam\src\domain\SessionManager;
use exam\src\domain\ViewConstants;
use exam\src\services\db\DBTableButacas;
use exam\src\services\db\DBTableReservas;

/**
 * This class is used to build an Array of data that will be used in Home View.
 */
class HomePackager extends DataPackager {
    public function getData(): Array {
        $session = SessionManager::getInstance()->getSession();
        $reserves = [];
        if ($session != null) {
            $reserves = (new DBTableReservas())->queryWith($session->id);
        }

        $butacasTmp = (new DBTableButacas())->query();
        $butacas = [];
        foreach ($butacasTmp as $butaca) {
            if (!isset($butacas[$butaca->fila])) {
                $butacas[$butaca->fila] = [];
            }

            foreach ($reserves as $key => $reserve) {
                if ($butaca->id == $reserve->butaca_id) {
                    $butaca->isMine = true;
                    unset($reserves[$key]);
                }
            }

            $butacas[$butaca->fila][$butaca->columna] = $butaca;
        }
        $this->add(ViewConstants::LIST_MODEL_BUTACAS, $butacas);

        $showDialog = CookiesManager::getInstance()->getCookie('reservation') ?? false;
        $this->add(ViewConstants::SHOW_DIALOG, $showDialog);
        return $this->data;
    }
}