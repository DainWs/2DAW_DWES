<?php

namespace src\controllers;

use DateTime;
use src\models\Prestamos;
use src\services\db\DBTablePrestamos;

/**
 * This is the controller of Ajax requests
 */
class PrestamosController extends PostController {

    /**
     * Manage the diferent request methods actions
     */
    public function prestamos(): void {
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'PUT':
                $this->putPrestamo();
                break;
            default:
                echo "METHOD NOT ALLOWED";
                break;
        }
        exit(0);
    }

    private function putPrestamo() {
        parse_str(file_get_contents("php://input"), $PUT);
        $newPrestamo = new Prestamos();
        $newPrestamo->id = null;
        $newPrestamo->libro_id = $PUT['libro_id'] ?? -1;
        $newPrestamo->usuario_id = $PUT['usuario_id'] ?? -1;
        $newPrestamo->maxDelayDate = new DateTime($PUT['maxDelayDate'] ?? 'now');
        $newPrestamo->completionDate = new DateTime();
        $newPrestamo->returnDate = new DateTime($PUT['returnDate'] ?? 'now');

        $table = new DBTablePrestamos();
        $result = $table->insert($newPrestamo);
        echo json_encode($result);
    }
}