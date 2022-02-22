<?php

namespace exam\src\controllers;

use exam\src\domain\CookiesManager;
use Exception;
use exam\src\domain\SessionManager;
use exam\src\domain\validators\FormValidator;
use exam\src\models\Reservas;
use exam\src\services\db\DBTableButacas;
use exam\src\services\db\DBTableReservas;

/**
 * This is the controller for the reservas post requests
 */
class ReservasController extends PostController {

    /**
     * Do all actions for a add reserva post type
     * @return true if was successfully complete
     * @return false if has errors
     */
    public function doAddReservaPost(): bool {
        $session = SessionManager::getInstance()->getSession();
        $id = $_POST['id'] ?? '';
    
        $errors = [];
        if (FormValidator::validateIsEmpty($id)) {
            $errors['others'] = 'You have to specify a butaca';
        }
    
        $reservations = [];
        if ($session == null) {
            $errors['others'] = 'Tienes que logearte para poder reservar.';
        } else {
            $reservations = (new DBTableReservas())->queryWith($session->id);
        }

        $isNotMine = true;
        foreach ($reservations as $reserve) {
            if ($reserve->butaca_id == $id) {
                $isNotMine = false;
            }
        }

        if (($reservations && count($reservations) >= 5) && $isNotMine) {
            $errors['others'] = 'Solo puedes reservar 5 butacas.';
        }

        $butaca = (new DBTableButacas())->queryWith($id)[0];
        if ($butaca->ocupada && $isNotMine) {
            $errors['others'] = 'Esta butaca ya esta ocupada.';
        }
    
        $result = true;
        if (count($errors) == 0) {
            // DB Access exception control
            try {
                $reserva = new Reservas();
                $reserva->usuario_id = $session->id;
                $reserva->butaca_id = $id;

                $table = new DBTableReservas();
                if (!$butaca->ocupada) {
                    $result = $table->insert($reserva);
                } else {
                    $result = $table->delete($reserva);
                }

                $butaca->ocupada = !$butaca->ocupada;
                $tableBucata = new DBTableButacas();
                $result = $tableBucata->update($butaca) && $butaca->ocupada && $result;
            } 
            catch(Exception $ex) {
                $result = false;
            } 
            finally {
                if ($result) {
                    (new EmailController())->sendMail();
                    $cookieManager = CookiesManager::getInstance();
                    $cookieManager->setCookie('reservation', true);
                    (new NavigationController())->moveTo('home.php');
                } else {
                    $errors['other'] = 'Review email and password.';
                }
            }
        }
        $this->errors[CONTROLLER_USUARIOS] = $errors;
        return (count($errors) <= 0);
    }
}