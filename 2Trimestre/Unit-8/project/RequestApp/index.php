<?php

use src\controllers\NavigationController;
use src\domain\SessionManager;

include_once('autoload.php');

if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controllerClass = 'src\\controllers\\' .str_replace("/", "\\", $_GET['controller']);
    $method = $_GET['action'];
    echo $controllerClass;
    echo $method;
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
