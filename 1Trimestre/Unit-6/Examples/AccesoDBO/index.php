<?php
require_once('DBConnection.php');

define("DB_DOMAIN", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "dwes_examples");

class Usuario {
    public function __construct(
        public int $id = 0,
        public String $nombre = '',
        public String $apellidos = '',
        public String $email = '',
        public String $password = ''
    ) {}

    public function getId(): int {
        return $this->id;
    }

    public function setid($id): void {
        $this->id = $id;
    }

    public function getNombre(): String {
        return $this->nombre;
    }

    public function getApellidos(): String {
        return $this->apellidos;
    }

    public function getEmail(): String {
        return $this->email;
    }

    public function getPassword(): String {
        return $this->password;
    }
}

try {
    $db = new DBConnection(DB_DOMAIN, DB_DATABASE, DB_USERNAME, DB_PASSWORD, 'USUARIOS', new Usuario());
    $usuarios = $db->query();
    foreach ($usuarios as $key => $value) {
        var_dump($value);
    }
} catch(Exception $e) {
    echo $e->getMessage();
}
