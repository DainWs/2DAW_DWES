<?php

define("DB_DOMAIN", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "dwes_examples");

$url = "mysql:dbname=".DB_DATABASE.";host=".DB_DOMAIN;
try {
    $db = new PDO($url, DB_USERNAME, DB_PASSWORD);
    echo "conexion con exito";

    $sql = 'SELECT * FROM USUARIOS';
    $db->exec($sql);

    $prepareSQL = $db->prepare('SELECT * FROM USUARIOS');
    $prepareSQL->execute( array(0) );

    var_dump($prepareSQL);

} catch(Exception $e) {
    echo $e->getMessage();
}
