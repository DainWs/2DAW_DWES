<?php

namespace src\services\db;

use DBTable;
use Exception;
use Monolog\Logger;
use PDO;
use src\models\Categorias;

/**
 * Esta clase representa la tabla Categorias de la base de datos,
 * hay que resaltar que algunos metodos no tendran comentarios dado 
 * que ya los heredan de los metodos del padre.
 */
class DBTableCategorias extends DBTable {

    public function query(String $name = "", String $order = 'id', String $orderType = SQL_ORDER_ASC): array|false {
        $result = [];
        try {
            $statement = parent::$connection->prepare("SELECT * FROM categorias WHERE nombre LIKE '%$name%' ORDER BY :fieldOrder :orderType");
            $statement->bindParam(":fieldOrder", $order);
            $statement->bindParam(":orderType", $orderType);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_CLASS, Categorias::class);
        } catch(Exception $ex) {
            $this->errors = $ex->getMessage();
            $this->logger->log( $ex->getMessage(), Logger::WARNING);
            $result = false;
        }
        return $result;
    }

    public function queryWith($id): array|false {
        return $this->queryWhere('categorias', 'id', $id, Categorias::class);
    }

    /**
     * Found category in db by name
     * @param $value the category name
     * @return array|false array if all was success, otherwise false
     */
    public function queryWhereName($value): array|false {
        return $this->queryWhere('categorias', 'nombre', $value, Categorias::class);
    }

    public function insert($categoria): bool {
        $result = true;

        if ($categoria instanceof Categorias) {
            try {
                $statement = parent::$connection->prepare("INSERT INTO categorias VALUES (:id, :nombre)");
                $statement->bindParam(":id", $categoria->id);
                $statement->bindParam(":nombre", $categoria->nombre);
                parent::$connection->beginTransaction();
                $statement->execute();
                parent::$connection->commit();
            } catch (Exception $ex) {
                $this->errors = $ex->getMessage();
                $this->logger->log( $ex->getMessage(), Logger::WARNING);
                $result = false;
            }
        }
        return $result;
    }
    
    public function update($categoria): bool {
        $result = true;
        if ($categoria instanceof Categorias) {
            try {
                $sql = "UPDATE categorias set nombre=:nombre WHERE id=:id";
                $statement = parent::$connection->prepare($sql);
                $statement->bindParam(":nombre", $categoria->nombre);
                $statement->bindParam(":id", $categoria->id);
                parent::$connection->beginTransaction();
                $statement->execute();
                parent::$connection->commit();
            } catch (Exception $ex) {
                $this->errors = $ex->getMessage();
                $this->logger->log( $ex->getMessage(), Logger::WARNING);
                $result = false;
            }
        }
        return $result;
    }

    public function delete($id): bool {
        $result = true;
        try {
            $statement = parent::$connection->prepare("DELETE FROM categorias WHERE id=:id");
            $statement->bindParam(":id", $id);
            parent::$connection->beginTransaction();
            $statement->execute();
            parent::$connection->commit();
        } catch(Exception $ex) {
            $this->errors = $ex->getMessage();
            $this->logger->log( $ex->getMessage(), Logger::WARNING);
            $result = false;
        }
        return $result;
    }

    public function deleteWhere($id): bool {
        return true;
    }

}