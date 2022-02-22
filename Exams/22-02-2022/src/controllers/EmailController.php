<?php

namespace exam\src\controllers;

use exam\src\domain\SessionManager;
use exam\src\libraries\phpmailer\EmailManager;
use exam\src\libraries\phpmailer\EmailMessage;
use exam\src\services\db\DBTableButacas;
use exam\src\services\db\DBTableReservas;

/**
 * This is the controller for the email post requests
 */
class EmailController extends PostController {

    /**
     * Send a mail
     */
    public function sendMail(): bool {
        $user = SessionManager::getInstance()->getSession();

        $result = false;
        if ($user) {
            $butacas = [];
            $reservas = (new DBTableReservas())->queryWith($user->id);
            foreach ($reservas as $reserva) {
                array_push($butacas, (new DBTableButacas())->queryWith($reserva->butaca_id)[0]);
            }

            $message = new EmailMessage($user, [ 'butacas' => $butacas ]);
            $result = (new EmailManager())->send($message);
        }
        return $result;
    }
}