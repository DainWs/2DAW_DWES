<?php

use src\controllers\NavigationController;
use src\domain\SessionManager;
use src\domain\ViewConstants;
use src\domain\ViewDataPackager;
use src\domain\Views;
use src\services\db\DBTableCategorias;

session_save_path(sys_get_temp_dir());

include_once('autoload.php');

if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controllerClass = 'src\\controllers\\' .str_replace("/", "\\", $_GET['controller']);
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

$viewPath = SessionManager::getInstance()->getSessionLocation() ?? ['url' => 'home.php', 'args' => []];
include_once('public/'.$viewPath['url']);
?>
