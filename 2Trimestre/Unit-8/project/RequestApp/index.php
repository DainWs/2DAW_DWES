<?php

use src\controllers\NavigationController;
use src\domain\SessionManager;

include_once('autoload.php');

if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controllerClass = str_replace("/", "\\", $_GET['controller']);
    $method = $_GET['action'];

    $controller = new $controllerClass();
    $controller->$method();
}

if (isset($_GET['moveTo'])) {
    $view = $_GET['moveTo'];
    $navigation = new NavigationController();
    $navigation->moveTo($view);
    header("Location: ".$_SERVER["APP_BASE_URL"]."/index.php");
    exit();
}

$viewPath = SessionManager::getInstance()->getSessionLocation() ?? 'home.php';
include_once("./public/$viewPath");
?>
