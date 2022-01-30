<?php

namespace src\controllers;

use src\domain\Roles;
use src\domain\SessionManager;
use src\domain\Views;

class NavigationController extends PostController {

    public static function home() {
        header('Location: '.$_SERVER['APP_BASE_URL'].'/index.php');
        exit;
    }

    public function moveTo($viewPath) {
        $minLevel = Views::getViewByRoute($viewPath)->getMinLevel();
        $sessionManager = SessionManager::getInstance();
        $session = $sessionManager->getSession();

        $sessionRol = ($session) ? $session->rol : 'UNDEFINED';
        $userLevel = Roles::getById($sessionRol);
        if ( $userLevel->getLevel() <= $minLevel->getLevel() ) {
            $sessionManager->updateSessionLocation($viewPath);
        }
    }
}