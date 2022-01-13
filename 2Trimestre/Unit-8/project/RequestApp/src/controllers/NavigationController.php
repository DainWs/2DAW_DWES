<?php

namespace src\controllers;

use src\domain\SessionManager;

class NavigationController extends PostController {

    public static function home() {
        header('Location: '.$_SERVER['APP_BASE_URL'].'/index.php');
        exit;
    }

    public function moveTo($view) {
        $sessionManager = SessionManager::getInstance();
        $sessionManager->updateSessionLocation($view);
    }
}