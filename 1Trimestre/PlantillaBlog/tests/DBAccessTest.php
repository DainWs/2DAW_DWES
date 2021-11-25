<?php
require_once('../src/config/constants.php');
require_once('../src/services/db/DBConnection.php');

$newUser = [
    USER_NAME => 'Jose Antonio',
    USER_SURNAME => 'Duarte Perez',
    USER_EMAIL => 'jose.ant.du@gmail.com',
    USER_PASSWORD => 'Prueba'
];

$result = saveUser($newUser);
echo ($result) ? 'true' : 'false';
$result = true;
echo "<br/>";
if ($result) {
    $emailedUser = getUserByEmail('jose.ant.du@gmail.com');
    var_dump($emailedUser);
    echo "<br/>";
    $idUser = getUserByID($emailedUser[USER_ID]);
    var_dump($idUser);
    echo "<br/>";
}