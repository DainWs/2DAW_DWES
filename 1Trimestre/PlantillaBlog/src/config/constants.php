<?php
/* DB CONSTANTS */
define('DB_DOMAIN', 'localhost');
define('DB_NAME', 'BLOG_PROJECT');
define('DB_USER', 'Blog');
define('DB_PASSWORD', 'Blog@1234');

/* DB USUARIOS TABLE */
define('USER_ID', 'ID');
define('USER_NAME', 'NOMBRE');
define('USER_SURNAME', 'APELLIDOS');
define('USER_EMAIL', 'EMAIL');
define('USER_PASSWORD', 'PASSWORD');
define('USER_DATE', 'FECHA');

/* DB CATEGORY TABLE */
define('CATEGORY_ID', 'ID');
define('CATEGORY_NAME', 'NOMBRE');

/* DB ENTRY TABLE */
define('ENTRY_ID', 'ID');
define('ENTRY_USER_ID', 'USUARIO_ID');
define('ENTRY_CATEGORY_ID', 'CATEGORIA_ID');
define('ENTRY_TITLE', 'TITULO');
define('ENTRY_DESCRIPTION', 'DESCRIPTION');
define('ENTRY_DATE', 'FECHA');

define('ENTRY_USER_NAME', 'USUARIO');
define('ENTRY_USER_EMAIL', 'USUARIO_EMAIL');
define('ENTRY_CATEGORY_NAME', 'CATEGORY');

define('ENTRY_USER', 'ENTRY_USER');
define('ENTRY_CATEGORY', 'ENTRY_CATEGORY');

define('SQL_ORDER_ASC', 'ASC');
define('SQL_ORDER_DESC', 'DESC');

/* SUBMIT TYPES */
define('SUBMIT_TYPE_LOGOUT', 'LogoutPost');
define('SUBMIT_TYPE_LOGIN', 'LoginPost');
define('SUBMIT_TYPE_SIGNIN', 'SigninPost');
define('SUBMIT_TYPE_NEW_ENTRY', 'newEntry');
define('SUBMIT_TYPE_EDIT_ENTRY', 'editEntry');
define('SUBMIT_TYPE_DELETE_ENTRY', 'deleteEntry');
define('SUBMIT_TYPE_NEW_CATEGORY', 'newCategory');
define('SUBMIT_TYPE_EDIT_USER', 'editUser');
define('SUBMIT_TYPE_DELETE_USER', 'deleteUser');

/* Others */
define('DATE_FORMAT', 'd/m/Y');
define('UNKNOWN_USER_EMAIL', 'unknown@BlogJose.com');