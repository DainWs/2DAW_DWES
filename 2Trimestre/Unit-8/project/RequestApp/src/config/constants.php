<?php
/* DB CONSTANTS */
define('DB_DOMAIN', 'localhost');
define('DB_NAME', 'tienda');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

//define('DB_USER', 'tienda');
//define('DB_PASSWORD', 'tienda');

/* DB USUARIOS FIELD NAMES */
define('USUARIO_ID', 'id');
define('USUARIO_NOMBRE', 'nombre');
define('USUARIO_APELLIDOS', 'apellidos');
define('USUARIO_EMAIL', 'email');
define('USUARIO_PASSWORD', 'password');
define('USUARIO_ROL', 'rol');

/* DB ORDER METHODS */
define('SQL_ORDER_ASC', 'ASC');
define('SQL_ORDER_DESC', 'DESC');

/* Data View Identifiers */
define('USER_SESSION', 'userSession');
define('HAS_SESSION', 'hasSession');
define('ERRORS', 'errors');

/* Controllers Error identifies */
define('CONTROLLER_SESSION_SINGING', 'signing');
define('CONTROLLER_SESSION_LOGIN', 'login');
define('CONTROLLER_SESSION_LOGOUT', 'logout');

define('CONTROLLER_NAVIGATION_MOVE', 'move');

define('CONTROLLER_USUARIOS_NEW', 'newUser');
define('CONTROLLER_USUARIOS_EDIT', 'editUser');

define('SUBMIT_TYPE_EDIT_USER', 'editUser');
define('SUBMIT_TYPE_DELETE_USER', 'deleteUser');

define('SUBMIT_TYPE_ADD_CATEGORY', 'addCategory');
define('SUBMIT_TYPE_DELETE_CATEGORY', 'deleteCategory');

define('SUBMIT_TYPE_ADD_PRODUCT', 'addProduct');
define('SUBMIT_TYPE_EDIT_PRODUCT', 'editProduct');
define('SUBMIT_TYPE_DELETE_PRODUCT', 'deleteProduct');

define('SUBMIT_TYPE_ADD_PEDIDOS', 'addPedidos');
define('SUBMIT_TYPE_EDIT_PEDIDOS', 'editPedidos');
define('SUBMIT_TYPE_DELETE_PEDIDOS', 'deletePedidos');

define('SUBMIT_TYPE_ADD_LINEA_PEDIDO', 'addLineaPedido');
define('SUBMIT_TYPE_EDIT_LINEA_PEDIDO', 'editLineaPedido');
define('SUBMIT_TYPE_DELETE_LINEA_PEDIDO', 'deleteLineaPedido');

/* Others */
define('DATE_FORMAT', 'd/m/Y');
define('TIME_FORMAT', 'hh:mm:ss');
