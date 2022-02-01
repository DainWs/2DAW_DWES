<?php
/**
 * Some Constants are defined in other location.
 * @see src\domain\ViewConstants
 */

/* DB CONSTANTS */
define('DB_DOMAIN', 'localhost');
define('DB_NAME', 'tienda');
/*
define('DB_USER', 'root');
define('DB_PASSWORD', '');
*/
define('DB_USER', 'tienda');
define('DB_PASSWORD', 'tienda');

/* DB ORDER METHODS */
define('SQL_ORDER_ASC', 'ASC');
define('SQL_ORDER_DESC', 'DESC');

/* Controllers Error identifies */
define('CONTROLLER_SESSION_SINGING', 'signing');
define('CONTROLLER_SESSION_LOGIN', 'login');
define('CONTROLLER_SESSION_LOGOUT', 'logout');

define('CONTROLLER_NAVIGATION_MOVE', 'move');

define('CONTROLLER_USUARIOS', 'user');

define('CONTROLLER_CATEGORY_NEW', 'newCategory');
define('CONTROLLER_CATEGORY_DELETE', 'editCategory');

define('CONTROLLER_PRODUCT', 'product');
define('CONTROLLER_PRODUCT_DELETE', 'deleteProduct');

define('CONTROLLER_CARRITO_BUY', 'carritoBuy');

/* Others */
define('DATE_FORMAT', 'd/m/Y');
define('TIME_FORMAT', 'h:m:s');
