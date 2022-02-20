<?php

namespace exam\src\controllers;

use exam\src\domain\SessionManager;
use exam\src\libraries\phpmailer\EmailManager;
use exam\src\libraries\phpmailer\EmailMessage;
use exam\src\services\db\DBTableUsuarios;

/**
 * This is the controller for the email post requests
 */
class EmailController extends PostController {

    /**
     * Send a mail
     */
    public function sendMail(): bool {
        $user = SessionManager::getInstance()->getSession();

        $id = $_GET['id'] ?? $_POST['id'] ?? null;
        if ($id) {
            $user = (new DBTableUsuarios())->queryWith($id);
        }

        $result = false;
        if ($user) {
            $message = new EmailMessage($user, []);
            $result = (new EmailManager())->send($message);
        }
        return $result;
    }
}