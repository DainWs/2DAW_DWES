<?php

class DBConnection {
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
            $statement = $this->dbConnection->prepare("SELECT * FROM ".$this->table);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_CLASS, 'Usuario');
        } catch(Exception $ex) {
            echo $ex->getMessage();
            $result = false;
        }
        return $result;
    }

    public function queryWith(String $key, String $value): array|false {
        $result = [];
        try {
            $statement = $this->dbConnection->prepare("SELECT * FROM ".$this->table." WHERE :field = :value");
            $statement->bindParam(':field', $key);
            $statement->bindParam(':value', $value);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_CLASS, $this->object::class);
        } catch(Exception $ex) {
            echo $ex->getMessage();
            $result = false;
        }
        return $result;
    }

    public function insert(Usuario $user): bool {
        $result = true;
        try {
            
            $statement = $this->dbConnection->prepare("INSERT INTO ".$this->table." VALUES (:ID, :NOMBRE, :APELLIDOS, :EMAIL, :PASSWORD, :FECHA)");
            $this->dbConnection->beginTransaction();
            $statement->execute((Array)$user);
            $this->dbConnection->commit();
        } catch(Exception $ex) {
            echo $ex->getMessage();
            $result = false;
        }
        return $result;
    }

}