<?php
/* DB CONSTANTS */
define('DB_DOMAIN', 'localhost');
define('DB_NAME', 'tienda');
/*
define('DB_USER', 'root');
define('DB_PASSWORD', '');
*/
define('DB_USER', 'tienda');
define('DB_PASSWORD', 'tienda');

/* Roles */
define('ROL_ADMIN', 'Admin');
define('ROL_ADMIN_LEVEL', 0);
define('ROL_PROVEEDOR', 'Proveedor');
define('ROL_PROVEEDOR_LEVEL', 1);
define('ROL_CLIENTE', 'comprador');
define('ROL_CLIENTE_LEVEL', 2);
define('ROL_UNDEFINED', 'undefined');
define('ROL_UNDEFINED_LEVEL', 3);
define('ROLES', [
    ROL_ADMIN_LEVEL => ROL_ADMIN, 
    ROL_PROVEEDOR_LEVEL => ROL_PROVEEDOR, 
    ROL_CLIENTE_LEVEL => ROL_CLIENTE,
    ROL_UNDEFINED_LEVEL => ROL_UNDEFINED
]);

/* DB ORDER METHODS */
define('SQL_ORDER_ASC', 'ASC');
define('SQL_ORDER_DESC', 'DESC');

/* Data View Identifiers */
define('USER_SESSION', 'userSession');
define('HAS_SESSION', 'hasSession');
define('PRODUCTS_LENGHT', 'productsCount');
define('ERRORS', 'errors');
define('CATEGORIES', 'categories');
define('CARRITO', 'carrito');
define('SELECTED_USER', 'selectedUsers');
define('SELECTED_PRODUCT', 'selectedProduct');
define('SELECTED_CATEGORY', 'selectedCategory');


/* Controllers Error identifies */
define('CONTROLLER_SESSION_SINGING', 'signing');
define('CONTROLLER_SESSION_LOGIN', 'login');
define('CONTROLLER_SESSION_LOGOUT', 'logout');

define('CONTROLLER_NAVIGATION_MOVE', 'move');

define('CONTROLLER_USUARIOS_NEW', 'newUser');
define('CONTROLLER_USUARIOS_EDIT', 'editUser');

define('CONTROLLER_CATEGORY_NEW', 'newCategory');
define('CONTROLLER_CATEGORY_DELETE', 'editCategory');

define('CONTROLLER_PRODUCT_NEW', 'newProduct');
define('CONTROLLER_PRODUCT_EDIT', 'editProduct');
define('CONTROLLER_PRODUCT_DELETE', 'deleteProduct');

define('CONTROLLER_CARRITO_BUY', 'carritoBuy');

/* Routes */
define('VIEW_HOME', 'home.php');
define('VIEW_PROFILE', 'profile.php');
define('VIEW_PRODUCT', 'product.php');

define('VIEW_EDIT_USER', 'editUser.php');
define('VIEW_NEW_USER', 'newUser.php');
/* Others */
define('DATE_FORMAT', 'd/m/Y');
define('TIME_FORMAT', 'hh:mm:ss');
