<?php
namespace src\services;

use Exception;
use PDO;
use src\models\Comentario;

/**
 * This is the connection class for Comments
 */
class DBComentarioConnection {
    protected PDO $dbConnection;
    private String $table;

    public function __construct() {
        $url = "mysql:dbname=".DB_NAME.";host=".DB_DOMAIN;
        $this->dbConnection = new PDO($url, DB_USER, DB_PASSWORD);
        $this->table = "rutas_comentarios";
    }

    /**
     * Get all comments where match the conditions
     */
    public function query(): array|false {
        $result = [];
        try {
            $statement = $this->dbConnection->prepare("SELECT * FROM ".$this->table);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_CLASS, Comentario::class);
        } catch(Exception $ex) {
            $this->errors = $ex->getMessage();
            $result = false;
        }
        return $result;
    }

    /**
     * Search a specified Rute
     */
    public function queryWith($id): array|false {
        $result = [];
        try {
            $statement = $this->dbConnection->prepare("SELECT * FROM ".$this->table." WHERE id=:id");
            $statement->bindParam(':id', $id);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_CLASS, Comentario::class);
        } catch(Exception $ex) {
            $this->errors = $ex->getMessage();
            $result = false;
        }
        return $result;
    }

    /**
     * insert a comments
     */
    public function insert(Comentario $comentario): bool {
        $result = true;
        try {
            $statement = $this->dbConnection->prepare("INSERT INTO ".$this->table." VALUES (:id, :id_ruta, :nombre, :texto, :fecha)");
            $this->dbConnection->beginTransaction();
            $statement->execute((Array)$comentario);
            $this->dbConnection->commit();
        } catch(Exception $ex) {
            $this->errors = $ex->getMessage();
            $result = false;
        }
        return $result;
    }

    /**
     * Update a comments
     */
    public function update(Comentario $comentario): bool {
        $result = true;
        try {

            $sql = "UPDATE ".$this->table." set";
            $counter = 0;
            if (!empty($comentario->getNombre())) {
                $sql .= " nombre=:nombre";
                $counter++;
            }

            if (!empty($comentario->getTexto())) {
                if ($counter > 0) {$sql .= ",";}
                $sql .= " texto=:texto";
                $counter++;
            }

            $sql .= " WHERE id=:id AND id_ruta=:id_ruta";

            $statement = $this->dbConnection->prepare($sql);
            $this->dbConnection->beginTransaction();
            $statement->execute((Array)$comentario);
            $this->dbConnection->commit();
        } catch(Exception $ex) {
            $this->errors = $ex->getMessage();
            $result = false;
        }
        return $result;
    }

    /**
     * Delete a comments with her commets
     */
    public function delete($id): bool {
        $result = true;
        try {
            $statement = $this->dbConnection->prepare("DELETE FROM ".$this->table." WHERE id=:id");
            $statement->bindParam(":id", $id);
            $this->dbConnection->beginTransaction();
            $statement->execute();
            $this->dbConnection->commit();
        } catch(Exception $ex) {
            $this->errors = $ex->getMessage();
            $result = false;
        }
        return $result;
    }

}