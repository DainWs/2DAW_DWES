<?php

namespace src\controllers;

use src\domain\SessionManager;

class NavigationController extends PostController {
    public function moveTo($view) {
        $sessionManager = SessionManager::getInstance();
        $sessionManager->updateSessionLocation($view);
    }
}