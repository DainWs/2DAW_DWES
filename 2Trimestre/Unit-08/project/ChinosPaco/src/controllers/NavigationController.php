<?php

namespace src\controllers;

use src\domain\Roles;
use src\domain\SessionManager;
use src\domain\Views;

/**
 * This is the controller for the navigation post requests
 */
class NavigationController extends PostController {

    /**
     * Redirect the user to the index.php base file,
     * but not changing the View that the client is seen
     */
    public static function home(): void {
        header('Location: '.$_SERVER['APP_BASE_URL'].'/index.php');
        exit;
    }

    /**
     * Move to a view, with this method we navigate between views
     */
    public function moveTo($viewPath): void {
        $minLevel = Views::getViewByRoute($viewPath)->getMinLevel();
        $sessionManager = SessionManager::getInstance();
        $session = $sessionManager->getSession();

        $sessionRol = ($session) ? $session->rol : 'UNDEFINED';
        $userLevel = Roles::getById($sessionRol);
        if ( $userLevel->getLevel() <= $minLevel->getLevel() ) {
            $args = $_GET;
            unset($args['moveTo']);
            $sessionManager->updateSessionLocation(['url' => $viewPath, 'args' => $args]);
        }
    }
}