<?php

use src\controllers\NavigationController;
use src\domain\SessionManager;
use src\services\db\DBTableCategorias;
use src\services\db\DBTableProductos;

include_once('autoload.php');
include_once('src/config/constants.php');

$DATA = [];

if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controllerClass = 'src\\controllers\\' .str_replace("/", "\\", $_GET['controller']);
    $method = $_GET['action'];
    
    $controller = new $controllerClass();
    $controller->$method();
    $DATA[ERRORS] = $controller->getErrors();
}

if (isset($_GET['moveTo'])) {
    $view = $_GET['moveTo'];
    $navigation = new NavigationController();
    $navigation->moveTo($view);
    header("Location: ".$_SERVER["APP_BASE_URL"]."/index.php");
    exit();
}

if (isset($_COOKIE['selectedProduct'])) {
    $DATA[SELECTED_PRODUCT] = (new DBTableProductos())->queryWith($_COOKIE['selectedProduct'])[0];
}

$DATA[CATEGORIES] = (new DBTableCategorias())->query();
$DATA[HAS_SESSION] = SessionManager::getInstance()->hasSession();
$DATA[USER_SESSION] = SessionManager::getInstance()->getSession();

if (!SessionManager::getInstance()->isAllowedLocation()) {
    NavigationController::home();
}

$viewPath = SessionManager::getInstance()->getSessionLocation() ?? 'home.php';
include_once("./public/$viewPath");
?>
