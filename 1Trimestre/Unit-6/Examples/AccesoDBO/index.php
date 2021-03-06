<?php
require_once('DBConnection.php');

define("DB_DOMAIN", "localhost");
define('DB_DATABASE', 'BLOG_PROJECT');
define('DB_USERNAME', 'Blog');
define('DB_PASSWORD', 'Blog@1234');

class Usuario {
    public function getId(): int {
        return $this->ID;
    }

    public function getNombre(): String {
        return $this->NOMBRE;
    }

    public function getApellidos(): String {
        return $this->APELLIDOS;
    }

    public function getEmail(): String {
        return $this->EMAIL;
    }

    public function getPassword(): String {
        return $this->PASSWORD;
    }
}

try {
    $db = new DBConnection(DB_DOMAIN, DB_DATABASE, DB_USERNAME, DB_PASSWORD, 'USUARIOS', 'Usuario');
    $usuarios = $db->query();
    foreach ($usuarios as $key => $value) {
        echo $value->getNombre();
        echo "<br/>";
    }
} catch(Exception $e) {
    echo $e->getMessage();
}
