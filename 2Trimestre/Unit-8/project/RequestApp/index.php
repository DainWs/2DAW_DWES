<?php

use Monolog\Logger;
use src\controllers\NavigationController;
use src\domain\SessionManager;
use src\domain\ViewDataPackager;
use src\libraries\LogManager;

include_once('autoload.php');
include_once('src/config/constants.php');

$logger = new LogManager('Router');
$logger->log('Received Request, session: '.session_id(), Logger::INFO);

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

$DATA[HAS_SESSION] = SessionManager::getInstance()->hasSession();
$DATA[USER_SESSION] = SessionManager::getInstance()->getSession();

$viewPath = SessionManager::getInstance()->getSessionLocation() ?? 'home.php';
$DATA = array_merge($DATA, ViewDataPackager::pakageDataFor($viewPath));
include_once("./public/$viewPath");
?>
