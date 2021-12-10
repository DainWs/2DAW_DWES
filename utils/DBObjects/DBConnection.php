<?php

class DBAccess {
    protected PDO $dbConnection;

    public function __construct(
        private String $domain,
        private String $database,
        private String $user,
        private String $password,
        private String $table,
        private String $object
    ) {
        $url = "mysql:dbname=".$this->database.";host=".$this->domain;
        $this->dbConnection = new PDO($url, $this->user, $this->password);
    }

    public function query(): array|false {
        $result = [];
        try {
            $statement = $this->dbConnection->prepare("SELECT * FROM :table");
            $statement->bindParam(':table', $this->table);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_CLASS, $this->object::class);
        } catch(Exception $ex) {
            $result = false;
        }
        return $result;
    }

    public function queryWith(String $key, String $value): array|false {
        $result = [];
        try {
            $statement = $this->dbConnection->prepare("SELECT * FROM :table WHERE :field = :value");
            $statement->bindParam(':table', $this->table);
            $statement->bindParam(':field', $key);
            $statement->bindParam(':value', $value);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_CLASS, $this->object::class);
        } catch(Exception $ex) {
            $result = false;
        }
        return $result;
    }

    public function insert(Array $keys, Array $values): bool {
        $result = true;
        try {
            $statement = $this->dbConnection->prepare("INSERT INTO :table VALUES (:values)");

            $tempTable = $this->table;
            if (count($keys) > 0) {
                $tempTable .= '(' . implode(',', $keys) . ')';
            }

            $statement->bindParam(':table', $tempTable);
            $statement->bindParam(':values', implode(',', $values));

            $this->dbConnection->beginTransaction();
            $statement->execute();
            $this->dbConnection->commit();
        } catch(Exception $ex) {
            $result = false;
        }
        return $result;
    }

}