<?php

namespace src\services\db;

use PDO;

class DBConnection {

    //PDO singleton instance
    protected static PDO $connection;

    public function __construct() {
        if (!isset($this::$connection)) {
            $url = "mysql:dbname=".DB_NAME.";host=".DB_DOMAIN;
            $this::$connection = new PDO($url, DB_USER, DB_PASSWORD);
        }
    }    
}