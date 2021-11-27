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
define('ENTRY_CATEGORY_NAME', 'CATEGORY');

/* SUBMIT TYPES */
define('SUBMIT_TYPE_LOGOUT', 'LogoutPost');
define('SUBMIT_TYPE_LOGIN', 'LoginPost');
define('SUBMIT_TYPE_SIGNIN', 'SigninPost');