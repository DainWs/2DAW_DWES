<?php
include_once("../../../autoload.php");

use src\models\Usuarios;
use src\services\db\DBTableUsuarios;

$table = new DBTableUsuarios();
$users = $table->query();
var_dump($users);

var_dump($users[1]);
$users[1]->rol = 'proveedor';
var_dump($users[1]);
$table->update($users[1]);

$newUser = new Usuarios();
$newUser->id = 0;
$newUser->nombre = 'Pablo';
$newUser->apellidos = 'Troton';
$newUser->email = 'pablo@gmail.com';
$newUser->password = md5('pablo');
$newUser->rol = 'proveedor';

$table->insert($newUser);

var_dump($table->queryWith(count($users)));

$table->delete(count($users));