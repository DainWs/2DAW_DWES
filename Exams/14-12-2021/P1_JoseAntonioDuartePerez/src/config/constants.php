<?php
/* DB CONSTANTS */
define('DB_DOMAIN', 'localhost');
define('DB_NAME', 'senderismo');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

/* DB RUTE FIELD NAMES */
define('RUTE_ID', 'id');
define('RUTE_TITLE', 'titulo');
define('RUTE_DESCRIPTION', 'descripcion');
define('RUTE_DESNIVEL', 'desnivel');
define('RUTE_DISTANCIA', 'distancia');
define('RUTE_NOTAS', 'notas');
define('RUTE_DIFICULTAD', 'dificultad');

/* DB COMMENTS FIELD NAMES */
define('COMENTARIOS_ID', 'id');
define('COMENTARIOS_ID_RUTA', 'id_ruta');
define('COMENTARIOS_NOMBRE', 'nombre');
define('COMENTARIOS_TEXTO', 'texto');
define('COMENTARIOS_FECHA', 'fecha');

/* DB ORDER METHODS */
define('SQL_ORDER_ASC', 'ASC');
define('SQL_ORDER_DESC', 'DESC');

/* SUBMIT TYPES */
define('SUBMIT_TYPE_ADD_RUTE', 'addRute');
define('SUBMIT_TYPE_EDIT_RUTE', 'editRute');
define('SUBMIT_TYPE_DELETE_RUTE', 'deleteRute');

/* Others */
define('DATE_FORMAT', 'd/m/Y');