<?php
/* DB CONSTANTS */
define('DB_DOMAIN', 'localhost');
define('DB_NAME', 'tienda');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

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

/* SUBMIT TYPES */
define('SUBMIT_TYPE_ADD_USER', 'addUser');
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
