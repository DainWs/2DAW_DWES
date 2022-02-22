<?php

namespace exam\src\controllers;

use exam\src\domain\SessionManager;

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
        $args = $_GET;
        unset($args['moveTo']);
        SessionManager::getInstance()->updateSessionLocation(['url' => $viewPath, 'args' => $args]);
    }
}