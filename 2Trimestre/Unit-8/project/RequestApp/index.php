<?php

use src\controllers\NavigationController;
use src\domain\SessionManager;
use src\domain\ViewConstants;
use src\domain\ViewDataPackager;

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

$DATA[ViewConstants::HAS_SESSION] = SessionManager::getInstance()->hasSession();
$DATA[ViewConstants::SESSION_USER] = SessionManager::getInstance()->getSession();

$viewPath = SessionManager::getInstance()->getSessionLocation() ?? ['url' => 'home.php', 'args' => []];
$DATA = array_merge($DATA, ViewDataPackager::pakageDataFor($viewPath['url']));
include_once('./public/'.$viewPath['url']);
?>
