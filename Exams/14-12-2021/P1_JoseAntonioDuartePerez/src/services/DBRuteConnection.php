<?php
namespace src\services;

use Exception;
use mysqli;
use PDO;
use src\models\Ruta;

/**
 * This is the connection class for Rutes
 */
class DBRuteConnection {
    protected PDO $dbConnection;
    private String $table;

    public function __construct() {
        $url = "mysql:dbname=".DB_NAME.";host=".DB_DOMAIN;
        $this->dbConnection = new PDO($url, DB_USER, DB_PASSWORD);
        $this->table = "rutas";
    }

    /**
     * Get all rutes where match the conditions
     */
    public function query(String $name = "", String $order = RUTE_ID, String $orderType = SQL_ORDER_ASC): array|false {
        $result = [];
        try {
            $statement = $this->dbConnection->prepare("SELECT * FROM ".$this->table." WHERE titulo LIKE '%$name%' ORDER BY :fieldOrder :orderType");
            $statement->bindParam(":fieldOrder", $order);
            $statement->bindParam(":orderType", $orderType);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_CLASS, Ruta::class);
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
            $result = $statement->fetchAll(PDO::FETCH_CLASS, Ruta::class);
        } catch(Exception $ex) {
            $this->errors = $ex->getMessage();
            $result = false;
        }
        return $result;
    }

    /**
     * insert a rute
     */
    public function insert(Ruta $rute): bool {
        $result = true;
        try {
            $statement = $this->dbConnection->prepare("INSERT INTO ".$this->table." VALUES (:id, :titulo, :descripcion, :desnivel, :distancia, :notas, :dificultad)");
            $statement->bindParam(":id", $rute->id);
            $statement->bindParam(":titulo", $rute->titulo);
            $statement->bindParam(":descripcion", $rute->descripcion);
            $statement->bindParam(":desnivel", $rute->desnivel);
            $statement->bindParam(":distancia", $rute->distancia);
            $statement->bindParam(":notas", $rute->notas);
            $statement->bindParam(":dificultad", $rute->dificultad);
            $this->dbConnection->beginTransaction();
            $statement->execute();
            $this->dbConnection->commit();
        } catch(Exception $ex) {
            $this->errors = $ex->getMessage();
            
            echo $ex->getMessage();
            $result = false;
        }
        return $result;
    }
    
    /**
     * Update a rute
     */
    public function update(Ruta $rute): bool {
        $result = true;
        try {
            $sql = "UPDATE ".$this->table." set";
            $counter = 0;
            if (!empty($rute->getTitulo())) {
                $sql .= " titulo=:titulo";
                $counter++;
            }

            if (!empty($rute->getDescripcion())) {
                if ($counter > 0) {$sql .= ",";}
                $sql .= " descripcion=:descripcion";
                $counter++;
            }

            if ($rute->getDesnivel() != -1) {
                if ($counter > 0) {$sql .= ",";}
                $sql .= " desnivel=:desnivel";
                $counter++;
            }

            if ($rute->getDistancia() != -1) {
                if ($counter > 0) {$sql .= ",";}
                $sql .= " distancia=:distancia";
                $counter++;
            }

            if (!empty($rute->getNotas())) {
                if ($counter > 0) {$sql .= ",";}
                $sql .= " notas=:notas";
                $counter++;
            }

            if ($rute->getDificultad() != -1) {
                if ($counter > 0) {$sql .= ",";}
                $sql .= " dificultad=:dificultad";
                $counter++;
            }

            $sql .= " WHERE id=:id";

            $statement = $this->dbConnection->prepare($sql);

            if (!empty($rute->getTitulo())) {
                $statement->bindParam(":titulo", $rute->titulo);
            }

            if (!empty($rute->getDescripcion())) {
                $statement->bindParam(":descripcion", $rute->descripcion);
            }

            if ($rute->getDesnivel() != -1) {
                $statement->bindParam(":desnivel", $rute->desnivel);
            }

            if ($rute->getDistancia() != -1) {
                $statement->bindParam(":distancia", $rute->distancia);
            }

            if (!empty($rute->getNotas())) {
                $statement->bindParam(":notas", $rute->notas);
            }

            if ($rute->getDificultad() != -1) {
                $statement->bindParam(":dificultad", $rute->dificultad);
            }

            $statement->bindParam(":id", $rute->id);
            $this->dbConnection->beginTransaction();
            $statement->execute();
            $this->dbConnection->commit();
        } catch(Exception $ex) {
            $this->errors = $ex->getMessage();
            
            echo $ex->getMessage();
            $result = false;
        }
        return $result;
    }

    /**
     * Delete a rute with her commets
     */
    public function delete($id): bool {
        $result = true;
        try {
            $statement = $this->dbConnection->prepare("DELETE FROM ".$this->table." WHERE id=:id");
            $statement->bindParam(":id", $id);
            $this->dbConnection->beginTransaction();
            $statement->execute();
            $this->dbConnection->commit();

            $this->dbConnection->beginTransaction();
            $statement = $this->dbConnection->prepare("DELETE FROM rutas_comentarios WHERE id_rutas=:id_rutas");
            $statement->bindParam(":id_rutas", $id);
            $statement->execute();
            $this->dbConnection->commit();
        } catch(Exception $ex) {
            $this->errors = $ex->getMessage();
            $result = false;
        }
        return $result;
    }

}