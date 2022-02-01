<?php

namespace src\services\db;

use PDO;

class DBConnection {

    //PDO singleton instance
    protected static PDO $connection;

    public function __construct() {
        if (!isset($this::$connection)) {
            $dbDomain = ($_SERVER['DB_DOMAIN'] ?? DB_DEFAULT_DOMAIN);
            $dbName = ($_SERVER['DB_NAME'] ?? DB_DEFAULT_NAME);
            $dbUser = ($_SERVER['DB_USER'] ?? DB_DEFAULT_USER);
            $dbPass = ($_SERVER['DB_PASSWORD'] ?? DB_DEFAULT_PASSWORD);
            $url = "mysql:dbname=$dbName;host=$dbDomain";
            $this::$connection = new PDO($url, $dbUser, $dbPass);
        }
    }
}